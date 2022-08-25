<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartOrder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function createCart()
    {   
        $temp = Session::get('loginID');
        $search = $this->searchForCart($temp);
        if($search == null){
            $cart = new Cart();
            $cart->paymentMethod = "Cash";
            $cart->customerID = $temp;
            $cart->save();
        }
    }
    public function searchForCart($temp1)
    {
        $search = Cart::where('customerID', 'like', $temp1)->first();
        return $search;
    }
    public function index()
    {   
        if(Session::get('loginID')!=null){
            $temp = Session::get('loginID');
            $data = Cart::join('cartOrders', 'carts.cartID', '=', 'cartOrders.cartID')
                ->join('products', 'cartOrders.productID', '=', 'products.productID')
                ->where('carts.customerID', '=', $temp)
                ->get(['cartOrders.productAmount', 'products.productID', 'products.productName', 'products.productImage1', 
                    'products.productPrice', 'products.productDetails', 'cartOrders.itemOrder', 'carts.cartID']);
            return view('0905C.cart', compact('data'));
        }else{
            return redirect('login')->with('restricted', 'User is required to log in');
        }
    }
    public function deleteCart($id)
    {
        $search = new CartController(); //calls class
        $search = $this->searchForCart($id); //find the cart with the right id

        $deleteAllOrder = new CartOrderController; //calls class
        $deleteAllOrder->deleteAllItem($search->cartID); //delete all order in cartOrder before deleting cart to prevent foreign key
        $cart = Cart::where('customerID', '=', $id)->delete();//delete the cart itself before deleting customer to prevent foreign key
    }

    public function cartList(){
        $data = Cart::join('cartOrders', 'carts.cartID', '=', 'cartOrders.cartID')
                    ->join('customers', 'customers.customerID', '=', 'carts.customerID')
                    ->groupBy('carts.cartID')
                    ->get(['carts.cartID', 'customers.customerUsername']);
        $total = CartOrder::join('products', 'products.productID', '=', 'cartOrders.productID')
                          ->get(['products.productPrice', 'cartOrders.cartID', 'cartOrders.productAmount']);
        return view ('admindashboard.cart.cartlist', compact('data', 'total'));
    }
    public function cartdetail($id)
    {
        $data = CartOrder::join('products', 'cartOrders.productID', '=', 'products.productID')
                ->where('cartOrders.cartID', '=', $id)
                ->get(['cartOrders.productAmount', 'products.productName', 'products.productImage1', 
                    'products.productPrice', 'products.productDetails', 'cartOrders.itemOrder']);
        return view('admindashboard.cart.cartdetail', compact('data'));
    }
//----------------------Receipt--------------------------
    public function getReceipt($id, $total)
    {
        $temp = Cart::where('cartID', '=', $id)->first();
        if($temp == null){
            return redirect()->route('cart')->with('noitem', 'Please add an item to cart first');
        }
        $data = Cart::join('customers', 'customers.customerID', '=', 'carts.customerID')
                    ->where('carts.cartID', '=', $id)->first();
        return view('0905C.receipt', compact('data', 'total'));
    }
    public function editReceipt($id)
    {
        $data = Cart::join('customers', 'customers.customerID', '=', 'carts.customerID')
                    ->where('carts.cartID', '=', $id)->first();
        return view('0905C.receiptEdit', compact('data'));
    }
    public function receiptUpdate(Request $request, $id)
    {
        $request->validate([
            'deliveryInstruction'=>'required',
            'deliveryAddress'=>'required'
        ]);
        $deliveryAddress = $request->deliveryAddress;
        $deliveryInstruction = $request->deliveryInstruction;
        $datetime = $request->datetime;
        Cart::where('cartID', '=', $id)->update([
            'deliveryAddress'=>$deliveryAddress,
            'deliveryInstruction'=>$deliveryInstruction,
            'datetime'=>$datetime
        ]);
        return redirect()->back()->with('success', 'Delivery information updated successfully!');
    }
}
?>

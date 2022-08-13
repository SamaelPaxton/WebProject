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
            return view('0905C.login');
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
                    'products.productPrice', 'products.productDetails', 'cartOrders.itemOrder']);
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
}
?>

<?php

namespace App\Http\Controllers;

use App\Models\CartOrder;
use App\Models\Product;
use App\Models\Cart;
use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartOrderController extends Controller
{

    public function addToCart($id, Request $request)  
    {  
        if(Session::get('loginID')!=null){
            $cart = new CartController();
            $cart->createCart();

            $temp = Session::get('loginID');
            $request->validate([
                'quantity' => 'integer|min:1'
            ]);
            $cartOrder = new CartOrder();
            $cartOrder->productID = $id;
            $cartOrder->productAmount = $request->quantity;
            $cartOrder->cartID = $cart->searchForCart($temp)->cartID;
            $cartOrder->save();
            return redirect()->back()->with('success', 'Product was added to cart successfully!'); 
        }else{
            return redirect('login')->with('restricted', 'User is required to log in');
        }
        
    }
    public function removeItem($id)
    {
        CartOrder::where('itemOrder', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product was removed successfully!');
    }
    public function quantityEdit($id)  
    {
        $data = CartOrder::join('products', 'cartOrders.productID', '=', 'products.productID')
                         ->where('cartOrders.itemOrder', '=', $id)
                         ->select('cartOrders.itemOrder', 'cartOrders.productAmount', 'products.productName')->first();
        return view('0905C.quantityedit', compact('data'));
    }
    public function quantityUpdate(Request $request)
    {
        $request->validate([
            'quantity' => 'integer|min:1'
        ]);
        $productAmount = $request->quantity;
        $itemOrder = $request->itemOrder;
        CartOrder::where('itemOrder', '=', $itemOrder)->update([
            'productAmount'=>$productAmount
        ]);
        return redirect()->back()->with('success', 'Qauntity was updated successfully');
    }
    public function deleteAllItem($cartID)
    {
        $data = CartOrder::where('cartID', '=', $cartID)->delete();
    }
}
?>
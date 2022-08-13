<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductController2 extends Controller
{
    public function index(){
        return view('0905C.home');
    }
    public function getProducts(Request $request)
    {
        $data= Product::select('products.*','producers.producerName')
        ->join('producers','products.producerID','=','producers.producerID')
        ->paginate(5);
    
        if ($request->get('sort') == 'price_asc'){
            $data= Product::select('products.*','producers.producerName')
            ->join('producers','products.producerID','=','producers.producerID')
            ->orderBy('productPrice','asc')
            ->paginate(5);
        }    
        elseif($request->get('sort') == 'price_desc'){
            $data= Product::select('products.*','producers.producerName')
            ->join('producers','products.producerID','=','producers.producerID')
            ->orderBy('productPrice','desc')
            ->paginate(5);
        }
        elseif($request->get('sort') == 'name_a_Z') {
            $data= Product::select('products.*','producers.producerName')
            ->join('producers','products.producerID','=','producers.producerID')
            ->orderBy('productName','asc')
            ->paginate(5);
        }
        elseif($request->get('sort') == 'name_z_a') {
            $data= Product::select('products.*','producers.producerName')
            ->join('producers','products.producerID','=','producers.producerID')
            ->orderBy('productName','desc')
            ->paginate(5);
        }
        return view('0905C.products', compact('data'));
    }
    public function getSingleProduct($id){
        $data = Product::where('productID', '=', $id)->first();
        return view('0905C.singledisplay', compact('data')); 
    }
}
?>
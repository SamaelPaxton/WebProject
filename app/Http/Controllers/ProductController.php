<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Producer;


class ProductController extends Controller
{
    public function index(){
        $data = Product::get();
        return view('list', compact('data'));
    }
    public function add(){
        $producers = Producer::get();
        return view('admindashboard.product.add', compact('producers'));
    }
    public function save(Request $request)
    {
        //dd($request->all());
        $product = new Product();
        $product->productID = $request->id;
        $product->productName = $request->name;
        $product->productPrice = $request->price;
        $product->productDetails = $request->details;
        $product->productImage1 = $request->image;
        $product->producerID = $request->producer;
        $product->save();

        return redirect()->back()->with('success', 'Product was  added successfully!');
    }
    public function edit($id)
    {
        $data = Product::where('productID', '=', $id)->first();
        $producer = Producer::get();
        return view('admindashboard.product.edit')->with(compact('data', 'producer'));
    }
    public function update(Request $request)
    {
        $productID = $request->id;
        $productName = $request->name;
        $productDetails = $request->edtails;
        $productImage1 = $request->image;
        $producerID = $request->producer;

        Product::where('productID', '=', $productID)->update([
            'productName'=>$productName,
            'productDetails' => $productDetails,
            'productImage1'=> $productImage1,
            'producerID' => $producerID
        ]);
        return redirect()->back()->with('success', 'Product was updated successfully!');
    }
    public function delete($id)
    {
        Product::where('productID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product was removed successfully!');
    }
    public function index2()
    {
        $data= Product::select('products.*','producers.producerName')
        ->join('producers','products.producerID','=','producers.producerID')->get();
        return view('admindashboard.product.list2',compact('data'));
    }
}

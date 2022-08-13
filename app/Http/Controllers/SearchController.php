<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function Search(Request $request)
    {
        if (isset($_GET['query']))
        {
            $search_text = $_GET['query'];
            $products = DB::table('products')->where('productName','LIKE','%'.$search_text.'%')->paginate(1);
            $products->appends($request->all());
            return view('0905C.search',['products'=>$products]);
        }
        else{
            return view('0905C.search');
        }
    }
}
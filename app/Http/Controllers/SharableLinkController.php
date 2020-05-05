<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class SharableLinkController extends Controller
{
    public function productLink($id){
        $product = Product::where('id','=',$id)->first();
        return view('product_link',['product'=>$product]);
    }
}

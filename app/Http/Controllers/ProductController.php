<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function store(Request $request){
        $product = new Product();
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];

        $product->business_id = 1;
        $product->save();
        return redirect('dashboard/products');
    }
}

<?php

namespace App\Http\Controllers;

use App\Business;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    //
    public function store(Request $request){
        $product = new Product();
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->sku = $request['sku'];
        $business = Business::where('client_id','=',Auth::id())->first();

        $product->business_id = $business->id;
        $product->save();
        return redirect('dashboard/products');
    }
}

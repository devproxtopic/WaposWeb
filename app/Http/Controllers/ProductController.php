<?php

namespace App\Http\Controllers;

use App\Business;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    //
    public function createProduct(Request $request){
        $validatedData = $request->validate([
            'sku' => 'required|unique:products',
        ]);
        $product = new Product();
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->sku = $request['sku'];
        $product->currency = $request['currency'];
        if( $request->hasFile('image-product') ){
            $file = $request->file('image-product')->store('uploads','public');
            $product->image = $file;
        }
        $business = Business::where('client_id','=',Auth::id())->first();
        $product->business_id = $business->id;
        $product->save();
        return redirect('dashboard/products');
    }

    public function product($id){

        $product = Product::where('id','=',$id)->get();
        return $product;
    }
}

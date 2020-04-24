<?php
function getFullBuyer($user_id){
    $buyer = App\Buyer::where('id', '=', $user_id)->first();
    if ($buyer){
        return $buyer;
    } else {
        return " ";
    }
    
}
function getFullName($user_id){
    $buyer = App\Buyer::where('id', '=', $user_id)->first();
    if ($buyer){
        $fullName =  $buyer->name.' '.$buyer->lastname;
        return  $fullName;
    } else {
        return " ";
    }  
}

function getProductName($product_id){
    $product = App\Product::where('id', '=', $product_id)->first();
    if ($product){
        return $product->title;
    } else {
        return " ";
    }  
}

function getProductInformation($product_id){
    $product = App\Product::where('id', '=', $product_id)->first();
    if ($product){
        return $product;
    } else {
        return " ";
    }
    
}
?>
<?php
function getFullName($user_id){
    $buyer = App\Buyer::where('id', '=', $user_id)->first();
    if ($buyer){
        return $buyer;
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
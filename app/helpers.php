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


function customer_Order($order){
    $order = App\Order::where('ordernumber', '=', $order)->first();
    if ($order){
        $customer = App\Buyer::where('id','=',$order->buyer_id)->first();
       return getFullName($customer->id);
    } else {
        return " ";
    }
}

function customer_phone_Order($order){
    $order = App\Order::where('ordernumber', '=', $order)->first();
    if ($order){
        $customer = App\Buyer::where('id','=',$order->buyer_id)->first();
       return $customer->phone;
    } else {
        return " ";
    }
    
}

function customer_lada_Order($order){
    $order = App\Order::where('ordernumber', '=', $order)->first();
    if ($order){
        $customer = App\Buyer::where('id','=',$order->buyer_id)->first();
       return $customer->ladanumber;
    } else {
        return " ";
    }  
}

function price_Order($order){
    $order = App\Order::where('ordernumber', '=', $order)->first();
    if ($order){
        $customer = App\Product::where('id','=',$order->product_id)->first();
       return $customer->price;
    } else {
        return " ";
    }
    
}


?>
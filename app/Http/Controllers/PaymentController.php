<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentProcess(Request $request){
        \Stripe\Stripe::setApiKey("sk_test_hdYA84ilsgjc0bG0uXmoUUYK00z5EDTCXg");

       
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create(
            [
                'amount' => 1000,
                'currency' => 'mxn',
                'description' => 'Example charge',
                'source' => $token
            ]
            );
        
    }
    
}

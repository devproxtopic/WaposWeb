<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentProcess(Request $request){
        \Stripe\Stripe::setApiKey($_ENV['STRIPE_API_KEY']);

       
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create(
            [
                'amount' => 1000,
                'currency' => 'mxn',
                'description' => 'Example charge',
                'source' => $token
            ]
            );

            echo('Pago realizado correctamente');
        
    }


    public function paymentForm ($id)
    {
        $order = $id;

        return view('link_payment', ['order'=>$order]);
    }
    
}

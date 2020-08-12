<?php

namespace App\Http\Controllers;

use App\Message;
use App\Order;
use App\Buyer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function create(Request $request){
        $buyerRegisteredID = 0;
        if($request['product_id'] == -1 || $request['buyer_id']== -1 ){

            return "Debe seleccionar un cliente o producto válido";

        } else if ($request['product_id'] == 0 || $request['buyer_id']== 0){
            if ($request['buyer_id']== 0){

                $buyer = new Buyer();
                $buyer->name = $request['name'];
                $buyer->lastname = $request['lastname'];
                $buyer->phone = $request['phone'];
                $buyer->ladanumber = $request['lada'];
                $buyer->save();
                $buyerRegisteredID  = $buyer->id;
            } else {
                return "registra producto";

            }

        }
        $validatedData = $request->validate([
            'ordernumber' => 'required|unique:orders',
        ]);
        $message = new Message();

        if ($request['buyer_id']== 0){
            $message->buyer_id = $buyerRegisteredID ;
        }
        else {
            $message->buyer_id = $request['buyer_id'];
        }
        $message->product_id = $request['product_id'];
        $message->message = $request['message'];
        $message->save();

        $transaction = new Order();
        if ($request['buyer_id']== 0){
            $transaction->buyer_id = $buyerRegisteredID;
        }
        else {
            $transaction->buyer_id = $request['buyer_id'];
        }

        $transaction->product_id = $request['product_id'];
        $transaction->concept = $request['title'];
        $transaction->amount = $request['price'];
        $transaction->date = date('Y-m-d H:i:s');
        $transaction->transaction_status = "Pendiente";
        $transaction->ordernumber = $request['ordernumber'];
        $transaction->save();


        if ($request['buyer_id']== 0){
            $buyer = Buyer::where('id', '=', $buyerRegisteredID)->first();

        }
        else {
            $buyer = Buyer::where('id', '=', $request['buyer_id'])->first();
        }

        ///
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, "https://test.paywith.billpocket.com/api/v1/checkout");
    // $body = '{
    //     "apiKey": "44HWTCR-DRK47ES-NX6YTBW-BYD66QF",
    //     "externalID": "",
    //     "items" : [],
    //     "total": '.$request['price'].'
    // }';

    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    // curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // // Timeout in seconds
    // curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    // $authToken = curl_exec($ch);

    // $final_response = json_decode($authToken, true);
    // $urlBillPocket = "https://test.paywith.billpocket.com/checkout/".$final_response ['checkoutId'];
    //return $urlBillPocket;

        ///
        //return redirect('/negocios/orders/'.$request['ordernumber'].'/details/');

        $url = "https://api.whatsapp.com/send?phone=".
        $buyer->ladanumber.''.$buyer->phone.
        "&text=".$request['message'].
        ", puede verlo en la siguiente url https://wa-pos.com/".'/negocios/orders/'.$request['ordernumber'].'/details/';
        return Redirect::to($url);



        /* $transactions = Order::all();
        return view('dashboard.transactions',['transactions'=>$transactions]);*/
    }
}

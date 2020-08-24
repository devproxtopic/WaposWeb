<?php

namespace App\Http\Controllers;

use App\Message;
use App\Order;
use App\Buyer;
use App\Product;
use App\Transaction;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function createPos() {
        $buyers = Buyer::all();
        $orders = Order::where('transaction_status', 2)->get();

        return view('messages.pos', compact('buyers','orders'));
    }

    public function createPosExpress() {
        $buyers = Buyer::all();

        return view('messages.pos-express', compact('buyers'));
    }

    public function create(Request $request){
        $buyer = Buyer::find($request->buyer_id);
        if (! $buyer) {
            $buyer = new Buyer();
        }

        $buyer->name = $request['name'];
        $buyer->lastname = $request['lastname'];
        $buyer->phone = $request['phone'];
        $buyer->ladanumber = $request['lada'];
        $buyer->save();

        $order = Order::find($request->order_id);

        $message = new Message();
        $message->buyer_id = $buyer->id;
        // $message->product_id = $request['product_id'];
        $message->message = $request['message'];
        $message->amount = $request->amount;
        $message->save();

        $transaction = new Transaction();
        $transaction->order_id = $request->order_id;
        $transaction->message_id = $message->id;
        $transaction->status_id = 1;
        $transaction->save();

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
        ", puede verlo en la siguiente url https://wa-pos.com/".'/negocios/orders/'.$order->ordernumber.'/details/';
        return Redirect::to($url);

        /* $transactions = Order::all();
        return view('dashboard.transactions',['transactions'=>$transactions]);*/
    }

    public function storeExpress (Request $request)
    {
        $message = Message::create([
            'message' => $request->message,
            'concept' => $request->concept,
            'type' => 'e',
            'service_name' => $request->service_name,
            'amount' => $request->amount,
            'phone_contact' => $request->lada . $request->phone,
        ]);

        $order = Order::create([
            'concept' => $request->concept,
            'amount' => $request->amount,
            'payment_type' => 1,
            'date' => now(),
            'transaction_status' => 1,
            'ordernumber' => 'E' . Auth::id() . now()->format('dmY')
        ]);

        $transaction = new Transaction();
        $transaction->order_id = $order->id;
        $transaction->message_id = $message->id;
        $transaction->status_id = 1;
        $transaction->save();

        $url = "https://api.whatsapp.com/send?phone=" .
        $message->phone_contact .
        "&text=".$request['message'] .
        ", puede verlo en la siguiente url https://wa-pos.com/".'negocios/orders/'.$order->ordernumber.'/details/';
        return Redirect::to($url);
    }
}

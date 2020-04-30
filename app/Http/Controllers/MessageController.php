<?php

namespace App\Http\Controllers;

use App\Message;
use App\Order;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(Request $request){

        $validatedData = $request->validate([
            'ordernumber' => 'required|unique:orders',
        ]);
        $message = new Message();
        $message->product_id = $request['product_id'];
        $message->buyer_id = $request['buyer_id'];
        $message->message = $request['message'];
        $message->save();

        $transaction = new Order();
        $transaction->product_id = $request['product_id'];
        $transaction->buyer_id = $request['buyer_id'];
        $transaction->concept = $request['title'];
        $transaction->amount = $request['price'];
        $transaction->date = date('Y-m-d H:i:s');
        $transaction->transaction_status = "Pendiente";
        $transaction->ordernumber = $request['ordernumber'];
        $transaction->save();
        $transactions = Order::all();
        return view('dashboard.transactions',['transactions'=>$transactions]);
    }
}

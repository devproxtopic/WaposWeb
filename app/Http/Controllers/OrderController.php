<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    //
    public function dashboardTransactionsView(Request $request){

       
        $transactions = Order::all();
        return view('dashboard.transactions',['transactions'=>$transactions]);
    }

    public function createTransaction(Request $request){
        $transaction = new Order();
        $transaction->product_id = $request['product_id'];
        $transaction->buyer_id = $request['buyer_id'];
        $transaction->concept = $request['concept'];
        $transaction->amount = $request['amount'];
        $transaction->payment_type = $request['payment_type'];
        $transaction->date = $request['date'];
        $transaction->transaction_status = $request['transaction_status'];
        $transaction->ordernumber = $request['ordernumber'];
        $transaction->save();
        $transactions = Order::all();
        return view('dashboard.transactions',['transactions'=>$transactions]);
    }

    
}

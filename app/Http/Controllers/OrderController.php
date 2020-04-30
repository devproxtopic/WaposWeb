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

        $validatedData = $request->validate([
            'orderno' => 'required|unique:orders',
        ]);
        
        $transaction = Order::where('ordernumber','=',$request['orderno'])->first();
        $transaction->transaction_status = "complete";
        $transaction->save();
        $transactions = Order::all();
        return view('dashboard.transactions',['transactions'=>$transactions]);
    }

    
}

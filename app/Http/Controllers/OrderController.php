<?php

namespace App\Http\Controllers;

use App\Buyer;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;
use App\OrderDetail;
use App\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function handle(Request $request){
        Log::info($request);
        return ($request);

    }
    public function billPocketRedirect(Request $request){

        return "Aquí será el redireccionamiento";

    }

    public function dashboardTransactionsView(Request $request){


        $transactions = Order::all();
        return view('dashboard.transactions',['transactions'=>$transactions]);
    }

    public function createTransaction(Request $request){

    /*  $validatedData = $request->validate([
            'orderno' => 'required|unique:orders',
        ]);

        $transaction = Order::where('ordernumber','=',$request['orderno'])->first();
        $transaction->transaction_status = "complete";
        $transaction->save();
        $transactions = Order::all();
        return view('dashboard.transactions',['transactions'=>$transactions]);

        */

        \Stripe\Stripe::setApiKey("sk_test_hdYA84ilsgjc0bG0uXmoUUYK00z5EDTCXg");


        $token = $request['stripeToken'];

        $customer=  \Stripe\Customer::create([
            'phone' => $request['phone'],
            'name' => $request['name'],
        ]);


        $createSource = \Stripe\Customer::createSource(
            $customer->id,
            ['source' => $token]
        );



            /*$total_without_symbol = substr($request['amount'], 1);
            $total_without_point = substr($total_without_symbol, 0, -3);
            dd($total_without_point);*/
            $charge = \Stripe\Charge::create(
                [
                    'amount' => $request['amount']."00",
                    'currency' => 'mxn',
                    'description' => $request['description'],
                    'customer'=>$customer->id
                ]
                );


            if($charge->status == 'succeeded'){
                $transaction = Order::where('ordernumber','=',$request['orderno'])->first();
                $transaction->transaction_status = "complete";
                $transaction->save();
                $transactions = Order::all();
                return view('dashboard.transactions',['transactions'=>$transactions]);
            }
            else {
                echo("error");
            }

    }

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        $buyers = Buyer::all();

        return view('orders.create', compact('products', 'buyers'));
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->product_id = $request->product_id[0];
        $order->buyer_id = $request->buyer_id;
        $order->concept = $request->concept;
        $order->amount = $request->amount;
        $order->payment_type = $request->payment_type;
        $order->date = now();
        $order->transaction_status = 2;
        $order->ordernumber = Auth::id() . now()->format('dmY') . $request->buyer_id;
        $order->save();

        foreach ($request->product_id as $product_id) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $product_id;
            $order_detail->quantity = $request->quantity[$product_id];
            $order_detail->price = $request->price[$product_id];
            $order_detail->save();
        }

        return redirect('/dashboard/orders');
    }

}

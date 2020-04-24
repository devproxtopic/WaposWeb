<?php

namespace App\Http\Controllers;

use App\Buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{

    public function dashboardClientsView(){
        $buyers= Buyer::all();
        return view('dashboard.clients',['buyers'=>$buyers]);

    }
    
    public function store(Request $request){
        $buyer = new Buyer();
        $buyer->name = $request['name'];
        $buyer->lastname = $request['lastname'];
        $buyer->phone = $request['phone'];
        $buyer->ladanumber = $request['ladanumber'];
        $buyer->date_of_birth = $request['date_of_birth'];
        $buyer->save();
        return redirect('/dashboard/clients');
    }
}

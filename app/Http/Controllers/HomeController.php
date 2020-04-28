<?php

namespace App\Http\Controllers;

use App\Business;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = Business::where('client_id','=',Auth::user()->id)->get()->toArray();
        //return count($count);
        if (count($count) > 0){
            $business = 1;
            
        }else{
            $business = 0;
      
        }
        return view('users.general',['business'=>$business]);
    }
}

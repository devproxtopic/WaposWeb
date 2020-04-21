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
        $count = Business::all()->toArray();
        if ($count){
            $business = 1;
        }else{
            $business = 0;
        }
        return view('users.general',['business'=>$business]);
    }
}

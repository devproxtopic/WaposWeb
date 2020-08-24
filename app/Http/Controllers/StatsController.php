<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function deposits(){
        return view('stats.deposits');
    }
}

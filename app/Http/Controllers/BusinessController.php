<?php

namespace App\Http\Controllers;

use App\Business;
use App\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class BusinessController extends Controller
{
    //

    public function index(Request $request){
        $business = Business::where('client_id', '=', Auth::user()->id)->first();
        return view('dashboard.indexBusiness', compact('business'));
    }

    public function update(Request $request){
        $business = Business::where('client_id', '=', Auth::user()->id)->first();
        $business->name = $request['name'];
        $business->razon_social = $request['razon_social'];
        $business->rfc_rut_cuit = $request['rfc_rut_cuit'];
        $business->address = $request['address'];
        $business->postal_code = $request['postal_code'];
        $business->phone = $request['phone'];
        $business->email = $request['email'];
        $business->pin = $request['pin'];
        $business->client_id = Auth::user()->id;
        $business->save();
        return view('dashboard.indexBusiness', compact('business'));
    }

    public function store(Request $request){
        $business = new Business();
        $business->name = $request['name'];
        $business->razon_social = $request['razon_social'];
        $business->rfc_rut_cuit = $request['rfc_rut_cuit'];
        $business->address = $request['address'];
        $business->postal_code = $request['postal_code'];
        $business->phone = $request['phone'];
        $business->email = $request['email'];
        $business->pin = $request['pin'];
        $business->pin_confirmation = $request['pin_confirmation'];
        $business->client_id = Auth::user()->id;
        $business->save();
        return redirect('/');
    }

    public function dashboardBusinessBankView(){
        return view('dashboard.bankAccount');
    }

    public function successTransactionsView(){
        return view('dashboard.successTransactions');
    }
    
    public function failedTransactionsView(){
        return view('dashboard.failTransactions');
    }

    public function dashboardSettingsView(){
        return view('dashboard.settings');
    }

    public function dashboardFilesView(){
        return view('dashboard.files');
    }

    public function dashboardTransactionsView(){
        return view('dashboard.transactions');
    }
    public function dashboardPOSView(){
        return view('dashboard.pos');

    }
    public function dashboardBankDataView(){
        return view('dashboard.bankData');

    }

    public function dashboardSecurityView(){
        return view('dashboard.security');

    }
    public function dashboardClientsView(){
        $buyers= Buyer::all();
        return view('dashboard.clients',['buyers'=>$buyers]);

    }

    
    
}

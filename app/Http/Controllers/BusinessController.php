<?php

namespace App\Http\Controllers;

use App\Business;
use App\Buyer;

use App\Product;
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

        $validatedData = $request->validate([
            'pin' => ['required', 'string', 'min:4','max:4', 'confirmed'],
        ],['pin.confirmed'=>'EL pin debe coincidir en ambos campos']);

        $business = Business::where('client_id', '=', Auth::user()->id)->first();
        $business->name = $request['name'];
        $business->razon_social = $request['razon_social'];
        $business->rfc_rut_cuit = $request['rfc_rut_cuit'];
        $business->address = $request['address'];
        $business->postal_code = $request['postal_code'];
        $business->ladanumber = $request['ladanumber'];
        $business->phone = $request['phone'];
        $business->email = $request['email'];
        $business->pin = $request['pin'];
        $business->pin_confirmation = $request['pin'];
        $business->client_id = Auth::user()->id;
        $business->save();
        return redirect('dashboard/settings');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'pin' => ['required', 'string', 'min:4','max:4', 'confirmed'],
        ],['pin.confirmed'=>'EL pin debe coincidir en ambos campos']);

        $business = new Business();
        $business->name = $request['name'];
        $business->razon_social = $request['razon_social'];
        $business->rfc_rut_cuit = $request['rfc_rut_cuit'];
        $business->address = $request['address'];
        $business->postal_code = $request['postal_code'];
        $business->ladanumber = $request['ladanumber'];
        $business->phone = $request['phone'];
        $business->email = $request['email'];
        $business->pin = $request['pin'];
        $business->pin_confirmation = $request['pin_confirmation'];
        $business->client_id = Auth::user()->id;
        $business->save();
        return redirect('dashboard/settings');
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
        $business = Business::where('client_id', '=', Auth::user()->id)->first();
        return view('dashboard.settings',['business'=>$business]);
    }

    public function dashboardFilesView(){
        $business = Business::where('client_id', '=', Auth::user()->id)->first();

        return view('dashboard.files',['business'=>$business]);
    }

    public function updateFiles(Request $request){
        $business = Business::where('client_id', '=', Auth::user()->id)->first();
        if( $request->hasFile('acta_constitutiva') ){
            $file = $request->file('acta_constitutiva')->store('files','public');
            $business->file_register = $file;
        }
        if( $request->hasFile('cedula_fiscal') ){
            $file = $request->file('cedula_fiscal')->store('files','public');
            $business->cedula = $file;
        }
        if( $request->hasFile('constancia_domicilio') ){
            $file = $request->file('constancia_domicilio')->store('files','public');
            $business->file_address = $file;
        }
        $business->save();

        $business = Business::where('client_id', '=', Auth::user()->id)->first();

        return view('dashboard.files',['business'=>$business]);
    }
   
    public function dashboardPOSView(){
        $buyers = Buyer::all();
        $products = Product::all();
        return view('dashboard.pos',['buyers'=>$buyers,'products'=>$products]);

    }
    public function dashboardBankDataView(){
        return view('dashboard.bankData');

    }

    public function dashboardSecurityView(){
        return view('dashboard.security');

    }

    public function dashboardSimulatorView(){
        return view('dashboard.simulator');
    }
   

    
    
}

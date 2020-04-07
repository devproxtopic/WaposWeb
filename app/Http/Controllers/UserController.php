<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Http\Requests\UserGeneralRequest;
use App\Profession;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
     /**
      * Vista formulario general
      */

      public function generalDataView(){
        $user = User::find(Auth::id());

        return view('users.general', compact('user'));
      }


      /**
     * Función para guardar datos generales
     */

     public function updateGeneralData(User $user, UserGeneralRequest $request){
        $country = Country::where('name', $request->country)->first();

        if(! $country){
            $country = Country::create(['name' => $request->country]);
        }

        $city = City::where('name', $request->city)
            ->where('country_id', $country->id)->first();

        if(! $city){
            $city = City::create(['name' => $request->city, 'country_id' => $country->id]);
        }

        $profession = Profession::where('name', $request->profession)->first();

        if(! $profession){
            $profession = Profession::create(['name' => $request->profession]);
        }

        $user->update($request->all());

        $user->country_id = $country->id;
        $user->city_id = $city->id;
        $user->profession_id = $profession->id;
        $user->save();

        return back()->with('user', $user)
            ->with('message', 'Datos actualizados con éxito.');

    }

    /**
     * Vista para editar contraseña conocida
     */

    public function editPassword(){
        return view('users.editPassword');
    }

    /**
     * Función para cambiar contraseña, conociendo la contraseña actual
     */

    public function updatePassword(Request $request){

        $validator = Validator::make($request->all(), [
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'password.required' => 'La contraseña actual es requerida.',
            'password.required' => 'La nueva contraseña es requerida.',
            'password.confirmed' => 'Las nueva contraseña y la confirmación deben ser iguales.',
            'password.min' => 'La nueva contraseña debe tener mínimo 8 caracteres.',
        ]);

        $validator->after(function ($validator) use ($request) {
            if ( !Hash::check($request->current_password, Auth::user()->password) ) {
                $validator->errors()->add('current_password', 'La contraseña actual es incorrecta.');
            }
        });

        if($validator->fails()){
            return view('users.editPassword')->with('errors', $validator->errors());
        }

        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();

        return view('users.editPassword')->with('message', 'Contraseña actualizada con éxito');
    }
}

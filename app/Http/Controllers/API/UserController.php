<?php

namespace App\Http\Controllers\API;

use App\City;
use App\Country;
use App\Http\Controllers\API\ResponseController as ResponseController;
use App\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends ResponseController
{
    // public function __construct()
    // {
    //     $this->middleware('verified');
    // }

    /**
     * Función para guardar datos generales
     */

     public function updateGeneralData(User $user, Request $request){
        $validator = Validator::make($request->all(), [
            'date_of_birth' => 'required|date',
            'country' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'profession' => 'required'
        ],
        [
            'date_of_birth.required' => 'La fecha de nacimiento es requerida.',
            'date_of_birth.date' => 'Debe introducir una fecha de nacimiento válida.',
            'country.required' => 'El pais es requerido.',
            'city.required' => 'La ciudad es requerida.',
            'gender.required' => 'El genero es requerido.',
            'profession.required' => 'La profesión es requerida.'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

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

        return response($user);
     }

     public function updatePassword(User $user, Request $request){

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

        $validator->after(function ($validator) use ($request, $user) {
            if ( !Hash::check($request->current_password, $user->password) ) {
                $validator->errors()->add('current_password', 'La contraseña actual es incorrecta.');
            }
        });

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();

        return response($user);
    }
}

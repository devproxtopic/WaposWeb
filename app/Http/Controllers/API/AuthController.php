<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail as Mail;
use Validator;

use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;

class AuthController extends ResponseController
{
    use VerifiesEmails;
    public $successStatus = 200;

    /**
     * Función para crear un usuario
     */

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required',
            'confirm_password' => 'required|same:password'
        ],
        [
            'name.required' => 'El nombre es requerido.',
            'name.string' => 'El nombre no debe contener números.',
            'lastname.required' => 'El apellido es requerido.',
            'lastname.string' => 'El apellido no debe contener números.',
            'email.required' => 'El email es requerido.',
            'email.email' => 'El formato del email es inválido.',
            'email.unique' => 'El email ya se encuentra en uso.',
            'password.required' => 'La contraseña es requerida.',
            'phone.required' => 'El teléfono es requerido',
            'confirm_password.required' => 'La confirmación de contraseña es requerido.',
            'confirm_password.same' => 'Las contraseñas y su confirmación deben coincidir.'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        if($user){
            $user->assignRole('member');

            $success['token'] =  $user->createToken('token')->accessToken;

            $user->access_token = json_encode($success['token']);
            $user->save();

            dd($user->sendApiEmailVerificationNotification());

            $success['message'] = "Usuario registrado exitosamente. Se ha enviado un correo para que verifique su cuenta.";

            return $this->sendResponse($success);
        }
        else{
            $error = "Ha ocurrido un error en el registro del usuario.";
            return $this->sendError($error, 401);
        }

    }

    /**
     * Función para inicio de sesión
     */

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            $error = "No esta autorizado.";
            return $this->sendError($error, 401);
        }

        $user = $request->user();

        if($user->email_verified_at !== NULL){

            $success['token'] =  $user->createToken('token')->accessToken;

            $user->access_token = json_encode($success['token']);
            $user->save();

            return $this->sendResponse($success);

        }

        return $this->sendError('Debe verificar su correo para acceder a la aplicación.', 401);
    }

    /**
     * Función para cerrar sesión
     */

    public function logout(Request $request)
    {

        $isUser = $request->user()->token()->revoke();
        if($isUser){
            $success['message'] = "Ha cerrado sesión exitosamente.";
            return $this->sendResponse($success);
        }
        else{
            $error = "Ha ocurrido un error.";
            return $this->sendResponse($error);
        }


    }

    /**
     * Función para obtener usuario
     */

    public function getUser(Request $request)
    {
        //$id = $request->user()->id;
        $user = $request->user();
        if($user){
            return $this->sendResponse($user);
        }
        else{
            $error = "Usuario no encontrado";
            return $this->sendResponse($error);
        }
    }

}

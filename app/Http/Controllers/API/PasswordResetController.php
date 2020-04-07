<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\User;
use App\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
        ],
        [
            'email.required' => 'El email es requerido',
            'email.string' => 'El email tiene un formato inválido',
            'email.email' => 'El email tiene un formato inválido'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::where('email', $request->email)->first();

        if (!$user){
            return response()->json(['message' => 'Este correo no se encuentra registrado.'], 404);
        }

        $passwordReset = PasswordReset::updateOrCreate(
            [
                'email' => $user->email
            ],
            [
                'email' => $user->email,
                'token' => Str::random(60),
                'created_at' => now()
             ]
        );

        if ($user && $passwordReset){
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
            );
        }

        return response()->json([
            'message' => 'Hemos enviado un correo para que recupere su contraseña.'
        ]);
    }
    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)
            ->first();

        if (!$passwordReset){
            return response()->json([
                'message' => 'Este token de recuperación es inválido.'
            ], 404);
        }

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'Este token de recuperación es inválido.'
            ], 404);
        }

        return response()->json($passwordReset);
    }
     /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();

        if (!$passwordReset){
            return response()->json([
                'message' => 'Este token de recuperación es inválido.'
            ], 404);
        }

        $user = User::where('email', $passwordReset->email)->first();
        if (!$user){
            return response()->json([
                'message' => 'Email no registrado.'
            ], 404);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        $passwordReset->delete();

        $user->notify(new PasswordResetSuccess($passwordReset));
        return response()->json($user);
    }
}

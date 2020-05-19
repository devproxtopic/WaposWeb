<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([ 'prefix' => 'auth'], function (){
    Route::group(['middleware' => ['guest:api']], function () {
        Route::post('login', 'API\AuthController@login');
        Route::post('signup', 'API\AuthController@signup');
    });
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'API\AuthController@logout');
        Route::get('getuser', 'API\AuthController@getUser');
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::put('update-user-general-data/{user}', 'API\UserController@updateGeneralData')
        ->name('api.general-user');
    Route::put('update-user-admin-data/{user}', 'API\UserController@updateAdminData');

    Route::put('/update-password/{user}', 'API\UserController@updatePassword');

    Route::post('email/resend', 'API\VerificationApiController@resend')
        ->name('verificationapi.resend');
});

Route::get('email/verify/{id}', 'API\VerificationApiController@verify')
    ->name('verificationapi.verify');

Route::post('send-password-reset', 'API\PasswordResetController@create');
Route::get('password/find/{token}', 'API\PasswordResetController@find');
Route::post('reset-password', 'API\PasswordResetController@reset');



Route::post('/payment','PaymentController@paymentProcess');
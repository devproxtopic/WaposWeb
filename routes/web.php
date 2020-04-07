<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');

    Route::get('/general-data', 'UserController@generalDataView');
    Route::get('/admin-data', 'UserController@adminDataView');
    Route::get('/edit-password', 'UserController@editPassword');
    Route::post('/update-password', 'UserController@updatePassword');

    Route::put('/update-general-data/{user}', 'UserController@updateGeneralData')
        ->name('update.general_users');

    Route::put('/update-admin-data/{user}', 'UserController@updateAdminData')
        ->name('update.admin_users');
    Route::get('/users', 'UserController@index');

    Route::get('/users/edit/{id}', 'UserController@edit')
        ->name('users.edit');
    Route::put('/users/update/{id}', 'UserController@update')
        ->name('users.update');

    Route::get('/users/create', 'UserController@create');
    Route::post('/users/store', 'UserController@store')
        ->name('users.store');

    Route::get('logout', 'Auth\LoginController@logout', function () {
        return abort(404);
    });
});

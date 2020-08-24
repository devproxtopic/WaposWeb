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
Route::get('/products/product/{id}/details/', 'SharableLinkController@productLink');

Route::get('/negocios/orders/{id}/details/', 'PaymentController@paymentForm');

Route::post('/dashboard/transactions/create', 'OrderController@createTransaction');
Route::post('/checkout/shipping', 'OrderController@handle');
Route::get('/checkout/purchase', 'OrderController@billPocketRedirect');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');

    Route::post('/dashboard/products/create', 'ProductController@createProduct');
    Route::get('/products/{id}', 'ProductController@product');
    // Route::get('/products/{id}', 'ProductController@product');

    Route::get('/buyers/{id}', 'BuyerController@buyer');
    Route::post('/dashboard/clients/create', 'BuyerController@store');
    Route::get(' /dashboard/clients', 'BuyerController@dashboardClientsView');

    Route::post('/messages/create', 'MessageController@create');
    Route::post('/messages/create-express', 'MessageController@storeExpress');
    Route::get('/dashboard/pos', 'MessageController@createPos');
    Route::get('/dashboard/pos-express', 'MessageController@createPosExpress');

    Route::get('/dashboard/myBusiness', 'BusinessController@index');
    Route::get('/dashboard/banks', 'BusinessController@dashboardBusinessBankView');
    Route::get(' /dashboard/simulator', 'BusinessController@dashboardSimulatorView');
    Route::get('/dashboard/settings', 'BusinessController@dashboardSettingsView');
    Route::put('/dashboard/settings/update', 'BusinessController@update');
    Route::get('/dashboard/files', 'BusinessController@dashboardFilesView');
    Route::post('/dashboard/files/update', 'BusinessController@updateFiles');
    Route::get('/dashboard/BankInformation', 'BusinessController@dashboardBankDataView');
    Route::get('/dashboard/Security', 'BusinessController@dashboardSecurityView');
    Route::get('/dashboard/transactions/success', 'BusinessController@successTransactionsView');
    Route::get('/dashboard/transactions/failed', 'BusinessController@failedTransactionsView');
    Route::post('/dashboard/business/create', 'BusinessController@store');
    Route::post('/dashboard/business/update', 'BusinessController@update');

    Route::get('/general-data', 'UserController@generalDataView');
    Route::get('/admin-data', 'UserController@adminDataView');
    Route::get('/dashboard/products', 'UserController@dashboardProductsDataView');
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

    Route::get('/dashboard/transactions', 'OrderController@dashboardTransactionsView');
    Route::get('/dashboard/orders', 'OrderController@index');
    Route::get('/dashboard/orders/create', 'OrderController@create');
    Route::post('/dashboard/orders/create', 'OrderController@store');

    Route::get('/dashboard/stats-deposits', 'StatsController@deposits');
});

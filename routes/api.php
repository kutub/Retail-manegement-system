<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/items', 'ItemController@getItems');
Route::get('/office', 'OfficeController@officeInfo');
Route::put('/purchase-update', 'ItemController@purchaseUpdate');
Route::get('/find-item/{query}', 'ItemController@findItem');
Route::get('/edit/{id}', 'products\ProductsController@show');
Route::get('/find-customer/{query}', 'customers\CustomersController@findCustomer');
Route::get('/find-supplier/{query}', 'supplier\SupplierController@findSupplier');
Route::post('/add-customer', 'customers\CustomersController@addCustomer');
Route::apiResource('/quote', 'sales\QuotesController');
Route::apiResource('/pquote', 'products\PquotesController');
Route::post('/order', 'sales\OrdersController@store');
Route::put('/order/{id}/edit', 'sales\OrdersController@update');
Route::post('/purchase', 'products\PurchasingController@store');
Route::get('/order/{id}', 'sales\OrdersController@orderFindById');
Route::get('/lastOrder', 'sales\OrdersController@lastOrder');
Route::post('/item', 'ItemController@saveItem');
Route::get('/customer/{id}', '\App\Http\Controllers\Api\Customer\CustomerController@show');
Route::get('/supplier/{id}', '\App\Http\Controllers\Api\Supplier\SupplierController@show');
Route::get('/customers', '\App\Http\Controllers\Api\Customer\CustomerController@index');


Route::prefix('user')->group( function(){
    
    Route::middleware('auth:api')->apiResource('/expense', '\App\Http\Controllers\Api\Accounts\ExpenseController');

    Route::middleware('auth:api')->apiResource('/receive', '\App\Http\Controllers\Api\Accounts\ReceivesController');

    Route::middleware('auth:api')->apiResource('/deposit', '\App\Http\Controllers\Api\Accounts\DepositsController');

    Route::middleware('auth:api')->apiResource('/drawings', '\App\Http\Controllers\Api\Accounts\DrawingsController');

    Route::middleware('auth:api')->get('/customers', '\App\Http\Controllers\Api\Customer\CustomerController@index');
    Route::middleware('auth:api')->get('/customer/{id}', '\App\Http\Controllers\Api\Customer\CustomerController@show');
    Route::middleware('auth:api')->post('/add-customer', 'customers\CustomersController@addCustomer');
    Route::middleware('auth:api')->post('/customer/{id}/edit', '\App\Http\Controllers\Api\Customer\CustomerController@update');
    Route::middleware('auth:api')->get('/customer/{id}/edit', '\App\Http\Controllers\Api\Customer\CustomerController@edit');

    Route::middleware('auth:api')->get('/suppliers', '\App\Http\Controllers\Api\Supplier\SupplierController@index');
    Route::middleware('auth:api')->get('/supplier/{id}', '\App\Http\Controllers\Api\Supplier\SupplierController@show');
    Route::middleware('auth:api')->post('/add-supplier', '\App\Http\Controllers\Api\Supplier\SupplierController@store');
    Route::middleware('auth:api')->post('/supplier/{id}/edit', '\App\Http\Controllers\Api\Supplier\SupplierController@update');
    Route::middleware('auth:api')->get('/supplier/{id}/edit', '\App\Http\Controllers\Api\Supplier\SupplierController@edit');

    Route::middleware('auth:api')->get('/items', 'ItemController@getItems');
    Route::middleware('auth:api')->post('/item', 'ItemController@saveItem');
    Route::middleware('auth:api')->get('item/{id}', 'products\ProductsController@show');
    Route::middleware('auth:api')->post('item/{id}/edit', 'products\ProductsController@update');
    Route::middleware('auth:api')->get('/find-item/{query}', 'ItemController@findItem');

    Route::post('/login', '\App\Http\Controllers\Auth\Api\LoginController@login');
    Route::post('/register', '\App\Http\Controllers\Api\UserController@store');
    Route::middleware('auth:api')->get('/all', '\App\Http\Controllers\Api\UserController@index');
    Route::middleware('auth:api')->get('/{id}', '\App\Http\Controllers\Api\UserController@show');
    Route::middleware('auth:api')->post('/{id}/edit', '\App\Http\Controllers\Api\UserController@update');    

});
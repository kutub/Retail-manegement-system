<?php

use App\Http\Middleware\CheckSubscriber;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect(app()->getLocale().'/home');
});

Route::group([
    'prefix' => '{local?}/home',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'], function () {
   
    Auth::routes();
    Route::prefix('manage')->middleware('role:superadministrator|administrator')->group( function(){
        Route::get('/', 'ManageController@index');
        Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
        Route::resource('/users', 'UserController');
        Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
        Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
    });
    Route::get('/', function () {
        return redirect()->route('home');
    });
    Route::get('/welcome', function () {
        return view('welcome');
    });

 
    Route::middleware([CheckSubscriber::class])->group(function(){

        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('/supplier', 'supplier\SupplierController');
        Route::resource('/category', 'products\CategoryController');
        Route::resource('/product', 'products\ProductsController');
        Route::resource('/purchasing', 'products\PurchasingController');
        Route::resource('/import', 'ImportExcelController');
        Route::resource('/customer', 'customers\CustomersController');
        // Route::resource('/invoice', 'invoice\InvoiceController');
        Route::resource('/order', 'sales\OrdersController');
        Route::resource('/receive', 'accounts\ReceivesController');
        Route::resource('/cash', 'accounts\CashController');
        Route::resource('/bank', 'accounts\BankController');
        Route::resource('/office', 'OfficeController');
    
        Route::prefix('account')->group(function(){ 
            Route::resource('/', 'accounts\AccountsController');
            Route::resource('/receive', 'accounts\ReceivesController');
            Route::resource('/expense', 'accounts\ExpensesController');
            Route::resource('/drawings', 'accounts\DrawingsController');
            Route::resource('/deposit', 'accounts\DepositsController');
        });
    
        Route::prefix('items')->group(function(){
            Route::post('/', 'ItemController@saveItem');
            Route::get('/unique', 'ItemController@checkUnique');
            Route::post('/search', 'ItemController@search');
            Route::get('/categories', 'ItemController@categories');
            Route::get('/suppliers', 'ItemController@suppliers');
            Route::get('/attributes', 'ItemController@attributes');
            // Route::get('/attribute/create', 'ItemController@attributeCreate');
            Route::get('/attribute/{id}', 'ItemController@attributeShow');
            Route::get('/{id}/attribute/create', 'ItemController@createAttribute');
            Route::post('/add-image', 'ItemController@uploadImage');
        });
    
        Route::get('/sales/{any?}', 'sales\SalesController@index')
        ->where('any', '.*');

        Route::get('/product/{any?}', 'products\ProductsController@index')
        ->where('any', '.*');
        
    });
});

Route::prefix('manage')->middleware('role:superadministrator|administrator')->group( function(){
    Route::get('/', 'ManageController@index');
    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
    Route::resource('/users', 'UserController');
    Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
    Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
});
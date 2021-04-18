<?php

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
    return view('store/paywithpaypal');
});
Route::post('paypal','PaymentController@paywithpaypal');
Route::get('status','PaymentController@getPaymentStatus');

//\Illuminate\Support\Facades\Auth::routes();
//
//
//Route::get('/', 'ProductsController@index');
//Route::get('cart', 'ProductsController@cart');
//Route::get('add-to-cart/{id}', 'ProductsController@addToCart');
//Route::patch('update-cart', 'ProductsController@update');
//Route::delete('remove-from-cart', 'ProductsController@remove');
//
//Route::post('/cart', 'ProductsController@storeOrder')->name('cart.order.store');
//
//
//
//Route::namespace('Backend')->prefix('admin')->group(function (){
//    Route::get('/','Home@index');
//    Route::get('users','Users@index');
//    Route::resource('users','Users');
//    Route::resource('orders','Orders');
//    Route::get('users/edit/{id}', [\App\Http\Controllers\BackEnd\Users::class, 'edit']);
//    Route::put('users/update/{id}', [\App\Http\Controllers\BackEnd\Users::class, 'update']);
//    Route::delete('users/destroy/{id}', [\App\Http\Controllers\BackEnd\Users::class, 'destroy']);
//
//
//});
//
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/users/export', 'UsersExportController@export');
//Route::get('/products/export', 'ProductsController@export');
//Route::get('/orders/export', 'OrderController@export');

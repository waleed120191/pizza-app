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

use \App\Http\Middleware\CartIsEmpty;

Route::get('/', 'HomeController');
Route::post('/add-to-cart/{product}', 'CartController@add')->name('cart.add');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::delete('/cart/destroy/{itemId}', 'CartController@destroy')->name('cart.destroy');
Route::put('/cart/update/{itemId}', 'CartController@update')->name('cart.update');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware(CartIsEmpty::class);

Route::post('store', 'OrderController@store')->name('orders.store');
Route::get('order/history', 'OrderController@history')->name('order.history');

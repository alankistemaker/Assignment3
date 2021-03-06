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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('orders', 'OrderController');

Route::put('addmenuitemtoorder/{id}', 'OrderController@addMenuItem')->name('addmenuitemtoorder');
Route::get('addmenuitemtoorder/{id}', 'OrderController@addMenuItem');

Route::put('removemenuitemfromorder/{order_id}/{menu_item_id}', 'OrderController@removeMenuItem')->name('removemenuitemfromorder');
Route::get('removemenuitemfromorder/{order_id}/{menu_item_id}', 'OrderController@removeMenuItem');

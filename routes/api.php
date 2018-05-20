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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Menu API routes
Route::get('menus', 'CUDMenuAPIController@index');
Route::get('menus/show', 'CUDMenuAPIController@show');
Route::post('menus/store', 'CUDMenuAPIController@store');
Route::put('menus/update', 'CUDMenuAPIController@update');
Route::delete('menus/destroy', 'CUDMenuAPIController@destroy');

// User API routes
Route::get('users', 'CUDUserAPIController@index');
Route::get('users/show', 'CUDUserAPIController@show');
Route::post('users/store', 'CUDUserAPIController@store');
Route::put('users/update', 'CUDUserAPIController@update');
Route::delete('users/destroy', 'CUDUserAPIController@destroy');

// Staff API routes
Route::get('staff', 'CUDStaffAPIController@index');
Route::get('staff/show', 'CUDStaffAPIController@show');
Route::post('staff/store', 'CUDStaffAPIController@store');
Route::put('staff/update', 'CUDStaffAPIController@update');
Route::delete('staff/destroy', 'CUDStaffAPIController@destroy');

// Menu_Item API routes
Route::get('menuitems', 'CUDMenuItemAPIController@index');
Route::get('menuitems/show', 'CUDMenuItemAPIController@show');
Route::post('menuitems/store', 'CUDMenuItemAPIController@store');
Route::put('menuitems/update', 'CUDMenuItemAPIController@update');
Route::delete('menuitems/destroy', 'CUDMenuItemAPIController@destroy');

// Customer API routes
Route::get('customers', 'CUDCustomerAPIController@index');
Route::get('customers/show', 'CUDCustomerAPIController@show');
Route::post('customers/store', 'CUDCustomerAPIController@store');
Route::put('customers/update', 'CUDCustomerAPIController@update');
Route::delete('customers/destroy', 'CUDCustomerAPIController@destroy');

// Order API routes
Route::get('orders', 'CUDOrderAPIController@index');
Route::get('orders/show', 'CUDOrderAPIController@show');
Route::post('orders/store', 'CUDOrderAPIController@store');
Route::put('orders/update', 'CUDOrderAPIController@update');
Route::delete('orders/destroy', 'CUDOrderAPIController@destroy');
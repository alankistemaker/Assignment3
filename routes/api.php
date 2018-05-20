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

Route::get('menus', 'CUDMenuAPIController@index');
Route::get('menus/show', 'CUDMenuAPIController@show');
Route::post('menus/store', 'CUDMenuAPIController@store');
Route::put('menus/update', 'CUDMenuAPIController@update');
Route::delete('menus/destroy', 'CUDMenuAPIController@destroy');

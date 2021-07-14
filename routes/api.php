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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/produk', 'ProdukController@index');
Route::post('/produk', 'ProdukController@simpan');
Route::get('/produk/{id_produk}', 'ProdukController@detail');


//Route::get('/cart', 'CartController@index');
//Route::Post('/cart', 'ProdukController@simpan');

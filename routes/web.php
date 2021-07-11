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

// Admin
Route::get('/', function () {
    return view('welcome');
});

Route::get('pages/admin','AdminController@index')->name('dashboard');

Route::get('pages/admin/produk','AdminController@produk')->name('produk');
Route::post('pages/admin/produk','AdminController@addproduk')->name('addproduk');
Route::post('pages/admin/produk/edit','AdminController@editproduk')->name('editproduk');

Route::get('pages/admin/kode','AdminController@payment')->name('payment');
Route::post('pages/admin/kode','AdminController@addpayment')->name('addpayment');
Route::post('pages/admin/kode/editpay','AdminController@editpay')->name('editpay');

Route::get('pages/admin/tb_checkout','AdminController@tb_checkout')->name('tb_checkout');
Route::post('pages/admin/confirm','AdminController@confirm')->name('confirm');

Route::get('pages/admin/image_home','AdminController@image_home')->name('image_home');
Route::post('pages/admin/image_home','AdminController@addimageh')->name('addimageh');
Route::post('pages/admin/image_home/edima','AdminController@edima')->name('edima');

Route::get('pages/register','AdminController@register')->name('register');
Route::post('pages/register','AdminController@adminreg')->name('adminreg');

// End Admin
Route::get('logout','HomeController@logout')->name('logout');
// Pembeli
// Route::get('/', 'HomeController@index')->name('home');

Route::get('login', 'HomeController@login')->name('login');
Route::post('login','HomeController@ceklogin')->name('ceklogin');
Route::get('register','HomeController@register')->name('register');
Route::post('register','HomeController@addreg')->name('addreg');

Route::get('products', 'HomeController@products')->name('products');

Route::get('cart', 'HomeController@cart')->name('cart');
Route::post('cart', 'HomeController@addcart')->name('addcart');
Route::post('cart/edit', 'HomeController@editcart')->name('editcart');
Route::get('cart/delete_cart/{id_cart}', 'HomeController@delete_cart');

Route::get('checkout', 'HomeController@checkout')->name('checkout');
Route::post('checkout', 'HomeController@transaksi')->name('transaksi');

Route::get('detail_checkout', 'HomeController@detail_checkout')->name('detail_checkout');
// End Pembeli
<?php

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


Route::get('/', 'HomeController@index')->middleware(['verified','validated']);

Auth::routes(['verify' => true]);

Route::resource('usuarios', 'UserController');

Route::resource('products', 'ProductsController')->middleware(['verified','validated']);

Route::resource('roles', 'RoleController')->middleware(['verified','validated']);

Route::post('/categories','CategoryController@filter');

Route::resource('shops','ShopController')->middleware(['verified','validated']);

Route::resource('carts','CartController')->middleware(['verified','validated']);

Route::post('add-to-cart/{product}', 'ShopController@addToCart')->name('shops.addToCart');

Route::get('shopping-cart', 'ShopController@showCart')->name('shops.showCart');

Route::get('checkout', 'ShopController@getCheckout')->name('shops.getCheckout');


Route::post('payment', 'ShopController@payment')->name('shops.payment');












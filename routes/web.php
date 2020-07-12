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

Route::get('/', function () {
    return view('welcome');

})->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index');

Route::resource ('usuarios', 'UserController')->middleware('auth');

/* SECCION PRODUCTOS

  GET /products => index
POST/productos => Store
GET/products/create => Formulario para crear

GET/products/:id => Mostrar un producto con id
GET/products/:id/edit => Formulario de edicion de producto
PUT/PATCH/:id => actualiza el producto
DELETE /products/:id => Elimina el producto
 */

Route::resource('products', 'ProductsController')
;





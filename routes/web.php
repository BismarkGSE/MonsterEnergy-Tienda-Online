<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

  /************** INICIO CATEGORIAS **************/
  // CATEGORIAS GET
  Route::get('categorias', [CategoriasController::class, 'show'])->name('categorias');
  Route::get('insertar-categorias', [CategoriasController::class, 'create'])->name('categorias.insert');
  Route::get('modificar-categorias/{id}', [CategoriasController::class, 'edit'])->name('categorias.update');
  Route::get('borrar-categorias/{id}', [CategoriasController::class, 'destroyShow'])->name('categorias.delete');
  // CATEGORIAS POST
  Route::post('insertar-categorias', [CategoriasController::class, 'create'])->name('categorias.insert-post');
  // CATEGORIAS PUT
  Route::put('modificar-categorias/{id}', [CategoriasController::class, 'update'])->name('categorias.update-put');
  // CATEGORIAS DELETE
  Route::delete('borrar-categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.delete-delete');
  /************** FIN CATEGORIAS **************/

  /************** INICIO PRODUCTOS **************/
  // PRODUCTOS GET
	Route::get('productos', [ProductosController::class, 'show'])->name('productos');
  Route::get('insertar-productos', [ProductosController::class, 'create'])->name('productos.insert');
  Route::get('modificar-productos/{id}', [ProductosController::class, 'edit'])->name('productos.update');
  Route::get('borrar-productos/{id}', [ProductosController::class, 'destroyShow'])->name('productos.delete');
  // PRODUCTOS POST
  Route::post('insertar-productos', [ProductosController::class, 'create'])->name('productos.insert-post');
  // PRODUCTOS PUT
  Route::put('modificar-productos/{id}', [ProductosController::class, 'update'])->name('productos.update-put');
  // PRODUCTOS DELETE
  Route::delete('borrar-productos/{id}', [ProductosController::class, 'destroy'])->name('productos.delete-delete');
  /************** FIN PRODUCTOS **************/

  /************** INICIO PEDIDOS **************/
  // PEDIDOS
	Route::get('pedidos', function () {
		return view('pages.pedidos');
	})->name('pedidos');
  /************** FIN PEDIDOS **************/

	/*Route::get('map', function () {
		return view('pages.map');
	})->name('map');*/

	/*Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');*/

	/*Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');*/

	/*Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');*/
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CartController;

/* MAIN */
Route::get('/', [UsuariosController::class, 'show'])->name('main');
Auth::routes();
/* GET */
Route::get('/', [UsuariosController::class, 'show'])->name('main.show');
Route::get('/categoria/{id}', [UsuariosController::class, 'show_categoria'])->name('main.show-categoria');
Route::get('/user-login', [UsuariosController::class, 'login'])->name('main.login');
/* POST */
Route::post('/user-register', [UsuariosController::class, 'create'])->name('main.insert');
Route::post('/user-login', [UsuariosController::class, 'login'])->name('main.login');
/* LOGOUT */
Route::get('/logout', [UsuariosController::class, 'logout'])->name('main.logout');

/* ACCOUNT */
Route::get('/account', [UsuariosController::class, 'account'])->name('account');
Route::get('/myCart', [UsuariosController::class, 'myCarrito'])->name('mi.carrito');

/* PRODUCTO */
Route::get('/producto/{id}', [UsuariosController::class, 'store'])->name('product.info');
Route::get('/add-cart', [PedidosController::class, 'create'])->name('cart.shop');

/* CART */
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

/* HOME */
Route::get('/admin', [HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/admin', 'App\Http\Controllers\HomeController@index')->name('admin')->middleware('auth');

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
  Route::get('pedidos', [PedidosController::class, 'show'])->name('pedidos');
  Route::get('insertar-pedidos', [PedidosController::class, 'create'])->name('pedidos.insert');
  Route::get('modificar-pedidos/{id}', [PedidosController::class, 'edit'])->name('pedidos.update');
  Route::get('borrar-pedidos/{id}', [PedidosController::class, 'destroyShow'])->name('pedidos.delete');
  // PEDIDOS POST
  Route::post('insertar-pedidos', [PedidosController::class, 'create'])->name('pedidos.insert-post');
  // PEDIDOS PUT
  Route::put('modificar-pedidos/{id}', [PedidosController::class, 'update'])->name('pedidos.update-put');
  // PEDIDOS DELETE
  Route::delete('borrar-pedidos/{id}', [PedidosController::class, 'destroy'])->name('pedidos.delete-delete');
  /************** FIN PEDIDOS **************/

});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

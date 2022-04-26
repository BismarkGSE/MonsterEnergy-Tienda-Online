<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Productos;
use App\Models\Categorias;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function show()
    {
      $datos = Productos::join("categorias","productos.idCategoria", "=", "categorias.id")->select("productos.id","productos.nombreProducto","categorias.name","productos.stock","productos.precio","productos.img")->get();
      $categorias = Categorias::all();
      return view('main', compact('datos','categorias'));
    }

    public function showCategorias($id)
    {

      $categorias = Categorias::all();
      $datos = Productos::join("categorias","productos.idCategoria", "=", "categorias.id")->select("productos.id","productos.nombreProducto","categorias.name","productos.stock","productos.precio","productos.img")->where('categorias.name',$id)->get();
      return view('main', compact('datos','categorias'));

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Productos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
      $datos = Productos::join("categorias","productos.idCategoria", "=", "categorias.id")->select("productos.id","productos.nombreProducto","categorias.name","productos.stock","productos.precio","productos.img")->get();
      return view('main', compact('datos'));
    }

}

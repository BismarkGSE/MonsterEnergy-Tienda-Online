<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Categorias;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if ( $_POST ) {

        $validated = $request->validate([
          'nombreProducto' => 'required',
          'idCategoria' => 'required',
          'stock' => 'required',
          'precio' => 'required',
          'img' => 'required',
        ]);

        $productos = new Productos();
        $productos->nombreProducto = $request->post('nombreProducto');
        $productos->idCategoria = $request->post('idCategoria');
        $productos->stock = $request->post('stock');
        $productos->precio = $request->post('precio');

        if ( $img = $request->file('img') ) {
          $rutaGuardarImg = 'img/productos/';
          $imgProducto = time() . '_' . $img->getClientOriginalName();
          $img->move($rutaGuardarImg, $imgProducto);
          $productos->img = $rutaGuardarImg . '/' . $imgProducto;
        }

        $productos->save();

        return redirect()->route('productos')->with("success", "Agregado con exito !");
      } else {
        $datos = Categorias::all();
        return view('pages.productos.insert-products', compact('datos'));
      }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
      if ( $_GET ) {
        $search = $_GET['search'];
        $datos = Productos::join("categorias","productos.idCategoria", "=", "categorias.id")->select("productos.id","productos.nombreProducto","categorias.name","productos.stock","productos.precio","productos.img")->where('productos.nombreProducto','LIKE','%'.$search.'%')->get();
        return view('pages.productos.productos', compact('datos'));
      } else {
        $datos = Productos::join("categorias","productos.idCategoria", "=", "categorias.id")->select("productos.id","productos.nombreProducto","categorias.name","productos.stock","productos.precio","productos.img")->get();
        return view('pages.productos.productos', compact('datos'));
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $productos = Productos::find($id);
      $datos = Categorias::all();
      $catProd = Categorias::find($productos->idCategoria);
      return view('pages.productos.update-products', compact('productos','datos','catProd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $productos = Productos::find($id);
      $productos->nombreProducto = $request->post('nombreProducto');
      $productos->idCategoria = $request->post('idCategoria');
      $productos->stock = $request->post('stock');
      $productos->precio = $request->post('precio');

      if ( $img = $request->file('img') ) {
        $rutaGuardarImg = 'img/productos/';
        $imgProducto = time() . '_' . $img->getClientOriginalName();
        $img->move($rutaGuardarImg, $imgProducto);
        $productos->img = $rutaGuardarImg . $imgProducto;
      }

      $productos->save();

      return redirect()->route('productos')->with("success", "Actualizado con exito !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroyShow($id)
    {
      $productos = Productos::find($id);
      $categoria = Categorias::find($productos->idCategoria);
      return view('pages.productos.delete-products', compact('productos','categoria'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $productos = Productos::find($id);
      $productos->delete();
      return redirect()->route('productos')->with('success','Eliminado con exito !');
    }

}

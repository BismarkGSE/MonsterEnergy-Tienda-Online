<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //return view('pages.categorias.categorias');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      // POST
      if ( $_POST ) {
        $categoria = new Categorias();
        $categoria->name = $request->post('name');
        $categoria->save();

        return redirect()->route('categorias')->with("success", "Agregado con exito !");
      } else {
        return view('pages.categorias.insert-category');
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
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

      if ( $_GET ) {
        $search = $_GET['search'];
        $datos = Categorias::where('name','LIKE','%'.$search.'%')->get();
        return view('pages.categorias.categorias', compact('datos'));
      } else {
        $datos = Categorias::all();
        return view('pages.categorias.categorias', compact('datos'));
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categorias = Categorias::find($id);
      return view('pages.categorias.update-category', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $categorias = Categorias::find($id);
      $categorias->name = $request->post('name');
      $categorias->save();

      return redirect()->route('categorias')->with("success", "Actualizado con exito !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroyShow($id)
    {
      $categorias = Categorias::find($id);
      return view('pages.categorias.delete-category', compact('categorias'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $categorias = Categorias::find($id);
      $categorias->delete();
      return redirect()->route('categorias')->with('success','Eliminado con exito !');
    }
}

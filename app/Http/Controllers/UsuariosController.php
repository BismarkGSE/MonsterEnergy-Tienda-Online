<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Productos;
use App\Models\Categorias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
      if ( $_POST ) {

        $credenciales = $request->validate([
          'email' => ['required','email'],
          'password' => ['required'],
        ]);

        if ( Auth::guard('usuarios')->attempt($credenciales) ) {
          $request->session()->regenerate();
          return redirect()->intended(route('main.show'));
        } else {
          return redirect()->route('main.login')->with("error", "Usuario o contraseña incorrectos");
        }

      } else {
        return view('usuarios.login');
      }

    }

    public function logout(Request $request)
    {
      Auth::guard('usuarios')->logout();
      return redirect()->route('main.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      $validated = $request->validate([
        'email' => 'required',
        'password' => 'required',
      ]);

      if ( $request->post('password') == $request->post('password_repit') ) {
        $usuarios = new Usuarios();
        $usuarios->nombre = $request->post('nombre');
        $usuarios->username = $request->post('username');
        $usuarios->email = $request->post('email');
        $usuarios->password = Hash::make($request->post('password'));
        $usuarios->save();
        return redirect()->route('main.show');
      } else {
        return redirect()->route('main.login')->with("error", "Las contraseñas no coinciden !");
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
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
     public function show()
     {
       if ( $_GET ) {
         $search = $_GET['search'];
         $datos = Productos::join("categorias","productos.idCategoria", "=", "categorias.id")->select("productos.id","productos.nombreProducto","categorias.name","productos.stock","productos.precio","productos.img")->where('productos.nombreProducto','like','%'.$search.'%')->get();
         $categorias = Categorias::all();
         return view('main', compact('datos','categorias'));
       } else {
         $datos = Productos::join("categorias","productos.idCategoria", "=", "categorias.id")->select("productos.id","productos.nombreProducto","categorias.name","productos.stock","productos.precio","productos.img")->get();
         $categorias = Categorias::all();
         return view('main', compact('datos','categorias'));
       }
     }


     public function show_categoria($id) {
       $categorias = Categorias::all();
       $datos = Productos::join("categorias","productos.idCategoria", "=", "categorias.id")->select("productos.id","productos.nombreProducto","categorias.name","productos.stock","productos.precio","productos.img")->where('categorias.name',$id)->get();
       return view('main', compact('datos','categorias'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Usuarios;
use App\Models\DetallesPedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
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
    public function create()
    {

      $cart = \Cart::getContent();
      $idUsuario = auth()->guard('usuarios')->user()->id;

      $ped = new Pedidos();
      $ped->idUsuario = $idUsuario;
      $ped->fecha = Date('Y-m-d');
      $ped->estado = 'pendiente';
      $ped->save();

      $idPedido = Pedidos::select('id')->max('id');

      foreach ($cart as $item) {
        $detalle = new DetallesPedidos();
        $detalle->idPedido = $idPedido;
        $detalle->idProducto = $item->id;
        $detalle->precio = $item->precio;
        $detalle->cantidad = $item->quantity;
        $detalle->save();
      }

      \Cart::clear();

      return redirect()->route('main.show')->with("success", "Compra realizada con exito !");

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
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $datos = Pedidos::join('usuarios','pedidos.idUsuario', '=', 'usuarios.id')->select('pedidos.id','usuarios.email','pedidos.fecha','pedidos.estado')->get();
      return view('pages.pedidos.pedidos', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedidos $pedidos)
    {
        //
    }
}

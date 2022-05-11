<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class CartController extends Controller
{

  public function cartList()
  {
    if ( \Auth::guard('usuarios')->check() ) {
      $cartItems = \Cart::getContent();
      return view('cart.cart', compact('cartItems'));
    } else {
      return redirect()->route('main.login');
    }
  }


  public function addToCart(Request $request)
  {
      \Cart::add([
          'id' => $request->id,
          'nombreProducto' => $request->nombreProducto,
          'precio' => $request->precio,
          'quantity' => $request->quantity,
          'attributes' => array(
          'img' => $request->img,
          )
      ]);
      session()->flash('success', 'Product is Added to Cart Successfully !');

      return redirect()->route('cart.list');
  }

  public function updateCart(Request $request)
  {
    $stockQuery = Productos::select('stock')->where('id',$request->id)->get();
    $stock = $stockQuery[0]->stock;
    if ( $request->quantity <= $stock ) {
      \Cart::update(
          $request->id,
          [
              'quantity' => [
                  'relative' => false,
                  'value' => $request->quantity
              ],
          ]
      );

      session()->flash('success', 'Item Cart is Updated Successfully !');
      return redirect()->route('cart.list');
    } else {
      session()->flash('error', 'Stock superado !');
      return redirect()->route('cart.list');
    }

  }

  public function removeCart(Request $request)
  {
      \Cart::remove($request->id);
      session()->flash('success', 'Item Cart Remove Successfully !');

      return redirect()->route('cart.list');
  }

  public function clearAllCart()
  {
      \Cart::clear();

      session()->flash('success', 'All Item Cart Clear Successfully !');

      return redirect()->route('cart.list');
  }

  public function addToDataBase(Request $request) {

  }

}

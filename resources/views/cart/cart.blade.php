@extends('layouts.frontend')
@section('content')
<main class="my-8">
  <div class="container px-6 mx-auto">
    <div class="flex justify-center my-6">
      <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
        @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p class="text-green-800">{{ $message }}</p>
          </div>
        @endif
        @if ($message = Session::get('error'))
          <div class="alert alert-danger">
              <p class="text-green-800">{{ $message }}</p>
          </div>
        @endif
        <h3 class="text-3xl text-bold">Cart List</h3>
        <div class="flex-1">
          <table class="table" cellspacing="0">
            <thead>
              <tr class="h-12 uppercase">
                <th class="hidden md:table-cell"></th>
                <th class="text-left">Nombre Producto</th>
                <th class="pl-5 text-left lg:text-right lg:pl-0">
                  <span class="lg:hidden" title="Quantity">CTD</span>
                  <span class="hidden lg:inline">Cantidad</span>
                </th>
                <th class="hidden text-right md:table-cell">precio</th>
                <th class="hidden text-right md:table-cell">Quitar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cartItems as $item)
              <tr>
                <td class="hidden pb-4 md:table-cell">
                  <a href="#">
                    <img src="{{ $item->attributes->img }}" class="w-20 rounded" width="200" height="200" alt="Thumbnail">
                  </a>
                </td>
                <td>
                  <a href="#">
                    <p class="">{{ $item->nombreProducto }}</p>
                  </a>
                </td>
                <td class="justify-center mt-6 md:justify-end md:flex">
                  <div class="h-10 w-28">
                    <div class="relative flex flex-row w-full h-8">
                      <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id}}" >
                      <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-25" />
                      <button type="submit" class="btn btn-primary">update</button>
                      </form>
                    </div>
                  </div>
                </td>
                <td class="hidden text-right md:table-cell">
                  <span class="text-sm font-medium lg:text-base">
                      {{ $item->precio }} €
                  </span>
                </td>
                <td class="hidden text-right md:table-cell">
                  <form action="{{ route('cart.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $item->id }}" name="id">
                    <button class="btn btn-danger">x</button>
                </form>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
          <div class="d-flex flex-row justify-content-between">
            <div class="mr-auto p-2">
               <button type="button" name="button" class="btn btn-success"><a href="{{ route('cart.shop') }}" class="text-light">Comprar</a></button>
            </div>
            <div class="p-2 d-flex justify-content-between">
              <div class="p-2">
               Total: {{ Cart::getTotal() }} €
              </div>
              <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="btn btn-danger">Quitar todo</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

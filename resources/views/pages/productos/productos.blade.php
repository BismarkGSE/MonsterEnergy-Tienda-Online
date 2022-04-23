@extends('layouts.app', ['activePage' => 'productos', 'titlePage' => __('Productos')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title ">TABLA DE PRODUCTOS</h3>
            <a href="{{ route('productos.insert') }}" class="btn btn-primary"><i class="fa-regular fa-square-plus"></i> Agregar nuevo producto</a>
            <div class="row">
              <div class="col-sm-12">
                @if ( $mensaje = Session::get('success') )
                  <div class="alert alert-success" role="alert">
                    {{ $mensaje }}
                  </div>
                @endif
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Categoria</th>
                  <th>Stock</th>
                  <th>Precio</th>
                  <th>Imagen</th>
                  <th>Editar</th>
                  <th>Quitar</th>
                </thead>
                <tbody>
                  <!-- AQUI LOS PRODUCTOS -->
                  @foreach ( $datos as $item )
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->nombreProducto }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->stock }}</td>
                      <td>{{ $item->precio }} <span class="text-danger font-weight-bold">€</span></td>
                      <td><img src="{{ $item->img }}" alt="Imagen Productos" class="img-thumbnail img-producto"></td>
                      <td>
                        <form action="{{ route('productos.update', $item->id) }}" method="get">
                          <button class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></i></button>
                        </form>
                      </td>
                      <td>
                        <form action="{{ route('productos.delete', $item->id) }}" method="get">
                          <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

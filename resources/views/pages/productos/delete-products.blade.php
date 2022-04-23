@extends('layouts.app', ['activePage' => 'productos', 'titlePage' => __('Productos')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title "><i class="fa-solid fa-trash"></i> ELIMINAR PRODUCTO</h3>
      </div>
      <div class="card-body">

        <p class="card-text">

          <div class="alert alert-danger" role="alert">
            Estas seguro de eliminar este registro !
            <table class="table table-sm table-hover">
              <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Imagen</th>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $productos->id }}</td>
                  <td>{{ $productos->nombreProducto }}</td>
                  <td>{{ $categoria->name }}</td>
                  <td>{{ $productos->stock }}</td>
                  <td>{{ $productos->precio }}</td>
                  <td><img src="../{{ $productos->img }}" alt="Imagen Producto" class="img-thumbnail img-producto"></td>
                </tr>
              </tbody>
            </table>
            <br>
            <form action="{{ route('productos.delete-delete', $productos->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a class="btn btn-primary" href="{{ route('productos') }}"><i class="fa-solid fa-arrow-rotate-left"></i> Volver</a>
              <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
            </form>
          </div>
        </p>

      </div>
    </div>
  </div>
</div>
@endsection

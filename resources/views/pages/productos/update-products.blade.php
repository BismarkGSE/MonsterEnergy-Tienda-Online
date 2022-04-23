@extends('layouts.app', ['activePage' => 'productos', 'titlePage' => __('Productos')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title "><i class="fa-solid fa-pen-to-square"></i> ACTUALIZAR PRODUCTO</h3>
          </div>
          <div class="card-body">

            <p class="card-text">

              <form route="{{ route('productos.update-put', $productos->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="mb-3">
                  <label for="">Nombre Producto</label>
                  <input type="text" name="nombreProducto" class="form-control" placeholder="Nombre Producto" value="{{ $productos->nombreProducto }}">
                </div>

                <div class="mb-3">
                  <label for="">Categoria</label>
                  <select class="form-select" name="idCategoria" required>
                    <option value="{{ $catProd->id }}">{{ $catProd->name }}</option>
                    @foreach ( $datos as $item )
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="">Stock</label>
                  <input type="text" name="stock" class="form-control" placeholder="Stock" value="{{ $productos->stock }}">
                </div>

                <div class="mb-3">
                  <label for="">Precio Unitario</label>
                  <input type="text" name="precio" class="form-control" placeholder="Precio Unitario" value="{{ $productos->precio }}">
                </div>

                <div class="mb-3">
                  <label for="">Imagen</label>
                  <input type="file" name="img" class="form-control-file form-control">
                </div>

                <br>

                <button class="btn btn-primary"><i class="fa-solid fa-arrow-right-to-bracket"></i> Agregar</button>
                <a href="{{ route('productos') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Volver</a>

              </form>

            </p>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

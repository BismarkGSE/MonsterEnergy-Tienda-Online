@extends('layouts.app', ['activePage' => 'productos', 'titlePage' => __('Productos')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title "><i class="fa-solid fa-arrow-right-to-bracket"></i> INSERTAR PRODUCTO</h4>
          </div>
          <div class="card-body">
            <p class="card-text">

              <form action="" method="post" class="was-validated" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="">Nombre Producto</label>
                  <input type="text" name="nombreProducto" class="form-control" required placeholder="Nombre Producto">
                  <div class="invalid-feedback">Introduzca un Nombre de Producto</div>
                </div>

                <div class="mb-3">
                  <label for="">Categoria</label>
                  <select class="form-select" name="idCategoria" required>
                    <option value="" >Selecciona una opcion</option>
                    @foreach ( $datos as $item )
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">Selecciona una opcion</div>
                </div>

                <div class="mb-3">
                  <label for="">Stock</label>
                  <input type="text" name="stock" class="form-control" required placeholder="Stock">
                  <div class="invalid-feedback">Introduzca el Stock disponible</div>
                </div>

                <div class="mb-3">
                  <label for="">Precio Unitario</label>
                  <input type="text" name="precio" class="form-control" required placeholder="Precio Unitario">
                  <div class="invalid-feedback">Introduzca un Precio Unitario</div>
                </div>

                <div class="mb-3">
                  <label for="">Imagen</label>
                  <input type="file" name="img" class="form-control-file form-control" required>
                  <div class="valid-feedback">Imagen seleccionada correctamente</div>
                  <div class="invalid-feedback">Selecciona una imagen</div>
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

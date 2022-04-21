@extends('layouts.app', ['activePage' => 'categorias', 'titlePage' => __('Categorias')])

@section('content')
<script src="https://kit.fontawesome.com/457e6ae13b.js" crossorigin="anonymous"></script>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title "><i class="fa-solid fa-pen-to-square"></i> ACTUALIZAR CATEGORIA</h3>
          </div>
          <div class="card-body">

            <p class="card-text">

              <form route="{{ route('categorias.update-put', $categorias->id) }}" method="post">
                @csrf
                @method("PUT")
                <label for="">Nombre Categoria</label>
                <input type="text" name="name" class="form-control" required value="{{ $categorias->name }}">

                <br>

                <button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Modificar</button>
                <a href="{{ route('categorias') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Volver</a>

              </form>

            </p>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

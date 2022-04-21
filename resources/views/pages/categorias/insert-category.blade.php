@extends('layouts.app', ['activePage' => 'categorias', 'titlePage' => __('Categorias')])

@section('content')
<script src="https://kit.fontawesome.com/457e6ae13b.js" crossorigin="anonymous"></script>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title "><i class="fa-solid fa-arrow-right-to-bracket"></i> INSERTAR CATEGORIA</h4>
          </div>
          <div class="card-body">
            <p class="card-text">

              <form action="" method="post">
                @csrf
                <label for="">Nombre Categoria</label>
                <input type="text" name="name" value="" class="form-control" required>

                <br>

                <button class="btn btn-primary"><i class="fa-solid fa-arrow-right-to-bracket"></i> Agregar</button>
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

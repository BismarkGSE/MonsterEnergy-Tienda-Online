@extends('layouts.app', ['activePage' => 'categorias', 'titlePage' => __('Categorias')])

@section('content')
<script src="https://kit.fontawesome.com/457e6ae13b.js" crossorigin="anonymous"></script>
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title "><i class="fa-solid fa-trash"></i> ELIMINAR CATEGORIA</h3>
      </div>
      <div class="card-body">

        <p class="card-text">
          <div class="alert alert-danger" role="alert">
            Estas seguro de eliminar este registro !
            <table class="table table-sm table-hover">
              <thead>
                <th>Nombre Categoria</th>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $categorias->name }}</td>
                </tr>
              </tbody>
            </table>
            <br>
            <form action="{{ route('categorias.delete-delete', $categorias->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a class="btn btn-primary" href="{{ route('categorias') }}"><i class="fa-solid fa-arrow-rotate-left"></i> Volver</a>
              <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
            </form>
          </div>
        </p>

      </div>
    </div>
  </div>
</div>
@endsection

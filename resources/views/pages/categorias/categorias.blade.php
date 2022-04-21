@extends('layouts.app', ['activePage' => 'categorias', 'titlePage' => __('Categorias')])

@section('content')
<script src="https://kit.fontawesome.com/457e6ae13b.js" crossorigin="anonymous"></script>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title ">TABLA DE CATEGORIAS</h3>
            <a href="{{ route('categorias.insert') }}" class="btn btn-primary"><i class="fa-regular fa-square-plus"></i> Agregar nueva categoria</a>
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
                  <th>
                    ID
                  </th>
                  <th>
                    Nombre
                  </th>
                  <th>
                    Editar
                  </th>
                  <th>
                    Quitar
                  </th>
                </thead>
                <tbody>
                  <!-- AQUI IRAN LAS CATEGORIAS -->
                  @foreach ( $datos as $item )
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->name }}</td>
                      <td>
                        <form action="{{ route('categorias.update', $item->id) }}" method="get">
                          <button class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></i></button>
                        </form>
                      </td>
                      <td>
                        <form action="{{ route('categorias.delete', $item->id) }}" method="get">
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

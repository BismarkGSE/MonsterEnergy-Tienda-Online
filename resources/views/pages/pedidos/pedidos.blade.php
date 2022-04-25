@extends('layouts.app', ['activePage' => 'pedidos', 'titlePage' => __('Pedidos')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">TABLA DE PEDIDOS</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th>Editar</th>
                  <th>Quitar</th>
                </thead>
                <tbody>
                  @php
                    //print_r($id)
                  @endphp
                  <!-- AUI LOS PEDIDOS -->
                  @foreach ( $datos as $item )
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->fecha }}</td>
                      <td>{{ $item->estado }}</td>
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

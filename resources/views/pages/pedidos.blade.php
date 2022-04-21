@extends('layouts.app', ['activePage' => 'pedidos', 'titlePage' => __('Pedidos')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Usuario
                  </th>
                  <th>
                    Fecha
                  </th>
                  <th>
                    Estado
                  </th>
                  <th>
                    Precio Final
                  </th>
                </thead>
                <tbody>
                  <!-- AUI LOS PEDIDOS -->
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

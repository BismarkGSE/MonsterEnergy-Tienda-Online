<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <title>Monster Energy</title>
    <link rel="icon" href="../img/icon/icon_monster.png">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/457e6ae13b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </head>

  <body>

    @include('includes.header')

    <div class="container">

      <div class="row">
        <div class="col-md-auto">
          <h3>Categorias</h3>
          @foreach ( $categorias as $item )
            <form action="{{ route('main.show-categoria', $item->name) }}" method="get">
              <button class="list-group-item list-group-item-action">{{ $item->name }}</button>
            </form>
          @endforeach
        </div>
        <div class="col">
          <div class="row align-items-start">
            <div class="card">
              @foreach ( $datos as $item )
              <div class="card-header">
                <h3>{{ $item->nombreProducto }}</h3>
              </div>
              <div class="card-body">
                <img src="{{ $item->img }}" alt="Img Producto" class="img-thumbnail w-50">
                <h4>Categoria</h4>
                <p>{{ $item->name }}</p>
                <h4>Precio</h4>
                <p>{{ $item->precio }} €</p>
                <h4>Stock</h4>
                <p>{{ $item->stock }}</p>
              </div>
              <div class="card-body">
                @if ( Auth::guard('usuarios')->check() )
                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  <input type="hidden" name="nombreProducto" value="{{ $item->nombreProducto }}">
                  <input type="hidden" name="precio" value="{{ $item->precio }}">
                  <input type="hidden" name="img" value="{{ $item->img }}">
                  <input type="hidden" value="1" name="quantity">
                  <p class="text-center"><button name="add-cart" class="btn btn-perso">Añadir a la Cesta</button></p>
                </form>
                @else
                <p class="text-center"><button name="add-cart" class="btn btn-perso" onclick="swal('Oops!', 'Debe de iniciar sesion!', 'error')">Añadir a la Cesta</button></p>
                @endif
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('includes.footer')

  </body>

</html>

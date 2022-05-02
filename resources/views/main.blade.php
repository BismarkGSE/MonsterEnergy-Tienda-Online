<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <title>Monster Energy</title>
    <link rel="icon" href="img/icon/icon_monster.png">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/457e6ae13b.js" crossorigin="anonymous"></script>

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
            @foreach ($datos as $item)
            <div class="col-lg-3 col-md-6">
              <img src="{{ $item->img }}" alt="" class="img-thumbnail rounded img-fluid prod_img">
              <p class="text-center">{{ $item->nombreProducto }}</p>
              <p class="text-center">{{ $item->name }} - {{ $item->precio }} <span class="text-danger">€</span></p>
              <p class="text-center"><button name="add-cart" class="btn btn-perso">Añadir a la Cesta</button></p>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    @include('includes.footer')

  </body>

</html>

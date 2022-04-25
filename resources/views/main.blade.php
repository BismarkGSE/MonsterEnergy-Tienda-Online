<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <title>Monster Energy</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </head>

  <body>

    @include('includes.header')

    <div class="container">
    <div class="row align-items-start">
      @foreach ($datos as $item)
      <div class="w-50 h-50">
        <img src="{{ $item->img }}" alt="" class="img-thumbnail rounded img-fluid">
      </div>
      @endforeach
    </div>
    </div>

    @include('includes.footer')

  </body>

</html>

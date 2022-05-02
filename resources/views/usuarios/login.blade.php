<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <title>Monster Energy | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/457e6ae13b.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon/icon_monster.png">

  </head>

  <body>

    @include('includes.header')

    <div class="container w-50">

      <!-- Pills navs -->
      <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
            aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
            aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
      </ul>
      <!-- Pills navs -->

      <!-- Pills content -->
      <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

          <div class="row">
            <div class="col-sm-12">
              @if ( $mensaje = Session::get('error') )
                <div class="alert alert-danger" role="alert">
                  {{ $mensaje }}
                </div>
              @endif
            </div>
          </div>

          <form action="" method="post">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" class="form-control" name="email" required/>
              <label class="form-label">Email</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" class="form-control" name="password" required/>
              <label class="form-label">Password</label>
            </div>

            <!-- 2 column grid layout -->
            <div class="row mb-4">
              <div class="col-md-6 d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check mb-3 mb-md-0">
                  <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                  <label class="form-check-label" for="loginCheck"> Remember me </label>
                </div>
              </div>

              <div class="col-md-6 d-flex justify-content-center">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
              </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

          </form>
        </div>

        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">

          <form action="" method="post">
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
              <input type="text" class="form-control" name="nombre" required/>
              <label class="form-label">nombre</label>
            </div>

            <!-- Username input -->
            <div class="form-outline mb-4">
              <input type="text" class="form-control" name="username" required/>
              <label class="form-label">username</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" class="form-control" name="email" required/>
              <label class="form-label">Email</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" class="form-control" name="password" required/>
              <label class="form-label">Password</label>
            </div>

            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
              <input type="password" class="form-control" name="password_repit" required/>
              <label class="form-label">Repeat password</label>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                aria-describedby="registerCheckHelpText" />
              <label class="form-check-label" for="registerCheck">
                I have read and agree to the terms
              </label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
          </form>
        </div>

      </div>
      <!-- Pills content -->

    </div>

    @include('includes.footer')

  </body>

</html>

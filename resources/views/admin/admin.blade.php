<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <title>Admin Panel | Monster Energy</title>
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body>

    <div class="admin_container">

      <form class="admin_form" method="post" enctype="multipart/form-data" action="{{ route('admin-panel') }}">
        @csrf
        <div class="inp_user">
          <label>Usuario</label>
          <input type="text" name="userName" value="" placeholder="Usuario" required>
          @error('userName')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="inp_pass">
          <label>Password</label>
          <input type="password" name="password" value="" placeholder="Password" required>
          @error('password')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="inp_env">
          <input type="submit" name="env" value="Login">
        </div>

      </form>

    </div>

  </body>

</html>

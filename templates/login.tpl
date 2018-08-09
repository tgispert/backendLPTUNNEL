<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Playa Grande - Admin</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Custom styles for this template -->

  </head>
  <body>
    <div class="container">
      <form class="form-signin" method="POST" action="index.php?action=login">
        <h2 class="form-signin-heading">Hostel Playa Grande</h2>
        <label for="txtUser" class="sr-only">Usuario</label>
        <input type="user" id="txtUser" name="txtUser" class="form-control" placeholder="Usuario" required autofocus>
        <label for="txtPassword" class="sr-only">Contraseña</label>
        <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Contraseña" required>
        {if count($errores) gt 0}
          <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            {foreach $errores as $error}
              {$error}
            {/foreach}
          </div>
        {/if}
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>
    </div> <!-- /container -->
  </body>
</html>

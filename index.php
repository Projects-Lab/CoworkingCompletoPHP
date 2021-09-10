<?php
session_start();
if (isset($_SESSION["session_coworking"])) {
    header('Location: app/inicio');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/estilos.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body class="text-center">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="card-title text-white">
                  <h4>INICIAR SESION</h4>
                </div>
            </div>
            <div class="card-body">
                <form class="form-login" id="form_login" onsubmit="return login()" method="post" autocomplete="on">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                              <label for="" class="text-left">Usuario</label>
                              <input type="text" class="form-control" name="usuario" id="usuario" required>
                          </div>
                          <div class="form-group">
                              <label for="">Constraseña</label>
                              <input type="password" class="form-control" name="pass" id="pass" required>
                          </div>
                          <hr>
                          <button type="submit" class="btn btn-success btn-block button-entrar" name="button">Iniciar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="src/login.js" charset="utf-8"></script>
  </body>
</html>

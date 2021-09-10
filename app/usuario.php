<?php session_start(); 
  if (isset($_SESSION['session_coworking'])) {
?>
<!doctype html>
<html lang="en">
<head>
  <title></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../src/estilos.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Glory:wght@100&family=Roboto+Condensed:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
</head>
<body>
  <!-- nabvar -->
  <?php require_once 'partial/navbar.php'?>
  <div class="container py-4">
    <div class="row">
      <div class="col-md-12">
        <button type="button" class="btn btn-success" id="registrar" data-toggle="modal" data-target="#ModalUsuarios">Nuevo usuario</button>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary mb-3">
            <div class="card-title text-center text-white">
              Listado de usuarios
            </div>
          </div>
          <div class="card-body">
            <table class="table table-borderless table-hover nowrap dt-responsive table-sm" id="tabla-usuario">
              <thead>
                <tr>
                  <th scope="col">Usuario</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Rol</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal usuario -->
  <div class="modal fade" id="ModalUsuarios" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="exampleModalLabel">Registrar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="registro_usuario" onsubmit="return registrar()" method="POST" autocomplete="off">
            <div class="form-row">
              <input type="hidden" name="id" id="id">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Usuario</label>
                <input type="text" class="form-control" name="usuario" id="usuario" required>
              </div>
              <div class="form-group col-md-6" id="div_clave">
                <label for="inputPassword4">Clave</label>
                <input type="password" class="form-control" name="clave" id="clave" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="estado">Rol</label>
                <select class="form-control" name="rol" id="rol" required>
                  <option selected disabled value="">Seleccione</option>
                  <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                  <option value="SECRETARIO">SECRETARIO</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">Estado</label>
                <select class="form-control" name="estado" id="estado" required>
                  <option selected disabled value="">Seleccione</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <button type="button" class="btn btn-secondary ml-2">Limpiar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- modal usuario -->
  <div class="modal fade" id="ModalClave" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar clave</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="cambiar_clave" onsubmit="return cambiarclave()" method="POST" autocomplete="off">
            <div class="form-row">
              <input type="hidden" name="id" id="id">
              <div class="form-group col-md-6">
                <label for="inputPassword4">Clave</label>
                <input type="password" class="form-control" name="clave" id="clave" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar clave</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
  <script src="../src/usuario.js"></script>
</body>
</html>

<?php
} else {
    header("location:../");
}
?>




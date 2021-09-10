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
        <div class="card">
          <div class="card-header bg-primary">
            <div class="card-title text-center text-white">
              Formulario clientes
            </div>
          </div>
          <div class="card-body">
            <form id="form-registrar" onsubmit="return registrar()" method="POST" autocomplete="off">
              <input type="hidden" name="id" id="id">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Identificacion</label>
                  <input type="text" class="form-control" name="numero" id="numero">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Nombre 1</label>
                  <input type="text" class="form-control" name="nombre1" id="nombre1">
                </div>
                <div class="form-group col-md-3">
                  <label>Nombre 2</label>
                  <input type="text" class="form-control" name="nombre2" id="nombre2">
                </div>
                <div class="form-group col-md-3">
                  <label>Apellido 1</label>
                  <input type="text" class="form-control" name="apellido1" id="apellido1">
                </div>
                <div class="form-group col-md-3">
                  <label>Apellido 2</label>
                  <input type="text" class="form-control" name="apellido2" id="apellido2">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Direccion</label>
                  <input type="text" class="form-control" name="direccion" id="direccion">
                </div>
                <div class="form-group col-md-6">
                  <label>Correo</label>
                  <input type="email" class="form-control" name="correo" id="correo">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Telefono</label>
                  <input type="text" class="form-control" name="telefono" id="telefono">
                </div>
                <div class="form-group col-md-3">
                  <label>Celular</label>
                  <input type="text" class="form-control" name="celular" id="celular">
                </div>
                <div class="form-group col-md-6">
                  <label>Estado</label>
                  <select  class="form-control" name="estado" id="estado">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-success float-left" id="btn-main">Registrar cliente</button>
              <button type="submit" class="btn btn-secondary float-left ml-2" id="btn-limpiar">Limpiar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary mb-3">
            <div class="card-title text-center text-white">
              Listado clientes
            </div>
          </div>
          <div class="card-body">
            <table class="table table-borderless table-hover nowrap dt-responsive table-sm" id="tabla_clientes">
              <thead>
                <tr>
                  <th scope="col">Numero</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Celular</th>
                  <th scope="col">Estado</th>
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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
  <script src="../src/cliente.js"></script>
</body>
</html>
<?php
} else {
    header("location:../");
}
?>


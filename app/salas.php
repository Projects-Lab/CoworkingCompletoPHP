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
          <div class="card-header bg-primary mb-3">
            <div class="card-title text-center text-white">
              Formulario sala
            </div>
          </div>
          <div class="card-body">
            <form id="form-registrar" onsubmit="return registrar()" method="POST" autocomplete="off">
              <input type="hidden" name="id" id="id">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nombre">Nombre sala</label>
                  <input type="text" class="form-control text-uppercase" id="nombre" name="nombre">
                </div>
                <div class="form-group col-md-4">
                  <label for="precio">Precio hora</label>
                  <input type="text" class="form-control" id="precio" name="precio">
                </div>
                <div class="form-group col-md-2">
                  <label for="estado">Estado</label>
                  <select class="form-control" id="estado" name="estado">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-success float-left" id="btn-main">Registrar</button>
              <button type="button" class="btn btn-secondary float-left ml-2" id="btn-limpiar">Limpiar</button>
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
              Listado de salas
            </div>
          </div>
          <div class="card-body">
            <table class="table table-borderless table-hover nowrap dt-responsive table-sm" id="tabla-salas">
              <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Precio hora</th>
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
  <script src="../src/salas.js"></script>
</body>
</html>

<?php
} else {
    header("location:../");
}
?>


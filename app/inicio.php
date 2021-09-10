<?php session_start(); 
if (isset($_SESSION['session_coworking'])) {
  ?>
  <!doctype html>
  <html lang="en">
  <head>
    <title>Home</title>
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
  <body class="text-center">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">INICIO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="asignacion" tabindex="-1">Asignación</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="clientes" tabindex="-1">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="salas" tabindex="-1">Salas</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Configuraciones
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="usuario">Perfil</a>
              <a class="dropdown-item" href="javascript:void(0)"
              onclick="location.href = '../controlador/login.php?opcion=logout'"
              >Salir</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container py-4">
      <div class="row ">
        <div class="col-xl-4 col-lg-6">
          <div class="card l-bg-cherry">
            <div class="card-statistic-3 p-4">
              <h5 class="card-title mb-0">Nueva Asignacion</h5>
              <a href="asignacion" class="btn btn-success mt-2">Ir</a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <div class="card l-bg-cherry">
            <div class="card-statistic-3 p-4">
              <h5 class="card-title mb-0">Nuevo Cliente</h5>
              <a href="clientes" class="btn btn-success mt-2">Ir</a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <div class="card l-bg-cherry">
            <div class="card-statistic-3 p-4">
              <h5 class="card-title mb-0">Nueva Sala</h5>
              <a href="salas" class="btn btn-success mt-2">Ir</a>
            </div>
          </div>
        </div>
      </div>
    <div class="row pt-4">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped table-dark table-hover" id="tabla">
            <thead>
              <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Sala</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora inicial</th>
                <th scope="col">Hora final</th>
                <th scope="col">Nota</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
  <script src="../src/inicio.js"></script>
</body>
</html>

<?php
} else {
  header("location:../");
}
?>

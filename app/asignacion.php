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
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center text-white bg-primary">
            <h4 class="card-title">Formulario asignación de sala</h4>
          </div>
          <div class="card-body">
            <form id="asignarSala" onsubmit="return asignar_sala()" autocomplete="on" method="POST">
              <div class="row">
                <div class="col-md-4 mb-3">
                  <input type="hidden" id="idCliente" name="idCliente">
                  <label for="numero">Numero cliente</label>
                  <input class="form-control" type="text" id="numero" tabindex="1">
                </div>
                <div class="col-md-4 mb-3">
                  <label for="cliente">Nombre</label>
                  <input class="form-control" type="text" id="cliente"  readonly>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="firstName">Sala</label>
                  <select name="sala" class="form-control" id="salas" onchange="setSala()" tabindex="2"></select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="fecha_reserva">Fecha reserva</label>
                  <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" required>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="hora_inicio">Hora inicio</label>
                  <input type="time" class="form-control" id="hora_inicio" name="hora_inicio">
                </div>
                <div class="col-md-3 mb-3">
                  <label for="hora_final">Hora final</label>
                  <input type="time" class="form-control" id="hora_final" name="hora_final">
                </div>
                <div class="col-md-2 mb-3">
                  <label for="total_horas">Horas</label>
                  <input type="text" class="form-control" id="total_horas" name="total_horas" onchange="calcularTotal()">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="nota">Nota</label>
                    <textarea name="nota" class="form-control" id="nota"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="total">Total</label>
                  <input type="text" class="form-control" id="totalproceso" readonly>
                  <input type="hidden" class="form-control" id="total" name="total" readonly>
                </div>
              </div>
              <hr class="mb-4">
              <button class="btn btn-success btn-lg btn-block" type="submit">ASIGNAR SALA</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4 order-md-2 mb-4">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-success">
                <div class="card-title">
                  <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-white">Resumen pago</span>
                  </h4>
                </div>
              </div>
              <div class="card-body">
                <ul class="list-group mb-3">
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Nombre sala:</h6>
                    </div>
                    <span class="badge badge-primary badge-pill" id="sala_select">0</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Precio sala:</h6>
                    </div>
                    <span class="badge badge-danger badge-pill" id="precio_sala"></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Horas:</h6>
                    </div>
                    <span class="badge badge-success badge-pill" id="horas_numero"></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between bg-light font-weight-bold">
                    <span>Total(COP)</span>
                    <strong id="total_resumen"></strong>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-danger">
            <div class="card-title text-white"><h4>Estado sala</h4></div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-sm" id="tabla_asignacion">
                <thead>
                  <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora inicio</th>
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
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
  <script src="../src/asignacion.js"></script>
</body>
</html>

<?php
} else {
    header("location:../");
}
?>



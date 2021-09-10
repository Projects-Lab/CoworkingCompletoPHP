<?php 

require_once '../modelos/asignacion.php';
$asignacion = new Asignacion;

switch ($_REQUEST['opcion']) {

	case 'cargarCliente':
	$data = $asignacion->obtenerCliente($_POST['numero']);
	echo json_encode($data);
	break;

	case 'cargarSala':
	$data = $asignacion->cargarSalas();
	echo json_encode($data);
	break;

	case 'cargarPrecio':
	$data = $asignacion->cargarPrecios($_POST['id']);
	echo json_encode($data);
	break;

	case 'listarAsignacion':
		$data = $asignacion->cargarAsignaciones($_POST['idSala']);
		$arrData['data'] = $data;
        echo json_encode($arrData);
	break;

	case 'listarAsignaciones':
		$data = $asignacion->listarAsignaciones();
        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "nombre" => $value['nombre1'],
                    "sala" => $value['nombre'],
                    "fecha" => $value['fecha'],
                    "hora1" => $value['hora_inicio'],
                    "hora2" => $value['hora_final'],
                    "nota" => $value['nota']
                ];
            }
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData" => $list);
        echo json_encode($results);

	break;

	case 'asignar':
	$datos = [
		"idCliente" => $_POST['idCliente'],
		"sala" => $_POST['sala'],
		"fecha_reserva" => $_POST['fecha_reserva'],
		"hora_inicio" => $_POST['hora_inicio'],
		"hora_final" => $_POST['hora_final'],
		"total_horas" => $_POST['total_horas'],
		"total" =>$_POST['total'],
		"nota" => $_POST['nota'],
		"usuario" => '6'
	];
	($asignacion->asignarSala($datos)? $response = 1 : $response = 0);
	echo $response;
	break;
	
}

<?php

require_once '../modelos/sala.php';
$sala = new Sala;

switch ($_REQUEST['opcion']) {

	case 'listar':
	$data = $sala->listarSala();
	if ($data) {
		foreach ($data as $value) {
			$list[] = [
				"nombre" => $value['nombre'],
				"precio" => $value['precio_hora'],
				"estado" => ($value['estado'] == '1' ? "Activo" : "Inactivo"),
				"acciones" => "<td>
				<button type='button' class='btn btn-warning text-white btn-sm' onclick=editarSala({$value['id']}) id='btn-editar'>Editar</button>
				</td>"
			];
		}
	}
	$results = [
		"sEcho" => 1,
		"iTotalRecords" => count($list),
		"iTotalDisplayRecords" => count($list),
		"aaData" => $list
	];
	echo json_encode($results);
	break;

	case 'registrar':
	$datos = [
		'nombre' => strtoupper($_POST['nombre']),
		'precio' => strtoupper($_POST['precio']),
		'estado' => $_POST['estado']
	];
	($sala->registrarSala($datos)? $response = 1 : $response = 0);
	echo $response;
	break;

	case 'editar':
	$data = $sala->editarSala($_POST['id']);
	echo json_encode($data);
	break;

	case 'actualizar':
	$datos = [
		'id' => $_POST['id'],
		'nombre' => strtoupper($_POST['nombre']),
		'precio' => strtoupper($_POST['precio']),
		'estado' => $_POST['estado']
	];
	($sala->actualizarSala($datos)? $response = 1 : $response = 0);
	echo $response;
	break;
}
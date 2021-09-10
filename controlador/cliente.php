<?php

require_once '../modelos/cliente.php';
$cliente = new Cliente;

switch ($_REQUEST['opcion']) {

	case 'listar':
	$data = $cliente->listarClientes();
	if ($data) {
		foreach ($data as $value) {
			$list[] = [
				"numero" => $value['numero'],
				"nombre1" => $value['nombre1'],
				"apellido1" => $value['apellido1'],
				"direccion" => $value['direccion'],
				"correo" => $value['correo'],
				"telefono" => $value['telefono'],
				"celular" => $value['celular'],
				"estado" => ($value['estado'] == '1' ? "Activo" : "Inactivo"),
				"acciones" => "<td>
				<button type='button' class='btn btn-warning text-white btn-sm' data-toggle='modal' data-target='#modalEditar' onclick=editarCliente({$value['id']}) id='btn-editar'>Editar</button>
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
		'numero' => $_POST['numero'],
		'nombre1' => $_POST['nombre1'],
		'nombre2' => $_POST['nombre2'],
		'apellido1' => $_POST['apellido1'],
		'apellido2' => $_POST['apellido2'],
		'direccion' => $_POST['direccion'],
		'correo' => $_POST['correo'],
		'telefono' => $_POST['telefono'],
		'celular' => $_POST['celular'],
		'estado' => $_POST['estado']
	];
	($cliente->registrarCliente($datos)? $response = 1 : $response = 0);
	echo $response;
	break;

	case 'editar':
	$data = $cliente->editarCliente($_POST['id']);
	echo json_encode($data);
	break;

	case 'actualizar':
	$datos = [
		'id' => $_POST['id'],
		'numero' => $_POST['numero'],
		'nombre1' => $_POST['nombre1'],
		'nombre2' => $_POST['nombre2'],
		'apellido1' => $_POST['apellido1'],
		'apellido2' => $_POST['apellido2'],
		'direccion' => $_POST['direccion'],
		'correo' => $_POST['correo'],
		'telefono' => $_POST['telefono'],
		'celular' => $_POST['celular'],
		'estado' => $_POST['estado']
	];
	($cliente->actualizarCliente($datos)? $response = 1 : $response = 0);
	echo $response;
	break;
}
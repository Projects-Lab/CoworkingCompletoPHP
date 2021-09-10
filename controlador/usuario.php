<?php
session_start();
require_once '../modelos/usuario.php';
$usuario = new Usuario;

switch ($_REQUEST['opcion']) {
	case 'listar':
	$data = $usuario->listarUsuarios();
	if ($data) {
		foreach ($data as $value) {
			$list[] = [
				"usuario" => $value['usuario'],
				"estado" => ($value['estado'] == '1' ? "Activo" : "Inactivo"),
				"rol" => $value['rol'],
				"acciones" => "
				<button type='button' class='btn btn-warning text-white btn-sm' onclick=editarUsuario({$value['id']}) id='btn-editar'>Editar
				</button>
				<button type='button' class='btn btn-primary text-white btn-sm' onclick=editarClave({$value['id']}) data-toggle='modal' data-target='#ModalClave'>Pass
				</button>"
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
		'usuario' => $_POST['usuario'],
		'clave' => password_hash($_POST['clave'], PASSWORD_DEFAULT),
		'estado' => $_POST['estado'],
		'rol' => $_POST['rol']
	];
	($usuario->registrarUsuario($datos)? $response = 1 : $response = 0);
	echo $response;
	break;

	case 'editar':
	$data = $usuario->editarUsuario($_POST['id']);
	echo json_encode($data);
	break;

	case 'actualizar':
	$datos = [
		"id" => $_POST['id'],
		"usuario" => $_POST['usuario'],
		"rol" => $_POST['rol'],
		"estado" => $_POST['estado']
	];

	($usuario->actualizarUsuario($datos)? $response = 1 : $response = 0);
	echo $response;
	break;

	
}
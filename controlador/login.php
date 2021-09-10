<?php 
session_start();
require_once '../modelos/login.php';
$login = new login();

switch ($_REQUEST['opcion']) {
	case 'login':
	$datos = [
		"usuario" => $_POST['usuario'],
		"pass" => $_POST['pass']
	];

	
	$result = $login->login($datos); 
	if ($result) {
		foreach ($result as $campos => $valor) {
			$_SESSION["session_coworking"][$campos] = $valor;
		}
		echo $respose = 1;
	} else {
		echo $respose = 0;
	}
	break;

	case 'logout':
		session_destroy();
        header("location:../");
	break;
}
<?php

class conexion {

	static function conectar() {
		try {
			require ('datos.php');
			$options = [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			];

			$base = new PDO(CADENA, USER, PASSWORD, $options);
			return $base;
			echo "ok";
		} catch (PDOException $e) {
			die('Error en la conexion: ' . $e->getMessage());
		}
	}
}
?>
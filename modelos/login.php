<?php

require_once '../config/database.php';

class login {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

public function login($datos) {
        $sql = 'SELECT * FROM usuario WHERE usuario = :usuario';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
        if ($base->execute()) {
            if ($base->rowCount() > 0) {
                $data = $base->fetch(PDO::FETCH_ASSOC);
                if (password_verify($datos['pass'], $data['clave'])) {
                    return $data;
                }
            } else {
                return false;
            }
        }
    }
 }
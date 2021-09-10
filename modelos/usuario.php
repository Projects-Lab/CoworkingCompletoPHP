<?php

require_once '../config/database.php';

class Usuario {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function registrarUsuario($datos) {
        $sql = 'INSERT INTO usuario (usuario, clave, estado, rol)
                VALUES (:usuario, :clave, :estado, :rol)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
        $base->bindParam(":clave", $datos['clave'], PDO::PARAM_STR);
        $base->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
        $base->bindParam(":rol", $datos['rol'], PDO::PARAM_STR);
        if ($base->execute()) {
            return true;
        }
    }

    public function listarUsuarios() {
        $sql = 'SELECT id, usuario, rol, estado FROM usuario';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function editarUsuario($id) {
        $sql = 'SELECT id, usuario, rol, estado FROM usuario WHERE id = :id';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function actualizarUsuario($datos) {
        $sql = 'UPDATE usuario SET usuario = :usuario, rol = :rol, estado = :estado WHERE id = :id';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id", $datos['id'], PDO::PARAM_INT);
        $base->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
        $base->bindParam(":rol", $datos['rol'], PDO::PARAM_STR);
        $base->bindParam(":estado", $datos['estado'], PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }

    public function actualizarPassword($datos) {
        $sql = 'UPDATE usuario SET password = :password WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $datos['idRegistro'], PDO::PARAM_INT);
        $base->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        if ($base->execute()) {
            return true;
        }
    }

}



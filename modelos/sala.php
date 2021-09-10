<?php

require_once '../config/database.php';

class Sala {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function registrarSala($datos) {
        $sql = 'INSERT INTO sala (nombre, precio_hora, estado) VALUES (:nombre, :precio_hora, :estado)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $base->bindParam(":precio_hora", $datos['precio'], PDO::PARAM_STR);
        $base->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
        if ($base->execute()) {
            return true;
        }
    }


    public function listarSala() {
        $sql = 'SELECT * FROM sala';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function editarSala($id) {
        $sql = 'SELECT * FROM sala WHERE id = :id';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function actualizarSala($datos) {
        $sql = 'UPDATE sala SET  nombre = :nombre, 
                                 estado = :estado 
                WHERE id = :id';

        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id", $datos['id'], PDO::PARAM_INT);
        $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $base->bindParam(":estado", $datos['estado'], PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }


}



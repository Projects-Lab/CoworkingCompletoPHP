<?php

require_once '../config/database.php';

class Cliente {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function registrarCliente($datos) {
        $sql = 'INSERT INTO cliente (numero, nombre1, nombre2, apellido1, apellido2, direccion, correo, telefono, celular, estado)
                VALUES (:numero, :nombre1, :nombre2, :apellido1, :apellido2, :direccion, :correo, :telefono, :celular, :estado)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":numero", $datos['numero'], PDO::PARAM_INT);
        $base->bindParam(":nombre1", $datos['nombre1'], PDO::PARAM_STR);
        $base->bindParam(":nombre2", $datos['nombre2'], PDO::PARAM_STR);
        $base->bindParam(":apellido1", $datos['apellido1'], PDO::PARAM_STR);
        $base->bindParam(":apellido2", $datos['apellido2'], PDO::PARAM_STR);
        $base->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
        $base->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
        $base->bindParam(":telefono", $datos['telefono'], PDO::PARAM_INT);
        $base->bindParam(":celular", $datos['celular'], PDO::PARAM_INT);
        $base->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
        if ($base->execute()) {
            return true;
        }
    }


    public function listarClientes() {
        $sql = 'SELECT * FROM cliente';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function editarCliente($id) {
        $sql = 'SELECT * FROM cliente WHERE id = :id';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function actualizarCliente($datos) {
        $sql = 'UPDATE cliente SET  numero = :numero,
                                    nombre1 = :nombre1, 
                                    nombre2 = :nombre2, 
                                    apellido1 = :apellido1,
                                    apellido2 = :apellido2,
                                    direccion = :direccion,
                                    correo = :correo,
                                    telefono = :telefono,
                                    celular = :celular,
                                    estado = :estado 
                WHERE id = :id';

        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id", $datos['id'], PDO::PARAM_INT);
        $base->bindParam(":numero", $datos['numero'], PDO::PARAM_INT);
        $base->bindParam(":nombre1", $datos['nombre1'], PDO::PARAM_STR);
        $base->bindParam(":nombre2", $datos['nombre2'], PDO::PARAM_STR);
        $base->bindParam(":apellido1", $datos['apellido1'], PDO::PARAM_STR);
        $base->bindParam(":apellido2", $datos['apellido2'], PDO::PARAM_STR);
        $base->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
        $base->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
        $base->bindParam(":telefono", $datos['telefono'], PDO::PARAM_INT);
        $base->bindParam(":celular", $datos['celular'], PDO::PARAM_INT);
        $base->bindParam(":estado", $datos['estado'], PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }


}



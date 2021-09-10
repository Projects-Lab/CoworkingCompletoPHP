<?php

require_once '../config/database.php';

class Asignacion {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function obtenerCliente($numero){
    	$sql = 'SELECT * FROM cliente WHERE numero= :numero AND estado = 1';
    	$base = $this->conexion->prepare($sql);
    	$base->bindParam(":numero", $numero, PDO::PARAM_INT);
    	if($base->execute()){
    		return $base->fetch(PDO::FETCH_ASSOC);
    	}
    }

    public function cargarSalas(){
        $sql = "SELECT * FROM sala WHERE estado  = 1";
        $base = $this->conexion->prepare($sql);
        if($base->execute()){
            return $base->fetchALL(PDO::FETCH_ASSOC);
        }
    }

    public function cargarPrecios($id){
        $sql = "SELECT precio_hora FROM sala WHERE id  = :id";
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id", $id, PDO::PARAM_INT);
        if($base->execute()){
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function cargarAsignaciones($id){
        $sql = 'SELECT cl.nombre1, date(asi.fecha_asignacion) as fecha, asi.hora_inicio, asi.hora_final, asi.nota FROM asignacion asi INNER JOIN cliente cl on asi.cliente_id = cl.id inner join sala sl on asi.sala_id = sl.id 
            where asi.sala_id = :id';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetchALL(PDO::FETCH_ASSOC);
        }
    }

    public function asignarSala($datos){
        $sql = 'INSERT INTO asignacion (fecha_asignacion, hora_inicio, hora_final, total_horas, nota, total, 
                                        usuario_id, cliente_id, sala_id) 
                                VALUES (:fecha_asignacion, :hora_inicio, :hora_final, :total_horas, :nota, :total, 
                                        :usuario_id, :cliente_id, :sala_id)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":fecha_asignacion", $datos['fecha_reserva'] , PDO::PARAM_STR);
        $base->bindParam(":hora_inicio", $datos['hora_inicio'] , PDO::PARAM_STR);
        $base->bindParam(":hora_final", $datos['hora_final'] , PDO::PARAM_STR);
        $base->bindParam(":total_horas", $datos['total_horas'] , PDO::PARAM_INT);
        $base->bindParam(":nota", $datos['nota'] , PDO::PARAM_STR);
        $base->bindParam(":total", $datos['total'] , PDO::PARAM_STR);
        $base->bindParam(":usuario_id", $datos['usuario'] , PDO::PARAM_INT);
        $base->bindParam(":cliente_id", $datos['idCliente'] , PDO::PARAM_INT);
        $base->bindParam(":sala_id", $datos['sala'] , PDO::PARAM_INT);
        if($base->execute()){
            return true;
        }
    }

    public function listarAsignaciones(){
        $sql = "SELECT asi.id, cl.nombre1, sl.nombre, date(asi.fecha_asignacion) as fecha, asi.hora_inicio, asi.hora_final, asi.nota FROM asignacion asi INNER JOIN cliente cl on asi.cliente_id = cl.id inner join sala sl on asi.sala_id = sl.id";
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchALL(PDO::FETCH_ASSOC);
        }
    }
    
}
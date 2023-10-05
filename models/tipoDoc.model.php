<?php

require_once "connection.php";

class TipoDocModel{
    
    static public function getData (){
        $sql = "SELECT * FROM entidades ORDER BY identidad ASC ";
        return Connection::executeQuery($sql);
    }

    static public function insertar($nombreArchivo, $archivo, $fecha_reg, $iddocumento){
        $sql = "INSERT INTO archivos (nombre, ruta, fecha_reg, iddocumento) VALUES (:nombre, :ruta, :fecha_reg, :iddocumento)";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('nombre', $nombreArchivo, PDO::PARAM_STR);
        $stmt->bindParam('ruta', $archivo, PDO::PARAM_STR);
        $stmt->bindParam('fecha_reg', $fecha_reg, PDO::PARAM_STR);
        $stmt->bindParam('iddocumento', $iddocumento, PDO::PARAM_STR);
        return $stmt->execute();
    }

    static public function editar($identidad, $nombre, $ruc, $direccion){
        $sql = "UPDATE entidades SET nombre = :nombre, ruc = :ruc, direccion = :direccion WHERE identidad = :identidad";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('identidad', $identidad, PDO::PARAM_STR);
        $stmt->bindParam('nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam('ruc', $ruc, PDO::PARAM_STR);
        $stmt->bindParam('direccion', $direccion, PDO::PARAM_STR);
        return $stmt->execute();
    }

    static public function mostrar($idregistro){
        $sql = "SELECT * FROM documentos d WHERE d.idregistro = '$idregistro'";
        return Connection::executeQuery($sql);
    }

    static public function getTipos(){
        $sql = "SELECT * FROM tipo_documento";
        return Connection::executeQuery($sql);
    }

    static public function getTipoAt(){
        $sql = "SELECT * FROM tipo_documento t WHERE t.idtipo_documento IN (7,8)";
        return Connection::executeQuery($sql);
    }
    

}
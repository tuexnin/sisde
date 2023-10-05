<?php

require_once "connection.php";

class UploadModel{
    
    static public function getData (){
        $sql = "SELECT * FROM entidades ORDER BY identidad ASC ";
        return Connection::executeQuery($sql);
    }

    static public function insertar($idtipodoc, $nombre, $idregistro, $archivo, $numdoc){
        $sql = "INSERT INTO documentos (idtipo_documento, nombre, idregistro, doc, num) VALUES (:idtipo_documento, :nombre, :idregistro, :doc, :num)";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('idtipo_documento', $idtipodoc, PDO::PARAM_STR);
        $stmt->bindParam('nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam('idregistro', $idregistro, PDO::PARAM_STR);
        $stmt->bindParam('doc', $archivo, PDO::PARAM_STR);
        $stmt->bindParam('num', $numdoc, PDO::PARAM_STR);
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
        $sql = "SELECT d.iddocumento, d.idtipo_documento, d.nombre, d.idregistro, td.nombre as doc, d.doc as ruta FROM documentos d INNER JOIN tipo_documento td ON d.idtipo_documento = td.idtipo_documento WHERE d.idregistro = '$idregistro'";
        return Connection::executeQuery($sql);
    }

    static public function mostrarMultiple($idRegistros) {
        $idRegistrosStr = implode(',', $idRegistros);
    
        $sql = "SELECT d.idregistro, COUNT(d.iddocumento) AS count_documentos
                FROM documentos d
                WHERE d.idregistro IN ($idRegistrosStr)
                GROUP BY d.idregistro";
    
        $result = Connection::executeQuery($sql);
    
        $mostrarInfo = array();
    
        foreach ($result as $row) {
            $idregistro = $row->idregistro;
            $count_documentos = $row->count_documentos;
            $mostrarInfo[$idregistro] = ($count_documentos > 0);
        }
    
        return $mostrarInfo;
    }

    static public function valExistDocAt($idregistro){
        $sql = "SELECT d.iddocumento, d.idtipo_documento, d.nombre, d.idregistro, td.nombre as doc, d.doc as ruta FROM documentos d 
        INNER JOIN tipo_documento td ON d.idtipo_documento = td.idtipo_documento 
        WHERE d.idregistro = '$idregistro' and d.idtipo_documento IN (7,8)";
        return Connection::executeQuery($sql);
    }
    

}
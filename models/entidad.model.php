<?php

require_once "connection.php";

class EntidadModel{
    
    static public function getData (){
        $sql = "SELECT e.identidad, e.entidad, e.ruc, e.direccion, e.telefono, e.celular, e.correo, ud.name as distrito, up.name as provincia, udp.name as departamento
        FROM entidad e 
        INNER JOIN ubigeo_peru_districts ud ON e.iddistrito = ud.id 
        INNER JOIN ubigeo_peru_provinces up ON ud.province_id = up.id 
        INNER JOIN ubigeo_peru_departments udp ON up.department_id = udp.id ORDER BY e.identidad ASC";
        return Connection::executeQuery($sql);
    }

    static public function insertar($entidad, $ruc, $direccion, $telefono, $celular, $correo, $iddistrito){
        $sql = "INSERT INTO entidad (entidad, ruc, direccion, telefono, celular, correo, iddistrito) VALUES (:entidad, :ruc, :direccion, :telefono, :celular, :correo, :iddistrito)";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('entidad', $entidad, PDO::PARAM_STR);
        $stmt->bindParam('ruc', $ruc, PDO::PARAM_STR);
        $stmt->bindParam('direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam('telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam('celular', $celular, PDO::PARAM_STR);
        $stmt->bindParam('correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam('iddistrito', $iddistrito, PDO::PARAM_STR);
        return $stmt->execute();
    }

    static public function editar($identidad, $entidad, $ruc, $direccion, $telefono, $celular, $correo){
        $sql = "UPDATE entidad SET entidad = :entidad, ruc = :ruc, direccion = :direccion, telefono = :telefono, celular = :celular, correo = :correo WHERE identidad = :identidad";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('identidad', $identidad, PDO::PARAM_STR);
        $stmt->bindParam('entidad', $entidad, PDO::PARAM_STR);
        $stmt->bindParam('ruc', $ruc, PDO::PARAM_STR);
        $stmt->bindParam('direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam('telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam('celular', $celular, PDO::PARAM_STR);
        $stmt->bindParam('correo', $correo, PDO::PARAM_STR);

        return $stmt->execute();
    }

    static public function mostrar($identidad){
        $sql = "SELECT * FROM entidad e WHERE e.identidad = '$identidad'";
        return Connection::executeQuery($sql);
    }

    static public function getDepartamentos(){
        $sql = "SELECT * FROM ubigeo_peru_departments";
        return Connection::executeQuery($sql);
    }

    static public function getProvincia($iddepartamento){
        $sql = "SELECT * FROM ubigeo_peru_provinces upp WHERE upp.department_id = '$iddepartamento'";
        return Connection::executeQuery($sql);
    }

    static public function getDistrito($idprovincia){
        $sql = "SELECT * FROM ubigeo_peru_districts upd WHERE upd.province_id = '$idprovincia'";
        return Connection::executeQuery($sql);
    }

    static public function getEntidad($iddistrito){
        $sql = "SELECT * FROM entidad e WHERE e.iddistrito = '$iddistrito'";
        return Connection::executeQuery($sql);
    }

    static public function getdataEntidad($idusuario){
        $sql = "SELECT e.identidad, u.idusuario, e.entidad, e.direccion, e.telefono, e.celular, e.correo, upd.name as distrito, upp.name as provincia, upd2.name as departamento
        FROM usuario u 
        INNER JOIN entidad e ON u.identidad = e.identidad 
        INNER JOIN ubigeo_peru_districts upd ON e.iddistrito = upd.id
        INNER JOIN ubigeo_peru_provinces upp ON upd.province_id = upp.id 
        INNER JOIN ubigeo_peru_departments upd2 ON upp.department_id = upd2.id
        WHERE u.idusuario = '$idusuario'";
        return Connection::executeQuery($sql);
    }

}
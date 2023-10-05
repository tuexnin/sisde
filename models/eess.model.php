<?php

require_once "connection.php";

class EessModel{
    
    static public function getData (){
        $sql = "SELECT * FROM eess_us eu
        INNER JOIN microred_us mu ON eu.idmicrored = mu.idmicrored
        INNER JOIN red_us ru ON mu.idred = ru.idred ORDER BY eu.ideess ASC";
        return Connection::executeQuery($sql);
    }

    static public function getEessMaestro ($codMicrored){
        $sql = "SELECT * FROM ipress_eess ie WHERE ie.Codigo_Cocadenado = '$codMicrored' AND ie.Codigo_Unico NOT IN (SELECT eu.codigo_unico FROM eess_us eu)";
        return Connection::executeQuery($sql);
    }

    static public function getSelectEess ($codMicrored){
        $sql = "SELECT * FROM eess_us eu WHERE eu.idmicrored = '$codMicrored'";
        return Connection::executeQuery($sql);
    }

    static public function getSelectEess2 ($codMicrored){
        $sql = "SELECT * FROM eess_us eu WHERE eu.idmicrored = '$codMicrored' AND eu.sico = 1";
        return Connection::executeQuery($sql);
    }


    static public function insertar($codigo_unico, $establecimiento, $idmicrored, $sicoplogo, $numSico){
        $sql = "INSERT INTO eess_us (codigo_unico, establecimiento, idmicrored, sico, num) VALUES (:codigo_unico, :establecimiento, :idmicrored, :sico, :num)";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('codigo_unico', $codigo_unico, PDO::PARAM_STR);
        $stmt->bindParam('establecimiento', $establecimiento, PDO::PARAM_STR);
        $stmt->bindParam('idmicrored', $idmicrored, PDO::PARAM_STR);
        $stmt->bindParam('sico', $sicoplogo, PDO::PARAM_STR);
        $stmt->bindParam('num', $numSico, PDO::PARAM_STR);
        return $stmt->execute();
    }

    static public function editar($idusuario, $entidad, $eess, $ruc, $direccion, $telefono, $celular, $correo, $dni, $nombres, $apellidos, $password, $rol, $distrito, $imagen){
        $sql = "UPDATE usuario SET entidad = :entidad, codigo_eess = :codigo_eess, ruc = :ruc, direccion_es = :direccion_es, telefono_es = :telefono_es, celular_es = :celular_es, correo_es = :correo_es, dni = :dni, nombres = :nombres, apellidos = :apellidos, password = :password, rol = :rol, iddistrito = :iddistrito, foto = :foto WHERE idusuario = :idusuario";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('idusuario', $idusuario, PDO::PARAM_STR);
        $stmt->bindParam('entidad', $entidad, PDO::PARAM_STR);
        $stmt->bindParam('codigo_eess', $eess, PDO::PARAM_STR);

        return $stmt->execute();
    }

    static public function mostrar($idestablecimiento){
        $sql = "SELECT * FROM eess_us eu
        INNER JOIN microred_us mu ON eu.idmicrored = mu.idmicrored 
        INNER JOIN red_us ru ON mu.idred = ru.idred
        WHERE eu.ideess = '$idestablecimiento'";
        return Connection::executeQuery($sql);
    }

    static public function mostrarMaestroEstablecimiento($codigo_unico){
        $sql = "SELECT * FROM ipress_eess ie WHERE ie.Codigo_Unico = '$codigo_unico'";
        return Connection::executeQuery($sql);
    }

}
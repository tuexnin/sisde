<?php

require_once "connection.php";

class MicroRedModel{
    
    static public function getData (){
        $sql = "SELECT * FROM microred_us mu
        INNER JOIN red_us ru ON mu.idred = ru.idred ORDER BY mu.idmicrored ASC";
        return Connection::executeQuery($sql);
    }

    static public function getMicroRedMaestro ($codred){
        $sql = "SELECT * FROM ipress_microred im WHERE im.Codigo_Red = '$codred' AND im.Codigo_Cocadenado NOT IN (SELECT mu.codigo_cocatenado FROM microred_us mu)";
        return Connection::executeQuery($sql);
    }

    static public function getMicroRedCod ($idred){
        $sql = "SELECT * FROM microred_us mu WHERE mu.idred = '$idred'";
        return Connection::executeQuery($sql);
    }


    static public function getRedForUser ($idusuario){
        $sql = "SELECT * FROM red_us ru
        INNER JOIN usuario u ON ru.idred = u.idred 
        WHERE u.idusuario = '$idusuario'";
        return Connection::executeQuery($sql);
    }


    static public function insertar($codred, $cocatenado, $microred, $idred){
        $sql = "INSERT INTO microred_us (codigo_microred, codigo_cocatenado, microred, idred) VALUES (:codigo_microred, :codigo_cocatenado, :microred, :idred)";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('codigo_microred', $codred, PDO::PARAM_STR);
        $stmt->bindParam('codigo_cocatenado', $cocatenado, PDO::PARAM_STR);
        $stmt->bindParam('microred', $microred, PDO::PARAM_STR);
        $stmt->bindParam('idred', $idred, PDO::PARAM_STR);
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

    static public function mostrar($idmicrored){
        $sql = "SELECT * FROM microred_us mu 
        INNER JOIN red_us ru ON mu.idred = ru.idred
        WHERE mu.idmicrored= '$idmicrored'";
        return Connection::executeQuery($sql);
    }

    static public function getId($idmicrored){
        $sql = "SELECT * FROM microred_us mu WHERE mu.codigo_cocatenado = '$idmicrored'";
        return Connection::executeQuery($sql);
    }

    static public function mostrarMaestroMicroRed($codigo_micro){
        $sql = "SELECT * FROM ipress_microred im WHERE im.Codigo_Cocadenado = '$codigo_micro'";
        return Connection::executeQuery($sql);
    }

}
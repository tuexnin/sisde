<?php

require_once "connection.php";

class RedModel{
    
    static public function getData (){
        $sql = "SELECT * FROM red_us ORDER BY idred ASC";
        return Connection::executeQuery($sql);
    }

    static public function getRedMaestro (){
        $sql = "SELECT * FROM ipress_red ir WHERE Codigo_Red NOT IN (SELECT codigo_red FROM red_us)";
        return Connection::executeQuery($sql);
    }

    static public function getRed (){
        $sql = "SELECT * FROM red_us";
        return Connection::executeQuery($sql);
    }


    static public function insertar($red, $codigo_red){
        $sql = "INSERT INTO red_us (codigo_red, red) VALUES (:codigo_red, :red)";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('codigo_red', $codigo_red, PDO::PARAM_STR);
        $stmt->bindParam('red', $red, PDO::PARAM_STR);
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

    static public function mostrar($idred){
        $sql = "SELECT * FROM red_us WHERE idred = '$idred'";
        return Connection::executeQuery($sql);
    }

    static public function mostrarMaestroRed($idred){
        $sql = "SELECT * FROM ipress_red WHERE Codigo_Red = '$idred'";
        return Connection::executeQuery($sql);
    }

    static public function getId($idred){
        $sql = "SELECT * FROM red_us ru WHERE ru.codigo_red = '$idred'";
        return Connection::executeQuery($sql);
    }

}
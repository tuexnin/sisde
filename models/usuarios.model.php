<?php

require_once "connection.php";

class UsuariosModel{
    
    static public function getData ($tipo){
        $sql = "SELECT * FROM usuario u LEFT JOIN eess_us eu ON u.ideess = eu.ideess
        LEFT JOIN entidad e ON	u.identidad = e.identidad
        LEFT JOIN red_us ru ON u.idred = ru.idred
        WHERE u.tipo = CASE WHEN $tipo = 0 THEN u.tipo ELSE $tipo END ORDER BY u.idusuario ASC";
        return Connection::executeQuery($sql);
    }

    static public function getDepartamentos (){
        $sql = "SELECT * FROM ubigeo_peru_departments";
        return Connection::executeQuery($sql);
    }

    static public function getProvincias ($iddepartamento){
        $sql = "SELECT * FROM ubigeo_peru_provinces WHERE department_id = '$iddepartamento'";
        return Connection::executeQuery($sql);
    }

    static public function getDistritos ($idprovinvia){
        $sql = "SELECT * FROM ubigeo_peru_districts WHERE province_id = '$idprovinvia'";
        return Connection::executeQuery($sql);
    }

    static public function getCcpp ($iddistrito){
        $sql = "SELECT * FROM ubigeo_peru_ccpp WHERE Ubigeo_Distrito = '$iddistrito'";
        return Connection::executeQuery($sql);
    }

    static public function getUE ($iddistrito){
        $sql = "SELECT * FROM ubigeo_peru_red upr WHERE upr.UBIGEO = '$iddistrito'";
        return Connection::executeQuery($sql);
    }

    static public function insertar($dni, $nombres, $apellidos, $password, $rol, $imagen, $tipo, $ideess, $identidad, $idred){
        $sql = "INSERT INTO usuario (dni, nombres, apellidos, password, rol, foto, tipo, ideess, identidad, idred) VALUES (:dni, :nombres, :apellidos, :password, :rol, :foto, :tipo, :ideess, :identidad, :idred)";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('dni', $dni, PDO::PARAM_STR);
        $stmt->bindParam('nombres', $nombres, PDO::PARAM_STR);
        $stmt->bindParam('apellidos', $apellidos, PDO::PARAM_STR);
        $stmt->bindParam('password', $password, PDO::PARAM_STR);
        $stmt->bindParam('rol', $rol, PDO::PARAM_STR);
        $stmt->bindParam('foto', $imagen, PDO::PARAM_STR);
        $stmt->bindParam('tipo', $tipo, PDO::PARAM_STR);
        $stmt->bindParam('ideess', $ideess, PDO::PARAM_STR);
        $stmt->bindParam('identidad', $identidad, PDO::PARAM_STR);
        $stmt->bindParam('idred', $idred, PDO::PARAM_STR);
        return $stmt->execute();
    }

    static public function editar($idusuario, $dni, $nombres, $apellidos, $password, $rol, $imagen){
        $sql = "UPDATE usuario SET dni = :dni, nombres = :nombres, apellidos = :apellidos, password = :password, rol = :rol, foto = :foto WHERE idusuario = :idusuario";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('idusuario', $idusuario, PDO::PARAM_STR);
        $stmt->bindParam('dni', $dni, PDO::PARAM_STR);
        $stmt->bindParam('nombres', $nombres, PDO::PARAM_STR);
        $stmt->bindParam('apellidos', $apellidos, PDO::PARAM_STR);
        $stmt->bindParam('password', $password, PDO::PARAM_STR);
        $stmt->bindParam('rol', $rol, PDO::PARAM_STR);
        $stmt->bindParam('foto', $imagen, PDO::PARAM_STR);
        return $stmt->execute();
    }

    static public function mostrar($idusuario){
        $sql = "SELECT * FROM usuario WHERE idusuario = '$idusuario'";
        return Connection::executeQuery($sql);
    }

    static public function rol($rol){
        $data = array(
            "1" => "ROOT",
            "2" => "ADMINISTRADOR",
            "3" => "COLABORADOR"
        );

        return $data[$rol];
    }

    static public function tipo($tipo){
        $data = array(
            "0" => "SUPER USUARIO",
            "1" => "RED",
            "2" => "ESTABLECIMIENTO",
            "3" => "ENTIDAD"
        );

        return $data[$tipo];
    }

    static public function tipoDesc($tipo, $red, $estable, $enti){

        $data = array(
            "0" => "SUPER USUARIO",
            "1" => $red,
            "2" => $estable,
            "3" => $enti
        );

        return $data[$tipo];
    }

}
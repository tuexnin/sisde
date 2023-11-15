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

    static public function insertar($entidad, $ruc, $direccion, $telefono, $anexo, $celular, $correo, $iddistrito, $nombre_responsable, $apellidos_responsable, $unidad, $ruc_unidad, $direccion_unidad, $telefono_unidad, $anexo_unidad, $celular_unidad, $correo_unidad, $ape_resp_unidad, $nom_resp_unidad, $institucion, $ruc_institucion, $direccion_institucion, $telefono_institucion, $anexo_institucion, $celular_institucion, $correo_institucion){
        $sql = "INSERT INTO entidad (entidad, ruc, direccion, telefono, anexo, celular, correo, iddistrito, nombre_responsable, apellidos_responsable, unidad, ruc_unidad, direccion_unidad, telefono_unidad, anexo_unidad, celular_unidad, correo_unidad, apellido_resp_unidad, nombres_resp_unidad, institucion, ruc_institucion, direccion_institucion, telefono_institucion, anexo_institucion, celular_institucion, correo_institucion) VALUES (:entidad, :ruc, :direccion, :telefono, :anexo, :celular, :correo, :iddistrito, :nombre_responsable, :apellidos_responsable, :unidad, :ruc_unidad, :direccion_unidad, :telefono_unidad, :anexo_unidad, :celular_unidad, :correo_unidad, :apellido_resp_unidad, :nombres_resp_unidad, :institucion, :ruc_institucion, :direccion_institucion, :telefono_institucion, :anexo_institucion, :celular_institucion, :correo_institucion)";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('entidad', $entidad, PDO::PARAM_STR);
        $stmt->bindParam('ruc', $ruc, PDO::PARAM_STR);
        $stmt->bindParam('direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam('telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam('anexo', $anexo, PDO::PARAM_STR);
        $stmt->bindParam('celular', $celular, PDO::PARAM_STR);
        $stmt->bindParam('correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam('iddistrito', $iddistrito, PDO::PARAM_STR);
        $stmt->bindParam('nombre_responsable', $nombre_responsable, PDO::PARAM_STR);
        $stmt->bindParam('apellidos_responsable', $apellidos_responsable, PDO::PARAM_STR);
        $stmt->bindParam('unidad', $unidad, PDO::PARAM_STR);
        $stmt->bindParam('ruc_unidad', $ruc_unidad, PDO::PARAM_STR);
        $stmt->bindParam('direccion_unidad', $direccion_unidad, PDO::PARAM_STR);
        $stmt->bindParam('telefono_unidad', $telefono_unidad, PDO::PARAM_STR);
        $stmt->bindParam('anexo_unidad', $anexo_unidad, PDO::PARAM_STR);
        $stmt->bindParam('celular_unidad', $celular_unidad, PDO::PARAM_STR);
        $stmt->bindParam('correo_unidad', $correo_unidad, PDO::PARAM_STR);
        $stmt->bindParam('apellido_resp_unidad', $ape_resp_unidad, PDO::PARAM_STR);
        $stmt->bindParam('nombres_resp_unidad', $nom_resp_unidad, PDO::PARAM_STR);
        $stmt->bindParam('institucion', $institucion, PDO::PARAM_STR);
        $stmt->bindParam('ruc_institucion', $ruc_institucion, PDO::PARAM_STR);
        $stmt->bindParam('direccion_institucion', $direccion_institucion, PDO::PARAM_STR);
        $stmt->bindParam('telefono_institucion', $telefono_institucion, PDO::PARAM_STR);
        $stmt->bindParam('anexo_institucion', $anexo_institucion, PDO::PARAM_STR);
        $stmt->bindParam('celular_institucion', $celular_institucion, PDO::PARAM_STR);
        $stmt->bindParam('correo_institucion', $correo_institucion, PDO::PARAM_STR);
        return $stmt->execute();
    }

    static public function editar($identidad, $entidad, $ruc, $direccion, $telefono, $anexo, $celular, $correo, $nombre_responsable, $apellidos_responsable, $unidad, $ruc_unidad, $direccion_unidad, $telefono_unidad, $anexo_unidad, $celular_unidad, $correo_unidad, $ape_resp_unidad, $nom_resp_unidad, $institucion, $ruc_institucion, $direccion_institucion, $telefono_institucion, $anexo_institucion, $celular_institucion, $correo_institucion){
        $sql = "UPDATE entidad SET entidad = :entidad, ruc = :ruc, direccion = :direccion, telefono = :telefono, anexo = :anexo, celular = :celular, correo = :correo, nombre_responsable = :nombre_responsable, apellidos_responsable = :apellidos_responsable, unidad = :unidad, ruc_unidad = :ruc_unidad, direccion_unidad = :direccion_unidad, telefono_unidad = :telefono_unidad, anexo_unidad = :anexo_unidad, celular_unidad = :celular_unidad, correo_unidad = :correo_unidad, apellido_resp_unidad = :apellido_resp_unidad, nombres_resp_unidad = :nombres_resp_unidad, institucion = :institucion, ruc_institucion = :ruc_institucion, direccion_institucion = :direccion_institucion, telefono_institucion = :telefono_institucion, anexo_institucion = :anexo_institucion, celular_institucion = :celular_institucion, correo_institucion = :correo_institucion WHERE identidad = :identidad";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('identidad', $identidad, PDO::PARAM_STR);
        $stmt->bindParam('entidad', $entidad, PDO::PARAM_STR);
        $stmt->bindParam('ruc', $ruc, PDO::PARAM_STR);
        $stmt->bindParam('direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam('telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam('anexo', $anexo, PDO::PARAM_STR);
        $stmt->bindParam('celular', $celular, PDO::PARAM_STR);
        $stmt->bindParam('correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam('nombre_responsable', $nombre_responsable, PDO::PARAM_STR);
        $stmt->bindParam('apellidos_responsable', $apellidos_responsable, PDO::PARAM_STR);
        $stmt->bindParam('unidad', $unidad, PDO::PARAM_STR);
        $stmt->bindParam('ruc_unidad', $ruc_unidad, PDO::PARAM_STR);
        $stmt->bindParam('direccion_unidad', $direccion_unidad, PDO::PARAM_STR);
        $stmt->bindParam('telefono_unidad', $telefono_unidad, PDO::PARAM_STR);
        $stmt->bindParam('anexo_unidad', $anexo_unidad, PDO::PARAM_STR);
        $stmt->bindParam('celular_unidad', $celular_unidad, PDO::PARAM_STR);
        $stmt->bindParam('correo_unidad', $correo_unidad, PDO::PARAM_STR);
        $stmt->bindParam('apellido_resp_unidad', $ape_resp_unidad, PDO::PARAM_STR);
        $stmt->bindParam('nombres_resp_unidad', $nom_resp_unidad, PDO::PARAM_STR);
        $stmt->bindParam('institucion', $institucion, PDO::PARAM_STR);
        $stmt->bindParam('ruc_institucion', $ruc_institucion, PDO::PARAM_STR);
        $stmt->bindParam('direccion_institucion', $direccion_institucion, PDO::PARAM_STR);
        $stmt->bindParam('telefono_institucion', $telefono_institucion, PDO::PARAM_STR);
        $stmt->bindParam('anexo_institucion', $anexo_institucion, PDO::PARAM_STR);
        $stmt->bindParam('celular_institucion', $celular_institucion, PDO::PARAM_STR);
        $stmt->bindParam('correo_institucion', $correo_institucion, PDO::PARAM_STR);
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
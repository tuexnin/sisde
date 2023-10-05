<?php

require_once "connection.php";

class MovimientosModel{
    
    static public function getData (){
        $sql = "SELECT * FROM eess_us eu
        INNER JOIN microred_us mu ON eu.idmicrored = mu.idmicrored
        INNER JOIN red_us ru ON mu.idred = ru.idred ORDER BY eu.ideess ASC";
        return Connection::executeQuery($sql);
    }

    static public function getDataId ($idmovimiento){
        $sql = "SELECT * FROM movimientos m
        INNER JOIN registros r ON m.idregistro = r.idregistro
        WHERE m.idmovimiento = '$idmovimiento' ORDER BY m.idmovimiento ASC";
        return Connection::executeQuery($sql);
    }

    static public function getDatosMovimiento($idmoviento){
        $sql = "SELECT * FROM movimientos m WHERE m.idmovimiento = '$idmoviento'";
        return Connection::executeQuery($sql);
    }

    static public function insertar($idRegistra, $iddestino, $idregistro, $tipomovimiento, $procesado,$idmovimientoPro, $idess, $idderiva){
        $sql = "INSERT INTO movimientos (id_registra, id_destino, idregistro, tipo_movimiento, procesado, idmovprocesado, ideess, idderiva) VALUES (:id_registra, :id_destino, :idregistro, :tipo_movimiento, :procesado, :idmovprocesado, :ideess, :idderiva)";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('id_registra', $idRegistra, PDO::PARAM_STR);
        $stmt->bindParam('id_destino', $iddestino, PDO::PARAM_STR);
        $stmt->bindParam('idregistro', $idregistro, PDO::PARAM_STR);
        $stmt->bindParam('tipo_movimiento', $tipomovimiento, PDO::PARAM_STR);
        $stmt->bindParam('procesado', $procesado, PDO::PARAM_STR);
        $stmt->bindParam('idmovprocesado', $idmovimientoPro, PDO::PARAM_STR);
        $stmt->bindParam('ideess', $idess, PDO::PARAM_STR);
        $stmt->bindParam('idderiva', $idderiva, PDO::PARAM_STR);
        return $stmt->execute();
    }

    static public function editarProcesado($idmovimiento, $procesado){
        $sql = "UPDATE movimientos SET procesado = :procesado WHERE idmovimiento = :idmovimiento";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('idmovimiento', $idmovimiento, PDO::PARAM_STR);
        $stmt->bindParam('procesado', $procesado, PDO::PARAM_STR);
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

    static public function tipoMov($aux){
        $data = array(
            "1" => "REGISTRADO",
            "2" => "LISTO",
            "3" => "DERIVADO",
            "4" => "ATENDIDIO"
        );
        return $data[$aux];
    }

}
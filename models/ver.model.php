<?php

require_once "connection.php";

class VerModel{

    static public function ver($idmovimiento){
        $sql = "SELECT r.idregistro, 
        r.nombre_prof, 
        r.cargo_prof,
        r.telefono_prof,
        r.correo_prof,
        r.fecha_derivacion,
        r.familia_con,
        r.unidad_ejecutora,
        r.jefe_es,
        r.ue_derivar,
        r.ap_nom_us,
        r.fecha_nas_us,
        r.edad_us,
        r.sexo_us,
        r.nacionalidad_us,
        r.grado_instruc_us,
        r.ocupacion_us,
        r.domicilio_dni_us,
        r.domicilio_actual_us,
        r.telefono_us,
        r.ap_nom_tu,
        r.dni_tu,
        r.fecha_nac_tu,
        r.edad_tu,
        r.sexo_tu,
        r.nacionalidad_tu,
        r.parentezco_tu,
        r.grado_instuc_tu,
        r.ocupacion_tu,
        r.domicilio_dni_tu,
        r.domicilio_actual_tu,
        r.telefono_tu,
        r.celular_tu,
        r.vic_agre,
        r.tipo_vul_der,
        r.maltrato_infantil,
        r.maltrato_fisico,
        r.desercion_escolar,
        r.acoso_escolar,
        r.violencia_sexual,
        r.violencia_familiar,
        r.violencia_genero,
        r.abandono_desamparo,
        r.consumo,
        r.otro_desc,
        r.motivo_der,
        r.datos_relevantes,
        e.entidad,
        e.ruc,
        e.direccion,
        e.telefono,
        e.celular,
        e.correo,
        upd.name as distrito,
        upp.name as provincia,
        upd2.name as departamento
        FROM movimientos m 
        INNER JOIN registros r ON m.idregistro = r.idregistro
        INNER JOIN entidad e ON r.identidad = e.identidad
        INNER JOIN ubigeo_peru_districts upd ON e.iddistrito = upd.id
        INNER JOIN ubigeo_peru_provinces upp ON upd.province_id = upp.id
        INNER JOIN ubigeo_peru_departments upd2 ON upp.department_id = upd2.id
        WHERE m.idmovimiento = '$idmovimiento'";
        return Connection::executeQuery($sql);
    }

    static public function ue($ue){
        $sql = "SELECT * FROM red_us ru WHERE ru.idred = '$ue'";
        return Connection::executeQuery($sql);
    }

    static public function verDocs($idmovimiento){
        $sql = "SELECT d.iddocumento, d.nombre, d.doc, td.nombre as tipo, m.idmovimiento FROM movimientos m 
        INNER JOIN registros r ON m.idregistro = r.idregistro
        INNER JOIN documentos d ON r.idregistro = d.idregistro
        INNER JOIN tipo_documento td ON d.idtipo_documento = td.idtipo_documento 
        WHERE m.idmovimiento = '$idmovimiento'";
        return Connection::executeQuery($sql);
    }

    static public function regID($idmovimiento){
        $sql = "SELECT m.idregistro FROM movimientos m WHERE m.idmovimiento = '$idmovimiento'";
        return Connection::executeQuery($sql);
    }

    static public function verMovimientos($idregistro){
        $sql = "SELECT m.tipo_movimiento, e.entidad, ru.red AS redDes, ru2.red AS redDer, eu.establecimiento, m.idderiva FROM movimientos m
        LEFT JOIN entidad e ON m.id_registra = e.identidad
        LEFT JOIN red_us ru ON m.id_destino = ru.idred
        LEFT JOIN red_us ru2 ON m.idderiva = ru2.idred
        LEFT JOIN eess_us eu ON m.ideess = eu.ideess
        WHERE m.idregistro = '$idregistro' ORDER BY m.tipo_movimiento ASC";
        return Connection::executeQuery($sql);
    }

}
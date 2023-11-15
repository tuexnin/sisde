<?php

require_once "connection.php";

class RegistrosModel{
    
    static public function getData ($identidad){
        $sql = "SELECT * FROM movimientos m 
        INNER JOIN registros r ON m.idregistro = r.idregistro
        WHERE m.procesado = 0 AND r.identidad = '$identidad' ORDER BY m.idmovimiento DESC";
        return Connection::executeQuery($sql);
    }
    
    static public function getIdREd ($UeDerivar){
        $sql = "SELECT ru.idred FROM red_us ru WHERE ru.red = '$UeDerivar'";
        return Connection::executeQuery($sql);
    }

    static public function insertar($derivacionF, $UeDerivar, $Ap_nom_us, $fechanas_us, $EdadUs, $SexoUs, $Nacionalidad, $GradoInstruc, $OcupacionUs, $DomicilioDni, $DomicilioAct, $CcppUs, $TelefonoUs, $DniUs, $Ap_nom_tu, $DniTu, $fechanas_tu, $EdadTu, $SexoTu, $NacionalidadTu, $ParentestoTu, $GradoInstrucTu, $OcupacionTu, $DomicilioDniTu, $DomicilioActTu, $TelefonoFijoTu, $CelularTu, $VicAgre, $TipoVulDer, $ViolenciaC, $AbandonoDesamp, $Alcohol, $OtroDesc, $MotivoDer, $DatosRelevant, $idusuario, $identidad, $fecha_reg, $eessDirecto, $directo){
        $sql = "INSERT INTO registros (fecha_derivacion, ue_derivar, ap_nom_us, fecha_nas_us, edad_us, sexo_us, nacionalidad_us, grado_instruc_us, ocupacion_us, domicilio_dni_us, domicilio_actual_us, ccpp, telefono_us, dni_us, ap_nom_tu, dni_tu, fecha_nac_tu, edad_tu, sexo_tu, nacionalidad_tu, parentezco_tu, grado_instuc_tu, ocupacion_tu, domicilio_dni_tu, domicilio_actual_tu, telefono_tu, celular_tu, vic_agre, tipo_vul_der, violencia_sexual, abandono_desamparo, consumo, otro_desc, motivo_der, datos_relevantes, idusuario, identidad, fecha_reg, eessdirect, directo) VALUES (:fecha_derivacion, :ue_derivar, :ap_nom_us, :fecha_nas_us, :edad_us, :sexo_us, :nacionalidad_us, :grado_instruc_us, :ocupacion_us, :domicilio_dni_us, :domicilio_actual_us, :ccpp, :telefono_us, :dni_us, :ap_nom_tu, :dni_tu, :fecha_nac_tu, :edad_tu, :sexo_tu, :nacionalidad_tu, :parentezco_tu, :grado_instuc_tu, :ocupacion_tu, :domicilio_dni_tu, :domicilio_actual_tu, :telefono_tu, :celular_tu, :vic_agre, :tipo_vul_der, :violencia_sexual, :abandono_desamparo, :consumo, :otro_desc, :motivo_der, :datos_relevantes, :idusuario, :identidad, :fecha_reg, :eessdirect, :directo)";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('fecha_derivacion', $derivacionF, PDO::PARAM_STR);
        $stmt->bindParam('ue_derivar', $UeDerivar, PDO::PARAM_STR);
        $stmt->bindParam('ap_nom_us', $Ap_nom_us, PDO::PARAM_STR);
        $stmt->bindParam('fecha_nas_us', $fechanas_us, PDO::PARAM_STR);
        $stmt->bindParam('edad_us', $EdadUs, PDO::PARAM_STR);
        $stmt->bindParam('sexo_us', $SexoUs, PDO::PARAM_STR);
        $stmt->bindParam('nacionalidad_us', $Nacionalidad, PDO::PARAM_STR);
        $stmt->bindParam('grado_instruc_us', $GradoInstruc, PDO::PARAM_STR);
        $stmt->bindParam('ocupacion_us', $OcupacionUs, PDO::PARAM_STR);
        $stmt->bindParam('domicilio_dni_us', $DomicilioDni, PDO::PARAM_STR);
        $stmt->bindParam('domicilio_actual_us', $DomicilioAct, PDO::PARAM_STR);
        $stmt->bindParam('ccpp', $CcppUs, PDO::PARAM_STR);
        $stmt->bindParam('telefono_us', $TelefonoUs, PDO::PARAM_STR);
        $stmt->bindParam('dni_us', $DniUs, PDO::PARAM_STR);
        $stmt->bindParam('ap_nom_tu', $Ap_nom_tu, PDO::PARAM_STR);
        $stmt->bindParam('dni_tu', $DniTu, PDO::PARAM_STR);
        $stmt->bindParam('fecha_nac_tu', $fechanas_tu, PDO::PARAM_STR);
        $stmt->bindParam('edad_tu', $EdadTu, PDO::PARAM_STR);
        $stmt->bindParam('sexo_tu', $SexoTu, PDO::PARAM_STR);
        $stmt->bindParam('nacionalidad_tu', $NacionalidadTu, PDO::PARAM_STR);
        $stmt->bindParam('parentezco_tu', $ParentestoTu, PDO::PARAM_STR);
        $stmt->bindParam('grado_instuc_tu', $GradoInstrucTu, PDO::PARAM_STR);
        $stmt->bindParam('ocupacion_tu', $OcupacionTu, PDO::PARAM_STR);
        $stmt->bindParam('domicilio_dni_tu', $DomicilioDniTu, PDO::PARAM_STR);
        $stmt->bindParam('domicilio_actual_tu', $DomicilioActTu, PDO::PARAM_STR);
        $stmt->bindParam('telefono_tu', $TelefonoFijoTu, PDO::PARAM_STR);
        $stmt->bindParam('celular_tu', $CelularTu, PDO::PARAM_STR);
        $stmt->bindParam('vic_agre', $VicAgre, PDO::PARAM_STR);
        $stmt->bindParam('tipo_vul_der', $TipoVulDer, PDO::PARAM_STR);
        $stmt->bindParam('violencia_sexual', $ViolenciaC, PDO::PARAM_STR);
        $stmt->bindParam('abandono_desamparo', $AbandonoDesamp, PDO::PARAM_STR);
        $stmt->bindParam('consumo', $Alcohol, PDO::PARAM_STR);
        $stmt->bindParam('otro_desc', $OtroDesc, PDO::PARAM_STR);
        $stmt->bindParam('motivo_der', $MotivoDer, PDO::PARAM_STR);
        $stmt->bindParam('datos_relevantes', $DatosRelevant, PDO::PARAM_STR);
        $stmt->bindParam('idusuario', $idusuario, PDO::PARAM_STR);
        $stmt->bindParam('identidad', $identidad, PDO::PARAM_STR);
        $stmt->bindParam('fecha_reg', $fecha_reg, PDO::PARAM_STR);
        $stmt->bindParam('eessdirect', $eessDirecto, PDO::PARAM_STR);
        $stmt->bindParam('directo', $directo, PDO::PARAM_STR);
        if($stmt->execute()){
            return $link->lastInsertId();
        }else{
            return "error";
        }
    }

    static public function editar($idregistro, $derivacionF, $UeDerivar, $Ap_nom_us, $fechanas_us, $EdadUs, $SexoUs, $Nacionalidad, $GradoInstruc, $OcupacionUs, $DomicilioDni, $DomicilioAct, $CcppUs, $TelefonoUs, $DniUs, $Ap_nom_tu, $DniTu, $fechanas_tu, $EdadTu, $SexoTu, $NacionalidadTu, $ParentestoTu, $GradoInstrucTu, $OcupacionTu, $DomicilioDniTu, $DomicilioActTu, $TelefonoFijoTu, $CelularTu, $VicAgre, $TipoVulDer, $ViolenciaC, $AbandonoDesamp, $Alcohol, $OtroDesc, $MotivoDer, $DatosRelevant, $idusuario, $identidad){
        $sql = "UPDATE registros SET fecha_derivacion = :fecha_derivacion, ue_derivar = :ue_derivar, ap_nom_us = :ap_nom_us, fecha_nas_us = :fecha_nas_us, edad_us = :edad_us, sexo_us = :sexo_us, nacionalidad_us = :nacionalidad_us, grado_instruc_us = :grado_instruc_us, ocupacion_us = :ocupacion_us, domicilio_dni_us = :domicilio_dni_us, domicilio_actual_us = :domicilio_actual_us, ccpp = :ccpp, telefono_us = :telefono_us, dni_us = :dni_us, ap_nom_tu = :ap_nom_tu, dni_tu = :dni_tu, fecha_nac_tu = :fecha_nac_tu, edad_tu = :edad_tu, sexo_tu = :sexo_tu, nacionalidad_tu = :nacionalidad_tu, parentezco_tu = :parentezco_tu, grado_instuc_tu = :grado_instuc_tu, ocupacion_tu = :ocupacion_tu, domicilio_dni_tu = :domicilio_dni_tu, domicilio_actual_tu = :domicilio_actual_tu, telefono_tu = :telefono_tu, celular_tu = :celular_tu, vic_agre = :vic_agre, tipo_vul_der = :tipo_vul_der, violencia_sexual = :violencia_sexual, abandono_desamparo = :abandono_desamparo, consumo = :consumo, otro_desc = :otro_desc, motivo_der = :motivo_der, datos_relevantes = :datos_relevantes, idusuario = :idusuario, identidad = :identidad WHERE idregistro = :idregistro";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('idregistro', $idregistro, PDO::PARAM_STR);
        $stmt->bindParam('fecha_derivacion', $derivacionF, PDO::PARAM_STR);
        $stmt->bindParam('ue_derivar', $UeDerivar, PDO::PARAM_STR);
        $stmt->bindParam('ap_nom_us', $Ap_nom_us, PDO::PARAM_STR);
        $stmt->bindParam('fecha_nas_us', $fechanas_us, PDO::PARAM_STR);
        $stmt->bindParam('edad_us', $EdadUs, PDO::PARAM_STR);
        $stmt->bindParam('sexo_us', $SexoUs, PDO::PARAM_STR);
        $stmt->bindParam('nacionalidad_us', $Nacionalidad, PDO::PARAM_STR);
        $stmt->bindParam('grado_instruc_us', $GradoInstruc, PDO::PARAM_STR);
        $stmt->bindParam('ocupacion_us', $OcupacionUs, PDO::PARAM_STR);
        $stmt->bindParam('domicilio_dni_us', $DomicilioDni, PDO::PARAM_STR);
        $stmt->bindParam('domicilio_actual_us', $DomicilioAct, PDO::PARAM_STR);
        $stmt->bindParam('ccpp', $CcppUs, PDO::PARAM_STR);
        $stmt->bindParam('telefono_us', $TelefonoUs, PDO::PARAM_STR);
        $stmt->bindParam('dni_us', $DniUs, PDO::PARAM_STR);
        $stmt->bindParam('ap_nom_tu', $Ap_nom_tu, PDO::PARAM_STR);
        $stmt->bindParam('dni_tu', $DniTu, PDO::PARAM_STR);
        $stmt->bindParam('fecha_nac_tu', $fechanas_tu, PDO::PARAM_STR);
        $stmt->bindParam('edad_tu', $EdadTu, PDO::PARAM_STR);
        $stmt->bindParam('sexo_tu', $SexoTu, PDO::PARAM_STR);
        $stmt->bindParam('nacionalidad_tu', $NacionalidadTu, PDO::PARAM_STR);
        $stmt->bindParam('parentezco_tu', $ParentestoTu, PDO::PARAM_STR);
        $stmt->bindParam('grado_instuc_tu', $GradoInstrucTu, PDO::PARAM_STR);
        $stmt->bindParam('ocupacion_tu', $OcupacionTu, PDO::PARAM_STR);
        $stmt->bindParam('domicilio_dni_tu', $DomicilioDniTu, PDO::PARAM_STR);
        $stmt->bindParam('domicilio_actual_tu', $DomicilioActTu, PDO::PARAM_STR);
        $stmt->bindParam('telefono_tu', $TelefonoFijoTu, PDO::PARAM_STR);
        $stmt->bindParam('celular_tu', $CelularTu, PDO::PARAM_STR);
        $stmt->bindParam('vic_agre', $VicAgre, PDO::PARAM_STR);
        $stmt->bindParam('tipo_vul_der', $TipoVulDer, PDO::PARAM_STR);
        $stmt->bindParam('violencia_sexual', $ViolenciaC, PDO::PARAM_STR);
        $stmt->bindParam('abandono_desamparo', $AbandonoDesamp, PDO::PARAM_STR);
        $stmt->bindParam('consumo', $Alcohol, PDO::PARAM_STR);
        $stmt->bindParam('otro_desc', $OtroDesc, PDO::PARAM_STR);
        $stmt->bindParam('motivo_der', $MotivoDer, PDO::PARAM_STR);
        $stmt->bindParam('datos_relevantes', $DatosRelevant, PDO::PARAM_STR);
        $stmt->bindParam('idusuario', $idusuario, PDO::PARAM_STR);
        $stmt->bindParam('identidad', $identidad, PDO::PARAM_STR);
        return $stmt->execute();
    }

    static public function mostrar($idregistro){
        $sql = "SELECT * FROM registros WHERE idregistro = '$idregistro'";
        return Connection::executeQuery($sql);
    }

    static public function eliminar($idatencion){
        $sql = "delete from reg_atenciones where idatencion = :idatencion";
        $link = Connection::connect();
        $stmt = $link->prepare($sql);
        $stmt->bindParam('idatencion', $idatencion, PDO::PARAM_STR);
        if($stmt->execute()){
            $response = array(
                "icono" => "success",
                "mensaje" => "Registro eliminado"
            );
            return $response;
        }else{
            $response = array(
                "icono" => "error",
                "mensaje" => "Error: no se pudo eliminar el registro"
            );
            return $response;
        }
    }

    static public function validarMenu($idmovimiento, $idtipomovimiento, $idregistro, $estado){
        if($idtipomovimiento == 1 && $estado == 0){
            return '
            <div class="btn-group">
            <button type="button" class="btn btn-outline-primary mr-1" onclick="ver(' . $idmovimiento . ')"><i class="fa fa-eye"></i></button>
                <div class="dropdown">
                    <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" onclick="listo(' . $idmovimiento . ')"><i class="fa fa-check"></i> Listo  </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="mostrar(' . $idregistro . ')"><i class="fa fa-edit text-red"></i> Editar</a>
                    </div>
                    </div>
                    </div>';
        }else if(($idtipomovimiento == 2 || $idtipomovimiento != 3 || $idtipomovimiento != 4) && $estado == 0){
            return '
            <div class="btn-group">
            <button type="button" class="btn btn-outline-primary mr-1" onclick="ver(' . $idmovimiento . ')"><i class="fa fa-eye"></i></button>
            </div>';
        }
    }

    static public function getBadge($idtipomov){
        $data = array(
            "1" => "badge-primary",
            "2" => "badge-warning",
            "3" => "badge-danger",
            "4" => "badge-success"
        );
        return $data[$idtipomov];
    }

}
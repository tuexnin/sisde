<?php

require_once "../models/registros.model.php";
require_once "../models/movimientos.model.php";
require_once "../models/upload.model.php";

$RegistrosModel = new RegistrosModel();
$MovimientosModel = new MovimientosModel();
$UploadModel = new UploadModel();

date_default_timezone_set('America/Lima');
$idregistro = isset($_POST['txtIdregistro']) ? $_POST['txtIdregistro'] : "";
$FecDerivacion = isset($_POST['txtFecDerivacion']) ? $_POST['txtFecDerivacion'] : "";
$Ap_nom_us = isset($_POST['txtAp_nom_us']) ? $_POST['txtAp_nom_us'] : "";
$Fecha_nas = isset($_POST['txtFecha_nas']) ? $_POST['txtFecha_nas'] : "";
$EdadUs = isset($_POST['txtEdadUs']) ? $_POST['txtEdadUs'] : "";
$Nacionalidad = isset($_POST['txtNacionalidad']) ? $_POST['txtNacionalidad'] : "";
$GradoInstruc = isset($_POST['txtGradoInstruc']) ? $_POST['txtGradoInstruc'] : "";
$OcupacionUs = isset($_POST['txtOcupacionUs']) ? $_POST['txtOcupacionUs'] : "";
$DomicilioDni = isset($_POST['txtDomicilioDni']) ? $_POST['txtDomicilioDni'] : "";
$DomicilioAct = isset($_POST['txtDomicilioAct']) ? $_POST['txtDomicilioAct'] : "";
$TelefonoUs = isset($_POST['txtTelefonoUs']) ? $_POST['txtTelefonoUs'] : "";
$DniUs = isset($_POST['txtDni_us']) ? $_POST['txtDni_us'] : "";
$Ap_nom_tu = isset($_POST['txtAp_nom_tu']) ? $_POST['txtAp_nom_tu'] : "";
$Fecha_nas_tu = isset($_POST['txtFecha_nas_tu']) ? $_POST['txtFecha_nas_tu'] : "";
$EdadTu = isset($_POST['txtEdadTu']) ? $_POST['txtEdadTu'] : "";
$DniTu = isset($_POST['txtDniTu']) ? $_POST['txtDniTu'] : "";
$NacionalidadTu = isset($_POST['txtNacionalidadTu']) ? $_POST['txtNacionalidadTu'] : "";
$ParentestoTu = isset($_POST['txtParentestoTu']) ? $_POST['txtParentestoTu'] : "";
$GradoInstrucTu = isset($_POST['txtGradoInstrucTu']) ? $_POST['txtGradoInstrucTu'] : "";
$OcupacionTu = isset($_POST['txtOcupacionTu']) ? $_POST['txtOcupacionTu'] : "";
$DomicilioDniTu = isset($_POST['txtDomicilioDniTu']) ? $_POST['txtDomicilioDniTu'] : "";
$DomicilioActTu = isset($_POST['txtDomicilioActTu']) ? $_POST['txtDomicilioActTu'] : "";
$TelefonoFijoTu = isset($_POST['txtTelefonoFijoTu']) ? $_POST['txtTelefonoFijoTu'] : "";
$CelularTu = isset($_POST['txtCelularTu']) ? $_POST['txtCelularTu'] : "";
$TipoVulDer = isset($_POST['txtTipoVulDer']) ? $_POST['txtTipoVulDer'] : "";
$ViolenciaC = isset($_POST['txtViolenciaC']) ? $_POST['txtViolenciaC'] : "";
$AbandonoDesamp = isset($_POST['txtAbandoDesamp']) ? $_POST['txtAbandoDesamp'] : "";
$Alcohol = isset($_POST['txtAlcohol']) ? $_POST['txtAlcohol'] : "";
$OtroDesc = isset($_POST['txtOtroDesc']) ? $_POST['txtOtroDesc'] : "";
$MotivoDer = isset($_POST['txtMotivoDer']) ? $_POST['txtMotivoDer'] : "";
$DatosRelevant = isset($_POST['txtDatosRelevant']) ? $_POST['txtDatosRelevant'] : "";
$SexoUs = isset($_POST['txtSexoUs']) ? $_POST['txtSexoUs'] : "";
$SexoTu = isset($_POST['txtSexoTu']) ? $_POST['txtSexoTu'] : "";
$VicAgre = isset($_POST['txtVicAgre']) ? $_POST['txtVicAgre'] : "";
$CcppUs = isset($_POST['txtCcppUs']) ? $_POST['txtCcppUs'] : "";
$UeDerivar = isset($_POST['txtUeDerivar']) ? $_POST['txtUeDerivar'] : "";
$idusuario = isset($_POST['txtidusuario']) ? $_POST['txtidusuario'] : "";
$identidad = isset($_POST['txtidentidad']) ? $_POST['txtidentidad'] : "";
$directo = isset($_POST['directo']) ? $_POST['directo'] : "";
$eessDirecto = isset($_POST['eessDirecto']) ? $_POST['eessDirecto'] : "";

$derivacionF = date_format(date_create($FecDerivacion), 'Y-m-d');
$fechanas_us = date_format(date_create($Fecha_nas), 'Y-m-d');
$fechanas_tu = date_format(date_create($Fecha_nas_tu), 'Y-m-d');
$fecha_reg = date('Y-m-d');


switch ($_GET["op"]) {
    case 'guardaryeditar':
        $ue = "";
        $rspta = $RegistrosModel::getIdREd($UeDerivar);
        foreach ($rspta as $val) {
            $ue = $val->idred;
        }

        if (empty($ue)) {
            echo "Error la red no esta registrada en el sistema, debe ser agredada";
        } else {
            if (empty($idregistro)) {
                $rspta = $RegistrosModel::insertar($derivacionF, $ue, $Ap_nom_us, $fechanas_us, $EdadUs, $SexoUs, $Nacionalidad, $GradoInstruc, $OcupacionUs, $DomicilioDni, $DomicilioAct, $CcppUs, $TelefonoUs, $DniUs, $Ap_nom_tu, $DniTu, $fechanas_tu, $EdadTu, $SexoTu, $NacionalidadTu, $ParentestoTu, $GradoInstrucTu, $OcupacionTu, $DomicilioDniTu, $DomicilioActTu, $TelefonoFijoTu, $CelularTu, $VicAgre, $TipoVulDer, $ViolenciaC, $AbandonoDesamp, $Alcohol, $OtroDesc, $MotivoDer, $DatosRelevant, $idusuario, $identidad, $fecha_reg, $eessDirecto, $directo);
                if ($rspta != "error") {
                    $rspta2 = $MovimientosModel::insertar($identidad, null, $rspta, 1, 0, null, null, null);
                    echo $rspta2 ? "Registro Correcto" : "No se pudo Registrar";
                } else {
                    echo "No se pudo registrar";
                }
            } else {
                $rspta = $RegistrosModel::editar($idregistro, $derivacionF, $ue, $Ap_nom_us, $fechanas_us, $EdadUs, $SexoUs, $Nacionalidad, $GradoInstruc, $OcupacionUs, $DomicilioDni, $DomicilioAct, $CcppUs, $TelefonoUs, $DniUs, $Ap_nom_tu, $DniTu, $fechanas_tu, $EdadTu, $SexoTu, $NacionalidadTu, $ParentestoTu, $GradoInstrucTu, $OcupacionTu, $DomicilioDniTu, $DomicilioActTu, $TelefonoFijoTu, $CelularTu, $VicAgre, $TipoVulDer, $ViolenciaC, $AbandonoDesamp, $Alcohol, $OtroDesc, $MotivoDer, $DatosRelevant, $idusuario, $identidad);
                echo $rspta ? "Registro actualizado" : "No se pudo actualizar";
            }
        }


        break;

    case 'mostrar':
        $rspta = $RegistrosModel::mostrar($idregistro);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'getidred':
        $rspta = $RegistrosModel::getIdREd($UeDerivar);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'eliminar':
        $rspta = $AtencionModel::eliminar($idatencion);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listar':
        session_start();
        $rspt = $RegistrosModel::getData($_SESSION['ididenti']);
        $data = array();
        if($rspt){
            $idsRegistros = array_column($rspt, 'idregistro');
            $mostrarInfo = $UploadModel::mostrarMultiple($idsRegistros);
        }
        foreach ($rspt as $result) {
            $idregistro = $result->idregistro;
            $mostrar = $mostrarInfo[$idregistro] ?? false;
            $data[] = array(
                "0" => $RegistrosModel::validarMenu($result->idmovimiento, $result->tipo_movimiento, $result->idregistro, $result->procesado),
                "1" => $result->fecha_derivacion,
                "2" => $result->ap_nom_us,
                "3" => $mostrar ? '<button type="button" class="btn btn-outline-success" onclick="cargarArchivos(' . $idregistro . ')"><i class="fa fa-file-pdf-o"></i></button>' : '<button type="button" class="btn btn-outline-info" onclick="cargarArchivos(' . $idregistro . ')"><i class="fa fa-upload"></i></button>',
                "4" => '<span class="badge ' . $RegistrosModel::getBadge($result->tipo_movimiento) . '">' . $MovimientosModel::tipoMov($result->tipo_movimiento) . '</span>'
            );
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($rspt),
            "iTotalDisplayRecords" => count($rspt),
            "aaData" => $data
        );
        echo json_encode($results);
        break;
}

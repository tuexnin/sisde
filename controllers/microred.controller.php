<?php

require_once "../models/microred.model.php";

$MicroRedModel = new MicroRedModel();
date_default_timezone_set('America/Lima');

$idmicrored = isset($_POST['txtIdMicroRed']) ? $_POST['txtIdMicroRed'] : "";
$red = isset($_POST['txtRedL']) ? $_POST['txtRedL'] : "";
$idred = isset($_POST['txtIdRed']) ? $_POST['txtIdRed'] : "";
$codigo_microred = isset($_POST['txtMicroRed']) ? $_POST['txtMicroRed'] : "";
$microred = isset($_POST['txtMicroRedL']) ? $_POST['txtMicroRedL'] : "";
$codred = isset($_POST['txtCodigoMicro']) ? $_POST['txtCodigoMicro'] : "";
$cocatenado = isset($_POST['txtcodred']) ? $_POST['txtcodred'] : "";
$cod_cocatenado = isset($_POST['txtCodigo']) ? $_POST['txtCodigo'] : "";



switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($idmicrored)) {
            $rspta = $MicroRedModel::insertar($codred, $cod_cocatenado, $microred, $idred);
            echo $rspta ? "MicroRed Agregada" : "MicroRed no se pudo Agregar";
        } else {
            $rspta = $UsuariosModel::editar($idusuario, $entidad);
            echo $rspta ? "Usuario actualizada" : "Usuario no se pudo actualizar";
        }
        break;

    case 'mostrar':
        $rspta = $MicroRedModel::mostrar($idred);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'getId':
        $rspta = $MicroRedModel::getId($idmicrored);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'getMicroRedMaestro':
        $rspta = $MicroRedModel::mostrarMaestroMicroRed($codigo_microred);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspt = $MicroRedModel::getData();
        $data = array();
        foreach ($rspt as $result) {
            $data[] = array(
                "0" => '<button type="button" class="btn btn-sm btn-circle btn-outline-primary" onclick="ver(' . $result->idmicrored . ')"><i class="fa fa-eye"></i></button>',
                "1" => $result->red,
                "2" => $result->microred
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

    case 'selectMicroRed':
        $rspt = $MicroRedModel::getMicroRedCod($idred);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->idmicrored'>$result->microred</option>";
        }
        break;

    case 'selectMicroRedMaestro':
        $rspt = $MicroRedModel::getMicroRedMaestro($cocatenado);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->Codigo_Cocadenado'>$result->Microred</option>";
        }
        break;

    case 'selectMicroRedCod':
        $rspt = $MicroRedModel::getMicroRedCod($idred);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->codigo_cocatenado'>$result->microred</option>";
        }
        break;

    case 'selectMicroRedUs':
        session_start();
        $rspt = $MicroRedModel::getRedForUser($_SESSION["idusuario"]);
        foreach ($rspt as $val) {
            $rspt = $MicroRedModel::getMicroRedCod($val->idred);
            echo "<option value=''>Seleccione</option>";
            foreach ($rspt as $result) {
                echo "<option value='$result->idmicrored'>$result->microred</option>";
            }
        }
        break;

    case 'selectMicroredUe':
        $rspt = $MicroRedModel::getMicroRedCod($idred);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->idmicrored'>$result->microred</option>";
        }
        break;
}

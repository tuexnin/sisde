<?php

require_once "../models/red.model.php";

$RedModel = new RedModel();
date_default_timezone_set('America/Lima');

$idred = isset($_POST['txtIdRed']) ? $_POST['txtIdRed'] : "";
$red = isset($_POST['txtRed']) ? $_POST['txtRed'] : "";
$codigo_red = isset($_POST['txtCodigored']) ? $_POST['txtCodigored'] : "";



switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($idred)) {
            $rspta = $RedModel::insertar($red, $codigo_red);
            echo $rspta ? "Red Agregada" : "Red no se pudo Agregar";
        } else {
            $rspta = $UsuariosModel::editar($idusuario, $entidad);
            echo $rspta ? "Usuario actualizada" : "Usuario no se pudo actualizar";
        }
        break;

    case 'mostrar':
        $rspta = $RedModel::mostrar($idred);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'getRedMaestro':
        $rspta = $RedModel::mostrarMaestroRed($idred);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'getId':
        $rspta = $RedModel::getId($idred);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspt = $RedModel::getData();
        $data = array();
        foreach ($rspt as $result) {
            $data[] = array(
                "0" => '<button type="button" class="btn btn-sm btn-circle btn-outline-primary" onclick="ver(' . $result->idred . ')"><i class="fa fa-eye"></i></button>',
                "1" => $result->red,
                "2" => $result->codigo_red
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

    case 'selectRed':
        $rspt = $RedModel::getRed();
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->idred'>$result->red</option>";
        }
        break;

    case 'selectRedCod':
        $rspt = $RedModel::getRed();
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->codigo_red'>$result->red</option>";
        }
        break;

    case 'selectRedMaestro':
        $rspt = $RedModel::getRedMaestro();
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->Codigo_Red'>$result->Red</option>";
        }
        break;
}

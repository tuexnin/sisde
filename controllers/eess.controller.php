<?php

require_once "../models/eess.model.php";

$EessModel = new EessModel();
date_default_timezone_set('America/Lima');

$idred = isset($_POST['txtRed']) ? $_POST['txtRed'] : "";
$microred_cocadenado = isset($_POST['txtMicroRed']) ? $_POST['txtMicroRed'] : "";
$id_codigo_unico_est = isset($_POST['txtEstablecimiento']) ? $_POST['txtEstablecimiento'] : "";
$red = isset($_POST['txtRedL']) ? $_POST['txtRedL'] : "";
$idestablecimiento = isset($_POST['txtIdEstablecimiento']) ? $_POST['txtIdEstablecimiento'] : "";
$idmicrored = isset($_POST['txtIdMicrored']) ? $_POST['txtIdMicrored'] : "";
$microred = isset($_POST['txtMicroRedL']) ? $_POST['txtMicroRedL'] : "";
$establecimiento = isset($_POST['txtEstablecimientoL']) ? $_POST['txtEstablecimientoL'] : "";
$codigo_unico = isset($_POST['txtCodigoUnico']) ? $_POST['txtCodigoUnico'] : "";
$sicologo = isset($_POST['txtSico']) ? $_POST['txtSico'] : "";
$numSico = isset($_POST['txtNunSico']) ? $_POST['txtNunSico'] : "";



switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($idestablecimiento)) {
            $numSico = $numSico == "" ? 0 : $numSico;
            $rspta = $EessModel::insertar($codigo_unico, $establecimiento, $idmicrored, $sicologo, $numSico);
            echo $rspta ? "Establecimiento Agregado" : "Establecimiento no se pudo Agregar";
        } else {
            $rspta = $UsuariosModel::editar($idusuario, $entidad, $sicologo, $numSico);
            echo $rspta ? "Usuario actualizada" : "Usuario no se pudo actualizar";
        }
        break;

    case 'mostrar':
        $rspta = $EessModel::mostrar($idestablecimiento);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'getEstablecimientoMaestro':
        $rspta = $EessModel::mostrarMaestroEstablecimiento($id_codigo_unico_est);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspt = $EessModel::getData();
        $data = array();
        foreach ($rspt as $result) {
            $data[] = array(
                "0" => '<button type="button" class="btn btn-sm btn-circle btn-outline-primary" onclick="ver(' . $result->ideess . ')"><i class="fa fa-eye"></i></button>',
                "1" => $result->red,
                "2" => $result->microred,
                "3" => $result->establecimiento
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

    case 'selectEess':
        $rspt = $EessModel::getSelectEess($idmicrored);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->ideess'>$result->establecimiento</option>";
        }
        break;

    case 'selectEess2':
        $rspt = $EessModel::getSelectEess2($idmicrored);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->ideess'>$result->establecimiento</option>";
        }
        break;

    case 'selectEstableMaestro':
        $rspt = $EessModel::getEessMaestro($microred_cocadenado);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->Codigo_Unico'>$result->Nombre_Establecimiento</option>";
        }
        break;
}

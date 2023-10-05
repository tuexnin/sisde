<?php

require_once "../models/entidad.model.php";

$EntidadModel = new EntidadModel();
date_default_timezone_set('America/Lima');

$iddepartamento = isset($_POST['txtDepartamento']) ? $_POST['txtDepartamento'] : "";
$idprovincia = isset($_POST['txtProvincia']) ? $_POST['txtProvincia'] : "";
$iddistrito = isset($_POST['txtDistrito']) ? $_POST['txtDistrito'] : "";
$identidad = isset($_POST['txtIdEntidad']) ? $_POST['txtIdEntidad'] : "";
$entidad = isset($_POST['txtEntidad']) ? $_POST['txtEntidad'] : "";
$ruc = isset($_POST['txtRuc']) ? $_POST['txtRuc'] : "";
$direccion = isset($_POST['txtDireccion']) ? $_POST['txtDireccion'] : "";
$telefono = isset($_POST['txtTelefono']) ? $_POST['txtTelefono'] : "";
$celular = isset($_POST['txtCelular']) ? $_POST['txtCelular'] : "";
$correo = isset($_POST['txtCorreo']) ? $_POST['txtCorreo'] : "";



switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($identidad)) {
            $rspta = $EntidadModel::insertar($entidad, $ruc, $direccion, $telefono, $celular, $correo, $iddistrito);
            echo $rspta ? "Entidad Agregada" : "Entidad no se pudo Agregar";
        } else {
            $rspta = $EntidadModel::editar($identidad, $entidad, $ruc, $direccion, $telefono, $celular, $correo);
            echo $rspta ? "Entidad actualizada" : "Entidad no se pudo actualizar";
        }
        break;

    case 'mostrar':
        $rspta = $EntidadModel::mostrar($identidad);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'getData':
        session_start();
        $rspta = $EntidadModel::getdataEntidad($_SESSION["idusuario"]);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspt = $EntidadModel::getData();
        $data = array();
        foreach ($rspt as $result) {
            $data[] = array(
                "0" => '<button type="button" class="btn btn-sm btn-circle btn-outline-primary" onclick="mostrar(' . $result->identidad . ')"><i class="fa fa-eye"></i></button>',
                "1" => $result->entidad,
                "2" => $result->ruc,
                "3" => $result->direccion,
                "4" => $result->telefono,
                "5" => $result->celular,
                "6" => $result->correo,
                "7" => $result->departamento,
                "8" => $result->provincia,
                "9" => $result->distrito
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

    case 'selectDepartamento':
        $rspt = $EntidadModel::getDepartamentos();
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
        break;

    case 'selectProvincia':
        $rspt = $EntidadModel::getProvincia($iddepartamento);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
        break;

    case 'selectDistrito':
        $rspt = $EntidadModel::getDistrito($idprovincia);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
        break;

    case 'selectEntidad':
        $rspt = $EntidadModel::getEntidad($iddistrito);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->identidad'>$result->entidad</option>";
        }
        break;
}

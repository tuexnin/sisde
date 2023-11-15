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
$anexo = isset($_POST['txtAnexo']) ? $_POST['txtAnexo'] : "";
$celular = isset($_POST['txtCelular']) ? $_POST['txtCelular'] : "";
$correo = isset($_POST['txtCorreo']) ? $_POST['txtCorreo'] : "";
$nombre_responsable = isset($_POST['txtNomRespon']) ? $_POST['txtNomRespon'] : "";
$apellidos_responsable = isset($_POST['txtApeRespon']) ? $_POST['txtApeRespon'] : "";
$unidad = isset($_POST['txtUnidad']) ? $_POST['txtUnidad'] : "";
$ruc_unidad = isset($_POST['txtRucUnidad']) ? $_POST['txtRucUnidad'] : "";
$direccion_unidad = isset($_POST['txtDireccionUnidad']) ? $_POST['txtDireccionUnidad'] : "";
$telefono_unidad = isset($_POST['txtTelefonoUnidad']) ? $_POST['txtTelefonoUnidad'] : "";
$anexo_unidad = isset($_POST['txtAnexoUnidad']) ? $_POST['txtAnexoUnidad'] : "";
$celular_unidad = isset($_POST['txtCelularUnidad']) ? $_POST['txtCelularUnidad'] : "";
$correo_unidad = isset($_POST['txtCorreoUnidad']) ? $_POST['txtCorreoUnidad'] : "";
$ape_resp_unidad = isset($_POST['txtApeRespUnidad']) ? $_POST['txtApeRespUnidad'] : "";
$nom_resp_unidad = isset($_POST['txtNomRespUnidad']) ? $_POST['txtNomRespUnidad'] : "";
$institucion = isset($_POST['txtInstitucion']) ? $_POST['txtInstitucion'] : "";
$ruc_institucion = isset($_POST['txtRucInstitucion']) ? $_POST['txtRucInstitucion'] : "";
$direccion_institucion = isset($_POST['txtDirecInstitucion']) ? $_POST['txtDirecInstitucion'] : "";
$telefono_institucion = isset($_POST['txtTelInstitucion']) ? $_POST['txtTelInstitucion'] : "";
$anexo_institucion = isset($_POST['txtAnexInstitucion']) ? $_POST['txtAnexInstitucion'] : "";
$celular_institucion = isset($_POST['txtCelInstitucion']) ? $_POST['txtCelInstitucion'] : "";
$correo_institucion = isset($_POST['txtCorreoInstitucion']) ? $_POST['txtCorreoInstitucion'] : "";



switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($identidad)) {
            $rspta = $EntidadModel::insertar($entidad, $ruc, $direccion, $telefono, $anexo, $celular, $correo, $iddistrito, $nombre_responsable, $apellidos_responsable, $unidad, $ruc_unidad, $direccion_unidad, $telefono_unidad, $anexo_unidad, $celular_unidad, $correo_unidad, $ape_resp_unidad, $nom_resp_unidad, $institucion, $ruc_institucion, $direccion_institucion, $telefono_institucion, $anexo_institucion, $celular_institucion, $correo_institucion);
            echo $rspta ? "Entidad Agregada" : "Entidad no se pudo Agregar";
        } else {
            $rspta = $EntidadModel::editar($identidad, $entidad, $ruc, $direccion, $telefono, $anexo, $celular, $correo, $iddistrito, $nombre_responsable, $apellidos_responsable, $unidad, $ruc_unidad, $direccion_unidad, $telefono_unidad, $anexo_unidad, $celular_unidad, $correo_unidad, $ape_resp_unidad, $nom_resp_unidad, $institucion, $ruc_institucion, $direccion_institucion, $telefono_institucion, $anexo_institucion, $celular_institucion, $correo_institucion);
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
            echo "<option value='$result->identidad'>$result->institucion</option>";
        }
        break;
}

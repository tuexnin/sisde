<?php

require_once "../models/registros.model.php";
require_once "../models/movimientos.model.php";

$RegistrosModel = new RegistrosModel();
$MovimientosModel = new MovimientosModel();

$idmovimiento = isset($_POST['idmovimiento']) ? $_POST['idmovimiento'] : "";
$ideess = isset($_POST['ideess']) ? $_POST['ideess'] : "";


switch ($_GET["op"]) {
    case 'listo':
        $rspta = $MovimientosModel::getDataId($idmovimiento);
        foreach ($rspta as $val) {
            if ($val->directo == 1) {
                $rspt = $MovimientosModel::insertar($val->id_registra, null, $val->idregistro, 3, 0, $val->idmovimiento, $val->eessdirect, null);
                if ($rspt != false) {
                    $rspt = $MovimientosModel::editarProcesado($idmovimiento, 1);
                    echo $rspt ? "Se derivo el documento" : "No se pudo derivar el documento";
                }
            } else {
                $rspt = $MovimientosModel::insertar($val->id_registra, $val->ue_derivar, $val->idregistro, 2, 0, $val->idmovimiento, null, null);
                if ($rspt != false) {
                    $rspt = $MovimientosModel::editarProcesado($idmovimiento, 1);
                    echo $rspt ? "Se derivo el documento" : "No se pudo derivar el documento";
                }
            }
        }
        break;

    case 'mostrar':
        $rspta = $RegistrosModel::mostrar($idregistro);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'derivar':
        $rspta = $MovimientosModel::getDataId($idmovimiento);
        foreach ($rspta as $val) {
            $rspt = $MovimientosModel::insertar(null, null, $val->idregistro, 3, 0, $val->idmovimiento, $ideess, $val->ue_derivar);
            if ($rspt != false) {
                $rspt = $MovimientosModel::editarProcesado($idmovimiento, 1);
                echo $rspt ? "Se derivo el documento" : "No se pudo derivar el documento";
            }
        }
        break;

    case 'atendido':
        $rspta = $MovimientosModel::getDataId($idmovimiento);
        foreach ($rspta as $val) {
            $rspt = $MovimientosModel::insertar(null, null, $val->idregistro, 4, 0, $val->idmovimiento, $val->ideess, null);
            if ($rspt != false) {
                $rspt = $MovimientosModel::editarProcesado($idmovimiento, 1);
                echo $rspt ? "Se finalizo el proceso de atencion" : "No se pudo se pudo completar el proceso de atencion";
            }
        }
        break;
}

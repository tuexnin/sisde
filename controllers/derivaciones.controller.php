<?php

require_once "../models/movimientos.model.php";
require_once "../models/derivaciones.model.php";

$MovimientosModel = new MovimientosModel();
$DerivacionesModel = new DerivacionesModel();

switch ($_GET["op"]) {

    case 'mostrar':
        $rspta = $RegistrosModel::mostrar($idregistro);
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
        if ($_SESSION["tipo"] == 0) {
            $rspt = $DerivacionesModel::getData(0);
            $data = array();
            foreach ($rspt as $result) {
                $data[] = array(
                    "0" => $DerivacionesModel::validarMenu($result->idmovimiento, $result->tipo_movimiento, $result->idregistro,1),
                    "1" => $result->entidad,
                    "2" => $result->fecha_derivacion,
                    "3" => $result->ap_nom_us,
                    "4" => '<span class="badge ' . $DerivacionesModel::getBadge($result->tipo_movimiento) . '">' . $MovimientosModel::tipoMov($result->tipo_movimiento) . '</span>'
                );
            }
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($rspt),
                "iTotalDisplayRecords" => count($rspt),
                "aaData" => $data
            );
        } else {
            $rspt = $DerivacionesModel::getRedus($_SESSION["idusuario"]);
            foreach ($rspt as $val) {
                $rspt = $DerivacionesModel::getData($val->idred);
                $data = array();
                foreach ($rspt as $result) {
                    $data[] = array(
                        "0" => $DerivacionesModel::validarMenu($result->idmovimiento, $result->tipo_movimiento, $result->idregistro, $result->procesado),
                        "1" => $result->entidad,
                        "2" => $result->fecha_derivacion,
                        "3" => $result->ap_nom_us,
                        "4" => '<span class="badge ' . $DerivacionesModel::getBadge($result->tipo_movimiento) . '">' . $MovimientosModel::tipoMov($result->tipo_movimiento) . '</span>'
                    );
                }
                $results = array(
                    "sEcho" => 1,
                    "iTotalRecords" => count($rspt),
                    "iTotalDisplayRecords" => count($rspt),
                    "aaData" => $data
                );
            }
        }

        echo json_encode($results);
        break;
}

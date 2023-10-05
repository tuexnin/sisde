<?php

require_once "../models/ver.model.php";

$VerModel = new VerModel();
date_default_timezone_set('America/Lima');

$idmovimiento = isset($_POST['idmovimiento']) ? $_POST['idmovimiento'] : "";
$uederivar = isset($_POST['ue']) ? $_POST['ue'] : "";


switch ($_GET["op"]) {

    case 'ver':
        $rspta = $VerModel::ver($idmovimiento);
        echo json_encode($rspta);
        break;

    case 'verDoc':
        $rspta = $VerModel::verDocs($idmovimiento);
        echo json_encode($rspta);
        break;

    case 'uederiv':
        $rspta = $VerModel::ue($uederivar);
        echo json_encode($rspta);
        break;

    case 'verMovimientos':
        $rspta = $VerModel::regID($idmovimiento);
        foreach ($rspta as $val){
            $rspta = $VerModel::verMovimientos($val->idregistro);
            echo json_encode($rspta);
        }
        
        break;
    
}

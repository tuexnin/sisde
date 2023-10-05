<?php

require_once "../models/dash.model.php";

$DashModel = new DashModel();

switch ($_GET["op"]) {

    case 't_registros':
        $rspta = $DashModel::t_registros();
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 't_derivaciones':
        $rspta = $DashModel::t_derivaciones();
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 't_atenciones':
        $rspta = $DashModel::t_atenciones();
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 't_listos':
        $rspta = $DashModel::t_listos();
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 't_usuarios':
        $rspta = $DashModel::t_usuarios();
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
    
}

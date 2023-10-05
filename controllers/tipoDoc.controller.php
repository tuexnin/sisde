<?php

require_once "../models/tipoDoc.model.php";

$TipoDocModel = new TipoDocModel();

$idtipodoc = isset($_POST['idtipodoc']) ? $_POST['idtipodoc'] : "";
$nombre = isset($_POST['nombreTD']) ? $_POST['nombreTD'] : "";
$fecha_reg = date('Y-m-d');

switch ($_GET['op']) {

    case 'selectTipoDoc':
        $rspt = $TipoDocModel::getTipos();
        echo "<option value='0'>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->idtipo_documento'>$result->nombre</option>";
        }
        break;

    case 'selectTipoDocAt':
        $rspt = $TipoDocModel::getTipoAt();
        echo "<option value='0'>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->idtipo_documento'>$result->nombre</option>";
        }
        break;
}

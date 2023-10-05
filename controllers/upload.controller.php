<?php

require_once "../models/upload.model.php";
require_once "../models/movimientos.model.php";

/**
 * funcion para mostrar json en pantalla
 * 
 * @param integer $status
 * @param string $msg
 * @param array $data
 * @return void
 */

function json_output($status = 200, $msg = 'OK', $data = null){
    //header('Content-Type: application/json');
    echo json_encode([
        'status' => $status,
        'msg' => $msg,
        'data' => $data
    ]);
    die;
}

$UploadModel = new UploadModel();

$folder_name = "../upload/";
$idregistro = isset($_POST['idregistro']) ? $_POST['idregistro'] : "";
$iddocumento = isset($_POST['iddocumento']) ? $_POST['iddocumento'] : "";
$nombre = isset($_POST['txtNombreOtro']) ? $_POST['txtNombreOtro'] : "";
$idtipodoc = isset($_POST['txtTipoDocumento']) ? $_POST['txtTipoDocumento'] : "";
$nunDoc = isset($_POST['txtNumDoc']) ? $_POST['txtNumDoc'] : "";
$fecha_reg = date('Y-m-d');
$idmovimiento = isset($_POST['idmovimiento']) ? $_POST['idmovimiento'] : "";

switch($_GET['op']){
    case 'guardarArchivo': 
        if(!isset($_FILES['file'])){
            json_output(403, 'Archivo no valido');
        }

        if ($_FILES['file']['type'] != "application/pdf"){
            json_output(403, 'Archivo no es un .pdf');
        }
        
        $file = $_FILES['file'];
        $ext = explode(".", $_FILES["file"]["name"]);
        $nombreArchivo = $_FILES["file"]["name"];
        $archivo = date("mdY") . round(microtime(true)) . '.' . end($ext);

        if(!is_dir($folder_name)){
            mkdir($folder_name);
        }
        
        $uploaded = move_uploaded_file($file['tmp_name'], $folder_name.$archivo);
        
        if(!$uploaded){
            json_output(400, 'Hubo un error al subir el archivo.');
        }
        
        $rspta = $UploadModel::insertar($idtipodoc, $nombre, $idregistro, $archivo, $nunDoc);

        if ($rspta){
            json_output(200, 'Archivo subido con exito.', $idregistro);
        }

        json_output(600, 'Archivo se subio con exito pero no se registro en la DB, comunicate con tic.', $idregistro);
        
        break;
    
    case 'traerArchivos':
        $UploadModel = new UploadModel();
        $rspt = $UploadModel::mostrar($idregistro);
        if($rspt != false){
            echo json_encode($rspt);
        }
        echo false;
        break;

    case 'traerArchivosAt':
        $UploadModel = new UploadModel();
        $rspt = $UploadModel::valExistDocAt($idregistro);
        if($rspt != false){
            echo json_encode($rspt);
        }
        echo false;
        break;
    
    case 'validarUpload':
        $MovimientoModel = new MovimientosModel();
        $rspta = $MovimientoModel::getDatosMovimiento($idmovimiento);
        foreach ($rspta as $val){
            $rspta = $UploadModel::mostrar($val->idregistro);
            if($rspta == false){
                echo true;
            }
            echo false;
        }
        break;

    case 'validarUploadAt':
        $MovimientoModel = new MovimientosModel();
        $rspta = $MovimientoModel::getDatosMovimiento($idmovimiento);
        foreach ($rspta as $val){
            $rspta = $UploadModel::valExistDocAt($val->idregistro);
            if($rspta == false){
                echo true;
            }
            echo false;
        }
        break;
}

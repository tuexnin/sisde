<?php

require_once "../models/usuarios.model.php";

$UsuariosModel = new UsuariosModel();
date_default_timezone_set('America/Lima');

$idusuario = isset($_POST['txtIdusuario']) ? $_POST['txtIdusuario'] : "";
$contraseña = isset($_POST['txtContraseña']) ? $_POST['txtContraseña'] : "";
$dni = isset($_POST['txtDni']) ? $_POST['txtDni'] : "";
$nombres = isset($_POST['txtNombres']) ? $_POST['txtNombres'] : "";
$apellidos = isset($_POST['txtApellidos']) ? $_POST['txtApellidos'] : "";
$clave = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : "";
$tipo = isset($_POST['txtTipo']) ? $_POST['txtTipo'] : "";
$rol = isset($_POST['txtRol']) ? $_POST['txtRol'] : "";
$ideess = isset($_POST['txtideess']) ? $_POST['txtideess'] : "";
$idred = isset($_POST['txtidred1']) ? $_POST['txtidred1'] : "";
$identidad = isset($_POST['txtidentidad']) ? $_POST['txtidentidad'] : "";
$imagen = isset($_POST['txtImagen']) ? $_POST['txtImagen'] : "";


switch ($_GET["op"]) {
    case 'guardaryeditar':
        session_start();
        if($_SESSION["tipo"] == '3' ) {
            $rspta = $UsuariosModel::mostrar($_SESSION['idusuario']);
            foreach ($rspta as $result) {
                if($result->identidad != $identidad){
                    echo "No tienes permisos para agregar un usuario en otra entidad";
                }else{
                    if (!file_exists($_FILES['txtImagen']['tmp_name']) || !is_uploaded_file($_FILES['txtImagen']['tmp_name'])) {
                        $imagen = $_POST["imagenactual"];
                    } else {
                        $ext = explode(".", $_FILES["txtImagen"]["name"]);
                        if ($_FILES['txtImagen']['type'] == "image/jpg" || $_FILES['txtImagen']['type'] == "image/jpeg" || $_FILES['txtImagen']['type'] == "image/png") {
                            $imagen = round(microtime(true)) . '.' . end($ext);
                            move_uploaded_file($_FILES["txtImagen"]["tmp_name"], "../files/fotos/" . $imagen);
                            if (!empty($_POST["imagenactual"])) {
                                unlink('../files/fotos/' . $_POST["imagenactual"]);
                            }
                        }
                    }
                    $password = hash('md5', $clave);
                    if (empty($idusuario)) {
                        $rspta = $UsuariosModel::insertar($dni, $nombres, $apellidos, $password, $rol, $imagen, $tipo, empty($ideess) ? null : $ideess, empty($identidad) ? null : $identidad, empty($idred) ? null : $idred);
                        echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
                    } else {
                        if (!empty($clave)) {
                            $rspta = $UsuariosModel::editar($idusuario, $dni, $nombres, $apellidos, $password, $rol, $imagen);
                        } else {
                            $rspta = $UsuariosModel::editar($idusuario, $dni, $nombres, $apellidos, $contraseña, $rol, $imagen);
                        }
                        echo $rspta ? "Usuario actualizada" : "Usuario no se pudo actualizar";
                    }
                }
            }
        }else if ($_SESSION["tipo"] == '2'){
            $rspta = $UsuariosModel::mostrar($_SESSION['idusuario']);
            foreach ($rspta as $result) {
                if($result->ideess != $ideess){
                    echo "No tienes permisos para agregar un usuario en otro establecimiento";
                }else{
                    if (!file_exists($_FILES['txtImagen']['tmp_name']) || !is_uploaded_file($_FILES['txtImagen']['tmp_name'])) {
                        $imagen = $_POST["imagenactual"];
                    } else {
                        $ext = explode(".", $_FILES["txtImagen"]["name"]);
                        if ($_FILES['txtImagen']['type'] == "image/jpg" || $_FILES['txtImagen']['type'] == "image/jpeg" || $_FILES['txtImagen']['type'] == "image/png") {
                            $imagen = round(microtime(true)) . '.' . end($ext);
                            move_uploaded_file($_FILES["txtImagen"]["tmp_name"], "../files/fotos/" . $imagen);
                            if (!empty($_POST["imagenactual"])) {
                                unlink('../files/fotos/' . $_POST["imagenactual"]);
                            }
                        }
                    }
                    $password = hash('md5', $clave);
                    if (empty($idusuario)) {
                        $rspta = $UsuariosModel::insertar($dni, $nombres, $apellidos, $password, $rol, $imagen, $tipo, empty($ideess) ? null : $ideess, empty($identidad) ? null : $identidad, empty($idred) ? null : $idred);
                        echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
                    } else {
                        if (!empty($clave)) {
                            $rspta = $UsuariosModel::editar($idusuario, $dni, $nombres, $apellidos, $password, $rol, $imagen);
                        } else {
                            $rspta = $UsuariosModel::editar($idusuario, $dni, $nombres, $apellidos, $contraseña, $rol, $imagen);
                        }
                        echo $rspta ? "Usuario actualizada" : "Usuario no se pudo actualizar";
                    }
                }
            }
        }else if ($_SESSION["tipo"] == '1'){
            $rspta = $UsuariosModel::mostrar($_SESSION['idusuario']);
            foreach ($rspta as $result) {
                if(!empty($idred) && $result->idred != $idred){
                    echo "No tienes permisos para agregar un usuario en otra red";
                }else{
                    if (!file_exists($_FILES['txtImagen']['tmp_name']) || !is_uploaded_file($_FILES['txtImagen']['tmp_name'])) {
                        $imagen = $_POST["imagenactual"];
                    } else {
                        $ext = explode(".", $_FILES["txtImagen"]["name"]);
                        if ($_FILES['txtImagen']['type'] == "image/jpg" || $_FILES['txtImagen']['type'] == "image/jpeg" || $_FILES['txtImagen']['type'] == "image/png") {
                            $imagen = round(microtime(true)) . '.' . end($ext);
                            move_uploaded_file($_FILES["txtImagen"]["tmp_name"], "../files/fotos/" . $imagen);
                            if (!empty($_POST["imagenactual"])) {
                                unlink('../files/fotos/' . $_POST["imagenactual"]);
                            }
                        }
                    }
                    $password = hash('md5', $clave);
                    if (empty($idusuario)) {
                        $rspta = $UsuariosModel::insertar($dni, $nombres, $apellidos, $password, $rol, $imagen, $tipo, empty($ideess) ? null : $ideess, empty($identidad) ? null : $identidad, empty($idred) ? null : $idred);
                        echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
                    } else {
                        if (!empty($clave)) {
                            $rspta = $UsuariosModel::editar($idusuario, $dni, $nombres, $apellidos, $password, $rol, $imagen);
                        } else {
                            $rspta = $UsuariosModel::editar($idusuario, $dni, $nombres, $apellidos, $contraseña, $rol, $imagen);
                        }
                        echo $rspta ? "Usuario actualizada" : "Usuario no se pudo actualizar";
                    }
                }
            }
        }else {
            if (!file_exists($_FILES['txtImagen']['tmp_name']) || !is_uploaded_file($_FILES['txtImagen']['tmp_name'])) {
                $imagen = $_POST["imagenactual"];
            } else {
                $ext = explode(".", $_FILES["txtImagen"]["name"]);
                if ($_FILES['txtImagen']['type'] == "image/jpg" || $_FILES['txtImagen']['type'] == "image/jpeg" || $_FILES['txtImagen']['type'] == "image/png") {
                    $imagen = round(microtime(true)) . '.' . end($ext);
                    move_uploaded_file($_FILES["txtImagen"]["tmp_name"], "../files/fotos/" . $imagen);
                    if (!empty($_POST["imagenactual"])) {
                        unlink('../files/fotos/' . $_POST["imagenactual"]);
                    }
                }
            }
            $password = hash('md5', $clave);
            if (empty($idusuario)) {
                $rspta = $UsuariosModel::insertar($dni, $nombres, $apellidos, $password, $rol, $imagen, $tipo, empty($ideess) ? null : $ideess, empty($identidad) ? null : $identidad, empty($idred) ? null : $idred);
                echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
            } else {
                if (!empty($clave)) {
                    $rspta = $UsuariosModel::editar($idusuario, $dni, $nombres, $apellidos, $password, $rol, $imagen);
                } else {
                    $rspta = $UsuariosModel::editar($idusuario, $dni, $nombres, $apellidos, $contraseña, $rol, $imagen);
                }
                echo $rspta ? "Usuario actualizada" : "Usuario no se pudo actualizar";
            }
        }
        
        break;

    case 'mostrar':
        $rspta = $UsuariosModel::mostrar($idusuario);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listar':
        session_start();
        $rspt = $UsuariosModel::getData($_SESSION["tipo"]);
        $data = array();
        foreach ($rspt as $result) {
            $data[] = array(
                "0" => '<button type="button" class="btn btn-sm btn-circle btn-outline-warning" onclick="mostrar(' . $result->idusuario . ')"><i class="fa fa-gears"></i></button>',
                "1" => $result->nombres,
                "2" => $result->apellidos,
                "3" => $result->dni,
                "4" => empty($result->foto) ? "<img src='pages/assets/img/avatars/avatar15.jpg' height='50px' width='50px' >" : "<img src='files/fotos/" . $result->foto . "' height='50px' width='50px' >",
                "5" => $UsuariosModel::tipo($result->tipo),
                "6" => $UsuariosModel::tipoDesc($result->tipo, $result->red, $result->establecimiento, $result->entidad),
                "7" => $UsuariosModel::rol($result->rol)
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
        $rspt = $UsuariosModel::getDepartamentos();
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
        break;

    case 'selectProvincia':
        $rspt = $UsuariosModel::getProvincias($_POST["iddepartamento"]);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
        break;

    case 'selectDistrito':
        $rspt = $UsuariosModel::getDistritos($_POST["idprovincia"]);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
        break;

    case 'selectCcpp':
        $rspt = $UsuariosModel::getCcpp($_POST["iddistrito"]);
        echo "<option value=''>Seleccione</option>";
        foreach ($rspt as $result) {
            echo "<option value='$result->Ubigeo_Centropoblado'>$result->Nombre_Centro_Poblado</option>";
        }
        break;

    case 'uederiv':
        $rspt = $UsuariosModel::getUE($_POST["iddistrito"]);
        echo json_encode($rspt);
        break;

    case 'selectRol':
        session_start();
        if ($_SESSION["tipo"] == "0") {
            echo "<option value=''>SELECCIONE</option>";
            echo "<option value='1'>ROOT</option>";
            echo "<option value='2'>ADMINISTRADOR</option>";
            echo "<option value='3'>COLABORADOR</option>";
        } else {
            echo "<option value=''>SELECCIONE</option>";
            echo "<option value='2'>ADMINISTRADOR</option>";
            echo "<option value='3'>COLABORADOR</option>";
        }

        break;

    case 'selectTipo':
        session_start();
        if ($_SESSION["tipo"] == "0") {
            echo "<option value='super'>SUPER USUARIO</option>";
            echo "<option value='1'>RED</option>";
            echo "<option value='2'>ESTABLECIMIENTO</option>";
            echo "<option value='3'>ENTIDAD</option>";
        } else if($_SESSION["tipo"] == "1") {
            echo "<option value='0'>SELECCIONE</option>";
            echo "<option value='1'>RED</option>";
            echo "<option value='2'>ESTABLECIMIENTO</option>";
        }else if($_SESSION["tipo"] == "2"){
            echo "<option value='0'>SELECCIONE</option>";
            echo "<option value='2'>ESTABLECIMIENTO</option>";
        }else if($_SESSION["tipo"] == "3"){
            echo "<option value='0'>SELECCIONE</option>";
            echo "<option value='3'>ENTIDAD</option>";
        }

        break;
}

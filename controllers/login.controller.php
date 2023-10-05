<?php

require_once "../models/login.model.php";

$LoginModel = new LoginModel();


switch ($_GET["op"]) {
    case 'validar':
            $rspta = $LoginModel::getUser($_POST['login-username']);
            $datos = array();
            $temporal = 0;
            if (!empty($rspta)){
                foreach ($rspta as $result) {
                    if ($result->tipo == 1){
                        $temporal = $result->idred;
                    }else if ($result->tipo == 2){
                        $temporal = $result->ideess;
                    }else if ($result->tipo == 3){
                        $temporal = $result->identidad;
                    }
                    
                    if(hash('md5', $_POST['login-password']) == $result->password){
                        $datos[] = array(
                            "0" => $result->idusuario,
                            "1" => $result->nombres . " " . $result->apellidos,
                            "2" => $result->dni,
                            "3" => $result->foto,
                            "4" => $result->rol,
                            "5" => $result->tipo,
                            "6" => $temporal
                        );
                    }else{
                        $datos[] = array(
                            "0" => 'no password',
                            "1" => $result->nombres . " " . $result->apellidos
                        );
                    }
                }
                echo json_encode($datos);
            }else{
                echo '0';
            }
        break;
    
    case 'iniciar':
        session_start();
        $_SESSION['idusuario'] = $_POST['idusuario'];
        $_SESSION['nombres'] = $_POST['nombres'];
        $_SESSION['dni'] = $_POST['dni'];
        $_SESSION['foto'] = $_POST['foto'];
        $_SESSION['rol'] = $_POST['rol'];
        $_SESSION['tipo'] = $_POST['tipo'];
        $_SESSION['ididenti'] = $_POST['ididenti'];
        break;

    case 'cerrar':
        session_start();
        session_destroy();
        echo 'se cerro';
        break;
}
<?php

require_once "connection.php";

class DerivacionesModel{
    

    static public function getData ($idred){
        $sql = "SELECT * FROM movimientos m 
        INNER JOIN registros r ON m.idregistro = r.idregistro
        INNER JOIN entidad e ON r.identidad = e.identidad
        WHERE m.id_destino = CASE WHEN $idred = 0 THEN m.id_destino ELSE $idred END AND m.procesado = 0 ORDER BY m.idmovimiento DESC";
        return Connection::executeQuery($sql);
    }

    static public function getDataEess ($ideess){
        $sql = "SELECT * FROM movimientos m 
        INNER JOIN registros r ON m.idregistro = r.idregistro 
        INNER JOIN entidad e ON r.identidad = e.identidad 
        WHERE m.ideess = CASE WHEN $ideess = 0 THEN m.ideess ELSE $ideess END AND m.procesado = 0 ORDER BY m.idmovimiento DESC";
        return Connection::executeQuery($sql);
    }

    static public function getRedus ($idusuario){
        $sql = "SELECT u.idred FROM usuario u 
        INNER JOIN red_us ru ON u.idred = ru.idred
        WHERE u.idusuario = '$idusuario'";
        return Connection::executeQuery($sql);
    }

    static public function getEessUs ($idusuario){
        $sql = "SELECT u.ideess FROM usuario u INNER JOIN eess_us eu ON u.ideess = eu.ideess WHERE u.idusuario = '$idusuario'";
        return Connection::executeQuery($sql);
    }

    static public function mostrar($idregistro){
        $sql = "SELECT * FROM registros WHERE idregistro = '$idregistro'";
        return Connection::executeQuery($sql);
    }


    static public function validarMenu($idmovimiento, $idtipomovimiento, $idregistro, $estado){
        if($idtipomovimiento == 2 && $estado == 0){
            return '
            <div class="btn-group">
            <button type="button" class="btn btn-outline-primary mr-1" onclick="ver(' . $idmovimiento . ')"><i class="fa fa-eye"></i></button>
                <div class="dropdown">
                    <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" onclick="derivarOpen(' . $idmovimiento . ')"><i class="fa fa-share-square-o"></i> Derivar  </a>
                    </div>
                    </div>
                    </div>';
        }else if(($idtipomovimiento != 3 || $idtipomovimiento != 4) && $estado == 0){
            return '
            <div class="btn-group">
            <button type="button" class="btn btn-outline-primary mr-1" onclick="ver(' . $idmovimiento . ')"><i class="fa fa-eye"></i></button>
            </div>';
        }
    }

    static public function validarMenuEess($idmovimiento, $idtipomovimiento, $idregistro, $estado){
        if($idtipomovimiento == 3 && $estado == 0){
            return '
            <div class="btn-group">
            <button type="button" class="btn btn-outline-primary mr-1" onclick="ver(' . $idmovimiento . ')"><i class="fa fa-eye"></i></button>
                <div class="dropdown">
                    <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" onclick="atendido(' . $idmovimiento . ')"><i class="fa fa-check-circle"></i> Atendido  </a>
                    </div>
                    </div>
                    </div>';
        }else if(($idtipomovimiento != 2 || $idtipomovimiento != 4) && $estado == 0){
            return '
            <div class="btn-group">
            <button type="button" class="btn btn-outline-primary mr-1" onclick="ver(' . $idmovimiento . ')"><i class="fa fa-eye"></i></button>
            </div>';
        }
    }

    static public function getBadge($idtipomov){
        $data = array(
            "1" => "badge-primary",
            "2" => "badge-warning",
            "3" => "badge-danger",
            "4" => "badge-success"
        );
        return $data[$idtipomov];
    }

}
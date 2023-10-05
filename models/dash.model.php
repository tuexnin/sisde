<?php

require_once "connection.php";

class DashModel{

    static public function t_registros(){
        $sql = "SELECT COUNT(*) as cantidad FROM registros r";
        return Connection::executeQuery($sql);
    }

    static public function t_derivaciones(){
        $sql = "SELECT COUNT(*) as cantidad  FROM movimientos m WHERE m.tipo_movimiento = 3";
        return Connection::executeQuery($sql);
    }

    static public function t_atenciones(){
        $sql = "SELECT COUNT(*) as cantidad  FROM movimientos m WHERE m.tipo_movimiento = 4";
        return Connection::executeQuery($sql);
    }


    static public function t_listos(){
        $sql = "SELECT COUNT(*) as cantidad  FROM movimientos m WHERE m.tipo_movimiento = 2";
        return Connection::executeQuery($sql);
    }

    static public function t_usuarios(){
        $sql = "SELECT COUNT(*) as cantidad  FROM usuario";
        return Connection::executeQuery($sql);
    }


}
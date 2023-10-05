<?php

require_once "connection.php";

class LoginModel{

    static public function getUser($usuario){
        $sql = "SELECT * FROM usuario WHERE dni = '$usuario'";
        return Connection::executeQuery($sql);
    }

}
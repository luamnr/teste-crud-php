<?php

include __DIR__ . "/../model/usuario.php"; 

class Controler {


    private static function loginIsValid(){
        $login = $_POST["user"];
        $pass = $_POST["pass"];
        if(Usuario::validate($login, $pass)){
            return TRUE;
        }
        return False;
    }


    private static function isAuthenticated(){
        if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {

            return FALSE;
        }
        return TRUE;
    }

    
    public static function authenticate($login, $pass){

        if (self::loginIsValid($login, $pass)){
            $_SESSION["authenticated"] = TRUE;
        }
    }


    public static function loginView(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST["user"];
            $pass = $_POST["pass"];
            self::authenticate($login, $pass);
       }
        include __DIR__. "/../views/index.php";
    }


    public static function listUsersView(){
        if (self::isAuthenticated()){
            $todosUsuarios = Usuario::getAll();
            include __DIR__. "/../views/pesquisa_usuarios.php";
        }

    }
}
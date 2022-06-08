<?php

require_once "db.php";

class Usuario {
    
    // private static $usuario_id;

    // private static $login;

    // private static $senha;

    // private static $ativo;

    // private static $nome;

    public function __construct(){
        
    }


    public static function validate($nome, $senha){
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("SELECT * from usuarios WHERE (LOGIN=? AND SENHA=?) limit 1;");
        $declaracao->execute([$nome, $senha]);
        $retorno = $declaracao->fetch(PDO::FETCH_ASSOC);

        if ($retorno){
            return TRUE;
        }
        
        return FALSE;
    }

    public static function getAll(){

    }

    public static function getById($id){

    }

    public static function editById($id){

    }

    public static function deleteById($id){
        
    }
}
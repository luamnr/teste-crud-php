<?php

require_once "db.php";

class Autorizacao {

    /** 
    * Função para retornar autorizações de um usuário
    * @param String $id 
    * @return Array|FALSE
    */
    public static function getByUserId($id){
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("SELECT * FROM autorizacoes WHERE USUARIO_ID = ? ;");
        $declaracao->execute([$id]);
        $retorno = $declaracao->fetchAll(PDO::FETCH_ASSOC);

        if ($retorno){
            return $retorno;
        }

        return FALSE;
    }

    /** 
    * Função para criar as autorizações de usuário
    * @param String $id
    * @param Array $authorization 
    * @return Void	
    */
    public static function create($id, $authorization){

        $con = Conexao::getInstance();
        $declaracao = $con->prepare("INSERT INTO autorizacoes VALUES (?, ?);");
        $con->beginTransaction();
        foreach ($authorization as $auth){
            
            $declaracao->execute([$id, $auth]);
        }
        $con->commit();

    }

}
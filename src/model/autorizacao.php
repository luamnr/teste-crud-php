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
        $declaracao = $con->prepare("SELECT CHAVE_AUTORIZACAO FROM autorizacoes WHERE USUARIO_ID = ? ;");
        $declaracao->execute([$id]);
        $retorno = $declaracao->fetchAll(PDO::FETCH_ASSOC);

        
        $arr = [];
        foreach ($retorno as $key => $val) {
            array_push($arr, $val["CHAVE_AUTORIZACAO"]);
        }

        if ($arr){
            return $arr;
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

    public static function deleteById($id){
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("DELETE FROM autorizacoes WHERE USUARIO_ID = ? ;");
        $declaracao->execute([$id]);
    }

}
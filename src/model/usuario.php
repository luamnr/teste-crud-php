<?php

require_once "db.php";

class Usuario {
    
    /**
    * Validar usuário
    * @param String $user 
    * @param String $pass
    * @return Boolean	
    */
    public static function validate($user, $pass){
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("SELECT * FROM usuarios WHERE (LOGIN=? AND SENHA=?) limit 1;");
        $declaracao->execute([$user, $pass]);
        $retorno = $declaracao->fetch(PDO::FETCH_ASSOC);

        if ($retorno){
            return TRUE;
        }
        
        return FALSE;
    }

    /**
    * Retornar todos os usuários do banco
    * @return Array|FALSE	
    */
    public static function getAll(){
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("SELECT * FROM usuarios;");
        $declaracao->execute();
        $retorno = $declaracao->fetchAll(PDO::FETCH_ASSOC);

        if ($retorno){
            return $retorno;
        }

        return FALSE;
    }

    /**
    * Função para retornar um usuário pelo seu id
    * @param String $id 
    * @return Array|FALSE
    */
    public static function getById($id){
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("SELECT * FROM usuarios WHERE USUARIO_ID = ? ;");
        $declaracao->execute([$id]);
        $retorno = $declaracao->fetch(PDO::FETCH_ASSOC);

        if ($retorno){
            return $retorno;
        }

        return FALSE;
    }

    /**
    * Função para retornar um usuário pelo seu id
    * @param String $user 
    * @return Array|FALSE
    */
    public static function getByUser($user){
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("SELECT * FROM usuarios WHERE LOGIN = ? ;");
        $declaracao->execute([$user]);
        $retorno = $declaracao->fetch(PDO::FETCH_ASSOC);

        if ($retorno){
            return $retorno;
        }

        return FALSE;
    }

    /**
    * Função para criar um usuário
    * @param String $nome Nome completo
    * @param String $user login
    * @param String $pass senha
    * @param String $status ("S","N") ativo ou não
    * @return String	
    */
    public static function create($nome, $user, $pass, $status){
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("INSERT INTO usuarios (login, senha, ativo, nome_completo) VALUES (?, ?, ?, ?);");
        $declaracao->execute([$user, $pass, $status, $nome]);
        $id = $con->lastInsertId();
        return $id;
    }

    /**
    * Função para editar um usuário pelo seu id
    * @param String $id
    * @param String $nome Nome completo
    * @param String $user login
    * @param String $pass senha
    * @param String $status (S,N) ativo ou não
    * @return Void	
    */
    public static function editById($id, $nome, $user, $pass, $status){
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("UPDATE usuarios SET NOME_COMPLETO=?, LOGIN=?, SENHA=?, ATIVO=? WHERE USUARIO_ID=?;");
        $declaracao->execute([$nome, $user, $pass, $status, $id]);
    }

    /**
    * Função para deletar um usuário pelo seu id
    * @param Array $id
    * @return Void	
    */
    public static function deleteById($id){
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("DELETE FROM usuarios WHERE USUARIO_ID = ? ;");
        $declaracao->execute([$id]);
    }

    /**
    * Função para deletar um usuário pelo seu id
    * @param String $nome
    * @return Array	
    */
    public static function getLike($nome){
        $searchString = $nome . "%";
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("SELECT * FROM usuarios WHERE LOGIN LIKE ? or NOME_COMPLETO LIKE ? ;");
        $declaracao->execute([$searchString, $searchString]);
        $retorno = $declaracao->fetchAll(PDO::FETCH_ASSOC);

        if ($retorno){
            return $retorno;
        }

        return FALSE;
    }

    public static function getAtivo($login){
        $con = Conexao::getInstance();
        $declaracao = $con->prepare("SELECT ATIVO FROM usuarios WHERE LOGIN = ? ;");
        $declaracao->execute([$login]);
        $retorno = $declaracao->fetch(PDO::FETCH_ASSOC);

        if ($retorno){
            return $retorno;
        }

        return FALSE;
    }

}
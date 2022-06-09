<?php

class Conexao {
    private static $conexao;

    private static $host = "luam.net.br";

    private static $port = "33066";
    
    private static $database = "Teste";

    private static $username = "root";

    private static $password = "root";

    /**
    * Pegar instancia da classe conexão
    * @return Instance	
    */
    public static function getInstance(){
        if (is_null(self::$conexao)){
            self::$conexao = new PDO("mysql:host=".self::$host.";port=".self::$port.";dbname=".self::$database, self::$username, self::$password);
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexao;
    }

}



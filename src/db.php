
<?php

// $host = "database";
// $port = 3306;
// $database = "Teste";
// $username = "root";
// $password = "root";

// try {
//     $conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }
// catch(PDOException $error){
//     echo "Error: ".$error->getMessage();
// }

class Conexao {
    private static $conexao;

    private static $host;

    private static $port;

    private static $database;

    private static $username;

    private static $password;

    private function  __construct($host, $port, $database, $username, $password){
        self::$host = $host;
        self::$port = $port;
        self::$database = $database;
        self::$username = $username;
        self::$username = $password;
    }

    public static function getInstance(){
        if (is_null(self::$conexao)){
            self::$conexao = new PDO("mysql:host=".self::$host.";port=".self::$port.";dbname=".self::$database, self::$username, self::$password);
        }
        return self::$conexao;
    }

}


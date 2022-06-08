
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

    private static $host = "database";

    private static $port = "3306";

    private static $database = "Teste";

    private static $username = "root";

    private static $password = "root";

    private function  __construct($host, $port, $database, $username, $password){

    }

    public static function getInstance(){
        if (is_null(self::$conexao)){
            self::$conexao = new PDO("mysql:host=".self::$host.";port=".self::$port.";dbname=".self::$database, self::$username, self::$password);
        }
        return self::$conexao;
    }

}



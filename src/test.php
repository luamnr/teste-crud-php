<?php

include_once "./db.php";

$teste = $conn->prepare("SELECT * FROM usuarios WHERE USUARIO_ID = :teste");
$teste->execute([":teste" => "1"]);

$arr = $teste->fetchAll();

for ($i=0; $i < count($arr); $i++) { 
    echo $arr[$i]["LOGIN"];
}
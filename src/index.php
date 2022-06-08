<?php

echo $_SESSION;
if (!$_SESSION){
    session_start();
}

require __DIR__. "/controler/controler.php";


$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        Controler::loginView();
        break;
    case 'cadastro_usuarios' :
        require __DIR__ . '/views/index.php';
        break;
    case '/pesquisa_usuarios' :
        Controler::listUsersView();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.html';
        break;
}


?>

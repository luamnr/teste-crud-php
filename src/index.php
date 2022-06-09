<?php


if (!$_SESSION){
    session_start();
}

require __DIR__. "/controller/usuariocontroller.php";


$request = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
if ($_GET){
    $params =  $_GET;
}
else{
    $params = null;
}


switch ($request) {
    case '/' :
        UsuarioController::loginView();
        break;
    case '/logout' :
        UsuarioController::logoutView($params);
        break;
    case '/cadastro_usuarios' :
        UsuarioController::createUserView($params);
        break;
    case "/pesquisa_usuarios":
        UsuarioController::listUsersView($params);
        break;
    case "/deletar_usuarios":
        UsuarioController::userDeleteView($params);
        break;
    case "/editar_usuarios":
        UsuarioController::userDetailView($params);
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}


?>

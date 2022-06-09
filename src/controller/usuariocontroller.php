<?php

require __DIR__ . "/../model/usuario.php"; 
require __DIR__ . "/controller.php";
require __DIR__ . "/../model/autorizacao.php";

class UsuarioController extends Controller{

    /**
    * Checa a sessão para validar autenticação do usuário
    * @return Boolean	
    */
    private function isAuthenticated(){
        if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
            return FALSE;    
        }
        return TRUE;
    }
      
    /**
    * Valida o login no banco de dados
    * @param String $login 
    * @param String $pass 
    * @return Boolean	
    */
    private function loginIsValid($login, $pass){
        
        if(Usuario::validate($login, $pass)){
            return TRUE;
        }
        return FALSE;
    }

    /**
    * Autentica sessão do usuário
    * @param String $login 
    * @param String $pass 
    * @return Void	
    */
    private function authenticate($login, $pass){
        $msg = "Login inválido";

        $invalid = FALSE;
        if (Usuario::getAtivo($login)["ATIVO"] == "N"){
            $invalid = TRUE;    
            $msg = "Usuário desativado";
        }

        if (self::loginIsValid($login, $pass) and !$invalid){
            $_SESSION["authenticated"] = TRUE;
            // se tiver valido autentique e chame a proxima view
            self::listUsersView();
            return;
        }

        self::render("index", ["invalidForm"=>$msg]);
    }

    /**
    * controller da página inicial de login
    * @param Array $params parâmetros para serem avaliado como variável para a view 
    * @return Void	
    */
    public static function loginView($params=null){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST["user"];
            $pass = $_POST["pass"];
            self::authenticate($login, $pass);
            return;
        }
        self::render("index");
    }

    /**
    * controller para processar logout
    * @param Array $params parâmetros para serem avaliado como variável para a view 
    * @return Void	
    */
    public static function logoutView($params=null){
        session_destroy();
        self::render("index");
    }

    /**
    * controller da página de listar usuários
    * @param Array $params parâmetros para serem avaliado como variável para a view 
    * @return Void	
    */
    public static function listUsersView($params=null){
        if (!self::isAuthenticated()){
            self::render("index", ["invalidForm"=>"Login inválido"]);
            return;
        }

        if ($params["busca"]){
            $usuarios = Usuario::getLike($params["busca"]);
        }else{
            $usuarios = Usuario::getAll();
        }

        self::render("pesquisa_usuarios" , $usuarios);
    }

    /**
    * controller da página de criação de usuário
    * @param Array $params parâmetros para serem avaliado como variável para a view 
    * @return Void	
    */
    public static function createUserView($params=null){
        if (!self::isAuthenticated()){
            self::render("index", ["invalidForm"=>"Login inválido"]);
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] === "GET"){
            self::render("cadastro_usuarios");
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            

            $user = $_POST["user"];
            if (Usuario::getByUser($user)){
                self::render("cadastro_usuarios", ["loginExist"=>TRUE]);
                return;
            }

            $nome = $_POST["nome"];
            $pass = $_POST["pass"];
            $authorization = $_POST["authorization"];
            $status = $_POST["status"];
        
            $id = Usuario::create($nome, $user, $pass, $status);
        
            if ($authorization){
                Autorizacao::create($id, $authorization);
            }

            self::listUsersView();
        }
    }

    /**
    * controller da página de editar usuário
    * @param Array $params parâmetros para serem avaliado como variável para a view 
    * @return Void	
    */
    public static function userDetailView($params=null){

        if (!self::isAuthenticated()){
            self::render("index", ["invalidForm"=>"Login inválido"]);
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] === "GET"){
            $id = $params["id"];
            $user = Usuario::getById($id);
            $auth = Autorizacao::getByUserId($id);
            self::render("cadastro_usuarios", [$user, $auth,"editar" => TRUE]);
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            $id = $params["id"];
            $user = $_POST["user"];
            $nome = $_POST["nome"];
            $pass = $_POST["pass"];
            $authorization = $_POST["authorization"];
            $status = $_POST["status"];
        
            Usuario::editById($id ,$nome, $user, $pass, $status);
            if ($authorization){
                Autorizacao::deleteById($id);
                Autorizacao::create($id, $authorization);
            }

            self::listUsersView();
        }
    }

    /**
    * controller da página de deletar usuário
    * @param Array $params parâmetros para serem avaliado como variável para a view 
    * @return Void	
    */
    public static function userDeleteView($params){
        if (!self::isAuthenticated()){
            self::render("index", ["invalidForm"=>"Login inválido"]);
            return;
        }
        
        if ($params["confirmado"]){
            Usuario::deleteById($params["id"]);
            self::listUsersView();
            return;
        }

        self::render("deletar_usuarios", $params);
    } 
}
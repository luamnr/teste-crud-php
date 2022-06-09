<?php

class Controller{
    
    public $request;

    /**
    * controller base
    * @param String $file Nome da view para renderizar
    * @param Array $array Array de parâmetros passados pelo controller
    * @return Void	
    */
    public static function render($file, $array=null){
        
        if (!is_null($array)){
            foreach ($array as $var => $value){
                ${$var} = $value;
            }
        }

        ob_start();
        include __DIR__."/../views/"."$file.php"; 
        ob_flush();
    }
}
<?php
    //Este metodo cargara automaticamente al ser llamado y devolvera la ruta del controlador y la vista es decir devolvera la siguientes rutas:
    //Config/App/Controller.php
    //Config/App/Views.php
    spl_autoload_register(function($class){
        if(file_exists("Config/App/".$class.".php")){
            require_once "Config/App/".$class.".php";
        }
        //echo "Config/App/".$class.".php";
    })
?>
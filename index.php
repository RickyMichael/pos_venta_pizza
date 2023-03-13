<?php

    require_once "Config/Config.php";

    //Obetenemos la ruta enviada por GET verificando si esta vacia o no, si $_GET['URL'] no tiene valor toma el valor de "Home/index"
    $ruta = !empty($_GET['url']) ? $_GET['url'] : "Home/index";
    //creamos un array con la ruta obtenida ya la separamos mediante las "/"
    $array = explode("/", $ruta);
    $controller = $array[0];
    $metodo = "index";
    $parametro = "";

    //Si $array[1] EXISTE Y ES DIFERENTE DE VACIO lo introducimos a la variable $metodo
    if (!empty($array[1])){
        if(!empty($array[1] != " ")){
            $metodo = $array[1];
        }
    }

    //Si el $array[2] o mas, existe y es diferente de vacio lo introducimos a la variable $parametro separado por comas
    if (!empty($array[2])){
        if(!empty($array[2] != "")){
            for($i = 2; $i < count($array); $i++){
                $parametro .= $array[$i]. ",";
            }
            //eliminamos la coma final
            $parametro = trim($parametro, ",");
        }
    }

    require_once "Config/App/autoload.php";

    //Almacenamos en $dirControllers la ruta a $controller obtenida de la url.
    $dirControllers = "Controllers/".$controller.".php";
    //Si existe el archivo referenciado en $dirControllers mandamos a llamar al controlador con require_once
    if(file_exists($dirControllers)){
        require_once $dirControllers;
        //crea una nueva instancia del controlador solicitado.
        $controller = new $controller();
        //Verificamos si el método solicitado existe en el controlador.
        if(method_exists($controller, $metodo)){
            //llamamos al método del controlador y pasa cualquier parámetro solicitado.
            $controller->$metodo($parametro);
        }else{
            echo "No existe el metodo";
        }
    }else{
        echo "No existe el controlador";
    }
   
?>
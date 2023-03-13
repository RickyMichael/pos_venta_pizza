<?php
    class Controller{
        //llamamos al constructor de la clase
        public function __construct()
        {
            //asignamos a la propiedad views la instancia del objeto Views
            $this->views = new Views();
            //Ejecutamos el metodo cargarModel()
            $this->cargarModel();
        }

        public function cargarModel()
        {
            //Obtenemos la clase y concatenamos Model Ejemplo: Cuando es localhost/pos_venta/ sera HomeModel
            $model = get_class($this)."Model";
            $ruta = "Models/".$model.".php";
            if(file_exists($ruta)){
                require_once $ruta;
                //Asignamos a la propiedad model un objeto $model, si la ruta es localhost/pos_venta, ejecutara el codigo dentro del constructor de la clase HomeModel
                $this->model = new $model();
            }
        }
    }
?>
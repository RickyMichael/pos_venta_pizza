<?php
    class Bienvenida extends Controller{
        public function __construct(){
            //Iniciamos la sesion para que $_SESSION funcione
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            parent::__construct();
        }

        public function index(){
            //accedemos al metodo getView y el primer parametro entregado es el controlador luego la vista
            $this->views->getView($this, "index");
        }

    }
?>

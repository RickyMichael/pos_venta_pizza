<?php
    class Home extends Controller{

        public function __construct(){
            session_start();
            if (!empty($_SESSION['activo'])) {
                header("location: ".base_url. "Usuarios");
            }
            parent::__construct();
        }

        public function index(){
            //Podemos llamar al metodo getView ya que la clase hereda de Controller
            //Cuando la ruta solo es localhost/pos_venta, $this toma el valor de Home
            $this->views->getView($this, "index");
        }
    }
?>
<?php

    class Administracion extends Controller{
        public function __construct(){
            //Iniciamos la sesion para que $_SESSION funcione
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            parent::__construct();
        }

        public function index(){
            $data = $this->model->getEmpresa();
            //accedemos al metodo getView y el primer parametro entregado es el controlador luego la vista
            $this->views->getView($this, "index", $data);
        }

        public function modificar(){
            $ruc = $_POST['ruc'];
            $nombre = $_POST['nombre'];
            $tel = $_POST['telefono'];
            $dir = $_POST['direccion'];
            $mensaje = $_POST['mensaje'];
            $id = $_POST['id'];
            $data = $this->model->modificar($ruc, $nombre, $tel, $dir, $mensaje, $id);
            if($data == "ok"){
                $msg = "ok";
            }else{
                $msg = "error";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>
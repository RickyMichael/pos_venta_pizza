<?php
    class Categorias extends Controller{
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

        public function listar(){
            $data = $this->model->getCategorias();
            for ($i=0; $i < count($data) ; $i++) {
                if($data[$i]['estado'] == 1){
                    $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';

                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarCat('.$data[$i]['id'].');" ><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarCat('.$data[$i]['id'].');" ><i class="fas fa-trash-alt"></i></button>
                    </div>';
                } else{
                    $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';

                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarCat('.$data[$i]['id'].');" ><i class="fas fa-reply"></i></button>
                    </div>';
                }
            }
            echo  json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function registrar(){
            $nombre = $_POST['nombre'];
            $id = $_POST['id'];

            if(empty($nombre)){
                $msg = "El nombre es obligatorio";
            }else{
                if($id == ""){
                        $data = $this->model->registrarCategoria($nombre);
                        if($data == "ok"){
                            $msg = "si";
                        }else if($data == "existe"){
                            $msg = "La categoria ya existe";
                        }else{
                            $msg = "Error al registrar categoria";
                        }
                }else{
                    $data = $this->model->modificarCategoria($nombre, $id);
                    if($data == "modificado"){
                        $msg = "modificado";
                    }else{
                        $msg = "Error al modificar categoria";
                    }
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function editar(int $id){
            $data = $this->model->editarCat($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function eliminar(int $id){
            $data = $this->model->accionCat(0, $id);
            if($data == 1){
                $msg = "ok";
            }else{
                $msg = "Error al eliminar categoria";
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function reingresar(int $id){
            $data = $this->model->accionCat(1, $id);
            if($data == 1){
                $msg = "ok";
            }else{
                $msg = "Error al habilitar categoria";
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

    }
?>

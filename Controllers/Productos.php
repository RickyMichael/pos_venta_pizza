<?php
    class Productos extends Controller{
        public function __construct(){
            //Iniciamos la sesion para que $_SESSION funcione
            session_start();
            parent::__construct();
        }

        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $data['medidas'] = $this->model->getMedidas();
            $data['categorias'] = $this->model->getCategorias();
            //accedemos al metodo getView y el primer parametro entregado es el controlador luego la vista
            $this->views->getView($this, "index", $data);
        }

        public function listar(){
            $data = $this->model->getProductos();
            for ($i=0; $i < count($data) ; $i++) {
                $data[$i]['foto'] = '<img class="img-thumbnail" src="'. base_url ."Assets/img/". $data[$i]['foto'].'">';
                if($data[$i]['estado'] == 1){
                    $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';

                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarPro('.$data[$i]['id'].');" ><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarPro('.$data[$i]['id'].');" ><i class="fas fa-trash-alt"></i></button>
                    </div>';
                } else{
                    $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';

                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarPro('.$data[$i]['id'].');" ><i class="fas fa-reply"></i></button>
                    </div>';
                }

            }
            echo  json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function registrar(){
            // codigo para saber cual son los datos que envia el arreglo $_FILES
            // print_r($_FILES);
            // exit;

            $codigo_barra = $_POST['codigo_barra'];
            $nombre = $_POST['nombre'];
            $precio_compra = $_POST['precio_compra'];
            $precio_venta = $_POST['precio_venta'];
            $medida = $_POST['medida'];
            $categoria = $_POST['categoria'];
            $id = $_POST['id'];
            $img = $_FILES['foto'];
            $name = $img['name'];
            $tmpname = $img['tmp_name'];
            $fecha = date("YmdHis");

            if(empty($codigo_barra) || empty($nombre) || empty($precio_compra) || empty($precio_venta)){
                $msg = "Todos los campos son obligatorios";
            }else{
                if(!empty($name)){
                    $imgNombre = $fecha . ".jpg";
                    $destino = "Assets/img/".$imgNombre;

                }else if(!empty($_POST['foto-actual']) && empty($name)){
                    $imgNombre = $_POST['foto-actual'];
                }else{
                    $imgNombre = "default.jpg";
                }

                if($id == ""){
                        $data = $this->model->registrarProducto($codigo_barra, $nombre, $precio_compra, $precio_venta, $medida, $categoria, $imgNombre);
                        if($data == "ok"){
                            if(!empty($name)){
                                move_uploaded_file($tmpname, $destino);
                            }
                            $msg = "si";
                        }else if($data == "existe"){
                            $msg = "El producto ya existe";
                        }else{
                            $msg = "Error al registrar producto";
                        }
                }else{
                        $imgDelete = $this->model->editarPro($id);
                        if ($imgDelete['foto'] != 'default.jpg') {
                            if(file_exists("Assets/img/" . $imgDelete['foto'])){
                                unlink("Assets/img/" . $imgDelete['foto']);
                            }
                        }
                        $data = $this->model->modificarProducto($codigo_barra, $nombre, $precio_compra, $precio_venta, $medida, $categoria, $imgNombre, $id);
                        if($data == "modificado"){
                            if(!empty($name)){
                                move_uploaded_file($tmpname, $destino);
                            }
                            $msg = "modificado";
                        }else{
                            $msg = "Error al modificar producto";
                        }
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function editar(int $id){
            $data = $this->model->editarPro($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function eliminar(int $id){
            $data = $this->model->accionProd(0, $id);
            if($data == 1){
                $msg = "ok";
            }else{
                $msg = "Error al eliminar";
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function reingresar(int $id){
            $data = $this->model->accionProd(1, $id);
            if($data == 1){
                $msg = "ok";
            }else{
                $msg = "Error al habilitar producto";
            }

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

    }
?>

<?php
    class Gastos extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }

        public function index(){
            $this->views->getView($this, "index");
        }

        public function buscarCodigo($cod){
            $data = $this->model->getProCod($cod);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }

        public function ingresar(){
            $id = $_POST['id'];
            $datos = $this->model->getProductos($id);
            $id_producto = $datos['id'];
            $id_usuario = $_SESSION['id_usuario'];
            $precio = $datos['precio_compra'];
            $cantidad = $_POST['cantidad'];
            $comprobar = $this->model->consultarDetalle('detalles', $id_producto, $id_usuario);
            if (empty($comprobar)) {
                $sub_total = $precio * $cantidad;
                $data = $this->model->registrarDetalle('detalles', $id_producto, $id_usuario, $precio, $cantidad, $sub_total);
                if($data == 'ok'){
                    $msg = "ok";
                }else{
                    $msg = "Error al ingresar el producto";
                }
            }else{
                $total_cantidad = $comprobar['cantidad'] + $cantidad;
                $sub_total = $precio * $total_cantidad;
                $data = $this->model->actualizarDetalle('detalles', $precio, $total_cantidad, $sub_total, $id_producto, $id_usuario);
                if($data == 'modificado'){
                    $msg = "modificado";
                }else{
                    $msg = "Error al modificar el producto";
                }
            }
            // echo ("canitdad: " . $cantidad . "Sub total: " . $sub_total);

            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function listar($table){
            /* Enviando los datos de la sesion */
            $id_usuario = $_SESSION['id_usuario'];
            $data['detalle'] = $this->model->getDetalle($table, $id_usuario);
            $data['total_pagar'] = $this->model->calcularCompra($table, $id_usuario);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function delete($id){
            $this->model->deleteDetalle($id);
            if($data == "ok"){
                $msg = "ok";
            }else{
                $msg = "error";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function registrarCompra(){
            $id_usuario = $_SESSION['id_usuario'];
            $total = $this->model->calcularCompra('detalles', $id_usuario);
            $data = $this->model->registrarCompra($total['total']);
            if($data == "ok"){
                $detalle = $this->model->getDetalle('detalles', $id_usuario);
                $id_compra = $this->model->id_compra();
                foreach($detalle as $row){
                    $cantidad = $row['cantidad'];
                    $precio = $row['precio'];
                    $id_producto = $row['id_producto'];
                    $sub_total = $precio * $cantidad;
                    $this->model->registrarDetalleCompra($id_compra['id'], $id_producto, $cantidad, $precio, $sub_total);
                    $stock_actual = $this->model->getProductos($id_producto);
                    $stock = $stock_actual['cantidad'] + $cantidad;
                    $this->model->actualizarStock($stock, $id_producto);
                }
                $limpiarDetalle = $this->model->vaciarDetalle($id_usuario);
                if($limpiarDetalle == "ok"){
                    $msg = array('msg' => 'ok', 'id_compra' => $id_compra['id']);
                }
            }else{
                $msg = "Error al registrar la compra";
            }

            echo json_encode($msg,  JSON_UNESCAPED_UNICODE);
            die();
        }

        public function generarPdf($id_compra){

            $empresa = $this->model->getEmpresa();
            require('Libraries/fpdf/fpdf.php');

            $pdf = new FPDF('P', 'mm', array(80, 200));
            $pdf->AddPage();
            $pdf->setTitle('Reporte compra');
            $pdf->SetFont('Arial','B',14);
            $pdf->Cell(65,10, utf8_decode($empresa['nombre']), 0, 1, 'C' );
            //$pdf->Image(base_url . 'Assets/img/default.jpg', 28, 20, 25, 25);
            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(30,5, 'RUC: ', 0, 0, 'C' );
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(30,5, $empresa['ruc'], 0, 1, 'C' );

            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(30,5, utf8_decode('Teléfono: '), 0, 0, 'C' );
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(30,5, $empresa['telefono'], 0, 1, 'C' );

            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(30,5, utf8_decode('Dirección: '), 0, 0, 'C' );
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(30,5, utf8_decode($empresa['direccion']), 0, 1, 'C' );

            $pdf->Output();
        }

        public function historial(){
            $this->views->getView($this, "historial");
        }

        public function listar_historial(){
            $data = $this->model->getHistorialCompras();
            for ($i=0; $i < count($data) ; $i++) {
                $data[$i]['acciones'] = '<div>
                    <a class="btn btn-danger" href="'.base_url. "Compras/generarPdf/" .$data[$i]['id'].'" target="_blank"><i class="fas fa-file-pdf"></i></a>
                    </div>';
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        /**
         * Fin Compras
         */

    }

?>
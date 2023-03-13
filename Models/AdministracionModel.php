<?php
    class AdministracionModel extends Query{

        public function __construct(){
            parent::__construct();
        }

        public function getEmpresa(){
            $sql = " SELECT * FROM configuracion ";
            $data = $this->select($sql);
            return $data;
        }

        public function modificar(string $ruc, string $nombre, string $tel, string $dir, string $mensaje, int $id){

            $sql = "UPDATE configuracion SET ruc = ?, nombre = ?, telefono = ?, direccion = ?, mensaje = ? WHERE id = ?";
            $datos = array($ruc, $nombre, $tel, $dir, $mensaje, $id);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res = 'ok';
            }else{
                $res = 'error';
            }
            return $res;
        }
    }
?>
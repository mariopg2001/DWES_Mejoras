<?php
    require_once '../modelo/ModeloReto.php';


    class ControladorReto{
        private $modelo;

        public function __construct(){
            $this->modelo = new ModeloReto();
        }
        public function consultaReto(){
            $resultado=$this->modelo->consultaReto();
            return $resultado;
        }
        public function insertarReto($inforeto){
            $filas=$this->modelo->insertarReto($inforeto);
            return $filas;         
        }
        public function eliminar($idreto){
            $resultado=$this->modelo->borrar($idreto);
            if($resultado>0){
                header('location: consulta_retos.php ');
                exit;
            }        
        }
        public function modificarReto($datos){
            $resultado=$this->modelo->modificarReto($datos);
            if($resultado=='ok'){
                header('location: consulta_retos.php ');
                exit;
            }
    }
    }
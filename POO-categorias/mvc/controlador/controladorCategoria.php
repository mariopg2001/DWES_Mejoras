<?php
    require_once '../modelo/ModeloCategoria.php';

    class ControladorCategoria{
        private $modelo;
        public function __construct(){
            $this->modelo = new ModeloCategoria();
        }
        public function consultar(){
            $resultado=$this->modelo->consulta();
            return $resultado;
        }

        public function consultarnombre($id){
            $nombre=$this->modelo->Nombre_mod($id);
            return $nombre;
        }

        public function insertar($nombrecategoria){
            $nfila=$this->modelo->alta($nombrecategoria);

            return $nfila;
            
        }
        public function eliminar($idcategoria){
            $resultado=$this->modelo->borrar($idcategoria);
            if($resultado>0){
                header('location: consulta.php ');
                exit;
            }        
        }
        public function modificar($datos){
           
                $resultado=$this->modelo->modificar($datos);
            
                if($resultado=='ok'){
                    header('location: consulta.php ');
                    exit;
                }
        }
              
    }

<?php
    require_once './modelo/ModeloLog.php';

    
    class ControladorLog
    {
        private $modelo;
        public function __construct(){
            $this->modelo = new ModeloLog();
        }


        public function iniciarSesion($correo,$contra){
            $id=$this->modelo->iniciarSesion($correo,$contra);
            if($id>0){
                session_start();
                $_SESSION['idprofesor']=$id;
                header('Location: ./index.php');
            }
            else{
                
            }
        }

        /**
         * Realizar el cierre de sesión del usuario actual.
         */
        public function cerrarSesion()
        {
            $this->modelo->cerrarSesion();
        }
    }
?>
<?php
    require_once "./configuracion/config.php";

    class ModeloLog
    {
     private $conexion;

        public function __construct(){
            $this->conexion=$this->conectar();
        }
        public function conectar(){
            $conexion= new mysqli(Server,Usu,Contra,Bbdd) or die ('No se puede conectar');
            $conexion->set_charset('utf8');

            return $conexion;
        }
      public function iniciarSesion($correo, $contra){
        $this->conectar();
        $sql= "SELECT * FROM Profesores WHERE correo=? AND contrasenia=?;";
        $peticion = $this->conexion->prepare($sql);
        $peticion->bind_param("ss",$correo, $contra);
        $peticion->execute();
        $datos=$peticion->get_result();
        
        if(($datos->num_rows)>0){
            $linea = $datos ->fetch_assoc();
            return $linea['idProfesor'];
        }
        else{
            return 0;
        }
        return $datos;
        $this->conexion->close();
    }
}
?>
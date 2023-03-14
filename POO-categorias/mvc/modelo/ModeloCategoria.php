<?php
     require_once "../configuracion/config.php";
    
    class ModeloCategoria{
     private $conexion;
        public function __construct(){
            $this->conexion=$this->conectar();
        }
        public function conectar(){
            $conexion= new mysqli(server,usu,contra,bbdd) or die ('No se puede conectar');
            $conexion->set_charset('utf8');

            return $conexion;
        }
        public function consulta(){
            $sql="SELECT * FROM Categorias";
            $result = $this->conexion->query($sql);
            return $result;
        }
        public function consultaCat($id){
            $sql="SELECT nombre FROM Categorias WHERE idcategoria=".$id."";
            $result = $this->conexion->query($sql);
            return $result;
        }
        public function alta($nombre){
            try{
                $sql = "INSERT INTO Categorias(Nombre) VALUES('".$nombre."');";
                $result = $this->conexion->query($sql);
                return $result;
            }catch(Exception $e){
                //echo $e->getmessage();
                //echo $e->getCode();
                if( $e->getCode()== '1062'){
                    echo 'La categoria ya existe 
                    <a href="formularioalta.php"><button>Volver</button></a>';
                    
                }
            }
            die();   
        }

        public function borrar($id){
            try{
                $sql = "DELETE FROM Categorias WHERE idcategoria=".$id.";";
                $result = $this->conexion->query($sql);
                return $result;
            }catch(Exception $e){
                //echo $e->getmessage();
               // echo $e->getCode();
                if( $e->getCode()== '1451'){
                    echo 'La categoria esta asociada a un reto
                    <a href="consulta.php"><button>Volver</button></a>';
                }
            }
            die();
        }
        public function Nombre_mod($id){
            $sql = "SELECT Nombre from Categorias WHERE idcategoria=$id;";
            $result = $this->conexion->query($sql);

            return $result;
        }
        
        public function modificar($categoria){
            if(!empty($categoria)){
                $fila = $categoria;
                foreach($fila as $id => $nombre){
                    try{
                        $sql = 'UPDATE Categorias 
                        SET Nombre= "'.$nombre.'"
                        WHERE idcategoria = '.$id.';';
                        $result = $this->conexion->query($sql);

                        return $result;
                    }catch(Exception $e){
                    //echo $e->getmessage();
                    //echo $e->getCode();
                        if( $e->getCode()== '1062'){
                            echo 'La categoria ya existe
                            <a href="form_mod.php?id='.$id.'"><button>Volver</button></a>
                            <a href="consulta.php"><button>consultar</button></a>';
                        }
                    }
                    die();
                }
            }   
        }
    }
?>
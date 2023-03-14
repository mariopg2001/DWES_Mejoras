<?php
    if(empty($_POST['nombrecategoria'])){
        echo 'La variable " Nombre " esta vacia <button><a href="formularioalta.php">volver</a></button> ';		
    }
    else{
        require_once('../controlador/controladorCategoria.php');
        $controladorCategoria=new ControladorCategoria();
        $nombre=$_POST['nombrecategoria'];
        $consulta= $controladorCategoria->insertar($nombre);  
        if($consulta>0){
            echo 'La categoria se ha introducido correctamente. <button><a href="consulta.php">Mostrar categorias</a></button>';
        }				
    }
?>
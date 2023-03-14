<?php
    
    if(empty($_POST['nombre'])|| empty($_POST['inicioreto']) || empty($_POST['finreto']) || empty($_POST['finicioIns']) || empty($_POST['ffinIns']) ){
    echo '<br>Rellenar todos los campos.<br>';
    }
    else{
        
        require_once('../controlador/controladorReto.php');
        $controladorReto=new ControladorReto();
        $filas= $controladorReto->insertarReto($_POST);
        if($filas>0){
            echo 'El reto se ha introducido correctamente. <button><a href="consulta_retos.php">Mostrar retos</a></button>';

        }				
    }
?>
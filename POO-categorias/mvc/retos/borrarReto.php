<?php

session_start();
if(!isset($_SESSION['idprofesor'])) {
    header('Location: ../index.php');
}

    $idReto=$_GET['id'];
    require_once('../controlador/controladorReto.php');
    $controlador=new ControladorReto();
    $resultado=$controlador->eliminar($idReto);
?>
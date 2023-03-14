<?php
$idCategoria=$_GET['id'];
require_once('../controlador/controladorcategoria.php');
$controlador=new ControladorCategoria();
$resultado=$controlador->eliminar($idCategoria);
?>
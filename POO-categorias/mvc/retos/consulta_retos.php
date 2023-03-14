<?php 
	session_start();
	if(!isset($_SESSION['idprofesor'])) {
        header('Location: ../index.php');
    }
?>

<html>
    <head>
        <meta charset=utf-8 />
        <link rel="stylesheet" type="text/css" href="../../css/style2.css"/>
		<script src="https://kit.fontawesome.com/f7b55e9c0a.js" crossorigin="anonymous"></script>
        <title>Retos</title>
    </head>
    <body>
    <nav id="nav">
      <h1 id="titulo">WEB RETOS</h1>
      <ul id="ul1">
        <li class="nav">
            <a href="../index.php"> Inicio</a>
          </li>
          <li class="nav">
            <a href="./consulta_retos.php"> Retos</a>
          </li>
		  <li class="nav">
            <a href="../vistas/consulta.php">Categorias</a>
          </li>
          <li class="nav">
            <a href="../vistas/Fsesion.php">Cerrar sesion</a>
          </li>
      </ul>
    </nav>
    <label  id="menu">
            <input type="checkbox" />
           <i id="iconomenu"class="fa-sharp fa-solid fa-bars"></i>
           <div id="menuhamb">
               <span> <a href="./alta_reto.php">Añadir Reto </a></span><br><br>
               <span  id="seleccionado"><a href="./consulta_retos.php"> Listar Retos</a></span><br><br>
               <span> <a href="../vistas/formularioalta.php">Añadir Categorias</a></span><br><br>
               <span > <a href="../vistas/consulta.php" >Listar Categorias</a></span><br>
               
           </div>
           
       </label>
    <div id="subcontenedor1" class="subcont">
      <h3>Retos</h3>
            <ul class="opc2">
                <li >
                  <p class="span1" >
                  <a href="./alta_reto.php">Añadir </a>
                  </p> 
                </li><br>
                <li >
                  <p class="span1" id="seleccionado">
                     Listar
                  </p>
                 </li><br>
                 <li >
                  <p class="span1">
                    <a href="./pdf1.php">Generar PDF  </a>

                  </p>
                 </li><br>
            </ul>
            <h3>Categorias</h3>
            <ul class="opc2">
                <li >
                  <p class="span1" >
                    <a href="../vistas/formularioalta.php">Añadir</a>
                  </p> 
                </li><br>
                <li >
                  <p class="span1" >
                  <a href="../vistas/consulta.php">Listar</a> 
                  </p>
                 </li><br>
                 <li >
                  <p class="span1">
                  <a href="./pdf2.php">Generar PDF </a>
                  </p>
                 </li><br>
            </ul>
        </div>
        <div id="contenedor">
            <div id="subcontenedor2" class="subcont">
                <h1 id="from">Listado de Retos</h1>
				<?php
					if(isset($_GET['nombre']) && isset($_GET['id'])){
						echo '
							<h2>AVISO</h2>
							<h4>¿Seguro que quieres eliminar el reto: '.$_GET['nombre'].' ?</h4>
							<button><a href="borrarReto.php?id='.$_GET['id'].'">Sí</button>
							<button><a href="consulta_retos.php">No</button>
						';
					}else{
						if(isset($_GET['idReto'])){
							$id=$_GET['idReto'];
							require_once('../controlador/controladorreto.php');
							$controladorReto=new ControladorReto();
							$result=$controladorRetos->consultar();
							while($fila = $result ->fetch_assoc()){
								if($fila['idreto']==$id){
									$nombre=$fila['nombre'];
								}
							}
						}else{
							require_once('../controlador/controladorreto.php');
							$controladorReto=new ControladorReto();
							$result=$controladorReto->consultaReto();
				?>
				<h3>Retos</h3>
				<table>
					<tr>
						<th>Nombre</th>
						<th>Categoría</th>
						<th>Publicado</th>
						<th>Seccion</th>
						<th>Modificar</th>
						<th>Eliminar</th>

					</tr>
				<?php
					require_once('../controlador/controladorcategoria.php');
					$controladorCategoria=new ControladorCategoria();
					if($result->num_rows>0){
						while($fila = $result ->fetch_assoc()){
							if($fila['Publicado']==1){
								$publicados='Si';
							}else{
								$publicados='No';
							}
							$cat=$controladorCategoria->consultarnombre($fila['id_categoria']);
							echo '<tr>
							<td>'.$fila['Nombre'].'</a></td>';
							$categoria = $cat ->fetch_assoc();
							echo '
									<td>'.$categoria['Nombre'].'</td>
									<td>'.$publicados.'</td>
									<td>'.$fila['seccion'].'</td>
									<td><a href="formmod_reto.php?id='.$fila["idReto"].'"><img src="../../imagen/lapiz.png"></a></td>
									<td><a href="consulta_retos.php?nombre='.$fila['Nombre'].'&id='.$fila['idReto'].'"><img src="../../imagen/basura.jpg"></a></td>';
						}
					}
					}
					}
				?>
				</table>
            </div>
        </div>
    </body>
</html>



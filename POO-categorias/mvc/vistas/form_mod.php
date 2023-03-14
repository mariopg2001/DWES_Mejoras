<html>
    <head>
        <meta charset=utf-8 />
        <link rel="stylesheet" type="text/css" href="../../css/style2.css"/>
		<script src="https://kit.fontawesome.com/f7b55e9c0a.js" crossorigin="anonymous"></script>
        <title>Modificar categoria</title>
    </head>
    <body>
    <nav id="nav">
      <h1 id="titulo">WEB RETOS</h1>
      <ul id="ul1">
        <li class="nav">
            <a href="../index.php"> Inicio</a>
          </li>
          <li class="nav">
            <a href="../retos/consulta_retos.php"> Retos</a>
          </li>
          <li class="nav">
            <a href="./consulta.php">Categorias</a>
          </li>
          <li class="nav">
            <a href="./Fsesion.php">Cerrar sesion</a>
          </li>
      </ul>
    </nav>
    <label  id="menu">
            <input type="checkbox" />
           <i id="iconomenu"class="fa-sharp fa-solid fa-bars"></i>
           <div id="menuhamb">
               <span> <a href="../retos/alta_reto.php">Añadir Reto </a></span><br><br>
               <span><a href="../retos/consulta_retos.php"> Listar Retos</a></span><br><br>
               <span > <a href="./formularioalta.php" >Añadir Categorias</a></span><br><br>
               <span> <a href="./consulta.php">Listar Categorias</a></span><br>
               
           </div>
           
       </label>
    <div id="subcontenedor1" class="subcont">
      <h3>Retos</h3>
            <ul class="opc2">
                <li >
                  <p class="span1" >
                  <a href="../retos/alta_reto.php">Añadir </a>
                  </p> 
                </li><br>
                <li >
                  <p class="span1">
                    <a href="../retos/consulta_retos.php"> Listar</a>
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
                    <a href="./formularioalta.php">Añadir</a> 
                  </p> 
                </li><br>
                <li >
                  <p class="span1">
                    <a href="./consulta.php">Listar</a>
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
            <h1 id="from">Alta de categorías</h1>
            <?php
				require_once('../controlador/controladorcategoria.php');
				if(empty($_POST)){
					$controlador=new ControladorCategoria();
					$result=$controlador->consultar();
					if(isset($_GET['id'])){
						while($fila = $result ->fetch_assoc()){
							if($fila['idcategoria']==$_GET['id']){
								$categoria=$fila['nombre'];
							}
						}
					}
					echo '<form method="POST" action="form_mod.php">
					<label>Categoría <label>
					<input type="text" name="'.$_GET['id'].'" value="'.$categoria.'"/><br><br>
					<input type="submit" id="anadir" value="Aceptar"/>
					</form>';
				}		
				else{
					$controlador=new ControladorCategoria();
					$controlador->modificar($_POST);
				}
			?>
            <button><a href="consulta.php" id="cancelar">Cancelar</a></button>
        </form>
        
            </div>
        </div>


    
</body>
</html>

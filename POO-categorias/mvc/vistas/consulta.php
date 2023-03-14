
<html>
    <head>
        <meta charset=utf-8 />
        <link rel="stylesheet" type="text/css" href="../../css/style2.css"/>
		<script src="https://kit.fontawesome.com/f7b55e9c0a.js" crossorigin="anonymous"></script>
        <title>Categorias</title>
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
               <span> <a href="./retos/alta_reto.php">Añadir Reto </a></span><br><br>
               <span><a href="./retos/consulta_retos.php"> Listar Retos</a></span><br><br>
               <span > <a href="formularioalta.php">Añadir Categorias</a></span><br><br>
               <span id="seleccionado"> <a href="./consulta.php" >Listar Categorias</a></span><br>
               
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
                  <p class="span1" id="seleccionado">
                   Listar
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
                <h1 id="from">Listado de categorias</h1>
                <?php
                    if(isset($_GET['nombre']) && isset($_GET['id'])){
                        echo '
                            <h2>AVISO</h2>
                            <h4>¿Seguro que quieres eliminar la categoria: '.$_GET['nombre'].' ?</h4>
                            <button><a href="borrar.php?id='.$_GET['id'].'">Sí</button>
                            <button><a href="consulta.php">No</button>
                        ';
                    }
                    else{
                        require_once('../controlador/controladorCategoria.php');
                        $controladorCategoria=new ControladorCategoria();
                        $result=$controladorCategoria->consultar();
                        echo '<table>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Borrar</th>
                                        <th>modificar</th>
                                    </tr>';
                        if($result->num_rows>0){
                            while($fila = $result ->fetch_assoc()){
                                    echo '<tr>
                                    <td >'.$fila['nombre'].'</td>
                                    <td><a href="form_mod.php?id='.$fila["idcategoria"].'"><img src="../../imagen/lapiz.png"></a></td>
                                    <td><a href="consulta.php?nombre='.$fila['nombre'].'&id='.$fila['idcategoria'].'"><img src="../../imagen/basura.jpg"></a></td>
                                    </tr>';	
                            }
                        }
                        else{
                            echo '<tr><td>No hay Categorias.</td></tr>';
                        }
                    
                    }
                ?>
                </table>
            </div>
        </div>
    </body>
</html>




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
               <span ><a href="./consulta_retos.php"> Listar Retos</a></span><br><br>
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
                  <p class="span1" >
                    <a href="./consulta_retos.php">Listar</a> 
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
                <h1 id="from">Modificar Reto</h1>
                <?php
                require_once('../controlador/controladorReto.php');
		        if(empty($_POST)){
                    $controlador=new ControladorReto();
                    $result=$controlador->consultaReto();
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        while($fila = $result ->fetch_assoc()){
                            if($fila['idReto']==$_GET['id']){
                                $nombreReto=$fila['Nombre'];
                                $descripcion= $fila['Descripcion'];
                                $FinicioIns=$fila['fechaInicioInscripcion'];
                                $FfinIns=$fila['fechaFinInscripcion'];
                                $FinicioReto=$fila['fechaInicioReto'];
                                $FfinReto=$fila['fechaFinReto'];
                                $publicado=$fila['Publicado'];
                                $categoria=$fila['id_categoria'];
                                $seccion=$fila['seccion'];
                                 
                            }
                        }
                    }
                    echo '
                        <form action="formmod_reto.php" method="post">
                        <input id=ocultar name="idReto" value="'.$id.'"><br>
                        
                         <label>Nombre del reto:</label>
                             <input display="none"type="text" class="inp" name="Nombre" value="'.$nombreReto.'"><br>
                        <label >Descripción del reto:</label>
                            <textarea class="inp" name="descripcion" >'.$descripcion.'</textarea><br>
                            <label >Publicado:</label>';
                            if($publicado==1){
                                echo '<input type="radio" name="publicado" value=1 checked >Si</label>
                                    <input type="radio" value=0 name="publicado"  >No</label><br>';
                            }else{
                                echo '<input type="radio" name="publicado" value=1  >Si</label>
                                    <input type="radio" value=0 name="publicado" checked >No</label><br>';
                            }
                            echo ' <label >Dirigido a:</label>
                                 <select class="inp" name="seccion">
                                    <option  value="Seccion de Escuela" hidden selected>Selecciona una seccion</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="ESO">ESO</option>
                                    <option value="Bachillerato">BACHILLERATO</option>
                                    <option value="G.Medio">G. Medio</option>
                                    <option value="G.Superior">G. Superior</option>
                            </select>
                            <br>
                            <label >Categoría:</label>
                            <select class="inp" name="categoria">';
                                require_once('../controlador/controladorcategoria.php');
                                $controlador=new ControladorCategoria();
                                $result=$controlador-> consultar();
                                while($fila = $result ->fetch_assoc()){
                                    echo '
                                    <option  value="Categoria" hidden selected>Selecciona una Categoria</option>
                                    
                                    <option value="'.$fila['idcategoria'].'">'.$fila['nombre'].'</option>';
                                }
                                
                           echo' </select><br>
                           <p>Fecha inscripción</p>
                           <label>Fecha inicio:</label><input class="inp" type="date" value="'.$FinicioIns.'" name="finicioIns"><br>
                           <label>Fecha fin:</label><input class="inp" type="date" value="'.$FfinIns.'" name="ffinIns"><br>
                           <br>
                           
                           <p>Fecha realización</p>
                           <label>Fecha inicio:</label><input class="inp" value="'.$FinicioReto.'" type="date" name="inicioreto" /><br>
                           <label>Fecha fin:<label><input class="inp" type="date" value="'.$FfinReto.'" name="finreto" /><br><br>
                             <input type="submit" name="enviar" id="anadir" value="enviar">
                           </form>';
                 
                }else{
                    $controlador= new ControladorReto();
                    $controlador->modificarReto($_POST);
                }
            ?> 
            <button><a href="consulta_retos.php" id="cancelar">Cancelar</a></button>
            </div>
        </div>
    </body>
</html>


    
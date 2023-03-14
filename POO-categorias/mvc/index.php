<?php 
  session_start();
  if(!isset($_SESSION['idprofesor'])) {
    require_once('./vistas/login.php');
  }
  else{
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
		<script src="https://kit.fontawesome.com/f7b55e9c0a.js" crossorigin="anonymous"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Inicio</title>
</head>
<body>
    <nav id="nav">
      <h1 id="titulo">WEB RETOS</h1>
      <ul id="ul1">
          <li class="nav">
            <a href="./retos/consulta_retos.php"> Retos</a>
          </li>
          <li class="nav">
            <a href="./vistas/consulta.php">Categorias</a>
          </li>
          <li class="nav">
            <a href="./vistas/Fsesion.php">Cerrar sesion</a>
          </li>
      </ul>
    </nav>
    <label  id="menu">
            <input type="checkbox" />
           <i id="iconomenu"class="fa-sharp fa-solid fa-bars"></i>
           <div id="menuhamb">
               <span> <a href="./retos/alta_reto.php">Añadir Reto </a></span><br><br>
               <span><a href="./retos/consulta_retos.php"> Listar Retos</a></span><br><br>
               <span> <a href="./vistas/formularioalta.php">Añadir Categorias</a></span><br><br>
               <span> <a href="./vistas/consulta.php">Listar Categorias</a></span><br>
               
           </div>
           
       </label>
    <div id="subcontenedor1" class="subcont">
      <h3>Retos</h3>
            <ul class="opc2">
                <li >
                  <p class="span1">
                  <a href="./retos/alta_reto.php">Añadir </a>
                  </p> 
                </li><br>
                <li >
                  <p class="span1">
                    <a href="./retos/consulta_retos.php"> Listar</a>
                  </p>
                 </li><br>
                 <li >
                  <p class="span1">
                    <a href="./vistas/pdf1.php">Generar PDF  </a>

                  </p>
                 </li><br>
            </ul>
            <h3>Categorias</h3>
            <ul class="opc2">
                <li >
                  <p class="span1">
                    <a href="./vistas/formularioalta.php">Añadir</a>
                  </p> 
                </li><br>
                <li >
                  <p class="span1">
                  <a href="./vistas/consulta.php">Listar</a>

                  </p>
                 </li><br>
                 <li >
                  <p class="span1">
                  <a href="./vistas/pdf2.php">Generar PDF </a>


                  </p>
                 </li><br>
            </ul>
        </div>
        <div id="contenedor">
            <div id="subcontenedor2" class="subcont">
                <h1>Bienvenido a la Pagina de WEB-Retos</h1>
            </div>
        </div>


    
</body>
<?php 
    }
  ?>
</html>
<?php
    if(isset($_POST['correo'])){
        $correo=$_POST['correo'];
        $contrasenia=$_POST['contrasenia'];
        require_once('controlador/controladorlog.php');
        $controladorLog=new ControladorLog();
		$controladorLog->iniciarSesion($correo,$contrasenia);	
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <link rel="stylesheet" href="../css/style2.css">

        <title>Iniciar Sesion</title>
    </head>
    <body>
        <div id="contenedor">
            <div id="subcontenedor2" class="subcont">
                <h1 id="from">Iniciar Sesion</h1>
                <form action="./" method="POST" id="sesion">
                    <div >
                        <label >Correo electrónico</label>
                        <input type="text" name="correo" required/>
                    </div>
                    <div >
                        <label >Contraseña</label>
                        <input type="password" name="contrasenia" required/>
                    </div>
                    <div >
                        <button type="submit">Acceder</button>
                    </div>
                </form>
        
            </div>
        </div>
</body>
</html>

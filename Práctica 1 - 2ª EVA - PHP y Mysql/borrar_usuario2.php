<h1>BORRAR USUARIO</h1>
<?php
    $nombre_usuario_borrar = trim($_REQUEST["nombre_usuario_borrar"]);

    $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

    mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");

    $query = "delete from usuario where nombres='$nombre_usuario_borrar';";

    if(mysqli_query ($conexion,$query)){
        echo "Usuario borrado";
    }
    else{
        echo "Usuario no borrado";
    }

    mysqli_close ($conexion);

?>
<br><br><a href="usuarios.html">Volver</a><br>
<a href="index.html">Inicio</a>
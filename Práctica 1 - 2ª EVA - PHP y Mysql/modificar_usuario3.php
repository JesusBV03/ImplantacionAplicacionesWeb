<h1>MODIFICAR USUARIO</h1>
<?php
    $file = fopen("usuario.txt","r");
    $nombre_usuario_solicitado = trim(fgets($file));
    $nombre_usuario_nuevo = trim($_REQUEST["nombre_usuario_nuevo"]);
    $correo_usuario_nuevo = trim($_REQUEST["correo_usuario_nuevo"]);
    $clave_usuario_nuevo = trim($_REQUEST["clave_usuario_nuevo"]);

    $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

    mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");

    $query = "update usuario set nombres='$nombre_usuario_nuevo',correo='$correo_usuario_nuevo',clave='$clave_usuario_nuevo' where nombres='$nombre_usuario_solicitado';";

    if(mysqli_query ($conexion,$query)){
        echo "Usuario actualizado";
    }
    else{
        echo "Usuario no actualizado";
    }

    mysqli_close ($conexion);

?>
<br><br><a href="usuarios.html">Volver</a><br>
<a href="index.html">Inicio</a>
    <h1>AÑADIR USUARIO</h1>
    <?php
        $nombre_usuario = trim($_REQUEST["nombre_usuario"]);
        $correo_usuario = trim($_REQUEST["correo_usuario"]);
        $clave_usuario = trim($_REQUEST["clave_usuario"]);

        $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");

        $query = "insert into usuario(nombres,correo,clave) values('$nombre_usuario','$correo_usuario','$clave_usuario');";

        if(mysqli_query ($conexion,$query)){
            echo "Usuario dado de alta";
        }
        else{
            echo "Usuario no dado de alta";
        }

        mysqli_close ($conexion);

    ?>
<br><br><a href="usuarios.html">Volver</a><br>
<a href="index.html">Inicio</a>
    <h1>BUSCAR USUARIO POR CORREO</h1>
    <?php
        $correo_usuario = trim($_REQUEST["correo_usuario"]);

        $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");

        $query = "select nombres from usuario where correo='$correo_usuario';";

        $consulta = mysqli_query ($conexion,$query) or die ("Error en la consulta");

        $nfilas = mysqli_num_rows ($consulta);

        $resultado = mysqli_fetch_array ($consulta);

        if($nfilas > 0){
            echo "El correo $correo_usuario pertenece al usuario ".$resultado['nombres'];
        }
        else{
            echo "Usuario no encontrado";
        }

        mysqli_close ($conexion);

    ?>
<br><br><a href="usuarios.html">Volver</a><br>
<a href="index.html">Inicio</a>
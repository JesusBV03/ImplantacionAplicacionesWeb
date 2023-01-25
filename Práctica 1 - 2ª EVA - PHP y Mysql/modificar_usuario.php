<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MODIFICAR USUARIO</h1>
    <H2>LISTA DE USUARIOS</H2>
    <?php

        $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");
        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");
        $query = "select * from usuario";
        $consulta = mysqli_query($conexion,$query);
        $nfilas = mysqli_num_rows ($consulta);

        if ($nfilas > 0)
            {
                print ("<TABLE border='2px'>\n");
                print ("<TR>\n");
                print ("<TH>Nombre</TH>\n");
                print ("<TH>Correo</TH>\n");
                print ("<TH>Clave</TH>\n");
                
                print ("</TR>\n");

                for ($i=0; $i<$nfilas; $i++)
                {
                    $resultado = mysqli_fetch_array ($consulta);
                    print ("<TR>\n");
                    print ("<TD>" . $resultado['nombres'] . "</TD>\n");
                    print ("<TD>" . $resultado['correo'] . "</TD>\n");
                    print ("<TD>" . $resultado['clave'] . "</TD>\n");
                    

                    
                    print ("</TR>\n");
                }

                print ("</TABLE>\n");
            }
            else {
                print ("No hay usuarios");
            }
        mysqli_close ($conexion);
    ?>

<br><br>
    <h1>MODIFICAR USUARIO</h1>
    <form action="modificar_usuario2.php" method="post">
        Indica el usuario: <input type="text" name="nombre_usuario_solicitado" id=""><br>
        <input type="submit" value="Continuar">
    </form>
    <br><br><a href="usuarios.html">Volver</a><br>
    <a href="index.html">Inicio</a>

</body>
</html>
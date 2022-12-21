<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: lightblue;
        }

        .imagen{
        width: 300px;
        height: auto;

        }

        td {
            width: 100px;
            text-align: center;
            height: auto;
        }

        table{
        background-color: lightgrey;
        }
        a{
        color: red;
        text-decoration: none;
        }
   </style>
</head>
<body>
    <h1>MODIFICAR USUARIO</h1>
<?php

    $nombre_usuario_solicitado = trim($_REQUEST["nombre_usuario_solicitado"]);
    $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");
    mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");
    $query = "select nombres from usuario where nombres='$nombre_usuario_solicitado';";
    $consulta = mysqli_query ($conexion,$query) or die ("Error en la consulta");
    $nfilas = mysqli_num_rows ($consulta);   
    $resultado = mysqli_fetch_array ($consulta);
    if($nfilas > 0){
        print ("<h3>MODIFICANDO EL USUARIO ".$nombre_usuario_solicitado."</h3>");
        $file = fopen("usuario.txt","w");
        fwrite($file,$nombre_usuario_solicitado);
        fclose($file);
?>
        <form action="modificar_usuario3.php" method="post">
        Nuevo nombre: <input type="text" name="nombre_usuario_nuevo" id=""><br>
        Nuevo correo: <input type="text" name="correo_usuario_nuevo" id=""><br>
        Nueva clave: <input type="text" name="clave_usuario_nuevo" id=""><br>
        <input type="submit" value="Modificar">
    </form>
    
<?php
    }        
        else{
            echo "El usuario no existe";
        }

        mysqli_close ($conexion);
?>
<br><br><a href="usuarios.html">Volver</a><br>
    <a href="index.html">Inicio</a>
</body>
</html>

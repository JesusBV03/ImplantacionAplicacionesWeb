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
    <h1>BORRAR PISO</h1>
<?php
    $clave_piso_solicitado = trim($_REQUEST["clave_piso_solicitado"]);

    $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

    mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");

    $query = "delete from pisos where Codigo_piso='$clave_piso_solicitado';";

    if(mysqli_query ($conexion,$query)){
        echo "Piso borrado";
    }
    else{
        echo "Piso no borrado";
    }

    mysqli_close ($conexion);

?>
<br><br><a href="pisos.html">Volver</a><br>
<a href="index.html">Inicio</a>
</body>
</html>

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
    
    $file = fopen("piso.txt","r");
    $codigo_piso = trim(fgets($file));

    $calle_piso = trim($_REQUEST["calle_piso"]);
    $numero_piso = trim($_REQUEST["numero_piso"]);
    $piso_piso = trim($_REQUEST["piso_piso"]);
    $puerta_piso = trim($_REQUEST["puerta_piso"]);
    $cp_piso = trim($_REQUEST["cp_piso"]);
    $metros_piso = trim($_REQUEST["metros_piso"]);
    $zona_piso = trim($_REQUEST["zona_piso"]);
    $precio_piso = trim($_REQUEST["precio_piso"]);
    $usuario_id = trim($_REQUEST["usuario_id"]);

    $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

    mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");

    $query = "update pisos set Codigo_piso='$codigo_piso',calle='$calle_piso',numero='$numero_piso',piso='$piso_piso',puerta='$puerta_piso',cp='$cp_piso',metros='$metros_piso',zona='$zona_piso',precio='$precio_piso',usuario_id='$usuario_id' where Codigo_piso='$codigo_piso';";

    if(mysqli_query ($conexion,$query)){
        echo "Piso actualizado";
    }
    else{
        echo "Piso no actualizado";
    }

    mysqli_close ($conexion);

?>
<br><br><a href="pisos.html">Volver</a><br>
<a href="index.html">Inicio</a>
</body>
</html>

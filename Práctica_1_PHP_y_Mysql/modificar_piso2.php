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
    <h1>MODIFICAR PISO</h1>
<?php

    $clave_piso_solicitado = trim($_REQUEST["clave_piso_solicitado"]);
    $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");
    mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");
    $query = "select Codigo_piso from pisos where Codigo_piso='$clave_piso_solicitado';";
    $consulta = mysqli_query ($conexion,$query) or die ("Error en la consulta");
    $nfilas = mysqli_num_rows ($consulta);   
    $resultado = mysqli_fetch_array ($consulta);
    if($nfilas > 0){
        print ("<h3>MODIFICANDO EL PISO ".$clave_piso_solicitado."</h3>");
        $file = fopen("piso.txt","w");
        fwrite($file,$clave_piso_solicitado);
        fclose($file);
?>
        <form action="modificar_piso3.php" method="post" enctype="multipart/form-data">
        Calle: <input type="text" name="calle_piso" id=""><br>
        Número: <input type="text" name="numero_piso" id=""><br>
        Piso: <input type="text" name="piso_piso" id=""><br>
        Puerta: <input type="text" name="puerta_piso" id=""><br>
        Código postal: <input type="text" name="cp_piso" id=""><br>
        Metros: <input type="text" name="metros_piso" id=""><br>
        Zona: <input type="text" name="zona_piso" id=""><br>
        Precio: <input type="text" name="precio_piso" id=""><br>
        ID de usuario: <input type="text" name="usuario_id" id=""><br>
        <input type="submit" value="Modificar">
    </form>
    
<?php
    }        
        else{
            echo "El piso no existe";
        }

        mysqli_close ($conexion);
?>
<br><br><a href="pisos.html">Volver</a><br>
    <a href="index.html">Inicio</a>
</body>
</html>

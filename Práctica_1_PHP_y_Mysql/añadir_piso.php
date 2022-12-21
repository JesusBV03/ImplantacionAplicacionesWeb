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
<h1>AÑADIR PISO</h1>
    <?php
        $codigo_piso = trim($_REQUEST["codigo_piso"]);
        $calle_piso = trim($_REQUEST["calle_piso"]);
        $numero_piso = trim($_REQUEST["numero_piso"]);
        $piso_piso = trim($_REQUEST["piso_piso"]);
        $puerta_piso = trim($_REQUEST["puerta_piso"]);
        $cp_piso = trim($_REQUEST["cp_piso"]);
        $metros_piso = trim($_REQUEST["metros_piso"]);
        $zona_piso = trim($_REQUEST["zona_piso"]);
        $precio_piso = trim($_REQUEST["precio_piso"]);
        $imagen = $_FILES["imagen"];
        $usuario_id = trim($_REQUEST["usuario_id"]);

        $copiarFichero = false;

        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            $nombreDirectorio = "C:/AppServ/www/Prácticas/2ª_EVA/Práctica_1_PHP_y_Mysql/img/";
            $nombreFichero = $_FILES['imagen']['name'];
            $copiarFichero = true;
    
            $nombreCompleto = $nombreDirectorio . $nombreFichero;
            if (is_file($nombreCompleto)) {
                $idUnico = time();
                $nombreFichero = $idUnico . "-" . $nombreFichero;
            }
        }
        
        if ($_FILES['imagen']['name'] == ""){
            $nombreFichero = '';
        }
        else{
            $error = $error . "   <li>No se ha podido subir el fichero</li>";
        }
        /* if ($error != "") {
            echo "<P>No se ha podido realizar la inserción debido a los siguientes errores:</P>\n";
            echo "<UL>\n";
            echo $error;
            echo "</UL>\n";
        } */

        if ($copiarFichero){
            move_uploaded_file ($_FILES['imagen']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }





        $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");

        $query = "insert into pisos(Codigo_piso,calle,numero,piso,puerta,cp,metros,zona,precio,imagen,usuario_id) values('$codigo_piso','$calle_piso','$numero_piso','$piso_piso','$puerta_piso','$cp_piso','$metros_piso','$zona_piso','$precio_piso','$nombreFichero','$usuario_id');";

        if(mysqli_query ($conexion,$query)){
            echo "Piso añadido";
        }
        else{
            echo "Piso no añadido";
        }

        mysqli_close ($conexion);

    ?>
<br><br><a href="pisos.html">Volver</a><br>
<a href="index.html">Inicio</a>
</body>
</html>

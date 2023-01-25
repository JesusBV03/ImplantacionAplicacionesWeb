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
        $imagen_piso = $_FILES["imagen"];
        $usuario_id = trim($_REQUEST["usuario_id"]);

        $copiarFichero = false;

        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            $nombreDirectorio = "C:/AppServ/www/Prácticas/2ª EVA/Práctica 1 PHP y Mysql/img/";
            $nombreFichero = $_FILES['imagen']['name'];
            $copiarFichero = true;
    
            $nombreCompleto = $nombreDirectorio . $nombreFichero;
            if (is_file($nombreCompleto)) {
                $idUnico = time();
                $nombreFichero = $idUnico . "-" . $nombreFichero;
            }
        }
        /* else if ($_FILES['imagen_piso']['error'] == UPLOAD_ERR_FORM_SIZE){
            $maxsize = $_REQUEST['MAX_FILE_SIZE'];
            $errores = $errores . "<LI>El tamaño del fichero supera el límite permitido ($maxsize bytes)\n";
            $nombreFichero = '';
        } */
        else if ($_FILES['imagen']['name'] == ""){
            $nombreFichero = '';
        }
        else{
            $error = $error . "   <li>No se ha podido subir el fichero</li>";
        }
        if ($error != "") {
            echo "<P>No se ha podido realizar la inserción debido a los siguientes errores:</P>\n";
            echo "<UL>\n";
            echo $error;
            echo "</UL>\n";
            echo "<br><a href='p_add.php'>Volver Añadir</a>";
        }

        if ($copiarFichero){
            move_uploaded_file ($_FILES['imagen']['tmp_name'], $nombreDirectorio . $nombreFichero);
        }





        $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");

        $query = "insert into pisos(Codigo_piso,calle,numero,piso,puerta,cp,metros,zona,precio,imagen,usuario_id) values('$codigo_piso','$calle_piso','$numero_piso','$piso_piso','$puerta_piso','$cp_piso','$metros_piso','$zona_piso','$precio_piso','$nombreCompleto','$usuario_id');";

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
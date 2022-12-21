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
<h1>BUSCAR PISO POR CÓDIGO</h1>
    <?php
        $codigo_piso = trim($_REQUEST["codigo_piso"]);

        $conexion = mysqli_connect ("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");

        mysqli_select_db ($conexion, "inmobiliaria") or die ("No se puede conectar con la base de datos");

        $query = "select * from pisos where Codigo_piso='$codigo_piso';";

        $consulta = mysqli_query ($conexion,$query) or die ("Error en la consulta");

        $nfilas = mysqli_num_rows ($consulta);

        $resultado = mysqli_fetch_array ($consulta);

        if($nfilas > 0){
            print ("<TABLE border='2px'>\n");
            print ("<TR>\n");
            print ("<TH>Código piso</TH>\n");
            print ("<TH>Calle</TH>\n");
            print ("<TH>Número</TH>\n");
            print ("<TH>Piso</TH>\n");
            print ("<TH>Puerta</TH>\n");
            print ("<TH>Código Postal</TH>\n");
            print ("<TH>Metros</TH>\n");
            print ("<TH>Zona</TH>\n");
            print ("<TH>Precio</TH>\n");
            print ("<TH>Imagen</TH>\n");
            print ("<TH>ID de Usuario</TH>\n");
            print ("</TR>\n");

            print ("<TR>\n");
            print ("<TD>" . $resultado['Codigo_piso'] . "</TD>\n");
            print ("<TD>" . $resultado['calle'] . "</TD>\n");
            print ("<TD>" . $resultado['numero'] . "</TD>\n");
            print ("<TD>" . $resultado['piso'] . "</TD>\n");
            print ("<TD>" . $resultado['puerta'] . "</TD>\n");
            print ("<TD>" . $resultado['cp'] . "</TD>\n");
            print ("<TD>" . $resultado['metros'] . "</TD>\n");
            print ("<TD>" . $resultado['zona'] . "</TD>\n");
            print ("<TD>" . $resultado['precio'] . "</TD>\n");
            print ("<TD><img src='img/" . $resultado['imagen'] . "' class='imagen'></TD>\n");
            print ("<TD>" . $resultado['usuario_id'] . "</TD>\n");
            print ("</TR>");
            print ("</TABLE>");
        }
        else{
            echo "Usuario no encontrado";
        }

        mysqli_close ($conexion);

    ?>
<br><br><a href="pisos.html">Volver</a><br>
<a href="index.html">Inicio</a>
</body>
</html>

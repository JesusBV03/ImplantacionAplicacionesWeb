<h1>LISTAR USUARIOS</h1>
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
            print ("No hay noticias disponibles");
      }
   mysqli_close ($conexion);
    ?>
<br><br><a href="usuarios.html">Volver</a><br>
<a href="index.html">Inicio</a>
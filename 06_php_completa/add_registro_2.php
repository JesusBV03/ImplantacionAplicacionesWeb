
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>

</head>

<body class='body_1'>
<header>
        <div class="header__superior">
            <div class="logo">
                <img src="./design/logo.svg" alt="Logo" id="img_logo">
            </div>
        </div>
        <div class="container__menu">
            
            <div class="menu"> 
                <nav>
                    <ul>
                        <li class="opcion_inicio"><a href="index.php">Inicio</a></li>
                        
                          
                            <?php
                            if(isset($_SESSION['nombre'])){
                              if($_SESSION['tipo_usuario']=='administrador'){
                            ?>
                                <li class="opcion_derecha"><a href="#"><?php echo"$_SESSION[nombre]"?></a>
                                <ul>
                                      <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
                                     
                                  </ul></li>
                                <li class="opcion_derecha"><a href="admin.php">Pisos</a>
                                  <ul>
                                      <li><a href="p_buscar.php">Buscar piso</a></li>
                                      <li><a href="p_listar.php">Listar pisos</a></li>
                                      <li><a href="p_add.php">Añadir piso</a></li>
                                      <li><a href="p_borrar.php">Borrar piso</a></li>
                                      <li><a href="p_modi.php">Modificar piso</a></li>
                                  </ul></li>
                                <li class="opcion_derecha"><a href="admin.php">Usuarios</a>
                                      <ul>
                                          <li><a href="u_buscar.php">Buscar usuario</a></li>
                                          <li><a href="u_listar.php">Listar usuarios</a></li>
                                          <li><a href="u_add.php">Añadir usuario</a></li>
                                          <li><a href="u_borrar.php">Borrar usuario</a></li>
                                          <li><a href="u_modi.php">Modificar usuario</a></li>
                                      </ul></li>
                                <li class="opcion_derecha"><a href="admin.php">Compras Realizadas</a>
                                      <ul>
                                          <li><a href="compras.php">Mostrar Compras</a></li>
                                      </ul></li>
                            <?php
                              }else{
                                if($_SESSION['tipo_usuario']=='Comprador'){
                            ?>
                                  <li class="opcion_derecha"><a href="area_usuario.php"><?php echo"$_SESSION[nombre]"?></a>
                                  <ul>
                                      <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
                                     
                                  </ul></li>
                                  <li class="opcion_derecha"><a href="index.php">Pisos</a>
                                  <ul>
                                      <li><a href="c_buscar.php">Buscar piso</a></li>
                                      <li><a href="c_listar.php">Listar pisos</a></li>
                                  </ul></li>
                            <?php
                                }else{
                            ?>
                                  <li class="opcion_derecha"><a href="area_usuario.php"><?php echo"$_SESSION[nombre]"?></a>
                                  <ul>
                                      <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
                                     
                                  </ul></li>
                                  <li class="opcion_derecha"><a href="index.php">Pisos</a>
                                  <ul>
                                      <li><a href="v_add.php">Añadir piso</a></li>
                                  </ul></li>
                            <?php
                                }
                              }

                            }else{
                            ?>
                              <li class="opcion_derecha"><a href="ini_sesion.php">Iniciar sesión</a></li>
                              <li class="opcion_derecha"><a href="add_registro.php">Registrarse</a></li>
                            <?php
                            }
                            ?>
                            
                            
                    </ul>
              </nav>
            </div>

        </div>

    </header>

    <?php

    $nombre = trim(strip_tags($_REQUEST["nombre"]));
    $mail = trim(strip_tags($_REQUEST["mail"]));
    $clave_encriptada = password_hash($_REQUEST["clave"],PASSWORD_DEFAULT);
    $tipo = trim(strip_tags($_REQUEST["tipo"]));



    /* Conectar con la base de datos */

    $conexion = mysqli_connect("localhost", "root", "rootroot") or die("No se puede conectar a la base de datos");


    /* Selecionamos la base de datos */

    mysqli_select_db($conexion, "inmo") or die("No se puede selecionar la base de datos");

    $query = "select * from usuario where correo='$mail'";

    /* Ejercutar la Query */

    $consulta = mysqli_query($conexion, $query);

    /* Comprobar Usuario y Pass sean correcto */

    $nfilas = mysqli_num_rows($consulta);


    if ($nfilas != 0) {
        echo "<div> El mail introducido ya existe.</div>";
    } else {



        /* query */

        $query_2 = "insert into usuario (nombres,correo,clave,tipo_usuario) values ('$nombre','$mail','$clave_encriptada','$tipo')";

        /* Ejecutamos la query y control de error */

        if (mysqli_query($conexion, $query_2)) {


            echo "<div class='div_1'><img class='logo_2' src='./design/logo.svg' alt='logo'></div>";
            print "<a href='index.php'><button class='margin_2'>Menú Inicio</button></a><br><br><div><span class='add'>Usuario " . $nombre . ", añadido.</span></div> ";
        } else {

            echo "<div class='div_1'><img class='logo_2' src='./design/logo.svg' alt='logo'></div>";
            print "<br><a href='index.php'><button class='margin_2'>Menú Inicio</button></a>";
            echo "<div><span class='add'>Error" . $query . "<br>" . mysqli_error($conexion) . "</span></div>";
        }
    }
    /* Ceramos la conexion */

    mysqli_close($conexion);

    ?>
</body>

</html>
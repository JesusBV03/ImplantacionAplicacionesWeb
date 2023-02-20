<?php
    session_start();
    if($_SESSION["tipo_usuario"] != "administrador"){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Modificar Usuario</title>
</head>

<body class="body_1">
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
    <main>
        <video class='vid_2' src="./videos/video_5.mp4" autoplay="true" muted="true" loop="true">
        </video>

        <?php

        $id = trim(strip_tags($_REQUEST["usuario_id"]));
        $nombre = trim(strip_tags($_REQUEST["nombre"]));


        /* Comprobar que recoge los datos */
        //echo $nombre." ".$correo;

        /* Conectar con la base de datos */

        $conexion = mysqli_connect("localhost", "root", "rootroot", "inmo") or die("No se puede conectar a la base de datos");

        /* query */

        $query = "select * from usuario where usuario_id='$id' or nombres='$nombre'";

        /* Ejecutamos la query y control de error */

        $listar = mysqli_query($conexion, $query);

        /* Si el resultado es mayor a 0 entra */

        if (mysqli_num_rows($listar) > 0) {
            // Muestra los datos de la fila buscada
            $row = mysqli_fetch_assoc($listar);

            echo "<fieldset>";

            echo "<legend>Modificar Usuario</legend>";
            echo "<form action='u_modi_3.php' method='get'>";
            echo    "<table>  
            <tr>
                <td>Usuario ID:</td>
                <td><input type='text'  name='usuario_id' value=" . $row['usuario_id'] . "></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td><input type='text' name='nombre' value=" . $row['nombres'] . "></td>
            </tr>
            <tr>
                <td>Correo:</td>
                <td><input type='text' name='correo' value=" . $row['correo'] . "></td>
            </tr>
            <tr>
                <td>Clave:</td>
                <td><input type='password' name='clave' value=" . $row['clave'] . "></td>
            </tr>  
            <tr>
                <td>Tipo Usuario:</td>
                <td>
                <select name='tipo' id='tipo' value='" . $row['tipo_usuario'] . ">
                <option value='blanco'>-----</option>
                <option>Comprador</option>
                <option>Vendedor</option>
                </select>
            </td>
            </tr>        
           

        </table>";
            echo "<br>";
            echo " <input class='margin' type='submit' value='Enviar'>";
            echo " <input class='margin' type='reset' value='Borrar'>";
            echo "</form>";
            echo "<br>";
            echo "</fieldset>";
        } else {
            
            echo"<br><br><br>";
            echo "<div><span class='add_2'>Error, revise los datos</span></div>";

            
        }

        /* Cerramos la conexion */

        mysqli_close($conexion);
        ?>



    </main>
    <footer>
            <div>
				<p>Agua Do Barrio Inmobiliaria S.L.</p>
				<p>C/ Salesianos Atocha, 1 - 28980 - Madrid</p>
				<p>689 21 22 24 | agua_do_barrio@gmail.com</p>
			</div>
			<div>
					<a href="./PPrivacidad.html">Politica de Privacidad</a><a href='#'>|</a>
                    <a href='./Avisolegal.html'>Aviso legal y de Privacidad</a>
			</div>


    </footer>
</body>

</html>
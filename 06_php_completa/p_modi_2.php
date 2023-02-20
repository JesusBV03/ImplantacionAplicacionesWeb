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
    <title>Modificar Piso</title>

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
    <main>
        <video class='vid_2' src="./videos/video_5.mp4" autoplay="true" muted="true" loop="true">
        </video>


        
            <?php

        $id_piso = trim(strip_tags($_REQUEST["id_piso"]));
        


        /* Comprobar que recoge los datos */
        //echo $nombre." ".$correo;

        /* Conectar con la base de datos */

        $conexion = mysqli_connect("localhost", "root", "rootroot", "inmo") or die("No se puede conectar a la base de datos");

        /* query */

        $query = "select * from pisos where codigo_piso='$id_piso'";

        /* Ejecutamos la query y control de error */

        $listar = mysqli_query($conexion, $query);

        /* Si el resultado es mayor a 0 entra */

        if (mysqli_num_rows($listar) > 0) {
            // Muestra los datos de la fila buscada
            $row = mysqli_fetch_assoc($listar);

            echo "<fieldset>";

            echo "<legend>Modificar Piso</legend>";
            echo "<form action='p_modi_3.php' method='post' enctype='multipart/form-data'>";
            echo    "<table>  
            <tr>
                <td>Id Piso:</td>
                <td><input type='number' name='id_piso' value=" . $row['codigo_piso'] . "></td>
                <td>Id Usario:</td>
                <td><input type='number' name='id_usuario' value=" . $row['usuario_id'] . "></td>
            </tr>
            <tr>
                <td>Calle:</td>
                <td><input type='text' name='calle' value=" . $row['calle'] . "></td>
                <td>Número:</td>
                <td><input type='number' name='numero' value=" . $row['numero'] . "></td>
                
            </tr>
            <tr>
                <td>Piso:</td>
                <td><input type='number' name='piso' value=" . $row['piso'] . "></td>
                <td>Puerta:</td>
                <td><input type='text' name='puerta' value=" . $row['puerta'] . "></td>
                
            </tr>
            <tr>
                <td>Código Postal:</td>
                <td><input type='number' name='cp' value=" . $row['cp'] . "></td>
                <td>Metros:</td>
                <td><input type='number' name='metros' value=" . $row['metros'] . "></td>
                
            </tr>
            <tr>
            <td>Zona:</td>
                <td>
                <select name='zona' id='zona'>
                
                                <option selected hidden>".$row["zona"]."</option>;
                                <option >Norte</option>
                                <option >Sur</option>
                                <option >Este</option>
                                <option >Oeste</option>
                                <option >Noreste</option>
                                <option >Noroeste</option>
                                <option >Sureste</option>
                                <option >Suroeste</option>
                </select>
                <td>Precio:</td>
                <td><input type='number' step='0.01' name='precio' value=" . $row['precio'] . "></td>
                
            </tr>
            <td>Imagen Nueva:</td>
                <td><input type='file' name='imagen'></td>
            <td></td>
                 
            
                
                
            </tr>
           
           

        </table>";
        echo "</fieldset>";
            echo "<br>";
            echo " <input class='margin_2' type='submit' value='Enviar'>";
            echo " <input class='margin_2' type='reset' value='Borrar'>";
            echo "</form>";
            echo "<br>";
           
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
<?php
session_start();
if ($_SESSION["tipo_usuario"] != "administrador") {
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
    <title>Listar Pisos</title>
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
        /* Recogemos Datos */

        $compra=trim(strip_tags($_REQUEST['compra']));
        if ($compra == '1'){
            $resultado = 'Vendidos';
        }
        else{
            $resultado='Disponibles';
        }

        /* Conectar con la base de datos */

        $conexion = mysqli_connect("localhost", "root", "rootroot", "inmo") or die("No se puede conectar a la base de datos");

        /* query */

        $query = "select * from pisos where comprado='$compra'";

        /* Ejecutamos la query y control de error */

        $listar = mysqli_query($conexion, $query);

        /* Mostrar la tabla en pantalla de los usuarios. */
        $nfilas = mysqli_num_rows($listar);
        if ($nfilas >= 1) {
            echo "<fieldset>";
            echo "<legend>Listar Pisos " .$resultado."</legend>";
            echo "<table class='tab_listar'>";
            echo "<tr class='borde'>
                <td class='borde'>Codigo Piso</td>
                <td class='borde'>Calle</td>
                <td class='borde'>Número</td>
                <td class='borde'>Piso</td>
                <td class='borde'>Puerta</td>
                <td class='borde'>C.Postal</td>
                <td class='borde'>Metros</td>
                <td class='borde'>Zona</td>
                <td class='borde'>Precio</td>
                <td class='borde'>Imagen</td>
                <td class='borde'>Usuario ID</td>
                
            </tr>";

            for ($i = 0; $i < $nfilas; $i++) {
                $row = mysqli_fetch_assoc($listar);
                echo "<tr><td class='borde'>" . $row['codigo_piso'] . "</td><td class='borde'>" . $row['calle'] . "</td><td class='borde'>" . $row['numero'] . "</td><td class='borde'>" . $row['piso'] . "</td><td class='borde'>" . $row['puerta'] . "</td><td class='borde'>" . $row['cp'] . "</td><td class='borde'>" . $row['metros'] . "</td><td class='borde'>" . $row['zona'] . "</td><td class='borde'>" . $row['precio'] . "</td>
            <td class='borde' ><img class='lis_imagen'  src='img/" . $row['imagen'] . "'></td>
            <td class='borde'>" . $row['usuario_id'] . "</td></td>
            </tr>";
            }
            echo "</table>";
        } else {
            echo "<span>No hay pisos en la base de datos</span>";
        }
        echo "</fieldset>";
        echo "<a href='compras.php'><input class='margin_2' type='submit' value='Volver'></a>";
       

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
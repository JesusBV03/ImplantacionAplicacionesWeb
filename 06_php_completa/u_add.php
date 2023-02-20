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
    <title>Añadir Usuario</title>

</head>

<body class='body_1'>

<script>
        function verificar() {

            /* NOMBRE */

            var nombre = document.getElementById('nombre').value;
            if (nombre == '') {
                document.getElementById('nombre_alert').innerHTML=' * El Nombre esta vacio.';
				document.getElementById('nombre').focus();
                alert('El campo Nombre esta vacio.');
                return false;
                }

                   
            /* MAIL */

            var mail = document.getElementById('mail').value;
            if (mail == '') {
                document.getElementById('mail_alert').innerHTML=' * El Mail esta vacio.';
				document.getElementById('mail').focus();
                alert('El campo Mail esta sin cumplimentar.')
                return false;
            }

            var mail = true;
            var expresion= /^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i;
            var mail = document.datos.mail.value;
            
            if(!expresion.test(mail)){
                mail = false;
                document.getElementById('mail_alert_2').innerHTML=' * El Mail es incorrecto.';
                document.getElementById('mail').focus();
                alert('El mail no es correcto');
                return false;
            }

            /* CLAVE */

            var clave = document.getElementById('clave').value;
            if (clave == '') {
                alert('El campo  Clave, esta vacio. Introduce una Clave valida.');
                document.getElementById('clave_alert').innerHTML=' * ';
                document.getElementById('clave').focus();
                return false;
            }
            else if (clave.length != 8){            
                alert('La clave debe ser de 8 caracteres alfanumericos.');
                document.getElementById('clave').focus();
                return false;
            }            

             /* SELECCIONAR TIPO USUARIO */

            var tipo = document.getElementById('tipo').value;
            if (tipo == 'blanco') {
                document.getElementById('tipo_alert').innerHTML=' * Selecciona el tipo de Usuario.';
				document.getElementById('tipo').focus();
                alert('Seleccione el Tipo de Usuario que eres.')
                return false;
            }

                       
        }

       
    </script>
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
    

    <fieldset>

    <legend>Añadir Usuario</legend>


        <form name="datos" action="u_add_2.php" method="POST">

            <table>
                <tr>
                    <td>Nombre:</td><td><input type="text" name="nombre" id="nombre" placeholder='Nombre'></td><td class="td_error"><span id="nombre_alert"></span></td>
                </tr> 
                <tr>
                    <td>Mail:</td><td><input type="mail" name="mail" id="mail" placeholder='Email'></td><td class="td_error"><span id="mail_alert"></span><span id="mail_alert_2"></span></td>
                </tr> 
                <tr>
                    <td>Clave:</td><td><input type="password" name="clave" id="clave" placeholder='Clave'></td><td class="td_error"><span id="clave_alert"></span></td>
                </tr> <tr>
                    <td>Tipo Usuario:</td>
                    <td>
                        <select name="tipo" id="tipo">
                            <option value="blanco">-----</option>
                            <option>Comprador</option>
                            <option>Vendedor</option>
                        </select>
                        </td><td class="td_error"><span id="tipo_alert"></span></td>
                </tr> 

            </table>
            </fieldset>
            <input class='margin_2' onclick='return(verificar())' type="submit" value="Enviar">
            <input class='margin_2' type="reset" value="Borrar">
                      
        </form>        
        
   
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
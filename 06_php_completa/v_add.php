<?php
    session_start();
    if($_SESSION["tipo_usuario"] != "Vendedor"){
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
    <title>Añadir Piso</title>

</head>

<body class='body_1'>

    <script>
        function verificar() {

            /* NOMBRE */

            var id_piso = document.getElementById('id_piso').value;
            if (id_piso == '') {
                document.getElementById('id_piso_alert').innerHTML = ' * ';
                document.getElementById('id_piso').focus();
                alert('El campo Código Piso esta vacio.');
                return false;
            }


            /* CALLE */

            var calle = document.getElementById('calle').value;
            if (calle == '') {
                document.getElementById('calle_alert').innerHTML = ' * ';
                document.getElementById('calle').focus();
                alert('El campo Calle esta sin cumplimentar.')
                return false;
            }

            /* PISO */

            var piso = document.getElementById('piso').value;
            if (piso == '') {
                document.getElementById('piso_alert').innerHTML = ' * ';
                document.getElementById('piso').focus();
                alert('El campo Piso esta sin cumplimentar.')
                return false;
            }

            /* CODIGO POSTAL */

             var cp = document.getElementById('cp').value;
            if (cp == '') {
                document.getElementById('cp_alert').innerHTML = ' * ';
                document.getElementById('cp').focus();
                alert('El campo Código Postal esta sin cumplimentar.')
                return false;
            }

            
            /* ZONA */

            var zona = document.getElementById('zona').value;
            if (zona == 'blanco') {
                document.getElementById('zona_alert').innerHTML = ' * ';
                document.getElementById('zona').focus();
                alert('Seleccione una Zona.')
                return false;
            }

            /* NUMERO */

            var numero = document.getElementById('numero').value;
            if (numero == '') {
                document.getElementById('numero_alert').innerHTML = ' * ';
                document.getElementById('numero').focus();
                alert('El campo Número esta sin cumplimentar.')
                return false;
            }

            /* PUERTA */

            var puerta = document.getElementById('puerta').value;
            if (puerta == '') {
                document.getElementById('puerta_alert').innerHTML = ' * ';
                document.getElementById('puerta').focus();
                alert('El campo Puerta esta sin cumplimentar.')
                return false;
            }

            /* METROS */

            var metros = document.getElementById('metros').value;
            if (metros == '') {
                document.getElementById('metros_alert').innerHTML = ' * ';
                document.getElementById('metros').focus();
                alert('El campo Metros esta sin cumplimentar.')
                return false;
            }

            /* PRECIO */

            var pvp = document.getElementById('pvp').value;
            if (pvp == '') {
                document.getElementById('pvp_alert').innerHTML = ' * ';
                document.getElementById('pvp').focus();
                alert('El campo Precio esta sin cumplimentar.')
                return false;
            }
            // /* FILE */

            // var img = document.getElementById('imagen').value;
            // if (img == '') {
            //     document.getElementById('imagen_alert').innerHTML = ' * ';
            //     document.getElementById('imagen').focus();
            //     alert('No hay archivo subido.')
            //     return false;
            // }

            /* PRECIO */

           

            

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

            <legend>Añadir Piso</legend>
                        

            <form name="datos"  action="v_add_2.php" enctype="multipart/form-data" method="POST">

                <table>
                    <tr>
                        <td>C.Piso:</td>
                        <td><input type="number" name="id_piso" id="id_piso" placeholder='Código Piso'></td>
                        <td class="td_error"><span id="id_piso_alert"></span></td>
                        <td>Precio:</td>
                        <td><input type="number" step="0.01" name="pvp" id="pvp" placeholder='Precio'></td>
                        <td class="td_error"><span id="pvp_alert"></span></td>
                        
                    </tr>
                    <tr>
                        <td>Calle:</td>
                        <td><input type="text" name="calle" id="calle" placeholder='Calle'></td>
                        <td class="td_error"><span id="calle_alert"></span><span id="calle_alert_2"></span></td>
                        <td>Número:</td>
                        <td><input type="number" name="numero" id="numero" placeholder='Número'></td>
                        <td class="td_error"><span id="numero_alert"></span></td>
                    </tr>
                    <tr>
                        <td>Piso:</td>
                        <td><input type="number" name="piso" id="piso" placeholder='Piso'></td>
                        <td class="td_error"><span id="piso_alert"></span></td>
                        <td>Puerta:</td>
                        <td><input type="text" name="puerta" id="puerta" placeholder='Puerta'></td>
                        <td class="td_error"><span id="puerta_alert"></span></td>
                    </tr>
                    <tr>
                        <td>C.Postal:</td>
                        <td><input type="number" name="cp" id="cp" placeholder='Código Postal'></td>
                        <td class="td_error"><span id="cp_alert"></span></td>
                        <td>Metros:</td>
                        <td><input type="number" name="metros" id="metros" placeholder='Metros'></td>
                        <td class="td_error"><span id="metros_alert"></span></td>
                    </tr>
                    
                    <tr>
                        <td>Zona:</td>
                        <td><select name="zona" id="zona">
                                <option value="blanco">-----</option>
                                <option>Norte</option>
                                <option>Sur</option>
                                <option>Este</option>
                                <option>Oeste</option>
                                <option>Noreste</option>
                                <option>Noroeste</option>
                                <option>Sureste</option>
                                <option>Suroeste</option>
                                
                            </select>
                        <td class="td_error"><span id="zona_alert"></span></td>
                        
                    </tr>
                    <tr>
                        <td>Imagen:</td>
                        <td><INPUT TYPE="file" NAME="imagen"></td>
                        
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
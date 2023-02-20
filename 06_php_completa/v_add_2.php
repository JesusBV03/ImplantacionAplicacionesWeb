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
    $usuario_id = $_SESSION["usuario_id"];
    $idpiso = trim(strip_tags($_REQUEST["id_piso"]));
    $calle = trim(strip_tags($_REQUEST["calle"]));
    $numero = trim(strip_tags($_REQUEST["numero"]));
    $piso = trim(strip_tags($_REQUEST["piso"]));
    $puerta = trim(strip_tags($_REQUEST["puerta"]));
    $cp = trim(strip_tags($_REQUEST["cp"]));
    $metros = trim(strip_tags($_REQUEST["metros"]));
    $zona = trim(strip_tags($_REQUEST["zona"]));
    $pvp = trim(strip_tags($_REQUEST["pvp"]));
    $imagen = $_FILES["imagen"];
    



    // Subir fichero con la foto de la vivienda

    $copiarFichero = false;

    // Copiar fichero en directorio de ficheros subidos

    // Se renombra para evitar que sobreescriba un fichero existente
    // Para garantizar la unicidad del nombre se añade una marca de tiempo

    if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        $nombreDirectorio = "img/";
        $nombreFichero = $_FILES['imagen']['name'];
        $copiarFichero = true;

        // Si ya existe un fichero con el mismo nombre, renombrarlo

        $nombreCompleto = $nombreDirectorio . $nombreFichero;
        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombreFichero = $idUnico . "-" . $nombreFichero;
        }
    }

    // El fichero introducido supera el límite de tamaño permitido


    //ESTO ERA LO QUE HACÍA QUE EL CODIGO NO FUNCIONARA
    // if ($_FILES['imagen']['error'] == UPLOAD_ERR_FORM_SIZE) {
    //     $maxsize = $_REQUEST['MAX_FILE_SIZE'];
    //     $error = $error . "   <li>El tamaño del fichero supera el límite permitido ($maxsize bytes)</li>\n";
    // }

    // No se ha introducido ningún fichero

    else if ($_FILES['imagen']['name'] == ""){
        $nombreFichero = '';
    }

    // El fichero introducido no se ha podido subir
    
    else{
        $error = $error . "   <li>No se ha podido subir el fichero</li>";
    }
    // Mostrar errores encontrados

    if ($error != "") {
        echo "<P>No se ha podido realizar la inserción debido a los siguientes errores:</P>\n";
        echo "<UL>\n";
        echo $error;
        echo "</UL>\n";
        
    }

    // Mover foto a su ubicación definitiva e introducir el archivo en la base de datos.

    if ($copiarFichero){
        move_uploaded_file ($_FILES['imagen']['tmp_name'], $nombreDirectorio . $nombreFichero);
    }
  



    /* Conectar con la base de datos */

    $conexion = mysqli_connect("localhost", "root", "rootroot","inmo") or die("No se puede conectar a la base de datos");


    /* query */

    $query = "insert into pisos (codigo_piso,calle,numero,piso,puerta,cp,metros,zona,precio,imagen,usuario_id,comprado) values ('$idpiso','$calle','$numero','$piso','$puerta','$cp','$metros','$zona','$pvp','$nombreFichero','$usuario_id',0);";

    /* Ejecutamos la query y control de error */

    echo"<fieldset>

    <legend>Añadir Piso</legend>";
    

    if (mysqli_query($conexion, $query)) {
        echo "<span class='add_2'>Piso $idpiso añadido</span> ";
        
    } else {
        echo "<span class='add_2'>Error</span>";
        
    }
    echo"</fieldset>";
    /* Ceramos la conexion */

    


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
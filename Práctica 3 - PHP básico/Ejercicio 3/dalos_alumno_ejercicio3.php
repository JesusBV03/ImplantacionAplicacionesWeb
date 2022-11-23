<?php

    $nombre=trim(strip_tags($_REQUEST["nombre"]));
    $telf=trim(strip_tags($_REQUEST["telf"]));
    $ense=$_REQUEST["ense"];
    $matriculado=$_REQUEST["matriculado"];
    $menu=$_REQUEST["menu"];
    $nombre_archivo="datos.txt";
    if ($nombre == "" || $telf == ""){
        print "<p>Hay campos vacios vacios, vuelva a revisar los campos.</p>";
        print "<a href='./ejercicio3.html'><button>Volver</button></a>";
    }
    else{

    if ($menu == "pantalla"){
        if ($ense=="secundaria" && $matriculado=="on"){
        print "<p>El alumno $nombre, con teléfono $telf, está matriculado en Secundaria.</p>";
        print "<p><a href='./ejercicio3.html'><button>Volver</button></a></p>";
        }
        
        elseif ($ense=="bachiller" && $matriculado=="on"){
        print "<p>El alumno $nombre, con teléfono $telf, está matriculado en Bachiller.</p>";
        print "<p><a href='./ejercicio3.html'><button>Volver</button></a></p>";
        }
        
        elseif ($ense=="medio" && $matriculado=="on"){
        print "<p>El alumno $nombre, con teléfono $telf, está matriculado en Ciclo Medio.</p>";
        print "<p><a href='./ejercicio3.html'><button>Volver</button></a></p>";
        }

        elseif ($ense=="superior" && $matriculado=="on"){
        print "<p>El alumno $nombre, con teléfono $telf, está matriculado en Ciclo Superior.</p>";
        print "<p><a href='./ejercicio3.html'><button>Volver</button></a></p>";    
        }

    else {
        print "El alumno $nombre, con teléfono $telf, ha seleccionado la enseñanza $ense pero no ha aceptado matricularse.";
        print "<p><a href='./ejercicio3.html'><button>Volver</button></a></p>";
        }   
    }

    if ($menu == "archivo"){
        if ($ense == "secundaria" && $matriculado=="on"){
            $datos=fopen($nombre_archivo,"a");
            $texto="El alumno $nombre, con teléfono $telf, está matriculado en Secundaria.";
            fwrite($datos,$texto.PHP_EOL);
            fclose($datos);
            print "<p><a href='./datos.txt'>Mostrar Datos</a></p>";
            print "<p><a href='./ejercicio3.html'><button>Volver</button></a></p>";
        }

        elseif ($ense == "bachiller" && $matriculado=="on"){
            $datos=fopen($nombre_archivo,"a");
            $texto="El alumno $nombre, con teléfono $telf, está matriculado en Bachiller.";
            fwrite($datos,$texto.PHP_EOL);
            fclose($datos);
            print "<p><a href='./datos.txt'>Mostrar Datos</a></p>";
            print "<p><a href='./ejercicio3.html'><button>Volver</button></a></p>";
        }

        elseif ($ense=="medio" && $matriculado =="on"){
            $datos=fopen($nombre_archivo,"a");
            $texto="El alumno $nombre, con teléfono $telf, está matriculado en Ciclo Medio.";
            fwrite($datos,$texto.PHP_EOL);
            fclose($datos);
            print "<p><a href='./datos.txt'>Mostrar Datos</a></p>";
            print "<p><a href='./ejercicio3.html'><button>Volver</button></a></p>";
        }

        elseif($ense=="superior" && $matriculado =="on"){
            $datos=fopen($nombre_archivo,"a");
            $texto="El alumno $nombre, con teléfono $telf, está matriculado en Ciclo Superior.";
            fwrite($datos,$texto.PHP_EOL);
            fclose($datos);
            print "<p><a href='./datos.txt'>Mostrar Datos</a></p>";
            print "<p><a href='./ejercicio3.html'><button>Volver</button></a></p>";
        }

        elseif(($ense == "secundaria" || $ense == "bachiller" || $ense == "medio" || $ense == "superior") && $matriculado!=="on" ) {
            $datos=fopen($nombre_archivo,"a");
            $texto="El alumno $nombre, con teléfono $telf, ha seleccionado $ense pero no ha aceptado matricularse.";
            fwrite($datos,$texto.PHP_EOL);
            fclose($datos);
            print "<p><a href='./datos.txt'>Mostrar Datos</a></p>";
            print "<p><a href='./ejercicio3.html'><button>Volver</button></a></p>";
        }
        
    }

    }

?>
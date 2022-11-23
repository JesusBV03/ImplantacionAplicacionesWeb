<?php

    $nombre = trim(strip_tags($_REQUEST["nombre"]));
    $trabajo = trim(strip_tags($_REQUEST["trabajo"]));
    $telf = trim(strip_tags($_REQUEST["telefono"]));
    $dir = trim(strip_tags($_REQUEST["direccion"]));
    $otras = trim(strip_tags($_REQUEST["otras"]));
    $nombre_archivo = "contactos.txt";

    if ($nombre == "") {
        print "El campo nombre esta vacio, es obligatorio";
        print "<br><br>";
        print "<a href='crear_contacto_ejercicio4.html'><button>Volver</button></a>";
    }

    elseif ($trabajo == "") {
        print "El campo trabajo esta vacio, es obligatorio";
        print "<br><br>";
        print "<a href='crear_contacto_ejercicio4.html'><button>Volver</button></a>";
    }

    elseif ($telf == "") {
        print "El campo teléfono esta vacio, es obligatorio";
        print "<br><br>";
        print "<a href='crear_contacto_ejercicio4.html'><button>Volver</button></a>";
    }

    elseif ($dir == "") {
        print "El campo Dirección esta vacio, es obligatorio";
        print "<br><br>";
        print "<a href='crear_contacto_ejercicio4.html'><button>Volver</button></a>";
    }
    
    elseif ($otras == "") {
        print "El campo Otras esta vacio, es obligatorio";
        print "<br><br>";
        print "<a href='crear_contacto_ejercicio4.html'><button>Volver</button></a>";
    }
 

else {
    $contactos = fopen($nombre_archivo, "a");
    fwrite($contactos, "$nombre:$trabajo:$telf:$dir:$otras" . PHP_EOL);
    fclose($contactos);
    print "Guardado con exito <br>";
    print "<a href='agenda_contactos_ejercicio4.html'><button>Volver</button></a>";

}

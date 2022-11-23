<?php

$buscar_nom=trim(strip_tags($_REQUEST["nombre"]));
$nombre_archivo="contactos.txt";
$contactos=fopen($nombre_archivo,"r");


    while (($linea=fgets($contactos)) !== false){
        $array=explode(":",$linea);
        $nombre=$array[0];

        if($buscar_nom == $nombre){
            print "Contacto: $nombre<br>";
            print "Trabajo: $array[1]<br>";
            print "Teléfono: $array[2]<br>";
            print "Dirección: $array[3]<br>";
            print "Otras: $array[4]<br>";
            
        }
    }
    
    if ($buscar_nom ==""){
            print "El campo nombre esta vacio , introduzca el nombre para buscar en la agenda";
            print "<br><br>";
            print "<a href='buscar_contacto_ejercicio4.html'> <button>Volver</button></a>";
    }

    elseif ($buscar_nom !== $nombre){
        print "El nombre no es correcto, introduzca el nombre para buscar en la agenda";
        print "<br><br>";
        print "<a href='buscar_contacto_ejercicio4.html'> <button>Volver</button></a>";
    }

    fclose($conctactos);




?>
<?php

$ancho = $_REQUEST["ancho"];
$alto = $_REQUEST["alto"];

if ($ancho < 0 || $ancho >100){
    print "*El ancho no esta entre el rango 0 y 100.<br> Valor introducido es: $ancho<br>\n";
    print "<a href='ejercicio1.html'><button>Volver</button></a>";
    print "<br><br>";
}
if ($alto < 0 || $alto >100){
    print "*El alto no esta entre el rango 0 y 100.<br> Valor introducido es: $alto<br>\n";
    print "<a href='ejercicio1.html'><button>Volver</button></a>";
}
else{

for ($a=0; $a < $alto; $a++){
    print "*";
    for($b=1; $b < $ancho; $b++){
    print "*";
    }
print "<br>";  
}  
print "<a href='ejercicio1.html'><button>Volver</button></a>";
}

?>
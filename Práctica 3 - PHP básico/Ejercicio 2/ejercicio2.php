<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <style>
        
        img{
            padding: 5px;
            background-color: black;
        }

    </style>
</head>
<body>

<?php

print "<p font-size='25px'>Ejercico 2: Uso de Números Aleatorios y vectores en php</p>\n";

print "<p><b>Jugador 1 </b></p>\n";

$contador1=0;
$contador2=0;

for ($i=0;$i<5;$i++){
    $dado1=rand(1,6);
    print "<img src = './img/$dado1.jpg'  height='50px'>\n";
    $contador1=$contador1+$dado1;
}

print "<p><b>Judador 2</b></p>\n";

for ($i=0;$i<5;$i++){
    $dado2=rand(1,6);
    print "<img src='./img/$dado2.jpg' height='50px'>\n";
    $contador2=$contador2+$dado2;
}


print "<p>El resultado es:</p>\n";
print "<p><b>Jugador 1</b> a obtenido <b>$contador1</b> </p>\n";
print "<p><b>Jugador 2</b> a obtenido <b>$contador2</b> </p>\n";

if ($contador1 > $contador2){
    print "<p>El ganador es <b>JUGADOR 1</b> con <b> $contador1</b> puntos.</p>\n";
}
elseif ($contador1 < $contador2){
    print "<p>El ganador es <b>JUGADOR 2</b> con <b>$contador2</b> puntos.</p>\n";
}
else{
    print "<p>El <b>Jugador 1 y el Jugador 2</b> han sacado el mismo resultado, siento este <b>$contador1</b></p>\n";
}


?>




</body>
</html>


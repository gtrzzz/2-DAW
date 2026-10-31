<?php

echo 'Escribe un script PHP que permita ordenar el siguiente array asociativo: <br/>
array("Antonio"=>"31", "María"=>"28", "Juan"=>"29", "Pepe"=>"27") <br/>
- De forma ascendente ordenado por valor. <br/>
- De forma ascendente ordenado por clave. <br/>
- De forma descendente ordenado por valor. <br/>
- De forma descendente ordenado por clave. <br/>';

$arrayEdades = array("Antonio" => "31", "María" => "28", "Juan" => "29", "Pepe" => "27");

asort($arrayEdades);
echo "<br/>Ascendente por valor: <br/>";
foreach ($arrayEdades as $nombre => $edad) {
    echo $nombre . " => " . $edad . "<br/>";
}

ksort($arrayEdades);
echo "<br/>Ascendente por clave: <br/>";
foreach ($arrayEdades as $nombre => $edad) {
    echo $nombre . " => " . $edad . "<br/>";
}

arsort($arrayEdades);
echo "<br/>Descendente por valor: <br/>";
foreach ($arrayEdades as $nombre => $edad) {
    echo $nombre . " => " . $edad . "<br/>";
}

krsort($arrayEdades);
echo "<br/>Descendente por clave: <br/>";
foreach ($arrayEdades as $nombre => $edad) {
    echo $nombre . " => " . $edad . "<br/>";
}

?>

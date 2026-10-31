<?php

echo 'Escribe un script PHP que muestre el siguiente array asociativo ordenado por la clave.
El resultado deberá seguir el patrón: "La capital de ITALIA es ROMA". <br/>
Ten en cuenta que tendrá que utilizar una función para convertir las claves y los valores del array en mayúscula. <br/>';

$arrayCapitales = array("Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels",
"Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris",
"Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" =>
"Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon",
"Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London",
"Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague",
"Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta",
"Austria" => "Vienna", "Poland"=>"Warsaw");

ksort($arrayCapitales);

echo "<br/>";
foreach ($arrayCapitales as $pais => $capital) {
    echo "La capital de " . strtoupper($pais) . " es " . strtoupper($capital) . "<br/>";
}

?>

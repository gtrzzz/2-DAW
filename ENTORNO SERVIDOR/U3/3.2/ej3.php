<?php

$arrayPaises = array(5);


echo '1. Crea un array que contenga como clave los nombres de 5 países y como valor otro array con 3 ciudades que pertenezcan a ese país. <br> 2. Recorre dicho array multidimensional y muestra cada país con sus respectivas ciudades. <br/>';

$arrayPaises = array(
    "España" => array("Madrid", "Cádiz", "Málaga"),
    "Francia" => array("París", "Lyon", "Marsella"),
    "Alemania" => array("Berlín", "Hamburgo", "Múnich"),
    "Italia" => array("Roma", "Milán", "Nápoles"),
    "Portugal" => array("Lisboa", "Oporto", "Vigo")
);

foreach ($arrayPaises as $pais => $ciudades) {
    echo "<br/>" . $pais . ": <br/>";
    foreach ($ciudades as $ciudad) {
        echo "- " . $ciudad . "<br/>";
    }
};

?>
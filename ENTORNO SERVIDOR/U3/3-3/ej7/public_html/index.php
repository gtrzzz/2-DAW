<?php

// Se incluye la librería de funciones, que está fuera de la carpeta pública
require_once __DIR__ . "/../resources/library/funciones.php";

echo 'Escribe un script PHP que realice las siguientes acciones: <br/>
1) Inicializar un array (nombre $array) de 10 elementos, con valores aleatorios entre 1 y 30. <br/>
2) Una vez que ha inicializado el array, imprima todos los valores que almacena. <br/>
3) Calcular el valor medio de los valores del array. <br/>
4) Mostrar el valor medio que ha calculado. <br/>
5) Mostrar los 3 valores máximos del array <br/>
6) Mostrar los 3 valores mínimos del array <br/><br/>';

$array = inicializar_array(10, 1, 30);
imprimir_array($array);

$media = calcular_media($array);
echo "<br/>El valor medio es: " . $media . "<br/>";

echo "<br/>Los 3 valores máximos son: <br/>";
mostrar_array(calcular_maximos($array, 3));

echo "<br/>Los 3 valores mínimos son: <br/>";
mostrar_array(calcular_minimos($array, 3));

?>

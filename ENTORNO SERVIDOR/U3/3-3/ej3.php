<?php

echo 'Escribe una función llamada calcular_media que reciba un array como parámetro de entrada y que devuelva la media de todos los valores que contiene. <br/>';

/**
 * Calcula la media de los valores de un array.
 *
 * @param array $array Array de números
 * @return float Media de los valores
 */
function calcular_media($array){
  return array_sum($array) / count($array);
}

$arrayEj = array(4, 8, 15, 16, 23);

echo "<br/>La media es: " . calcular_media($arrayEj) . "<br/>";

?>

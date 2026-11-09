<?php

echo 'Escribe una función llamada calcular_maximo que reciba un array como parámetro de entrada y que devuelva cuál es el máximo valor del array. <br/>';

/**
 * Busca el valor máximo de un array.
 *
 * @param array $array Array de números
 * @return int|float Valor máximo del array
 */
function calcular_maximo($array){
  return max($array);
}

$arrayEj = array(4, 8, 15, 16, 23);

echo "<br/>El valor máximo es: " . calcular_maximo($arrayEj) . "<br/>";

?>

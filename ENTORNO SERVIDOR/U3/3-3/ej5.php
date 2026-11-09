<?php

echo 'Escribe una función llamada calcular_minimo que reciba un array como parámetro de entrada y que devuelva cuál es el mínimo valor del array. <br/>';

/**
 * Busca el valor mínimo de un array.
 *
 * @param array $array Array de números
 * @return int|float Valor mínimo del array
 */
function calcular_minimo($array){
  return min($array);
}

$arrayEj = array(4, 8, 15, 16, 23);

echo "<br/>El valor mínimo es: " . calcular_minimo($arrayEj) . "<br/>";

?>

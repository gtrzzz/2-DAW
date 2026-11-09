<?php

/**
 * Suma cinco números enteros y muestra el resultado por pantalla.
 *
 * @param int $n1, $n2, $n3, $n4, $n5 Números que se van a sumar
 * @return void No devuelve nada
 */
function sumar_cinco($n1, $n2, $n3, $n4, $n5){
  echo "<br/>La suma es: " . ($n1 + $n2 + $n3 + $n4 + $n5) . "<br/>";
}

/**
 * Divide los dos primeros números de los cinco recibidos.
 *
 * @param int $n1, $n2, $n3, $n4, $n5 Números aleatorios entre 0 y 9
 * @return float Resultado de dividir $n1 entre $n2
 * @throws Exception Si el divisor ($n2) es 0
 */
function dividir_numeros($n1, $n2, $n3, $n4, $n5){
  if ($n2 == 0){
    throw new Exception("No se puede dividir entre 0");
  }
  return $n1 / $n2;
}

/**
 * Calcula el volumen de un cilindro.
 *
 * @param float $radio Radio de la base
 * @param float $altura Altura del cilindro
 * @return float Volumen del cilindro
 */
function calcular_volumen_cilindro($radio, $altura){
  $numeroPi = 3.1416;
  return $numeroPi * $radio * $radio * $altura;
}

/**
 * Crea un array de números enteros aleatorios.
 *
 * @param int $numero_de_elementos Cantidad de elementos del array
 * @param int $min Valor mínimo que puede salir
 * @param int $max Valor máximo que puede salir
 * @return array Array con los números generados
 */
function inicializar_array($numero_de_elementos, $min, $max){
  $array = array();
  for ($i = 0; $i < $numero_de_elementos; $i++){
    $array[$i] = rand($min, $max);
  }
  return $array;
}

/**
 * Muestra por pantalla los valores de un array, uno por línea.
 *
 * @param array $array Array que se va a mostrar
 * @return void No devuelve nada
 */
function mostrar_array($array){
  foreach ($array as $valor) {
    echo $valor . "<br/>";
  }
}

/**
 * Calcula la media de los valores de un array.
 *
 * @param array $array Array de números
 * @return float Media de los valores
 */
function calcular_media($array){
  return array_sum($array) / count($array);
}

/**
 * Busca el valor máximo de un array.
 *
 * @param array $array Array de números
 * @return int|float Valor máximo del array
 */
function calcular_maximo($array){
  return max($array);
}

/**
 * Busca el valor mínimo de un array.
 *
 * @param array $array Array de números
 * @return int|float Valor mínimo del array
 */
function calcular_minimo($array){
  return min($array);
}

/**
 * Muestra un array en una tabla con su posición y su valor.
 *
 * @param array $array Array que se va a mostrar
 * @return void No devuelve nada
 */
function imprimir_array($array){
  echo "<table border='1'>";
  echo "<tr><th>Posición</th><th>Valor</th></tr>";
  foreach ($array as $posicion => $valor) {
    echo "<tr><td>" . $posicion . "</td><td>" . $valor . "</td></tr>";
  }
  echo "</table>";
}

/**
 * Obtiene los valores más altos de un array.
 *
 * @param array $array Array de números (no se modifica, se recibe una copia)
 * @param int $cantidad Cuántos valores se quieren obtener
 * @return array Los valores más altos, de mayor a menor
 */
function calcular_maximos($array, $cantidad){
  rsort($array);
  return array_slice($array, 0, $cantidad);
}

/**
 * Obtiene los valores más bajos de un array.
 *
 * @param array $array Array de números (no se modifica, se recibe una copia)
 * @param int $cantidad Cuántos valores se quieren obtener
 * @return array Los valores más bajos, de menor a mayor
 */
function calcular_minimos($array, $cantidad){
  sort($array);
  return array_slice($array, 0, $cantidad);
}

?>

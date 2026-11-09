<?php

echo '1) Escribe una función llamada inicializar_array que reciba tres parámetros llamados "numero_de_elementos", "min" y "max",
y que devuelva un array de números enteros comprendidos entre los valores min y max. <br/>
2) Utilizando otra función, muestra el array que se ha generado. <br/>';

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

echo "<br/>Array generado: <br/>";
mostrar_array(inicializar_array(10, 1, 30));

?>

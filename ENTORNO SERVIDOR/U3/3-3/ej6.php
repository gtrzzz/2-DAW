<?php

echo 'Escribe una función llamada imprimir_array que reciba un array como parámetro de entrada y muestre su contenido en una tabla con dos columnas.
La primera columna mostrará la posición del array y la segunda el valor que hay en esa posición. <br/><br/>';

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

$arrayEj = array(4, 8, 15, 16, 23);

imprimir_array($arrayEj);

?>

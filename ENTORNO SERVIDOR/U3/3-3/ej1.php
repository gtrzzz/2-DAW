<?php

echo 'Crear las siguientes funciones en PHP y código para comprobar su funcionamiento: <br/>
a) Una función que reciba cinco números enteros como parámetros y muestre por pantalla el resultado de sumar los cinco números. <br/>
b) Una función que reciba cinco números enteros aleatorios (entre 0 y 9) como parámetros y devuelva el resultado de dividir dos números de esos 5.
Asigna el resultado a una variable de nombre $tmp y muestra su valor. <br/>
c) Una función que reciba el radio de la base y la altura de un cilindro y devuelva el volumen del cilindro. <br/>';

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
  // Se comprueba el divisor antes de dividir para lanzar nuestra propia excepción
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

sumar_cinco(1, 2, 3, 4, 5);

// Como los números son aleatorios, la llamada va dentro de un try por si el divisor sale 0
try {
  $tmp = dividir_numeros(rand(0,9), rand(0,9), rand(0,9), rand(0,9), rand(0,9));
  echo "<br/>El resultado de la división es: " . $tmp . "<br/>";
} catch (Exception $e) {
  echo "<br/>Error: " . $e->getMessage() . "<br/>";
}

echo "<br/>El volumen del cilindro es: " . calcular_volumen_cilindro(2, 5) . "<br/>";

?>

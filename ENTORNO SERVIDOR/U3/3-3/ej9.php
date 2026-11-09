<?php

/**
 * Suma dos números.
 *
 * @param mixed $num1 Primer sumando
 * @param mixed $num2 Segundo sumando
 * @return int|float Resultado de la suma
 * @throws Exception Si alguno de los valores no es numérico
 */
function sumar($num1, $num2){
  if (!is_numeric($num1) || !is_numeric($num2)){
    throw new Exception("Los valores a sumar tienen que ser numéricos");
  }
  return $num1 + $num2;
}

/**
 * Divide dos números.
 *
 * @param mixed $dividendo Número que se divide
 * @param mixed $divisor Número entre el que se divide
 * @return int|float Resultado de la división
 * @throws Exception Si algún valor no es numérico o el divisor es 0
 */
function dividir($dividendo, $divisor){
  // is_numeric va primero: si el divisor no es un número ya no se compara con 0
  if (!is_numeric($dividendo) || !is_numeric($divisor) || $divisor == 0){
    throw new Exception("Los valores para la división deben ser numéricos y el divisor no puede ser cero");
  }
  return $dividendo / $divisor;
}

/**
 * Calcula el área de un triángulo.
 *
 * @param mixed $base Base del triángulo
 * @param mixed $altura Altura del triángulo
 * @return int|float Área del triángulo
 * @throws Exception Si algún valor no es numérico o no es positivo
 */
function calcularAreaTriangulo($base, $altura){
  if (!is_numeric($base) || !is_numeric($altura) || $base <= 0 || $altura <= 0){
    throw new Exception("Los valores para el área deben ser numéricos y positivos");
  }
  return $base * $altura / 2;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Operaciones Matemáticas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center">Operaciones Matemáticas</h1>

    <p>Apartado A: función sumar. Apartado B: funciones dividir y calcularAreaTriangulo. Todas comprueban sus parámetros y lanzan una excepción si no son correctos.</p>

    <h2>Parámetros correctos</h2>
<?php

try {
  echo "<p>Resultado de la suma: " . sumar(15, 5) . "</p>";
} catch (Exception $e) {
  echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
}

try {
  echo "<p>Resultado de la división: " . dividir(20, 4) . "</p>";
} catch (Exception $e) {
  echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
}

try {
  echo "<p>Área del triángulo: " . calcularAreaTriangulo(10, 5) . "</p>";
} catch (Exception $e) {
  echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
}

?>

    <h2>Parámetros incorrectos</h2>
<?php

try {
  echo "<p>Resultado de la suma: " . sumar("hola", 5) . "</p>";
} catch (Exception $e) {
  echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
}

try {
  echo "<p>Resultado de la división: " . dividir(20, 0) . "</p>";
} catch (Exception $e) {
  echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
}

try {
  echo "<p>Área del triángulo: " . calcularAreaTriangulo(-10, 5) . "</p>";
} catch (Exception $e) {
  echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
}

?>
</div>
</body>
</html>

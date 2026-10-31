<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio</title>
</head>
<body>
  <h1>Ejercicio</h1>
  <p>Escribe un script PHP que realice las siguientes acciones: 
 Inicializar un array de 10 elementos, con valores aleatorios entre 1 
y 30. 
 Una vez que ha inicializado el array, imprimir todos los valores que 
almacena.</p>

<?php
$array = array([10]);
for ($i = 0; $i < 10; $i++) {
    $array[$i] = rand(1, 30);

    echo "Valor en la posición $i: " . $array[$i] . "<br>";
    }


?>
  
</body>
</html>
<?php

echo 'Escribe un programa en PHP que realice lo siguiente: <br/>
- Crea un array llamado $numeros que contenga 10 números enteros aleatorios generados en el rango de 1 a 100. <br/>
- Muestra ese array por pantalla <br/>
- Calcula la suma de los números pares en el array $numeros. <br/>
- Calcula la suma de los números impares en el array $numeros. <br/>
- Muestra en pantalla el resultado, es decir, la suma de los números pares e impares en formato tabla. <br/>';

$numeros = array();
$sumaPares = 0;
$sumaImpares = 0;

for ($i = 0; $i < 10; $i++){
  $numeros[$i] = rand(1,100);
}

echo "<br/>Números generados aleatoriamente: ";
for ($j = 0; $j < count($numeros); $j++){
  echo $numeros[$j];
  if ($j < count($numeros) - 1){
    echo ", ";
  }
}

for ($k = 0; $k < count($numeros); $k++){
  if ($numeros[$k] % 2 == 0){
    $sumaPares += $numeros[$k];
  } else {
    $sumaImpares += $numeros[$k];
  }
}

echo "<br/><br/>";
echo "<table border='1'>";
echo "<tr><th>Tipo</th><th>Suma</th></tr>";
echo "<tr><td>Pares</td><td>" . $sumaPares . "</td></tr>";
echo "<tr><td>Impares</td><td>" . $sumaImpares . "</td></tr>";
echo "</table>";

?>

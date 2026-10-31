<?php

echo 'Escribe un script PHP que realice las siguientes acciones: <br/>
1) Inicializar un array de 50 elementos, con valores aleatorios entre 1 y 10. <br/>
2) Muestra el array <br/>
3) Sustituye todos los valores del array menores que 5, por la cadena "suspenso". <br/>
4) Muestra de nuevo el array <br/>';

$arrayNotas = array();

for ($i = 0; $i < 50; $i++){
  $arrayNotas[$i] = rand(1,10);
}

echo "<br/>Array original: <br/>";
for ($j = 0; $j < count($arrayNotas); $j++){
  echo $arrayNotas[$j] . " ";
}

for ($k = 0; $k < count($arrayNotas); $k++){
  if ($arrayNotas[$k] < 5){
    $arrayNotas[$k] = "suspenso";
  }
}

echo "<br/><br/>Array con los suspensos sustituidos: <br/>";
for ($l = 0; $l < count($arrayNotas); $l++){
  echo $arrayNotas[$l] . " ";
}

?>

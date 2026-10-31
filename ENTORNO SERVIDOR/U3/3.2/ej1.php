<?php
  echo "Inicializar un array de 10 elementos, con valores aleatorios entre 1 y 30.
  Una vez que ha inicializado el array, imprimir todos los valores que almacena. ";


  $arrayEj = array(10);

  for ($i = 0; $i < 10; $i++){
    $arrayEj[$i] = rand(1,30);
  }

  for ($j = 0; $j < count($arrayEj); $j++){
    echo $arrayEj[$j] . "<br>";
  }

?>
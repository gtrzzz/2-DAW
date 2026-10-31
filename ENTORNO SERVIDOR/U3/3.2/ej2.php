<?php

$media = 0;
$arrayEj = array(10);
$arrayCopiado = array(10);


echo 'Escribe un script PHP que realice las siguientes acciones: <br/>
1) Inicializar un array (nombre $array) de 10 elementos, con valores
aleatorios entre 1 y 30. <br/>
2) Una vez que ha inicializado el array, imprima todos los valores que
almacena. <br/>
3) Calcular el valor medio de los valores del array. <br/>
4) Mostrar el valor medio que ha calculado. <br/>
5) Mostrar los 3 valores máximos del array <br/>
6) Mostrar los 3 valores mínimos del array <br/>
7) Copiar el array (en $arrayCopiado) y utilizar una función que ordene
el nuevo array creado. Muestra el resultado. <br/>
8) Elimina el segundo elemento del nuevo array ($arrayCopiado), ya
ordenado. Muestra el nuevo contenido <br/><br/>';


for ($i = 0; $i < 10; $i++){
  $arrayEj[$i] = rand(1,30);
  $media += $arrayEj[$i];
}
$media /= count($arrayEj);
for ($j = 0; $j < count($arrayEj); $j++){
  echo $arrayEj[$j] . "<br>";
}
echo "<br/>El valor medio es: " . $media . "<br/>";

for ($k = 0; $k < 3; $k++){
  rsort($arrayEj);
  echo "<br/>Valor máximo " . ($k + 1) . ": " . $arrayEj[$k] . "<br>";
}

for ($l = 0; $l < 3; $l++){
  sort($arrayEj);
  echo "<br/>Valor mínimo " . ($l + 1) . ": " . $arrayEj[$l] . "<br>";
}

for ($m = 0; $m < count($arrayEj); $m++){
  $arrayCopiado[$m] = $arrayEj[$m];
}
sort($arrayCopiado);
echo "<br/>Array copiado y ordenado: <br/>";
for ($n = 0; $n < count($arrayCopiado); $n++){
  echo $arrayCopiado[$n] . "<br>";
}
unset($arrayCopiado[1]);
echo "<br/>Array copiado y ordenado, con el segundo elemento eliminado: <br/>";
for ($o = 0; $o < count($arrayCopiado); $o++){
  if (isset($arrayCopiado[$o])){
    echo $arrayCopiado[$o] . "<br>";
  }
}


?>
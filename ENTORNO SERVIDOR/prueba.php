<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aprender PHP</title>
</head>
<body>

<?php 
$nombre= 'Iván Gutiérrez';
$edad= 19;
$curso= '2º DAW';
?>

<header>
    <h1>Información del alumno: </h1>
    <p>Nombre: <?= $nombre ?>, edad: <?= $edad ?>, curso: <?= $curso ?></p>

</header>
  
</body>
</html>
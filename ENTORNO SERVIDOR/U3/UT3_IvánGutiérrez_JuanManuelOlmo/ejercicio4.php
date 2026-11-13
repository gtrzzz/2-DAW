<?php
# Conductor: Iván, navegante: Juan Manuel

$nombre = "";
$nota1 = "";
$nota2 = "";
$errores = [];
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Recuperamos los campos con filter_input (sin tocar $_POST)
  $nombre = trim(filter_input(INPUT_POST, "nombre") ?? "");
  $nota1  = trim(filter_input(INPUT_POST, "nota1") ?? "");
  $nota2  = trim(filter_input(INPUT_POST, "nota2") ?? "");

  // Campos vacíos
  if ($nombre === "") {
    $errores[] = "El nombre no puede estar vacío.";
  }
  if ($nota1 === "") {
    $errores[] = "La nota 1 no puede estar vacía.";
  }
  if ($nota2 === "") {
    $errores[] = "La nota 2 no puede estar vacía.";
  }

  // Notas numéricas entre 0 y 10 (se admite coma decimal)
  $n1 = str_replace(",", ".", $nota1);
  $n2 = str_replace(",", ".", $nota2);

  if ($nota1 !== "" && (!is_numeric($n1) || $n1 < 0 || $n1 > 10)) {
    $errores[] = "La nota 1 debe ser un número entre 0 y 10.";
  }
  if ($nota2 !== "" && (!is_numeric($n2) || $n2 < 0 || $n2 > 10)) {
    $errores[] = "La nota 2 debe ser un número entre 0 y 10.";
  }

  // Si todo es correcto, calculamos la media y la calificación
  if (empty($errores)) {
    $media = ($n1 + $n2) / 2;

    if ($media < 5) {
      $calificacion = "Suspenso";
    } elseif ($media < 7) {
      $calificacion = "Aprobado";
    } elseif ($media < 9) {
      $calificacion = "Notable";
    } else {
      $calificacion = "Sobresaliente";
    }

    $resultado = "Alumno: " . htmlspecialchars($nombre) . "<br>"
               . "Nota media: " . number_format($media, 2, ",", "") . "<br>"
               . "Calificación: " . $calificacion;
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cálculo de nota media</title>
</head>
<body>

  <?php if (!empty($errores)): ?>
    <div style="color: red;">
      <?php foreach ($errores as $error): ?>
        <p><?= $error ?></p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if ($resultado !== ""): ?>
    <p><?= $resultado ?></p>
  <?php endif; ?>

  <h1>Cálculo de nota media</h1>

  <form method="POST" action="">
    <p>
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
    </p>
    <p>
      <label for="nota1">Nota 1:</label>
      <input type="text" id="nota1" name="nota1" value="<?= htmlspecialchars($nota1) ?>">
    </p>
    <p>
      <label for="nota2">Nota 2:</label>
      <input type="text" id="nota2" name="nota2" value="<?= htmlspecialchars($nota2) ?>">
    </p>
    <p>
      <input type="submit" value="Calcular">
    </p>
  </form>

</body>
</html>
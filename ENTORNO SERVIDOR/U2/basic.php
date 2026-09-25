<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Metadatos básicos requeridos para la validación W3C -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicios de PHP - Entorno Servidor</title>

  <!-- CSS de Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Contenido principal de la página -->
  <main class="container my-5">
    
    <header class="mb-4 text-center">
      <h1 class="display-5">Desarrollo Web en Entorno Servidor</h1>
      <p class="text-muted">Estructura básica HTML5 con PHP y Bootstrap</p>
    </header>

    <!--
    Ejercicio 1: Mostrar número generado aleatoriamente con tamaño aleatorio
    Ejercicio 2: Escribe un programa que cada vez que se ejecute muestre un emoticono
    elegido al azar entre los caracteres Unicode 128512 y 128586 
    Ejercicio 3: Escribe un programa en PHP que cuente el número de veces que se repite la letra “t” minúscula, dentro de la frase: “This is a test”.
    ¿Qué tendríamos que añadir si quisiéramos que contara TODAS las letras “t” de la frase anterior?
    Pista: Utilizad para ello la función propia de PHP:
     substr_count($texto, $subcadena) 
    -->

    <!-- hay que hacer tabs para cada ejercicio -->
     <ul class="tabs">
      <li><a href="basic.php">Ejercicio 1</a></li>
     </ul>

    <div class="card shadow-sm">
      <div class="card-body">
        <?php
          // Código PHP del ejercicio
          $mensaje = "¡Hola Mundo! Tu servidor PHP está funcionando correctamente.";
          $fechaActual = date("d/m/Y H:i");

          echo "<h2 class='h4 text-primary'>Mensaje desde el servidor:</h2>";
          echo "<p class='lead'>$mensaje</p>";
          echo "<hr>";
          echo "<p class='text-secondary small'>Fecha y hora de generación: $fechaActual</p>";

        ?>

        <?php if $tab == 1: 
          /*a) Genere un número aleatorio y lo muestre por pantalla
          b) Que cada vez que se ejecute muestre un dicho número a un tamaño
          elegido al azar entre 200% y 800%
          */
          $tamanoAleatorio = rand(200, 800); // Tamaño aleatorio
          $numeroAlAzar = rand(1, 100);
          echo "<p class='text-success' style='font-size: {$tamanoAleatorio}%;'>Número aleatorio generado: $numeroAlAzar, (Tamaño: {$tamanoAleatorio}%)</p>";


        ?>
      </div>
    </div>

  </main>

  <!-- JavaScript de Bootstrap (necesario para la interactividad) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
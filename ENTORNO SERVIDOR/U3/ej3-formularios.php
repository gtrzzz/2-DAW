<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prueba ejercicio formularios</title>
</head>
<body>
  <main>
    <h1>Ejercicio 1</h1>
    <p>Vamos a realizar un sistema que nos calcule el precio de un servicio de newsletter. Dependiendo del número de emails que enviemos costará un precio u otro. A continuación puedes ver una tabla.</p>
    <table border="1">
      <tr>
        <th>De</th>
        <th>A</th>
        <th>Precio</th>
      </tr>
      <tr>
        <td>0</td>
        <td>2000</td>
        <td>0€</td>
      </tr>
      <tr>
        <td>2001</td>
        <td>10000</td>
        <td>0.7€ unidad</td>
      </tr>
      <tr>
        <td>10001</td>
        <td>Infinito</td>
        <td>0.2€ unidad</td>
      </tr>
    </table>

    <br/>

    <form action="ej3-formularios.php" method="post">
      <label for="emails">Número de emails a enviar:</label>
      <input type="number" id="emails" name="emails" required>
      <input type="checkbox" id="seguro" name="seguro">
      <label for="seguro">Añadir seguro a cada correo electrónico</label>
      <input type="submit" value="Calcular precio">
    </form>

    <br/>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $emails = (int) $_POST['emails'];
      $seguro = isset($_POST['seguro']);
      $precio = 0;

      if ($emails <= 2000) {
        $precio = 0;
      } elseif ($emails <= 10000) {
        $precio = $emails * 0.7;
      } else {
        $precio = $emails * 0.2;
      }

      if ($seguro) {
        $precio += $emails * 0.1; // Añadimos 0.1€ por cada email si se selecciona el seguro
      }

      echo '<p>El precio total por enviar ' . $emails . ' emails es: €' . number_format($precio, 2) . '</p>';

    
    }
    ?>


  </main>
  
</body>
</html>
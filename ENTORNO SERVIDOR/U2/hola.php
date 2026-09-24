<html>
  <head>
    <title>Mi Página</title>
  </head>
  <body>
  <?php
    echo "<p>Bienvenido a mi página web.</p>";
    
    
    $var1 = 100;
    $var2 = &$var1; // $var2 es una referencia a $var1

    echo "Var1 -- $var1<br>";
    echo "Var2 -- $var2<br>";

    $var3 = $var1; // $var3 es una copia de $var1
    echo "Var2 -- $var2<br>";

    $var2 = 300; // Cambiamos el valor de $var2, que también cambia $var1
    echo "Var1 -- $var1<br>";
  ?>
  <h1>Hola, Mundo!</h1>
  </body>
</html>
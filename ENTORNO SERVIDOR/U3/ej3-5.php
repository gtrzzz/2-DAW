
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Unicode del 0 al 50000</title>
</head>
<body>
    <h1>Tabla Unicode del 0 al 50000</h1>

    <?php
    for ($i = 0; $i <= 50000; $i++) {
        echo "&#$i; ";

        // Salto de línea cada 20 caracteres
        if (($i + 1) % 20 == 0) {
            echo "<br>";
        }
    }
    ?>

</body>
</html>

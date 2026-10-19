<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Unicode del 0 al 50000</title>
</head>
<body>
    <h1>Tabla Unicode del 0 al 50000</h1>

    <table border="1">
        <?php
        for ($i = 0; $i <= 50000; $i++) {

            // Crear una fila cada 20 caracteres
            if ($i % 20 == 0) {
                echo "<tr>";
            }

            echo "<td>";
            echo "&#$i;";
            echo "</td>";

            // Cerrar la fila cada 20 caracteres
            if (($i + 1) % 20 == 0) {
                echo "</tr>";
            }
        }

        // Cerrar la última fila si está incompleta
        if (($i % 20) != 0) {
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
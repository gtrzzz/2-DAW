<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones con cadenas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1>Operaciones con cadenas</h1>

        <?php

        // Recogemos las cadenas mediante GET
        $cadena1 = $_GET["cadena1"];
        $cadena2 = $_GET["cadena2"];

        // Concatenamos las cadenas
        $concatenacion = $cadena1 . " " . $cadena2;

        // Longitud de las cadenas
        $longitud1 = mb_strlen($cadena1);
        $longitud2 = mb_strlen($cadena2);

        // Últimos 10 caracteres de cadena2
        $ultimos10 = mb_substr($cadena2, -10);

        // Reemplazamos "pepe" por "Juan"
        $reemplazo = str_replace("pepe", "Juan", $cadena2);

        ?>

        <table class="table table-bordered table-striped mt-4">

            <thead class="table-dark">
                <tr>
                    <th>Operación</th>
                    <th>Resultado</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>Cadena 1</td>
                    <td><?php echo $cadena1; ?></td>
                </tr>

                <tr>
                    <td>Cadena 2</td>
                    <td><?php echo $cadena2; ?></td>
                </tr>

                <tr>
                    <td>Concatenación</td>
                    <td><?php echo $concatenacion; ?></td>
                </tr>

                <tr>
                    <td>Longitud de cadena 1</td>
                    <td><?php echo $longitud1; ?></td>
                </tr>

                <tr>
                    <td>Longitud de cadena 2</td>
                    <td><?php echo $longitud2; ?></td>
                </tr>

                <tr>
                    <td>Últimos 10 caracteres de cadena 2</td>
                    <td><?php echo $ultimos10; ?></td>
                </tr>

                <tr>
                    <td>Reemplazar "pepe" por "Juan"</td>
                    <td><?php echo $reemplazo; ?></td>
                </tr>

            </tbody>

        </table>

        <a href="index2.php" class="btn btn-secondary">
            Volver a la página principal
        </a>

    </div>

</body>

</html>
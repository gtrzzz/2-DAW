<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del servidor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1>Información del servidor</h1>

        <table class="table table-bordered table-striped mt-4">

            <thead class="table-dark">
                <tr>
                    <th>Información</th>
                    <th>Resultado</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>Nombre del servidor</td>
                    <td>
                        <?php echo $_SERVER["SERVER_NAME"]; ?>
                    </td>
                </tr>

                <tr>
                    <td>Software del servidor</td>
                    <td>
                        <?php echo $_SERVER["SERVER_SOFTWARE"]; ?>
                    </td>
                </tr>

                <tr>
                    <td>Versión de PHP</td>
                    <td>
                        <?php echo PHP_VERSION; ?>
                    </td>
                </tr>

            </tbody>

        </table>

        <a href="index2.php" class="btn btn-secondary">
            Volver a la página principal
        </a>

    </div>

</body>

</html>
```php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones matemáticas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1>Operaciones matemáticas</h1>

        <?php

        // Recogemos los números mediante GET
        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];
        $num3 = $_GET["num3"];

        // Operaciones
        $suma = $num1 + $num2 + $num3;
        $producto = $num1 * $num2 * $num3;
        $media = $suma / 3;
        $maximo = max($num1, $num2, $num3);
        $minimo = min($num1, $num2, $num3);

        ?>

        <table class="table table-bordered table-striped table-hover mt-4">

            <thead class="table-dark">
                <tr>
                    <th>Operación</th>
                    <th>Resultado</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>Números introducidos</td>
                    <td>
                        <?php echo $num1 . ", " . $num2 . ", " . $num3; ?>
                    </td>
                </tr>

                <tr>
                    <td>Suma</td>
                    <td><?php echo $suma; ?></td>
                </tr>

                <tr>
                    <td>Producto</td>
                    <td><?php echo $producto; ?></td>
                </tr>

                <tr>
                    <td>Media</td>
                    <td><?php echo $media; ?></td>
                </tr>

                <tr>
                    <td>Número mayor</td>
                    <td><?php echo $maximo; ?></td>
                </tr>

                <tr>
                    <td>Número menor</td>
                    <td><?php echo $minimo; ?></td>
                </tr>

            </tbody>

        </table>

        <a href="index2.php" class="btn btn-secondary">
            Volver a la página principal
        </a>

    </div>

</body>
</html>
```

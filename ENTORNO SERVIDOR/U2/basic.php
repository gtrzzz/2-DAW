<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios de PHP - Entorno Servidor</title>

    <!-- CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <main class="container my-5">

        <header class="mb-4 text-center">
            <h1 class="display-5">Desarrollo Web en Entorno Servidor</h1>
            <p class="text-muted">
                Estructura básica HTML5 con PHP y Bootstrap
            </p>
        </header>

        <?php

        // Obtenemos la pestaña seleccionada mediante GET.
        // Si no existe, mostramos la primera.
        $tab = $_GET["tab"] ?? 1;

        ?>

        <!-- Pestañas -->
        <ul class="nav nav-tabs mb-4">

            <li class="nav-item">
                <a class="nav-link <?php echo ($tab == 1) ? 'active' : ''; ?>"
                   href="basic.php?tab=1">
                    Ejercicio 1
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo ($tab == 2) ? 'active' : ''; ?>"
                   href="basic.php?tab=2">
                    Ejercicio 2
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo ($tab == 3) ? 'active' : ''; ?>"
                   href="basic.php?tab=3">
                    Ejercicio 3
                </a>
            </li>

        </ul>


        <div class="card shadow-sm">

            <div class="card-body">

                <?php

                /*
                ==================================================
                EJERCICIO 1
                ==================================================
                */

                if ($tab == 1) {

                    /*
                    a) Generar un número aleatorio.
                    b) Mostrarlo con un tamaño aleatorio
                       entre 200% y 800%.
                    */

                    $tamanoAleatorio = rand(200, 800);
                    $numeroAlAzar = rand(1, 100);

                    echo "<h2 class='h4 text-primary'>Ejercicio 1</h2>";

                    echo "<p>
                            Número aleatorio generado:
                            <strong>$numeroAlAzar</strong>
                          </p>";

                    echo "<p style='font-size: {$tamanoAleatorio}%;'>
                            $numeroAlAzar
                          </p>";

                    echo "<p class='text-muted'>
                            Tamaño utilizado: {$tamanoAleatorio}%
                          </p>";
                }


                /*
                ==================================================
                EJERCICIO 2
                ==================================================
                */

                elseif ($tab == 2) {

                    /*
                    Generar un emoticono aleatorio
                    entre los caracteres Unicode
                    128512 y 128586.
                    */

                    $codigo = rand(128512, 128586);

                    // mb_chr convierte el código Unicode
                    // en su carácter correspondiente.
                    $emoticono = mb_chr($codigo, "UTF-8");

                    echo "<h2 class='h4 text-primary'>Ejercicio 2</h2>";

                    echo "<p>
                            Emoticono generado aleatoriamente:
                          </p>";

                    echo "<p style='font-size: 100px;'>
                            $emoticono
                          </p>";

                    echo "<p class='text-muted'>
                            Código Unicode: $codigo
                          </p>";
                }


                /*
                ==================================================
                EJERCICIO 3
                ==================================================
                */

                elseif ($tab == 3) {

                    $texto = "This is a test";

                    // Cuenta únicamente la letra "t" minúscula.
                    $numeroT = substr_count($texto, "t");

                    // Convertimos todo a minúsculas para contar
                    // tanto "t" como "T".
                    $todasLasT = substr_count(strtolower($texto), "t");

                    echo "<h2 class='h4 text-primary'>Ejercicio 3</h2>";

                    echo "<p>
                            Frase:
                            <strong>$texto</strong>
                          </p>";

                    echo "<p>
                            Número de letras <strong>t</strong> minúsculas:
                            <strong>$numeroT</strong>
                          </p>";

                    echo "<p>
                            Número de letras <strong>t</strong> en total:
                            <strong>$todasLasT</strong>
                          </p>";
                }

                ?>

            </div>

        </div>

    </main>


    <!-- JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
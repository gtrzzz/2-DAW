```php
<?php

/* ==========================================================
   CONFIGURACIÓN DE LAS PESTAÑAS
   ========================================================== */

// Obtenemos la pestaña seleccionada mediante la URL.
// Si no existe, mostramos la pestaña 1.
$tab = $_GET['tab'] ?? '1';

// Lista de pestañas válidas.
$tabsValidas = ['1', '2', '3', '4', '5', '6', '7', '8'];

// Si la pestaña recibida no es válida, volvemos a la primera.
if (!in_array($tab, $tabsValidas, true)) {
    $tab = '1';
}


/* ==========================================================
   EJERCICIO 1
   ========================================================== */

// Elegimos aleatoriamente entre cara y cruz.
$moneda = random_int(0, 1);


/* ==========================================================
   EJERCICIO 2
   ========================================================== */

// Generamos una nota aleatoria entre 1 y 10.
$nota = random_int(1, 10);

// Determinamos la calificación correspondiente.
if ($nota < 5) {
    $calificacion = 'Insuficiente';
} elseif ($nota < 6) {
    $calificacion = 'Suficiente';
} elseif ($nota < 7) {
    $calificacion = 'Bien';
} elseif ($nota < 9) {
    $calificacion = 'Notable';
} else {
    $calificacion = 'Sobresaliente';
}


/* ==========================================================
   EJERCICIO 3
   ========================================================== */

// Valores iniciales para el formulario.
$numero1 = '';
$numero2 = '';
$numero3 = '';
$resultadoNumeros = '';

// Comprobamos si se ha enviado el formulario.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ejercicio3'])) {

    // Recogemos los tres números.
    $numero1 = (int) $_POST['numero1'];
    $numero2 = (int) $_POST['numero2'];
    $numero3 = (int) $_POST['numero3'];

    // Comprobamos las diferentes posibilidades.
    if ($numero1 === $numero2 && $numero2 === $numero3) {

        $resultadoNumeros = "Hay tres números iguales a $numero1.";

    } elseif ($numero1 === $numero2) {

        $resultadoNumeros = "Hay dos números iguales a $numero1.";

    } elseif ($numero1 === $numero3) {

        $resultadoNumeros = "Hay dos números iguales a $numero1.";

    } elseif ($numero2 === $numero3) {

        $resultadoNumeros = "Hay dos números iguales a $numero2.";

    } else {

        $resultadoNumeros = "No hay números iguales.";
    }
}


/* ==========================================================
   EJERCICIO 4
   ========================================================== */

// Variable para almacenar el número recibido.
$numeroFormulario = '';
$sumaPares = null;

// Comprobamos si se ha enviado el formulario del ejercicio 4.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ejercicio4'])) {

    $numeroFormulario = (int) $_POST['numero'];

    $sumaPares = 0;

    /*
     * Recorremos todos los números anteriores al número indicado.
     * Si el número es par, lo añadimos a la suma.
     */
    for ($i = 0; $i < $numeroFormulario; $i++) {

        if ($i % 2 === 0) {
            $sumaPares += $i;
        }
    }
}


/* ==========================================================
   EJERCICIO 5
   ========================================================== */

// No generamos aquí los 50.001 caracteres.
// Se generan directamente en la tabla cuando se muestra
// el ejercicio para evitar guardar todos los valores en memoria.


/* ==========================================================
   EJERCICIO 6
   ========================================================== */

// Generamos un número aleatorio entre 1 y 10.
$numeroMultiplicacion = random_int(1, 10);


/* ==========================================================
   EJERCICIO 7
   ========================================================== */

// Códigos Unicode de las frutas indicadas en el ejercicio.
$frutas = range(127815, 127827);

// Elegimos aleatoriamente entre 7 y 20 frutas.
$cantidadFrutas = random_int(7, 20);

// Creamos el array que contendrá las frutas.
$coleccionFrutas = [];

// Introducimos frutas aleatorias en la colección.
for ($i = 0; $i < $cantidadFrutas; $i++) {

    $coleccionFrutas[] = $frutas[array_rand($frutas)];
}

// Elegimos una fruta aleatoriamente para buscarla.
$frutaBuscada = $frutas[array_rand($frutas)];

// Contamos cuántas veces aparece.
$vecesFruta = 0;

foreach ($coleccionFrutas as $fruta) {

    if ($fruta === $frutaBuscada) {
        $vecesFruta++;
    }
}


/* ==========================================================
   EJERCICIO 8
   ========================================================== */

// Emoticonos permitidos para el apartado 2.
$emoticonos = [
    128169,
    128168,
    127866,
    128405,
    129313
];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ejercicios UT3_1 - Estructuras de control</title>

    <style>

        /* ==================================================
           ESTILOS GENERALES
           ================================================== */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #222;
        }

        main {
            width: 95%;
            max-width: 1200px;
            margin: 30px auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        h2 {
            margin-top: 0;
        }

        h3 {
            margin-top: 30px;
        }

        /* ==================================================
           PESTAÑAS
           ================================================== */

        .tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .tabs li {
            flex: 1 1 120px;
        }

        .tabs a {
            display: block;
            padding: 14px 10px;
            text-align: center;
            text-decoration: none;
            background-color: #ddd;
            color: #222;
            border-radius: 8px 8px 0 0;
            font-weight: bold;
        }

        .tabs a:hover {
            background-color: #ccc;
        }

        .tabs a.active {
            background-color: #333;
            color: white;
        }

        /* ==================================================
           CONTENIDO
           ================================================== */

        .contenido {
            background-color: white;
            padding: 30px;
            min-height: 400px;
            border-radius: 0 0 8px 8px;
        }

        .resultado {
            background-color: #f5f5f5;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }

        .resultado-grande {
            font-size: 2rem;
            text-align: center;
        }

        /* ==================================================
           FORMULARIOS
           ================================================== */

        form {
            margin: 20px 0;
        }

        input {
            padding: 10px;
            margin: 5px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }

        button {
            padding: 10px 18px;
            border: 0;
            border-radius: 5px;
            background-color: #333;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        /* ==================================================
           EJERCICIO 7
           ================================================== */

        .frutas {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 8px;
            justify-content: center;
        }

        .fruta {
            font-size: 2.5rem;
        }

        /* ==================================================
           EJERCICIO 8
           ================================================== */

        table {
            border-collapse: collapse;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #777;
            padding: 10px;
            text-align: center;
        }

        .tabla-numeros td {
            min-width: 50px;
        }

        .tabla-emoticonos td {
            width: 70px;
            height: 70px;
            font-size: 2rem;
        }

        /* ==================================================
           MONEDA
           ================================================== */

        .moneda {
            width: 150px;
            height: 150px;
            margin: 20px auto;
            border-radius: 50%;
            border: 5px solid #555;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            background-color: #ddd;
        }

    </style>

</head>

<body>

<main>

    <h1>Ejercicios UT3_1 - Estructuras de control</h1>


    <!-- ==================================================
         PESTAÑAS
         ================================================== -->

    <nav aria-label="Ejercicios">

        <ul class="tabs">

            <?php for ($i = 1; $i <= 8; $i++): ?>

                <li>
                    <a
                        href="?tab=<?= $i ?>"
                        class="<?= $tab === (string) $i ? 'active' : '' ?>"
                    >
                        Ejercicio <?= $i ?>
                    </a>
                </li>

            <?php endfor; ?>

        </ul>

    </nav>


    <section class="contenido">


        <?php if ($tab === '1'): ?>

            <!-- ==================================================
                 EJERCICIO 1
                 ================================================== -->

            <article>

                <h2>Ejercicio 1 - Lanzamiento de una moneda</h2>

                <p>
                    Cada vez que se actualiza la página se genera
                    aleatoriamente cara o cruz.
                </p>

                <div class="resultado resultado-grande">

                    <?php if ($moneda === 0): ?>

                        <div class="moneda">
                            CARA
                        </div>

                    <?php else: ?>

                        <div class="moneda">
                            CRUZ
                        </div>

                    <?php endif; ?>

                </div>

                <?php

                /*
                 * random_int() genera un número entero aleatorio
                 * entre los valores indicados.
                 *
                 * En este caso:
                 * 0 = cara
                 * 1 = cruz
                 */

                ?>

            </article>


        <?php elseif ($tab === '2'): ?>

            <!-- ==================================================
                 EJERCICIO 2
                 ================================================== -->

            <article>

                <h2>Ejercicio 2 - Adivinar la nota</h2>

                <p>
                    Se genera una nota aleatoria entre 1 y 10
                    y se muestra la calificación correspondiente.
                </p>

                <div class="resultado">

                    <p>
                        <strong>Nota obtenida:</strong>
                        <?= $nota ?>
                    </p>

                    <p>
                        <strong>Calificación:</strong>
                        <?= $calificacion ?>
                    </p>

                </div>

                <?php

                /*
                 * random_int(1, 10) genera una nota aleatoria.
                 *
                 * Las estructuras if y elseif permiten comprobar
                 * en qué intervalo se encuentra la nota.
                 */

                ?>

            </article>


        <?php elseif ($tab === '3'): ?>

            <!-- ==================================================
                 EJERCICIO 3
                 ================================================== -->

            <article>

                <h2>Ejercicio 3 - Números iguales</h2>

                <p>
                    Introduce tres números positivos para comprobar
                    si existen números iguales.
                </p>

                <form method="post" action="?tab=3">

                    <input
                        type="number"
                        name="numero1"
                        min="0"
                        required
                        value="<?= htmlspecialchars((string) $numero1) ?>"
                        aria-label="Primer número"
                    >

                    <input
                        type="number"
                        name="numero2"
                        min="0"
                        required
                        value="<?= htmlspecialchars((string) $numero2) ?>"
                        aria-label="Segundo número"
                    >

                    <input
                        type="number"
                        name="numero3"
                        min="0"
                        required
                        value="<?= htmlspecialchars((string) $numero3) ?>"
                        aria-label="Tercer número"
                    >

                    <input type="hidden" name="ejercicio3" value="1">

                    <button type="submit">
                        Comprobar
                    </button>

                </form>


                <?php if ($resultadoNumeros !== ''): ?>

                    <div class="resultado">

                        <strong>
                            <?= htmlspecialchars($resultadoNumeros) ?>
                        </strong>

                    </div>

                <?php endif; ?>


                <?php

                /*
                 * $_POST permite recoger los datos enviados
                 * mediante el formulario.
                 *
                 * (int) convierte los valores recibidos en números enteros.
                 *
                 * El operador === comprueba que dos valores sean
                 * iguales tanto en valor como en tipo.
                 */

                ?>

            </article>


        <?php elseif ($tab === '4'): ?>

            <!-- ==================================================
                 EJERCICIO 4
                 ================================================== -->

            <article>

                <h2>Ejercicio 4 - Suma de números pares</h2>

                <p>
                    Introduce un número para calcular la suma de todos
                    los números pares anteriores a él.
                </p>

                <form method="post" action="?tab=4">

                    <label for="numero">
                        Número:
                    </label>

                    <input
                        type="number"
                        id="numero"
                        name="numero"
                        min="1"
                        required
                        value="<?= htmlspecialchars((string) $numeroFormulario) ?>"
                    >

                    <input type="hidden" name="ejercicio4" value="1">

                    <button type="submit">
                        Calcular
                    </button>

                </form>


                <?php if ($sumaPares !== null): ?>

                    <div class="resultado">

                        <p>
                            <strong>Número introducido:</strong>
                            <?= $numeroFormulario ?>
                        </p>

                        <p>
                            <strong>Suma de los números pares anteriores:</strong>
                            <?= $sumaPares ?>
                        </p>

                    </div>

                <?php endif; ?>


                <?php

                /*
                 * Utilizamos un bucle for para recorrer los números
                 * anteriores al número introducido.
                 *
                 * El operador % permite comprobar si un número es par.
                 *
                 * Si el resto de dividir entre 2 es 0, el número es par.
                 *
                 * += permite sumar el número al resultado acumulado.
                 */

                ?>

            </article>


        <?php elseif ($tab === '5'): ?>

            <!-- ==================================================
                 EJERCICIO 5
                 ================================================== -->

            <article>

                <h2>Ejercicio 5 - Tabla Unicode del 0 al 50000</h2>

                <p>
                    A continuación se muestran los caracteres Unicode
                    correspondientes a los códigos del 0 al 50000.
                </p>

                <div class="resultado">

                    <?php

                    /*
                     * Recorremos todos los códigos Unicode desde 0
                     * hasta 50000.
                     *
                     * La entidad HTML &#número; permite mostrar
                     * el carácter correspondiente a ese código.
                     */

                    for ($codigo = 0; $codigo <= 50000; $codigo++) {

                        echo "&#" . $codigo . "; ";

                    }

                    ?>

                </div>

            </article>


        <?php elseif ($tab === '6'): ?>

            <!-- ==================================================
                 EJERCICIO 6
                 ================================================== -->

            <article>

                <h2>Ejercicio 6 - Tabla de multiplicar</h2>

                <p>
                    Se ha generado un número aleatorio y se muestra
                    su tabla de multiplicar.
                </p>

                <div class="resultado">

                    <h3>
                        Tabla del <?= $numeroMultiplicacion ?>
                    </h3>

                    <?php

                    /*
                     * Recorremos los números del 1 al 10 mediante
                     * un bucle for.
                     */

                    for ($i = 1; $i <= 10; $i++) {

                        $resultado = $numeroMultiplicacion * $i;

                        echo "<p>";
                        echo $numeroMultiplicacion . " × " . $i . " = " . $resultado;
                        echo "</p>";

                    }

                    ?>

                </div>

                <?php

                /*
                 * random_int() genera el número de la tabla.
                 *
                 * El bucle for genera las operaciones del 1 al 10.
                 */

                ?>

            </article>


        <?php elseif ($tab === '7'): ?>

            <!-- ==================================================
                 EJERCICIO 7
                 ================================================== -->

            <article>

                <h2>Ejercicio 7 - Colección de frutas</h2>

                <p>
                    Se han generado aleatoriamente entre 7 y 20 frutas.
                </p>

                <div class="frutas">

                    <?php foreach ($coleccionFrutas as $fruta): ?>

                        <span class="fruta">
                            <?= "&#" . $fruta . ";" ?>
                        </span>

                    <?php endforeach; ?>

                </div>


                <div class="resultado">

                    <p>

                        La fruta
                        <strong>
                            <?= "&#" . $frutaBuscada . ";" ?>
                        </strong>

                        aparece

                        <strong>
                            <?= $vecesFruta ?>
                        </strong>

                        <?= $vecesFruta === 1 ? 'vez' : 'veces' ?>.

                    </p>

                </div>


                <?php

                /*
                 * range() genera un array con los códigos Unicode
                 * comprendidos entre 127815 y 127827.
                 *
                 * random_int() determina cuántas frutas se generan.
                 *
                 * array_rand() selecciona aleatoriamente una fruta.
                 *
                 * foreach recorre todas las frutas de la colección.
                 *
                 * Cada vez que una fruta coincide con la fruta buscada,
                 * aumentamos el contador.
                 */

                ?>

            </article>


        <?php elseif ($tab === '8'): ?>

            <!-- ==================================================
                 EJERCICIO 8
                 ================================================== -->

            <article>

                <h2>Ejercicio 8 - Tablas</h2>


                <!-- APARTADO 1 -->

                <h3>Apartado 1 - Números del 1 al 100</h3>

                <table class="tabla-numeros">

                    <caption>
                        Números del 1 al 100
                    </caption>

                    <tbody>

                    <?php

                    /*
                     * Creamos una tabla de 10 filas y 10 columnas.
                     *
                     * Cada celda contiene un número del 1 al 100.
                     */

                    $numero = 1;

                    for ($fila = 1; $fila <= 10; $fila++):

                    ?>

                        <tr>

                            <?php for ($columna = 1; $columna <= 10; $columna++): ?>

                                <td>
                                    <?= $numero ?>
                                </td>

                                <?php $numero++; ?>

                            <?php endfor; ?>

                        </tr>

                    <?php endfor; ?>

                    </tbody>

                </table>


                <!-- APARTADO 2 -->

                <h3>Apartado 2 - Emoticonos aleatorios</h3>

                <table class="tabla-emoticonos">

                    <caption>
                        Emoticonos aleatorios
                    </caption>

                    <tbody>

                    <?php

                    /*
                     * Creamos otra tabla de 10 filas y 10 columnas.
                     *
                     * En cada celda seleccionamos aleatoriamente
                     * uno de los cinco emoticonos permitidos.
                     */

                    for ($fila = 1; $fila <= 10; $fila++):

                    ?>

                        <tr>

                            <?php for ($columna = 1; $columna <= 10; $columna++): ?>

                                <?php

                                // Seleccionamos aleatoriamente un emoticono.
                                $emoticono = $emoticonos[array_rand($emoticonos)];

                                ?>

                                <td>
                                    <?= "&#" . $emoticono . ";" ?>
                                </td>

                            <?php endfor; ?>

                        </tr>

                    <?php endfor; ?>

                    </tbody>

                </table>


            </article>

        <?php endif; ?>

    </section>

</main>

</body>

</html>
```

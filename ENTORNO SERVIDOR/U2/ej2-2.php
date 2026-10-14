
<?php

// Obtenemos la pestaña seleccionada mediante el parámetro "tab" de la URL.
// Si no existe, mostramos por defecto la pestaña 1.
$tab = $_GET['tab'] ?? '1';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ejercicios UT2_2 - PHP</title>

    <style>
        /* Estilos generales */

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
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        /* Estilos de las pestañas */

        .tabs {
            display: flex;
            gap: 5px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .tabs li {
            flex: 1;
        }

        .tabs a {
            display: block;
            padding: 15px;
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

        /* Contenido de los ejercicios */

        .contenido {
            background-color: white;
            padding: 30px;
            min-height: 350px;
            border-radius: 0 0 8px 8px;
        }

        .tab h2 {
            margin-top: 0;
        }

        .tab p {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .resultado {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 6px;
            margin: 10px 0;
        }
    </style>
</head>

<body>

<main>

    <h1>Ejercicios de la Unidad 2.2</h1>

    <!-- Pestañas para acceder a cada ejercicio -->
    <nav aria-label="Ejercicios">

        <ul class="tabs">

            <li>
                <a href="?tab=1" class="<?= $tab === '1' ? 'active' : '' ?>">
                    Ejercicio 1
                </a>
            </li>

            <li>
                <a href="?tab=2" class="<?= $tab === '2' ? 'active' : '' ?>">
                    Ejercicio 2
                </a>
            </li>

            <li>
                <a href="?tab=3" class="<?= $tab === '3' ? 'active' : '' ?>">
                    Ejercicio 3
                </a>
            </li>

            <li>
                <a href="?tab=4" class="<?= $tab === '4' ? 'active' : '' ?>">
                    Ejercicio 4
                </a>
            </li>

            <li>
                <a href="?tab=5" class="<?= $tab === '5' ? 'active' : '' ?>">
                    Ejercicio 5
                </a>
            </li>

        </ul>

    </nav>


    <section class="contenido">


        <?php if ($tab === '1'): ?>

            <!-- ========================================= -->
            <!-- EJERCICIO 1                              -->
            <!-- ========================================= -->

            <article class="tab">

                <h2>Ejercicio 1</h2>

                <p>
                    Mostrar la fecha y la hora del día actual.
                </p>

                <div class="resultado">

                    <?php

                    /*
                     * La función date() permite obtener la fecha y hora
                     * actuales utilizando el formato que indiquemos.
                     *
                     * d = día
                     * m = mes
                     * Y = año
                     * H = hora
                     * i = minutos
                     * s = segundos
                     */

                    echo "Fecha y hora actuales: " . date("d/m/Y H:i:s");

                    ?>

                </div>

            </article>


        <?php elseif ($tab === '2'): ?>

            <!-- ========================================= -->
            <!-- EJERCICIO 2                              -->
            <!-- ========================================= -->

            <article class="tab">

                <h2>Ejercicio 2</h2>

                <?php

                // Creamos las dos variables solicitadas.
                $primerNumero = 8;
                $segundoNumero = 5;

                /*
                 * El operador % obtiene el resto de una división.
                 */
                $resto = $primerNumero % 5;

                /*
                 * El operador / realiza una división.
                 */
                $division = $primerNumero / $segundoNumero;

                /*
                 * El operador + realiza una suma.
                 */
                $suma = $primerNumero + $segundoNumero;

                ?>

                <div class="resultado">

                    <p>
                        <strong>Primer número:</strong>
                        <?= $primerNumero ?>
                    </p>

                    <p>
                        <strong>Segundo número:</strong>
                        <?= $segundoNumero ?>
                    </p>

                    <p>
                        <strong>Resto de dividir el primer número entre 5:</strong>
                        <?= $resto ?>
                    </p>

                    <p>
                        <strong>Resultado de dividir el primer número entre el segundo:</strong>
                        <?= $division ?>
                    </p>

                    <p>
                        <strong>Resultado de sumar los dos números:</strong>
                        <?= $suma ?>
                    </p>

                </div>

            </article>


        <?php elseif ($tab === '3'): ?>

            <!-- ========================================= -->
            <!-- EJERCICIO 3                              -->
            <!-- ========================================= -->

            <article class="tab">

                <h2>Ejercicio 3</h2>

                <?php

                // Guardamos la frase original en una variable.
                $frase = "Desarrollo web en entorno servidor";

                /*
                 * La función str_replace() permite sustituir un texto
                 * por otro dentro de una cadena.
                 *
                 * En este caso sustituimos los espacios por nada,
                 * eliminando así todos los espacios de la frase.
                 */
                $fraseSinEspacios = str_replace(" ", "", $frase);

                /*
                 * La función strlen() devuelve el número de caracteres
                 * que contiene una cadena.
                 */
                $longitudOriginal = strlen($frase);
                $longitudSinEspacios = strlen($fraseSinEspacios);

                ?>

                <div class="resultado">

                    <p>
                        <strong>Frase original:</strong><br>
                        <?= $frase ?>
                    </p>

                    <p>
                        <strong>Frase sin espacios:</strong><br>
                        <?= $fraseSinEspacios ?>
                    </p>

                    <p>
                        <strong>Longitud de la frase original:</strong>
                        <?= $longitudOriginal ?>
                    </p>

                    <p>
                        <strong>Longitud de la frase sin espacios:</strong>
                        <?= $longitudSinEspacios ?>
                    </p>

                </div>

            </article>


        <?php elseif ($tab === '4'): ?>

            <!-- ========================================= -->
            <!-- EJERCICIO 4                              -->
            <!-- ========================================= -->

            <article class="tab">

                <h2>Ejercicio 4</h2>

                <?php

                /*
                 * La función define() permite crear una constante.
                 *
                 * Una constante mantiene su valor durante la ejecución
                 * del programa y no se puede modificar posteriormente.
                 */
                define("IVA", 21);

                // Creamos una variable con un precio.
                $precio = 100;

                /*
                 * Realizamos una operación utilizando la constante IVA.
                 * Calculamos el precio final sumando el 21% de IVA.
                 */
                $precioConIVA = $precio + ($precio * IVA / 100);

                ?>

                <div class="resultado">

                    <p>
                        <strong>Valor de la constante IVA:</strong>
                        <?= IVA ?>%
                    </p>

                    <p>
                        <strong>Precio inicial:</strong>
                        <?= $precio ?> €
                    </p>

                    <p>
                        <strong>Precio con IVA:</strong>
                        <?= $precioConIVA ?> €
                    </p>

                    <p>
                        <strong>Valor máximo que puede tomar un entero en PHP:</strong>
                        <?= PHP_INT_MAX ?>
                    </p>

                </div>

            </article>


        <?php elseif ($tab === '5'): ?>

            <!-- ========================================= -->
            <!-- EJERCICIO 5                              -->
            <!-- ========================================= -->

            <article class="tab">

                <h2>Ejercicio 5</h2>

                <?php

                /*
                 * Creamos una variable de tipo float y le asignamos
                 * el valor 5.7.
                 */
                $numFloat = 5.7;

                /*
                 * Creamos una variable sin valor.
                 * En PHP podemos asignarle el valor null.
                 */
                $variableSinValor = null;

                ?>

                <h3>Apartado 1</h3>

                <?php

                /*
                 * La función is_float() comprueba si una variable
                 * es de tipo float.
                 */
                if (is_float($numFloat)) {

                    echo "<p>La variable numFloat es de tipo float.</p>";

                } else {

                    echo "<p>La variable numFloat no es de tipo float.</p>";

                }

                ?>


                <h3>Apartado 2</h3>

                <?php

                /*
                 * La función is_null() comprueba si una variable
                 * contiene el valor null.
                 */
                if (is_null($variableSinValor)) {

                    echo "<p>La variable variableSinValor es null.</p>";

                } else {

                    echo "<p>La variable variableSinValor no es null.</p>";

                }

                ?>


                <h3>Apartado 3</h3>

                <?php

                /*
                 * Cambiamos únicamente el valor de las variables,
                 * manteniendo el código anterior.
                 *
                 * En este caso numFloat pasa a contener un entero
                 * y variableSinValor pasa a contener una cadena.
                 */
                $numFloat = 10;
                $variableSinValor = "Hola";

                ?>

                <div class="resultado">

                    <p>
                        <strong>Nuevo valor de numFloat:</strong>
                        <?= $numFloat ?>
                    </p>

                    <p>
                        <strong>Nuevo valor de variableSinValor:</strong>
                        <?= $variableSinValor ?>
                    </p>

                    <?php

                    /*
                     * Volvemos a utilizar las mismas funciones para
                     * comprobar el nuevo tipo de las variables.
                     */

                    if (is_float($numFloat)) {

                        echo "<p>numFloat sigue siendo de tipo float.</p>";

                    } else {

                        echo "<p>numFloat ya no es de tipo float.</p>";

                    }


                    if (is_null($variableSinValor)) {

                        echo "<p>variableSinValor sigue siendo null.</p>";

                    } else {

                        echo "<p>variableSinValor ya no es null.</p>";

                    }

                    ?>

                </div>

            </article>

        <?php endif; ?>

    </section>

</main>

</body>

</html>

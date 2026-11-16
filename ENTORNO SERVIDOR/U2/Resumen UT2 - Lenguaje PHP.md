# Resumen UT2: Lenguaje PHP. Inserción de código en páginas web

Desarrollo web en entorno servidor · 2º DAW · Autor: (poner nombre/s)

Resumen para el **examen teórico** (test con penalización: cada fallo resta 0,5). Va al grano: cada concepto lleva un ejemplo de código con su salida, y cada bloque acaba con preguntas de repaso.

- ⚠️ **Trampa**: marca lo que cayó en la autoevaluación de la UT2 y se falló o quedó sin contestar.
- 🔗 **Relación**: conecta conceptos entre sí. En Obsidian, cada concepto es una nota y el mapa está en `Mapa UT2 PHP`.

---

## Índice

1. [Cómo funciona PHP](#1-cómo-funciona-php)
2. [Sintaxis y comentarios](#2-sintaxis-y-comentarios)
3. [Variables: copia, referencia, sin inicializar y constantes](#3-variables)
4. [Tipos de datos y conversiones](#4-tipos-de-datos-y-conversiones)
5. [Cadenas: comillas simples y dobles](#5-cadenas)
6. [Ámbito y superglobales](#6-ámbito-y-superglobales)
7. [Operadores](#7-operadores)
8. [Funciones nativas](#8-funciones-nativas)
9. [Otras preguntas de la autoevaluación (UT3)](#9-otras-preguntas-de-la-autoevaluación)
10. [Chuleta final de trampas](#10-chuleta-final-de-trampas)

---

## 1. Cómo funciona PHP

**PHP** (*PHP: Hypertext Preprocessor*) es un lenguaje **de servidor**. El servidor web (Apache, en `C:/xampp/htdocs`) ejecuta los bloques `<?php ... ?>` y **los sustituye por lo que imprimen**. El navegador **nunca** recibe código PHP: solo el HTML resultante.

```php
<body>
  <?php echo "Hola Mundo"; ?>
</body>
```

```html
<!-- Lo que llega al navegador (Ctrl+U) -->
<body>
  Hola Mundo
</body>
```

- Para probarlo: `http://localhost/archivo.php`, con Apache arrancado (nunca abriendo el archivo con doble clic).
- Cada proyecto debe tener un `index.php`, que es la página que se abre por defecto en `http://localhost/proyecto1/`.

🔗 Como PHP genera el HTML antes de enviarlo, `header()` solo funciona si todavía no se ha enviado nada al navegador (ver [9](#9-otras-preguntas-de-la-autoevaluación)).

---

## 2. Sintaxis y comentarios

- Cada sentencia termina en **`;`**.
- Comentarios: `//` y `#` para una línea, y `/* ... */` para bloque.
- Si el archivo es **solo PHP**, **no se cierra** con `?>`.

> ⚠️ **Trampa.** No se cierra `?>` en archivos solo PHP para **evitar que se cuelen espacios o saltos de línea al final**. Esos espacios se envían como salida y pueden romper `header()` o los `include`. No tiene nada que ver con ocultar el código, que el navegador ya no ve nunca.

```php
<?php
// línea      # también línea      /* bloque */
$mensaje = "Hola";
echo "<p>$mensaje</p>";
// fin del archivo SIN ?>
```

**Repaso**

1. ¿Por qué se omite `?>` al final de un archivo solo PHP?
2. ¿Qué tres formas de comentar hay?

<details><summary>Respuestas</summary>

1. Para no enviar espacios o saltos de línea accidentales, que rompen `header()` y los `include`.
2. `//`, `#` y `/* */`.
</details>

---

## 3. Variables

### Declaración

- Siempre llevan **`$`** y después una **letra o `_`**. Nunca empiezan por un número: `$5alumnos` da error de sintaxis.
- **Tipado débil y dinámico**: no se declara el tipo, que depende del valor y puede cambiar.

```php
$a = 5;          echo gettype($a);  // integer
$a = "Hola";     echo gettype($a);  // string
```

### Copia vs. referencia (`&`)

| | Sintaxis | Qué pasa en memoria |
| --- | --- | --- |
| Copia (por defecto) | `$b = $a;` | Dos cajas distintas: cambiar una no afecta a la otra |
| Referencia | `$b = &$a;` | Dos nombres para **la misma caja** |

```php
$a = 5;
$b = &$a;   // $b es alias de $a
$b = 10;    // $a = 10
$a = 20;    // $b = 20
$c = $a;    // copia: $c = 20
$c = 30;    // solo cambia $c
echo "$a-$b-$c";   // 20-20-30
```

🔗 Lo mismo pasa con los **parámetros por referencia** de las funciones: `function duplicar(&$v) { $v *= 2; }` modifica la variable original (ver [9](#9-otras-preguntas-de-la-autoevaluación)).

### Variables sin inicializar

Usarlas genera un aviso (**E_NOTICE** en PHP 7, **E_WARNING** en PHP 8), pero **el script continúa** y se toma el valor por defecto: `0` en una suma, `""` en una cadena, `false` en un booleano.

```php
$total = 100 + $noExiste;   // aviso + $total = 100
```

### Constantes

```php
define("IVA", 0.21);   // sin $ y con el nombre entre comillas
echo IVA * 100;        // 21
```

Por convención van en MAYÚSCULAS y no se pueden cambiar.

**Repaso**

1. `$x = 1; $y = &$x; $y++; $z = $x; $z++; echo "$x $y $z";` → ?
2. ¿Qué pasa al usar una variable sin inicializar?

<details><summary>Respuestas</summary>

1. `2 2 3`
2. Sale un aviso (E_NOTICE/E_WARNING), se toma el valor por defecto y el script sigue.
</details>

---

## 4. Tipos de datos y conversiones

| Escalares (4) | Compuestos y especiales |
| --- | --- |
| `integer`, `float`, `string`, `boolean` | `array`, `object`, `callable`, `null`, `resource` |

- Límites de los enteros: `PHP_INT_SIZE` (8 bytes), `PHP_INT_MAX` y `PHP_INT_MIN`.
- **Casting**: `(int) 7.9` → `7`, porque **trunca**, no redondea. También existe `(float)`.
- `null`: variable sin valor o asignada a `NULL`. `resource`: un recurso externo, como una conexión a una base de datos.

### Qué se considera `false`

| Tipo | Es FALSE si... | Ojo |
| --- | --- | --- |
| int / float | `0` o `0.0` | `-1` es TRUE |
| string | `""` o **`"0"`** | `" "`, `"0.0"` y `"false"` son TRUE |
| array | vacío `[]` | |
| null / sin iniciar | siempre | |

🔗 Esta tabla es justo lo que comprueba **`empty()`** (ver [8](#8-funciones-nativas)).

### Strings que se usan como números

```php
echo "10" + 2;          // 12   (el + siempre suma números)
echo 100 + "50 euros";  // 150  (usa los números del principio + Warning)
```

> ⚠️ **Trampa.** `$res = 100 + "50 euros";` da **150**, no "10050 euros". El `+` nunca concatena: para eso está el `.`. Si la cadena empieza por un número, PHP toma ese número (y avisa). Si no empieza por un número (`"abc" + 1`), en PHP 8 da error (TypeError).

**Repaso**

1. `(int) 9.99` → ?
2. ¿`(bool) "0.0"` es true o false?
3. `"5" + "5"` → ? ¿Y `"5" . "5"`?

<details><summary>Respuestas</summary>

1. `9`, porque trunca.
2. `true`: solo `""` y `"0"` son false.
3. `10` y `"55"`.
</details>

---

## 5. Cadenas

| Comillas dobles `"..."` | Comillas simples `'...'` |
| --- | --- |
| **Interpolan** las variables y las secuencias de escape (`\n`, `\t`, `\$`) | Todo es **literal** |

```php
$nombre = "Ana";
echo "Hola $nombre\n";   // Hola Ana + salto de línea
echo 'Hola $nombre\n';   // Hola $nombre\n
echo 'Hola ' . $nombre;  // Hola Ana (concatenación con .)
```

> ⚠️ **Trampa.** Las **dobles** evalúan variables y escapes, y las **simples** no. Es al revés de lo que se marcó en el examen.

- El primer carácter de una cadena está en la **posición 0**.
- `strlen()` cuenta **bytes** y `mb_strlen()` cuenta **caracteres**: `strlen("Martín")` → 7 y `mb_strlen("Martín")` → 6, porque la `í` ocupa 2 bytes en UTF-8. Las funciones `mb_*` son las que funcionan bien con tildes.

---

## 6. Ámbito y superglobales

### Ámbito

- Una variable de un archivo es visible en ese archivo y en los que incluye.
- Las **funciones tienen su propio ámbito**: dentro de una función **no se ven las variables de fuera**.

```php
$x = 5;
function verX() {
    echo $x;              // ⚠️ variable local no definida → aviso y no imprime nada
}
function verX2() {
    global $x;            // opción 1
    echo $x;              // 5
    echo $GLOBALS['x'];   // opción 2 → 5
}
```

> ⚠️ **Trampa.** Si usas una global dentro de una función sin `global` ni `$GLOBALS`, PHP la trata como **variable local no definida** y da un **aviso (E_NOTICE/E_WARNING)**. **No** es un error fatal.
> Además, la superglobal se llama **`$GLOBALS`**, sin guion bajo, aunque el temario ponga `$_GLOBALS`.

### Superglobales

Son arrays que están disponibles **en cualquier ámbito**, sin necesidad de `global`.

| Superglobal | Contiene |
| --- | --- |
| `$GLOBALS` | Todas las variables globales |
| **`$_SERVER`** | **Datos del servidor, cabeceras HTTP y rutas del script** |
| `$_GET` | Parámetros de la URL (`calc.php?a=12` → `$_GET['a']`) |
| `$_POST` | Datos del formulario enviados con POST (van en el cuerpo de la petición) |
| `$_REQUEST` | `$_GET` + `$_POST` + `$_COOKIE` juntos |
| `$_FILES` | Archivos subidos |
| `$_COOKIE` | Cookies del cliente |
| `$_SESSION` | Datos de la sesión |
| `$_ENV` | Variables de entorno del sistema |

Claves de `$_SERVER` que hay que saber:

```php
$_SERVER['PHP_SELF']         // ruta del script actual → action del form a sí mismo
$_SERVER['REQUEST_METHOD']   // GET o POST   (⚠️ no METHOD_REQUEST)
$_SERVER['SERVER_NAME']      // localhost
$_SERVER['SERVER_SOFTWARE']  // Apache/2.4...
$_SERVER['SERVER_PROTOCOL']  // HTTP/1.1
```

> ⚠️ **Trampa 1.** La superglobal con cabeceras, rutas y ubicación del servidor es **`$_SERVER`**, no `$_ENV`.
> ⚠️ **Trampa 2.** Para que un formulario se envíe a sí mismo se usa `action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"`, es decir, **`PHP_SELF`** y no `REQUEST_URI`.

🔗 `$_GET`, `$_POST` y `$_SERVER` son la base de los **formularios** de la UT3.

**Repaso**

1. ¿Qué superglobal usarías para saber si la petición es GET o POST, y con qué clave?
2. ¿Por qué POST es mejor que GET para enviar contraseñas?

<details><summary>Respuestas</summary>

1. `$_SERVER['REQUEST_METHOD']`.
2. Porque los datos van en el cuerpo de la petición y no se ven en la URL. Ojo: **no los cifra** (eso lo hace HTTPS).
</details>

---

## 7. Operadores

### Aritméticos y de asignación

`+ - * / % **` y sus versiones combinadas `+= -= *= /= %= .=`

```php
echo 12 % 5;    // 2  (resto)
echo 2 ** 3;    // 8  (potencia)
echo 3 / 2;     // 1.5 (la división entre enteros puede dar float)
$s = "Hola"; $s .= " mundo";   // "Hola mundo"
```

### Comparación

| Operador | Significado |
| --- | --- |
| `==` / `!=` / `<>` | Igual o distinto **convirtiendo los tipos** |
| `===` / `!==` | Igual o distinto **en valor y tipo** |
| `<=>` | "Nave espacial": devuelve **-1, 0 o 1** si `$a` es menor, igual o mayor |
| `??` | Fusión de null: el primer valor que exista y no sea NULL |

```php
var_dump(3 == "3");    // true
var_dump(3 === "3");   // false
echo 1 <=> 2;          // -1
$a = NULL; $b = 0; $c = 15;
echo $a ?? $b ?? $c;   // 0  (0 no es NULL, aunque sea "falso")
```

🔗 `===` es imprescindible con **`strpos()`**, que devuelve `0` cuando encuentra el texto al principio (ver [8](#8-funciones-nativas)).

### Lógicos

`&&` y `and` (y), `||` y `or` (o), `xor` (solo uno de los dos), `!` (no).

### Incremento y decremento

```php
$x = 5;
$y = ++$x;   // pre:  primero suma (x=6) y luego asigna → y=6
$z = $x++;   // post: primero asigna (z=6) y luego suma → x=7
echo "$x-$y-$z";   // 7-6-6
```

### Arrays

| Operador | Resultado |
| --- | --- |
| `$a + $b` | **Unión**: si una clave está repetida, **gana la de la izquierda** |
| `$a == $b` | Mismos pares clave/valor |
| `$a === $b` | Mismos pares, **mismo orden y mismos tipos** |

```php
$a = ["a" => "manzana"];
$b = ["a" => "pera", "b" => "platano"];
print_r($a + $b);   // [a => manzana, b => platano]
```

### Precedencia

Paréntesis → `**` → `* / %` → `+ -` → comparaciones → `!` → `&&` → `||`. En caso de duda, **usa paréntesis**.

**Repaso**

1. `$i = 3; echo $i++ + ++$i;` → ?
2. `var_dump("abc" == 0);` en PHP 8 → ?
3. `[1,2] + [5,6,7]` → ?

<details><summary>Respuestas</summary>

1. `8` (3 + 5).
2. `false`: en PHP 8 se compara el número como cadena, `"0"` con `"abc"`.
3. `[1, 2, 7]`: las claves 0 y 1 son las de la izquierda y solo se añade la clave 2.
</details>

---

## 8. Funciones nativas

### De variables y tipos

| Función | Devuelve TRUE si... |
| --- | --- |
| `isset($v)` | existe **y no es NULL** |
| `empty($v)` | no existe o vale `0`, `0.0`, `""`, **`"0"`**, `NULL`, `false` o `[]` |
| `is_null($v)` | es NULL |
| `is_int`, `is_float`, `is_string`, `is_bool`, `is_array`, `is_object` | es **exactamente** de ese tipo, sin convertir |
| `is_numeric($v)` | es un número **o un string numérico** (`"123.45"` → true) |

```php
$a = NULL;   echo isset($a) ? "SI" : "NO";   // NO
$b = "0";    var_dump(empty($b));            // true
var_dump(is_float("1.5"));    // false (es un string)
var_dump(is_numeric("1.5"));  // true
```

> ⚠️ **Trampa.** `empty()` **no** es solo para la cadena vacía: es TRUE con `0`, `"0"`, `NULL`, `false`, `""` y `[]`. 🔗 Es la misma tabla de "qué es false" de la sección 4.

- Para convertir: `intval()`, `floatval()`, `boolval()`, `strval()` y `settype($v, "integer")`. Ejemplo: `intval("323244.656")` → 323244 e `intval("ANBB")` → 0.
- Para depurar:
  - `var_dump()` muestra el tipo y la longitud: `string(4) "Hola"`.
  - `print_r()` es más legible. Ojo: `true` se imprime como `1` y `false` o `null` no imprimen nada.

### Cadenas

```php
strlen("Hola")                      // 4      mb_strlen() con tildes
strtoupper("hola") / strtolower()   // HOLA   mb_strtoupper() con tildes
ucfirst("ana") / ucwords("ana luz") // Ana / Ana Luz
trim("  hola  ")                    // "hola" (ambos lados)
ltrim() / rtrim()                   // solo la izquierda / solo la derecha
trim("///Hola///", "/")             // "Hola" (otros caracteres)
substr("Desarrollo Web", 3, 5)      // "arrol" (desde la posición 3, 5 caracteres)
substr("Desarrollo", -3)            // "llo" (negativo = desde el final)
substr_count("This is", "is")       // 2
str_replace("_", "-", "a_b_c")      // "a-b-c"
strtr("Martín", "at", "AT")         // "MArTín" (carácter a carácter)
strpos("servidor", "s")             // 0 → ¡posición 0, no false!
stripos()                           // igual, sin distinguir mayúsculas
strstr("buscar en otra", "en")      // "en otra" (desde la coincidencia hasta el final)
str_contains("hola", "ol")          // true (PHP 8)
strcmp("a", "b")                    // < 0 (0 si son iguales)
explode(",", "rojo,verde,azul")     // ["rojo","verde","azul"]  (separador, cadena)
implode("-", ["a","b"])             // "a-b"                    (separador, array)
```

> ⚠️ **Trampa con `strpos`.** Si el texto está **al principio**, devuelve `0`, y `0 == false` es TRUE.
>
> ```php
> $pos = strpos("servidor", "s");   // 0
> if ($pos == false)  echo "No encontrado";   // ⚠️ entra aquí (error)
> if ($pos === false) echo "No encontrado";   // ✔ forma correcta
> ```

> ⚠️ **Orden de los parámetros.** `explode(separador, cadena)`, `implode(separador, array)` y `array_key_exists(clave, array)`. La tabla del temario los pone al revés.

### Numéricas

```php
round(1.4956)     // 1      ⚠️ sin decimales redondea al entero más cercano
round(1.4956, 3)  // 1.496
round(1.75)       // 2
floor(1.8)        // 1      siempre hacia abajo
ceil(1.2)         // 2      siempre hacia arriba
rand(1, 9)        // aleatorio de 1 a 9, ambos incluidos
max(12, 5) / min()
```

> ⚠️ **Trampa.** `round(1.4956)` da **1**, no 1.5: sin segundo parámetro redondea a 0 decimales.
> ⚠️ **Trampa.** `array_map('floor', [1.8, 2.3])` da **[1, 2]**: aplica `floor` a cada elemento y `floor` siempre baja.

### Fechas

```php
date('d-m-Y H:i:s')                 // 16-11-2026 11:30:05
// d día, m mes, Y año (4 cifras), H hora 24h, i minutos, s segundos
// D/l nombre del día, M/F nombre del mes
time()                              // timestamp actual (segundos desde 01/01/1970)
mktime(19, 50, 2, 9, 7, 2020)       // timestamp de una fecha: (hora, min, seg, MES, DÍA, AÑO)
date('d-m-Y', 1599501002)           // timestamp → fecha
strtotime('10-09-2020 20:09:33')    // texto → timestamp
checkdate(11, 31, 2024)             // false: (MES, DÍA, AÑO) y noviembre tiene 30 días
```

🔗 `mktime()` y `checkdate()` comparten el orden **mes, día, año**, al estilo americano.

**Repaso**

1. `isset($x)` con `$x = ""` → ? ¿Y `empty($x)`?
2. `substr("Servidor", 2, 3)` → ?
3. `explode(" ", "a b c")[2]` → ?
4. `floor(-1.5)` → ?

<details><summary>Respuestas</summary>

1. `true` (existe y no es NULL) y `true` (la cadena vacía cuenta como vacía).
2. `"rvi"`.
3. `"c"`.
4. `-2`, porque siempre baja.
</details>

---

## 9. Otras preguntas de la autoevaluación

La autoevaluación de la UT2 también preguntó cosas que se ven a fondo en la UT3. Esto es lo mínimo que hay que saber:

### Control de flujo

```php
// switch SIN break: entra en el case que coincide y sigue por todos los de debajo (fall-through)
$i = 1;
switch ($i) { case 0: echo "A"; case 1: echo "B"; case 2: echo "C"; default: echo "D"; }
// → BCD

// do-while: se ejecuta AL MENOS una vez, aunque la condición sea falsa desde el principio
$i = 10;
do { echo $i; $i++; } while ($i < 5);   // → 10

// foreach con clave
foreach (["Ana" => 20, "Pedro" => 25] as $clave => $valor) echo "$clave:$valor ";
// → Ana:20 Pedro:25

break 2;   // sale del bucle actual Y del bucle que lo contiene
```

### Funciones

```php
// Los parámetros con valor por defecto van A LA DERECHA de los obligatorios
function saludo($nombre, $saludo = "Hola") { return "$saludo $nombre"; }   // ✔
// function saludo($saludo = "Hola", $nombre) { ... }                      // ✘

function duplicar(&$valor) { $valor *= 2; }   // por referencia
$num = 5; duplicar($num); echo $num;          // 10
```

### Inclusión de archivos

| | Si el archivo no existe |
| --- | --- |
| `include` | Warning y **sigue** |
| `require` | Warning + **Error fatal: se para** |
| `include_once` / `require_once` | Igual, pero **no lo incluyen dos veces** |

### Excepciones

- `try { } catch (Exception $e) { } finally { }`: el bloque **`finally` se ejecuta SIEMPRE**.
- En PHP 7+, `Exception` y `Error` implementan la interfaz **`Throwable`**.

### Arrays

- `array_keys(["x"=>10, "y"=>20])` → `["x", "y"]`.
- Ordenación:
  - `sort` / `rsort`: por valor, y **pierden las claves**.
  - `asort` / `arsort`: por valor, y **mantienen las claves**.
  - `ksort` / `krsort`: **por clave**.
  - `usort`: con una función propia.

### Formularios y cabeceras

- `filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT)` filtra o valida **sin tocar `$_POST` directamente**.
- `header("Location: inicio.php");` solo funciona si **no se ha enviado nada antes** al navegador: ni HTML, ni `echo`, ni espacios antes de `<?php`. 🔗 Por eso se omite `?>` (sección 2).

---

## 10. Chuleta final de trampas

| Pregunta | ✘ Lo que se marcó | ✔ Correcto |
| --- | --- | --- |
| `100 + "50 euros"` | 10050 euros | **150** (el `+` suma) |
| Global dentro de una función sin `global` | Error fatal | **Aviso: variable local no definida** |
| `array_map('floor', [1.8, 2.3])` | [2, 2] | **[1, 2]** |
| Comillas `"` vs `'` | Las simples interpolan | **Las dobles interpolan** |
| ¿Por qué omitir `?>`? | Ocultar el código | **Evitar espacios o saltos de línea finales** |
| `empty()` es TRUE con... | Solo `""` | **0, "0", "", NULL, false, []** |
| Interfaz base de Exception y Error | ErrorHandler | **Throwable** |
| Parámetros por defecto | Máximo dos | **A la derecha de los obligatorios** |
| `round(1.4956)` | 1.5 | **1** |
| `action` del form al mismo archivo | REQUEST_URI | **`$_SERVER['PHP_SELF']`** |
| Cabeceras, rutas y servidor | `$_ENV` | **`$_SERVER`** |
| Validar entradas sin superglobales | validate_post() | **filter_input()** |
| `do { } while ($i < 5)` con `$i = 10` | (sin contestar) | **10** (se ejecuta una vez) |
| `switch` sin `break` con `$i = 1` | (sin contestar) | **BCD** |
| `duplicar(&$valor)` con 5 | (sin contestar) | **10** |
| `foreach ($edades as $k => $v)` | (sin contestar) | **Ana:20 Pedro:25** |
| `strpos` al principio y `== false` | (sin contestar) | **"No encontrado"** (por eso se usa `===`) |

> **Consejo para el test con penalización:** cada fallo resta 0,5, así que si dudas entre más de dos opciones, déjala en blanco. Las preguntas de "¿qué imprime?" se resuelven escribiendo en un papel el valor de cada variable línea a línea.

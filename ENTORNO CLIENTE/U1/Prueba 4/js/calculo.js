/* ============================================================
   EJERCICIO 7 - Actividad de laboratorio (Apartado 1.4)
   Práctica del criterio 1.d: los errores de un lenguaje de script
   NO se detectan en compilación, sino en TIEMPO DE EJECUCION.

   Este fichero intenta ejecutar una operacion matematica usando
   una variable que NO ha sido declarada previamente.

   Que se observe al abrir la pagina y mirar la consola (F12):
     1. Las lineas anteriores al fallo se ejecutan con normalidad.
     2. Al alcanzar la linea fallida, el interprete se detiene:
        el ReferenceError interrumpe la ejecucion de ESTE fichero.
     3. Las lineas posteriores a la fallida NO llegan a ejecutarse.
   ============================================================ */

console.log("--- calculo.js: inicio de la ejecucion ---");

// 1. Estas dos variables SI estan declaradas con const, asi que funcionan.
const precio = 25;
const iva = 0.21;

console.log("1. precio declarado:", precio);
console.log("2. iva declarado:", iva);

// 2. Esta linea se ejecuta correctamente: las variables existen.
const subtotal = precio * 3;
console.log("3. Subtotal (precio * 3):", subtotal);

// 3. En un lenguaje tradicional (Java, C++ o C#) este codigo NO COMPILARIA:
//    el compilador avisaria de que "descuento" no existe y el ejecutable
//    no se generaria nunca. En JavaScript no hay compilacion, asi que el
//    fallo aparece ahora, al ejecutar esta linea concreta.
console.log("4. A partir de aqui se intenta usar una variable NO declarada...");
const total = subtotal - descuento; // <-- ReferenceError: descuento is not defined

// 4. Estas lineas NUNCA se ejecutan: el interprete se detuvo en la anterior.
console.log("5. Esta linea no llega a mostrarse porque el script ya se detuvo.");
console.log("6. Total con descuento:", total);

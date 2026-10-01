/* Apartado 1.5 (punto D): script externo en el <head> SIN atributo defer.
   Al no llevar "defer", el navegador detiene el analisis del HTML en este
   punto para descargar y ejecutar el script. En ese instante el elemento
   #puntoDeControl, que esta en el <body>, TODAVIA NO EXISTE en el DOM.

   Resultado: document.getElementById devuelve null y al intentar
   escribir en .textContent se produce un TypeError. */

console.log("[sin defer] el script se ejecuta antes de que exista el <body>");

const puntoSinDefer = document.getElementById("puntoDeControl");

// Esta comprobacion es la buena practica: verificar antes de usar.
if (puntoSinDefer === null) {
  console.error(
    "[sin defer] ERROR: document.getElementById('puntoDeControl') devuelve null. " +
      "El elemento del <body> todavia no ha sido leido ni construido en el DOM."
  );
}

// La siguiente linea lanza el error de forma intencionada, para que se vea
// en la consola el fallo en tiempo de ejecucion descrito en el tema.
puntoSinDefer.textContent = "ERROR: el elemento del body todavia no existe en el DOM";


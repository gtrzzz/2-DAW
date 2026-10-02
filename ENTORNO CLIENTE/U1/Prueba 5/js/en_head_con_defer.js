/* Apartado 1.5 (punto D): script externo en el <head> CON atributo defer.
   "defer" hace que el navegador descargue el archivo en segundo plano
   mientras sigue construyendo el HTML, pero retrasa su ejecucion hasta
   que el documento se ha parseado por completo.

   Consecuencia: cuando este codigo se ejecuta, el <body> ya esta entero
   en el DOM, asi que document.getElementById si encuentra el elemento.
   Es exactamente el mismo codigo que en_head_sin_defer.js y funciona. */

console.log("[con defer] el script se ejecuta DESPUES de parsear todo el HTML");

const puntoConDefer = document.getElementById("puntoDeControl");

if (puntoConDefer === null) {
  console.error("[con defer] ERROR inesperado: el elemento no deberia faltar todavia");
} else {
  puntoConDefer.textContent = "OK: este texto lo ha escrito js/en_head_con_defer.js desde el <head> con atributo defer";
  puntoConDefer.classList.add("ok");
  console.log("[con defer] el elemento #puntoDeControl ya existia en el DOM al ejecutarse");
}


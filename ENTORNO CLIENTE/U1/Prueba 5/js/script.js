/* Actividad 1 del apartado 1.5
   Ficheros EXTERNOS separados: toda la logica vive aqui y el HTML
   solo la enlaza con <script src="./js/script.js"></script>.

   Ventaja tecnica: este archivo se descarga una sola vez y queda en la
   memoria cache del navegador, de modo que cualquier otra pagina del
   mismo sitio que lo enlace no lo vuelve a pedir por la red. */

function diAlgo() {
  // alert() abre un cuadro de aviso modal y bloquea la ejecucion
  // de la pagina hasta que el usuario pulse "Aceptar".
  alert("hola");
}

// Invocacion directa al cargarse el fichero: el script se ejecuta en cuanto
// el navegador lo ha descargado y analizado, sin esperar a nada mas.
diAlgo();

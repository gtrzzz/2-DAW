/* Apartado 1.5 (punto D): script externo con atributo async.
   "async" descarga el archivo en segundo plano y lo ejecuta en cuanto
   termina la descarga, sin esperar a que el HTML este terminado.

   Se usa sobre todo para scripts independientes del resto de la pagina
   (analiticas, contadores, publicidad). OJO: el ORDEN de ejecucion de dos
   scripts "async" NO esta garantizado, porque depende de cual termine de
   descargarse primero. Por eso el boton de esta pagina se enlaza aqui en
   vez de desde el HTML. */

console.log("[async] inicio de la carga del script asincrono");

function registrarEvento(momento, texto) {
  const salida = document.getElementById("salidaOrden");
  const linea = `${momento.padEnd(8)} ${texto}`;
  if (salida) {
    salida.textContent += linea + "\n";
  }
  console.log(linea);
}

document.addEventListener("DOMContentLoaded", () => {
  registrarEvento("DOM", "DOMContentLoaded: el HTML ya esta construido");
  registrarEvento("script", "[async] este script se ha ejecutado al terminar su descarga");

  registrarEvento(
    "nota",
    "El script se descargo en paralelo con el HTML y se ejecuto sin esperar a que terminara el documento."
  );
});

window.addEventListener("load", () => {
  registrarEvento("load", "load: se han cargado tambien los demas recursos (imagenes, css)");
});

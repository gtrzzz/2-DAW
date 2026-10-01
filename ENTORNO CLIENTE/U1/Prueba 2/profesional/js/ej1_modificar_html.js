/* Ejercicio 1 del apartado 1.2
   La funcion document.getElementById() localiza un nodo del DOM
   mediante su atributo id y permite modificarlo en caliente, sin
   recargar la pagina y sin pedir nada al servidor.

   En los apuntes originales este codigo estaba escrito dentro de los
   atributos onclick de los botones. Aqui se ha trasladado a un fichero
   .js externo y se enlaza con addEventListener(), que es la forma
   recomendada. */

function cambiarParrafo() {
  // document.getElementById("prueba") devuelve el nodo <p id="prueba">
  const parrafo = document.getElementById("prueba");

  // innerHTML interpreta el contenido como HTML: permite inyectar etiquetas.
  parrafo.innerHTML = "CAMBIANDO el contenido!";

  console.log("Ejercicio 1: parrafo modificado con innerHTML.");
}

function cambiarEncabezado() {
  const encabezado = document.getElementById("h1cambio");

  // textContent solo cambia el texto: es mas rapido y mas seguro que
  // innerHTML, porque no interpreta etiquetas ni permite inyeccion de HTML.
  encabezado.textContent = "CAMBIANDO el encabezado!";

  const salida = document.getElementById("salida");
  salida.textContent =
    "Se han modificado a la vez el <p> y el <h1>:\n" +
    "  document.getElementById('prueba').innerHTML = 'CAMBIANDO el contenido!'\n" +
    "  document.getElementById('h1cambio').textContent = 'CAMBIANDO el encabezado!'\n" +
    "El archivo HTML no ha cambiado: solo el DOM en memoria.";

  console.log("Ejercicio 1: encabezado modificado con textContent.");
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("btnParrafo").addEventListener("click", cambiarParrafo);
  document.getElementById("btnEncabezado").addEventListener("click", cambiarEncabezado);
  console.log("ej1_modificar_html.js cargado correctamente.");
});

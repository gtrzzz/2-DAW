/* ============================================================
   Práctica de laboratorio guiada - Apartado 1.5
   Este bloque estaba EMBEBIDO dentro de index.html y se ha TRASLADADO
   a la carpeta js/ como fichero externo independiente.

   Ventajas de haberlo hecho asi:
     - el HTML queda limpio, solo con la estructura del documento
     - el navegador cachea este .js y no lo vuelve a descargar
     - se puede reutilizar y mantener en un solo sitio
   ============================================================ */

// Paleta de colores por la que va alternando el boton al pulsarlo.
const COLORES = [
  { fondo: "#1d4ed8", texto: "#ffffff", nombre: "azul" },
  { fondo: "#b91c1c", texto: "#ffffff", nombre: "rojo" },
  { fondo: "#15803d", texto: "#ffffff", nombre: "verde" },
  { fondo: "#b45309", texto: "#ffffff", nombre: "naranja" },
  { fondo: "#6d28d9", texto: "#ffffff", nombre: "morado" }
];

// Indice del color actual. Se declara fuera de la funcion para que
// conserve su valor entre pulsaciones.
let indiceColor = 0;

function cambiarColorBoton() {
  indiceColor = (indiceColor + 1) % COLORES.length;
  const color = COLORES[indiceColor];

  const boton = document.getElementById("btnColor");
  const mensaje = document.getElementById("mensaje");

  // .style.backgroundColor y .style.color escriben en el estilo EN LINEA
  // del elemento, que tiene mas prioridad que la regla de css/estilos.css.
  boton.style.backgroundColor = color.fondo;
  boton.style.color = color.texto;

  const traza =
    `Cambio ${indiceColor + 1}/${COLORES.length}: ` +
    `boton.style.backgroundColor = "${color.fondo}"\n` +
    `boton.style.color = "${color.texto}"\n` +
    `Fichero ejecutado: ./js/logica.js`;

  mensaje.textContent = traza;
  console.log(traza);
}

// Se espera a que el DOM este construido antes de enganchar el evento.
// Aunque el script se enlaza con defer (y por tanto el DOM ya esta listo),
// registrar el evento dentro de DOMContentLoaded es la forma mas robusta:
// es valida tanto para un <script defer> en el <head> como para un
// <script> normal colocado al final del <body>.
document.addEventListener("DOMContentLoaded", () => {
  const boton = document.getElementById("btnColor");

  if (boton === null) {
    console.error("No se ha encontrado el elemento #btnColor en el DOM");
    return;
  }

  boton.addEventListener("click", cambiarColorBoton);

  // Traza de carga: permite comprobar en la consola que el fichero
  // externo se ha descargado y ejecutado correctamente.
  console.log("logica.js cargado correctamente desde la carpeta /js");
  console.log("Pulsa el boton para cambiar su color.");
});

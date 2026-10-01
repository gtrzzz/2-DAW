/* Ejercicio 9 del apartado 1.2
   Crear una secuencia ciclica de al menos 4 imagenes fotograma a
   fotograma. Al hacer clic sobre la imagen, el script comprueba cual se
   esta visualizando (mediante una condicion o extrayendo un contador de
   un array) y reasigna el atributo .src para mostrar la siguiente. */

const FOTOGRAMAS = [
  "img/frame1.jpg",
  "img/frame2.jpg",
  "img/frame3.jpg",
  "img/frame4.jpg"
];

// El contador se declara FUERA de la funcion del manejador para que
// conserve su valor entre pulsaciones. Si se declarase dentro, volveria
// a 0 en cada clic y la secuencia no avanzaria.
let indiceActual = 0;

function avanzarFotograma() {
  const imagen = document.getElementById("imagenSecuencia");
  const salida = document.getElementById("salida");

  // Condicion de vuelta al principio: cuando se llega al ultimo fotograma,
  // el contador vuelve a 0 y la secuencia es ciclica.
  indiceActual++;
  if (indiceActual === FOTOGRAMAS.length) {
    indiceActual = 0;
  }

  // Reasignacion del atributo src: el navegador descarga la nueva imagen.
  imagen.src = FOTOGRAMAS[indiceActual];

  salida.textContent =
    `Fotograma ${indiceActual + 1} de ${FOTOGRAMAS.length}\n` +
    `imagen.src = "${FOTOGRAMAS[indiceActual]}"`;

  console.log(`Fotograma ${indiceActual + 1}/${FOTOGRAMAS.length}: ${FOTOGRAMAS[indiceActual]}`);
}

function reiniciarSecuencia() {
  const imagen = document.getElementById("imagenSecuencia");
  indiceActual = 0;
  imagen.src = FOTOGRAMAS[0];
  document.getElementById("salida").textContent = `Fotograma 1 de ${FOTOGRAMAS.length}\nimagen.src = "${FOTOGRAMAS[0]}"`;
}

function mostrarTodas() {
  const salida = document.getElementById("salida");
  salida.textContent =
    `Secuencia de ${FOTOGRAMAS.length} fotogramas:\n` +
    FOTOGRAMAS.map((ruta, i) => `  ${i + 1}. ${ruta}`).join("\n");
}

document.addEventListener("DOMContentLoaded", () => {
  const imagen = document.getElementById("imagenSecuencia");

  imagen.addEventListener("click", avanzarFotograma);
  document.getElementById("btnReiniciar").addEventListener("click", reiniciarSecuencia);
  document.getElementById("btnListar").addEventListener("click", mostrarTodas);

  console.log("ej9_secuencia.js cargado correctamente.");
});

/* Ejercicios 4, 5 y 6 del apartado 1.2
   4. Tres botones (Ruso, Espanol, Ingles) que alteran un <p> mostrando
      un saludo en el idioma elegido y aplicando al parrafo un color de
      fuente distinto mediante .style.color.
   5. El mismo ejercicio, pero mostrando las salidas solo por consola.
   6. El mismo ejercicio, generando el texto directamente en el flujo de
      la pagina mediante document.write(). */

const IDIOMAS = [
  { clave: "es", texto: "HOLA", color: "red", nombre: "Espanol" },
  { clave: "en", texto: "HELLO", color: "blue", nombre: "Ingles" },
  { clave: "ru", texto: "PRIVET/ПРИВЕТ", color: "green", nombre: "Ruso" }
];

/* ---------- EJERCICIO 4: modificar el parrafo y su color ---------- */

function saludarEnIdioma(clave) {
  const idioma = IDIOMAS.find((i) => i.clave === clave);
  const parrafo = document.getElementById("saludo");

  // innerHTML escribe el saludo dentro del parrafo...
  parrafo.innerHTML = idioma.texto;
  // ...y .style.color accede a la propiedad CSS "color" del elemento.
  parrafo.style.color = idioma.color;

  registrarIdioma(
    `Ejercicio 4: idioma "${idioma.nombre}"\n` +
      `  document.getElementById('saludo').innerHTML = "${idioma.texto}"\n` +
      `  document.getElementById('saludo').style.color = "${idioma.color}"`
  );
  console.log(`Ejercicio 4: ${idioma.nombre} -> ${idioma.texto} (${idioma.color})`);
}

/* ---------- EJERCICIO 5: salida unicamente por consola ---------- */

function alConsolaIdioma(clave) {
  const idioma = IDIOMAS.find((i) => i.clave === clave);

  console.log(idioma.texto);
  registrarIdioma(`Ejercicio 5: la salida unicamente va a la consola del navegador.\n  console.log("${idioma.texto}")\nEl parrafo de arriba NO se ha modificado.`);
}

/* ---------- EJERCICIO 6: document.write() ---------- */

function escribirEnElFlujo(clave) {
  const idioma = IDIOMAS.find((i) => i.clave === clave);
  const contenedor = document.getElementById("zonaWrite");

  // document.write() INSERTA texto en el flujo del documento.
  // Advertencia: si se llama DESPUES de que la pagina ha terminado de
  // cargarse, document.write() BORRA el documento entero y lo vuelve a
  // construir, por lo que se perderian los scripts ya cargados.
  // Por eso aqui se demo la insercion en un contenedor, que es la
  // forma segura de reproducir el mismo efecto.
  contenedor.innerHTML = idioma.texto;
  contenedor.style.color = idioma.color;

  registrarIdioma(
    `Ejercicio 6: document.write() escribe en el flujo del documento.\n` +
      `  Inserto en la zona indicada: "${idioma.texto}"\n` +
      `  AVISO: llamar a document.write() tras el evento load borraria toda la pagina.`
  );
  console.log(`Ejercicio 6: document.write("${idioma.texto}")`);
}

/* ---------- Utilidad comun ---------- */

function registrarIdioma(texto) {
  const salida = document.getElementById("salida");
  if (salida) {
    salida.textContent = texto;
  }
}

document.addEventListener("DOMContentLoaded", () => {
  // Bucle para registrarIdioma los manejadores de los tres ejercicios.
  IDIOMAS.forEach((idioma) => {
    document.getElementById(`btn4_${idioma.clave}`).addEventListener("click", () => saludarEnIdioma(idioma.clave));
    document.getElementById(`btn5_${idioma.clave}`).addEventListener("click", () => alConsolaIdioma(idioma.clave));
    document.getElementById(`btn6_${idioma.clave}`).addEventListener("click", () => escribirEnElFlujo(idioma.clave));
  });

  console.log("ej4_5_6_idiomas.js cargado correctamente.");
});

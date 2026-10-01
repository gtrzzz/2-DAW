/* Ejercicio 8 del apartado 1.2
   Test interactivo de siete preguntas con botones "Verdadero" y "Falso".
   Al hacer clic, el script EVALUA si la respuesta es correcta y modifica
   la propiedad de estilo .style.color = "green" (acierto) o
   .style.color = "red" (error).

   Las respuestas correctas se declaran en el HTML con el atributo
   data-correcta, de modo que la logica no esta escrita a mano y se puede
   anadir o quitar preguntas sin tener que tocar este fichero. */

const COLOR_ACIERTO = "green";
const COLOR_ERROR = "red";
const TOTAL_PREGUNTAS = 7;

let aciertos = 0;
let respondidas = 0;

function comprobarRespuesta(boton) {
  // El boton lleva data-respuesta="true" o "false": lo que el usuario afirma.
  const respuestaElegida = boton.dataset.respuesta === "true";

  const bloque = boton.closest(".pregunta");
  // El enunciado lleva data-correcta="true" o "false": la verdad.
  const respuestaCorrecta = bloque.dataset.correcta === "true";
  const acierto = respuestaElegida === respuestaCorrecta;

  // .style.color escribe directamente en el estilo en linea del elemento,
  // que tiene prioridad sobre cualquier regla de estilos.css.
  boton.style.color = acierto ? COLOR_ACIERTO : COLOR_ERROR;
  boton.style.fontWeight = "bold";

  // Se resaltan las dos respuestas posibles, no solo la pulsada.
  bloque.querySelectorAll("button").forEach((otro) => {
    if (otro !== boton) {
      otro.style.color = "";
      otro.style.fontWeight = "";
    }
  });

  bloque.dataset.acierto = String(acierto);
  bloque.dataset.respondida = "true";
  bloquearPregunta(bloque);
  mostrarRetroalimentacion(bloque, acierto, respuestaCorrecta);
  actualizarContador(acierto);

  console.log(
    `${bloque.dataset.numero}. ${bloque.dataset.enunciado} -> ` +
      `${boton.dataset.respuesta} : ${acierto ? "ACIERTO" : "ERROR"}`
  );
}

function mostrarRetroalimentacion(bloque, acierto, respuestaCorrecta) {
  const feedback = document.getElementById("resultado");
  const numero = bloque.dataset.numero;
  const verdad = respuestaCorrecta ? "verdadero" : "falso";

  if (acierto) {
    feedback.textContent = `Pregunta ${numero}: ¡ACIERTO! La respuesta verdadera es "${verdad}".`;
    feedback.className = "salida ok";
  } else {
    feedback.textContent = `Pregunta ${numero}: ERROR. La respuesta correcta es "${verdad}".`;
    feedback.className = "salida error";
  }
}

function bloquearPregunta(bloque) {
  bloque.querySelectorAll("button").forEach((boton) => {
    boton.disabled = true;
    boton.style.opacity = "0.85";
    boton.style.cursor = "not-allowed";
  });
  bloque.style.backgroundColor = "#f8fafc";
}

function actualizarContador(acierto) {
  respondidas++;
  if (acierto) {
    aciertos++;
  }
  document.getElementById("contador").textContent =
    `Respondidas: ${respondidas} / ${TOTAL_PREGUNTAS}   |   Aciertos: ${aciertos}`;
}

function reiniciarTest() {
  aciertos = 0;
  respondidas = 0;

  document.querySelectorAll(".pregunta").forEach((bloque) => {
    bloque.querySelectorAll("button").forEach((boton) => {
      boton.style.color = "";
      boton.style.fontWeight = "";
      boton.disabled = false;
      boton.style.opacity = "";
      boton.style.cursor = "";
    });
    bloque.style.backgroundColor = "";
    bloque.dataset.respondida = "false";
  });

  const feedback = document.getElementById("resultado");
  feedback.textContent = "Test reiniciado.";
  feedback.className = "salida";
  document.getElementById("contador").textContent = `Respondidas: 0 / ${TOTAL_PREGUNTAS}   |   Aciertos: 0`;
}

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".pregunta button").forEach((boton) => {
    boton.addEventListener("click", () => {
      const bloque = boton.closest(".pregunta");

      // Cada pregunta solo admite una respuesta.
      if (bloque.dataset.respondida === "true") {
        console.log(`La pregunta ${bloque.dataset.numero} ya estaba respondida: se ignora el clic.`);
        return;
      }
      comprobarRespuesta(boton);
    });
  });

  document.getElementById("btnReiniciar").addEventListener("click", reiniciarTest);
  console.log("ej8_test_interactivo.js cargado correctamente.");
});

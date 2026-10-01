/* Ejercicio 7 del apartado 1.2
   Interfaz compuesta por un titular <h1>, un parrafo <p id="estado">
   y tres botones:
     - Boton 1 (Consola): emite una traza mediante console.log() indicando
       la hora del sistema.
     - Boton 2 (Estilo): modifica el color de fondo del parrafo a verde y
       su texto a "Sistema Activo" mediante innerHTML y .style.backgroundColor.
     - Boton 3 (Alerta): lanza un cuadro modal mediante window.alert()
       avisando de que el proceso ha concluido. */

function registrarTraza(momento, mensaje) {
  const salida = document.getElementById("salida");
  if (salida) {
    salida.textContent = `${momento}  ${mensaje}\n` + salida.textContent;
  }
}

function botonConsola() {
  // toLocaleTimeString() devuelve la hora del sistema en el formato local
  // del usuario, por ejemplo "14:35:07".
  const hora = new Date().toLocaleTimeString();

  console.log("Hora del sistema: " + hora);
  registrarTraza("consola", `console.log("Hora del sistema: ${hora}")`);
}

function botonEstilo() {
  const estado = document.getElementById("estado");

  // innerHTML cambia el TEXTO del parrafo...
  estado.innerHTML = "Sistema Activo";
  // ...y .style.backgroundColor cambia su COLOR DE FONDO.
  estado.style.backgroundColor = "green";

  console.log("El estado del sistema ha pasado a 'Sistema Activo'.");
  registrarTraza("estilo", "estado.innerHTML = 'Sistema Activo'  |  estado.style.backgroundColor = 'green'");
}

function botonAlerta() {
  window.alert("El proceso ha concluido.");
  console.log("Alerta modal mostrada: el proceso ha concluido.");
  registrarTraza("alerta", "window.alert('El proceso ha concluido.')");
}

function restablecer() {
  const estado = document.getElementById("estado");
  estado.innerHTML = "Sistema en espera";
  estado.style.backgroundColor = "";
  const salida = document.getElementById("salida");
  if (salida) {
    salida.textContent = "";
  }
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("btnConsola").addEventListener("click", botonConsola);
  document.getElementById("btnEstilo").addEventListener("click", botonEstilo);
  document.getElementById("btnAlerta").addEventListener("click", botonAlerta);
  document.getElementById("btnReset").addEventListener("click", restablecer);
  console.log("ej7_interfaz.js cargado correctamente.");
});

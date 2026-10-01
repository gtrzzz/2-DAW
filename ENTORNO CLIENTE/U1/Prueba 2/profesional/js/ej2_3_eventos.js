/* Ejercicios 2 y 3 del apartado 1.2
   2. Capturar el evento clic de un boton para emitir una traza
      informativa con console.log().
   3. El mismo ejercicio, pero sustituyendo la traza por un cuadro
      de aviso modal con window.alert() / alert(). */

function alConsola() {
  // console.log() escribe un mensaje en la consola de las herramientas
  // de desarrollo. No interrumpe la ejecucion ni molesta al usuario.
  console.log("Se ha pulsado el botón");
}

function mostrarAlerta() {
  // window.alert() abre un cuadro de aviso MODAL: bloquea la pagina
  // entera hasta que el usuario pulsa "Aceptar" o "OK".
  window.alert("Se ha pulsado el botón");
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("btnConsola").addEventListener("click", alConsola);
  document.getElementById("btnAlerta").addEventListener("click", mostrarAlerta);
  console.log("ej2_3_eventos.js cargado correctamente.");
});

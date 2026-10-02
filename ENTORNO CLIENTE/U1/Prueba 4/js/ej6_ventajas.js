/* Ejercicio 6 del apartado 1.4
   Demostracion de la ventaja "agilidad": modificar el DOM en caliente,
   sin recargar la pagina y sin peticiones al servidor. */

const ESTADO_INICIAL = {
  html: "<strong>Elemento de demostración</strong>",
  color: "",
  visible: true
};

function registrarVentaja(mensaje) {
  const salida = document.getElementById("salidaDemo");
  salida.textContent = mensaje;
  console.log(mensaje);
}

document.addEventListener("DOMContentLoaded", () => {
  const elemento = document.getElementById("demoVentaja");

  document.getElementById("btnTexto").addEventListener("click", () => {
    // textContent: solo cambia el texto, es mas rapido y seguro que innerHTML
    elemento.textContent = "Texto cambiado con textContent, sin recargar la página";
    registrarVentaja("textContent aplicado: el HTML del resto de la pagina no se ha tocado.");
  });

  document.getElementById("btnHtml").addEventListener("click", () => {
    // innerHTML: inyecta marcado nuevo
    elemento.innerHTML = "<em>Marcado cambiado con innerHTML</em>: <u>subrayado</u> y <b>negrita</b>";
    registrarVentaja("innerHTML aplicado: se ha inyectado marcado nuevo en el DOM.");
  });

  document.getElementById("btnColor").addEventListener("click", () => {
    // .style.color accede a la propiedad de estilo CSS del elemento
    elemento.style.color = "crimson";
    registrarVentaja(".style.color = 'crimson' aplicado.");
  });

  document.getElementById("btnOcultar").addEventListener("click", () => {
    if (elemento.style.display === "none") {
      elemento.style.display = "block";
      registrarVentaja("Elemento mostrado de nuevo (.style.display = 'block').");
    } else {
      elemento.style.display = "none";
      registrarVentaja("Elemento oculto (.style.display = 'none').");
    }
  });

  document.getElementById("btnReset").addEventListener("click", () => {
    elemento.innerHTML = ESTADO_INICIAL.html;
    elemento.style.color = ESTADO_INICIAL.color;
    elemento.style.display = ESTADO_INICIAL.visible ? "block" : "none";
    registrarVentaja("Estado restablecido.");
  });
});

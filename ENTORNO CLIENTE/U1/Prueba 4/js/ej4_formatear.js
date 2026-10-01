/* Ejercicio 4 del apartado 1.4
   formatearFechaEspanola(fecha) -> "DD/MM/YYYY HH:mm" usando padStart(2, "0") */

/**
 * Formatea un objeto Date en formato espanol DD/MM/YYYY HH:mm.
 * @param {Date} fecha objeto Date del anfitrion
 * @returns {string} texto con el formato DD/MM/YYYY HH:mm
 */
function formatearFechaEspanola(fecha) {
  // String(...) es obligatorio: los getters de Date devuelven numeros
  // y padStart solo existe en las cadenas de texto.
  const dia = String(fecha.getDate()).padStart(2, "0");
  const mes = String(fecha.getMonth() + 1).padStart(2, "0"); // +1: el mes es base 0
  const anio = fecha.getFullYear();
  const hora = String(fecha.getHours()).padStart(2, "0");
  const minuto = String(fecha.getMinutes()).padStart(2, "0");

  return `${dia}/${mes}/${anio} ${hora}:${minuto}`;
}

function ejecutarFormateo() {
  const valor = document.getElementById("fecha").value;
  const salida = document.getElementById("resultado");

  if (!valor) {
    salida.textContent = "Selecciona una fecha.";
    salida.className = "salida error";
    return;
  }

  // El input datetime-local entrega "AAAA-MM-DDTHH:mm" en hora local, que es
  // justo el formato que el constructor Date entiende sin ambiguedad.
  const fecha = new Date(valor);
  const texto = formatearFechaEspanola(fecha);

  salida.textContent =
    `new Date("${valor}")\n` +
    `formatearFechaEspanola(fecha) = ${texto}\n` +
    `Sin padStart habria salido:  ${fecha.getDate()}/${fecha.getMonth() + 1}/${fecha.getFullYear()} ${fecha.getHours()}:${fecha.getMinutes()}`;
  salida.className = "salida";

  console.log(valor, "->", texto);
}

function pintarTablaFormatos() {
  const casos = [
    new Date(2026, 8, 28, 14, 45, 10),
    new Date(2026, 0, 5, 3, 7, 0),
    new Date(2026, 11, 25, 10, 30, 0, 0),
    new Date(2026, 8, 28, 0, 0, 0, 0),
    new Date(2026, 8, 28, 23, 59, 0, 0)
  ];

  const contenedor = document.getElementById("tablaCasos");
  let texto = "Caso de entrada                              -> resultado\n";

  casos.forEach((fecha) => {
    const entrada = `${fecha.getFullYear()}-${String(fecha.getMonth() + 1).padStart(2, "0")}-${String(fecha.getDate()).padStart(2, "0")} ` +
      `${String(fecha.getHours()).padStart(2, "0")}:${String(fecha.getMinutes()).padStart(2, "0")}`;
    texto += `${entrada}  -> ${formatearFechaEspanola(fecha)}\n`;
  });

  // Comprobacion de padStart aislado
  texto += "\npadStart aislado:\n";
  texto += `  "5".padStart(2, "0")     = ${"5".padStart(2, "0")}\n`;
  texto += `  "5".padStart(4, "0")     = ${"5".padStart(4, "0")}\n`;
  texto += `  "9".padStart(3, "-")     = ${"9".padStart(3, "-")}\n`;
  texto += `  "hola".padStart(8, "*")  = ${"hola".padStart(8, "*")}\n`;

  contenedor.textContent = texto;
  console.log(texto);
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("btnFormatear").addEventListener("click", ejecutarFormateo);
  document.getElementById("btnAhora").addEventListener("click", () => {
    const ahora = new Date();
    const mes = String(ahora.getMonth() + 1).padStart(2, "0");
    const dia = String(ahora.getDate()).padStart(2, "0");
    const hora = String(ahora.getHours()).padStart(2, "0");
    const minuto = String(ahora.getMinutes()).padStart(2, "0");
    document.getElementById("fecha").value = `${ahora.getFullYear()}-${mes}-${dia}T${hora}:${minuto}`;
    ejecutarFormateo();
  });
  pintarTablaFormatos();
  ejecutarFormateo();
});

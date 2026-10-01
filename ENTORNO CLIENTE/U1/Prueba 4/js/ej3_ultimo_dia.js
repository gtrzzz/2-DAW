/* Ejercicio 3 del apartado 1.4
   obtenerUltimoDiaMes(anio, mes) -> numero de dias del mes (1 = enero ... 12 = diciembre)
   Se resuelve con el desbordamiento del constructor Date pasando "dia 0". */

const NOMBRES_MESES = [
  "enero", "febrero", "marzo", "abril", "mayo", "junio",
  "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
];

/**
 * Devuelve el numero de dias del mes indicado.
 * @param {number} anio anio completo (ej. 2026)
 * @param {number} mes  mes en formato humano: 1 = enero ... 12 = diciembre
 * @returns {number} dias del mes (28, 29, 30 o 31)
 */
function obtenerUltimoDiaMes(anio, mes) {
  if (mes < 1 || mes > 12) {
    return NaN;
  }

  // El indice de mes es base 0, asi que pasar "mes" (1-12) apunta al mes SIGUIENTE.
  // Con "dia 0" el motor retrocede un dia y cae en el ultimo dia del mes pedido.
  // Ejemplo: mes = 12 -> new Date(2026, 12, 0) -> 31 de diciembre de 2026 -> 31
  return new Date(anio, mes, 0).getDate();
}

/** Complemento: indica si un anio es bisiesto (febrero de 29 dias). */
function esBisiesto(anio) {
  return anio % 400 === 0 || (anio % 4 === 0 && anio % 100 !== 0);
}

function ejecutarCalculoMes() {
  const anio = parseInt(document.getElementById("anio").value, 10);
  const mes = parseInt(document.getElementById("mes").value, 10);
  const salida = document.getElementById("resultado");
  const dias = obtenerUltimoDiaMes(anio, mes);

  if (isNaN(dias)) {
    salida.textContent = "El mes debe estar entre 1 y 12.";
    salida.className = "salida error";
    return;
  }

  const objetoInterno = new Date(anio, mes, 0);
  const bisiesto = mes === 2 ? (dias === 29 ? " (año bisiesto)" : " (año no bisiesto)") : "";

  salida.textContent =
    `obtenerUltimoDiaMes(${anio}, ${mes})\n` +
    `new Date(${anio}, ${mes}, 0) = ${objetoInterno.toString()}\n` +
    `.getDate() = ${dias}\n` +
    `${NOMBRES_MESES[mes - 1]} de ${anio} tiene ${dias} dias${bisiesto}`;
  salida.className = "salida";

  console.log(`${mes}/${anio} -> ${dias} dias`);
}

function pintarTablaMeses() {
  const anio = 2026;
  const contenedor = document.getElementById("tablaMeses");
  let texto = `Dias de cada mes de ${anio} (febrero: ${obtenerUltimoDiaMes(anio, 2)} dias)\n`;
  texto += "mes  nombre        dias  new Date(anio, mes, 0)\n";

  for (let mes = 1; mes <= 12; mes++) {
    const dias = obtenerUltimoDiaMes(anio, mes);
    const interno = new Date(anio, mes, 0).toDateString();
    texto += `${String(mes).padStart(3)}  ${NOMBRES_MESES[mes - 1].padEnd(12)} ${String(dias).padStart(4)}  ${interno}\n`;
  }

  contenedor.textContent = texto;
  console.log(texto);
}

function pintarPruebaBisiesto() {
  const contenedor = document.getElementById("pruebaBisiesto");
  const anios = [1900, 2000, 2024, 2026, 2100];
  let texto = "Comprobacion de anios bisiestos:\n";

  anios.forEach((a) => {
    const diasFebrero = obtenerUltimoDiaMes(a, 2);
    texto += `esBisiesto(${a}) = ${String(esBisiesto(a)).padEnd(5)} -> febrero de ${a} tiene ${diasFebrero} dias\n`;
  });

  contenedor.textContent = texto;
  console.log(texto);
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("btnCalcular").addEventListener("click", ejecutarCalculoMes);
  pintarTablaMeses();
  pintarPruebaBisiesto();
  ejecutarCalculoMes();
});

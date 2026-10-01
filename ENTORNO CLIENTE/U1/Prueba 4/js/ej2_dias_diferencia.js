/* Ejercicio 2 del apartado 1.4
   calcularDiasDiferencia(fechaInicio, fechaFin) -> numero entero de dias entre dos fechas.
   Se apoya en el metodo nativo .getTime() del objeto Date del anfitrion (navegador). */

const MS_POR_DIA = 86400000; // 24 h * 60 min * 60 s * 1000 ms = 1 dia

/**
 * Calcula los dias de calendario transcurridos entre dos fechas "YYYY-MM-DD".
 * @param {string} fechaInicio fecha de inicio en formato AAAA-MM-DD
 * @param {string} fechaFin    fecha de fin en formato AAAA-MM-DD
 * @returns {number} dias enteros (negativo si fechaFin es anterior a fechaInicio)
 */
function calcularDiasDiferencia(fechaInicio, fechaFin) {
  // Anadir "T00:00:00" fuerza la interpretacion en HORA LOCAL.
  // Si se hiciera new Date("2026-03-28") el motor lo leeria como medianoche UTC,
  // que en Espana (GMT+0100) seria la 01:00 y descolocaria el resultado un dia.
  const inicio = new Date(fechaInicio + "T00:00:00");
  const fin = new Date(fechaFin + "T00:00:00");

  if (isNaN(inicio.getTime()) || isNaN(fin.getTime())) {
    return NaN;
  }

  // Math.round (y no Math.floor) absorbe la hora que se pierde o se gana
  // en los cambios de horario de verano/invierno.
  return Math.round((fin.getTime() - inicio.getTime()) / MS_POR_DIA);
}

function ejecutarCalculoDias() {
  const inicio = document.getElementById("inicio").value;
  const fin = document.getElementById("fin").value;
  const salida = document.getElementById("resultado");
  const dias = calcularDiasDiferencia(inicio, fin);

  if (isNaN(dias)) {
    salida.textContent = "Alguna de las dos fechas no es valida.";
    salida.className = "salida error";
    return;
  }

  const sentido = dias === 0 ? "ambas fechas son el mismo dia" : dias > 0 ? `${dias} dias transcurridos` : `${Math.abs(dias)} dias de diferencia (la fecha de fin es anterior)`;

  salida.textContent =
    `calcularDiasDiferencia("${inicio}", "${fin}")\n` +
    `getTime() inicio = ${new Date(inicio + "T00:00:00").getTime()} ms\n` +
    `getTime() fin    = ${new Date(fin + "T00:00:00").getTime()} ms\n` +
    `Resultado: ${sentido}`;
  salida.className = "salida";

  console.log(`${inicio} -> ${fin} = ${dias} dia(s)`);
}

const casosDePrueba = [
  ["2026-01-01", "2026-12-31", 364, "Ano no bisiesto de 2026"],
  ["2026-02-28", "2026-03-01", 1, "28 -> 29 (no bisiesto) -> 1"],
  ["2024-02-28", "2024-03-01", 2, "2024 es bisiesto: existe el 29"],
  ["2026-03-27", "2026-03-31", 4, "Cruza el cambio a horario de verano"],
  ["2026-10-23", "2026-10-27", 4, "Cruza el cambio a horario de invierno"],
  ["2026-05-10", "2026-05-10", 0, "Misma fecha: 0 dias"]
];

function pintarTablaDias() {
  const contenedor = document.getElementById("tablaCasos");
  if (!contenedor) {
    return;
  }

  let texto = "fechaInicio   fechaFin      esperado  obtenido  estado  explicacion\n";
  casosDePrueba.forEach(([ini, fin, esperado, nota]) => {
    const obtenido = calcularDiasDiferencia(ini, fin);
    const estado = obtenido === esperado ? "OK      " : "FALLO   ";
    texto += `${ini}   ${fin}   ${String(esperado).padStart(8)}  ${String(obtenido).padStart(8)}  ${estado}  ${nota}\n`;
  });

  contenedor.textContent = texto;
  console.log(texto);
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("btnCalcular").addEventListener("click", ejecutarCalculoDias);
  pintarTablaDias();
  ejecutarCalculoDias();
});


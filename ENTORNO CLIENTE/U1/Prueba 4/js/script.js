// ================================
// EJERCICIO 1
// ================================

function ejercicio1() {
  const fechaA = new Date(2026, 0, 10);
  const fechaB = new Date(2026, 12, 1);
  const fechaC = new Date(2026);
  const fechaD = new Date("2026-02-28");
  const fechaE = new Date("2026/02/28");

  document.getElementById("resultado").innerHTML = `
        <p>Fecha A: ${fechaA}</p>
        <p>Fecha B: ${fechaB}</p>
        <p>Fecha C: ${fechaC}</p>
        <p>Fecha D: ${fechaD}</p>
        <p>Fecha E: ${fechaE}</p>
    `;
}

// ================================
// EJERCICIO 2
// ================================

function calcularDiasDiferencia(fechaInicio, fechaFin) {
  const inicio = new Date(fechaInicio);
  const fin = new Date(fechaFin);

  const diferencia = fin.getTime() - inicio.getTime();

  return Math.round(diferencia / (1000 * 60 * 60 * 24));
}

function ejercicio2() {
  const dias = calcularDiasDiferencia("2026-09-01", "2026-09-10");

  document.getElementById("resultado").textContent =
    `Han transcurrido ${dias} días.`;
}

// ================================
// EJERCICIO 3
// ================================

function obtenerUltimoDiaMes(año, mes) {
  const fecha = new Date(año, mes, 0);

  return fecha.getDate();
}

function ejercicio3() {
  const dias = obtenerUltimoDiaMes(2026, 2);

  document.getElementById("resultado").textContent =
    `El mes tiene ${dias} días.`;
}

// ================================
// EJERCICIO 4
// ================================

function formatearFechaEspanola(fecha) {
  const dia = String(fecha.getDate()).padStart(2, "0");
  const mes = String(fecha.getMonth() + 1).padStart(2, "0");
  const año = fecha.getFullYear();

  const horas = String(fecha.getHours()).padStart(2, "0");
  const minutos = String(fecha.getMinutes()).padStart(2, "0");

  return `${dia}/${mes}/${año} ${horas}:${minutos}`;
}

function ejercicio4() {
  const fecha = new Date(2026, 8, 28, 14, 5);

  document.getElementById("resultado").textContent =
    formatearFechaEspanola(fecha);
}

// ================================
// EJERCICIO 7
// ================================

function ejercicio7() {
  console.log("Línea 1: esta línea se ejecuta.");

  let numero = 10;

  console.log("Línea 2: el número es " + numero);

  resultado = numero * 2;

  console.log("Línea 3: esta línea no se ejecuta.");
}

// ================================
// PRÁCTICA DE LABORATORIO
// ================================

function practicaLaboratorio() {
  const boton = document.getElementById("boton");

  if (boton) {
    boton.addEventListener("click", function () {
      boton.style.backgroundColor = "red";
    });
  }
}

/* Ejercicio 1 del apartado 1.4
   Verifica en el navegador las predicciones del ejercicio y las contrasta
   con la columna de resultados medidos realmente. */

const predicciones = [
  { id: "A", expr: 'new Date(2026, 0, 10)', fn: () => new Date(2026, 0, 10), correcto: true },
  { id: "B", expr: 'new Date(2026, 12, 1)', fn: () => new Date(2026, 12, 1), correcto: false },
  { id: "C", expr: "new Date(2026)", fn: () => new Date(2026), correcto: true },
  { id: "D", expr: 'new Date("2026-02-28")', fn: () => new Date("2026-02-28"), correcto: true },
  { id: "E", expr: 'new Date("2026/02/28")', fn: () => new Date("2026/02/28"), correcto: true }
];

const formatear = (d) => (isNaN(d.getTime()) ? "Invalid Date" : d.toString());

predicciones.forEach((caso) => {
  const fecha = caso.fn();
  const texto = formatear(fecha);

  // Traza informative en la consola del navegador
  console.log(`${caso.expr}  ->  ${texto}  (getTime() = ${fecha.getTime()})`);

  const celdaResultado = document.querySelector(`.resultado[data-caso="${caso.id}"]`);
  const celdaVeredicto = document.querySelector(`.veredicto[data-caso="${caso.id}"]`);

  if (celdaResultado) {
    celdaResultado.textContent = texto;
  }
  if (celdaVeredicto) {
    celdaVeredicto.textContent = caso.correcto ? "Correcta" : "Incorrecta";
    celdaVeredicto.className = caso.correcto ? "veredicto ok" : "veredicto error";
  }
});

console.log("fin de la ejecucion de ej1_verificacion.js");


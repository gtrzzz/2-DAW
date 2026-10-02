/* Complemento del apartado 1.4 (punto E del tema): metodos de conversion,
   getters y setters del objeto nativo Date del navegador. */

const DIAS_SEMANA = ["domingo", "lunes", "martes", "miercoles", "jueves", "viernes", "sabado"];
const MESES = ["enero", "febrero", "marzo", "abril", "mayo", "junio",
  "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

function tablaConversores(fecha) {
  let texto = `Fecha del objeto: ${fecha.toString()}\n`;
  texto += `getTime() = ${fecha.getTime()} ms desde la epoca Unix\n\n`;
  texto += "metodo                  resultado\n";
  texto += `toString()              ${fecha.toString()}\n`;
  texto += `toDateString()          ${fecha.toDateString()}\n`;
  texto += `toTimeString()          ${fecha.toTimeString()}\n`;
  texto += `toISOString()           ${fecha.toISOString()}\n`;
  texto += `toUTCString()           ${fecha.toUTCString()}\n`;
  texto += `toLocaleDateString()    ${fecha.toLocaleDateString()}\n`;
  texto += `toLocaleTimeString()    ${fecha.toLocaleTimeString()}\n`;
  texto += `toLocaleString()        ${fecha.toLocaleString()}\n`;
  return texto;
}

function tablaGetters(fecha) {
  let texto = "LECTURA (getters)\n";
  texto += `getFullYear()    = ${fecha.getFullYear()}\n`;
  texto += `getMonth()       = ${fecha.getMonth()}  (base 0 -> ${MESES[fecha.getMonth()]})\n`;
  texto += `getDate()        = ${fecha.getDate()}  (base 1)\n`;
  texto += `getDay()         = ${fecha.getDay()}  (0 domingo ... 6 sabado -> ${DIAS_SEMANA[fecha.getDay()]})\n`;
  texto += `getHours()       = ${fecha.getHours()}\n`;
  texto += `getMinutes()     = ${fecha.getMinutes()}\n`;
  texto += `getSeconds()    = ${fecha.getSeconds()}\n`;
  texto += `getMilliseconds()= ${fecha.getMilliseconds()}\n`;
  texto += `getTime()        = ${fecha.getTime()}\n\n`;

  // ESCRITURA (setters): el objeto se MUTA en el sitio
  const copia = new Date(fecha.getTime());
  copia.setFullYear(2027);
  copia.setMonth(0);
  copia.setDate(15);
  copia.setHours(9);
  copia.setMinutes(30);

  texto += "ESCRITURA (setters) sobre una copia del objeto\n";
  texto += "f.setFullYear(2027); f.setMonth(0); f.setDate(15);\n";
  texto += "f.setHours(9); f.setMinutes(30);\n";
  texto += `Resultado: ${copia.toString()}\n`;
  texto += `El objeto original no cambia: ${fecha.toString()}\n`;
  return texto;
}

function mostrar(fecha) {
  document.getElementById("tablaConversores").textContent = tablaConversores(fecha);
  document.getElementById("tablaGetters").textContent = tablaGetters(fecha);
  document.getElementById("salidaMetodos").textContent = `Objeto Date en uso: ${fecha.toString()}`;
  console.log(tablaConversores(fecha), tablaGetters(fecha));
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("btnAhora").addEventListener("click", () => mostrar(new Date()));
  document.getElementById("btnISO").addEventListener("click", () => mostrar(new Date(2026, 8, 28, 12, 23, 57)));
  mostrar(new Date());
});

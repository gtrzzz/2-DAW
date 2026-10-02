/* Ejercicio 5 del apartado 1.4
   Demostracion del cambio de tipado: JavaScript (dinamico, en runtime)
   frente a Java (estatico, en compilacion). */

/**
 * Simula lo que hace el compilador de Java: si el tipo asignado no coincide
 * con el tipo declarado, se produce un error de compilacion y el programa
 * no llega a ejecutarse.
 * @param {string} tipoDeclarado tipo que el programador escribio en la declaracion
 * @param {*} valor            valor que se intenta asignar
 * @returns {string} resultado o mensaje de error
 */
function asignarComoJava(tipoDeclarado, valor) {
  const tipoReal = typeof valor;

  if (tipoReal !== tipoDeclarado) {
    return `ERROR DE COMPILACION: incompatible types -> no se puede convertir ${tipoReal} en ${tipoDeclarado}`;
  }
  return `${tipoDeclarado} numero = ${valor};  // compila y se ejecuta`;
}

function ejecutarDemo() {
  const salida = document.getElementById("salidaDemo");

  // En JavaScript el tipo se deduce del VALOR, no de una declaracion de tipo.
  let numero = 42;
  const lineas = [];

  lineas.push("--- JAVASCRIPT: tipado dinamico y debil ---");
  lineas.push(`let numero = 42;`);
  lineas.push(`typeof numero            = ${typeof numero}`);
  lineas.push(`numero + 1               = ${numero + 1}  (suma numerica real)`);

  // Cambio de tipo sin ningun aviso: el mismo identificador pasa a ser cadena.
  numero = "42";
  lineas.push(`numero = "42";`);
  lineas.push(`typeof numero            = ${typeof numero}`);
  lineas.push(`numero + 1               = ${numero + 1}  (CONCATENACION silenciosa, no es 43)`);
  lineas.push(`numero * 2               = ${numero * 2}  (el operador * si convierte a numero)`);

  lineas.push("");
  lineas.push("--- JAVA: tipado estatico y fuerte (simulado) ---");
  lineas.push(`int numero = 42;                      -> ${asignarComoJava("number", 42)}`);
  lineas.push(`int numero = "42";                    -> ${asignarComoJava("number", "42")}`);
  lineas.push("");
  lineas.push("En Java ese segundo caso NO COMPILA: el error se detecta antes de ejecutar.");
  lineas.push("En JavaScript si se compila, y el fallo (o el resultado inesperado) solo");
  lineas.push("aparece en tiempo de ejecucion, que es la desventaja del scripting.");

  salida.textContent = lineas.join("\n");
  console.log(lineas.join("\n"));
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("btnDemo").addEventListener("click", ejecutarDemo);
});

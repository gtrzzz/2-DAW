/* Complemento del Ejercicio 7 (Apartado 1.4)
   Comparacion entre la asignacion a una variable no declarada en modo
   perezoso y en modo estricto ("use strict"). */

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("btnEstricto").addEventListener("click", () => {
    const lineas = [];

    lineas.push('--- 1) MODO PEREZOSO (script normal) ---');
    lineas.push('Se asigna a "descuentoSinDeclarar" sin declararla antes:');
    try {
      descuentoSinDeclarar = 10;
      lineas.push('  resultado: se ha asignado sin error.');
      lineas.push(`  typeof descuentoSinDeclarar = ${typeof descuentoSinDeclarar}`);
      lineas.push('  CONSECUENCIA: se ha creado una variable GLOBAL invisible.');
      lineas.push('  En el navegador queda colgada en window, y el error pasa inadvertido.');
    } catch (error) {
      lineas.push(`  ERROR: ${error.name}: ${error.message}`);
    }
    delete window.descuentoSinDeclarar;

    lineas.push("");
    lineas.push('--- 2) MODO ESTRICTO ("use strict") ---');
    lineas.push('Se repite la misma asignacion dentro de una funcion estricta:');
    try {
      // eval con "use strict" crea un ambito estricto aislado, equivalente a un fichero .js estricto
      const resultadoEnEstricto = eval('"use strict"; descuentoSinDeclarar = 10; return "sin error";');
      lineas.push(`  resultado: ${resultadoEnEstricto}`);
    } catch (error) {
      lineas.push(`  ERROR: ${error.name}: ${error.message}`);
      lineas.push('  CONSECUENCIA: el fallo se detecta en el acto, sin crear la global.');
      lineas.push('  Esto es lo que se aproxima a la seguridad de un lenguaje compilado.');
    }

    const salida = document.getElementById("salidaEstricto");
    salida.textContent = lineas.join("\n");
    console.log(lineas.join("\n"));
  });
});

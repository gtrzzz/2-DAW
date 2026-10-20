
const visor = document.getElementById("pantallaSalida");

function analizarCoercion() {
  const textoEntrada = document.getElementById("txtEntrada").value.trim();

  let valorReal;

  // 1. Normalización de la entrada
  try {
    valorReal = JSON.parse(textoEntrada);
  } catch (e) {
    if (textoEntrada === "undefined") {
      valorReal = undefined;
    } else if (textoEntrada === "NaN") {
      valorReal = NaN;
    } else {
      valorReal = textoEntrada;
    }
  }

  // 2. Conversiones explícitas y tipo original
  const comoNumero = Number(valorReal);
  const comoCadena = String(valorReal);
  const comoBooleano = Boolean(valorReal);
  const tipoOriginal = typeof valorReal;

  // 3. Operaciones con los operadores + y -
  const resultadoSuma = valorReal + 10;
  const resultadoResta = valorReal - 10;

  // 4. Anomalías de coerción
  let aviso = "";

  if (textoEntrada === '"0"' && comoBooleano === true) {
    aviso += `<br><span class="alerta">Aviso: La cadena "0" es truthy porque no está vacía, aunque contenga el número cero.</span>`;
  }

  if (textoEntrada === "[]" && comoNumero === 0) {
    aviso += `<br><span class="alerta">Aviso: Una matriz vacía [] se convierte en el número 0 mediante Number([]).</span>`;
  }

  // 5. Comprobación estricta de NaN
  if (Number.isNaN(comoNumero)) {
    aviso += `<br><span class="alerta">Conversión numérica fallida: No es un número válido</span>`;
  }

  // 6. Mostrar resultados
  visor.innerHTML = `
    <strong>Valor original:</strong> <span class="valor-resaltado">${String(valorReal)}</span><br>
    <strong>Tipo original [typeof]:</strong> <span class="valor-resaltado">${tipoOriginal}</span><br>
    --------------------------------------------------<br>
    <strong>Como Número [Number(x)]:</strong> <span class="valor-resaltado">${String(comoNumero)}</span> (typeof: ${typeof comoNumero})<br>
    <strong>Como Cadena [String(x)]:</strong> <span class="valor-resaltado">${comoCadena}</span> (typeof: ${typeof comoCadena})<br>
    <strong>Como Booleano [Boolean(x)]:</strong> <span class="valor-resaltado">${comoBooleano}</span> (typeof: ${typeof comoBooleano})<br>
    --------------------------------------------------<br>
    <strong>Operación suma (valorReal + 10):</strong> <span class="valor-resaltado">${String(resultadoSuma)}</span> (typeof: ${typeof resultadoSuma})<br>
    <strong>Operación resta (valorReal - 10):</strong> <span class="valor-resaltado">${String(resultadoResta)}</span> (typeof: ${typeof resultadoResta})
    ${aviso}
  `;
}

document
  .getElementById("btnAnalizar")
  .addEventListener("click", analizarCoercion);

function procesarEvaluacion() {
  const txtA = document.getElementById("campoValor1").value.trim();
  const txtB = document.getElementById("campoValor2").value.trim();
  const visor = document.getElementById("pantallaSalida");

  let valA, valB;
  try {
    valA = JSON.parse(txtA);
  } catch (e) {
    valA = txtA;
  }

  try {
    valB = JSON.parse(txtB);
  } catch (e) {
    valB = txtB;
  }

  const tipoA = typeof valA;
  const tipoB = typeof valB;
  const igualdadAbstracta = valA == valB;
  const igualdadEstricta = valA === valB;
  const operacionOr = valA || valB;
  const operacionNullish = valA ?? valB;

  // Modificación 1
  const operacionAnd = valA && valB;
  const dobleNegacionA = !!valA;

  // Modificación 2
  let aviso = "";
  if (tipoA === "number" && Math.abs(valA) > Number.MAX_SAFE_INTEGER) {
    aviso = `<br><span class="resaltado">Aviso: Precisión comprometida. Utiliza BigInt (sufijo n) para operar en este rango</span>`;
  }

  visor.innerHTML = `
    <strong>Operando A:</strong> <span class="resaltado">${String(valA)}</span> (typeof: ${tipoA})<br>
    <strong>Operando B:</strong> <span class="resaltado">${String(valB)}</span> (typeof: ${tipoB})<br>
    --------------------------------------------------<br>
    <strong>Igualdad abstracta (A == B):</strong> ${igualdadAbstracta}<br>
    <strong>Igualdad estricta   (A === B):</strong> ${igualdadEstricta}<br>
    <strong>Cortocircuito OR    (A || B):</strong> ${String(operacionOr)}<br>
    <strong>Coalescencia nula   (A ?? B):</strong> ${String(operacionNullish)}<br>
    <strong>Cortocircuito AND   (A && B):</strong> ${String(operacionAnd)}<br>
    <strong>Doble negación       (!!A):</strong> ${dobleNegacionA}
    ${aviso}
  `;
}

document
  .getElementById("btnEvaluar")
  .addEventListener("click", procesarEvaluacion);

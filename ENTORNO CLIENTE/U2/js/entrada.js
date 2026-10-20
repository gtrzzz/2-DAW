
let codigo;

do {
    codigo = prompt("Introduce un código numérico de 4 dígitos:");

    // Si el usuario cancela, se sale del proceso.
    if (codigo === null) {
        console.log("Entrada cancelada.");
        break;
    }

    // Comprueba que sean exactamente 4 dígitos.
    if (!/^\d{4}$/.test(codigo)) {
        alert("Código no válido. Debe contener exactamente 4 dígitos.");
    }

} while (codigo !== null && !/^\d{4}$/.test(codigo));

if (codigo !== null) {
    console.log("Código válido:", codigo);
}

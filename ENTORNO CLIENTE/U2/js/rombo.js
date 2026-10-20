const altura = 5;

// Mitad superior, incluida la fila central
for (let fila = 1; fila <= altura; fila++) {
    let linea = "";

    for (let espacio = 0; espacio < altura - fila; espacio++) {
        linea += " ";
    }

    for (let estrella = 0; estrella < 2 * fila - 1; estrella++) {
        linea += "*";
    }

    console.log(linea);
}

// Mitad inferior
for (let fila = altura - 1; fila >= 1; fila--) {
    let linea = "";

    for (let espacio = 0; espacio < altura - fila; espacio++) {
        linea += " ";
    }

    for (let estrella = 0; estrella < 2 * fila - 1; estrella++) {
        linea += "*";
    }

    console.log(linea);
}
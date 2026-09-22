var a = "5";
var b = 5;
console.log(a + b); // 55
console.log(a - b); // 0
console.log(a == b); // true
console.log(a === b); // false
var alumno = {
  nombre: "Juan",
  edad: 20,
  curso: "DAW",
  notas: [7, 8, 9],
};
console.log(alumno.nombre); // Juan
console.table(alumno); // Muestra el objeto en forma de tabla
console.log(Object.keys(alumno)); // ["nombre", "edad", "curso", "notas"]

//Definición de fechas base mediante Temporal.PLainDate
const fechaPublicacionNotas = Temporal.PlainDate.from("2027-06-15"); //El formato de la fecha es YYYY-MM-DD

//Cálculo de plazos legales (Inmutabilidad, plazo de 3 días hábiles) sumando con add
const plazoLegal = fechaPublicacionNotas.add({ days: 3 }); //Se suman 3 días hábiles a la fecha base

const resolucionDefinitiva = fechaPublicacionNotas.add({ weeks: 2 }); //Se suman 2 semanas a la fecha base

console.log(fechaPublicacionNotas.toString() === "2027-06-15"); //Mostrar por consola que la fecha original no ha cambiado

//Auditoría de cuenta atrás
const fechaActual = Temporal.Now.PlainDateISO(); //Obtenemos la fecha actual mediante Temporal.Now.PlainDateISO()

const diasRestantes = fechaPublicacionNotas
  .until(fechaActual)
  .total({ unit: "days" }); //Calculamos los días restantes hasta la fecha de publicación

//Sincronización de apertura de sede internacional, que abre a las 9.00 hora Madrid

/*
Sincronización de apertura de sede internacional:
La plataforma de matriculación abre a las 09:00:00 en la sede de Madrid (Europe/Madrid).
Proyecta ese instante exacto para un alumno que se conecta desde Tokio (Asia/Tokyo) utilizando Temporal.ZonedDateTime y su método .withTimeZone().
*/

const horaApertura = Temporal.PlainDateTime.from();

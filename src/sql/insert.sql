use planificacion;

insert into usuario
	(login, pass, perfil, cedula, nombre, telefono, correo, direccion, nacimiento)
values
	("deisy", "deisy", "estudiante", "V-12443232", "Deisy Rincones", "041412345678", "deisik94@gmail.com","terrazas", "1994-12-12"),
	("valentina", "valentina", "estudiante", "V-12443232", "Valentina Azocar", "041412345678", "pizenblues@gmail.com", "calle bolivar", "1994-08-13"),
	("francisco", "francisco", "profesor", "V-12443232", "Francisco Geraldino", "041412345678", "correodelprofe@gmail.com","casa", "1234-01-01"),
	("admin", "admin", "admin", "V-12443232", "Soyla El Admin", "041412345678", "admin@adminsito.com","pc", "1234-01-01");

insert into carrera (carrera_nombre) values ("informatica");

insert into materia (materia_nombre, materia_carrera, materia_creditos, materia_color) values
	("Matematica I", 1, 4, "info"),
	("Matematica II", 1, 4, "info"),
	("Ingles I", 1, 2, "warning"),
	("Castellano", 1, 2, "danger"),
	("Sistemas II", 1, 3, "default");

insert into seccion (seccion_nombre, seccion_materia) values
	("Seccion A", 1),
	("Seccion B", 1),
	("Seccion A", 2),
	("Seccion B", 2),
	("Seccion A", 3),
	("Seccion B", 3),
	("Seccion A", 4),
	("Seccion A", 5);

insert into dia (dia) values 
("lunes"),("martes"),("miercoles"),("jueves"),("viernes");

insert into bloque (bloque, bloque_hora) values
	("A", "7:00 AM - 9:00 AM"),
	("B", "9:00 AM - 11:00 AM"),
	("C", "11:00 AM - 1:00 AM"),
	("D", "1:00 AM - 3:00 AM"),
	("E", "3:00 AM - 5:00 AM");

insert into salon (salon, salon_puestos) values
	("INFO-1", 30),
	("MATE-1", 30);

insert into horario (horario_dia, horario_bloque, horario_salon) values
	(1,1,1),(1,2,1),(1,3,1),(1,4,1),
	(2,1,1),(2,2,1),(2,3,1),(2,4,1),
	(3,1,1),(3,2,1),(3,3,1),(3,4,1),
	(4,2,1),(4,3,1),(4,4,1),
	(5,1,1),(5,2,1);

insert into estudiante (estudiante_usuario,estudiante_carga_academica, estudiante_inscripcion) values (1,12,"2011"),(2,8,"2011");
insert into profesor (profesor_usuario) values (3);
insert into coordinador (coordinador_usuario, coordinador_carrera) values (4,1);

insert into estudiante_seccion (es_estudiante, es_seccion) values
	(1,3),(1,5),(1,7),(1,8),
	(2,1),(2,5),(2,8),(2,7);

insert into profesor_seccion (ps_profesor, ps_seccion) values
	(1,7),(1,8);

insert into horario_seccion (hs_seccion, hs_horario) values
	(1,1),(1,9),(1,16),
	(2,6),(2,11),(2,17),
	(3,3),(3,11),(3,14),
	(4,8),(4,12),(4,15),
	(5,2),
	(6,10),
	(7,5),
	(8,4),(8,7);
	use planificacion;

insert into usuario
	(login, pass, perfil, cedula, nombre, telefono, correo, direccion, nacimiento)
values
	("deisy", "deisy", "estudiante", "V-12443232", "Deisy Rincones", "041412345678", "deisik94@gmail.com","terrazas", "1994-12-12"),
	("valentina", "valentina", "estudiante", "V-12443232", "Valentina Azocar", "041412345678", "pizenblues@gmail.com", "calle bolivar", "1994-08-13"),
	("francisco", "francisco", "profesor", "V-12443232", "Francisco Geraldino", "041412345678", "correodelprofe@gmail.com","casa", "1234-01-01"),
	("lockiby", "lockiby", "profesor", "V-12443232", "Jose lockiby", "041412345678", "correodelprofe@gmail.com","casa", "1234-01-01"),
	("bob", "bob", "profesor", "V-12443232", "bob dylan", "041412345678", "correodelprofe@gmail.com","casa", "1234-01-01"),
	("admin", "admin", "admin", "V-12443232", "Soyla El Admin", "041412345678", "admin@adminsito.com","pc", "1234-01-01");

insert into carrera (carrera_nombre) values ("informatica");

insert into materia (materia_nombre, materia_carrera, materia_creditos, materia_color) values
	("Matematica I", 1, 4, "info"),
	("Matematica II", 1, 4, "info"),
	("Ingles I", 1, 2, "warning"),
	("Castellano", 1, 2, "danger"),
	("Sistemas II", 1, 3, "default"),
	("PDA", 1, 3, "info");

insert into seccion (seccion_nombre, seccion_materia) values
	/*secciones de mate I*/
	("Seccion A", 1),
	("Seccion B", 1),
	/*secciones de mate II*/
	("Seccion A", 2),
	("Seccion B", 2),
	/*secciones de ingles I*/
	("Seccion A", 3),
	/*secciones de castellano*/
	("Seccion A", 4),
	/*secciones de sistemas II*/
	("Seccion A", 5),
	/*secciones de PDA*/
	("Seccion A", 6);

insert into dia (dia) values 
("lunes"),("martes"),("miercoles"),("jueves"),("viernes");

insert into bloque (bloque, bloque_hora) values
	("A", "7:00"),
	("B", "9:00"),
	("C", "11:00"),
	("D", "13:00"),
	("E", "15:00");

insert into salon (salon, salon_puestos) values
	("INFO-1", 30),	("MATE-1", 30);

insert into horario (horario_dia, horario_bloque, horario_salon) values
	/*lunes*/
	(1,1,1), (1,2,1), (1,1,2), (1,2,2),
	/*martes*/
	(2,1,1), (2,1,2),
	/*miercoles*/
	(3,1,1), (3,2,1), (3,1,2), (3,2,2),
	/*jueves*/
	(4,1,1), (4,2,1), (4,1,2), (4,2,2),
	/*viernes*/
	(5,1,1), (5,2,1), (5,1,2), (5,2,2);

insert into estudiante (estudiante_usuario,estudiante_carga_academica, estudiante_inscripcion) values (1,12,"2011"),(2,20,"2011");
insert into profesor (profesor_usuario) values (3),(4),(5);
insert into coordinador (coordinador_usuario, coordinador_carrera) values (4,1);

insert into estudiante_seccion (es_estudiante, es_seccion) values
	(1,1),(1,5),(1,6),(1,8),
	(2,4),(2,7),(2,5),(2,6);
	

insert into profesor_seccion (ps_profesor, ps_seccion) values
	(1,7),(1,8),
	(2,1),(2,2),(2,3),
	(3,5),(3,6);

insert into horario_seccion (hs_seccion, hs_horario) values
	(1,1), (3,2), (4,3), (7,4),
	(2,5), (5,6),
	(1,7), (2,8), (4,9), (7,10),
	(2,11), (3,12), (6,13), (8,14),
	(1,15), (3,16), (4,17), (8,18);
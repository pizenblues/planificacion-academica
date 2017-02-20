use planificacion;
insert into usuario (login, pass, tipo) values 
	("admin", "admin", "admin"),
	("morty", "morty", "estudiante"),
	("rick", "rick", "profesor"), 
	("deisy", "deisy", "estudiante"),
	("valentina", "valentina", "estudiante");

insert into carrera (carrera_nombre) values
	("informatica"), ("matematica");

insert into materia (materia_carrera, materia_nombre) values
	(1, "sistemas ii"),
	(1, "pda"),
	(1, "matematica ii"),
	(1, "lenguages de programacion"),
	(1, "matematica i"),
	(1, "sistemas i"),
	(1, "estructuras discretas"),
	(1, "programacion lineal");

insert into seccion (seccion_materia, seccion_nombre) values
	(1, "seccion 1", ),
	(2, "seccion 1"),
	(2, "seccion 2"),
	(3, "seccion 1"),
	(3, "seccion 2"),
	(4, "seccion 1"),
	(5, "seccion 1"),
	(5, "seccion 2"),
	(6, "seccion 1"),
	(7, "seccion 1"),
	(8, "seccion 1");

insert into estudiante 
	(estudiante_usuario, estudiante_nombre, estudiante_carrera, estudiante_telefono, 
	estudiante_direccion, estudiante_correo, estudiante_nacimiento, estudiante_cedula)
values
	(3, "morty smith", 1, "04141234567", "calle bolivar #107", "morty@gmail.com", "2001/01/01", "123456"),
	(4, "deisy rincones", 1, "0239213", "terrazas", "deisyk@gmail.com", "1994/01/01", "654321");

insert into profesor 
	(profesor_usuario, profesor_nombre, profesor_telefono, 
	profesor_direccion, profesor_correo, profesor_nacimiento, profesor_cedula)
values
	(2, "rick sanchez", "04141234567", "calle ayaucho #110", "rick@gmail.com", "1950/01/01", "111111");

insert into 
	estudiante_seccion (es_estudiante, es_seccion) 
values 
	("123456", 1), ("654321", 1), ("123456", 2), ("654321", 3),
	("123456", 3), ("654321", 4), ("123456", 6), ("654321", 8);

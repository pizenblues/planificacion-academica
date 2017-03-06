create database	planificacion;
use planificacion;

create table usuario(
	usuario_id int auto_increment,
	login varchar (25) unique,
	pass varchar (25),
	perfil varchar (12),
	cedula varchar (20),
	nombre varchar (50) not null,
	telefono varchar (15),
	correo varchar(25),
	direccion text,
	nacimiento date,
	primary key (usuario_id)
);

create table carrera(
	carrera_id int auto_increment,
	carrera_nombre varchar (50) not null,
	primary key (carrera_id)
);

create table materia(
	materia_id int auto_increment,
	materia_nombre char (50) not null,
	materia_carrera int not null,
	materia_creditos int not null,
	materia_color varchar(20) not null,
	primary key (materia_id),
	foreign key (materia_carrera) references carrera (carrera_id)
);

create table seccion(
	seccion_id int auto_increment,
	seccion_nombre varchar (50) not null,
	seccion_materia int not null,
	primary key (seccion_id),
    foreign key (seccion_materia) references materia (materia_id)
);

create table dia(
	dia_id int auto_increment,
	dia varchar (20) not null,
	primary key (dia_id)
);

create table bloque(
	bloque_id int auto_increment,
	bloque varchar (20) not null,
	bloque_hora varchar (20),
	primary key (bloque_id)
);

create table salon(
	salon_id int auto_increment,
	salon_puestos int not null,
	salon varchar (20) not null,
	primary key (salon_id)
);

create table horario(
	horario_id int auto_increment,
	horario_dia int not null,
	horario_bloque int not null,
	horario_salon int not null,
	primary key (horario_id),
	foreign key (horario_dia) references dia (dia_id),
	foreign key (horario_bloque) references bloque (bloque_id),
	foreign key (horario_salon) references salon (salon_id),
	unique (horario_dia, horario_bloque, horario_salon)
);

create table estudiante(
	estudiante_id int auto_increment,
	estudiante_usuario int,
	estudiante_carga_academica int,
	estudiante_inscripcion varchar(4),
	primary key (estudiante_id),
	foreign key (estudiante_usuario) references usuario (usuario_id)
);

create table profesor(
	profesor_id int auto_increment,
	profesor_usuario int,
	primary key (profesor_id),
	foreign key (profesor_usuario) references usuario (usuario_id)
);

create table coordinador(
	coordinador_id int auto_increment,
	coordinador_usuario int,
	coordinador_carrera int,
	primary key (coordinador_id),
	foreign key (coordinador_usuario) references usuario (usuario_id),
	foreign key (coordinador_carrera) references carrera (carrera_id)
);

create table estudiante_seccion(
	es_id int auto_increment,
	es_estudiante int not null,
	es_seccion int not null,
	primary key (es_id),
	unique (es_estudiante, es_seccion),
	foreign key (es_estudiante) references estudiante (estudiante_id),
	foreign key (es_seccion) references seccion (seccion_id)
);

create table profesor_seccion(
	ps_id int auto_increment,
	ps_profesor int not null,
	ps_seccion int not null,
	primary key (ps_id),
	unique (ps_profesor, ps_seccion),
	foreign key (ps_profesor) references profesor (profesor_id),
	foreign key (ps_seccion) references seccion (seccion_id)
);

create table horario_seccion(
	hs_id int auto_increment,
	hs_horario int,
	hs_seccion int,
	primary key (hs_id),
	unique (hs_horario, hs_seccion),
	foreign key (hs_horario) references horario (horario_id),
	foreign key (hs_seccion) references seccion (seccion_id)
);
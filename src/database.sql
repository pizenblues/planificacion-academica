create database	planificacion;

create table carrera(
	carrera_id int auto_increment,
	carrera_nombre varchar (50) not null,
	primary key (carrera_id)
);

create table materia(
	materia_id int auto_increment,
	materia_nombre char (50) not null,
	materia_carrera int not null,
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

create table estudiante(
	estudiante_cedula int auto_increment,
	estudiante_nombre varchar (50) not null,
	estudiante_carrera int not null,
	estudiante_telefono varchar (15),
	estudiante_direccion text,
	estudiante_correo varchar(25),
	estudiante_nacimiento date,
	primary key (estudiante_cedula),
	foreign key (estudiante_carrera) references carrera (carrera_id)
);

create table profesor(
	profesor_cedula int auto_increment,
	profesor_nombre varchar (50) not null, 
	profesor_telefono varchar (15),
	profesor_direccion text,
	profesor_correo varchar(25),
	profesor_nacimiento date,
	primary key (profesor_cedula)
);

create table coordinador(
	coordinador_cedula int auto_increment,
	coordinador_nombre varchar (50),
	coordinador_carrera int not null,
	coordinador_telefono varchar (15),
	coordinador_direccion text,
	coordinador_correo varchar(25),
	coordinador_nacimiento date,
	primary key (coordinador_cedula),
	foreign key (coordinador_carrera) references carrera (carrera_id)
);

create table estudiante_seccion(
	es_estudiante int not null,
	es_seccion int not null,
	primary key (es_estudiante, es_seccion),
	foreign key (es_estudiante) references estudiante (estudiante_cedula),
	foreign key (es_seccion) references seccion (seccion_id)
);

create table profesor_seccion(
	ps_profesor int not null,
	ps_seccion int not null,
	primary key (ps_profesor, ps_seccion),
	foreign key (ps_profesor) references profesor (profesor_cedula),
	foreign key (ps_seccion) references seccion (seccion_id)
);
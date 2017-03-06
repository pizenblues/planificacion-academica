<?php
	include('../../src/dbconnect.php'); 
	$id = $_GET["id"]; 
	$creditos = $_GET["creditos"]; 
	$ingreso = $_GET["ingreso"]; 
	$consulta = "INSERT INTO estudiante (estudiante_usuario,estudiante_carga_academica, estudiante_inscripcion) 
				 VALUES ('{$id}','{$creditos}','{$ingreso}')";
	$result = mysql_query($consulta, $connect);
	header("location: estudiante_lista.php?success=1");
 ?>
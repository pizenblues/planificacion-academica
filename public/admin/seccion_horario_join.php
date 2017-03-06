<?php
	include('../../src/dbconnect.php'); 
	$seccion = $_GET["seccion"];
	$horario = $_GET["horario"];
	//$id = $_GET["profesor"];

	$creditos = $_GET["creditos"];

	$horario_seccion = "INSERT INTO horario_seccion (hs_seccion, hs_horario) VALUES ('$seccion','$horario')"; 
	mysql_query($horario_seccion, $connect);

	$creditos = $creditos - 1;

	if ($creditos >= 2) {
        header('location: seccion_crear_horario.php?seccion='.$seccion.'&step=two&creditos='.$creditos);
	}else{
		header("location: seccion_lista.php?success=1");
	}

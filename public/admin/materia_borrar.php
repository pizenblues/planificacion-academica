<?php
	include('../../src/dbconnect.php'); 
	$id = $_GET["id"]; 
	$consulta = "DELETE FROM materia WHERE materia_id = '{$id}'"; 
	mysql_query($consulta, $connect);
	header("location: materia_lista.php?success=1");
 ?>
<?php
	include('../../src/dbconnect.php'); 
	$id = $_GET["id"]; 
	$consulta = "DELETE FROM seccion WHERE seccion_id = '{$id}'"; 
	mysql_query($consulta, $connect);
	header("location: seccion_lista.php?success=1");
 ?>
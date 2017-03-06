<?php
	include('../../src/dbconnect.php'); 
	$id = $_GET["id"];
	$consulta = "INSERT INTO profesor (profesor_usuario) VALUES ('{$id}')";
	$result = mysql_query($consulta, $connect);
	header("location: profesor_lista.php?success=1");
 ?>
<?php
	include('../../src/dbconnect.php'); 

	$id = $_GET["id"]; 

	$horario = "SELECT horario_id FROM horario 
	JOIN horario_seccion ON horario_seccion.hs_horario = horario.horario_id
	JOIN seccion on horario_seccion.hs_seccion = seccion.seccion_id
	WHERE seccion_id = '{$id}'";
	$result = mysql_query($horario, $connect);
	$horario_data = array();

	while ($i = mysql_fetch_assoc($result)) {
		$horario_data[] = $i['horario_id'];
	}

	$k = count($horario_data);

	for ($i=0; $i < $k; $i++) { 
		$delete_horario = "DELETE FROM horario WHERE horario_id = '{$horario_data[$i]}'";
		mysql_query($delete_horario, $connect);
	}

	$consulta = "DELETE FROM seccion WHERE seccion_id = '{$id}'"; 
	mysql_query($consulta, $connect);


	header("location: seccion_lista.php?success=1");
 ?>
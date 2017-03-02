<?php

function do_query($conection, $sql){
	$stmt = mysql_query($sql, $conection);
	if ($stmt === false) {
		$mensaje = sprintf('error, consulta mala menol B(: "%s"', $sql);
		exit($mensaje);
	}
	$rows = array();
	while ($r = mysql_fetch_assoc($stmt)) {
		$rows[] = $r;
	}

	return $rows;
}

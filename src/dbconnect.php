<?php 
//$bdServer="mysql1.000webhost.com";
$bdServer="localhost";
$bdUser="root";
$bdPass="";
$bdName="planificacion";
$connect = @mysql_connect($bdServer,$bdUser,$bdPass);
echo mysql_error();

if (@mysql_error()) {
	die("Hay un error conectando con la base de datos");
}

/*else{
	echo "no hay errores. ";
}
*/

if (!mysql_select_db($bdName, $connect)) {
	die("No se encontro la base de datos");
}

/*else{
	echo "base de datos seleccionada: ".$bdName;
}

*/
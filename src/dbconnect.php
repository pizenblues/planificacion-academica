<?php 
//$bdServer="mysql1.000webhost.com";
$bdServer="localhost";
$bdUser="a5254266_boxi";
$bdPass="jg130894";
$bdName="a5254266_boxi";
$connect = @mysql_connect($bdServer,$bdUser,$bdPass);
echo mysql_error();
/*
echo mysql_error();
die();
*/
 if (@mysql_error()) {
 	die("Hay un error conectando con la base de datos");
 }
 //avisa si hay peo conectando con la bd, si no, la bd vive, la lucha (y la consulta) sigue.
 if (!mysql_select_db($bdName, $connect)) {
 	die("No se encontro la base de gatos");
 }
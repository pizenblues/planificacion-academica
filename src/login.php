<?php 
	$message = "";
	$error = false;
	if(isset($_POST["usuario"])){
		$usuario = $_POST["usuario"];
		$clave = $_POST["clave"];
	    include('dbconnect.php');
	    $query = "SELECT * FROM usuario WHERE login = '{$usuario}' AND pass = '{$clave}'";
	    $sql = mysql_query($query, $connect);
	    $cuenta = mysql_num_rows($sql);
	    if($cuenta != 1){
	      $error = true;
	      $message = "Datos incorrectos";
	    }else{
	    	$query = "SELECT tipo FROM usuario WHERE login = '{$usuario}'";
		    $sql = mysql_query($query, $connect);
		    $tipo = mysql_fetch_assoc($sql);
			if ($tipo["tipo"] == "profesor") {
				header('location: profesor.php');
			}else{
				header('location: estudiante.php');
			}
	    }
	}
 ?>
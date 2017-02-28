<?php 
	session_start();
	$message = "";
	$error = false;

	if(isset($_POST["usuario"])){
		$usuario = $_POST["usuario"];
		$clave = $_POST["clave"];
	    include('dbconnect.php');
	    $query = "SELECT * FROM usuario WHERE login = '{$usuario}' AND pass = '{$clave}'";
	    $sql = mysql_query($query, $connect);
	    $cuenta = mysql_num_rows($sql);
	    $loginfo = mysql_fetch_assoc($sql);

	    if($cuenta != 1){
	      $error = true;
	      $message = "Datos incorrectos";

	    }else{
		    $_SESSION["login"] = $usuario;

			if ($loginfo["perfil"] == "profesor") {
				header('Location: profesor');
			}else if ($loginfo["perfil"] == "estudiante"){
				header('Location: estudiante');
			}else if ($loginfo["perfil"] == "admin"){
				header('Location: admin');
			}else{
				header('location: error.php');
			}
	    }
	}
 ?>
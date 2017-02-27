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
	    	$query = "SELECT * FROM usuario WHERE login = '{$usuario}'";
		    $sql = mysql_query($query, $connect);
		    $loginfo = mysql_fetch_assoc($sql);
			if ($loginfo["perfil"] == "profesor") {
				header('Location: profesor.php?login='.$loginfo["login"]);
			}else if ($loginfo["perfil"] == "estudiante"){
				header('Location: estudiante.php?login='.$loginfo["login"]);
			}else if ($loginfo["perfil"] == "admin"){
				echo "admin";;
			}else{
				echo "error";
			}
	    }
	}
 ?>
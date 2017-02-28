<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
	  $login = $_SESSION["login"];

    include("../../src/dbconnect.php");

    $query = "SELECT * FROM usuario 
    JOIN estudiante ON usuario.usuario_id = estudiante.estudiante_usuario
    JOIN estudiante_seccion ON estudiante.estudiante_id = estudiante_seccion.es_estudiante
    JOIN seccion ON estudiante_seccion.es_seccion = seccion.seccion_id
    JOIN materia ON seccion.seccion_materia = materia.materia_id
    JOIN carrera ON materia.materia_carrera = carrera.carrera_id
    WHERE login = '{$login}'";

    $sql = mysql_query($query, $connect);
    $data = mysql_fetch_assoc($sql);

    include("header.php");
    include("navbar.php");
    $carga_academica = 0;
?>
<h2>datos personales</h2>
<b>nombre</b> <span><?php echo $data["nombre"] ?></span> <br>
<b>ceudla</b> <span><?php echo $data["cedula"] ?></span> <br>
<b>fecha de nacimiento</b> <span><?php echo $data["nacimiento"] ?></span> <br>

<h2>datos de contacto</h2>
<b>telefono</b> <span><?php echo $data["telefono"] ?></span> <br>
<b>correo</b> <span><?php echo $data["correo"] ?></span> <br>
<b>direccion</b> <span><?php echo $data["direccion"] ?></span> <br>

<h2>datos academicos</h2>
<b>carrera</b> <span><?php echo $data["carrera_nombre"] ?></span><br>
<b>inscripcion</b> <span><?php echo $data["estudiante_inscripcion"] ?></span><br>
<h3>materias inscritas</h3>

<?php do{
  echo $data["materia_nombre"]." ".$data["seccion_nombre"],'<br>';
  $carga_academica = $carga_academica + $data["materia_creditos"];
  }while ($data = mysql_fetch_assoc($sql));
?>
<b>carga academcia</b><?php echo $carga_academica ?>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
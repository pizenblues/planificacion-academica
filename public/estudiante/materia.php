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
<div class="container">
  <div class="page-header">
    <h2>nombre de la materia</h2>
  </div>

</div>
<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
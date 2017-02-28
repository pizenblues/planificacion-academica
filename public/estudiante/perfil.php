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
    <h2>Datos del estudiante</h2>
  </div>

  <div class="col-xs-12 col-sm-4">
    <h3>Datos personales</h3>
    <b>Nombre:</b> <span><?php echo $data["nombre"] ?></span> <br>
    <b>Ceudula:</b> <span><?php echo $data["cedula"] ?></span> <br>
    <b>Fecha de nacimiento: </b> <span><?php echo $data["nacimiento"] ?></span>
    <h4>Informacion de contacto</h4>
    <b>Telefono: </b> <span><?php echo $data["telefono"] ?></span> <br>
    <b>Correo: </b> <span><?php echo $data["correo"] ?></span> <br>
    <b>Direccion: </b> <span><?php echo $data["direccion"] ?></span>
  </div>

  <div class="col-xs col-sm-8">
    <h3>Datos academicos</h3>
    <b>Carrera: </b> <span><?php echo $data["carrera_nombre"] ?></span><br>
    <b>Inscripcion: </b> <span><?php echo $data["estudiante_inscripcion"] ?></span><br>
    <table class="table table-bordered table-custom">
      <tr>
        <th>Materia inscrita</th>
        <th>Seccion</th>
        <th>Creditos</th>
      </tr>
    <?php do{
      echo '<tr>';
        echo '<td>',$data["materia_nombre"],'</td>';
        echo '<td>',$data["seccion_nombre"],'</td>';
        echo '<td>',$data["materia_creditos"],'</td>';
      echo '</tr>';
      $carga_academica = $carga_academica + $data["materia_creditos"];
      }while ($data = mysql_fetch_assoc($sql));
    ?>
      <b>Carga academica: </b><?php echo $carga_academica ?>
    </table>
  </div>

</div>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];
    include('../../src/dbconnect.php');
    $query = "SELECT * FROM usuario 
    JOIN estudiante ON usuario.usuario_id = estudiante.estudiante_usuario
    JOIN estudiante_seccion ON estudiante.estudiante_id = estudiante_seccion.es_estudiante
    JOIN seccion ON estudiante_seccion.es_seccion = seccion.seccion_id
    JOIN materia ON seccion.seccion_materia = materia.materia_id
    JOIN horario_seccion ON horario_seccion.hs_seccion = seccion.seccion_id
    JOIN horario ON horario.horario_id = horario_seccion.hs_horario
    JOIN dia ON horario.horario_dia = dia.dia_id
    JOIN salon ON horario.horario_salon = salon.salon_id
    JOIN bloque ON horario.horario_bloque = bloque.bloque_id
    WHERE login = '{$login}'";

    $sql = mysql_query($query, $connect);
    $materias = array();

    while ($fila = mysql_fetch_assoc($sql)) {
      $materias[] = $fila;
    }

    include("header.php");
    include("navbar.php");
?>

<div class="container">
<?php
    foreach($materias as $result) {
      $horario[] =  $result["dia_id"]."-".$result["bloque"];
      $materia[] =  $result["materia_nombre"];
    }
    echo print_r($horario);
    echo print_r($materia);
    $mark = 0;
 ?>
  <div class="page-header">
    <h2>Horario de clases</h2>
  </div>
  <table class="table table-bordered table-custom">
    <tr>
      <th>Hora</th>
      <th>Lunes</th>
      <th>Martes</th>
      <th>Miercoles</th>
      <th>Jueves</th>
      <th>Viernes</th>
    </tr>
    <tr>
      <td>7:00 - 9:00</td>
      <td>
        <?php if (in_array("1-A", $horario)){
          echo $materia[$mark];
          $mark = ($mark + 1);
        }?>
      </td>
    </tr>
    <tr>
      <td>9:00 - 11:00</td>
      <td id="1-B"></td>
      <td id="2-B"></td>
      <td id="3-B"></td>
      <td id="4-B"></td>
      <td id="5-B"></td>
    </tr>
    <tr>
      <td>11:00 - 1:00</td>
      <td id="1-C"></td>
      <td id="2-C"></td>
      <td id="3-C"></td>
      <td id="4-C"></td>
      <td id="5-C"></td>
    </tr>
    <tr>
      <td>1:00 - 3:00</td>
      <td id="1-D"></td>
      <td id="2-D"></td>
      <td id="3-D"></td>
      <td id="4-D"></td>
      <td id="5-D"></td>
    </tr>
    <tr>
      <td>3:00 - 5:00</td>
      <td id="1-E"></td>
      <td id="2-E"></td>
      <td id="3-E"></td>
      <td id="4-E"></td>
      <td id="5-E"></td>
    </tr>
  </table>
</div>
<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>

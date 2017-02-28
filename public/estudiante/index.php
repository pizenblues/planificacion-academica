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
    WHERE login = '{$login}'
    ORDER BY bloque,dia";

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
      $horario[] =  $result["dia_id"].$result["bloque"];
      $materia[] =  $result["materia_nombre"];
      $color[] =  $result["materia_color"];
    }
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

    <?php
      $bloque = array('A','B','C','D','E');
      $mark = 0;
      $hora = 7;
      for ($j=0; $j < 5; $j++) { 
        echo "<tr>";
        echo "<td>".$hora.":00  </td>";
        $hora = $hora+2;
        for ($i=1; $i < 6; $i++) {
          echo "<td>";
          if (in_array($i.$bloque[$j], $horario)) {
            echo "<span class='label label-".$color[$mark]."'>".$materia[$mark]."</span>";
            $mark = ($mark + 1);
          }else{
            echo "";
          }
          echo "</td>";
        }
        echo "</tr>";
      } 
    ?>
    
  </table>
</div>
<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>

<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];
    include("header.php");
    include("navbar.php");
    include('../../src/estudiante/horario.php');
?>

<div class="container">
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
      for ($j=0; $j < 5; $j++) { 
        echo "<tr>";
        echo "<td>".$hora["$j"]."</td>";
        for ($i=1; $i < 6; $i++) {
          echo "<td>";
          if (in_array($i.$bloque[$j], $horario)) {
            echo "<span class='label label-".$color[$mark]."'>".$materia[$mark]."</span></br>";
            echo "<span>".$salon[$mark]."</span>";
            $mark++;
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

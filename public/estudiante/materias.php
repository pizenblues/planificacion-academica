<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");

    $query = "SELECT * FROM seccion 
    JOIN materia ON seccion.seccion_materia = materia.materia_id
    JOIN carrera ON materia.materia_carrera = carrera.carrera_id
    ORDER BY materia_nombre, seccion_nombre";

    $result = mysql_query($query, $connect);
    $sql = mysql_query($query, $connect);
    $data = mysql_fetch_assoc($result);

    include("header.php");
    include("navbar.php");
?>
<div class="container">
  <div class="page-header">
    <h2>Materias</h2>
  </div>

  <div class="col-xs-12 col-sm-12">
    <table class="table table-bordered table-custom">
      <tr>
        <th>Materia</th>
        <th>Seccion</th>
        <th>Creditos</th>
      </tr>
      
      <?php while($data = mysql_fetch_assoc($sql)): ?>
      <tr>
        <td>
          <a href="materia.php?seccion=<?php echo $data["seccion_id"] ?>">
            <?php echo $data["materia_nombre"] ?>
          </a>
        </td>
        <td>
          <?php echo $data["seccion_nombre"] ?>
        </td>
        <td>
          <?php echo $data["materia_creditos"] ?>
        </td>
      </tr>
      <?php endwhile ?>
    </table>
  </div>
</div>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
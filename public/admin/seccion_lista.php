<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");
    $message = "";
    if (isset($_GET["success"])) {
      $message =  "Accion ejecutada Exitosamente.";
    }

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
    <h2>Secciones</h2>
    <button class="btn btn-success">
      <a href="seccion_crear.php" class="none">Abrir una nueva seccion</a> 
    </button>
  </div>

  <?php if ($message):?>
    <div class="alert alert-success" role="alert"><?php echo $message ?></div>
  <?php endif ?> 

  <div class="col-xs-12 col-sm-12">
    <table class="table table-bordered table-custom">
      <tr>
        <th>Materia</th>
        <th>Seccion</th>
        <th>Acciones</th>
      </tr>
      
      <?php while($data = mysql_fetch_assoc($sql)): ?>
      <tr>
        <td>
          <a href="seccion.php?seccion=<?php echo $data["seccion_id"] ?>">
            <?php echo $data["materia_nombre"] ?>
          </a>
        </td>
        <td>
          <?php echo $data["seccion_nombre"] ?>
        </td>
        <td>
          <button class="btn btn-danger">
            <a class="none" href="javascript:js_Eliminar(<?php echo $data["seccion_id"] ?>)">
              borrar
            </a>   
           </button>
        </td>
      </tr>
      <?php endwhile ?>
    </table>
  </div>
</div>

<script type="text/javascript">
  function js_Eliminar(id_cl) {
    if (window.confirm("¿Está seguro que desea eliminar el registro seleccionado?")) {
           location.href = "seccion_borrar.php?id=" + id_cl;
    }
  }
</script>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
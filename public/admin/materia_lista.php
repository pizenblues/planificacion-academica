<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");
    $message = "";
    if (isset($_GET["success"])) {
      $message =  "Accion ejecutada Exitosamente.";
    }

    $query = "SELECT * FROM materia ORDER BY materia_nombre";

    $result = mysql_query($query, $connect);
    $sql = mysql_query($query, $connect);
    $data = mysql_fetch_assoc($result);

    include("header.php");
    include("navbar.php");
?>
<div class="container">
  <div class="page-header">
    <h2>Materias</h2>
    <button class="btn btn-success">
      <a href="materia_crear.php" class="none">Nueva materia</a> 
    </button>
  </div>

  <?php if ($message):?>
    <div class="alert alert-success" role="alert"><?php echo $message ?></div>
  <?php endif ?> 

  <div class="col-xs-12 col-sm-12">
    <table class="table table-bordered table-custom">
      <tr>
        <th>Nombre</th>
        <th>Creditos</th>
        <th>Acciones</th>
      </tr>
      
      <?php while($data = mysql_fetch_assoc($sql)): ?>
      <tr>
        <td>
            <?php echo $data["materia_nombre"] ?>
        </td>
        <td>
          <?php echo $data["materia_creditos"] ?>
        </td>
        <td>
          <button class="btn btn-warning">
            <a class="none" href="materia_editar.php?id=<?php echo $data["materia_id"] ?>">
              editar
            </a> 
           </button>
          
           <button class="btn btn-danger">
            <a class="none" href="javascript:js_Eliminar(<?php echo $data["materia_id"] ?>)">
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
           location.href = "materia_borrar.php?id=" + id_cl;
    }
  }
</script>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
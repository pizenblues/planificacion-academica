<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");
    $message = "";
    if (isset($_GET["success"])) {
      $message =  "Accion ejecutada Exitosamente.";
    }

    $query = "SELECT * FROM usuario WHERE perfil = 'profesor'";
    $result = mysql_query($query, $connect);
    $sql = mysql_query($query, $connect);

    include("header.php");
    include("navbar.php");
?>
<div class="container">
  <div class="page-header">
    <h2>Profesores</h2>
    <button class="btn btn-success">
      <a href="profesor_crear.php" class="none">Nuevo profesor</a> 
    </button>
  </div>

  <?php if ($message):?>
    <div class="alert alert-success" role="alert"><?php echo $message ?></div>
  <?php endif ?> 

  <div class="col-xs-12 col-sm-12">
    <table class="table table-bordered table-custom">
      <tr>
        <th>ID</th>
        <th>profesor</th>
        <th>Acciones</th>
      </tr>
      
      <?php while($data = mysql_fetch_assoc($sql)): ?>
      <tr>
        <td>
        	<?php echo $data["usuario_id"] ?>
        </td>
        <td>
          <a href="profesor.php?id=<?php echo $data["usuario_id"] ?>">
            <?php echo $data["nombre"] ?>
          </a>
        </td>
        <td>
        	<button class="btn btn-warning">
            <a class="none" href="profesor_editar.php?id=<?php echo $data["usuario_id"] ?>">
              editar
            </a> 
           </button>
          
           <button class="btn btn-danger">
            <a class="none" href="javascript:js_Eliminar(<?php echo $data["usuario_id"] ?>)">
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
		   	   location.href = "profesor_borrar.php?id=" + id_cl;
		}
	}
</script>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
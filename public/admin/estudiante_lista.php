<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");

    if (isset($_GET["success"])) {
      echo "MATERIA INSCRITA CON EXITO.";
    }

    $query = "SELECT * FROM usuario WHERE perfil = 'estudiante'";
    $result = mysql_query($query, $connect);
    $sql = mysql_query($query, $connect);

    include("header.php");
    include("navbar.php");
?>
<div class="container">
  <div class="page-header">
    <h2>Estudiantes</h2>
  </div>
	<a href="estudiante_crear">Nuevo estudiante</a>
  <div class="col-xs-12 col-sm-12">
    <table class="table table-bordered table-custom">
      <tr>
        <th>ID</th>
        <th>Estudiante</th>
        <th>Acciones</th>
      </tr>
      
      <?php while($data = mysql_fetch_assoc($sql)): ?>
      <tr>
        <td>
        	<?php echo $data["usuario_id"] ?>
        </td>
        <td>
          <a href="estudiante.php?id=<?php echo $data["usuario_id"] ?>">
            <?php echo $data["nombre"] ?>
          </a>
        </td>
        <td>
        	<a href="estudiante_editar.php?id=<?php echo $data["usuario_id"] ?>">
            	editar
          	</a>
        	
			     <a href="javascript:js_Eliminar(<?php echo $data["usuario_id"] ?>)">
            	borrar
          	</a>
        </td>
      </tr>
      <?php endwhile ?>
    </table>
  </div>
</div>

<script type="text/javascript">
	function js_Eliminar(id_cl) {
		if (window.confirm("¿Está seguro que desea eliminar el registro seleccionado?")) {
		   	   location.href = "estudiante_borrar.php?id=" + id_cl;
		}
	}
</script>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include('../../src/dbconnect.php');

    $materia_query = "SELECT * FROM materia";
    $materia_result = mysql_query($materia_query, $connect);
    $materias = array();
    while ($i = mysql_fetch_assoc($materia_result)) {
      $materias[] = $i;
    }

    $seccion_query = "SELECT * FROM seccion JOIN materia ON seccion.seccion_materia = materia.materia_id";
    $seccion_result = mysql_query($seccion_query, $connect);
    $secciones = array();
    while ($i = mysql_fetch_assoc($seccion_result)) {
      $secciones[] = $i;
    }
/*
    if (!(isset($_POST["seccion"]))) {
      
    }else{
      $materia = $_POST["materia"];
      $seccion = $_POST["seccion"];
      if (($materia=="")||($seccion=="")) {
        echo "mal";
      }else{
        echo "bien";
      }
    }
*/
    include("header.php");
    include("navbar.php");
?>
<div class="container">
  <div class="page-header">
    <h2>Inscribir materias</h2>
  </div>
  
  <form method="POST">
    <select id="materia" name="materia" class="form-control">
      <option value="">materias</option>
      <?php foreach ($materias as $materia): ?>
          <option value="<?php echo $materia['materia_id'] ?>"><?php echo $materia['materia_nombre'] ?></option>
      <?php endforeach ?>
    </select>

    <select id="seccion" name="seccion" class="form-control">
      <option value="">secciones</option>
      <?php foreach ($secciones as $seccion): ?>
          <option class="hidden" data-materia="<?php echo $seccion["seccion_materia"] ?>" 
          value="<?php echo $seccion['seccion_id'] ?>"><?php echo $seccion['seccion_nombre'] ?>
          </option>
      <?php endforeach ?>
    </select>

    <button class="btn btn-success">
      <a class="none" href="../../src/estudiante/inscribir.php">Inscribir</a>
    </button>
  </form>
</div>

<style>
  .hidden{
    display: none;
  }
</style>

<script>
$("#materia").on("change", function(){
  var materia = $(this).val()
  console.log(materia);
  $("#seccion")
    .find("option")
    .slice(1)
    .addClass("hidden")
    .filter("[data-materia="+materia+"]")
    .removeClass("hidden")
})
</script>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
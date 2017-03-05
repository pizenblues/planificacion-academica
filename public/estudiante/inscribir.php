<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include('../../src/dbconnect.php');
    $message = "";

    if (isset($_GET["success"])) {
      echo "MATERIA INSCRITA CON EXITO PAVITO.";
    }

    $estudiante_query = "SELECT * FROM usuario join estudiante on usuario.usuario_id = estudiante.estudiante_usuario
    join estudiante_seccion on estudiante_seccion.es_estudiante = estudiante.estudiante_id 
    join seccion on estudiante_seccion.es_seccion = seccion.seccion_id
    join materia on materia.materia_id = seccion.seccion_materia
    WHERE usuario.login = '{$login}'";
    $estudiante_results = mysql_query($estudiante_query, $connect);
    $data_results = mysql_query($estudiante_query, $connect);
    $estudiante_data = mysql_fetch_assoc($estudiante_results);
    $carga_actual = 0;
    while ($datas = mysql_fetch_assoc($data_results)) {
      $carga_actual = $carga_actual + $datas["materia_creditos"];
    }

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

    if (!(isset($_POST["seccion"]))) {
    }else{
      $materia = $_POST["materia"];
      $seccion = $_POST["seccion"];
      if (($materia=="")||($seccion=="")) {
        $message = "Los datos que ingresaste estan vacios";
      }else{
        //check si la materia choca
        $inscribir_query = "INSERT INTO estudiante_seccion (es_estudiante, es_seccion)
        values ('{$estudiante_data['estudiante_id']}','{$seccion}')";
        $inscribir_result = mysql_query($inscribir_query, $connect);
        if (!$inscribir_result) {
          $message = "Los datos que ingresaste ya estan registrados en la base de datos";
        } else {
            header('location:inscribir.php?success=1');
        }
      }
    }

    include("header.php");
    include("navbar.php");
?>
<div class="container">
  <div class="page-header">
    <h2>Inscribir materias</h2>
      <b>Carga actual: </b><?php echo $carga_actual ?>
      <b>Creditos aprovados: </b><?php echo $estudiante_data["estudiante_carga_academica"] ?>
  </div>
  <?php if (($carga_actual + 2) > $estudiante_data["estudiante_carga_academica"]): ?>
      <span>no posees los creditos disponibles suficientes como para inscribir materias adicionales.</span>
  <?php else: ?>
    <form method="post">
    <?php echo $message ?>
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
    <button class="btn btn-success"> inscribir </button>
  </form>
  <?php endif ?>
</div>

<script src="../../src/selects-anidados.js"></script>
<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
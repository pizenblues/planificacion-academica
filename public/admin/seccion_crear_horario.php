<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];
    $seccion_id = $_GET["seccion"];

    include("../../src/dbconnect.php");

    include("header.php");
    include("navbar.php");

    if (isset($_GET['creditos'])) {
      $creditos = $_GET["creditos"];
    }

    $message = "";
    $instruccion = "Horario - parte 1";

    if (isset($_GET['step'])) {
      $instruccion = "Horario  - parte".$creditos;
    }

    $dia_query = "SELECT * FROM dia";
    $dia_result = mysql_query($dia_query, $connect);
    $dias = array();
    while ($i = mysql_fetch_assoc($dia_result)) {
      $dias[] = $i;
    }

    $bloque_query = "SELECT * FROM bloque";
    $bloque_result = mysql_query($bloque_query, $connect);
    $bloques = array();
    while ($i = mysql_fetch_assoc($bloque_result)) {
      $bloques[] = $i;
    }

    $salon_query = "SELECT * FROM salon";
    $salon_result = mysql_query($salon_query, $connect);
    $salones = array();
    while ($i = mysql_fetch_assoc($salon_result)) {
      $salones[] = $i;
    }

    if(!(isset($_POST["dia"]))){
    }else{
      $dia = $_POST["dia"];
      $bloque = $_POST["bloque"];
      $salon = $_POST["salon"];
      if(!$dia || !$bloque || !$salon){
          $message = "Campos vacios";
      }else{
        /*
        //check profesor
        $check_query = "SELECT horario_dia, horario_bloque from horario
        where horario_dia = '{$dia}'
        and horario_bloque = '{$bloque}'";
        $check_result = mysql_query($check_query, $connect);
        $dia_bloque = mysql_fetch_assoc($check_result);

        $inscription_query = "SELECT horario_dia, horario_bloque from horario
        join horario_seccion on horario_seccion.hs_horario = horario.horario_id
        join seccion on horario_seccion.hs_seccion = seccion.seccion_id
        join profesor_seccion on seccion.seccion_id = profesor_seccion.ps_seccion
        join profesor on profesor_id = profesor_seccion.ps_profesor
        join usuario on usuario.usuario_id = profesor.profesor_usuario
        where usuario_id = '{$profesor}'
        and horario_bloque = '{$dia_bloque["horario_bloque"]}'
        and horario_dia = '{$dia_bloque["horario_dia"]}'";

        $inscription_result = mysql_query($inscription_query, $connect);
        $rowcount=mysql_num_rows($inscription_result);
        if ($rowcount > 0) {
          $message = "La seccion que intentas crear choca con otra en el horario del profesor.";
        }else{
        */
          //check profesor
          $insert_query = "INSERT INTO horario (horario_dia, horario_bloque, horario_salon) 
          VALUES ('{$dia}','{$bloque}','{$salon}')";
          $result = mysql_query($insert_query, $connect);
          if (!$result) {
            $message = "Los datos que ingresaste ya estan registrados en la base de datos";
          } else {
            $horario_id = mysql_insert_id($connect);
            header('location: seccion_horario_join.php?horario='.$horario_id.'&seccion='.$seccion_id.'&creditos='.$creditos);
          }
        //}
      }
    }
?>
<div class="container">
  <div class="page-header">
    <h2>Abrir una nueva seccion</h2>
  </div>

  <?php if ($message):?>
    <div class="alert alert-danger" role="alert"><?php echo $message ?></div>
  <?php endif ?>

  <div class="col-xs-12 col-sm-8">
    <form method="post">
      <?php echo $instruccion ?>
      <?php echo $message ?>
      <div class="form-group">
        <label for="dia">dia</label>
        <select id="dia" name="dia" class="form-control">
        <option value="">Seleccione</option>
        <?php foreach ($dias as $dia): ?>
            <option value="<?php echo $dia['dia_id'] ?>"><?php echo $dia['dia'] ?></option>
        <?php endforeach ?>
        </select>
      </div>

      <div class="form-group">
        <label for="bloque">bloque</label>
        <select id="bloque" name="bloque" class="form-control">
        <option value="">Seleccione</option>
        <?php foreach ($bloques as $bloque): ?>
            <option value="<?php echo $bloque['bloque_id'] ?>"><?php echo $bloque['bloque_hora'] ?></option>
        <?php endforeach ?>
        </select>
      </div>

      <div class="form-group">
        <label for="salon">salon</label>
        <select id="salon" name="salon" class="form-control">
        <option value="">Seleccione</option>
        <?php foreach ($salones as $salon): ?>
            <option value="<?php echo $salon['salon_id'] ?>"><?php echo $salon['salon'] ?></option>
        <?php endforeach ?>
        </select>
      </div>

      <button class="btn btn-success" type="submit">Siguiente</button>
    </form>
  </div>
<script src="../../src/selects-anidados.js"></script>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
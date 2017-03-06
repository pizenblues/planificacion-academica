<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");

    include("header.php");
    include("navbar.php");
    $creditos = 0;
    $message = "";

    $carrera_query = "SELECT * FROM carrera";
    $carrera_result = mysql_query($carrera_query, $connect);
    $carreras = array();
    while ($i = mysql_fetch_assoc($carrera_result)) {
      $carreras[] = $i;
    }

    $materia_query = "SELECT * FROM materia JOIN carrera ON carrera.carrera_id = materia.materia_carrera";
    $materia_result = mysql_query($materia_query, $connect);
    $materias = array();
    while ($i = mysql_fetch_assoc($materia_result)) {
      $materias[] = $i;
    }

    $profesor_query = "SELECT * FROM usuario WHERE perfil = 'profesor'";
    $profesor_result = mysql_query($profesor_query, $connect);
    $profesores = array();
    while ($i = mysql_fetch_assoc($profesor_result)) {
      $profesores[] = $i;
    }

    if(!(isset($_POST["nombre"]))){
    }else{
      $nombre = $_POST["nombre"];
      $materia = $_POST["materia"];
      $profesor_s = $_POST["profesor"];
      if(!$nombre || !$materia){
          $message = "Campos vacios";
      }else{
        $creditos_check = "SELECT materia_creditos from materia where materia_id = '{$materia}'";
        $creditos_result = mysql_query($creditos_check, $connect);
        $i = mysql_fetch_assoc($creditos_result);
        $creditos = $creditos + $i["materia_creditos"];
        
        $insert_query = "INSERT INTO seccion (seccion_nombre, seccion_materia) 
        VALUES ('{$nombre}','{$materia}')";
        $sql = mysql_query($insert_query, $connect);
        $seccion_id = mysql_insert_id($connect);
        header('location: seccion_crear_horario.php?seccion='.$seccion_id.'&creditos='.$creditos);
        
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
      <div class="form-group">
        <label for="nombre">nombre</label>
        <input type="text" class="form-control" name="nombre">
      </div>

      <div class="form-group">
        <label for="carrera">Carrera</label>
        <select id="carrera" name="carrera" class="form-control">
        <option value="">Seleccione</option>
        <?php foreach ($carreras as $carrera): ?>
            <option value="<?php echo $carrera['carrera_id'] ?>"><?php echo $carrera['carrera_nombre'] ?></option>
        <?php endforeach ?>
        </select>
      </div>

      <div class="form-group">
        <label for="materia">Materia</label>
        <select id="materia" name="materia" class="form-control">
          <option value="">Seleccione</option>
          <?php foreach ($materias as $materia): ?>
              <option class="hidden" data-carrera="<?php echo $materia["materia_carrera"] ?>" 
              value="<?php echo $materia['materia_id'] ?>"><?php echo $materia['materia_nombre'] ?>
              </option>
          <?php endforeach ?>
        </select>
      </div>
<!--
      <div class="form-group">
        <label for="profesor">profesor</label>

        <select id="profesor" name="profesor" class="form-control">
        <option value="">Seleccione</option>
        <?php foreach ($profesores as $profesor): ?>
            <option value="<?php echo $profesor['usuario_id'] ?>"><?php echo $profesor['nombre'] ?></option>
        <?php endforeach ?>
        </select>
      </div>
-->
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
<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");

    include("header.php");
    include("navbar.php");
    $message = "";

    $carrera_query = "SELECT * FROM carrera";
    $carrera_result = mysql_query($carrera_query, $connect);
    $carreras = array();
    while ($i = mysql_fetch_assoc($carrera_result)) {
      $carreras[] = $i;
    }

    if(!(isset($_POST["nombre"]))){
    }else{
      $nombre = $_POST["nombre"];
      $creditos = $_POST["creditos"];
      $color = $_POST["color"];
      $carrera = $_POST["carrera"];
      if(!$nombre || !$creditos || !$color || !$carrera){
          $message = "campos vacios";
      }else{
        $insert_query = "INSERT INTO materia (materia_nombre, materia_carrera, materia_creditos, materia_color) 
        VALUES ('{$nombre}','{$carrera}','{$creditos}','{$color}')";
        $sql = mysql_query($insert_query, $connect);
        header('location: materia_lista.php?success=1');
      }
    }
?>
<div class="container">
  <div class="page-header">
    <h2>Agregar nueva materia</h2>
  </div>

  <?php if ($message):?>
    <div class="alert alert-danger" role="alert"><?php echo $message ?></div>
  <?php endif ?> 

  <div class="col-xs-12 col-sm-6">
    <form method="post">
      <div class="form-group">
        <label for="nombre">nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre">
      </div>

      <div class="form-group">
        <label for="carrera">Carrera</label>
        <select name="carrera" class="form-control" id="carrera">
          <option value="">Seleccione</option>
          <?php foreach ($carreras as $carrera): ?>
            <option value="<?php echo $carrera['carrera_id'] ?>"><?php echo $carrera['carrera_nombre'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      
      <div class="form-group">
        <label for="color">Color de identificacion</label>
        <select name="color" class="form-control" id="color">
          <option class="" value="default">Seleccione</option>
          <option class="bg-gray" value="default">gris</option>
          <option class="bg-dblue" value="primary">azul oscuro</option>
          <option class="bg-green" value="success">verde</option>
          <option class="bg-lblue" value="info">azul claro</option>
          <option class="bg-yellow" value="warning">amarillo</option>
          <option class="bg-red" value="danger">rojo</option>
        </select>
      </div>
      
      <label>Creditos</label><br>
      <label class="custom-label" for="2">2</label><input type="radio" name="creditos" value="2" id="2"><br>
      <label class="custom-label" for="3">3</label><input type="radio" name="creditos" value="3" id="3"><br>
      <label class="custom-label" for="4">4</label><input type="radio" name="creditos" value="4" id="4"><br>

      <button class= "btn btn-success" type="submit">Guardar</button>
    </form>
  </div>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
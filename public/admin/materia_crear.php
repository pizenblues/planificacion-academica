<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");

    include("header.php");
    include("navbar.php");

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
          echo "campos vacios";
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

  <div class="col-xs-12 col-sm-8">
    <form method="post">
      <div class="form-group">
        <label for="nombre">nombre</label>
        <input type="text" class="form-control" name="nombre">
      </div>

      <select name="carrera">
        <option value="">Seleccione</option>
        <?php foreach ($carreras as $carrera): ?>
          <option value="<?php echo $carrera['carrera_id'] ?>"><?php echo $carrera['carrera_nombre'] ?></option>
        <?php endforeach ?>
      </select>

      <select name="color">
        <option class="" value="default">Seleccione</option>
        <option class="bg-gray" value="default">gris</option>
        <option class="bg-dblue" value="primary">azul oscuro</option>
        <option class="bg-green" value="success">verde</option>
        <option class="bg-lblue" value="info">azul claro</option>
        <option class="bg-yellow" value="warning">amarillo</option>
        <option class="bg-red" value="danger">rojo</option>
      </select>

      <input type="radio" name="creditos" value="2" id="2"><label for="2">2</label>
      <input type="radio" name="creditos" value="3" id="3"><label for="3">3</label>
      <input type="radio" name="creditos" value="4" id="4"><label for="4">4</label>
      <button type="submit">Guardar</button>
    </form>
  </div>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
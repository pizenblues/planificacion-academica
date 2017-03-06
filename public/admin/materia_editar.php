<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");

    if (isset($_GET["id"])) {
      $id = $_GET["id"];

    $query = "SELECT * FROM materia WHERE materia_id = '{$id}'";
    $result = mysql_query($query, $connect);
    $data = mysql_fetch_assoc($result);

    $carrera_query = "SELECT * FROM carrera";
    $carrera_result = mysql_query($carrera_query, $connect);
    $carreras = array();
    while ($i = mysql_fetch_assoc($carrera_result)) {
      $carreras[] = $i;
    }

    include("header.php");
    include("navbar.php");

    if(!(isset($_POST["nombre"]))){
    }else{
      $nombre = $_POST["nombre"];
      $creditos = $_POST["creditos"];
      $color = $_POST["color"];
      $carrera = $_POST["carrera"];
      if(!$nombre || !$creditos || !$color || !$carrera){
          echo "campos vacios";
      }else{
        $insert_query = "UPDATE materia  SET 
         materia_nombre = '{$nombre}',
         materia_carrera = '{$carrera}', 
         materia_creditos = '{$creditos}', 
         materia_color = '{$color}'
         WHERE materia_id = '{$id}'";
        $sql = mysql_query($insert_query, $connect);
        header('location: materia_lista.php?success=1');
      }
    }

  }
?>
<div class="container">
  <div class="page-header">
    <h2>Editar datos</h2>
  </div>

  <div class="col-xs-12 col-sm-8">
    <form method="post">
      <div class="form-group">
        <label for="nombre">nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $data['materia_nombre'] ?>">
      </div>

      <select name="carrera">
        <option value="">Seleccione</option>
          <?php foreach ($carreras as $carrera): 
            $selected = "";
            if ($carrera['carrera_id'] == $data['materia_carrera']) {
              $selected = "selected";
          }?>
            <option value="<?php echo $carrera['carrera_id'] ?>" selected="<?php echo $selected; ?>">
              <?php echo $carrera['carrera_nombre'] ?>
            </option>
          <?php endforeach ?>
      </select>

      <select name="color">
        <option value="" >Seleccione</option>
        <option class="bg-gray" value="default" <?php echo ($data['materia_color']=='default')?'selected':'' ?> >
          gris
        </option>
        <option class="bg-dblue" value="primary" <?php echo ($data['materia_color']=='primary')?'selected':'' ?> >
          azul oscuro
        </option>
        <option class="bg-green" value="success" <?php echo ($data['materia_color']=='success')?'selected':'' ?> >
          verde
        </option>
        <option class="bg-lblue" value="info" <?php echo ($data['materia_color']=='info')?'selected':'' ?> >
          azul claro
        </option>
        <option class="bg-yellow" value="warning" <?php echo ($data['materia_color']=='warning')?'selected':'' ?> >
          amarillo
        </option>
        <option class="bg-red" value="danger"<?php echo ($data['materia_color']=='danger')?'selected':'' ?> >
          rojo
        </option>
      </select>

      <input type="radio" name="creditos" value="2" id="2" <?php echo ($data['materia_creditos']=='2')?'checked':'' ?>>
      <label for="2">2</label>
      <input type="radio" name="creditos" value="3" id="3" <?php echo ($data['materia_creditos']=='3')?'checked':'' ?>>
      <label for="3">3</label>
      <input type="radio" name="creditos" value="4" id="4" <?php echo ($data['materia_creditos']=='2')?'checked':'' ?>>
      <label for="4">4</label>
      <button type="submit">Guardar</button>
    </form>
  </div>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
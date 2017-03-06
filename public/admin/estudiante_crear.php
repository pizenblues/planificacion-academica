<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");

    include("header.php");
    include("navbar.php");
    $message = "";

    if(!(isset($_POST["nombre"]))){
    }else{
      $login = $_POST["login"];
      $pass = $_POST["pass"];
      $nombre = $_POST["nombre"];
      $cedula = $_POST["cedula"];
      $telefono = $_POST["telefono"];
      $correo = $_POST["correo"];
      $direccion = $_POST["direccion"];
      $creditos = $_POST["creditos"];
      $ingreso = $_POST["ingreso"];
      if(!$telefono || !$correo || !$direccion || !$nombre || !$cedula || !$creditos || !$ingreso){
          $message =  "Algun campo esta vacio.";
      }else{
        $insert_query = "INSERT INTO usuario (login, pass, perfil, nombre, cedula, telefono, correo, direccion)
        VALUES ('{$login}','{$pass}','estudiante','{$nombre}','{$cedula}','{$telefono}','{$correo}','{$direccion}')";
        $sql = mysql_query($insert_query, $connect);
        $id = mysql_insert_id($connect);
        header('location: estudiante_crear_join.php?id='.$id.'&creditos='.$creditos.'&ingreso='.$ingreso);
      }
    }
?>
<div class="container">
  <div class="page-header">
    <h2>Agregar estudiante</h2>
  </div>

  <?php if ($message):?>
    <div class="alert alert-danger" role="alert"><?php echo $message ?></div>
  <?php endif ?> 

  <div class="col-xs-12">
    <form method="post">
      <div class="col-xs-12 col-sm-6">
        <h4>Datos de la cuenta</h4>
        <div class="form-group">
          <label for="login">login</label>
          <input type="text" class="form-control" name="login">
        </div>
        <div class="form-group">
          <label for="pass">pass</label>
          <input type="text" class="form-control" name="pass">
        </div>
        <h4>Datos personales</h4>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" name="nombre">
        </div>
        <div class="form-group">
          <label for="cedula">Cedula</label>
          <input type="text" class="form-control" name="cedula">
        </div>
      </div>
      
      <div class="col-xs-12 col-sm-6">
        <h4>Datos Academicos</h4>
        <div class="form-group">
          <label for="creditos">Creditos aprovados</label>
          <input type="number" class="form-control" name="creditos" min="8" max="25">
        </div>
        <div class="form-group">
          <label for="ingreso">Año de ingreso</label>
          <input type="number" class="form-control" name="ingreso" min="1999" max="2018">
        </div>
        <h4>Informacion de contacto</h4>
        <div class="form-group">
          <label for="telefono">telefono</label>
          <input type="text" class="form-control" name="telefono">
        </div>
        <div class="form-group">
          <label for="correo">correo</label>
          <input type="text" class="form-control" name="correo">
        </div>
        <div class="form-group">
          <label for="direccion">direccion</label>
          <input type="text" class="form-control" name="direccion">
        </div>
        <button class="btn btn-success" type="submit">Guardar</button>
      </div>
    </form>
  </div>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
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
      if(!$telefono || !$correo || !$direccion || !$nombre || !$cedula){
          $message = "Campos vacios";
      }else{
        $insert_query = "INSERT INTO usuario (login, pass, perfil, nombre, cedula, telefono, correo, direccion)
        VALUES ('{$login}','{$pass}','profesor','{$nombre}','{$cedula}','{$telefono}','{$correo}','{$direccion}')";
        $sql = mysql_query($insert_query, $connect);
        $id = mysql_insert_id($connect);
        header('location: profesor_crear_join.php?id='.$id);
      }
    }
?>
<div class="container">
  <div class="page-header">
    <h2>Agregar profesor</h2>
  </div>

  <?php if ($message):?>
    <div class="alert alert-danger" role="alert"><?php echo $message ?></div>
  <?php endif ?> 

  <div class="col-xs-12">
    <form method="post">
      <div class="col-xs-12 col-sm-4">
        <h4>Datos de la cuenta</h4>
        <div class="form-group">
          <label for="login">login</label>
          <input type="text" class="form-control" name="login">
        </div>
        <div class="form-group">
          <label for="pass">pass</label>
          <input type="text" class="form-control" name="pass">
        </div>
      </div>

      <div class="col-xs-12 col-sm-4">
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

      <div class="col-xs-12 col-sm-4">
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
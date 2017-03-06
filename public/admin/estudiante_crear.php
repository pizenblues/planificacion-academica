<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");

    include("header.php");
    include("navbar.php");

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
          echo "campos vacios";
      }else{
        $insert_query = "INSERT INTO usuario (login, pass, perfil, nombre, cedula, telefono, correo, direccion)
        VALUES ('{$login}','{$pass}','estudiante','{$nombre}','{$cedula}','{$telefono}','{$correo}','{$direccion}')";
        $sql = mysql_query($insert_query, $connect);
        header('location: estudiante_lista.php?success=1');
      }
    }
?>
<div class="container">
  <div class="page-header">
    <h2>Agregar estudiante</h2>
  </div>

  <div class="col-xs-12 col-sm-8">
    <form method="post">
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
      <button type="submit">Guardar</button>
    </form>
  </div>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
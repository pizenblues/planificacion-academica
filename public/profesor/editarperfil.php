<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];

    include("../../src/dbconnect.php");
    $message = "";

    $query = "SELECT * FROM usuario WHERE login = '{$login}'";
    $result = mysql_query($query, $connect);
    $sql = mysql_query($query, $connect);
    $data = mysql_fetch_assoc($result);

    $phpdate = strtotime( $data["nacimiento"] );
    $nacimiento = date( 'd/m/Y', $phpdate );

    include("header.php");
    include("navbar.php");

    if(!(isset($_POST["telefono"]))){
    }else{
      $telefono = $_POST["telefono"];
      $correo = $_POST["correo"];
      $direccion = $_POST["direccion"];
      if(!$telefono || !$correo || !$direccion){
          $message =  "Alguno de los campos está vacio.";
      }else{
        $update_query = "UPDATE usuario SET telefono = '{$telefono}',correo = '{$correo}' , direccion = '{$direccion}' WHERE login = '{$login}'";
        $sql = mysql_query($update_query, $connect);
        header('location: perfil.php?success=1');
      }
    }
?>
<div class="container">
  <div class="page-header">
    <h2>Editar datos</h2>
  </div>

  <div class="col-xs-12">
    <?php if ($message):?>
      <div class="alert alert-danger" role="alert"><?php echo $message ?></div>
    <?php endif ?> 
    <form method="post">
      <div class="col-xs-12 col-sm-6">
        <h3>Datos personales</h3>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" name="nombre" value="<?php echo $data["nombre"]?>" disabled>
        </div>
        <div class="form-group">
          <label for="cedula">Cedula</label>
          <input type="text" class="form-control" name="cedula" value="<?php echo $data["cedula"]?>" disabled>
        </div>
        <div class="form-group">
          <label for="nacimiento">Fecha de nacimiento</label>
          <input type="text" class="form-control" name="nacimiento" value="<?php echo $nacimiento?>" disabled>
        </div>
      </div>
      
      <div class="col-xs-12 col-sm-6">
        <h3>Informacion de contacto</h3>
        <div class="form-group">
          <label for="telefono">telefono</label>
          <input type="text" class="form-control" name="telefono" value="<?php echo $data["telefono"]?>">
        </div>
        <div class="form-group">
          <label for="correo">correo</label>
          <input type="text" class="form-control" name="correo" value="<?php echo $data["correo"]?>">
        </div>
        <div class="form-group">
          <label for="direccion">direccion</label>
          <input type="text" class="form-control" name="direccion" value="<?php echo $data["direccion"]?>">
        </div>
        <input class="btn btn-success" type="submit" name="modificar" value="modificar">
        </div>
    </form>
  </div>

<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
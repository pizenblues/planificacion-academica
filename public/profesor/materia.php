<?php 
  session_start();
  
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):

    $login = $_SESSION["login"];
    $seccion = $_GET["seccion"];
    
    include("../../src/dbconnect.php");
    require ('../../src/estudiante/halp.php');

    $query = "SELECT * FROM seccion
    left join materia on materia.materia_id = seccion.seccion_materia
    left join carrera on carrera.carrera_id = materia.materia_carrera
    left join profesor_seccion on profesor_seccion.ps_seccion = seccion.seccion_id
    left join profesor on profesor.profesor_id = profesor_seccion.ps_profesor
    left join horario_seccion on horario_seccion.hs_seccion = seccion.seccion_id
    left join horario on horario.horario_id = horario_seccion.hs_horario
    left JOIN dia ON horario.horario_dia = dia.dia_id
    left JOIN salon ON horario.horario_salon = salon.salon_id
    left JOIN bloque ON horario.horario_bloque = bloque.bloque_id
    left join usuario on profesor.profesor_usuario = usuario.usuario_id
    where seccion_id = '{$seccion}'
    ";

    $horario_completo = do_query($connect, $query);

    $data = reset($horario_completo);
    include("header.php");
    include("navbar.php");
?>
<div class="container">
  <div class="page-header">
    <h2><?php echo $data["materia_nombre"] ?></h2>
  </div>
  
  <div class="col-xs-12 col-sm-4">
    <b>Carrera: <?php echo $data["carrera_nombre"] ?></b> <br>
    <b><?php echo $data["seccion_nombre"] ?></b> <br>
    <b>Profesor: <?php echo $data["nombre"] ?></b> <br>
    <b>Salon: <?php echo $data["salon"] ?></b> <br>
  </div>

  <div class="col-xs-12 col-sm-8">
    <table class="table table-bordered table-custom">
      <tr>
        <th>Dia</th>
        <th>Hora</th>
      </tr>
      <?php foreach ($horario_completo as $horario): ?>
        <tr>
          <td><?php echo $horario["dia"] ?></td>
          <td><?php echo $horario["bloque_hora"] ?></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
</div>
<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>
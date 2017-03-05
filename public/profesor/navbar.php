<?php
  $filepath = $_SERVER['PHP_SELF'];
  $filename = basename($filepath); 

  $horario = array('index.php');
  $perfil = array('perfil.php','editarperfil.php');
  $materia = array('materias.php','materia.php');
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
        <li <?php echo in_array($filename, $horario) ? "class='active'" : '' ?>>
          <a href="index.php">Horario</a>
        </li>
        <li <?php echo in_array($filename, $perfil) ? "class='active'" : '' ?> >
          <a href="perfil.php">Perfil</a>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <span class="navbar-text navbar-rightn">
        Logeado como Profesor <b><?php echo $login ?></b>
      </span>
      <a class="none" href="../../src/logout.php">
        <button type="button" class="btn btn-default navbar-btn navbar-right custom-btn">
          salir <i class="fa fa-sign-out" aria-hidden="true"></i>
        </button>
      </a>
    </ul>
  </div>
</nav>
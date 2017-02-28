<?php
  $filepath = $_SERVER['PHP_SELF'];
  $filename = basename($filepath); 

  $horario = array('index.php');
  $inscripcion = array('inscripcion.php');
  $perfil = array('perfil.php');
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
        <li <?php echo in_array($filename, $inscripcion) ? "class='active'" : '' ?>>
          <a href="inscribir.php">Inscribir materias</a>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <span class="navbar-text navbar-rightn">
        Logeado como Estudiante <b><?php echo $login ?></b>
      </span>
      <button type="button" class="btn btn-default navbar-btn navbar-right custom-btn">
      	<a href="../../src/logout.php">
          salir <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
      </button>
    </ul>
  </div>
</nav>
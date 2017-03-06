<?php
  $filepath = $_SERVER['PHP_SELF'];
  $filename = basename($filepath); 

  $estudiante = array('estudiante_lista.php','estudiante.php','estudiante_editar.php','estudiante_borrar.php','estudiante_crear.php');
  $materia = array('materia_lista.php','materia.php','materia_editar.php','materia_borrar.php','materia_crear.php');
  $profesor = array('profesor_lista.php','profesor.php','profesor_editar.php','profesor_borrar.php','profesor_crear.php');
  
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
        <li <?php echo in_array($filename, $profesor) ? "class='active'" : '' ?>>
          <a href="profesor_lista.php">profesores</a>
        </li>
        <li <?php echo in_array($filename, $estudiante) ? "class='active'" : '' ?>>
          <a href="estudiante_lista.php">estudiantes</a>
        </li>
        <li <?php echo in_array($filename, $materia) ? "class='active'" : '' ?>>
          <a href="materia_lista.php">materias</a>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <span class="navbar-text navbar-rightn">
        Logeado como Admin <b><?php echo $login ?></b>
      </span>
      <a class="none" href="../../src/logout.php">
        <button type="button" class="btn btn-default navbar-btn navbar-right custom-btn">
          salir <i class="fa fa-sign-out" aria-hidden="true"></i>
        </button>
      </a>
    </ul>
  </div>
</nav>
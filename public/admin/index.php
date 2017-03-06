<?php 
  session_start();
  if(isset($_SESSION["login"]) && ($_SESSION["login"]!=null)):
    $login = $_SESSION["login"];
    include("header.php");
    include("navbar.php");
?>

<div class="container">
  <div class="page-header">
    <h2>Horario de clases</h2>
  </div>
  hi
</div>
<?php 
  include('footer.php');
  else: 
    header('location: ../error.php');
  endif;
?>

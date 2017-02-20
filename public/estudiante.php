<?php include('../src/estudiante_dashboard.php');
$login = $_GET["login"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="custom.css">
  <title>Horario</title>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
          <li><a href="#">Inicio</a></li>
          <li class="active"><a href="#">Perfil</a></li>
      </ul>
      <button type="button" class="btn btn-default navbar-btn navbar-right custom-btn">Salir</button>
    </div>
  </nav>
  <div class="container">
    <div class="page-header">
      <h2>Horario de clases</h2>
      <h1><?php echo $login ?></h1>
    </div>
    <table class="table table-bordered table-custom">
      <tr>
        <th>Hora</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miercoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
      </tr>
      <tr>
        <td>7:00 - 9:00</td>
        <td><span class="label label-info">Matematica</span></td>
        <td><span class="label label-warning">Sistemas II</span></td>
        <td><span class="label label-info">Matematica</span></td>
        <td><span class="label label-warning">Sistemas II</span></td>
        <td></td>
      </tr>
      <tr>
        <td>9:00 - 11:00</td>
        <td><span class="label label-primary">Discretas</span></td>
        <td></td>
        <td><span class="label label-primary">Discretas</span></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>11:00 - 1:00</td>
        <td></td>
        <td><span class="label label-danger">PDA</span></td>
        <td></td>
        <td><span class="label label-danger">PDA</span></td>
        <td><span class="label label-danger">PDA</span></td>
      </tr>
      <tr>
        <td>1:00 - 3:00</td>
        <td><span class="label label-success">Extra academica</span></td>
        <td></td>
        <td><span class="label label-success">Extra academica</span></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>3:00 - 5:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
  </div>
</body>
</html>
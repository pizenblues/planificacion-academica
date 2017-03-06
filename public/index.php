<?php include('../src/login.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../modules/bootstrap/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="../modules/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="custom.css">
	<title>Iniciar sesion</title>
</head>
<body class="bgmain">
	<div class="container col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
		<div class="page-header">
			<img src="images/logo.png" class="img-responsive logo">
			<h1 class="text-center">Bienvenido</h1>
		</div>
		<div class="panel panel-default panel-shadow">
			<div class="panel-heading text-center">
				<span>
					Ingrese sus datos para tener acceso al sistema
				</span>
			</div>
			<div class="panel-body">
				<?php if ($error == true):?>
					<div class="alert alert-danger" role="alert">Sus datos estan incorrectos</div>
				<?php endif ?> 
				<form method="post" class="col-xs-12 col-sm-10 col-sm-offset-1">
					<div class="form-group">
						<label for="usuario">usuario</label>
						<input type="text" class="form-control" name="usuario" required>
					</div>
					<div class="form-group">
						<label for="clave">clave</label>
						<input type="password" class="form-control" name="clave" required>
					</div>
					<button type="submit" class="btn btn-primary col-xs-12">Entrar</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
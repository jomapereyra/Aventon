<html>
<head>
	<meta charset="utf-8">
	<title> index </title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
</head>
<body class="fondo-inicio">
	<header>
		<div class="container-fluid">
			<div class="row">
				<img class="logo-alternativo" src="img/logo-alternativo-aventon.png" alt="logo">
			</div>
		</div>
	</header>
	<div class="container my-container col-md-8">
		
		<form action="" class="form-horizontal semitransparente rounded">
			<div class="form-group padding-left-15">
				<h1 class="text-center">Bienvenido a nuestro sitio!</h2>
					<h4 class="text-center">Inicie sesión para empezar a viajar</h4>	
				</div>
				<div class="form-group">
					<label for="nombre" class="control-label col-md-2">Email:</label>
					<div class="col-md-12">
						<input class="form-control" type="email" name="" id="nombre" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="contraseña" class="control-label col-md-2"> Contraseña: </label>
					<div class="col-md-12">
						<input class="form-control" type="password" name="" id="contraseña" placeholder="Contraseña">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2  col-xs-offset-7 col-md-offset-10">
						<button type="submit" class="btn btn-primary">Iniciar Sesión</button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 col-md-offset-2">
						<button class="btn btn-primary">Registrarse</button>
					</div>
				</div>
			</form>

		</div>
		<?php include("footer.php"); ?>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	</html>
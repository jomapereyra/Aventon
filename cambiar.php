<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<title>Cambiar contraseña</title>
</head>
<body class="fondo-usuario">
	<header>
		<div class="container-fluid">

			<div class="row">

				<div class="col-md-6 col-sm-6 col-6"><!--col-md-2 -->
					<img class="logo-alternativo" src="img/logo-alternativo-aventon.png" alt="logo">
				</div>

			</div>

		</div>
	</div>
</header>

<form class="padding-bottom-20">
	<div class="container my-container">
		<div class="row semitransparente rounded">
			<div class="col-md-8 container">
				<input type="hidden" id="email" value="<?php 
				echo $_GET['email'];
				?>">
				<div class="form-group col-md-12 col-sm-12">
					<label for="nueva_contraseña">Ingresar una nueva contraseña: </label>
					<input type="password"	class="form-control" id="contraseña" name="contraseña" value="" placeholder="Nueva contraseña">
					<div id="mensaje1" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ingresar una contraseña</div>
					<div id="mensaje1_1" class="error"><i class="fas fa-times"></i>
					&nbsp;Contraseña demasiado corta</div>
					<div id="mensaje1_2" class="error"><i class="fas fa-times"></i>
					&nbsp;Contraseña demasiado larga</div>
					<small id="ayudaNombre" class="text-muted">
						La contraseña tiene que tener entre 8 y 20 caracteres.
					</small>														
				</div>
				<div class="form-group col-md-12 col-sm-12">
					<label for="confirmar_contraseña">Confirmar la contraseña nueva: </label>
					<input type="password"	class="form-control" id="confirmar_contraseña" name="confirmar_contraseña" value="" placeholder="Nueva contraseña">
					<div id="mensaje2" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ingresar una contraseña</div>
					<div id="mensaje2_1" class="error"><i class="fas fa-times"></i>
					&nbsp;Contraseña incorrecta</div>
					<small id="ayudaNombre" class="text-muted">
						Tiene que ser igual a la contraseña.
					</small>														
				</div>
				<div class="form-row">
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<a href="index.php" class="btn btn-danger btn-block ">Cancelar</a>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<button id="boton_camb" type="button"  class="btn btn-info btn-block">Confirmar</button>
					</div>			
				</div>
			</div>
		</div>
	</div>
</form>
<!--<?php include("footer.php");?>-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/login/comprobar.js"></script>
<script src="js/recuperar/validar_cambio.js"></script>
</body>
</html>
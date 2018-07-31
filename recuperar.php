<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<title>Recuperar_contraseña</title>
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
				<div class="form-group col-md-12 col-sm-12">
					<label for="email_usuario">Ingresar email: </label>
					<input class="form-control" type="text" name="email_usuario" id="email_usuario" placeholder="Email">
					<div id="mensaje1" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ingresar un email</div>
				</div>
				<div class="form-group col-md-12 col-sm-12">
					<label for="pregunta">Seleccione una pregunta: </label>
					<select class="form-control" id="pregunta" name="pregunta">
						<option value="">Elija una pregunta</option>
						<?php 
						echo "<option>¿Nombre de tu mascota?</option>";
						echo "<option>¿Pelicula favorita?</option>";
						echo "<option>¿Color favorito?</option>";
						echo "<option>¿Dibujito favorito?</option>";										
						?>
					</select>
					<div id="mensaje2" class="error"><i class="fas fa-times"></i>
					&nbsp;Seleccione una pregunta</div>
				</div>
				<div class="form-group col-md-12 col-sm-12">
					<label for="telefono_usuario">Ingresar una respuesta: </label>
					<input type="text"	class="form-control" id="respuesta" name="respuesta" value="" placeholder="Respuesta">
					<div id="mensaje3" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ingresar una respuesta</div>														
				</div>
				<div class="form-row">
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<a href="index.php" class="btn btn-danger btn-block ">Cancelar</a>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<button id="boton_conf" type="button"  class="btn btn-info btn-block">Confirmar</button>
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
<script src="js/recuperar/validar_recuperacion.js"></script>
</body>
</html>
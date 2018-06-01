<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<title>Registro</title>
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
<form class="padding-bottom-20" name="origen" action="controlador/guardar_registro.php" method="post">
	<div class="container my-container" id="">
		<div class="row semitransparente rounded">
			<div class="col-md-4">
				<h1>Registro de Usuario</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque beatae magni iusto, tempora eveniet distinctio eius sequi, consequuntur earum voluptatem recusandae molestiae doloremque fugit mollitia quisquam assumenda incidunt, debitis.</p>
			</div>
			<div class="col-md-8">
				<div class="form-group col-md-6 col-sm-12">
					<label for="nombre_usuario">Ingresar nombre: </label>
					<input type="text"	class="form-control" id="nombre_usuario" name="nombre_usuario" value="" placeholder="Nombre">
					<div id="mensaje1" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ingresar un nombre</div>
					<div id="mensaje1_1" class="error"><i class="fas fa-times"></i>
					&nbsp;No se admiten caracteres especiales</div>
					<small id="ayudaNombre" class="text-muted">
						El nombre no debe contener caracteres especiales.
					</small>
				</div>
				<div class="form-group col-md-6 col-sm-12">
					<label for="apellido_usuario">Ingresar apellido: </label>
					<input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="Apellido">
					<div id="mensaje2" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ingresar un apellido</div>
					<div id="mensaje2_1" class="error"><i class="fas fa-times"></i>
					&nbsp;No se admiten caracteres especiales</div>
					<small id="ayudaNombre" class="text-muted">
						El apellido no debe contener caracteres especiales.
					</small>
				</div>
				<div class="form-group col-md-6 col-sm-12">
					<label for="email_usuario">Ingresar email: </label>
					<input class="form-control" type="text" name="email_usuario" id="email_usuario" placeholder="Email">
					<div id="mensaje3" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ingresar un email</div>
					<div id="mensaje8" class="error"><i class="fas fa-times"></i>
					&nbsp;Email existente</div>
				</div>
				<div class="form-group col-md-6 col-sm-12">
					<label for="contraseña"> Contraseña: </label>
					<input class="form-control" type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
					<div id="mensaje4" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ingresar una contraseña</div>
					<div id="mensaje4_1" class="error"><i class="fas fa-times"></i>
					&nbsp;Contraseña demasiado corta</div>
					<div id="mensaje4_2" class="error"><i class="fas fa-times"></i>
					&nbsp;Contraseña demasiado larga</div>
					<small id="ayudaNombre" class="text-muted">
						La contraseña tiene que tener entre 8 y 20 caracteres.
					</small>
				</div>
				<div class="form-group col-md-6 col-sm-12">
					<label for="Confirmar_Contraseña"> Confirmar contraseña: </label>
					<input class="form-control" type="password" name="" id="confirmar_contraseña" placeholder="Confirmar contraseña">
					<div id="mensaje5" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ingresar una contraseña</div>
					<div id="mensaje5_1" class="error"><i class="fas fa-times"></i>
					&nbsp;Contraseña incorrecta</div>
					<small id="ayudaNombre" class="text-muted">
						Tiene que ser igual a la contraseña.
					</small>
				</div>
				<div class="form-group col-md-6 col-sm-6">
					<label for="fecha_nacimiento">Ingrese su fecha de nacimiento: </label>
					<div class="input-group date">
						<input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control">
						<div class="input-group-append">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>
					<div id="mensaje6" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ingresar una fecha de nacimiento</div>
					<div id="mensaje6_1" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ser mayor de edad</div>
				</div>
				<div class="form-group col-md-6 col-sm-12">
					<label for="telefono_usuario">Ingresar un telefono: </label>
					<input type="text"	class="form-control" id="telefono_usuario" name="telefono_usuario" value="" placeholder="Telefono">
					<div id="mensaje7" class="error"><i class="fas fa-times"></i>
					&nbsp;Debe ingresar un nombre</div>
					<div id="mensaje7_1" class="error"><i class="fas fa-times"></i>
					&nbsp;Ingrese un numero telefonico</div>
					<small id="ayudaNombre" class="text-muted">
						EJ:"02344452729" "0234415427554".
					</small>
					
				</div>

				<!--************** BOTONES **************-->

				<div class="form-row">
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<a href="index.php" class="btn btn-danger btn-block ">Cancelar</a>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<button id="boton_reg" type="button"  class="btn btn-info btn-block">Registrar</button>
					</div>			
				</div>
			</div>
		</div>
	</div>
</form>

<?php 
include("footer.php");
?>
<script src="js/jquery.min.js"></script>
<script src="js/registrar/validaciones_registrar.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Modificar Vehiculo</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body class="fondo-usuario">
	<?php include("header.php");
	$email=$_SESSION["usuario"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_datos($email);
	?>
	<form class="" action="controlador/guardar_modificacion_perfil.php" method="post" onSubmit="return validar();">

		<div class="container my-container">

			<div class="semitransparente rounded">

				<h2 class="text-center">Modificar Perfil</h2>

				<div class="form-row">

					<!-- ******** NOMBRE ******************* -->

					<div class="form-group col-md-6 col-sm-12">
						<label for="nombre_usuario">Cambiar su nombre: </label>
						<input type="text"	class="form-control" id="nombre_usuario" name="nombre_usuario" value=<?php echo $usuario["nombre"] ?> placeholder="Nombre">
						<div id="mensaje1" class="error"><i class="fas fa-times"></i>
						&nbsp;Debe ingresar un nombre</div>
						<div id="mensaje1_1" class="error"><i class="fas fa-times"></i>
						&nbsp;No se admiten caracteres especiales</div>
						<small id="ayudaNombre" class="text-muted">
							El nombre no debe contener caracteres especiales.
						</small>
					</div>

					<!-- ******** APELLIDO ******************* -->

					<div class="form-group col-md-6 col-sm-12">
						<label for="apellido_usuario">Cambiar su apellido: </label>
						<input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="Apellido" value=<?php echo $usuario["apellido"] ?>>
						<div id="mensaje2" class="error"><i class="fas fa-times"></i>
						&nbsp;Debe ingresar un apellido</div>
						<div id="mensaje2_1" class="error"><i class="fas fa-times"></i>
						&nbsp;No se admiten caracteres especiales</div>
						<small id="ayudaNombre" class="text-muted">
							El apellido no debe contener caracteres especiales.
						</small>
					</div>

				</div>

				<div class="form-row">

					<!-- ******** CONTRASEÑA ******************* -->

					<div class="form-group col-md-6 col-sm-12">
						<label for="contraseña">Cambiar contraseña: </label>
						<input class="form-control" type="password" name="contraseña" id="contraseña" placeholder="Contraseña" value=<?php echo $usuario["contrasenia"] ?>>
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

					<!-- ******** CONFIRMACION CONTRASEÑA ******************* -->

					<div class="form-group col-md-6 col-sm-12">
						<label for="Confirmar_Contraseña"> Confirmar cambio de contraseña: </label>
						<input class="form-control" type="password" name="" id="confirmar_contraseña" placeholder="Confirmar contraseña"
						value=<?php echo $usuario["contrasenia"] ?>>
						<div id="mensaje5" class="error"><i class="fas fa-times"></i>
						&nbsp;Debe ingresar una contraseña</div>
						<div id="mensaje5_1" class="error"><i class="fas fa-times"></i>
						&nbsp;Contraseña incorrecta</div>
						<small id="ayudaNombre" class="text-muted">
							Tiene que ser igual a la contraseña.
						</small>
					</div>

				</div>

				<div class="form-row">

					<!-- ******** FECHA NACIMIENTO ******************* -->

					<div class="form-group col-md-6 col-sm-6">
						<label for="fecha_nacimiento">Cambiar su fecha de nacimiento: </label>
						<div class="input-group date">
							<input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control" value=<?php echo $usuario["f_nacimiento"] ?>>
							<div class="input-group-append">
								<div class="input-group-text"><i class="fa fa-calendar"></i></div>
							</div>
						</div>
						<div id="mensaje6" class="error"><i class="fas fa-times"></i>
						&nbsp;Debe ingresar una fecha de nacimiento</div>
						<div id="mensaje6_1" class="error"><i class="fas fa-times"></i>
						&nbsp;Debe ser mayor de edad</div>
					</div>

					<!-- ******** TELEFONO ******************* -->

					<div class="form-group col-md-6 col-sm-12">
						<label for="telefono_usuario">Cambiar su telefono: </label>
						<input type="text"	class="form-control" id="telefono_usuario" name="telefono_usuario" value=<?php echo $usuario["telefono"] ?> placeholder="Telefono">
						<div id="mensaje7" class="error"><i class="fas fa-times"></i>
						&nbsp;Debe ingresar un nombre</div>
						<div id="mensaje7_1" class="error"><i class="fas fa-times"></i>
						&nbsp;Ingrese un numero telefonico</div>
						<small id="ayudaNombre" class="text-muted">
							EJ:"02344452729" "0234415427554".
						</small>
					</div>
					
				</div>

				<!-- ******** BOTONES **************** -->

				<div class="form-row">
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<a class="btn btn-danger btn-block" href="ver_perfil.php" role="button">Cancelar</a>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<button type="submit" class="btn btn-info btn-block" id="boton_agregar">Modificar</button>
					</div>			
				</div>

			</div>

		</div>
	</form>
	<!--<?php include("footer.php");?>-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/agregar_vehiculo/validaciones_vehiculo.js"></script>
</body>
</html>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Agregar Vehiculo</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body class="fondo-usuario">
	<?php include("header.php");
	require_once("modelo/tipo_vehiculo.php");
	$tabla_tipo=new TipoVehiculo();
	$tipos=$tabla_tipo->get_tipos();
	?>
	<form class="" action="controlador/guardar_vehiculo.php" method="post" onSubmit="return validar();">

		<div class="container my-container">

			<div class="semitransparente rounded">

				<h2 class="text-center">Nuevo Vehiculo</h2>

				<!-- ******** PATENTE ******************* -->
				
				<div class="form-group">
					<label for="patente">Ingrese la patente de su vehiculo: </label>
					<input type="text" class="form-control" id="patente" name="patente" placeholder="Patente">
					<div id="mensaje1" class="error"><i class="fas fa-times"></i>

					&nbsp;Debe ingresar la patente</div>
					<div id="mensaje1_1" class="error"><i class="fas fa-times"></i>
					&nbsp;No se admiten caracteres especiales</div>

				</div>

				<div class="row">

					<!-- *********** MARCA ******************* -->
					
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="marca">Ingrese la marca de su vehiculo: </label>
							<input type="text" class="form-control" id="marca" name="marca" placeholder="Marca">
							<div id="mensaje2" class="error"><i class="fas fa-times"></i>

							&nbsp;Debe ingresar la marca</div>
						</div>
					</div>

					<!-- *********** MODELO ******************* -->

					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="modelo">Ingrese el modelo de su vehiculo: </label>
							<input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo">
							<div id="mensaje3" class="error"><i class="fas fa-times"></i>

							&nbsp;Debe ingresar el modelo</div>
						</div>
					</div>

					<!-- *********** AÑO ******************* -->

					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="año">Ingrese el año de su vehiculo: </label>
							<input type="number" min="1950" class="form-control" id="año" name="año" placeholder="Año">
							<div id="mensaje4" class="error"><i class="fas fa-times"></i>

							&nbsp;Debe ingresar el año</div>
							<div id="mensaje4_1" class="error"><i class="fas fa-times"></i>

							&nbsp;El año debe ser menor o igual al actual</div>
						</div>
					</div>

				</div>

				<div class="row">

					<!-- *********** TIPO DE VEHICULO ******************* -->
					
					<div class="col-md-6 col-sm-12">

						<div class="form-group">
							<label for="tipo_vehiculo">Seleccione el tipo de vehiculo: </label>
							<select class="form-control" id="tipo_vehiculo" name="tipo_vehiculo">
								<option value="">Elija el tipo de vehiculo</option>
								<?php 
								foreach ($tipos as $t) {
									echo "<option value='$t[id_tipo_vehiculo]'>$t[tipo_vehiculo]</option>";
								}
								?>
							</select>
							<div id="mensaje5" class="error"><i class="fas fa-times"></i>

							&nbsp;Debe ingresar un tipo de vehiculo</div>
						</div>


					</div>

					<!-- *********** CANTIDAD DE ASIENTOS ******************* -->

					<div class="col-md-6 col-sm-12">

						<div class="form-group">
							<label for="asientos">Ingrese la cantidad de asientos: </label>
							<input type="number" class="form-control" id="asientos" name="asientos" placeholder="Cantidad">
							<div id="mensaje6" class="error"><i class="fas fa-times"></i>

							&nbsp;Debe ingresar la cantidad de asientos</div>
						</div>

					</div>

				</div>

				<!-- ******** BOTONES **************** -->

				<div class="form-row">
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<a class="btn btn-danger btn-block" href="mis_vehiculos.php" role="button">Cancelar</a>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<button type="submit" class="btn btn-info btn-block" id="boton_agregar">Agregar</button>
					</div>			
				</div>

			</div>

		</div>
	</form>
	<?php include("footer.php");?>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/agregar_vehiculo/validaciones_vehiculo.js"></script>
</body>
</html>
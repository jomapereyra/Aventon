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
	require_once("modelo/tipo_vehiculo.php");
	require_once("modelo/vehiculo.php");
	$tabla_tipo=new TipoVehiculo();
	$tipos=$tabla_tipo->get_tipos();
	$id_vehiculo=$_GET["id"];
	$tabla_vehiculo=new Vehiculo();
	$datos=$tabla_vehiculo->get_datos($id_vehiculo);
	$patente=$datos["patente"];
	$marca=$datos["marca"];
	$modelo=$datos["modelo"];
	$año=$datos["anio"];
	$tipo=$datos["id_tipo_vehiculo"];
	$cant=$datos["cant_asientos"];
	?>
	<form>

		<div class="container my-container">

			<div class="semitransparente rounded">

				<h2 class="text-center">Modificar Vehiculo</h2>

				<!-- ******** PATENTE ******************* -->
				
				<div class="form-group">
					<label for="patente">Cambiar la patente del vehiculo: </label>
					<input type="text" class="form-control" id="patente" name="patente" placeholder="Patente" value=<?php echo $patente ?>>
					<div id="mensaje1" class="error"><i class="fas fa-times"></i>

					&nbsp;Debe ingresar la patente</div>
					<div id="mensaje1_1" class="error"><i class="fas fa-times"></i>
					&nbsp;No se admiten caracteres especiales, minúsculas ni espacios</div>
					<div id="mensaje1_2" class="error"><i class="fas fa-times"></i>
					&nbsp;Patente ya registrada</div>
					<div id="mensaje1_3" class="error"><i class="fas fa-times"></i>
					&nbsp;La patente debe contener entre 6 y 7 caracteres</div>
					<small id="ayudaNombre" class="text-muted">
						Ej:"MJD811" o "AC062WR"
					</small>
				</div>

				<div class="row">

					<!-- *********** MARCA ******************* -->
					
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="marca">Cambiar la marca del vehiculo: </label>
							<input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" value=<?php echo $marca ?>>
							<div id="mensaje2" class="error"><i class="fas fa-times"></i>

							&nbsp;Debe ingresar la marca</div>
						</div>
					</div>

					<!-- *********** MODELO ******************* -->

					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="modelo">Cambiar el modelo del vehiculo: </label>
							<input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo" value=<?php echo $modelo ?>>
							<div id="mensaje3" class="error"><i class="fas fa-times"></i>

							&nbsp;Debe ingresar el modelo</div>
						</div>
					</div>

					<!-- *********** AÑO ******************* -->

					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="año">Cambiar el año del vehiculo: </label>
							<input type="number" min="1950" class="form-control" id="año" name="año" placeholder="Año" value=<?php echo "$año" ?>>
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
							<label for="tipo_vehiculo">Cambiar el tipo de vehiculo: </label>
							<select class="form-control" id="tipo_vehiculo" name="tipo_vehiculo">
								<option value="">Elija el tipo de vehiculo</option>
								<?php
								foreach ($tipos as $t) {
									$id_tipo=(int)$t['id_tipo_vehiculo'];
									if ($tipo==$id_tipo) {
										echo '<option value="'.$t['id_tipo_vehiculo'].'" selected>'.$t['tipo_vehiculo'].'</option>';
									}
									else{
										echo '<option value="'.$t['id_tipo_vehiculo'].'">'.$t['tipo_vehiculo'].'</option>';
									}
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
							<label for="asientos">Cambiar la cantidad de asientos: </label>
							<input type="number" class="form-control" id="asientos" name="asientos" placeholder="Cantidad" value="<?php echo $cant ?>">
							<div id="mensaje6" class="error"><i class="fas fa-times"></i>

							&nbsp;Debe ingresar la cantidad de asientos</div>
							<div id="mensaje6_1" class="error"><i class="fas fa-times"></i>

							&nbsp;Tiene que tener al menos 1 asiento</div>
						</div>

						<input type="hidden" class="form-control" id="id_vehiculo" name="id_vehiculo" value=<?php echo $id_vehiculo ?>>

					</div>

				</div>

				<!-- ******** BOTONES **************** -->

				<div class="form-row">
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<a class="btn btn-danger btn-block" href="mis_vehiculos.php" role="button">Cancelar</a>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<button type="button" class="btn btn-info btn-block" id="boton_modificar">Modificar</button>
					</div>			
				</div>

			</div>

		</div>
	</form>
	<!--<?php include("footer.php");?>-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/vehiculo/validaciones_modificar.js"></script>
</body>
</html>
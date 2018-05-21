<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<title></title>
</head>
<body>
	<?php
	require_once("modelo/provincia.php");
	$tabla_provincia=new Provincia();
	$provincias=$tabla_provincia->get_provincias();
	include("header.php");
	?>

	<form name="origen" action="">

		<!-- ******************************* ETAPA 1 *******************************</!-->

		<div class="container" id="etapa1">
			<div class="row">
				<div class="col-md-4">
					<h1>Punto de Partida</h1>
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque beatae magni iusto, tempora eveniet distinctio eius sequi, consequuntur earum voluptatem recusandae molestiae doloremque fugit mollitia quisquam assumenda incidunt, debitis.</p>
				</div>
				<div class="col-md-8">

					<!-- ******* PROVINCIA ORIGEN ************** -->
					<div class="form-group">
						<label for="provincia_origen">Seleccione la provincia: </label>
						<select class="form-control" id="provincia_origen" onchange="cambiarCiudadesOrigen()">
							<option value="">Elija la provincia</option>
							<?php 
							foreach ($provincias as $pr) {
								echo "<option value='$pr[id_provincia]'>$pr[nombre_provincia]</option>";
							}
							?>
						</select>
					</div>

					<!-- ******* CIUDAD ORIGEN **************** -->
					<div class="form-group">
						<label for="ciudad_origen">Seleccione la ciudad: </label>
						<select class="form-control" id="ciudad_origen" disabled>
							<option value="">Elija la ciudad</option>
						</select>
					</div>

					<div class="form-row">

						<!-- ******** CALLE ORIGEN **************** -->
						<div class="form-group col-md-6 col-sm-12">
							<label for="calle_origen">Ingrese la calle: </label>
							<input type="text" class="form-control" id="calle_origen" placeholder="Calle">
							<small id="ayudaCalleOrigen" class="text-muted">
								El nombre de la calle no debe contener caracteres especiales.
							</small>
						</div>

						<!-- ******** NUMERO ORIGEN **************** -->
						<div class="form-group col-md-6 col-sm-12">
							<label for="numero_origen">Ingrese la altura: </label>
							<input type="text" class="form-control" 
							id="numero_origen" placeholder="Nro calle">
						</div>

					</div>

					<!-- ******** BOTONES ETAPA 1 **************** -->

					<div class="form-row">
						<div class="form-group col-md-6 col-sm-6 col-xs-12">
							<button type="cancel" class="btn btn-danger btn-block">Cancelar</button>
						</div>

						<div class="form-group col-md-6 col-sm-6 col-xs-12">
							<button type="button" id="boton_etapa1" class="btn btn-info btn-block">Siguiente</button>
						</div>			
					</div>

				</div>		
			</div>	
		</div>

		<!-- ******************************* ETAPA 2 *******************************</!-->

		<div class="container" id="etapa2">
			<div class="row">
				<div class="col-md-4">
					<h1>Punto de Llegada</h1>
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque beatae magni iusto, tempora eveniet distinctio eius sequi, consequuntur earum voluptatem recusandae molestiae doloremque fugit mollitia quisquam assumenda incidunt, debitis.</p>
				</div>
				<div class="col-md-8">

					<!-- ******* PROVINCIA DESTINO ************** -->
					<div class="form-group">
						<label for="provincia_destino">Seleccione la provincia: </label>
						<select class="form-control" id="provincia_destino" onchange="cambiarCiudadesDestino()">
							<option value="">Elija la provincia</option>
							<?php 
							foreach ($provincias as $pr) {
								echo "<option value='$pr[id_provincia]'>$pr[nombre_provincia]</option>";
							}
							?>
						</select>
					</div>

					<!-- ******* CIUDAD DESTINO **************** -->
					<div class="form-group">
						<label for="ciudad_destino">Seleccione la ciudad: </label>
						<select class="form-control" id="ciudad_destino" disabled>
							<option value="">Elija la ciudad</option>
						</select>
					</div>

					<div class="form-row">

						<!-- ******** CALLE DESTINO **************** -->
						<div class="form-group col-md-6 col-sm-12">
							<label for="calle_destino">Ingrese la calle: </label>
							<input type="text" class="form-control" id="calle_destino" placeholder="Calle">
							<small id="ayudaCalleDestino" class="text-muted">
								El nombre de la calle no debe contener caracteres especiales.
							</small>
						</div>

						<!-- ******** NUMERO DESTINO **************** -->
						<div class="form-group col-md-6 col-sm-12">
							<label for="numero_destino">Ingrese la altura: </label>
							<input type="text" class="form-control" id="numero_destino" placeholder="Nro calle">
						</div>

					</div>

					<!-- ******** BOTONES ETAPA 2 **************** -->

					<div class="form-row">
						<div class="form-group col-md-6 col-sm-6 col-xs-12">
							<button type="button" id="volver_etapa1" class="btn btn-block btn-warning">Atras</button>
						</div>

						<div class="form-group col-md-6 col-sm-6 col-xs-12">
							<button type="button" id="boton_etapa2" class="btn btn-info btn-block ">Siguiente</button>
						</div>			
					</div>

				</div>		
			</div>	
		</div>

		<!-- ******************************* ETAPA 3 *******************************</!-->

		<div class="container" id="etapa3">
			<div class="row">
				<div class="col-md-4">
					<h1>Fechas de partida y llegada</h1>
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque beatae magni iusto, tempora eveniet distinctio eius sequi, consequuntur earum voluptatem recusandae molestiae doloremque fugit mollitia quisquam assumenda incidunt, debitis.</p>
				</div>
				<div class="col-md-8">

					<div class="form-row">
						<!-- ******** FECHA PARTIDA **************** -->

						<div class="form-group col-md-12 col-sm-12">
							<label for="fecha_partida">Ingrese la fecha de partida: </label>
							<div class="input-group date" id="datetimepicker7" data-target-input="nearest">
								<input type="text" id="datetimepicker7" class="form-control datetimepicker-input" data-target="#datetimepicker7" data-toggle="datetimepicker"/>
								<div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
							<small id="ayudaFecha1" class="text-muted">
								La fecha de partida debe ser superior o igual a la actual con un horario de como minimo 2 horas de diferencia 
							</small>
						</div>


						<!-- ******** FECHA LLEGADA **************** -->
						<div class="form-group col-md-12 col-sm-12">
							<label for="fecha_llegada">Ingrese la fecha de llegada: </label>
							<div class="input-group date" id="datetimepicker8" data-target-input="nearest">
								<input type="text" id="datetimepicker8" class="form-control datetimepicker-input" data-target="#datetimepicker8" data-toggle="datetimepicker"/>
								<div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
							<small id="ayudaFecha2" class="text-muted">
								La fecha de llegada debe ser superior o igual a la fecha de partida y el horario de llegada debe ser superior al de partida
							</small>
						</div>

					</div>

					<!-- ******** BOTONES ETAPA 3 **************** -->

					<div class="form-row">
						<div class="form-group col-md-6 col-sm-6 col-xs-12">
							<button type="button" id="volver_etapa2" class="btn btn-block btn-warning">Atras</button>
						</div>

						<div class="form-group col-md-6 col-sm-6 col-xs-12">
							<button type="button" id="boton_etapa3" class="btn btn-info btn-block ">Siguiente</button>
						</div>			
					</div>
				</div>

			</div>	
		</div>

		<!-- ******************************* ETAPA 4 *******************************</!-->

		<div class="container" id="etapa4">
			<div class="row">
				<div class="col-md-4">
					<h1>Descripcion del viaje</h1>
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque beatae magni iusto, tempora eveniet distinctio eius sequi, consequuntur earum voluptatem recusandae molestiae doloremque fugit mollitia quisquam assumenda incidunt, debitis.</p>
				</div>
				<div class="col-md-8">

					<div class="form-row">

						<!-- ******** DESCRIPCION **************** -->

						<div class="form-group col-md-12 col-sm-12">
							<label for="descripcion">Escriba un texto breve sobre los detalles del viaje: </label>
							<textarea class="form-control" id="descripcion" rows="10"></textarea>
							<small id="ayudaDescripcion" class="text-muted">
								En la descripcion puede agregar restricciones o condiciones del viaje.<br>
								Tenga en cuenta que no debe superar los x caracteres
							</small>
						</div>

					</div>

					<!-- ******** BOTONES ETAPA 4 **************** -->

					<div class="form-row">
						<div class="form-group col-md-6 col-sm-6 col-xs-12">
							<button type="button" id="volver_etapa3" class="btn btn-block btn-warning">Atras</button>
						</div>

						<div class="form-group col-md-6 col-sm-6 col-xs-12">
							<button type="submit" class="btn btn-info btn-block ">Crear Viaje</button>
						</div>			
					</div>
				</div>
			</div>
		</div>

	</form>
	<?php include("footer.php"); ?>
	<script type="text/javascript">
		function cambiarCiudadesOrigen(){
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.open("GET","modelo/ajaxData1.php?provincia_origen="+document.getElementById("provincia_origen").value,false);
			xmlhttp.send(null);
			document.getElementById("ciudad_origen").innerHTML=xmlhttp.responseText;	
		}
		function cambiarCiudadesDestino(){
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.open("GET","modelo/ajaxData2.php?provincia_destino="+document.getElementById("provincia_destino").value,false);
			xmlhttp.send(null);
			document.getElementById("ciudad_destino").innerHTML=xmlhttp.responseText;	
		}
	</script>
	<script src="js/jquery.min.js"></script>
	<script src="js/crear_viaje/ocultar-mostrar.js"></script>
	<script src="js/moment.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/crear_viaje/select_ciudad.js"></script>
	<script src="js/tempusdominus-bootstrap-4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(function () {
			$('#datetimepicker8').datetimepicker({
				useCurrent: false
			});
			$("#datetimepicker7").on("change.datetimepicker", function (e) {
				$('#datetimepicker8').datetimepicker('minDate', e.date);
			});
			$("#datetimepicker8").on("change.datetimepicker", function (e) {
				$('#datetimepicker7').datetimepicker('maxDate', e.date);
			});
		});
	</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<title></title>
</head>
<body class="fondo-usuario">

	<?php
	include("header.php");
	require_once("modelo/vehiculo.php");
	require_once("modelo/provincia.php");
	$tabla_vehiculo=new Vehiculo();
	if(!$tabla_vehiculo->tiene_vehiculo(1)){

		echo "
		<div class='container my-container'>
		<div class='semitransparente rounded'>
		<div class='container my-container'>
		<div class='bad-notice rounded'>
		<div class='row'>
		<div class='col-md-2 col-sm-12 text-center'>
		<i class='fas fa-walking icon-bad'></i>
		</div>
		<div class='col-md-10 col-sm-12 text-center'>
		<h2 class='font-bad'>No puede crear un viaje si no posee ningún vehículo.<br>Por favor,diríjase a 'Mis Vehiculos' para agregarlo.</h2> 
		</div>

		</div>
		</div>
		</div>
		</div>
		</div>
		";

	}
	else{

		$tabla_provincia=new Provincia();
		$provincias=$tabla_provincia->get_provincias();
		$vehiculos=$tabla_vehiculo->mis_vehiculos(1);
		?>

		<form class="" name="origen" action="modelo/guardar_viaje.php" method="post">

			<!-- ******************************* ETAPA 1 *******************************</!-->

			<div class="container my-container" id="etapa1">
				<div class="row semitransparente rounded">
					<div class="col-md-4">
						<h1>Punto de Partida</h1>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque beatae magni iusto, tempora eveniet distinctio eius sequi, consequuntur earum voluptatem recusandae molestiae doloremque fugit mollitia quisquam assumenda incidunt, debitis.</p>
					</div>
					<div class="col-md-8">

						<!-- ******* PROVINCIA ORIGEN ************** -->
						<div class="form-group">
							<label for="provincia_origen">Seleccione la provincia: </label>
							<select class="form-control" id="provincia_origen" name="provincia_origen" onchange="cambiarCiudadesOrigen()">
								<option value="">Elija la provincia</option>
								<?php 
								foreach ($provincias as $pr) {
									echo "<option value='$pr[id_provincia]'>$pr[nombre_provincia]</option>";
								}
								?>
							</select>
							<div id="mensaje1" class="error"><i class="fas fa-times"></i>

							&nbsp;Debe ingresar una provincia</div>
						</div>

						<!-- ******* CIUDAD ORIGEN **************** -->
						<div class="form-group">
							<label for="ciudad_origen">Seleccione la ciudad: </label>
							<select class="form-control" id="ciudad_origen" name="ciudad_origen" disabled>
								<option value="">Elija la ciudad</option>
							</select>
						</div>

						<div class="form-row">

							<!-- ******** CALLE ORIGEN **************** -->
							<div class="form-group col-md-6 col-sm-12">
								<label for="calle_origen">Ingrese la calle: </label>
								<input type="text" class="form-control" id="calle_origen"
								name="calle_origen" value="" placeholder="Calle">
								<div id="mensaje2" class="error"><i class="fas fa-times"></i>
								&nbsp;Debe ingresar una calle</div>
								<div id="mensaje2_1" class="error"><i class="fas fa-times"></i>
								&nbsp;No se admiten caracteres especiales</div>
								<small id="ayudaCalleOrigen" class="text-muted">
									La calle no debe contener caracteres especiales.
								</small>
							</div>

							<!-- ******** NUMERO ORIGEN **************** -->
							<div class="form-group col-md-6 col-sm-12">
								<label for="numero_origen">Ingrese la altura: </label>
								<input type="text" class="form-control" 
								id="numero_origen"
								name="numero_origen" placeholder="Nro calle">
								<div id="mensaje3" class="error"><i class="fas fa-times"></i>
								&nbsp;Debe ingresar un numero</div>
							</div>

						</div>

						<!-- ******** BOTONES ETAPA 1 **************** -->

						<div class="form-row">
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<a class="btn btn-danger btn-block" href="pagina_principal.php" role="button">Cancelar</a>
							</div>

							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<button type="button" id="boton_etapa1" class="btn btn-info btn-block">Siguiente</button>
							</div>			
						</div>

					</div>		
				</div>	
			</div>

			<!-- ******************************* ETAPA 2 *******************************</!-->

			<div class="container my-container" id="etapa2">
				<div class="row semitransparente rounded">
					<div class="col-md-4">
						<h1>Punto de Llegada</h1>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque beatae magni iusto, tempora eveniet distinctio eius sequi, consequuntur earum voluptatem recusandae molestiae doloremque fugit mollitia quisquam assumenda incidunt, debitis.</p>
					</div>
					<div class="col-md-8">

						<!-- ******* PROVINCIA DESTINO ************** -->
						<div class="form-group">
							<label for="provincia_destino">Seleccione la provincia: </label>
							<select class="form-control" id="provincia_destino" name="provincia_destino" onchange="cambiarCiudadesDestino()">
								<option value="">Elija la provincia</option>
								<?php 
								foreach ($provincias as $pr) {
									echo "<option value='$pr[id_provincia]'>$pr[nombre_provincia]</option>";
								}
								?>
							</select>
							<div id="mensaje4" class="error"><i class="fas fa-times"></i>

							&nbsp;Debe ingresar una provincia</div>
						</div>

						<!-- ******* CIUDAD DESTINO **************** -->
						<div class="form-group">
							<label for="ciudad_destino">Seleccione la ciudad: </label>
							<select class="form-control" id="ciudad_destino" name="ciudad_destino" disabled>
								<option value="">Elija la ciudad</option>
							</select>
						</div>

						<div class="form-row">

							<!-- ******** CALLE DESTINO **************** -->
							<div class="form-group col-md-6 col-sm-12">
								<label for="calle_destino">Ingrese la calle: </label>
								<input type="text" class="form-control" id="calle_destino" name="calle_destino" placeholder="Calle">
								<div id="mensaje5" class="error"><i class="fas fa-times"></i>
								&nbsp;Debe ingresar una calle</div>
								<div id="mensaje5_1" class="error"><i class="fas fa-times"></i>
								&nbsp;No se admiten caracteres especiales</div>
								<small id="ayudaCalleDestino" class="text-muted">
									El nombre de la calle no debe contener caracteres especiales.
								</small>
							</div>

							<!-- ******** NUMERO DESTINO **************** -->
							<div class="form-group col-md-6 col-sm-12">
								<label for="numero_destino">Ingrese la altura: </label>
								<input type="text" class="form-control" id="numero_destino" name="numero_destino" placeholder="Nro calle">
								<div id="mensaje6" class="error"><i class="fas fa-times"></i>
								&nbsp;Debe ingresar un numero</div>
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

			<div class="container my-container" id="etapa3">
				<div class="row semitransparente rounded">
					<div class="col-md-4">
						<h1>Fechas de partida y llegada</h1>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque beatae magni iusto, tempora eveniet distinctio eius sequi, consequuntur earum voluptatem recusandae molestiae doloremque fugit mollitia quisquam assumenda incidunt, debitis.</p>
					</div>
					<div class="col-md-8">

						<!-- ******** FECHA PARTIDA **************** -->
						<div class="form-row">

							<div class="form-group col-md-6 col-sm-6">
								<label for="fecha_partida">Ingrese la fecha de partida: </label>
								<div class="input-group date">
									<input id="fecha_partida" name="fecha_partida" type="date" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
								<div id="mensaje7" class="error"><i class="fas fa-times"></i>
								&nbsp;Debe ingresar una fecha de partida</div>
								<div id="mensaje7_1" class="error"><i class="fas fa-times"></i>
								&nbsp;Debe ingresar una fecha igual o superior a la actual</div>
								<small id="ayudaFecha1" class="text-muted">
									La fecha de partida debe ser superior o igual a la actual 
								</small>
							</div>

							<!-- ******** HORA PARTIDA **************** -->

							<div class="form-group col-md-6 col-sm-6">

								<label for="hora_partida">Ingrese una hora de partida: </label>
								<div class="input-group date">
									<input id="hora_partida" name="hora_partida" type="time" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text"><i class="far fa-clock"></i></div>
									</div>
								</div>
								<div id="mensaje8" class="error"><i class="fas fa-times"></i>
								&nbsp;Debe ingresar una hora de partida</div>
								<div id="mensaje8_1" class="error"><i class="fas fa-times"></i>
								&nbsp;Respete una diferencia de 2 horas a la actual para poder continuar</div>
								<small id="ayudaHora1" class="text-muted">
									La hora de partida debe tener una diferencia minima de 2 horas a la actual 
								</small>
							</div>

						</div>

						<!-- ******** FECHA LLEGADA **************** -->

						<div class="form-row">

							<div class="form-group col-md-6 col-sm-6">
								<label for="fecha_llegada">Ingrese la fecha de llegada: </label>
								<div class="input-group date">
									<input id="fecha_llegada" name="fecha_llegada" type="date" class="form-control"/>
									<div class="input-group-append">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
								<div id="mensaje9" class="error"><i class="fas fa-times"></i>
								&nbsp;Debe ingresa una fecha de llegada</div>
								<div id="mensaje9_1" class="error"><i class="fas fa-times"></i>
								&nbsp;La fecha de llegada debe ser igual o superior a la fecha actual</div>
								<small id="ayudaFecha2" class="text-muted">
									La fecha de llegada debe ser superior o igual a la fecha de partida
								</small>
							</div>

							<!-- ******** HORA LLEGADA **************** -->

							<div class="form-group col-md-6 col-sm-6">

								<label for="hora_llegada">Ingrese una hora de llegada: </label>
								<div class="input-group date">
									<input id="hora_llegada" name="hora_llegada" type="time" class="form-control">
									<div class="input-group-append">
										<div class="input-group-text"><i class="far fa-clock"></i></div>
									</div>
								</div>
								<div id="mensaje10" class="error"><i class="fas fa-times"></i>
								&nbsp;Debe ingresar una hora de llegada</div>
								<div id="mensaje10_1" class="error"><i class="fas fa-times"></i>
								&nbsp;Si el viaje transcurre en un dia, el horario de llegada debe ser superior al horario de partida</div>
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

			<!-- ******************************* ETAPA EXTRA *******************************</!-->

			<div class="container my-container" id="etapaExtra">
				<div class="row semitransparente rounded">
					<div class="col-md-4">
						<h1>Vehiculo del viaje:</h1>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque beatae magni iusto, tempora eveniet distinctio eius sequi, consequuntur earum voluptatem recusandae molestiae doloremque fugit mollitia quisquam assumenda incidunt, debitis.</p>
					</div>
					<div class="col-md-8">

						<div class="form-row">

							<!-- ****************** VEHICULO ************************** -->

							<div class="form-group col-md-12">
								<label for="vehiculo">Seleccione un vehiculo: </label>
								<select class="form-control" id="vehiculo" name="vehiculo">
									<option value="">Elija un vehiculo</option>
									<?php 
									foreach ($vehiculos as $v) {
										echo "<option value='$v[id_vehiculo]'>$v[marca] $v[modelo] $v[patente]</option>";
									}
									?>
								</select>
								<div id="mensaje13" class="error"><i class="fas fa-times"></i>

								&nbsp;Debe ingresar un vehiculo</div>
							</div>

						</div>


						<!-- ******** BOTONES ETAPA EXTRA **************** -->

						<div class="form-row">
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<button type="button" id="volver_etapa3" class="btn btn-block btn-warning">Atras</button>
							</div>

							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<button id="boton_etapaExtra" type="button" class="btn btn-info btn-block">Siguiente</button>
							</div>			
						</div>

					</div>
				</div>
			</div>	

			<!-- ******************************* ETAPA 4 *******************************</!-->

			<div class="container my-container" id="etapa4">
				<div class="row semitransparente rounded">
					<div class="col-md-4">
						<h1>Descripcion del viaje y Costos</h1>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque beatae magni iusto, tempora eveniet distinctio eius sequi, consequuntur earum voluptatem recusandae molestiae doloremque fugit mollitia quisquam assumenda incidunt, debitis.</p>
					</div>
					<div class="col-md-8">

						<div class="form-row">

							<!-- ****************** COSTO ************************** -->

							<div class="form-group col-md-12 col-sm-12">
								<label for="costo">Ingrese un monto: </label>
								<input type="number" step="any" class="form-control" name="costo" id="costo" placeholder="Costo"></input>
								<div id="mensaje12" class="error"><i class="fas fa-times"></i>
								&nbsp;Debe ingresar un monto</div>
								<small id="ayudaDescripcion" class="text-muted">
									Al monto ingresado se le agrega un 15% que son las ganancias de la plataforma .
								</small>
							</div>

						</div>


						<div class="form-row">

							<!-- ******** DESCRIPCION **************** -->

							<div class="form-group col-md-12 col-sm-12">
								<label for="descripcion">Escriba un texto breve sobre los detalles del viaje: </label>
								<textarea class="form-control" id="descripcion"
								name="descripcion" rows="10"></textarea>
								<div id="mensaje11" class="error"><i class="fas fa-times"></i>
								&nbsp;Debe ingresar una descripcion del viaje para finalizar</div>
								<small id="ayudaDescripcion" class="text-muted">
									En la descripcion puede agregar restricciones o condiciones del viaje.<br>
									Tenga en cuenta que no debe superar los x caracteres
								</small>
							</div>

						</div>

						<!-- ******** BOTONES ETAPA 4 **************** -->

						<div class="form-row">
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<button type="button" id="volver_etapaExtra" class="btn btn-block btn-warning">Atras</button>
							</div>

							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<button id="boton_etapa4" type="button" class="btn btn-info btn-block">Siguiente</button>
							</div>			
						</div>
					</div>
				</div>
			</div>

			<!-- ******************************* ETAPA 5 (FINAL) *******************************</!-->

			<div class="container my-container" id="etapa5">
				<div class="row semitransparente rounded">
					<div class="col-md-4">
						<h1>Confirmación</h1>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis atque beatae magni iusto, tempora eveniet distinctio eius sequi, consequuntur earum voluptatem recusandae molestiae doloremque fugit mollitia quisquam assumenda incidunt, debitis.</p>
					</div>
					<div class="col-md-8">

						<!-- ************** TODOS MIS DATOS INGRESADOS ************ -->
						<h2>Características del viaje:</h2>
						<div class="form-row">
							<ul class="" id="lista_confirmacion">
							</ul>
						</div>


						<!-- ******** BOTONES ETAPA 5 **************** -->

						<div class="form-row">
							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<button type="button" id="volver_etapa4" class="btn btn-block btn-warning">Atras</button>
							</div>

							<div class="form-group col-md-6 col-sm-6 col-xs-12">
								<button id="boton_etapa4" type="submit" class="btn btn-info btn-block">Crear Viaje</button>
							</div>			
						</div>
					</div>
				</div>
			</div>

		</form>
	<?php }
	include("footer.php");
	?>
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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/crear_viaje/select_ciudad.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>



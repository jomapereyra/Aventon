<?php 
require_once("modelo/provincia.php");
$tabla_provincia=new Provincia();
$provincias=$tabla_provincia->get_provincias();
?>

<nav class="navbar navbar-busqueda">
	<form class="row col-md-12 sin-margen" method="get" action="busqueda.php">

		<div class="row  col-md-12 color-busqueda">

			<div class="col-md-6">
				<div class="form-group">
					<label for="provincia_origen">Provincia salida:&nbsp;&nbsp;</label>
					<select class="form-control item-busqueda" id="provincia_origen" name="provincia_origen">
						<option value="0">Elija la provincia</option>
						<?php
						foreach ($provincias as $pr) {
							echo "<option value='$pr[id_provincia]'>$pr[nombre_provincia]</option>";
						}
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="ciudad_origen">Ciudad salida:&nbsp;&nbsp;</label>
					<select class="form-control item-busqueda" id="ciudad_origen" name="ciudad_origen" disabled>
						<option value="0">Elija la ciudad</option>
					</select>
				</div>
			</div>

			<div class="col-md-6">

				<div class="form-group">
					<label for="provincia_destino">Provincia destino:&nbsp;&nbsp;</label>
					<select class="form-control item-busqueda" id="provincia_destino" name="provincia_destino">
						<option value="0">Elija la provincia</option>
						<?php
						foreach ($provincias as $pr) {
							echo "<option value='$pr[id_provincia]'>$pr[nombre_provincia]</option>";
						}
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="ciudad_destino">Ciudad destino:&nbsp;&nbsp;</label>
					<select class="form-control item-busqueda" id="ciudad_destino" name="ciudad_destino" disabled>
						<option value="0">Elija la ciudad</option>
					</select>
				</div>
				
			</div>

			<div class="col-md-2 col-sm-3">
				<button class="btn btn-block btn-success margin-bottom-10 margin-top-10" type="submit"><i class="fas fa-search font-buscar"></i></button>

			</div>

		</div>
		
	</form>
</nav>





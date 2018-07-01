<?php 
require_once("modelo/provincia.php");
$tabla_provincia=new Provincia();
$provincias=$tabla_provincia->get_provincias();
?>
<nav class="navbar navbar-dark bg-dark">
	<form class="form-inline" method="post" action="busqueda.php">

		<div class="form-group color-busqueda">
			<label for="provincia_origen">Provincia salida:&nbsp;&nbsp;</label>
			<select class="form-control item-busqueda" id="provincia_origen" name="provincia_origen">
				<option value="0">Elija la provincia</option>
				<?php
				foreach ($provincias as $pr) {
					echo "<option value='$pr[id_provincia]'>$pr[nombre_provincia]</option>";
				}
				?>
			</select>
			<label for="ciudad_origen">Ciudad salida:&nbsp;&nbsp;</label>
			<select class="form-control item-busqueda" id="ciudad_origen" name="ciudad_origen" disabled>
				<option value="0">Elija la ciudad</option>
			</select>

			<label for="provincia_destino">Provincia destino:&nbsp;&nbsp;</label>
			<select class="form-control item-busqueda" id="provincia_destino" name="provincia_destino">
				<option value="0">Elija la provincia</option>
				<?php
				foreach ($provincias as $pr) {
					echo "<option value='$pr[id_provincia]'>$pr[nombre_provincia]</option>";
				}
				?>
			</select>
			<label for="ciudad_destino">Ciudad salida:&nbsp;&nbsp;</label>
			<select class="form-control item-busqueda" id="ciudad_destino" name="ciudad_destino" disabled>
				<option value="0">Elija la ciudad</option>
			</select>

			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
		</div>
	</form>
</nav>

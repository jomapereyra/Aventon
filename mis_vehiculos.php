<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mis Vehiculos</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body class="fondo-usuario">
	<?php include("header.php"); ?>
	<div class="container my-container">
		<div class="semitransparente rounded">

			<div class="container">
				<h1 class="text-center">Mis Vehiculos</h1>
			</div>

			<?php

			require_once("/modelo/vehiculo.php");
			$vehiculo=new Vehiculo();

			/* SI NO TENGO VEHICULO ME APARECE UN MENSAJE Y LA OPCION PARA AGREGAR */

			if(!$vehiculo->tiene_vehiculo(1)){
				echo "
				<div class='container my-container'>
				<div class='bad-notice rounded'>
				<div class='row'>
				<div class='col-md-2 col-sm-12 text-center'>
				<i class='far fa-frown icon-bad'></i>
				</div>
				<div class='col-md-10 col-sm-12 text-center'>
				<h2 class='font-bad'>Usted no cuenta con ningun medio de transporte</h2> 
				</div>

				</div>
				</div>
				</div>
				";
			}

			/* SI TENGO VEHICULOS ME APARECEN OPCIONES DE ELIMINAR Y MODIFICAR */ 
			
			else{
				$vehiculos=$vehiculo->mis_vehiculos(1);
				?>
				<div class="container my-container">
					<div class="table-responsive">
						<table class="table">

							<thead class="thead-dark">
								<tr>
									<th scope="col">Patente</th>
									<th scope="col">Marca</th>
									<th scope="col">Modelo</th>
									<th scope="col">Año</th>
									<th scope="col">Tipo</th>
									<th scope="col">Asientos</th>
									<th scope="col">Opciones</th>
									<th scope="col"></th>
								</tr>						
							</thead>

							<tbody>

								<?php
								foreach ($vehiculos as $v) {
									?>
									<tr>
										<td><?php echo $v["patente"]?></td>
										<td><?php echo $v["marca"]?></td>
										<td><?php echo $v["modelo"] ?></td>
										<td><?php echo $v["anio"] ?></td>
										<td><?php echo $v["tipo_vehiculo"] ?></td>
										<td><?php echo $v["cant_asientos"] ?></td>

										<td><a class="btn btn-info btn-block" href="modificar_vehiculo.php?id=<?php echo $v['id_vehiculo']?> & patente=<?php echo $v['patente']?> & marca=<?php echo $v['marca']?> & modelo=<?php echo $v['modelo']?> & año=<?php echo $v['anio']?> & tipo=<?php echo $v['id_tipo_vehiculo']?> & cant=<?php echo $v['cant_asientos']?>">Modificar</a></td>
										<td><a class="btn btn-danger btn-block" href="modelo/eliminar_vehiculo.php?id=<?php echo $v['id_vehiculo']?>">Eliminar</a></td>
									</tr>
									<?php
								}
								?>

							</tbody>

						</table>
					</div>
				</div>
				<?php
			}
			echo"<div class='container my-container'>
			<a class='btn btn-info btn-block' href='agregar_vehiculo.php'>Agregar Vehiculo</a>
			</div>";
			?>	
		</div>
	</div>
	<?php include("footer.php"); ?>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
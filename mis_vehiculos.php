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
			$tabla_vehiculo=new Vehiculo();
			$email=$_SESSION["usuario"];
			$tabla_usuario=new Usuario();
			$usuario=$tabla_usuario->get_id($email);

			/* SI NO TENGO VEHICULO ME APARECE UN MENSAJE Y LA OPCION PARA AGREGAR */

			if(!$tabla_vehiculo->tiene_vehiculo($usuario["id_usuario"])){
				include("advertencia_mis_vehiculos.php");
			}

			/* SI TENGO VEHICULOS ME APARECEN OPCIONES DE ELIMINAR Y MODIFICAR */ 
			
			else{
				$email=$_SESSION["usuario"];
				$tabla_usuario=new Usuario();
				$usuario=$tabla_usuario->get_id($email);
				$vehiculos=$tabla_vehiculo->mis_vehiculos($usuario["id_usuario"]);
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

										<td><a class="btn btn-info btn-block" href="modificar_vehiculo.php?id=<?php echo $v['id_vehiculo']?>">Modificar</a></td>

										<?php 
										if($tabla_vehiculo->existe_viaje($v["id_vehiculo"])){
											?>
											<td><button type="button" class="btn btn-secondary btn-block" data-toggle="tooltip" data-placement="left" title="Existe un viaje pendiente con el vehiculo">
												Eliminar
											</button>

										</td>
										<?php
									}
									else{
										?>
										<td><button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#<?php echo $v['id_vehiculo']?>">Eliminar</button></td>
										<?php 
									}
									?>

								</tr>

								<!-- CUADRO CONFIRMACION -->
								<div class="modal fade" id="<?php echo $v['id_vehiculo']?>" tabindex="-1" role="dialog" aria-labelledby="header_confirmacion" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="header_confirmacion">Advertencia!</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												¿Usted esta seguro que quiere eliminar este vehículo?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<a class="btn btn-primary" href="controlador/eliminar_vehiculo.php?id=<?php echo $v['id_vehiculo']?>">Confirmar</a>
											</div>
										</div>
									</div>
								</div>
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
<!--<?php include("footer.php");?>-->

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
</body>
</html>
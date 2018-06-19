<html>
<head>
	<title>Viajes Pendientes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body class="fondo-usuario">
	<?php
	require_once("modelo/usuario.php");
	require_once("modelo/viaje.php");
	require_once("modelo/postulacion.php");
	$tabla_postulacion=new Postulacion();
	$tabla_viaje=new Viaje();
	include("header.php");
	$email=$_SESSION["usuario"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_id($email);
	$existen_postulaciones_esperando=$tabla_postulacion->existe_esperando($usuario['id_usuario']);
	?>
	<div class="container my-container">
		<div class="semitransparente rounded">
			<h1 class="text-center">Viajes Pendientes</h1>

			<?php
			if(!$existen_postulaciones_esperando){
				include("advertencia_viajes_pendientes.php");
			}
			else{
				$postulacion=$tabla_postulacion->get_postulaciones_esperando($usuario['id_usuario']);
				?>

				<div class="container my-container col-md-8">

					<section>


						<!-- *********** VIAJES PENDIENTES *********************** -->

						<?php

						foreach ($postulacion as $p){

							$viaje=$tabla_viaje->get_datos($p['id_viaje']);

							?>
							<article class=" row border border-dark semitransparente-pendiente">

								<div class="container">
									<div class="row col-xs-8 ">

										<div class="col-xs-4 col-xl-6">
											<?php $v= $viaje['id_viaje'];?>
											<p> <u><b> Fecha Salida: </u></b> <?php echo $viaje['fecha_salida'];?></p>
											<p> <u><b>Provincia: </u></b><?php echo " " . $viaje['provincia_origen'] . " " ;?></p>
											<p> <u><b>Ciudad: </u></b> <?php echo " " . $viaje['ciudad_origen'] . " " ;?></p>
										</div>
										<div class="col-xs-4 col-xl-6">
											<p><u><b> Fecha Llegada:</u></b><?php echo  " " . $viaje['fecha_llegada'] . " ";?></p>
											<p> <u><b>Provincia: </u></b><?php echo " " . $viaje['provincia_destino'] . " " ;?></p>
											<p> <u><b> Ciudad:</u></b>  <?php echo " " . $viaje['ciudad_destino'] . " " ;?></p>

										</div>

										<?php
										include("advertencia_postulacion_esperando.php"); 
										?>

										<div class="col-md-12 text-right">

											<a href="mostrar_info_viaje.php?id=<?php echo $viaje['id_viaje']?>"class='btn btn-primary float-right'>+INFO</a>

											<button type="button" class="btn btn-danger float-right margin-right-20" data-toggle="modal" data-target="#<?php echo $viaje['id_viaje']?>">Cancelar</button>	

										</div>

										<!-- CUADRO CONFIRMACION -->
										<div class="modal fade" id="<?php echo $viaje['id_viaje']?>" tabindex="-1" role="dialog" aria-labelledby="header_confirmacion" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="header_confirmacion">Advertencia!</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														¿Usted esta seguro que quiere cancelar su postulacion a este viaje?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
														<a class="btn btn-primary" href="controlador/cancelar_viaje_pendiente.php?id_viaje=<?php echo $viaje['id_viaje']?>&id_usuario=<?php echo $usuario['id_usuario']?>">Confirmar</a>
													</div>
												</div>
											</div>
										</div>

									</div>

								</div>


							</article>

						</section>

					</div>

				</div>
			</div>
			<?php
		}
	} 
//include("footer.php"); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
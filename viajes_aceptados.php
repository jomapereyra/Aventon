<html>
<head>
	<title>Viajes Aceptados</title>
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
	require_once("modelo/paginacion.php");
	$tabla_postulacion=new Postulacion();
	$tabla_viaje=new Viaje();
	include("header.php");
	$email=$_SESSION["usuario"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_id($email);


	$existen_postulaciones_aceptado=$tabla_postulacion->existe_aceptado($usuario['id_usuario']);
	?>
	<div class="container my-container">
		<div class="semitransparente rounded">
			<h1 class="text-center">Viajes Aceptados</h1>

			<?php
			if(!$existen_postulaciones_aceptado){
				include("advertencia_viajes_aceptados.php");
			}
			else{
				if(isset($_GET["pagina"])){
					$pagina=$_GET["pagina"];
				}
				else
					$pagina=1;
				$paginacion=new Paginacion();
				$paginacion->paginacion_aceptado($pagina,$usuario['id_usuario']);
				$postulacion=$tabla_postulacion->get_postulaciones_aceptado($usuario['id_usuario'],$paginacion->get_inicio(),$paginacion->get_tamaño());
				?>

				<div class="container my-container col-md-12">

					<!-- *********** VIAJES ACEPTADOS *********************** -->

					<?php
					$num=0;

					foreach ($postulacion as $p){

						$viaje=$tabla_viaje->get_datos($p['id_viaje']);

						?>
						<article class=" row border border-dark semitransparente-aceptado">

							<div class="container">
								<div class="row">

									<div class="col-12 col-md-6">
										<?php $v= $viaje['id_viaje'];?>
										<p> <u><b> Fecha Salida: </u></b> <?php echo $viaje['fecha_salida'];?></p>
										<p> <u><b>Provincia: </u></b><?php echo " " . $viaje['provincia_origen'] . " " ;?></p>
										<p> <u><b>Ciudad: </u></b> <?php echo " " . $viaje['ciudad_origen'] . " " ;?></p>
									</div>

									<div class="col-12 col-md-6">
										<p><u><b> Fecha Llegada:</u></b><?php echo  " " . $viaje['fecha_llegada'] . " ";?></p>
										<p> <u><b>Provincia: </u></b><?php echo " " . $viaje['provincia_destino'] . " " ;?></p>
										<p> <u><b> Ciudad:</u></b>  <?php echo " " . $viaje['ciudad_destino'] . " " ;?></p>

									</div>

									<?php
									$conductor=$tabla_usuario->get_datos_id($viaje["id_usuario"]); 
									?>

									<div class="container margin-top-20">

										<div class="row">

											<div class="col-12 col-sm-12 col-md-12 col-lg-6">
											</div>

											<div class="col-12 col-sm-12 col-md-12 col-lg-6">

												<div class="row">

													<div class="col-md-4 padding-bottom-10">
														<button id="<?php echo $num?>" type="button" class="btn btn-success btn-block margin-right-20">Contacto</button>
													</div>

													<div class="col-md-4 padding-bottom-10">
														<a href="mostrar_info_viaje.php?id=<?php echo $viaje['id_viaje']?>"class='btn btn-primary btn-block margin-right-20'>+INFO</a>
													</div>

													<div class="col-md-4 padding-bottom-10">
														<button type="button" class="btn btn-danger btn-block margin-right-20" data-toggle="modal" data-target="#<?php echo $p['id_postulacion']?>">Cancelar</button>	
													</div>

												</div>

												<?php $num++; ?>

												<div id="<?php echo $num?>" class="contacto rounded text-center">
													<i class="fas fa-phone"></i>
													&nbsp;<?php echo $conductor['telefono'] ?>
												</div>

											</div>

										</div>

									</div>

									<!-- CUADRO CONFIRMACION -->
									<div class="modal fade" id="<?php echo $p['id_postulacion']?>" tabindex="-1" role="dialog" aria-labelledby="header_confirmacion" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="header_confirmacion">Advertencia!</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													¿Usted esta seguro que quiere salir de este viaje?
													

													<div class="alert alert-danger margin-top-20" role="alert">
														<strong>ATENCION!</strong>&nbsp;Esta accion trae como consecuencia una calificacion negativa 
													</div>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
													<a class="btn btn-primary" href="controlador/cancelar_viaje_pasajero.php?id=<?php echo $p['id_postulacion']?>">Confirmar</a>
												</div>
											</div>
										</div>
									</div>

								</div>

							</div>

						</article>

						<?php
					}

					echo "</div>";
					echo "</div>";
					$paginacion->mostrar($pagina);

				} 

				echo "</div>";

//include("footer.php"); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/aceptados/mostrar_contacto.js"></script>
</body>
</html>
<html>
<head>
	<title>Mis Viajes Creados</title>
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
	require("modelo/Carbon/autoload.php");
	use Carbon\Carbon;
	use Carbon\CarbonInterval;
	Carbon::setToStringFormat('Y-m-d');
	Carbon::setLocale('es');
	$tabla_postulacion=new Postulacion();
	$tabla_viaje=new Viaje();
	include("header.php");
	$email=$_SESSION["usuario"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_id($email);
	$fecha_actual=  Carbon::now();
	$tengo_creados=$tabla_viaje->existen_creados($usuario['id_usuario'],$fecha_actual);
	?>
	<div class="container my-container">
		<div class="semitransparente rounded">
			<h1 class="text-center">Mis Viajes Creados</h1>

			<?php
			if(!$tengo_creados){
				include("advertencia_viajes_creados.php");
			}
			else{
				if(isset($_GET["pagina"])){
					$pagina=$_GET["pagina"];
				}
				else
					$pagina=1;
				$paginacion=new Paginacion();
				$paginacion->paginacion_creados($pagina,$usuario['id_usuario']);
				$viaje=$tabla_viaje->get_viajes_creados($usuario['id_usuario'],$paginacion->get_inicio(),$paginacion->get_tamaño(),$fecha_actual);
				?>

				<div class="container my-container col-md-12">

					<!-- *********** VIAJES CREADOS *********************** -->

					<?php

					foreach ($viaje as $p){

						$viaje=$tabla_viaje->get_datos($p['id_viaje']);

						?>
						<article class=" row border border-dark semitransparente">

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

									<div class="container padding-top-16">
										<div class="row">

											<div class="col-12 col-sm-12 col-md-12 col-lg-6">
											</div>

											<div class="col-12 col-sm-12 col-md-12 col-lg-6">

												<div class="row">

													<div class="col-md-4 padding-bottom-10">

														<a href="ver_postulantes.php?id=<?php echo $viaje['id_viaje']?>"class='btn btn-success btn-block  margin-right-20'>Postulantes</a>

													</div>

													<div class="col-md-4 padding-bottom-10">

														<a href="mostrar_info_viaje.php?id=<?php echo $viaje['id_viaje']?>"class='btn btn-primary btn-block margin-right-20'>+INFO</a>

													</div>

													<div class="col-md-4 padding-bottom-10">

														<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#<?php echo $viaje['id_viaje']?>">Cancelar</button>

													</div>

												</div>
												
											</div>
											
										</div>

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
													¿Esta seguro que quiere cancelar este viaje?
													<?php
													$pasajeros=$tabla_postulacion->existe_pasajero($viaje['id_viaje']);
													if($pasajeros){
														echo "
														<div class='alert alert-danger margin-top-20' role='alert'>
														<strong>ATENCION!</strong>&nbsp;Esta accion trae como consecuencia una calificacion negativa 
														</div>";
													} 
													?>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
													<a class="btn btn-primary" href="controlador/cancelar_viaje_conductor.php?id_viaje=<?php echo $viaje['id_viaje']?>">Confirmar</a>
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
</body>
</html>
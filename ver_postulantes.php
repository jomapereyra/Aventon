<html>
<head>
	<title>Postulantes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body class="fondo-usuario">
	<?php
	include("header.php");
	require_once("modelo/postulacion.php");
	require_once("modelo/viaje.php");
	require_once("modelo/paginacion.php");
	$id_viaje=$_GET['id'];
	$tabla_postulacion=new Postulacion();
	$tengo_postulantes=$tabla_postulacion->existe_postulante($id_viaje);
	?>
	<div class="container my-container">
		<div class="semitransparente rounded">
			<a href="javascript:history.back(-1);" title="Ir la página anterior"><i class="fas fa-arrow-left volver"></i></a>
			<h1 class="text-center">Postulantes</h1>

			<?php
			if(!$tengo_postulantes){
				include("advertencia_postulantes.php");
			}
			else{
				if(isset($_GET["pagina"])){
					$pagina=$_GET["pagina"];
				}
				else
					$pagina=1;
				$paginacion=new Paginacion();
				$paginacion->paginacion_postulantes($pagina,$id_viaje);
				$postulantes=$tabla_postulacion->get_postulantes($id_viaje,$paginacion->get_inicio(),$paginacion->get_tamaño());
				?>

				<div class="container my-container col-md-12">

					<!-- *********** VIAJES PENDIENTES *********************** -->

					<?php

					foreach ($postulantes as $p){

						?>
						<article class=" row border border-dark semitransparente">

							<div class="container">
								<div class="row">

									<div class="col-12 col-sm-12 col-md-12 col-lg-6 padding-top-10">
										<h3><?php echo $p['nombre'].' '.$p['apellido']."<br>".' Asientos necesarios: '.$p['cantidad_asientos'];?></h3>
										
									</div>

									<div class="col-12 col-sm-12 col-md-12 col-lg-6 padding-top-10">

										<div class="row">

											<div class="col-md-4 padding-bottom-10">
												<a href="ver_perfil.php?id=<?php echo $p['id_usuario']?>"class='btn btn-primary btn-block'>Ver perfil</a>
											</div>

											<div class="col-md-4 padding-bottom-10">
												<a href="controlador/aceptar_postulante.php?id=<?php echo $p['id_postulacion'];?>" class='btn btn-success  btn-block'>Aceptar</a>
											</div>

											<div class="col-md-4 padding-bottom-10">
												<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#<?php echo $p['id_postulacion']?>">Rechazar</button>
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
													¿Esta seguro que quiere rechazar a este usuario?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
													<a class="btn btn-primary" href="controlador/rechazar_postulante.php?id=<?php echo $p['id_postulacion'];?>">Confirmar</a>
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
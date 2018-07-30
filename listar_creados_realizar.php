<?php  
foreach ($viaje as $p){

	$viaje=$tabla_viaje->get_datos($p['id_viaje']);

	?>
	<article id="<?php echo $viaje['id_viaje']?>" class="row border border-dark semitransparente">

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

				<div class="col-xs-12 col-xl-12">
					<p> <u><b> Cantidad de asientos disponibles:</u></b>  <?php echo " " . $viaje['asientos_disponibles'] . " " ;?></p>
				</div>

				<div class="container padding-top-16">

					<div class="row">

						<div class="col-12 col-sm-12 col-md-12 col-lg-3">

							<div class="row">

								<?php 
								if($tabla_postulacion->existe_pasajero($viaje['id_viaje'])){
									echo "
									<div class='col-md-12 padding-bottom-10'>
									<button type='button' class='btn btn-success btn-block mostrar' id='pas_".$viaje['id_viaje']."'>Pasajeros</button>
									</div>";
								}
								else{
									echo "
									<div class='col-md-12 padding-bottom-10'>
									<button type='button' class='btn btn-secondary btn-block' disabled>Sin pasajeros</button>
									</div>";
								}
								?>

							</div>

						</div>

						<div class="col-12 col-sm-12 col-md-12 col-lg-3">

							<div class="row">

								<?php
								if($tabla_postulacion->existe_postulante($viaje['id_viaje'])){
									echo "
									<div class='col-md-12 padding-bottom-10'>
									<button type='button' class='btn btn-warning btn-block margin-right-20 mostrar' id='pos_".$viaje['id_viaje']."'>Postulantes</button>
									</div>";
								}
								else{
									echo "
									<div class='col-md-12 padding-bottom-10'>
									<button type='button' class='btn btn-secondary btn-block' disabled>Sin postulantes</button>
									</div>";
								} 
								?>												
							</div>

						</div>

						<div class="col-12 col-sm-12 col-md-12 col-lg-3 padding-bottom-10">

							<a href="mostrar_info_viaje.php?id=<?php echo $viaje['id_viaje']?>"class='btn btn-primary btn-block margin-right-20'>+INFO</a>

						</div>

						<div class="col-md-12 col-lg-3 padding-bottom-10">

							<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#cancelar_<?php echo $viaje['id_viaje']?>">Cancelar</button>

						</div>

						<!-- CUADRO CONFIRMACION CANCELAR VIAJE -->
						<div class="modal fade" id="cancelar_<?php echo $viaje['id_viaje']?>" tabindex="-1" role="dialog" aria-labelledby="header_confirmacion" aria-hidden="true">
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
										<a class="btn btn-primary" href="controlador/cancelar_viaje_conductor.php?id_viaje=<?php echo $viaje['id_viaje']?>&pag=<?php echo $pagina ?>">Confirmar</a>
									</div>

								</div>

							</div>

						</div>

						<!--********** PASAJEROS ****************-->


						<div id="pasajeros_<?php echo $viaje['id_viaje']?>" class="container col-10 col-sm-10 col-md-10 col-lg-10 contacto rounded margin-bottom-20" style="background:#24772b78 !important">

							<div class="table-responsive">

								<table class="table table-hover">

									<thead class="thead-dark">

										<tr>

											<th scope="col">Usuario</th>
											<th scope="col">Asientos</th>
											<th scope="col">Telefono</th>

										</tr>

									</thead>

									<tbody>

										<?php 

										$pasajeros=$tabla_postulacion->get_pasajeros($viaje['id_viaje']);

										foreach ($pasajeros as $p){

											?>

											<tr class="table-success">
												<td>
													<a href="ver_perfil.php?id=<?php echo $p['id_usuario']?>" class="nombre-usuario">
														<?php echo $p['nombre'].' '.$p['apellido']?>	
													</a>
												</td>

												<td>
													<?php echo $p['cantidad_asientos'] ?>
												</td>

												<td>
													<?php echo $p['telefono'] ?>
												</td>

											</tr>

											<?php
										}

										?>

									</tbody>

								</table>

							</div>

						</div>


						<!--********** POSTULANTES ****************-->

						<div id="postulantes_<?php echo $viaje['id_viaje']?>" class="container col-10 col-sm-10 col-md-10 col-lg-10 contacto rounded margin-bottom-20" style="background:#fdeb64 !important">

							<div class="table-responsive">

								<table class="table table-hover">

									<thead class="thead-dark">

										<tr>

											<th scope="col">Usuario</th>
											<th scope="col">Asientos</th>
											<th scope="col">Accion</th>

										</tr>

									</thead>

									<tbody>

										<?php

										$postulantes=$tabla_postulacion->get_postulantes($viaje['id_viaje']); 

										foreach ($postulantes as $p){

											?>

											<tr class="table-warning">

												<td>
													<a href="ver_perfil.php?id=<?php echo $p['id_usuario']?>" class="nombre-usuario">
														<?php echo $p['nombre'].' '.$p['apellido']?>
													</a>
												</td>

												<td>
													<?php echo $p['cantidad_asientos']  ?>
												</td>

												<td>

													<div class="container col-md-10">


														<div class="row">

															<div class="col-lg-6 col-md-12 padding-bottom-10">
																<a href="controlador/aceptar_postulante.php?id=<?php echo $p['id_postulacion'];?>&pag=<?php echo $pagina ?>" class='btn btn-success  btn-block'>Aceptar</a>
															</div>

															<div class="col-lg-6 col-md-12 padding-bottom-10">
																<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#<?php echo $p['id_postulacion']?>">Rechazar</button>
															</div>

														</div>

													</div>

												</td>

											</tr>

											<!-- CUADRO CONFIRMACION RECHAZAR -->
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
															<a class="btn btn-primary" href="controlador/rechazar_postulante.php?id=<?php echo $p['id_postulacion']?>&pag=<?php echo $pagina ?>">Confirmar</a>
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

						<!-- *************************************************************************** -->

					</div>

				</div>

			</div>

		</div>

	</article>

	<?php
}
?>
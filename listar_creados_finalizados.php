<?php  
foreach ($viaje as $p){

	$viaje=$tabla_viaje->get_datos($p['id_viaje']);
	if($tabla_postulacion->existe_pasajero($viaje['id_viaje'])){

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

					<div class="container padding-top-16">

						<div class="row">

							<input type="hidden" id="pag" value="<?php echo $pagina?>">

							<div class="container col-12 col-sm-12 col-md-12 col-lg-8">

								<div class="row">

									<div class="col-md-6 margin-bottom-10">

										<?php 

										echo "
										<button type='button' class='btn btn-success btn-block mostrar' id='pas_".$viaje['id_viaje']."'>Pasajeros</button>";

										?>	
									</div>

									<div class="col-md-6 margin-bottom-10">
										<a href="mostrar_info_viaje.php?id=<?php echo $viaje['id_viaje']?>"class='btn btn-primary btn-block'>+INFO</a>
									</div>			

								</div>

							</div>

							<!--********** PASAJEROS ****************-->


							<div id="pasajeros_<?php echo $viaje['id_viaje']?>" class="container col-md-8 contacto rounded margin-bottom-10" style="background:#24772b78 !important">

								<div class="table-responsive">

									<table class="table table-hover">

										<thead class="thead-dark">

											<tr>

												<th scope="col">Usuario</th>
												<th scope="col">Accion</th>

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

													<?php
													$tabla_puntuacion=new Puntuacion(); 

													if ($tabla_puntuacion->existe_puntuacion($p['id_usuario'],$viaje['id_viaje'])) {
														echo "<td>
														<button type='button' class='btn btn-secondary btn-block' disabled>
														Ya calificó a este usuario
														</button>
														</td>";
													}
													else{

														echo "
														<td>
														<button type='button' class='btn btn-warning btn-block' data-toggle='modal' data-target='#cali_".$p['id_postulacion']."'>
														Calificar
														</button>
														</td>";
													}


													?>

												</tr>

												<!-- CUADRO CALIFICACION -->

												<div class="modal fade" id="cali_<?php echo $p['id_postulacion']?>" tabindex="-1" role="dialog" aria-labelledby="header_calificacion" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content" style="color:black">
															<div class="modal-header">
																<h5 class="modal-title" id="header_calificacion">Calificacion</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																Agregue un comentario y una calificacion al usuario <?php echo $p['nombre'].' '.$p['apellido']?>:
																<br><br>
																<h2 class="text-center ">Valor</h2>
																<h1  class="text-center valor" id="valor_<?php echo $p['id_postulacion']?>">-</h1>
																<p class="clasificacion text-center">
																	<input id="input1_<?php echo $p['id_postulacion']?>" type="radio" class="estrella_input" name="estrellas" value="5">
																	<label id="label1_<?php echo $p['id_postulacion']?>"  for="input1_<?php echo $p['id_postulacion']?>" class="estrella_label">★</label>
																	<input id="input2_<?php echo $p['id_postulacion']?>" type="radio" class="estrella_input" name="estrellas" value="4">
																	<label id="label2_<?php echo $p['id_postulacion']?>" for="input2_<?php echo $p['id_postulacion']?>" class="estrella_label">★</label>
																	<input id="input3_<?php echo $p['id_postulacion']?>" type="radio" class="estrella_input" name="estrellas" value="3">
																	<label id="label3_<?php echo $p['id_postulacion']?>" for="input3_<?php echo $p['id_postulacion']?>" class="estrella_label">★</label>
																	<input id="input4_<?php echo $p['id_postulacion']?>"  type="radio" class="estrella_input" name="estrellas" value="2">
																	<label id="label4_<?php echo $p['id_postulacion']?>" for="input4_<?php echo $p['id_postulacion']?>" class="estrella_label">★</label>
																	<input id="input5_<?php echo $p['id_postulacion']?>" type="radio" class="estrella_input" name="estrellas" value="1">
																	<label id="label5_<?php echo $p['id_postulacion']?>" for="input5_<?php echo $p['id_postulacion']?>" class="estrella_label">★</label>
																</p>


																<div id="mensaje1_<?php echo $p['id_postulacion']?>" class="error mensaje-cali">


																	<i class="fas fa-times"></i>

																	&nbsp;Seleccione un valor
																</div>

																<label for="comentario">Agregue un comentario(obligatorio)</label>
																<input type="text" id="comentario_<?php echo $p['id_postulacion']?>" class="form-control" placeholder="¿Que opina del usuario?">


																<div id="mensaje2_<?php echo $p['id_postulacion']?>" class="error mensaje-cali">

																	<i class="fas fa-times"></i>

																	&nbsp;Debe ingresar un comentario obligatoriamente
																</div>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
																<button id="<?php echo $p['id_postulacion']?>" class="btn btn-primary calificar">Calificar</button>
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

						</div>

					</div>

				</div>

			</div>

		</article>

		<?php
	}
}
?>
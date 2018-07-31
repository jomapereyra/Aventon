<?php

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

				<div class="col-xs-12 col-xl-12">
					<p> <u><b> Asientos que ocupé:</u></b>  <?php echo " " . $p['cantidad_asientos'] . " " ;?></p>
				</div>

				<?php
				$conductor=$tabla_usuario->get_datos_id($viaje["id_usuario"]); 
				?>

				<div class="container margin-top-20">

					<div class="row">

						<input type="hidden" id="pag" value="<?php echo $pagina?>">

						<div class="container col-12 col-sm-12 col-md-12 col-lg-8">

							<div class="row">

								<div class="col-md-6 margin-bottom-10">
									<button id="c_<?php echo $viaje['id_viaje']?>" type="button" class="btn btn-success btn-block margin-right-20 conductor">Conductor</button>
								</div>

								<div class="col-md-6 margin-bottom-10">
									<a href="mostrar_info_viaje.php?id=<?php echo $viaje['id_viaje']?>"class='btn btn-primary btn-block margin-right-20'>+INFO</a>
								</div>

							</div>
						</div>

						<?php $num++; ?>

						<div id="conductor_<?php echo $viaje['id_viaje']?>" class="container col-md-8 contacto rounded margin-bottom-10" style="color: white">
							
							<div class="table-responsive">

								<table class="table table-hover">

									<thead class="thead-dark">

										<tr>

											<th scope="col">Usuario</th>
											<th scope="col">Accion</th>

										</tr>

									</thead>

									<tbody>
										<tr class="table-success">
											<td>
												<a href="ver_perfil.php?id=<?php echo $p['id_usuario']?>" class="nombre-usuario">
													<?php echo $conductor['nombre'].' '.$conductor['apellido']?>	
												</a>
											</td>
											
											<?php
											$tabla_puntuacion=new Puntuacion(); 

											

											if ($tabla_puntuacion->existe_puntuacion($viaje['id_usuario'],$viaje['id_viaje'])) {
												echo "<td>
												<button type='button' class='btn btn-secondary btn-block' disabled>
												Ya calificó a este usuario
												</button>
												</td>";
											}
											else{

												echo "
												<td>
												<button type='button' class='btn btn-warning btn-block' data-toggle='modal' data-target='#cali_".$viaje['id_viaje']."'>
												Calificar
												</button>
												</td>";
											}

											?>

										</tr>

										<!-- CUADRO CALIFICACION -->

										<div class="modal fade" id="cali_<?php echo $viaje['id_viaje']?>" tabindex="-1" role="dialog" aria-labelledby="header_calificacion" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content" style="color:black">
													<div class="modal-header">
														<h5 class="modal-title" id="header_calificacion">Calificacion</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														Agregue un comentario y una calificacion al usuario <?php echo $conductor['nombre'].' '.$conductor['apellido']?>:
														<br><br>
														<h2 class="text-center ">Valor</h2>
														<h1  class="text-center valor" id="valor_<?php echo $viaje['id_viaje']?>">-</h1>
														<p class="clasificacion text-center">
															<input id="input1_<?php echo $viaje['id_viaje']?>" type="radio" class="estrella_input" name="estrellas" value="5">
															<label id="label1_<?php echo $viaje['id_viaje']?>"  for="input1_<?php echo $viaje['id_viaje']?>" class="estrella_label">★</label>
															<input id="input2_<?php echo $viaje['id_viaje']?>" type="radio" class="estrella_input" name="estrellas" value="4">
															<label id="label2_<?php echo $viaje['id_viaje']?>" for="input2_<?php echo $viaje['id_viaje']?>" class="estrella_label">★</label>
															<input id="input3_<?php echo $viaje['id_viaje']?>" type="radio" class="estrella_input" name="estrellas" value="3">
															<label id="label3_<?php echo $viaje['id_viaje']?>" for="input3_<?php echo $viaje['id_viaje']?>" class="estrella_label">★</label>
															<input id="input4_<?php echo $viaje['id_viaje']?>"  type="radio" class="estrella_input" name="estrellas" value="2">
															<label id="label4_<?php echo $viaje['id_viaje']?>" for="input4_<?php echo $viaje['id_viaje']?>" class="estrella_label">★</label>
															<input id="input5_<?php echo $viaje['id_viaje']?>" type="radio" class="estrella_input" name="estrellas" value="1">
															<label id="label5_<?php echo $viaje['id_viaje']?>" for="input5_<?php echo $viaje['id_viaje']?>" class="estrella_label">★</label>
														</p>


														<div id="mensaje1_<?php echo $viaje['id_viaje']?>" class="error mensaje-cali">


															<i class="fas fa-times"></i>

															&nbsp;Seleccione un valor
														</div>

														<label for="comentario">Agregue un comentario(obligatorio)</label>
														<input type="text" id="comentario_<?php echo $viaje['id_viaje']?>" class="form-control" placeholder="¿Que opina del usuario?">


														<div id="mensaje2_<?php echo $viaje['id_viaje']?>" class="error mensaje-cali">

															<i class="fas fa-times"></i>

															&nbsp;Debe ingresar un comentario obligatoriamente
														</div>

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
														<button id="<?php echo $viaje['id_viaje']?>" class="btn btn-primary calificar">Calificar</button>
													</div>
												</div>
											</div>
										</div>
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

echo "</div>";
echo "</div>";
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
					<p> <u><b> Cantidad de asientos disponibles:</u></b>  <?php echo " " . $viaje['asientos_disponibles'] . " " ;?></p>
				</div>

				<div class="col-xs-12 col-xl-12">
					<p> <u><b> Asientos que estoy ocupando:</u></b>  <?php echo " " . $p['cantidad_asientos'] . " " ;?></p>
				</div>

				<?php
				$conductor=$tabla_usuario->get_datos_id($viaje["id_usuario"]); 
				?>

				<div class="container margin-top-20">

					<div class="row">

						<input type="hidden" id="pag" value="<?php echo $pagina?>">

						<div class="container col-12 col-sm-12 col-md-12 col-lg-8">

							<div class="row">

								<div class="col-md-4 margin-bottom-10">
									<button id="c_<?php echo $viaje['id_viaje']?>" type="button" class="btn btn-success btn-block margin-right-20 conductor">Conductor</button>
								</div>

								<div class="col-md-4 margin-bottom-10">
									<a href="mostrar_info_viaje.php?id=<?php echo $viaje['id_viaje']?>"class='btn btn-primary btn-block margin-right-20'>+INFO</a>
								</div>

								<div class="col-md-4 padding-bottom-10">
									<button type="button" class="btn btn-danger btn-block margin-right-20" data-toggle="modal" data-target="#<?php echo $p['id_postulacion']?>">Cancelar</button>	
								</div>

							</div>
						</div>

						<div id="conductor_<?php echo $viaje['id_viaje']?>" class="container col-md-8 contacto rounded margin-bottom-10" style="color: white">
							
							<div class="table-responsive">

								<table class="table table-hover">

									<thead class="thead-dark">

										<tr>

											<th scope="col">Usuario</th>
											<th scope="col">Telefono</th>

										</tr>

									</thead>

									<tbody>

										<tr class="table-success">
											<td>
												<a href="ver_perfil.php?id=<?php echo $p['id_usuario']?>" class="nombre-usuario">
													<?php echo $conductor['nombre'].' '.$conductor['apellido']?>	
												</a>
											</td>
											
											<td>
												<?php echo $conductor['telefono'] ?>
											</td>

										</tr>

									</tbody>
								</table>
							</div>
						</div>

						<!-- ************************************************************************* -->


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
										<a class="btn btn-primary" href="controlador/cancelar_viaje_pasajero.php?id=<?php echo $p['id_postulacion']?>&pag=<?php echo $pagina?>">Confirmar</a>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>

	</article>

	<?php
}
?>
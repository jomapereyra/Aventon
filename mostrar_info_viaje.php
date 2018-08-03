<html>
<head>
	<title>Aventon</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body class="fondo-usuario">
	<?php include("header.php");
	require_once("modelo/viaje.php");
	require_once("modelo/usuario.php");
	require_once("modelo/postulacion.php");
	require_once("modelo/preguntas.php");
	$id= $_GET['id'];
	$email=$_SESSION["usuario"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_id($email);
	$usuario2=$tabla_usuario->get_id($email);
	$tabla_viaje= new Viaje();
	$info=$tabla_viaje->get_datos($id);
	$tabla_postulacion=new Postulacion();
	$postulado=$tabla_postulacion->estoy_postulado($info['id_viaje'],$usuario['id_usuario']);
	$preguntado= new Preguntas();
	$pre= $preguntado->existe_preguntas($id);
	$creadordelviaje=$tabla_viaje->soy_creador1($id,$usuario2['id_usuario']);
	?>
	<div class="container my-container">
		<section class="row">
			<article class=" semitransparente border border-dark">
				<div class="container  ">
					<div class="row">
						<div class="col-12 col-xl-12 row">
							<div class="container">
								<a href="javascript:history.back(-1);" title="Ir la página anterior"><i class="fas fa-arrow-left volver"></i></a>
								<p><u><h1 class="text-center"><center>INFORMACION DEL VIAJE</center></h1></u></p>	
							</div>
							
						</div>
						<input type="hidden" id="id_usuario" value=<?php echo $usuario['id_usuario'] ?>></input>
						<input type="hidden" id="id_viaje" value=<?php echo $info['id_viaje'] ?>></input>
						<input type="hidden" id="limite" value=<?php echo $info['asientos_disponibles'] ?>></input>
						<div class="col-6 col-xl-6">
							<center>
								<p> <h3>Fecha Salida: <?php echo " " . $info['fecha_salida']. " ";?> </h3> </p>
								<p> <h3>Hora de Salida: <?php echo " " . $info['hora_salida']. " ";?> </h3> </p>
								<p><h3><?php echo "Provincia:" . " " . $info['provincia_origen'] . " " ;?></h3></p>
								<p><h3><?php echo "Ciudad:" . " " . $info['ciudad_origen'] . " " ;?></h3></p>
								<p><h3><?php echo "Calle:" . " " . $info['calle_origen'] . " " ;?></h3></p>
								<p><h3><?php echo "Numero:" . " " . $info['numero_origen'] . " " ;?></h3></p>
							</center>
						</div>
						<div class="col-6 col-xl-6">
							<center>
								<p><h3><?php echo "Fecha Llegada:"  . " " . $info['fecha_llegada'] . " ";?></h3></p>
								<p><h3><?php echo "Hora Llegada:"  . " " . $info['hora_llegada'] . " ";?></h3></p>
								<p><h3><?php echo "Provincia:" . " " . $info['provincia_destino'] . " " ;?></h3></p>
								<p><h3><?php echo "Ciudad:"  . " " . $info['ciudad_destino'] . " " ;?></h3></p>
								<p><h3><?php echo "Calle:" . " " . $info['calle_destino'] . " " ;?></h3></p>
								<p><h3><?php echo "Numero:" . " " . $info['numero_destino'] . " " ;?></h3></p>					
							</center>
						</div>
						<div class="col-12 col-xl-12">
							<p><u><h1><center>DETALLE </center></h1></u></p>
							<p>
								<h3 class="text-center"><?php echo " " . $info['descripcion']. " ";?> </h3> 
							</p>
						</div>

						<div class="row col-xl-12 col-12">

							<div class="col-xl-6 col-6">
								<p>
									<h3 class="text-left">
										<?php
										require_once("modelo/usuario.php");
										$usuario_tabla=new Usuario();
										$usuario=$usuario_tabla->get_datos_id($info["id_usuario"]);?>
										<u>Usuario:</u>
										<a href="ver_perfil.php?id=<?php echo $info['id_usuario'] ?>">
											<?php echo " ". $usuario["nombre"] . " ". $usuario["apellido"] ;?>	
										</a>
									</h3>
								</p>

							</div>

							<div class="col-xl-6 col-6">
								<p><h3 class="text-right"> <u>Precio:</u> <?php echo  " " . $info['costo'] . " " ;?></h3></p>	
							</div>	

						</div>

						
						<div class="container col-xl-12 col-12">
							
								<?php 

									if(!$pre) {
										?>
										<div class=" row col-xl-12 ">
										<?php
									
											echo "no existen preguntas realizadas";
										?>
										</div>
										<?php
									}else{
										
											$pregunta= $preguntado->get_preguntas($id);
											foreach ($pregunta as $key ) {
												?>
												<div class=" border border-dark semitransparente row col-xl-12 ">
												<?php
													$u_q_preg=$tabla_usuario->get_datos_id($key['autor']);
													echo $u_q_preg['nombre'];echo " ";echo $u_q_preg['apellido'];echo ":"?><br><?php
													echo $key['contenido'];
												?>
												</div>
												<?php
												$exresp=$preguntado->existe_respuesta($key['id_pregunta']);

												if($exresp){

														$ex=$preguntado->get_respuesta($key['id_pregunta']);
														foreach ($ex as $val) {
															?>
															<div class=" border border-dark semitransparente row col-xl-12 ">
															<?php
															echo $usuario['nombre'];echo " "; echo $usuario['apellido'];echo ":";?><br><?php
															echo $val['contenido'];
															?>
															</div>
															<?php
														}
														
												}else{
													
													
													if($creadordelviaje == 0){
														?>
														<div class="border border-dark semitransparente row col-xl-12 ">
														<?php
															echo "Esperando respuesta.....  en la brevedad sera respondido";
														?>
														</div>
														<?php

													}else{
														?>
														<div class=" border border-dark semitransparente row col-xl-12 ">
															<form method="post" action="guardarrespuesta.php">
																<input type='text' name='cont' size='100' class='centrado'>
																<input type="hidden" name="id" value=<?php echo $id ?>>
																<input type="hidden" name="id_p" value=<?php echo $key['id_pregunta'] ?>>
																<input type='submit' name='cr' id='cr' value='Responder'>
															</form>
														</div>
														<?php
													}
												}

											}
										
									}
								?>
							</div>
							<?php
								if($creadordelviaje == 0){
									?>
									<div class=" border border-dark semitransparente row col-xl-12 ">
										<form method="post" action="guardarpregunta.php">
											<input type='text' name='cont' size='100' class='centrado'>
											<input type="hidden" name="id" value=<?php echo $id ?>>
											<input type="hidden" name="id_u" value=<?php echo $info['id_usuario'] ?>>
											<input type='submit' name='cr' id='cr' value='Preguntar'>
											
										</form>
									</div>
									<?php
								}
							?>

						</div>
						
					


						<?php 

						if(!$postulado){

							echo "<div class='col-xl-12 col-12 padding-top-16 padding-bottom-20'>
							<button type='button' class='btn btn-primary btn-block btn-lg'data-toggle='modal' data-target='#".$info['id_viaje']."'>Postularme</button>
							</div>";
							echo"<div class='modal fade' id='".$info['id_viaje']."' tabindex='-1' role='dialog' aria-labelledby='header_confirmacion' aria-hidden='true'>
							<div class='modal-dialog modal-dialog-centered' role='document'>
							<div class='modal-content'>
							<div class='modal-header'>
							<h5 class='modal-title' id='header_confirmacion'>Aviso</h5>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
							</button>
							</div>
							<div class='form-grop container'>
							<label for='asientos'>Ingrese la cantidad de asientos disponibles: </label>
							<input type='number' class='form-control' id='asientos' name='asientos'>
							<div id='mensaje14' class='error'><i class='fas fa-times'></i>
							&nbsp;Debe ingresar la cantidad de asientos</div>
							<div id='mensaje14_1' class='error'><i class='fas fa-times'></i></div>
							<div id='mensaje14_2' class='error'><i class='fas fa-times'></i>
							&nbsp;Tiene que tener al menos 1 asiento</div>
							<div class='modal-footer'>
							<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
							<button id='postularme' class='btn btn-primary'>Confirmar</button>
							</div>
							</div>
							</div>
							</div>";

						}

						?>	

					</div>

				</div>

			</article>

		</section>	
	</div>


	<!--<?php include("footer.php");?>-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/postulacion/crear_postulacion.js"></script>

</body>
</html>
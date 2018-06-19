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
	$id= $_GET['id'];
	$email=$_SESSION["usuario"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_id($email);
	$tabla_viaje= new Viaje();
	$info=$tabla_viaje->get_datos($id);
	$tabla_postulacion=new Postulacion();
	$postulado=$tabla_postulacion->estoy_postulado($info['id_viaje'],$usuario['id_usuario']);
	?>
	<div class="container my-container">
		<section class="row">
			<article class=" semitransparente border border-dark">
				<div class="container  ">
					<div class="row">
						<div class="col-12 col-xl-12">
							<p><u><h1><center>INFORMACION DEL VIAJE </center></h1></u></p>
						</div>
						<input type="hidden" id="id_usuario" value=<?php echo $usuario['id_usuario'] ?>></input>
						<input type="hidden" id="id_viaje" value=<?php echo $info['id_viaje'] ?>></input>
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
										<a href="">
											<?php echo " ". $usuario["nombre"] . " ". $usuario["apellido"] ;?>	
										</a>
									</h3>
								</p>

							</div>

							<div class="col-xl-6 col-6">
								<p><h3 class="text-right"> <u>Precio:</u> <?php echo  " " . $info['costo'] . " " ;?></h3></p>	
							</div>	

						</div>

						<?php 

						if(!$postulado){

							echo "<div class='col-xl-12 col-12 padding-top-16 padding-bottom-20'>
							<button id='postularme' class='btn btn-primary btn-block btn-lg'>Postularme</button>
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
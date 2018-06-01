<?php

	$cadena= $_POST['variable1'];
	require ("devolverviajes.php");
	$viajes= new Devolverviajes();
	$array_v= $viajes->get_un_viaje($cadena);
?>

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
	<?php include("header.php");?>
	<div class="container">
		<section class="row">
			
			<?php
				foreach ($array_v as $elemento){
					$ubicacion1= $viajes->get_ubicacion_origen($elemento['id_origen']);
					   
						foreach ($ubicacion1 as $elemento1){
							$provincia1= $viajes->get_provincia($elemento1['id_provincia']);
								foreach ($provincia1 as $elemento3){
									$localidad1= $viajes->get_ciudad($elemento1['id_ciudad']);
									foreach ($localidad1 as $elemento5){
										
									}
								}
						}
					$ubicacion2= $viajes->get_ubicacion_destino($elemento['id_destino']);
						foreach ($ubicacion2 as $elemento2){
							$provincia2= $viajes->get_provincia($elemento2['id_provincia']);
								foreach ($provincia2 as $elemento4){
									$localidad2= $viajes->get_ciudad($elemento2['id_ciudad']);
										foreach ($localidad2 as $elemento6){
										}
								}
						}

					?><article class=" semitransparente container border border-dark">
							<div class="container  ">
								<div class="row">
									<div class="col-xs-12 col-xl-12">
										<p><h1><center>INFORMACION DEL VIAJE </center></h1></p>
									</div>
									<div class="col-xs-6 col-xl-6">
										<center>
											<p> <h3>Fecha Salida: <?php echo " " . $elemento['fecha_salida']. " ";?> </h3> </p>
											<p> <h3>Hora de Salida: <?php echo " " . $elemento['hora_salida']. " ";?> </h3> </p>
											<p><h3><?php echo "Provincia:" . " " . $elemento3['nombre_provincia'] . " " ;?></h3></p>
											<p><h3><?php echo "Ciudad:" . " " . $elemento5['nombre_localidad'] . " " ;?></h3></p>
										</center>
									</div>
									<div class="col-xs-6 col-xl-6">
										<center>
											<p><h3><?php echo "Fecha Llegada:"  . " " . $elemento['fecha_llegada'] . " ";?></h3></p>
											<p><h3><?php echo "Hora Llegada:"  . " " . $elemento['hora_llegada'] . " ";?></h3></p>
											<p><h3><?php echo "Provincia:" . " " . $elemento4['nombre_provincia'] . " " ;?></h3></p>
											<p><h3><?php echo "Ciudad:"  . " " . $elemento6['nombre_localidad'] . " " ;?></h3></p>					
										</center>
										</div>
											<div class="col-xs-12 col-xl-12">
											<center>
												<p><h2><center>DESCRIPCION DEL VIAJE </center></h2></p>
												<p><h4><?php echo $elemento['descripcion'] . " ";?></h4></p>
																
											</center>
										</div>
								</div>
							</div>
						
					
						
					</article>
					<?php

				}


			 ?>
		</section>	
	</div>


	<?php include("footer.php"); ?>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>
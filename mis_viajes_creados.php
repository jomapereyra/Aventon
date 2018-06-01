
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
	<div class="container   ">
		
			<section class="row  col-xs-8  ">
				<?php 
					require ("devolverviajes.php");
					$viajes= new Devolverviajes();
					$email=$_SESSION["usuario"];
					$tabla_usuario=new Usuario();
					$usuario=$tabla_usuario->get_viajes_creados($email);
				?>
			
				<?php
					foreach ($usuario as $elemento){
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

						?><article class=" row col-xl-8 col-xs-8 border border-dark semitransparente ">
								
								<div class="container    ">
									<div class="row col-xs-8 ">
										
										<div class="col-xs-4 col-xl-6">
											<?php $v= $elemento['id_viaje'];?>
											<p><?php echo "Fecha Salida" . " " . $elemento['fecha_salida'];?></p>
											<p><?php echo "Provincia:" . " " . $elemento3['nombre_provincia'] . " " ;?></p>
											<p><?php echo "Ciudad:" . " " . $elemento5['nombre_localidad'] . " " ;?></p>
										</div>
										<div class="col-xs-4 col-xl-6">
											<p><?php echo "Fecha Llegada:"  . " " . $elemento['fecha_llegada'] . " ";?></p>
											<p><?php echo "Provincia:" . " " . $elemento4['nombre_provincia'] . " " ;?></p>
											<p><?php echo "Ciudad:"  . " " . $elemento6['nombre_localidad'] . " " ;?></p>
											
												
											<form action="mostrarinfoviaje.php" method="post" name="formulario">
												<input type="hidden" name="variable1" value="<?php echo $elemento['id_viaje'];?> ">
												<input class="btn btn-primary float-right" type="submit" value="+Info" >
											</form>
												
												
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
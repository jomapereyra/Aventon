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

				?><article class=" semitransparente border border-dark">
					<div class="container  ">
						<div class="row">
							<div class="col-12 col-xl-12">
								<p><u><h1><center>INFORMACION DEL VIAJE </center></h1></u></p>
							</div>
							<div class="col-6 col-xl-6">
								<center>
									<p> <h3>Fecha Salida: <?php echo " " . $elemento['fecha_salida']. " ";?> </h3> </p>
									<p> <h3>Hora de Salida: <?php echo " " . $elemento['hora_salida']. " ";?> </h3> </p>
									<p><h3><?php echo "Provincia:" . " " . $elemento3['nombre_provincia'] . " " ;?></h3></p>
									<p><h3><?php echo "Ciudad:" . " " . $elemento5['nombre_localidad'] . " " ;?></h3></p>
									<p><h3><?php echo "Calle:" . " " . $elemento1['calle'] . " " ;?></h3></p>
									<p><h3><?php echo "Numero:" . " " . $elemento1['numero'] . " " ;?></h3></p>
								</center>
							</div>
							<div class="col-6 col-xl-6">
								<center>
									<p><h3><?php echo "Fecha Llegada:"  . " " . $elemento['fecha_llegada'] . " ";?></h3></p>
									<p><h3><?php echo "Hora Llegada:"  . " " . $elemento['hora_llegada'] . " ";?></h3></p>
									<p><h3><?php echo "Provincia:" . " " . $elemento4['nombre_provincia'] . " " ;?></h3></p>
									<p><h3><?php echo "Ciudad:"  . " " . $elemento6['nombre_localidad'] . " " ;?></h3></p>
									<p><h3><?php echo "Calle:" . " " . $elemento2['calle'] . " " ;?></h3></p>
									<p><h3><?php echo "Numero:" . " " . $elemento2['numero'] . " " ;?></h3></p>					
								</center>
							</div>
							<div class="col-12 col-xl-12">
								<p><u><h1><center>DETALLE </center></h1></u></p>
								<p>
									<h3 class="text-center"><?php echo " " . $elemento['descripcion']. " ";?> </h3> 
								</p>
							</div>

							<div class="row col-xl-12 col-12">

								<div class="col-xl-6 col-6">
									<p><h3 class="text-left"><?php
									require_once("modelo/usuario.php");
									$usuario_tabla=new Usuario();
									$usuario=$usuario_tabla->get_datos_id($elemento["id_usuario"]);?>
									<u>Usuario:</u>  <?php echo " ". $usuario["nombre"] . " ". $usuario["apellido"] ;?></h3></p>
								</div>

								<div class="col-xl-6 col-6">
									<p><h3 class="text-right"> <u>Precio:</u> <?php echo  " " . $elemento['costo'] . " " ;?></h3></p>	
								</div>		

							</div>

							



						</div>



					</div>



				</article>
				<?php

			}


			?>
		</section>	
	</div>


	<!--<?php include("footer.php");?>-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>
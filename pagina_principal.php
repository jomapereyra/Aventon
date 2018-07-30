<html>
<head>
	<title>Aventon</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body class="fondo-usuario">
	<?php

	require_once("modelo/viaje.php");
	require_once("modelo/usuario.php");
	require_once("modelo/postulacion.php");
	require_once("modelo/paginacion.php");
	$tabla_viaje= new Viaje();
	$tabla_postulacion=new Postulacion();
	include("header.php");
	$email=$_SESSION["usuario"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_id($email);
	$existen_viajes=$tabla_viaje->hay_viaje($usuario['id_usuario']);
	if(!$existen_viajes){
		include("advertencia_inicio.php");
	}
	else{
		if(isset($_GET["pagina"])){
			$pagina=$_GET["pagina"];
		}
		else
			$pagina=1;
		$paginacion=new Paginacion();
		$paginacion->paginacion_inicio($pagina,$usuario['id_usuario']);
		$viaje= $tabla_viaje->get_viajes($paginacion->get_inicio(),$paginacion->get_tamaño(),$usuario['id_usuario']);

		?>

		<div class="container my-container">
			<div class="semitransparente rounded">
				<h1 class="text-center">INICIO</h1>

				<section>

					<div class="container my-container col-md-12">

				<!-- *********** SELECTOR DE TIPO DE VIAJE *********************** 
				<div class="text-center padding-bottom-20">
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary active">
							<input type="radio" name="options" id="option1" autocomplete="off" checked>Casual
						</label>
						<label class="btn btn-secondary">
							<input type="radio" name="options" id="option2" autocomplete="off"> Semanal
						</label>
						<label class="btn btn-secondary">
							<input type="radio" name="options" id="option3" autocomplete="off"> Mensual
						</label>
					</div>
				</div>


			-->

			<!-- *********** INICIO *********************** -->

			<?php
			
			foreach ($viaje as $c){

				$postulado=$tabla_postulacion->estoy_postulado($c['id_viaje'],$usuario['id_usuario']);

				?>

				<article class=" row border border-dark semitransparente">

					<div class="container">
						<div class="row col-xs-8 ">

							<div class="col-xs-4 col-xl-6">
								<?php $v= $c['id_viaje'];?>
								<p> <u><b> Fecha Salida: </u></b> <?php echo $c['fecha_salida'];?></p>
								<p> <u><b>Provincia: </u></b><?php echo " " . $c['provincia_origen'] . " " ;?></p>
								<p> <u><b>Ciudad: </u></b> <?php echo " " . $c['ciudad_origen'] . " " ;?></p>
							</div>
							<div class="col-xs-4 col-xl-6">
								<p><u><b> Fecha Llegada:</u></b><?php echo  " " . $c['fecha_llegada'] . " ";?></p>
								<p> <u><b>Provincia: </u></b><?php echo " " . $c['provincia_destino'] . " " ;?></p>
								<p> <u><b> Ciudad:</u></b>  <?php echo " " . $c['ciudad_destino'] . " " ;?></p>
							</div>

							<div class="col-xs-12 col-xl-12">
								<p> <u><b> Cantidad de asientos disponibles:</u></b>  <?php echo " " . $c['asientos_disponibles'] . " " ;?></p>
							</div>

							<?php

							$ok=true;

							if($postulado){

								$estado=$tabla_postulacion->get_estado($c['id_viaje'],$usuario['id_usuario']);
								if($estado=="esperando"){
									include("advertencia_postulacion_esperando.php");
								}
								else{
									if ($estado=="aceptado") {
										include("advertencia_postulacion_aceptado.php");
									}
									else{
										if($estado=="rechazado"){
											$ok=false;
											include("advertencia_postulacion_rechazado.php");
										}
									}
								}
							}

							if($ok){
								echo "<div class='col-md-12 text-right'>
								<a href='mostrar_info_viaje.php?id=".$c['id_viaje']."' class='btn btn-primary float-right'>+INFO</a>	
								</div>";
							}

							?>


						</div>

					</div>


				</article>
				<?php



			}
			$campos=array(0 => "id_provincia_partida" ,1=>"id_ciudad_partida",2=>"id_provincia_llegada",3=>"id_ciudad_llegada");
			$cadena="";
			foreach ($campos as $key => $value) {
				if($key<count($campos)-1)
					$cadena=" ".$cadena.$campos[$key]."=".$value." AND ";
				else
					$cadena=$cadena.$campos[$key]."=".$value;
			}
			
			?>
		</div>

	</section>

</div>
<?php
$paginacion->mostrar($pagina);
} 
	//include("footer.php"); ?>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/moment-with-locales.js"></script>
	<!--<script>
		$(document).ready(function(){

			moment.locale('es');

			var x = 622;
			var fecha=new Date();
			var fecha1=new Date();
			fecha1.getDate();

			moment().add(1, 'months');
			moment().add(7, 'days').add(1, 'months');
			
			fecha=(moment(moment(fecha1).add(10,'days').add(1, 'months')).format("DD MM YYYY"));


			fecha=(moment(moment('2018-01-31').add(1, 'months')).format("DD MM YYYY"));

			alert(fecha);




		})
	</script>-->

</body>
</html>
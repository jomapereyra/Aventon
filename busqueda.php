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
	<?php

	require_once("modelo/viaje.php");
	require_once("modelo/usuario.php");
	require_once("modelo/paginacion.php");
	$tabla_viaje= new Viaje();
	include("header.php");
	include("header_busqueda.php");
	require_once("modelo/postulacion.php");
	$tabla_postulacion=new Postulacion();
	$email=$_SESSION["usuario"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_id($email);
	$consulta=array();
	$campos=array(0 => "pro1.id_provincia" ,1=>"ciu1.id_localidad",2=>"pro2.id_provincia",3=>"ciu2.id_localidad");
	if(isset($_POST['provincia_origen'])){
		if($_POST['provincia_origen']!=0){
			$consulta[0]=$_POST['provincia_origen'];
			if(isset($_POST['ciudad_origen'])){
				if($_POST['ciudad_origen']!=0)
					$consulta[1]=$_POST['ciudad_origen'];
			}	
		}
		
	}
	if(isset($_POST['provincia_destino'])){
		if($_POST['provincia_destino']!=0){
			$consulta[2]=$_POST['provincia_destino'];
			if(isset($_POST['ciudad_destino'])){
				if ($_POST['ciudad_destino']!=0)
					$consulta[3]=$_POST['ciudad_destino'];
			}	
		}
	}

	if(count($consulta)>0){

		if(isset($_GET["pagina"])){
			$pagina=$_GET["pagina"];
		}
		else
			$pagina=1;
		$cadena="";
		foreach ($consulta as $key => $value) {
			if($key<count($consulta)-1)
				$cadena=$cadena.$campos[$key]."=".$value." AND"." ";
			else
				$cadena=$cadena.$campos[$key]."=".$value;
		}
		$paginacion=new Paginacion();
		$paginacion->paginacion_buscar($pagina,$cadena,$usuario['id_usuario']);
		$viaje= $tabla_viaje->buscar($paginacion->get_inicio(),$paginacion->get_tamaño(),$cadena,$usuario['id_usuario']);


	}		
	else{
		$existen_viajes=$tabla_viaje->hay_viaje($usuario['id_usuario']);
		if(!$existen_viajes){
			echo "
			<div class='container my-container'>
			<div class='semitransparente rounded'>
			<h1 class='text-center'>Busqueda</h1>
			<div class='container my-container col-md-12'>";
			include("advertencia_inicio.php");
			echo "
			</div>
			</div>
			</div>";
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

	//if(count($viaje)>0){
			?>


			<div class="container my-container">
				<div class="semitransparente rounded">

					<h1 class="text-center">Busqueda</h1>


					<div class="container my-container col-md-12">

						<section>


							<!-- *********** RESULTADOS *********************** -->

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
							echo "</div>";
							$paginacion->mostrar($pagina);
							echo "</div>";
							?>

						</section>

					</div>
				</div>
			</div>
			<?php
		}

	}

/*
	}
	else{
		include("advertencia_resultado.php");
	} */
	?>
</div>
</div>
<?php
	//include("footer.php"); ?>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/busqueda/traeme_ciudades_busqueda.js"></script>
	<script src="js/busqueda/enabled_disabled.js"></script>
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
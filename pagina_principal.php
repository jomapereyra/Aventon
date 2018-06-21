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
	require_once("modelo/postulacion.php");
	$tabla_viaje= new Viaje();
	$tabla_postulacion=new Postulacion();
	$existen_viajes=$tabla_viaje->hay_viaje();
	include("header.php");
	$email=$_SESSION["usuario"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_id($email);
	if(!$existen_viajes){
		include("advertencia_inicio.php");
	}
	else{
		?>

		<div class="container my-container col-md-8">

			<section>
				
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


			<!-- *********** VIAJES CASUALES *********************** -->

			<?php

			if(isset($_GET["pagina"])){
				$pagina=$_GET["pagina"];
			}
			else
				$pagina=1;
			$tamaño_paginas=10;	
			$inicio=($pagina-1)*$tamaño_paginas;
			$num_fila= $tabla_viaje->get_numero_filas();
			$viaje= $tabla_viaje->get_viajes($inicio,$tamaño_paginas);
			$total_paginas=ceil($num_fila/$tamaño_paginas);

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

							<?php

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

											include("advertencia_postulacion_rechazado.php");
										}
									}
								}
							} 
							?>
							<div class="col-md-12 text-right">
								<a href="mostrar_info_viaje.php?id=<?php echo $c['id_viaje']?>" class='btn btn-primary float-right'>+INFO</a>	
							</div>

						</div>

					</div>


				</article>
				<?php

				

			}
			if($pagina> 1){
				$anterior= $pagina - 1;
			}
			else
				$anterior = 1;
			if($pagina<$total_paginas){
				$siguiente= $pagina + 1;
			}
			else 
				$siguiente=$total_paginas;
			

			echo "<br>

			<nav aria-label='Page navigation example'>
			<ul class='pagination'>
			<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$anterior'>Previous</a></li>";
			for($i=1;$i<=$total_paginas;$i++){
				echo "<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$i'>$i</a></li>";
			}
			echo "<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$siguiente'>Next</a></li>
			</ul>
			</nav>";
			?>

		</section>

	</div>
	<?php
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
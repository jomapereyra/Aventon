<html>
<head>
	<title>Mis Viajes Creados</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body class="fondo-usuario">
	<?php
	require_once("modelo/usuario.php");
	require_once("modelo/viaje.php");
	require_once("modelo/postulacion.php");
	require_once("modelo/puntuacion.php");
	require_once("modelo/paginacion.php");
	require("modelo/Carbon/autoload.php");
	use Carbon\Carbon;
	use Carbon\CarbonInterval;
	Carbon::setToStringFormat('Ymd');
	Carbon::setLocale('es');
	$tabla_postulacion=new Postulacion();
	$tabla_viaje=new Viaje();
	include("header.php");
	$email=$_SESSION["usuario"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_id($email);
	$fecha_actual=Carbon::now();
	$tengo_creados=$tabla_viaje->existen_creados($usuario['id_usuario']);
	?>
	<div class="container my-container">
		<div class="semitransparente rounded">
			<h1 class="text-center">Mis Viajes Creados</h1>

			<?php
			if(!$tengo_creados){
				include("advertencia_viajes_creados.php");
			}
			else{

				?>

				<div class="container my-container col-md-12" style="padding-top: 10px;">


					<!-- *********** VIAJES CREADOS *********************** -->
					<?php 
					$tabla_viaje->actualizar_historial($fecha_actual,$usuario['id_usuario']);

					if(isset($_GET["action"])){
						$action=$_GET["action"];
					}
					else
						$action=1;
					if($action==1){

						echo "
						<ul class='container col-5 nav nav-pills mb-3 text-center rounded pestaña-viajes' id='pills-tab' role='tablist'>
						<li class='nav-item col-6'>
						<a class='nav-link active' id='realizar-tab' data-toggle='pill' href='#realizar' role='tab' aria-controls='realizar' aria-selected='true'>Viajes a realizar</a>
						</li>
						<li class='nav-item col-6'>
						<a class='nav-link' id='finalizados-tab' data-toggle='pill' href='#finalizados' role='tab' aria-controls='finalizados' aria-selected='false'>Viajes finalizados</a>
						</li>
						</ul>";

					}
					else{

						echo "
						<ul class='container col-5 nav nav-pills mb-3 text-center rounded pestaña-viajes' id='pills-tab' role='tablist'>
						<li class='nav-item col-6'>
						<a class='nav-link' id='realizar-tab' data-toggle='pill' href='#realizar' role='tab' aria-controls='realizar' aria-selected='false'>Viajes a realizar</a>
						</li>
						<li class='nav-item col-6'>
						<a class='nav-link active' id='finalizados-tab' data-toggle='pill' href='#finalizados' role='tab' aria-controls='finalizados' aria-selected='true'>Viajes finalizados</a>
						</li>
						</ul>";

					}

					?>

					<!--******************************* VIAJES A REALIZAR *********************************** -->
					
					<div class="tab-content" id="pills-tabContent">

						<?php

						if($action==1){

							echo "<div class='tab-pane fade show active' id='realizar' role='tabpanel' aria-labelledby='realizar-tab'>";

						} 
						else{

							echo "<div class='tab-pane fade show' id='realizar' role='tabpanel' aria-labelledby='realizar-tab'>";

						}
						
						if(isset($_GET["pagina"])){
							$pagina=$_GET["pagina"];
						}
						else
							$pagina=1;
						$paginacion=new Paginacion();
						$paginacion->paginacion_creados_realizar($pagina,$usuario['id_usuario']);
						$viaje=$tabla_viaje->get_viajes_creados_realizar($usuario['id_usuario'],$paginacion->get_inicio(),$paginacion->get_tamaño());
						if (count($viaje)==0){
							include("advertencia_realizar.php");
						}
						else{

							include("listar_creados_realizar.php");
							$paginacion->mostrar($pagina);

						}
						
						
						?>

					</div>


					<!--******************************* VIAJES FINALIZADOS ******************************** -->

					<input type="hidden" id="calificador" value="<?php echo $usuario['id_usuario']?>">
					<?php
					if($action==1){
						echo "<div class='tab-pane fade show' id='finalizados' role='tabpanel' aria-labelledby='finalizados-tab'>";
					}
					else{
						echo "<div class='tab-pane fade show active' id='finalizados' role='tabpanel' aria-labelledby='finalizados-tab'>";
					}

					if(isset($_GET["pagina_f"])){
						$pagina_f=$_GET["pagina_f"];
					}
					else
						$pagina_f=1;
					$paginacion=new Paginacion();
					$paginacion->paginacion_creados_finalizados($pagina_f,$usuario['id_usuario']);
					$viaje=$tabla_viaje->get_viajes_creados_finalizados($usuario['id_usuario'],$paginacion->get_inicio(),$paginacion->get_tamaño());
					if (count($viaje)==0){
						include("advertencia_finalizados.php");
					}
					else{
						include("listar_creados_finalizados.php");
						$paginacion->mostrar_finalizados($pagina_f);
					}
					
					?>

				</div>
			</div>
		</div>
	</div>
	<?php 
} 

echo "</div>";
//include("footer.php"); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mis_viajes/mostrar_info.js"></script>
<script src="js/mis_viajes/calificacion.js"></script>
</body>
</html>
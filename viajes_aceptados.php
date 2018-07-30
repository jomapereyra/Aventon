<html>
<head>
	<title>Viajes Aceptados</title>
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
	require_once("modelo/puntuacion.php");
	require_once("modelo/postulacion.php");
	require_once("modelo/paginacion.php");
	require("modelo/Carbon/autoload.php");
	use Carbon\Carbon;
	use Carbon\CarbonInterval;
	Carbon::setToStringFormat('Ymd');
	Carbon::setLocale('es');
	$fecha_actual=Carbon::now();
	$tabla_postulacion=new Postulacion();
	$tabla_viaje=new Viaje();
	include("header.php");
	$email=$_SESSION["usuario"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_id($email);


	$existen_postulaciones_aceptado=$tabla_postulacion->existe_aceptado($usuario['id_usuario']);
	?>
	<div class="container my-container">
		<div class="semitransparente rounded">
			<h1 class="text-center">Viajes Aceptados</h1>

			<?php
			if(!$existen_postulaciones_aceptado){
				include("advertencia_viajes_aceptados.php");
			}
			else{
				?>

				<div class="container my-container col-md-12">
					
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

					<!--******************************* ACEPTADOS A REALIZAR *********************************** -->

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
						$paginacion->paginacion_aceptado_realizar($pagina,$usuario['id_usuario']);
						$postulacion=$tabla_postulacion->get_postulaciones_aceptado_realizar($usuario['id_usuario'],$paginacion->get_inicio(),$paginacion->get_tamaño());
						$num=0;//TENGO QUE REMPLAZARLO
						if (count($postulacion)==0) {
							include("advertencia_aceptados_realizar.php");
						}
						else{
							include("listar_aceptados_realizar.php");
							$paginacion->mostrar($pagina); 

						}
						?>
					</div>

					<!--******************************* ACEPTADOS FINALIZADOS *********************************** -->

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
					$paginacion->paginacion_aceptado_finalizados($pagina_f,$usuario['id_usuario']);
					$postulacion=$tabla_postulacion->get_postulaciones_aceptado_finalizados($usuario['id_usuario'],$paginacion->get_inicio(),$paginacion->get_tamaño());
					$num=0;
					if (count($postulacion)==0){
						include("advertencia_aceptados_finalizados.php");
					}
					else{
						include("listar_aceptados_finalizados.php");
						$paginacion->mostrar_finalizados($pagina_f);
					}
					
					?>

				</div>
				<?php 
			}
			?>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/aceptados/mostrar_contacto.js"></script>
	<script src="js/mis_viajes/mostrar_info.js"></script>
	<script src="js/aceptados/calificacion.js"></script>
</body>
</html>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mi Perfil</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body class="fondo-usuario">
	<?php include("header.php"); ?>
	<div class="container my-container">
		<div class="semitransparente rounded">

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-sm-10 col-8">
						<h1 class="text-center">Mi Perfil</h1>
					</div>
					
					<div class="col-md-2 col-sm-2 col-4 text-right padding-top-8">
						<a class="btn btn-info " href="modificar_perfil.php"><i class="fas fa-pencil-alt"></i></a>
					</div>
				</div>
				
			</div>

			<?php
			$email=$_SESSION["usuario"];
			$tabla_usuario=new Usuario();
			$usuario=$tabla_usuario->get_datos($email);
			?>

			<div class="container my-container rounded perfil-container">

				<div>
					<h3><i class="far fa-address-book"></i>&nbsp;Nombre: <?php echo $usuario["nombre"] ?></h3>
					<br>
					<h3><i class="far fa-address-card"></i>&nbsp;Apellido: <?php echo $usuario["apellido"] ?></h3>
					<br>
					<h3><i class="fas fa-phone"></i>&nbsp;Telefono: <?php echo $usuario["telefono"] ?></h3>
					<br>
					<h3><i class="far fa-calendar-alt">&nbsp;</i>Fecha de Nacimiento: <?php echo $usuario["f_nacimiento"] ?></h3>
				</div>
			</div>

			<?php
			require_once("modelo/puntuacion.php");
			$tabla_puntuacion=new Puntuacion();
			$cant=$tabla_puntuacion->get_cantidad_puntuacion($usuario['id_usuario']);
			if($cant>0){
				$puntuaciones=$tabla_puntuacion->get_puntuaciones($usuario['id_usuario']);
				$promedio=$tabla_puntuacion->get_promedio($usuario['id_usuario']);
				echo "
				<div class='container my-container rounded perfil-container margin-top-20'>
				<h1>Calificación</h1>
				<div class='row'>

				<!-- CALIFICACION -->

				<div class='col-md-12 text-center'>
				<h1 class='font-promedio'><i class='fas fa-star icon-puntuacion'></i>
				$promedio
				</h1>
				</div>

				<!-- COMENTARIOS -->

				<div class='col-md-12 margin-top-20'>

				<div class='ventana-scroll-lateral'>
				
				<div class='scroll-lateral'>";

				foreach ($puntuaciones as $p) {

					$autor=$tabla_usuario->get_datos_id($p['id_usuarioCalificador']);
					echo "<div class='container container-comentario rounded'>";
					echo "<p class='font-comentario'>".$p['comentario']."</p>";
					echo "<div class='text-right padding-right-10'";
					echo "<span>Autor:<a href=''>&nbsp;".$autor['nombre']." ".$autor['apellido']."</a></span></div>";
					echo "</div>";
					
				}

				echo "
				<div class='container margin-bottom-10'>
				</div>
				</div>
				</div>

				</div>

				</div>

				</div>
				</div>";

			}
			?>


			
		</div>

	</div>

	<!--<?php include("footer.php");?>-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
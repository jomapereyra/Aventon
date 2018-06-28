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
	<?php 
	include("header.php");
	$id_usuario=$_GET["id"];
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_datos_id($id_usuario);
	?>
	<div class="container my-container">
		<div class="semitransparente rounded">

			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12">
						<h1 class="text-center"><?php echo $usuario['nombre'].' '.$usuario['apellido'];?></h1>
					</div>
				</div>
				
			</div>

			<div class="container my-container rounded perfil-container">

				<div>
					<h3><i class="far fa-address-book"></i>&nbsp;Nombre: <?php echo $usuario["nombre"] ?></h3>
					<br>
					<h3><i class="far fa-address-card"></i>&nbsp;Apellido: <?php echo $usuario["apellido"] ?></h3>
					<br>
					<h3><i class="far fa-calendar-alt">&nbsp;</i>Fecha de Nacimiento: <?php echo $usuario["f_nacimiento"] ?></h3>
				</div>
			</div>
		</div>

	</div>

	<!--<?php include("footer.php");?>-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
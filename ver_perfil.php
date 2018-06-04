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

				<!--


				<td><a class="btn btn-info btn-block" href="modificar_vehiculo.php?id=<?php echo $v['id_vehiculo']?> & patente=<?php echo $v['patente']?> & marca=<?php echo $v['marca']?> & modelo=<?php echo $v['modelo']?> & año=<?php echo $v['anio']?> & tipo=<?php echo $v['id_tipo_vehiculo']?> & cant=<?php echo $v['cant_asientos']?>">Modificar</a></td>

			-->


		</div>
	</div>

</div>

<!--<?php include("footer.php");?>-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
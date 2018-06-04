<html>
<head>
	<meta charset="utf-8">
	<title> index </title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
</head>
<body class="fondo-inicio">
	<header>
		<div class="container-fluid">

			<div class="row">

				<div class="col-md-6 col-sm-6 col-6"><!--col-md-2 -->
					<img class="logo-alternativo" src="img/logo-alternativo-aventon.png" alt="logo">
				</div>
				<div class="col-md-6 col-sm-6 col-6">
					<div class="text-right padding-top-10"><!--col-md-10 text-right padding-top-10 -->
						<a href="registrar.php" class="btn btn-primary">Registrarse</a>
					</div>	

				</div>



			</div>

		</div>
	</div>
</header>
<?php
session_start();
if(isset($_SESSION["usuario"])){
	header("location:pagina_principal.php");
}
?>
<div class="container my-container col-md-8">
	
	<form action="pagina_principal.php" class="form-horizontal semitransparente rounded" method="post" onSubmit="return comprobar_login();">
		<div class="form-group">
			<h2 class="text-center">Bienvenido a nuestro sitio!</h2>
			<h4 class="text-center">Inicie sesión para empezar a viajar</h4>	
		</div>
		<div class="form-group">
			<label for="nombre" class="control-label col-md-2">Email:</label>
			<div class="col-md-12">
				<input class="form-control" type="email" name="email" id="email" placeholder="Email">
				<div id="mensaje1" class="error"><i class="fas fa-times"></i>
				&nbsp;Debe ingresar un email</div>
			</div>
		</div>
		<div class="form-group">
			<label for="contraseña" class="control-label col-md-2"> Contraseña: </label>
			<div class="col-md-12">
				<input class="form-control" type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
				<div id="mensaje2" class="error"><i class="fas fa-times"></i>
				&nbsp;Debe ingresar una contraseña</div>
				<div id="mensaje3" class="error"><i class="fas fa-times"></i>
				&nbsp;El usuario y la contraseña no coinciden. Asegurese de ingresar bien sus datos</div>
			</div>
		</div>

		<div class="container col-md-8 text-center padding-top-10">
			<div class="form-group">
				<button type="button" id="boton_iniciar_sesion" class="btn btn-dark btn-block">Iniciar Sesión</button>
			</div>					
		</div>

	</form>

</div>
<!--<?php include("footer.php");?>-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/login/comprobar.js"></script>
</body>
</html>
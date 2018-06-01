<?php
session_start();
if(!isset($_SESSION["usuario"])){
	header("location:index.php");
}
?>
<header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-6">
				<img class="logo" src="img/logo-aventon.png" alt="">
			</div>				
		</div>
	</div>
</div>
</header>
<div class="">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">


			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="pagina_principal.php"><i class="fas fa-home"></i> Inicio<span class="sr-only">(current)</span></a>
				</li>
				<!--
				<li class="nav-item">
					<a class="nav-link disabled" href="#"><i class="fas fa-search"></i> Buscar</a>
				</li>
			-->
			<li class="nav-item">
				<a class="nav-link" href="crear_viaje.php"><i class="fab fa-avianex"></i> Crear Viaje</a>
			</li>
			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-suitcase"></i> Mis Viajes
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="mis_viajes_creados.php">Mis Viajes Creados</a>
					<!--
					<a class="dropdown-item" href="#">Mis Viajes Participados</a>
					-->
				</div>
			</li>
		
		<li class="nav-item">
			<a class="nav-link" href="mis_vehiculos.php"><i class="fas fa-taxi"></i> Mis Vehiculos</a>
		</li>
	</ul>

	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-circle icon-conexion"></i>&nbsp;
				<i class="fas fa-user"></i>
				&nbsp;<?php
				require_once("modelo/usuario.php");
				$tabla_usuario=new Usuario();
				$nom_ape=$tabla_usuario->get_nombre_apellido($_SESSION["usuario"]);
				echo $nom_ape['nombre'],' ',$nom_ape['apellido']; ?>

			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="ver_perfil.php">Ver Perfil</a>
				<a class="dropdown-item" href="controlador/cerrar_sesion.php">Cerrar Sesión</a>
			</div>
		</li>
	</ul>

</div>
</nav>

</div>

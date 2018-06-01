
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
	<?php include("header.php");
		
		require ("/modelo/miperfil.php");
		$viajes= new Miperfil();
		$nom_ape=$viajes->get_datos($_SESSION["usuario"]);
							
		
    ?>
    <div class="container-fluid">
    	<article class=" col-xs-12 col-xl-12 semitransparente border border-dark my-container">
    		<div class="container">
		    	<div class="row ">
		    		<h4>Datos del Usuario</h4><br>
		    		<p><h4><?php echo "Email:"  . " " . $nom_ape['email'] . " ";?></h4></p>
		    		<p><h4><?php echo "Apellido:"  . " " . $nom_ape['apellido'] . " ";?></h4></p>
					<p><h4><?php echo "Nombre:" ." ". $nom_ape['nombre']. " ";?> </h4></p>

		    		
		    	</div>
		    </div>
	    </article>
    	
    </div>




	<?php include("footer.php"); ?>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
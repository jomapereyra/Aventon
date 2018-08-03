<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	include("header.php");
	require_once("modelo/viaje.php");
	require_once("modelo/usuario.php");
	require_once("modelo/postulacion.php");
	require_once("modelo/preguntas.php");
	$id= $_POST['id'];
	$email=$_SESSION["usuario"];
	
	$tabla_usuario=new Usuario();
	$usuario=$tabla_usuario->get_id($email);
	
	$preguntado= new Preguntas();
	$pre= $preguntado->existe_preguntas($id);

	echo $_POST['id']; 
	echo $_POST['cont'];
	echo $usuario['id_usuario'];
	echo $_POST['id_u'];
	$a=$preguntado->crear_pregunta($id,$usuario['id_usuario'],$_POST['cont'],$_POST['id_u']);
	header("location:mostrar_info_viaje.php?id=$id");
?>
</body>
</html>
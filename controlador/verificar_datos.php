<?php 
require_once("../modelo/usuario.php");
$email=$_GET["email"];
$pregunta=$_GET["pregunta"];
$respuesta=$_GET["respuesta"];
$tabla_usuario=new Usuario();
$resultado=false;
if($tabla_usuario->existe($email)){
	$usuario=$tabla_usuario->get_datos($email);
	if ($usuario["pregunta"]==$pregunta && $usuario["respuesta"]==$respuesta) {
		$resultado=true;
	}
}
echo $resultado;

 ?>
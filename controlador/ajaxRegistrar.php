<?php 
require_once("../modelo/usuario.php");
$usuario_tabla=new Usuario();
$email=$_GET["email"];
$e=$usuario_tabla->existe($email);
if(!$e){
	require_once("../modelo/registro.php");
	$apellido=$_GET["apellido_usuario"];
	$nombre=$_GET["nombre_usuario"];
	$telefono=$_GET["telefono_usuario"];
	$fecha_nacimiento=$_GET["fecha_nacimiento"];
	$contraseña=$_GET["contraseña"];
	$pregunta=$_GET["pregunta"];
	$respuesta=$_GET["respuesta"];
	$administrador=0;
	$permisos=0;
	$registro= new Registro();
	$registro->crear($email,$nombre,$apellido,$administrador,$contraseña,$telefono,$fecha_nacimiento,$permisos,$pregunta,$respuesta);

}
echo "$e";
?>
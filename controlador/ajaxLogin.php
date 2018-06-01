<?php 
require_once("../modelo/usuario.php");
$usuario_tabla=new Usuario();
$email=$_GET["email"];
$contraseña=$_GET["contraseña"];
$e=$usuario_tabla->existe($email,$contraseña);
if($e){
	session_start();
	$_SESSION["usuario"]=$email;
}
echo "$e";
?>
<?php 
require_once("modelo/usuario.php");
$email=$_GET["email"];
$contraseña=$_GET["contraseña"];
$tabla_usuario=new Usuario();
$usuario=$tabla_usuario->get_id($email);
$tabla_usuario->modificar_contraseña($usuario["id_usuario"],$contraseña);
?>
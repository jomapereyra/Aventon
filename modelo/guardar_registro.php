<?php 
require_once("registro.php");
$email=$_POST["email_usuario"];
$apellido=$_POST["apellido_usuario"];
$nombre=$_POST["nombre_usuario"];
$telefono=$_POST["telefono_usuario"];
$fecha_nacimiento=$_POST["fecha_nacimiento"];
$contraseña=$_POST["contraseña"];
$administrados=0;
$registro= new Registro();
$registro->crear($email,$nombre,$apellido,$contraseña,$telefono,$fecha_nacimiento);
header("location:../index.php");
?>
<?php 
require_once("../modelo/vehiculo.php");
require_once("../modelo/usuario.php");
session_start();
$email=$_SESSION["usuario"];
$tabla_usuario=new Usuario();
$usuario=$tabla_usuario->get_id($email);
$tabla_vehiculo=new Vehiculo();
$patente=$_GET["patente"];
$marca=$_GET["marca_v"];
$modelo=$_GET["modelo"];
$año=$_GET["año"];
$tipo=$_GET["tipo"];
$cant=$_GET["cant"];
$condicion=$tabla_vehiculo->existe($patente,$usuario["id_usuario"]);
if(!$condicion){
	$tabla_vehiculo->crear($patente,$usuario["id_usuario"],$tipo,$marca,$modelo,$año,$cant);
}
echo $condicion;
?>
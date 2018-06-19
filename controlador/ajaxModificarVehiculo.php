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
$id_vehiculo=$_GET["id_v"];
$condicion=$tabla_vehiculo->existe_diferente($id_vehiculo,$patente,$usuario["id_usuario"]);
if(!$condicion){
	$tabla_vehiculo->modificar($patente,$id_vehiculo,$tipo,$marca,$modelo,$año,$cant);
}
echo $condicion;
?>
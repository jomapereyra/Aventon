<?php 
require_once("../modelo/vehiculo.php");
require_once("../modelo/usuario.php");
session_start();
$email=$_SESSION["usuario"];
$tabla_usuario=new Usuario();
$usuario=$tabla_usuario->get_id($email);
$patente=$_POST["patente"];
$marca=$_POST["marca"];
$modelo=$_POST["modelo"];
$año=$_POST["año"];
$tipo=$_POST["tipo_vehiculo"];
$cant=$_POST["asientos"];
$vehiculo=new Vehiculo();
$vehiculo->crear($patente,$usuario["id_usuario"],$tipo,$marca,$modelo,$año,$cant);
header("location:../mis_vehiculos.php");
?>
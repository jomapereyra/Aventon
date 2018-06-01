<?php 
require_once("../modelo/vehiculo.php");
$id_vehiculo=$_POST["id_vehiculo"];
$patente=$_POST["patente"];
$marca=$_POST["marca"];
$modelo=$_POST["modelo"];
$año=$_POST["año"];
$tipo=$_POST["tipo_vehiculo"];
$cant=$_POST["asientos"];
$vehiculo=new Vehiculo();
$vehiculo->modificar($patente,$id_vehiculo,$tipo,$marca,$modelo,$año,$cant);
header("location:../mis_vehiculos.php");
?>
<?php 
require_once("../modelo/vehiculo.php");
$patente=$_POST["patente"];
$marca=$_POST["marca"];
$modelo=$_POST["modelo"];
$año=$_POST["año"];
$tipo=$_POST["tipo_vehiculo"];
$cant=$_POST["asientos"];
$vehiculo=new Vehiculo();
$vehiculo->modificar($patente,1,$tipo,$marca,$modelo,$año,$cant);
header("location:../mis_vehiculos.php");
 ?>
<?php 
require_once("vehiculo.php");
$patente=$_POST["patente"];
$marca=$_POST["marca"];
$modelo=$_POST["modelo"];
$año=$_POST["año"];
$tipo=$_POST["tipo_vehiculo"];
$cant=$_POST["asientos"];
$vehiculo=new Vehiculo();
$vehiculo->crear($patente,1,$tipo,$marca,$modelo,$año,$cant);
header("location:../mis_vehiculos.php");
 ?>
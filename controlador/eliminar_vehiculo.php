<?php 
require_once("../modelo/vehiculo.php");
$id=$_GET["id"];
$vehiculo=new Vehiculo();
$vehiculo->eliminar($id);
header("location:../mis_vehiculos.php");
?>
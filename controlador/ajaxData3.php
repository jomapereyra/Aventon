<?php 
require_once("../modelo/vehiculo.php");
$tabla_vehiculo=new Vehiculo();
$id_vehiculo=$_GET["id_vehiculo"];
if($id_vehiculo != ""){
	$limite=$tabla_vehiculo->get_limite($id_vehiculo);
	echo "$limite";
}
?>
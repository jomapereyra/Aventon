<?php 
require_once("ciudad.php");
$tabla_ciudad=new Ciudad();
$provincia=$_GET["provincia_origen"];
if($provincia != ""){
	$ciudades=$tabla_ciudad->get_ciudades($provincia);
	foreach ($ciudades as $ciu) {
		echo "<option value='$ciu[id_localidad]'>$ciu[nombre_localidad]</option>";
	}
}
?>
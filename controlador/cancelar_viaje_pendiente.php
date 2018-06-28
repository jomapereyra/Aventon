<?php 
require_once("../modelo/postulacion.php");
$id_postulacion=$_GET["id"];
$tabla_postulacion=new Postulacion();
$tabla_postulacion->eliminar($id_postulacion);
header("location:../viajes_pendientes.php");
?>
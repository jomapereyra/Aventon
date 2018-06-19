<?php 
require_once("../modelo/postulacion.php");
$id_viaje=$_GET["id_viaje"];
$id_usuario=$_GET["id_usuario"];
$tabla_postulacion=new Postulacion();
$tabla_postulacion->eliminar($id_viaje,$id_usuario);
header("location:../viajes_pendientes.php");
?>
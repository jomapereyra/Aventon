<?php
require_once("../modelo/postulacion.php");
$id_viaje=$_GET["id_v"];
$id_usuario=$_GET["id_u"];
$tabla_postulacion=new Postulacion();
$tabla_postulacion->crear($id_viaje,$id_usuario); 
?>
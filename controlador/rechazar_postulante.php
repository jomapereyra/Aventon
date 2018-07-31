<?php 
require_once("../modelo/postulacion.php");
$tabla_postulacion=new Postulacion();
$id_postulacion=$_GET['id'];
$pagina=$_GET['pag'];
$postulacion=$tabla_postulacion->get_datos($id_postulacion);
$tabla_postulacion->rechazar($id_postulacion);
header("location:../mis_viajes_creados.php?pagina=$pagina");
?>
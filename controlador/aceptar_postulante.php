<?php 
require_once("../modelo/postulacion.php");
require_once("../modelo/viaje.php");
$tabla_postulacion=new Postulacion();
$id_postulacion=$_GET['id'];
$pagina=$_GET['pag'];
$tabla_postulacion->aceptar($id_postulacion);
$postulacion=$tabla_postulacion->get_datos($id_postulacion);
$tabla_viaje=new Viaje();
$viaje=$tabla_viaje->get_datos($postulacion['id_viaje']);
$id_viaje=$postulacion['id_viaje'];
$asientos_libres=$viaje['asientos_disponibles'] - $postulacion['cantidad_asientos'];
$tabla_viaje->asientos($asientos_libres,$id_viaje);
header("location:../mis_viajes_creados.php?pagina=$pagina");
?>
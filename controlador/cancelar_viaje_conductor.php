<?php 
require_once("../modelo/postulacion.php");
require_once("../modelo/puntuacion.php");
require_once("../modelo/viaje.php");
$id_viaje=$_GET["id_viaje"];
$pagina=$_GET["pag"];
$tabla_postulacion=new Postulacion();
$existe=$tabla_postulacion->existe_pasajero($id_viaje);
$tabla_viaje=new Viaje();
$viaje=$tabla_viaje->get_datos($id_viaje);
if($existe){
	$valor=1;
	$comentario="Calificacion generada por Aventon debido a la cancelacion inesperada de un viaje.";
	$tabla_puntuacion=new Puntuacion();
	$tabla_puntuacion->crear($valor,$comentario,$viaje['id_usuario'],$viaje['id_usuario'],$viaje['id_viaje']);
	/*$pasajeros=$tabla_postulacion->get_postulaciones_pasajeros($id_viaje);
	foreach ($pasajeros as $p) {
		$tabla_postulacion->eliminar($p['id_postulacion']);
	}*/
}
$tabla_viaje->eliminar($id_viaje);
header("location:../mis_viajes_creados.php?pagina=$pagina");
?>
<?php 
require_once("../modelo/postulacion.php");
require_once("../modelo/puntuacion.php");
require_once("../modelo/viaje.php");
$id_postulacion=$_GET["id"];
$valor=1;
$comentario="Calificacion generada por Aventon debido a la cancelacion inesperada de un viaje.";
$tabla_puntuacion=new Puntuacion();
$tabla_postulacion=new Postulacion();
$tabla_viaje=new Viaje();
$postulacion=$tabla_postulacion->get_datos($id_postulacion);
$viaje=$tabla_viaje->get_datos($postulacion['id_viaje']);
$tabla_puntuacion->crear($valor,$comentario,$postulacion['id_usuario'],$viaje['id_usuario']);
$tabla_postulacion->eliminar($id_postulacion);
header("location:../viajes_aceptados.php");
?>
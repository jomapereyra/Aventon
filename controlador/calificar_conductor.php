<?php
require_once("../modelo/viaje.php");
require_once("../modelo/puntuacion.php");
$valor=$_GET['valor'];
$comentario=$_GET['comentario'];
$id_viaje=$_GET['id_viaje'];
$calificador=$_GET['calificador'];
$tabla_viaje=new Viaje();
$viaje=$tabla_viaje->get_datos($id_viaje);
$tabla_puntuacion=new Puntuacion();
$tabla_puntuacion->crear($valor,$comentario,$viaje['id_usuario'],$calificador,$id_viaje);
 ?>
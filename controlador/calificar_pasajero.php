<?php
require_once("../modelo/postulacion.php");
require_once("../modelo/puntuacion.php");
$valor=$_GET['valor'];
$comentario=$_GET['comentario'];
$id_postulacion=$_GET['id_postu'];
$calificador=$_GET['calificador'];
$tabla_postulacion=new Postulacion();
$postulacion=$tabla_postulacion->get_datos($id_postulacion);
$tabla_puntuacion=new Puntuacion();
$tabla_puntuacion->crear($valor,$comentario,$postulacion['id_usuario'],$calificador,$postulacion['id_viaje']);
 ?>
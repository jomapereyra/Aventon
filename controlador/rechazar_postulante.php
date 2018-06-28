<?php 
require_once("../modelo/postulacion.php");
$tabla_postulacion=new Postulacion();
$id_postulacion=$_GET['id'];
$tabla_postulacion->rechazar($id_postulacion);
$id_viaje=$tabla_postulacion->get_id_viaje($id_postulacion);
header("location:../ver_postulantes.php?id=$id_viaje");
?>
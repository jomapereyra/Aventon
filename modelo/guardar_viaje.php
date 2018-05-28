<?php
require_once("viaje.php");
require_once("ubicacion.php");
$descripcion=$_POST["descripcion"];
$costo=$_POST["costo"];
$fecha_p=$_POST["fecha_partida"];
$fecha_l=$_POST["fecha_llegada"];
$hora_p=$_POST["hora_partida"];
$hora_l=$_POST["hora_llegada"];
$provincia_o=$_POST["provincia_origen"];
$provincia_d=$_POST["provincia_destino"];
$ciudad_o=$_POST["ciudad_origen"];
$ciudad_d=$_POST["ciudad_destino"];
$calle_o=$_POST["calle_origen"];
$calle_d=$_POST["calle_destino"];
$numero_o=$_POST["numero_origen"];
$numero_d=$_POST["numero_destino"];
$ubicacion_o=new Ubicacion();
$ubicacion_o->crear($calle_o,$numero_o,$provincia_o,$ciudad_o);
$id_ubicacion_o=$ubicacion_o->ultimo_id();
$ubicacion_d=new Ubicacion();
$ubicacion_d->crear($calle_d,$numero_d,$provincia_d,$ciudad_d);
$id_ubicacion_d=$ubicacion_d->ultimo_id();
$viaje=new Viaje();
$viaje->crear($descripcion,$fecha_p,$fecha_l,$hora_p,$hora_l,$id_ubicacion_o,$id_ubicacion_d,$costo);
header("location:../pagina_principal.php");

?>
<?php
require_once("../modelo/viaje.php");
require_once("../modelo/ubicacion.php");
require_once("../modelo/usuario.php");
require("../modelo/Carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;
Carbon::setToStringFormat('Y-m-d');
Carbon::setLocale('es');
session_start();
$email=$_SESSION["usuario"];
$tabla_usuario=new Usuario();
$usuario=$tabla_usuario->get_id($email);
$descripcion=$_GET["descripcion"];
$costo=$_GET["costo_impuesto"];
$provincia_o=$_GET["provincia_origen"];
$provincia_d=$_GET["provincia_destino"];
$ciudad_o=$_GET["ciudad_origen"];
$ciudad_d=$_GET["ciudad_destino"];
$calle_o=$_GET["calle_origen"];
$calle_d=$_GET["calle_destino"];
$numero_o=$_GET["numero_origen"];
$numero_d=$_GET["numero_destino"];
$id_vehiculo=$_GET["vehiculo"];
$asientos=$_GET["asientos"];
$tabla_ubicacion=new Ubicacion();
$existe_ubicacion_o=$tabla_ubicacion->existe($calle_o,$numero_o,$provincia_o,$ciudad_o);
if(!$existe_ubicacion_o){
	$tabla_ubicacion->crear($calle_o,$numero_o,$provincia_o,$ciudad_o);
}
$existe_ubicacion_d=$tabla_ubicacion->existe($calle_d,$numero_d,$provincia_d,$ciudad_d);
if(!$existe_ubicacion_d){
	$tabla_ubicacion->crear($calle_d,$numero_d,$provincia_d,$ciudad_d);
}

$id_ubicacion_o=$tabla_ubicacion->get_id($calle_o,$numero_o,$provincia_o,$ciudad_o);
$id_ubicacion_d=$tabla_ubicacion->get_id($calle_d,$numero_d,$provincia_d,$ciudad_d);
$fecha_p=$_GET["fecha_partida"];
$fecha_l=$_GET["fecha_llegada"];
$hora_p=$_GET["hora_partida"];
$hora_l=$_GET["hora_llegada"];
$tabla_viaje=new Viaje();
$tipo=$_GET["frecuencia"];
$string_semanal=$_GET["arreglo_semanal"];
$arreglo_semanal=explode(",",$string_semanal);
$partida=explode("-", $fecha_p);
$llegada=explode("-", $fecha_l);
$fecha_partida=Carbon::createFromDate($partida[0],$partida[1],$partida[2]);
$fecha_llegada=Carbon::createFromDate($llegada[0],$llegada[1],$llegada[2]);
$fecha=Carbon::createFromDate($partida[0],$partida[1],$partida[2]);
$fecha_maxima=$fecha->addYears(2);
$dia_inicio=$fecha_partida->dayOfWeek;
$actual=array_search($dia_inicio, $arreglo_semanal);
$tamaño_arreglo=count($arreglo_semanal);
$cant_dias=0;

while($fecha_partida->lte($fecha_maxima)){
	for ($i=$actual; $i < $tamaño_arreglo; $i++) {
		$fecha_partida->addDays($cant_dias);
		$fecha_llegada->addDays($cant_dias);
		if($fecha_partida->lte($fecha_maxima)){
			$tabla_viaje->crear($usuario["id_usuario"],$id_vehiculo,$descripcion,$asientos,$fecha_partida,$fecha_llegada,$hora_p,$hora_l,$id_ubicacion_o,$id_ubicacion_d,$costo,$tipo);
			if ($i<$tamaño_arreglo-1) {
				$siguiente=$i+1;
				$cant_dias=$arreglo_semanal[$siguiente]-$arreglo_semanal[$i];
			}
		}
	}
	$actual=0;
	$cant_dias=(7 - $arreglo_semanal[$tamaño_arreglo-1])+$arreglo_semanal[$actual];
}

?>

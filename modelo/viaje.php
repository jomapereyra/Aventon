<?php
class Viaje{
	private $db;//conexion
	private $viajes;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->viajes=array();
	}

	public function crear($id_usuario,$id_vehiculo,$descripcion,$asientos,$fecha_p,$fecha_l,$hora_p,$hora_l,$id_o,$id_d,$cos,$tipo){
		$resultado=$this->db->prepare("INSERT INTO viaje(id_usuario,id_vehiculo,descripcion,asientos_disponibles,fecha_salida,fecha_llegada,hora_salida,hora_llegada,costo,tipo,id_destino,id_origen) VALUES (:id_u,:id_v,:descri,:a,:fp,:fl,:hp,:hl,:co,:ti,:ud,:uo)");
		$resultado->execute(array(":id_u"=>$id_usuario,":id_v"=>$id_vehiculo,':descri'=>$descripcion,':a'=>$asientos,':fp'=>$fecha_p,':fl'=>$fecha_l,':hp'=>$hora_p,':hl'=>$hora_l,':co'=>$cos,':ti'=>$tipo,':ud'=>$id_d,':uo'=>$id_o));
	}

	public function eliminar($id_viaje){
		$this->db->query("DELETE FROM viaje WHERE viaje.id_viaje=$id_viaje");
	} 

	public function ultimo_id(){
		$consulta=$this->db->query("SELECT MAX(id_viaje) as valor FROM viaje");
		$viaje=$consulta->fetch(PDO::FETCH_ASSOC);
		return $viaje['valor'];
	}

	public function hay_viaje($usuario){
		$registro=$this->db->query("SELECT * FROM viaje WHERE viaje.id_usuario<>$usuario AND viaje.asientos_disponibles > 0 AND viaje.estado = 0")->rowCount();
		return $registro > 0;
	}

	public function existen_creados($id_usuario){
		$registro=$this->db->query("SELECT * FROM viaje WHERE viaje.id_usuario=$id_usuario")->rowCount();
		return $registro > 0;
	}

	public function get_viajes($inicio,$tamaño_paginas,$id_usuario){
		$casual=array();
		$consulta=$this->db->query("SELECT tabla1.id_viaje,tabla1.tipo,tabla1.fecha_salida,tabla1.fecha_llegada,tabla1.asientos_disponibles,tabla1.id_usuario,pro1.nombre_provincia AS provincia_origen,ciu1.nombre_localidad AS ciudad_origen,pro2.nombre_provincia AS provincia_destino,ciu2.nombre_localidad AS ciudad_destino FROM viaje AS tabla1 INNER JOIN ubicacion AS origen ON(tabla1.id_origen=origen.id_ubicacion)INNER JOIN provincia AS pro1 ON(origen.id_provincia=pro1.id_provincia)INNER JOIN localidad AS ciu1 ON(origen.id_ciudad=ciu1.id_localidad)INNER JOIN ubicacion AS destino ON(tabla1.id_destino=destino.id_ubicacion)INNER JOIN provincia AS pro2 ON(destino.id_provincia=pro2.id_provincia)INNER JOIN localidad AS ciu2 ON(destino.id_ciudad=ciu2.id_localidad) WHERE tabla1.asientos_disponibles > 0 AND tabla1.id_usuario<>$id_usuario AND tabla1.estado=0 ORDER BY fecha_salida LIMIT $inicio,$tamaño_paginas");
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$casual[]=$fila;
		} 
		return $casual;
	}

	public function buscar($inicio,$tamaño_paginas,$cadena,$id_usuario){
		$resultado=array();
		$consulta=$this->db->query("SELECT tabla1.id_viaje,tabla1.tipo,tabla1.fecha_salida,tabla1.fecha_llegada,tabla1.asientos_disponibles,pro1.id_provincia AS id_provincia_partida,pro1.nombre_provincia AS provincia_origen,ciu1.id_localidad AS id_ciudad_partida,ciu1.nombre_localidad AS ciudad_origen,pro2.id_provincia AS id_provincia_llegada,pro2.nombre_provincia AS provincia_destino,ciu2.id_localidad AS id_ciudad_llegada,ciu2.nombre_localidad AS ciudad_destino FROM viaje AS tabla1 INNER JOIN ubicacion AS origen ON(tabla1.id_origen=origen.id_ubicacion)INNER JOIN provincia AS pro1 ON(origen.id_provincia=pro1.id_provincia)INNER JOIN localidad AS ciu1 ON(origen.id_ciudad=ciu1.id_localidad)INNER JOIN ubicacion AS destino ON(tabla1.id_destino=destino.id_ubicacion)INNER JOIN provincia AS pro2 ON(destino.id_provincia=pro2.id_provincia)INNER JOIN localidad AS ciu2 ON(destino.id_ciudad=ciu2.id_localidad) WHERE ".$cadena." AND tabla1.id_usuario<>$id_usuario ORDER BY fecha_salida LIMIT $inicio,$tamaño_paginas");

		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$resultado[]=$fila;
		} 
		return $resultado;
	}

	public function get_filas_buscar($cadena,$id_usuario){
		$consulta=$this->db->query("SELECT tabla1.id_viaje,tabla1.tipo,tabla1.fecha_salida,tabla1.fecha_llegada,pro1.id_provincia AS id_provincia_partida,pro1.nombre_provincia AS provincia_origen,ciu1.id_localidad AS id_ciudad_partida,ciu1.nombre_localidad AS ciudad_origen,pro2.id_provincia AS id_provincia_llegada,pro2.nombre_provincia AS provincia_destino,ciu2.id_localidad AS id_ciudad_llegada,ciu2.nombre_localidad AS ciudad_destino FROM viaje AS tabla1 INNER JOIN ubicacion AS origen ON(tabla1.id_origen=origen.id_ubicacion)INNER JOIN provincia AS pro1 ON(origen.id_provincia=pro1.id_provincia)INNER JOIN localidad AS ciu1 ON(origen.id_ciudad=ciu1.id_localidad)INNER JOIN ubicacion AS destino ON(tabla1.id_destino=destino.id_ubicacion)INNER JOIN provincia AS pro2 ON(destino.id_provincia=pro2.id_provincia)INNER JOIN localidad AS ciu2 ON(destino.id_ciudad=ciu2.id_localidad) WHERE ".$cadena." AND tabla1.id_usuario<>$id_usuario");
		return $consulta->rowCount();
	}

	public function get_viajes_creados_realizar($id_usuario,$inicio,$tamaño_paginas){
		$casual=array();
		$consulta=$this->db->query("SELECT tabla1.id_viaje,tabla1.tipo,tabla1.fecha_salida,tabla1.fecha_llegada,pro1.nombre_provincia AS provincia_origen,ciu1.nombre_localidad AS ciudad_origen,pro2.nombre_provincia AS provincia_destino,ciu2.nombre_localidad AS ciudad_destino FROM viaje AS tabla1 INNER JOIN ubicacion AS origen ON(tabla1.id_origen=origen.id_ubicacion)INNER JOIN provincia AS pro1 ON(origen.id_provincia=pro1.id_provincia)INNER JOIN localidad AS ciu1 ON(origen.id_ciudad=ciu1.id_localidad)INNER JOIN ubicacion AS destino ON(tabla1.id_destino=destino.id_ubicacion)INNER JOIN provincia AS pro2 ON(destino.id_provincia=pro2.id_provincia)INNER JOIN localidad AS ciu2 ON(destino.id_ciudad=ciu2.id_localidad) WHERE tabla1.id_usuario=$id_usuario AND tabla1.estado=0 ORDER BY fecha_salida LIMIT $inicio,$tamaño_paginas");
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$casual[]=$fila;
		} 
		return $casual;
	}

	public function get_viajes_creados_finalizados($id_usuario,$inicio,$tamaño_paginas){
		$casual=array();
		$consulta=$this->db->query("SELECT tabla1.id_viaje,tabla1.tipo,tabla1.fecha_salida,tabla1.fecha_llegada,pro1.nombre_provincia AS provincia_origen,ciu1.nombre_localidad AS ciudad_origen,pro2.nombre_provincia AS provincia_destino,ciu2.nombre_localidad AS ciudad_destino FROM viaje AS tabla1 INNER JOIN ubicacion AS origen ON(tabla1.id_origen=origen.id_ubicacion)INNER JOIN provincia AS pro1 ON(origen.id_provincia=pro1.id_provincia)INNER JOIN localidad AS ciu1 ON(origen.id_ciudad=ciu1.id_localidad)INNER JOIN ubicacion AS destino ON(tabla1.id_destino=destino.id_ubicacion)INNER JOIN provincia AS pro2 ON(destino.id_provincia=pro2.id_provincia)INNER JOIN localidad AS ciu2 ON(destino.id_ciudad=ciu2.id_localidad) WHERE tabla1.id_usuario=$id_usuario AND tabla1.estado=1 ORDER BY fecha_salida LIMIT $inicio,$tamaño_paginas");
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$casual[]=$fila;
		} 
		return $casual;
	}

	public function get_filas($id_usuario){
		$consulta=$this->db->query("SELECT tabla1.id_viaje,tabla1.tipo,tabla1.fecha_salida,tabla1.fecha_llegada,tabla1.asientos_disponibles,tabla1.id_usuario,pro1.nombre_provincia AS provincia_origen,ciu1.nombre_localidad AS ciudad_origen,pro2.nombre_provincia AS provincia_destino,ciu2.nombre_localidad AS ciudad_destino FROM viaje AS tabla1 INNER JOIN ubicacion AS origen ON(tabla1.id_origen=origen.id_ubicacion)INNER JOIN provincia AS pro1 ON(origen.id_provincia=pro1.id_provincia)INNER JOIN localidad AS ciu1 ON(origen.id_ciudad=ciu1.id_localidad)INNER JOIN ubicacion AS destino ON(tabla1.id_destino=destino.id_ubicacion)INNER JOIN provincia AS pro2 ON(destino.id_provincia=pro2.id_provincia)INNER JOIN localidad AS ciu2 ON(destino.id_ciudad=ciu2.id_localidad) WHERE tabla1.asientos_disponibles > 0 AND tabla1.id_usuario<>$id_usuario");
		return $consulta->rowCount();
	}

	public function get_filas_creados_realizar($id_usuario){
		$consulta=$this->db->query("SELECT * FROM viaje WHERE viaje.id_usuario=$id_usuario AND viaje.estado=0");
		return $consulta->rowCount();
	}

	public function get_filas_creados_finalizados($id_usuario){
		$consulta=$this->db->query("SELECT * FROM viaje INNER JOIN postulacion ON(viaje.id_viaje=postulacion.id_viaje) WHERE viaje.id_usuario=$id_usuario AND viaje.estado=1 AND postulacion.estado='aceptado'");
		return $consulta->rowCount();
	}

	public function get_datos($id){
		$consulta=$this->db->query("SELECT tabla1.id_viaje,tabla1.id_usuario,tabla1.descripcion,tabla1.tipo,tabla1.hora_salida,tabla1.hora_llegada,tabla1.fecha_salida,tabla1.fecha_llegada,tabla1.costo,tabla1.asientos_disponibles,pro1.nombre_provincia AS provincia_origen,ciu1.nombre_localidad AS ciudad_origen,pro2.nombre_provincia AS provincia_destino,ciu2.nombre_localidad AS ciudad_destino,origen.calle AS calle_origen,origen.numero AS numero_origen,destino.calle AS calle_destino,destino.numero AS numero_destino FROM viaje AS tabla1 INNER JOIN ubicacion AS origen ON(tabla1.id_origen=origen.id_ubicacion)INNER JOIN provincia AS pro1 ON(origen.id_provincia=pro1.id_provincia)INNER JOIN localidad AS ciu1 ON(origen.id_ciudad=ciu1.id_localidad)INNER JOIN ubicacion AS destino ON(tabla1.id_destino=destino.id_ubicacion)INNER JOIN provincia AS pro2 ON(destino.id_provincia=pro2.id_provincia)INNER JOIN localidad AS ciu2 ON(destino.id_ciudad=ciu2.id_localidad)WHERE tabla1.id_viaje=$id");
		return $consulta->fetch(PDO::FETCH_ASSOC);

	}

	public function asientos($asientos,$id_viaje){
		$consulta=$this->db->query("UPDATE viaje SET asientos_disponibles=$asientos WHERE viaje.id_viaje=$id_viaje");
	}

	public function actualizar_historial($fecha_actual,$id_usuario){
		$consulta=$this->db->query("UPDATE viaje SET estado=1 WHERE viaje.fecha_llegada<$fecha_actual AND viaje.id_usuario=$id_usuario");
	}
	public function soy_creador1($id_v, $id_u){
		$registro=$this->db->query("SELECT * FROM viaje WHERE viaje.id_viaje= $id_v AND viaje.id_usuario=$id_u")->rowCount();
		return $registro > 0;
	}

}
?>
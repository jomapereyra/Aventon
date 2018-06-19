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
		$resultado->execute(array(":id_u"=>$id_usuario,"id_v"=>$id_vehiculo,':descri'=>$descripcion,':a'=>$asientos,':fp'=>$fecha_p,':fl'=>$fecha_l,':hp'=>$hora_p,':hl'=>$hora_l,':co'=>$cos,':ti'=>$tipo,':ud'=>$id_d,':uo'=>$id_o));
	}

	public function ultimo_id(){
		$consulta=$this->db->query("SELECT MAX(id_viaje) as valor FROM viaje");
		$viaje=$consulta->fetch(PDO::FETCH_ASSOC);
		return $viaje['valor'];
	}

	public function hay_viaje(){
		$registro=$this->db->query("SELECT * FROM viaje")->rowCount();
		return $registro > 0;
	}

	public function get_viajes_casual(){
		$casual=array();
		$consulta=$this->db->query("SELECT tabla1.id_viaje,tabla1.tipo,tabla1.fecha_salida,tabla1.fecha_llegada,pro1.nombre_provincia AS provincia_origen,ciu1.nombre_localidad AS ciudad_origen,pro2.nombre_provincia AS provincia_destino,ciu2.nombre_localidad AS ciudad_destino FROM viaje AS tabla1 INNER JOIN ubicacion AS origen ON(tabla1.id_origen=origen.id_ubicacion)INNER JOIN provincia AS pro1 ON(origen.id_provincia=pro1.id_provincia)INNER JOIN localidad AS ciu1 ON(origen.id_ciudad=ciu1.id_localidad)INNER JOIN ubicacion AS destino ON(tabla1.id_destino=destino.id_ubicacion)INNER JOIN provincia AS pro2 ON(destino.id_provincia=pro2.id_provincia)INNER JOIN localidad AS ciu2 ON(destino.id_ciudad=ciu2.id_localidad)WHERE tabla1.tipo='casual' ORDER BY fecha_salida");
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$casual[]=$fila;
		} 
		return $casual;
	}

	public function get_viajes_semanal(){
		$semanal=array();
		$consulta=$this->db->query("SELECT tabla1.id_viaje,tabla1.tipo,fre.dia_partida,fre.dia_llegada,pro1.nombre_provincia AS provincia_origen,ciu1.nombre_localidad AS ciudad_origen,pro2.nombre_provincia AS provincia_destino,ciu2.nombre_localidad AS ciudad_destino FROM viaje AS tabla1 INNER JOIN ubicacion AS origen ON(tabla1.id_origen=origen.id_ubicacion)INNER JOIN provincia AS pro1 ON(origen.id_provincia=pro1.id_provincia)INNER JOIN localidad AS ciu1 ON(origen.id_ciudad=ciu1.id_localidad)INNER JOIN ubicacion AS destino ON(tabla1.id_destino=destino.id_ubicacion)INNER JOIN provincia AS pro2 ON(destino.id_provincia=pro2.id_provincia)INNER JOIN localidad AS ciu2 ON(destino.id_ciudad=ciu2.id_localidad)INNER JOIN frecuencia_semanal AS fre ON(tabla1.id_viaje=fre.id_viaje)WHERE tabla1.tipo='semanal' ORDER BY dia_partida");
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$semanal[]=$fila;
		} 
		return $semanal;
	}

	public function get_datos($id){
		$consulta=$this->db->query("SELECT tabla1.id_viaje,tabla1.id_usuario,tabla1.descripcion,tabla1.tipo,tabla1.hora_salida,tabla1.hora_llegada,tabla1.fecha_salida,tabla1.fecha_llegada,tabla1.costo,pro1.nombre_provincia AS provincia_origen,ciu1.nombre_localidad AS ciudad_origen,pro2.nombre_provincia AS provincia_destino,ciu2.nombre_localidad AS ciudad_destino,origen.calle AS calle_origen,origen.numero AS numero_origen,destino.calle AS calle_destino,destino.numero AS numero_destino FROM viaje AS tabla1 INNER JOIN ubicacion AS origen ON(tabla1.id_origen=origen.id_ubicacion)INNER JOIN provincia AS pro1 ON(origen.id_provincia=pro1.id_provincia)INNER JOIN localidad AS ciu1 ON(origen.id_ciudad=ciu1.id_localidad)INNER JOIN ubicacion AS destino ON(tabla1.id_destino=destino.id_ubicacion)INNER JOIN provincia AS pro2 ON(destino.id_provincia=pro2.id_provincia)INNER JOIN localidad AS ciu2 ON(destino.id_ciudad=ciu2.id_localidad)WHERE tabla1.id_viaje=$id");
		return $consulta->fetch(PDO::FETCH_ASSOC);

	}

}
?>
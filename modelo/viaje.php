<?php
class Viaje{
	private $db;//conexion
	private $viajes;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->viajes=array();
	}

	public function crear($descripcion,$fecha_p,$fecha_l,$hora_p,$hora_l,$id_o,$id_d){
		$resultado=$this->db->preparar_consulta("INSERT INTO viaje(descripcion,fecha_salida,fecha_llegada,hora_salida,hora_llegada,costo,id_destino,id_origen) VALUES (:descri,:fp,:fl,:hp,:hl,45,:ud,:uo)");
		$resultado->execute(array(':descri'=>$descripcion,':fp'=>$fecha_p,':fl'=>$fecha_l,':hp'=>$hora_p,':hl'=>$hora_l,':ud'=>$id_d,':uo'=>$id_o));
	}
}
?>
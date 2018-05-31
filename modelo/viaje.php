<?php
class Viaje{
	private $db;//conexion
	private $viajes;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->viajes=array();
	}

	public function crear($id_usuario,$descripcion,$asientos,$fecha_p,$fecha_l,$hora_p,$hora_l,$id_o,$id_d,$cos){
		$resultado=$this->db->prepare("INSERT INTO viaje(id_usuario,descripcion,asientos_disponibles,fecha_salida,fecha_llegada,hora_salida,hora_llegada,costo,id_destino,id_origen) VALUES (:id,:descri,:a,:fp,:fl,:hp,:hl,:co,:ud,:uo)");
		$resultado->execute(array(":id"=>$id_usuario,':descri'=>$descripcion,':a'=>$asientos,':fp'=>$fecha_p,':fl'=>$fecha_l,':hp'=>$hora_p,':hl'=>$hora_l,':co'=>$cos,':ud'=>$id_d,':uo'=>$id_o));
	}
}
?>
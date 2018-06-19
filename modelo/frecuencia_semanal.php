<?php
class FrecuenciaSemanal{
	private $db;//conexion
	private $frecuencias;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->frecuencias=array();
	}

	public function crear($dia_p,$hora_p,$dia_l,$hora_l,$id_viaje){
		$resultado=$this->db->prepare("INSERT INTO frecuencia_semanal(dia_partida,hora_partida,dia_llegada,hora_llegada,id_viaje) VALUES (:dp,:hp,:dl,:hl,:id)");
		$resultado->execute(array(':dp'=>$dia_p,':hp'=>$hora_p,':dl'=>$dia_l,':hl'=>$hora_l,':id'=>$id_viaje));
	}
}
?>
<?php
class TipoVehiculo{
	private $db;//conexion
	private $tipos;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->tipos=array();
	}

	public function get_tipos(){
		$consulta=$this->db->query("SELECT * FROM tipo_vehiculo");
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$this->tipos[]=$fila;
		}
		return $this->tipos;
	}
}
?>
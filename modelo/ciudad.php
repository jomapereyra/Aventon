<?php
class Ciudad{
	private $db;//conexion
	private $ciudades;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->ciudades=array();
	}

	public function get_ciudades($id_provincia){
		$consulta=$this->db->query("SELECT * FROM localidad WHERE localidad.id_provincia=$id_provincia");
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$this->ciudades[]=$fila;
		}
		return $this->ciudades;
	}
}
?>
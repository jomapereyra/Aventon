<?php
class Provincia{
	private $db;//conexion
	private $provincias;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->provincias=array();


	}

	public function get_provincias(){
		$consulta=$this->db->query("SELECT * FROM provincia");
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$this->provincias[]=$fila;
		}
		return $this->provincias;
	}
}
?>
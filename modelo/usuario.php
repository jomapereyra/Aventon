<?php
class Usuario{
	private $db;//conexion
	private $usuarios;
	private $via;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->usuarios=array();
	}

	public function existe($email,$pass){
		$registro=$this->db->query("SELECT * FROM usuario WHERE usuario.email='".$email."'". "AND usuario.contrasenia='".$pass."'")->rowCount();
		return $registro > 0;
	}

	public function get_nombre_apellido($email){
		$datos=array();
		$consulta=$this->db->query("SELECT nombre,apellido FROM usuario WHERE usuario.email='".$email."'");
		$datos=$consulta->fetch(PDO::FETCH_ASSOC);
		return $datos;
	}

	public function get_id($email){
		$datos=array();
		$consulta=$this->db->query("SELECT id_usuario FROM usuario WHERE usuario.email='".$email."'");
		$datos=$consulta->fetch(PDO::FETCH_ASSOC);
		return $datos;
	}

	public function get_datos($email){
		$datos=array();
		$consulta=$this->db->query("SELECT * FROM usuario WHERE usuario.email='".$email."'");
		$datos=$consulta->fetch(PDO::FETCH_ASSOC);
		return $datos;
	}

	public function get_viajes_creados($email){
		$datos=array();
		$consulta=$this->db->query("SELECT * FROM usuario INNER JOIN  viaje ON (usuario.id_usuario = viaje.id_usuario) WHERE usuario.email='".$email."'");
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
				$this->via[]=$fila;
		} 
		return $this->via;
		
	}
}
?>
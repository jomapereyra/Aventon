<?php
class Usuario{
	private $db;//conexion
	private $usuarios;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->usuarios=array();
	}

	public function coincide($email,$pass){
		$registro=$this->db->query("SELECT * FROM usuario WHERE usuario.email='".$email."'". "AND usuario.contrasenia='".$pass."'")->rowCount();
		return $registro > 0;
	}

	public function existe($email){
		$registro=$this->db->query("SELECT * FROM usuario WHERE usuario.email='".$email."'")->rowCount();
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

	public function get_datos_id($id){
		$datos=array();
		$consulta=$this->db->query("SELECT * FROM usuario WHERE usuario.id_usuario='".$id."'");
		$datos=$consulta->fetch(PDO::FETCH_ASSOC);
		return $datos;
	}

	public function modificar($id_usuario,$nombre,$apellido,$contraseña,$telefono,$fecha_nacimiento){
		$resultado=$this->db->prepare("UPDATE usuario SET nombre=:nom,apellido=:ape,contrasenia=:pass,telefono=:tel,f_nacimiento=:fn WHERE usuario.id_usuario=$id_usuario");
		$resultado->execute(array(':nom'=>$nombre,':ape'=>$apellido,':pass'=>$contraseña,':tel'=>$telefono,':fn'=>$fecha_nacimiento));
	}

	public function modificar_contraseña($id_usuario,$contraseña){
		$resultado=$this->db->prepare("UPDATE usuario SET contrasenia=:con WHERE usuario.id_usuario=$id_usuario");
		$resultado->execute(array(':con'=>$contraseña));
	}

	
}
?>
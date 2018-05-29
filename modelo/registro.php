<?php 

class Registro{
	private $db;//conexion
	private $registro;
	public function __construct()	{
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->registro= array();
	}
	public function crear($email,$nombre,$apellido,$contraseña,$telefono_usuario,$fecha_nacimiento){
		$resultado=$this->db->prepare("INSERT INTO usuario(email,nombre,apellido,contraseña,telefono_usuario,fecha_nacimiento) VALUES(:email,:nom,:ape,:con,:tel,:fn)");
		$resultado->execute(array(':email'=>$email,':nom'=>$nombre,':ape'=>$apellido,':con'=>$contraseña,':tel'=>$telefono_usuario,':fn'=>$fecha_nacimiento));
	}
}
?>
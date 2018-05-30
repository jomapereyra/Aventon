<?php 

class Registro{
	private $db;//conexion
	private $registro;
	public function __construct()	{
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->registro= array();
	}
	public function crear($email,$nombre,$apellido,$administrador,$contraseña,$telefono,$fecha_nacimiento,$permisos){
		$resultado=$this->db->prepare("INSERT INTO usuario(email,nombre,apellido,admin,contraseña,telefono,f_nacimiento,permisos) VALUES(:email,:nom,:ape,:adm,:con,:tel,:fn,:per)");
		$resultado->execute(array(":email"=>$email,":nom"=>$nombre,":ape"=>$apellido,":adm"=>$administrador,":con"=>$contraseña,":tel"=>$telefono,":fn"=>$fecha_nacimiento,":per"=>$permisos));
	}
}
?>
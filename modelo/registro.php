<?php 
/**
 * 
 */
class Registro {

	private $db;//conexion
	private $registros;
	
	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->registros=array();
		# code...
	}

	public function crear($email,$nombre,$apellido,$administrador,$contraseña,$telefono,$fecha_nacimiento,$permisos,$pregunta,$respuesta){
		$resultado=$this->db->prepare("INSERT INTO usuario(email,nombre,apellido,admin,contrasenia,pregunta,respuesta,telefono,f_nacimiento,permisos) VALUES(:email,:nom,:ape,:adm,:con,:preg,:res,:tel,:fn,:per)");
		$resultado->execute(array(":email"=>$email,":nom"=>$nombre,":ape"=>$apellido,":adm"=>$administrador,":con"=>$contraseña,":preg"=>$pregunta,":res"=>$respuesta,":tel"=>$telefono,":fn"=>$fecha_nacimiento,":per"=>$permisos));

	}
}

 ?>
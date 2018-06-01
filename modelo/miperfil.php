<?php
	

	class Miperfil {

		private $db;
		private $via;
		private $via2;
		private $via3;
		private $via4;
		private $via5;
		private $via6;

		public function __construct(){
			require_once("modelo/conexion.php"); 
			$this->db=Conexion:: conectar();
			$this->via=array();
			$this->via2=array();
			$this->via3=array();
			$this->via4=array();
			$this->via5=array();
			$this->via6=array();
		}

		public function get_datos($email){
		$via=array();
		$consulta=$this->db->query("SELECT email,nombre,apellido FROM usuario WHERE usuario.email='".$email."'");
		$via=$consulta->fetch(PDO::FETCH_ASSOC);
		return $via;
		}
	}


	
 ?>
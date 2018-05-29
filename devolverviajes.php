<?php
	

	class Devolverviajes {

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

		public function get_viajes(){
			$sql='SELECT * FROM viaje';
			$sentencia=$this->db->query($sql);
			while ($fila=$sentencia->fetch(PDO::FETCH_ASSOC)){
				$this->via[]=$fila;
			} 
			return $this->via;
		}

		

		public function get_ubicacion_origen($dato){
			$this->via2=null;
			$sql="SELECT * FROM ubicacion WHERE ubicacion.id_ubicacion = $dato";
			$sentencia=$this->db->query($sql);
			while ($fila=$sentencia->fetch(PDO::FETCH_ASSOC)){
				$this->via2[]=$fila;
			} 
			return $this->via2;
		}


		public function get_ubicacion_destino($dato){
			$this->via3=null;
			$sql="SELECT * FROM ubicacion WHERE ubicacion.id_ubicacion = $dato";
			$sentencia=$this->db->query($sql);
			while ($fila=$sentencia->fetch(PDO::FETCH_ASSOC)){
				$this->via3[]=$fila;
			} 
			return $this->via3;
		}
		
 		public function get_provincia($dato1){
 			$this->via4=null;
			$sql="SELECT * FROM provincia WHERE provincia.id_provincia = $dato1";
			$sentencia=$this->db->query($sql);
			while ($fila=$sentencia->fetch(PDO::FETCH_ASSOC)){
				$this->via4[]=$fila;
			} 
			return $this->via4;
		}

		public function get_ciudad($dato1){
 			$this->via5=null;
			$sql="SELECT * FROM localidad WHERE localidad.id_localidad = $dato1";
			$sentencia=$this->db->query($sql);
			while ($fila=$sentencia->fetch(PDO::FETCH_ASSOC)){
				$this->via5[]=$fila;
			} 
			return $this->via5;
		}

		public function get_un_viaje($dato1){
			$this->via6=null;
			$sql="SELECT * FROM viaje WHERE viaje.id_viaje = $dato1";
			$sentencia=$this->db->query($sql);
			while ($fila=$sentencia->fetch(PDO::FETCH_ASSOC)){
				$this->via6[]=$fila;
			} 
			return $this->via6;
		}

	}




 ?>
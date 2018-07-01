<?php 

class Postulacion{
	private $db;//conexion
	private $postulaciones;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->postulaciones=array();
	}

	public function crear($id_viaje,$id_usuario,$cant){
		$resultado=$this->db->query("INSERT INTO postulacion(id_usuario,id_viaje,cantidad_asientos) VALUES ($id_usuario,$id_viaje,$cant)");
	}

	public function estoy_postulado($id_viaje,$id_usuario){
		$consulta1=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_viaje=$id_viaje AND postulacion.id_usuario=$id_usuario");

		$consulta2=$this->db->query("SELECT * FROM viaje WHERE viaje.id_viaje=$id_viaje AND viaje.id_usuario=$id_usuario");

		return $consulta1->rowCount() > 0 || $consulta2->rowCount() > 0;
	}

	public function get_estado($id_viaje,$id_usuario){
		$datos=array();
		$consulta=$this->db->query("SELECT estado FROM postulacion WHERE postulacion.id_viaje=$id_viaje AND postulacion.id_usuario=$id_usuario");
		$datos=$consulta->fetch(PDO::FETCH_ASSOC);
		return $datos['estado'];
	}

	public function existe_esperando($id_usuario){
		$consulta=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_usuario=$id_usuario AND postulacion.estado='esperando'");
		return $consulta->rowCount() > 0;
	}

	public function existe_aceptado($id_usuario){
		$consulta=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_usuario=$id_usuario AND postulacion.estado='aceptado'");
		return $consulta->rowCount() > 0;
	}

	public function existe_pasajero($id_viaje){
		$consulta=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_viaje=$id_viaje AND postulacion.estado='aceptado'");
		return $consulta->rowCount() > 0;
	}

	public function get_postulaciones_pasajeros($id_viaje){
		$postulaciones=array();
		$consulta=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_viaje=$id_viaje AND postulacion.estado='aceptado'");
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$postulaciones[]=$fila;
		}
		return $postulaciones;
	}

	public function existe_postulante($id_viaje){
		$consulta=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_viaje=$id_viaje AND postulacion.estado='esperando'");
		return $consulta->rowCount() > 0;
	}

	public function get_filas_esperando($id_usuario){
		$consulta=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_usuario=$id_usuario AND postulacion.estado='esperando'");
		return $consulta->rowCount();
	}

	public function get_filas_aceptado($id_usuario){
		$consulta=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_usuario=$id_usuario AND postulacion.estado='aceptado'");
		return $consulta->rowCount();
	}

	public function get_filas_postulantes($id_viaje){
		$consulta=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_viaje=$id_viaje AND postulacion.estado='esperando'");
		return $consulta->rowCount();
	}

	public function get_postulaciones_esperando($id_usuario,$inicio,$tamaño_paginas){
		$postulaciones=array();
		$consulta=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_usuario=$id_usuario AND postulacion.estado='esperando' LIMIT $inicio,$tamaño_paginas");
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$postulaciones[]=$fila;
		}
		return $postulaciones;
	}


	public function get_postulaciones_aceptado($id_usuario,$inicio,$tamaño_paginas){
		$postulaciones=array();
		$consulta=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_usuario=$id_usuario AND postulacion.estado='aceptado' LIMIT $inicio,$tamaño_paginas");
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$postulaciones[]=$fila;
		}
		return $postulaciones;
	}

	public function get_postulantes($id_viaje,$inicio,$tamaño_paginas){
		$postulaciones=array();
		$consulta=$this->db->query("SELECT * FROM postulacion INNER JOIN usuario ON(postulacion.id_usuario=usuario.id_usuario) WHERE postulacion.id_viaje=$id_viaje AND postulacion.estado='esperando' LIMIT $inicio,$tamaño_paginas");
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$postulaciones[]=$fila;
		}
		return $postulaciones;
	}

	public function get_id_viaje($id_postulacion){
		$consulta=$this->db->query("SELECT id_viaje FROM postulacion  WHERE postulacion.id_postulacion=$id_postulacion");
		$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
		return $resultado['id_viaje'];

	}

	public function get_datos($id_postulacion){
		$consulta=$this->db->query("SELECT * FROM postulacion  WHERE postulacion.id_postulacion=$id_postulacion");
		$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
		return $resultado;
	}

	public function eliminar($id_postulacion){
		$this->db->query("DELETE FROM postulacion WHERE postulacion.id_postulacion=$id_postulacion");
	}

	public function rechazar($id_postulacion){

		$this->db->query("UPDATE postulacion SET estado='rechazado' WHERE postulacion.id_postulacion=$id_postulacion");

	}

	public function aceptar($id_postulacion){
		$this->db->query("UPDATE postulacion SET estado='aceptado' WHERE postulacion.id_postulacion=$id_postulacion");
	}


}

?>
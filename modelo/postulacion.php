<?php 

class Postulacion{
	private $db;//conexion
	private $postulaciones;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->postulaciones=array();
	}

	public function crear($id_viaje,$id_usuario){
		$resultado=$this->db->query("INSERT INTO postulacion(id_usuario,id_viaje) VALUES ($id_usuario,$id_viaje)");
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

	public function get_postulaciones_esperando($id_usuario){
		$postulaciones=array();
		$consulta=$this->db->query("SELECT * FROM postulacion WHERE postulacion.id_usuario=$id_usuario AND postulacion.estado='esperando'");
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$postulaciones[]=$fila;
		}
		return $postulaciones;
	}

	public function eliminar($id_viaje,$id_usuario){
		$this->db->query("DELETE FROM postulacion WHERE postulacion.id_viaje=$id_viaje AND postulacion.id_usuario=$id_usuario");
	}


}

?>
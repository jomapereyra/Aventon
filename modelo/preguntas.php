<?php
class Preguntas{
	private $db;//conexion
	private $usuarios;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->usuarios=array();
	}

	public function existe_preguntas($id){
		$registro=$this->db->query("SELECT * FROM pregunta WHERE pregunta.id_viaje='".$id."'")->rowCount();
		return $registro > 0;
	}
	public function existe_respuesta($id){
		$registro=$this->db->query("SELECT * FROM respuesta WHERE respuesta.id_pregunta='".$id."'")->rowCount();
		return $registro > 0;
	}

	public function soy_creador1($id_v, $id_u){
		$registro=$this->db->query("SELECT * FROM viaje WHERE viaje.id_viaje='".$id_v."'" . "AND viaje.id_usuario='".$id_u."'")->rowCount();
		return $registro > 0;
	}

	public function soy_creador($id_v, $id_u){
		$registro=$this->db->query("SELECT * FROM pregunta WHERE pregunta.id_usuario='".$id_u."'" . "AND pregunta.id_viaje='".$id_v."'")->rowCount();
		if ($registro){
			return true;
		}else{
			return false;
		}
	}

	public function get_preguntas($id){
		$casual=array();
		$consulta=$this->db->query("SELECT * FROM pregunta WHERE pregunta.id_viaje='".$id."'");
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$casual[]=$fila;
		} 
		return $casual;
	}

	public function get_respuestas($id){
		$casual=array();
		$consulta=$this->db->query("SELECT * FROM respuestas WHERE respuestas.id_pregunta='".$id."'");
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$casual[]=$fila;
		} 
		return $casual;
	}

	public function crear_pregunta($id_viaje,$autor,$contenido,$usuario){
		$resultado=$this->db->prepare("INSERT INTO pregunta(id_viaje,autor,contenido,id_usuario) VALUES (:id_v,:id_a,:contenido,:usuario)");
		$resultado->execute(array(":id_v"=>$id_viaje,":id_a"=>$autor,':contenido'=>$contenido,':usuario'=>$usuario));
	}

	public function crear_respuesta($id_p,$autor,$contenido){
		$resultado=$this->db->prepare("INSERT INTO respuesta(id_pregunta,autor,contenido) VALUES (:id_p,:id_a,:contenido)");
		$resultado->execute(array(":id_p"=>$id_p,":id_a"=>$autor,":contenido"=>$contenido));
	}


	public function get_respuesta($id_p){
		$casual=array();
		$consulta=$this->db->query("SELECT * FROM respuesta WHERE respuesta.id_pregunta='".$id_p."'");
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$casual[]=$fila;
		} 
		return $casual;
	}

}
?>
<?php
class Puntuacion{
	private $db;//conexion

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
	}

	public function get_cantidad_puntuacion($id_usuario){
		$cant=$this->db->query("SELECT * FROM puntuacion WHERE puntuacion.id_usuarioPuntuado=$id_usuario")->rowCount();
		return $cant;
	}

	public function get_promedio($id_usuario){
		$consulta=$this->db->query("SELECT ROUND(AVG(valor),1) as promedio FROM puntuacion WHERE puntuacion.id_usuarioPuntuado=$id_usuario");
		$puntuacion=$consulta->fetch(PDO::FETCH_ASSOC);
		return $puntuacion['promedio'];
	}

	public function get_puntuaciones($id_usuario){
		$puntuacion=array();
		$consulta=$this->db->query("SELECT * FROM puntuacion WHERE puntuacion.id_usuarioPuntuado=$id_usuario");
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$puntuacion[]=$fila;
		} 
		return $puntuacion;
	}

	public function crear($valor,$comentario,$id_puntuado,$id_calificador){
		$resultado=$this->db->prepare("INSERT INTO puntuacion(valor,comentario,id_usuarioPuntuado,id_usuarioCalificador) VALUES (:v,:c,:id_p,:id_c)");
		$resultado->execute(array(":v"=>$valor,"c"=>$comentario,':id_p'=>$id_puntuado,':id_c'=>$id_calificador));

	}



}
?>
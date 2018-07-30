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

	public function crear($valor,$comentario,$id_puntuado,$id_calificador,$id_viaje){
		$resultado=$this->db->prepare("INSERT INTO puntuacion(id_viaje,valor,comentario,id_usuarioPuntuado,id_usuarioCalificador) VALUES (:id_v,:v,:c,:id_p,:id_c)");
		$resultado->execute(array(":id_v"=>$id_viaje,":v"=>$valor,":c"=>$comentario,':id_p'=>$id_puntuado,':id_c'=>$id_calificador));

	}

	public function existe_puntuacion($id_usuario,$id_viaje){
		$consulta=$this->db->query("SELECT * FROM puntuacion WHERE puntuacion.id_usuarioPuntuado=$id_usuario AND puntuacion.id_viaje=$id_viaje")->rowCount();
		return $consulta > 0;
	}




}
?>
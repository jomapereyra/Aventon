<?php
class Ubicacion{
	private $db;//conexion
	private $ubicaciones;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->ubicaciones=array();
	}

	public function crear($calle,$numero,$id_pro,$id_ciu){
		$resultado=$this->db->prepare("INSERT INTO ubicacion(calle,numero,id_provincia,id_ciudad) VALUES (:calle,:numero,:id_p,:id_c)");
		$resultado->execute(array(':calle'=>$calle,':numero'=>$numero,':id_p'=>$id_pro,':id_c'=>$id_ciu));
	}

	public function ultimo_id(){
		$consulta=$this->db->query("SELECT MAX(id_ubicacion) as valor FROM ubicacion");
		$ubicacion=$consulta->fetch(PDO::FETCH_ASSOC);
		return $ubicacion['valor'];
	}

	public function existe($calle,$numero,$provincia,$ciudad){
		$registro=$this->db->query("SELECT * FROM ubicacion WHERE ubicacion.calle='".$calle."'"." AND ubicacion.numero='".$numero."'"." AND ubicacion.id_provincia='".$provincia."'"."AND ubicacion.id_ciudad='".$ciudad."'")->rowCount();
		return $registro > 0;
	}


	public function get_id($calle,$numero,$provincia,$ciudad){
		$consulta=$this->db->query("SELECT * FROM ubicacion WHERE  ubicacion.calle='".$calle."'"." AND ubicacion.numero='".$numero."'"." AND ubicacion.id_provincia='".$provincia."'"."AND ubicacion.id_ciudad='".$ciudad."'");
		$ubicacion=$consulta->fetch(PDO::FETCH_ASSOC);
		return $ubicacion['id_ubicacion'];
	}
}
?>
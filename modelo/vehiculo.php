<?php
class Vehiculo{
	private $db;//conexion
	private $vehiculos;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
		$this->vehiculos=array();
	}

	public function crear($patente,$id_usuario,$id_tipo,$marca,$modelo,$anio,$cant_asientos){
		$resultado=$this->db->prepare("INSERT INTO vehiculo(patente,id_usuario,id_tipo_vehiculo,marca,modelo,anio,cant_asientos) VALUES (:pa,:id_u,:id_t,:mar,:mod,:anio,:cant)");
		$resultado->execute(array(':pa'=>$patente,':id_u'=>$id_usuario,':id_t'=>$id_tipo,':mar'=>$marca,':mod'=>$modelo,':anio'=>$anio,':cant'=>$cant_asientos));
	}

	public function modificar($patente,$id_vehiculo,$id_tipo,$marca,$modelo,$anio,$cant_asientos){
		$resultado=$this->db->prepare("UPDATE vehiculo SET patente=:pa,id_tipo_vehiculo=:id_t,marca=:mar,modelo=:mod,anio=:anio,cant_asientos=:cant WHERE vehiculo.id_vehiculo=$id_vehiculo");
		$resultado->execute(array(':pa'=>$patente,':id_t'=>$id_tipo,':mar'=>$marca,':mod'=>$modelo,':anio'=>$anio,':cant'=>$cant_asientos));
	}

	public function eliminar($id){
		$this->db->query("DELETE FROM vehiculo WHERE id_vehiculo = $id");
	}

	public function tiene_vehiculo($usuario){
		$registro=$this->db->query("SELECT * FROM vehiculo WHERE vehiculo.id_usuario=$usuario")->rowCount();
		return $registro > 0;
	}

	public function mis_vehiculos($usuario){
		$mis_v=array();
		$consulta=$this->db->query("SELECT * FROM vehiculo INNER JOIN tipo_vehiculo ON(vehiculo.id_tipo_vehiculo=tipo_vehiculo.id_tipo_vehiculo) WHERE vehiculo.id_usuario=$usuario");
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$mis_v[]=$fila;
		}
		return $mis_v;
	}

	public function get_limite($id){
		$consulta=$this->db->query("SELECT cant_asientos FROM vehiculo WHERE vehiculo.id_vehiculo=$id");
		$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
		return $resultado["cant_asientos"];
	}
}
?>
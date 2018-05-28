<?php
class Conexion{

	public static function conectar(){
		try{
			require("config.php");
			$conexion=new PDO("mysql:host=$host;dbname=$db_name","$user","$pass");
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$conexion->exec("SET CHARACTER SET $charset");

		}
		catch(Exception $e){
			die("Error $e->getMessage()");
			echo "Linea del error $e->getLine()";

		}
		return $conexion;
	}

}
?>
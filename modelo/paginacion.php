<?php
class Paginacion{
	private $db;//conexion
	private $tamaño_paginas=10;
	private $inicio;
	private $num_fila;
	private $total_paginas;
	private $anterior;
	private $siguiente;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
	}

	public function paginacion_inicio($pagina,$id_usuario){
		require_once("viaje.php");
		$tabla_viaje=new Viaje();
		$this->num_fila=$tabla_viaje->get_filas($id_usuario);
		$this->calcular($pagina);
	}

	public function paginacion_buscar($pagina,$cadena,$id_usuario){
		require_once("viaje.php");
		$tabla_viaje=new Viaje();
		$this->num_fila=$tabla_viaje->get_filas_buscar($cadena,$id_usuario);
		$this->calcular($pagina);
	}

	public function paginacion_pendiente($pagina,$id_usuario){
		require_once("postulacion.php");
		$tabla_postulacion=new Postulacion();
		$this->num_fila=$tabla_postulacion->get_filas_esperando($id_usuario);
		$this->calcular($pagina);
	}

	public function paginacion_aceptado($pagina,$id_usuario){
		require_once("postulacion.php");
		$tabla_postulacion=new Postulacion();
		$this->num_fila=$tabla_postulacion->get_filas_aceptado($id_usuario);
		$this->calcular($pagina);
	}

	public function paginacion_postulantes($pagina,$id_viaje){
		require_once("postulacion.php");
		$tabla_postulacion=new Postulacion();
		$this->num_fila=$tabla_postulacion->get_filas_postulantes($id_viaje);
		$this->calcular($pagina);
	}

	public function paginacion_creados($pagina,$id_usuario){
		require_once("viaje.php");
		$tabla_viaje=new Viaje();
		$this->num_fila=$tabla_viaje->get_filas_creados($id_usuario);
		$this->calcular($pagina);
	}

	public function calcular($pagina){
		$this->inicio=($pagina-1)*$this->tamaño_paginas;
		$this->total_paginas=ceil($this->num_fila/$this->tamaño_paginas);
		if($pagina> 1){
			$this->anterior= $pagina - 1;
		}
		else
			$this->anterior = 1;
		if($pagina<$this->total_paginas){
			$this->siguiente= $pagina + 1;
		}
		else 
			$this->siguiente=$this->total_paginas;

	}

	public function mostrar($indice){
		$paginas_restantes=$this->total_paginas - $indice;
		$maximo;
		if ($this->total_paginas < 16) {
			$maximo=$this->total_paginas;
			$minimo=1;
		}
		else{
			if($paginas_restantes > 16){
				$maximo=$indice + 15;
			}
			else{

				$maximo=$this->total_paginas;
			}
			if($indice > 16){
				$minimo= $indice - 15;

			}
			else{
				$minimo=1;
			}
		}
		echo "<br>
		
		<nav aria-label='Page navigation example'>
		<ul class='pagination justify-content-center'>";
		if($indice>1){
			echo "<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$this->anterior'>Anterior</a></li>";
			echo "<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$minimo'>...</a></li>";
		}
		for($i=$indice;$i<=$maximo;$i++){
			echo "<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$i'>$i</a></li>";
		}
		if($maximo < $this->total_paginas){
			echo "<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$maximo'>...</a></li>";
			echo "<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$this->siguiente'>Siguiente</a></li>";
		}
		echo "</ul></nav>";

	}

	public function get_inicio(){
		return $this->inicio;
	}

	public function get_tamaño(){
		return $this->tamaño_paginas;
	}



}


?>
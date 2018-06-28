<?php
class Paginacion{
	private $db;//conexion
	private $tamaño_paginas=10;
	private $inicio;
	private $num_fila;
	private $total_paginas;
	private $anterior;
	private $siguiente;
	private $maximo;
	private $minimo;
	private $paginas_minima;

	private $paginas_restantes;

	public function __construct(){
		require_once("conexion.php");
		$this->db=Conexion::conectar();
	}

	public function paginacion_inicio($pagina){
		require_once("viaje.php");
		$tabla_viaje=new Viaje();
		$this->num_fila=$tabla_viaje->get_filas();
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
		$this->paginas_restantes=$this->total_paginas -$indice;
		if($this->paginas_restantes > 16){
			$this->maximo= $indice + 15;
		}
		else{
			$this->maximo=$indice + $this->paginas_restantes;
			$indice= $this->maximo - 15;
		}
		$this->paginas_minima=$indice-16;
		if ($indice>17) {
			$this->paginas_minima=$indice-16;
		}
		else{
			$this->paginas_minima=1;
		}

		echo "<br>

		<nav aria-label='Page navigation example'>
		<ul class='pagination'>
		<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$this->anterior'>Anterior</a></li>";echo "<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$this->paginas_minima'>...</a></li>";
		for($i=$indice;$i<=$this->maximo;$i++){
			echo "<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$i'>$i</a></li>";
		}
		echo "<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$this->maximo'>...</a></li>";
		echo "<li class='page-item'><a class='page-link semitransparentepaginacion' href='?pagina=$this->siguiente'>Siguiente</a></li>
		</ul>
		</nav>";

	}

	public function get_inicio(){
		return $this->inicio;
	}

	public function get_tamaño(){
		return $this->tamaño_paginas;
	}



}


?>
<?php
	class Libro{
		private $id;
		private $nombre;
		private $autor;
		private $categoria;

		function __construct(){}

		public function getNombre(){
		return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getAutor(){
			return $this->autor;
		}

		public function setAutor($autor){
			$this->autor = $autor;
		}

		public function getCategoria(){
		return $this->categoria;
		}

		public function setCategoria($categoria){
			$this->categoria = $categoria;
		}
		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}
	}
?>

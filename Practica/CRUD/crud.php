<?php
// incluye la clase Db
require_once('conexion.php');

	class CrudLibro{
		// constructor de la clase
		public function __construct(){}

		// Create
		public function insertar($libro){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO libros values(NULL,:nombre,:autor,:categoria)');
			$insert->bindValue('nombre',$libro->getNombre());
			$insert->bindValue('autor',$libro->getAutor());
			$insert->bindValue('categoria',$libro->getCategoria());
			$insert->execute();

		}

		// Read
		public function mostrar(){
			$db=Db::conectar();
			$listaLibros=[];
			$select=$db->query('SELECT * FROM libros');

			foreach($select->fetchAll() as $libro){
				$myLibro= new Libro();
				$myLibro->setId($libro['id']);
				$myLibro->setNombre($libro['nombre']);
				$myLibro->setAutor($libro['autor']);
				$myLibro->setCategoria($libro['categoria']);
				$listaLibros[]=$myLibro;
			}
			return $listaLibros;
		}

		// Delate
		public function eliminar($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM libros WHERE ID=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}

		// Search
		public function obtenerLibro($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM libros WHERE ID=:id');
			$select->bindValue('id',$id);
			$select->execute();
			$libro=$select->fetch();
			$myLibro= new Libro();
			$myLibro->setId($libro['id']);
			$myLibro->setNombre($libro['nombre']);
			$myLibro->setAutor($libro['autor']);
			$myLibro->setCategoria($libro['categoria']);
			return $myLibro;
		}

		// Update
		public function actualizar($libro){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE libros SET nombre=:nombre, autor=:autor,categoria=:categoria  WHERE ID=:id');
			$actualizar->bindValue('id',$libro->getId());
			$actualizar->bindValue('nombre',$libro->getNombre());
			$actualizar->bindValue('autor',$libro->getAutor());
			$actualizar->bindValue('categoria',$libro->getCategoria());
			$actualizar->execute();
		}
	}
?>

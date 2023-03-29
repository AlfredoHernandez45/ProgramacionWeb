<?php
//incluye la clase Libro y CrudLibro
require_once('crud.php');
require_once('libro.php');

$crud= new CrudLibro();
$libro= new Libro();

	// si el elemento insertar no viene nulo llama al crud e inserta un libro
	if (isset($_POST['insertar'])) {
		$libro->setNombre($_POST['nombre']);
		$libro->setAutor($_POST['autor']);
		$libro->setCategoria($_POST['categoria']);
		//llama a la función insertar definida en el crud
		$crud->insertar($libro);
		header('Location: index.php');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el libro
	}elseif(isset($_POST['actualizar'])){
		$libro->setId($_POST['id']);
		$libro->setNombre($_POST['nombre']);
		$libro->setAutor($_POST['autor']);
		$libro->setCategoria($_POST['categoria']);
		$crud->actualizar($libro);
		header('Location: index.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un libro
	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id']);
		header('Location: index.php');
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php
	}elseif($_GET['accion']=='a'){
		header('Location: actualizar.php');
	}
?>

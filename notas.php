<?php
	// include the file for the validation of the session
	include_once 'components/validateSession.comp.php';

	//Importar el archivo de modelos para controlador
	require_once 'controllers/notes.controller.php';
	// Validar si el usuario esta en sesion
	require_once 'views/notas.view.php';
?>
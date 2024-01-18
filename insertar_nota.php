<?php
// include the file for the validation of the session
include_once 'components/validateSession.comp.php';
//Importar el archivo de modelos para controlador
require_once 'controllers/insertar_nota.controller.php';

// this variable is used to set the page title
$viewTitle = 'Guardar Nota';

// Validar si el usuario esta en sesion
require_once 'views/insertar_nota.view.php';
?>
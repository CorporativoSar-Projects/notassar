<?php
// include the file for the validation of the session
include_once 'components/validateSession.comp.php';

//Importar el archivo de modelos para controlador
require_once 'controllers/calculo.controller.php';

// this variable is used to set the page title
$viewTitle = 'Calculo';

// Validar si el usuario esta en sesion
require_once 'views/calculo.view.php';
?>
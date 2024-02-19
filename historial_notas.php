<?php

// Importa el archivo para la validación de la sesión
require_once 'components/validateSession.comp.php';

// importar el controlador del historial
require_once 'controllers/historial.controller.php';

// Esta variable se utiliza para establecer el título de la página
$viewTitle = 'Historial de notas';


// Incluye el archivo 'historial_notas.view.php', que contiene la vista de las notas del historial.
require_once 'views/historial_notas.view.php';

?>
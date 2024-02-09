<?php

// Importa el archivo para la validación de la sesión
require_once 'components/validateSession.comp.php';

// Importa el archivo para la sesión de usuario
require_once 'models/UserSession.model.php';

// Incluye el modelo de las notas
require_once 'models/Notas.model.php';
// Incluye el archivo de configuración de la base de datos
require_once 'config/database.php';


// Establece una conexión a la base de datos
$connection = $database->getConnection();
// Crea una nueva instancia del modelo de Nota
$notasModel = new Note();

// Establece el ID del usuario para el modelo de Nota
//comentar para que se muestren todas las notas
$notasModel->setUserId($userSession->getUser()->getId());

// Obtiene los datos de la nota para el usuario especificado
$notes = $notasModel->getNoteData($connection);

foreach ($notes as $index => $nota) {
    $products = $notasModel-> getProductsForNote($connection, $nota['id']); // Carga los productos
    $notes[$index]['products'] = $products; // Agrega los productos a la nota
}

// Esta variable se utiliza para establecer el título de la página
$viewTitle = 'Historial de notas';


// Incluye el archivo 'historial_notas.view.php', que contiene la vista de las notas del historial.
require_once 'views/historial_notas.view.php';





?>
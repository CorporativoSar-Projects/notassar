<?php
 // Se importa la comfiguracion de base de datos
require_once 'config/database.php';
// Se importa el modelo de usuario sesion
require_once 'models/UserSession.model.php';
//Importar el archivo de modelos para controlador
require_once 'controllers/notes.controller.php';
// Se crea una conexion a base de datos
$connection = $database->getConnection();
//Se crea un nuevo modelo de usuario sesion
$userSession = new UserSession();
if (isset($_POST['folio']) && isset($_POST['tipoNota'])&& isset($_POST['nomCliente'])&& isset($_POST['corrCliente'])
&& isset($_POST['telefono'])&& isset($_POST['domicilio'])&& isset($_POST['fechaI'])&& isset($_POST['fechaT'])
&& isset($_POST['idservicio'])&& isset($_POST['cantidad'])&& isset($_POST['idservicio2'])&& isset($_POST['cantidad2'])
&& isset($_POST['idservicio3'])&& isset($_POST['cantidad3'])&& isset($_POST['idservicio4'])&& isset($_POST['cantidad4'])) {
    $Notes = new Notes();
    $Notes->setName(filter_var($_POST['idservicio'], FILTER_SANITIZE_STRING));
    $Notes->setName(filter_var($_POST['idservicio'], FILTER_SANITIZE_STRING));
    $Notes->setName(filter_var($_POST['idservicio'], FILTER_SANITIZE_STRING));
}
?>
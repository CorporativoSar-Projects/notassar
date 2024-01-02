<?php
// Se importa la comfiguracion de base de datos
require_once 'config/database.php';
// Se importa el modelo de usuario sesion
require_once 'models/UserSession.model.php';
// Se crea una conexion a base de datos
$connection = $database->getConnection();
//Se crea un nuevo modelo de usuario sesion
$userSession = new UserSession();
if (!$userSession->validateSession()) {
    // redirect to the home page
    header('Location: index.php');
}
//Se obtiene la informacion de la sesion por variables de sesion
$userSession = unserialize($_SESSION['userSession']);
//Se obtiene el id del usuario
$userId = $userSession->getUser()->getId();
$fecha = date("d/m/y");
//Se crea query para obtener el ultimo folio existente
 $query = "SELECT NO_Folio FROM notes WHERE NO_Register_Date = (SELECT MAX(NO_Register_Date) FROM notes);";
 $stmt = $connection->prepare($query);
 $stmt->execute();
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 $foliio = trim($row['NO_Folio']);
 //Se genera un nuevo folio para su uso
 $foliio = preg_replace_callback('/\d+/', function ($matches) {	return $matches[0] + 1;	}, $foliio);
 //Se genera la query para obtener los productos de la compañia conforme sus usuarios
 $query = "SELECT PR_Id, PR_Name, PR_Price FROM products p, company_products cp, company_users cu WHERE cu.CU_US_Id = '$userId' AND CU_CO_Id = cp.CP_CO_Id AND PR_Id =CP_PR_Id";  
 $stmtNombres = $connection->prepare($query);
 $stmtNombres->execute();

?>
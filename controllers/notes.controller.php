<?php
    //Se obtiene la informacion de la sesion por variables de sesion
    $userSession = unserialize($_SESSION['userSession']);
    //Se obtiene el id del usuario
    $userId = $userSession->getUser()->getId();
    //Se obtiene la fecha actual
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

    // se guardan los productos en un arreglo
    $productos = array();
    while ($row = $stmtNombres->fetch(PDO::FETCH_ASSOC)) {
        array_push($productos, $row);
    }

    // this variable is used to set the page title
    $viewTitle = 'Nueva nota';

    // obtener los tipos de notas
    $query = "SELECT * FROM typesofnotes";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    // se guardan los tipos de notas en un arreglo
    $noteTypes = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($noteTypes, $row);
    }

?>
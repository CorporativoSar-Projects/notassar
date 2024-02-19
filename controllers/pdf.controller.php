<?php

header('Content-Type: text/html; charset=UTF-8');

// Importar el modelo de cliente
require_once 'models/Client.model.php';

// include the PDF class
require_once 'models/PDF.model.php';

// include the products model
require_once 'models/Product.model.php';

// get the data
$data = isset($_GET['dato']) ? $_GET['dato'] : 'valor_predeterminado';

// decode the data
$note = json_decode($data);

// get the client data
if ($note->client) {
    if (is_object($note->client)) {
        $client = $note->client;
    } else {
        $client = json_decode($note->client);
    }
}

if ($note->noteProducts === null) {
    //query para obtener todos los productos de la note de la base de datos
    $query = "SELECT p.*, np.NP_Quantity FROM note_products np, products p WHERE
    np.NP_NO_id = :id AND np.NP_PR_Id = p.PR_Id;";

    // prepare the query
    $stmt = $connection->prepare($query);

    // bind the id of the note
    $stmt->bindParam(':id', $note->id);

    // execute the query
    $stmt->execute();

    // get the products
    $noteProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // add the products to the note
    $note->noteProducts = $noteProducts;
}

?>
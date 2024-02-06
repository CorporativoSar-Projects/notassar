<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	// regresar a la pagina de notas
	header('Location: notas.php');
}

// Importar el modelo de notas
require_once 'models/Note.model.php';

// Recuperar el valor JSON del campo oculto
$json_data = $_POST['json_data'];

// Convertir el JSON a un objeto PHP
$note_recuperada = json_decode($json_data);


// Crear una nueva nota
$note = new Note(
	$note_recuperada->id,
	$note_recuperada->folio,
	$note_recuperada->subtotal,
	$note_recuperada->registerDate,
	$note_recuperada->initDate,
	$note_recuperada->endDate,
	$note_recuperada->iva,
	$note_recuperada->total,
	$note_recuperada->usId,
	null,
	$note_recuperada->noteTypeId,
	$note_recuperada->noteProducts
);

// get the client data
$clientData = json_decode($note_recuperada->client);

// nuevo cliente
$client = new Client(
	$clientData->id,
	$clientData->name,
	$clientData->email,
	$clientData->address,
	$clientData->number,
);

$note->setClient($client);

var_dump($note_recuperada->noteProducts[0]);

// // Guardar la nota en la base de datos
// $query = "INSERT INTO notes (NO_Id, NO_Folio, NO_Subtotal, NO_Register_Date, NO_Init_Date, NO_End_Date, NO_Iva, NO_Total, NO_US_Id, NO_CL_Id, NO_TN_Id) VALUES (:id, :folio, :subtotal, :registerDate, :initDate, :endDate, :iva, :total, :usId, :clId, :tnId);";

// // Preparar la consulta
// $stmt = $connection->prepare($query);

// // Vincular los parametros
// $stmt->bindParam(':id', $note->getId());
// $stmt->bindParam(':folio', $note->getFolio());
// $stmt->bindParam(':subtotal', $note->getSubtotal());
// $stmt->bindParam(':registerDate', $note->getRegisterDate());
// $stmt->bindParam(':initDate', $note->getInitDate());
// $stmt->bindParam(':endDate', $note->getEndDate());
// $stmt->bindParam(':iva', $note->getIva());
// $stmt->bindParam(':total', $note->getTotal());
// $stmt->bindParam(':usId', $note->getUsId());
// $stmt->bindParam(':clId', $note->getClient()->getId());
// $stmt->bindParam(':tnId', $note->getNoteTypeId());

// // Ejecutar la consulta
// $stmt->execute();

// // Obtener el numero de filas afectadas
// $numRows = $stmt->rowCount();

// // Si se inserto la nota
// if ($numRows > 0) {
// 	// Obtener el id de la nota
// 	$note->setId($connection->lastInsertId());

// 	// Guardar los productos de la nota
// 	$noteProducts = json_decode($note->getNoteProducts());

// 	// Recorrer los productos
// 	foreach ($noteProducts as $product) {
// 		// Crear la consulta
// 		$query = "INSERT INTO note_products (NP_NO_Id, NP_PR_Id, NP_Quantity, NP_Price) VALUES (:noId, :prId, :quantity, :price);";

// 		// Preparar la consulta
// 		$stmt = $connection->prepare($query);

// 		// Vincular los parametros
// 		$stmt->bindParam(':noId', $note->getId());
// 		$stmt->bindParam(':prId', $product->id);
// 		$stmt->bindParam(':quantity', $product->quantity);
// 		$stmt->bindParam(':price', $product->price);

// 		// Ejecutar la consulta
// 		$stmt->execute();
// 	}

// 	// Redirigir a la pagina de notas
// 	header('Location: notas.php');
// } else {
// 	// Mostrar un mensaje de error
// 	echo "Error al insertar la nota!";
// }

?>

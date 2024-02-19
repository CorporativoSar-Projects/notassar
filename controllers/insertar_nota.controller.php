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
	new DateTime($note_recuperada->registerDate->date),
	new DateTime($note_recuperada->initDate),
	new DateTime($note_recuperada->endDate),
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

try {
	// Guardar la nota en la base de datos
	$query = "INSERT INTO notes (NO_Folio, NO_Subtotal, NO_Init_Date, NO_End_Date, NO_Iva, NO_Total) VALUES (:folio, :subtotal, :initDate, :endDate, :iva, :total);";

	// Preparar la consulta
	$stmt = $connection->prepare($query);

	$folio= $note->getFolio();
	$subTotal= $note->getSubtotal();
	$initDate= $note->getInitDate()->format('Y-m-d');
	$endDate= $note->getEndDate()->format('Y-m-d');
	$iva= $note->getIva();
	$total= $note->getTotal();

	// Vincular los parametros
	$stmt->bindParam(':folio', $folio);
	$stmt->bindParam(':subtotal', $subTotal);
	$stmt->bindParam(':initDate', $initDate);
	$stmt->bindParam(':endDate', $endDate);
	$stmt->bindParam(':iva', $iva);
	$stmt->bindParam(':total', $total);

	// Ejecutar la consulta
	$stmt->execute();

	// Obtener el numero de filas afectadas
	$numRows = $stmt->rowCount();

	// Si se inserto la nota
	if ($numRows > 0) {
		// Obtener el id de la nota
		$note->setId($connection->lastInsertId());
		$id = $note->getId();

		echo "Nota insertada correctamente! con el id: " . $note->getId() . "<br>";

		// Guardar los productos de la nota
		// importar el componente para insertar los productos
		include 'components/insertProducts.comp.php';

		$clientId = $note->getClient()->getId();

		// validar si el cliente tiene id
		if ($clientId == null) {
			// incluir el componente para insertar el cliente
			include 'components/insertClient.comp.php';
		}

		// unir la nota con el cliente
		$query = "INSERT INTO client_notes (CN_CL_Id, CN_NO_Id) VALUES (:clId, :noId);";

		// Preparar la consulta
		$stmt = $connection->prepare($query);

		// Vincular los parametros
		$stmt->bindParam(':noId', $id);
		$stmt->bindParam(':clId', $clientId);

		// Ejecutar la consulta
		$stmt->execute();

		// unir la nota con su tipo
		$query = "INSERT INTO note_type (NT_NO_Id, NT_TY_Id) VALUES (:noId, :ntId);";

		// Preparar la consulta
		$stmt = $connection->prepare($query);

		$typeId = $note->getNoteTypeId();

		// Vincular los parametros
		$stmt->bindParam(':noId', $id);
		$stmt->bindParam(':ntId', $typeId);

		// Ejecutar la consulta
		$stmt->execute();

		// unir la nota con el usuario
		$query = "INSERT INTO user_notes (UN_US_Id, UN_NO_Id) VALUES (:usId, :noId);";

		// Preparar la consulta
		$stmt = $connection->prepare($query);

		// obtener el id del usuario
		$userId = $userSession->getUser()->getId();

		// Vincular los parametros
		$stmt->bindParam(':usId', $userId);
		$stmt->bindParam(':noId', $id);

		// Ejecutar la consulta
		$stmt->execute();

	}
} catch (\Throwable $th) {
	//mostrar el error
	echo "Error al insertar la nota: " . $th->getMessage();
}

?>
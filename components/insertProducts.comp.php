<?php
    // Guardar los productos de la nota
		$noteProducts = $note->getNoteProducts();

		// Recorrer los productos
		foreach ($noteProducts as $product) {
			// Crear la consulta
			$query = "INSERT INTO note_products (NP_NO_Id, NP_PR_Id, NP_Quantity, NP_Amount) VALUES (:noId, :prId, :quantity, :amount);";

			// Preparar la consulta
			$stmt = $connection->prepare($query);
			$amount = $product->PR_Price*$product->NP_Quantity;

			// Vincular los parametros
			$stmt->bindParam(':noId', $id);
			$stmt->bindParam(':prId', $product->PR_Id);
			$stmt->bindParam(':quantity', $product->NP_Quantity);
			$stmt->bindParam(':amount', $amount);

			// Ejecutar la consulta
			$stmt->execute();
		}
?>
<?php
    // Guardar los productos de la nota
		$noteProducts = $note->getNoteProducts();

		// Recorrer los productos
		foreach ($noteProducts as $product) {
			// get the data product
			$productData = $product->product;

			// get the quantity
			$quantity = $product->quantity;

			// Crear la consulta
			$query = "INSERT INTO note_products (NP_NO_Id, NP_PR_Id, NP_Quantity, NP_Amount) VALUES (:noId, :prId, :quantity, :amount);";

			// Preparar la consulta
			$stmt = $connection->prepare($query);
			$amount = $productData->PR_Price*$quantity;

			// Vincular los parametros
			$stmt->bindParam(':noId', $id);
			$stmt->bindParam(':prId', $productData->PR_Id);
			$stmt->bindParam(':quantity', $quantity);
			$stmt->bindParam(':amount', $amount);

			// Ejecutar la consulta
			$stmt->execute();
		}
?>
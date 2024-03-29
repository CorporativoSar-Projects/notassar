<?php
// Crear una instancia de FPDF
$pdf = new PDF();

// Agregar una página
$pdf->AddPage();

// Establecer fuente
$pdf->SetFont('Arial', 'B', 16);

// Título del documento
$pdf->Cell(0, 10, utf8_decode('Nota de Remisión'), 0, 1, 'C');
$pdf->Cell(0, 10, $note->folio, 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
// configurar la fecha del registro
$fecha = new DateTime($note->registerDate->date);

// formatear la fecha
$formattedDate = $fecha->format('jS F Y');

// mostrar la fecha en que se hizo la nota a la derecha
$pdf->Cell(0, 10, utf8_decode('Fecha: ') . $formattedDate , 0, 1, 'R');

// Salto de línea
$pdf->Ln(10);

// agregar una lista para los datos del cliente
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Datos del Cliente'), 0, 1, 'L');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, utf8_decode('Nombre: ' . $client->name), 0, 1, 'L');
$pdf->Cell(0, 10, utf8_decode('Correo: ' . $client->email), 0, 1, 'L');
$pdf->Cell(0, 10, utf8_decode('Dirección: ' . $client->address), 0, 1, 'L');
$pdf->Cell(0, 10, utf8_decode('Número: ' . $client->number), 0, 1, 'L');

// Salto de línea
$pdf->Ln(10);

// agregar una lista para los productos de la nota
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Productos:'), 0, 1, 'L');
$pdf->SetFont('Arial', '', 12);

// recorrer los productos en una tabla
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(15, 10, utf8_decode('#'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Subtotal'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 10);
// recorrer los productos
foreach ($note->noteProducts as $i => $product) {
    if (is_array($product)) {
        $pdf->Cell(15, 10, $i+1, 1, 0, 'C');
        $pdf->Cell(40, 10, $product['PR_Name'], 1, 0, 'C');
        $pdf->Cell(40, 10, $product['PR_Price'], 1, 0, 'C');
        $pdf->Cell(40, 10, $product['NP_Quantity'], 1, 0, 'C');
        $pdf->Cell(40, 10, $product['PR_Price']*$product['NP_Quantity'], 1, 0, 'C');
    } else {
        $pdf->Cell(15, 10, $i, 1, 0, 'C');
        $pdf->Cell(40, 10, $product->PR_Name, 1, 0, 'C');
        $pdf->Cell(40, 10, $product->PR_Price, 1, 0, 'C');
        $pdf->Cell(40, 10, $product->NP_Quantity, 1, 0, 'C');
        $pdf->Cell(40, 10, $product->PR_Price*$product->NP_Quantity, 1, 0, 'C');
    }
    // Salto de línea
    $pdf->Ln(10);
}

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
//mostrar fila de totales
$pdf->Cell(95, 10, utf8_decode(''), 0, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Subtotal: '), 1, 0, 'C');
$pdf->Cell(40, 10, "$" . number_format($note->subtotal, 2) . "MXN", 1, 1, 'C');
$pdf->Cell(95, 10, utf8_decode(''), 0, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('IVA: '), 1, 0, 'C');
$pdf->Cell(40, 10, "$" . number_format( $note->iva, 2) . "MXN", 1, 1, 'C');
$pdf->Cell(95, 10, utf8_decode(''), 0, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Total: '), 1, 0, 'C');
$pdf->Cell(40, 10, "$" . number_format($note->total,2) . "MXN", 1, 1, 'C');

// Salto de línea
$pdf->Ln(10);

$pdf->Cell(0, 10, utf8_decode('Servicio activo desde el ') . $note->initDate . utf8_decode(' al ') . $note->endDate, 0, 1, 'L');



// Salto de línea
$pdf->Ln(10);

// Salida del PDF (puede ser a un archivo o a la salida del navegador)
ob_start();
$pdf->Output();
ob_end_flush();
?>
<?php
// Incluye el archivo de configuración de impresion de pdf
include_once './fpdf.php';



error_reporting( E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED );
    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            $this->SetFont('Arial', 'B', 18);
            $this->Image('../img/logo.png', 10, 8, 33);
            $this->Cell(200, 5, 'CORPORATIVO SAR', 0, 0, 'C');
            $this->Ln(10);
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(200, 0, utf8_decode('NOTA DE REMISIÓN'), 0, 2, 'C');
            $this->Ln(20);
        }

        // Pie de página
        function Footer()
        {
            $this->SetY(-15); // Posición: a 1,5 cm del final
            $this->SetFont('Arial', 'I', 8); // Tipo de fuente, cursiva, tamaño
            $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); // Número de página
        }
    }
  // Recogida y limpieza de los datos del formulario POST
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$clientName = filter_input(INPUT_POST, 'clientName', FILTER_SANITIZE_STRING);
$clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
$clientDirection = filter_input(INPUT_POST, 'clientDirection', FILTER_SANITIZE_STRING);
$folio = filter_input(INPUT_POST, 'folio', FILTER_SANITIZE_STRING);
$registerDate = filter_input(INPUT_POST, 'registerDate', FILTER_SANITIZE_STRING);
$initDate = filter_input(INPUT_POST, 'initDate', FILTER_SANITIZE_STRING);
$endDate = filter_input(INPUT_POST, 'endDate', FILTER_SANITIZE_STRING);
$iva = filter_input(INPUT_POST, 'iva', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$riva = filter_input(INPUT_POST, 'riva', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$isr = filter_input(INPUT_POST, 'isr', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$subtotal = filter_input(INPUT_POST, 'subtotal', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

// Creación del PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(200, 10, utf8_decode('Direccion Generica'), 0, 0, 'C');
$pdf->Ln(1);
$pdf->Cell(200, 16, 'Telefono Generico', 0, 0, 'C');
$pdf->Ln(12);
$pdf->Cell(200, 0, utf8_decode('Correo Generico'), 0, 0, 'C');
$pdf->Ln(4);
$pdf->Cell(200, 0, utf8_decode('Pagina Web Generica'), 0, 0, 'C');
$pdf->Ln(20);

$pdf->SetFont('Arial', '', 14);
$pdf->Cell(0, 30, 'FECHA: ' . $registerDate, 0, 0, 'R');
$pdf->Ln(0);
$pdf->Cell(0, 30, 'FOLIO: ' . $folio, 0, 0, 'L');
$pdf->Ln(20);
$pdf->Cell(0, 30, 'CLIENTE: ' . $clientName, 0, 0, 'L');
$pdf->Ln(10);
$pdf->Cell(0, 25, 'DOMICILIO: ' . $clientDirection, 0, 0, 'L');
$pdf->Ln(30);



$cabecera = array('ID SERVICIO', 'CANTIDAD', 'DESCRIPCION', 'PRECIO', 'IMPORTE');
$pdf->SetFont('Arial', 'B', 10);
foreach ($cabecera as $columna) {
    $pdf->Cell(38, 7, utf8_decode($columna), 1, '', 'C');
}
$pdf->Ln();

// Datos de la tabla
$pdf->SetFont('Arial', '', 10);


//corregir  datos con los datos que verdad se piden  ID SERVICIO, CANTIDAD, DESCRIPCION, PRECIO, IMPORTE
$pdf->Cell(38, 7, $id, 1, '', 'C');
$pdf->Cell(38, 7, $isr, 1, '', 'C');
$pdf->Cell(38, 7, $clientEmail, 1, '', 'C');
$pdf->Cell(38, 7, $total, 1, '', 'C');
$pdf->Cell(38, 7, $iva, 1, '', 'C');
$pdf->Ln();


// Sección de totales
$pdf->SetXY(130, 175);
$pdf->Cell(70, 7, 'SUBTOTAL: $ ' . $subtotal . ' MXN', 1, '', 'C');
$pdf->Ln();
$pdf->SetXY(130, 185);
$pdf->Cell(70, 7, '(+) IVA: $ ' . $iva . ' MXN', 1, '', 'C');
$pdf->Ln();
$pdf->SetXY(130, 195);
$pdf->Cell(70, 7, utf8_decode('(-) RETENCIÓN IVA: $ ' . $riva . ' MXN'), 1, '', 'C');
$pdf->Ln();
$pdf->SetXY(130, 205);
$pdf->Cell(70, 7, utf8_decode('(-) RETENCIÓN ISR: $ ' . $isr . ' MXN'), 1, '', 'C');
$pdf->Ln();
$pdf->SetXY(130, 215);
$pdf->Cell(70, 7, 'TOTAL: $ ' . $total . ' MXN', 1, '', 'C');
$pdf->Ln(30);

// Imprime el PDF
$pdf->Output('Prueba.pdf', 'I', true);
?>
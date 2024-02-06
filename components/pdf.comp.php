<?php

// Path: components/pdf.comp.php
require_once 'fpdf183/fpdf.php';

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial', 'B', 18);
        $this->Image('../img/logo1.png', 10, 8, 33);
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

?>
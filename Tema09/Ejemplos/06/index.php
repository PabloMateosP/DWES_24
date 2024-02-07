<?php

/**
 *  Hola Mundo 
 */

# Cargamos clase fpdf
require('fpdf/fpdf.php');
require('class/pdfArticulos.php');

$pdf = new PdfArticulo();

// Para poner página 1-10...
$pdf->AliasNbPages();

$pdf->SetFont('Helvetica', 'B', 16);

$pdf->AddPage();

$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Puta madre peter'), 0, 0, 'R');

$pdf->Output();
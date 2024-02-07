<?php

/**
 *  Hola Mundo 
 */

# Cargamos clase fpdf
require('fpdf/fpdf.php');
//require('class/pdfArticulos.php');

$pdf = new FPDF();

$pdf->SetFont('Helvetica', 'B', 16);

$pdf->AddPage();

$pdf->Image('image/barry-y-adam-en-bee-movie.jpg', 5, 5, 200, 300);

$pdf->Output();
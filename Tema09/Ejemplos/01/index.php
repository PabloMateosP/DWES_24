<?php

/**
 *  Hola Mundo 
 */

# Cargamos clase fpdf
require('fpdf/fpdf.php');

# Creamos objeto de la clase fpdf
$pdf = new FPDF();

# Añadimos nueva página
$pdf->AddPage();

# Ponemos fuente y tamaño 
$pdf->SetFont('Arial', 'B', 16);

# Creamos la celda con una longitud de 40 px y 10 de ancho
# además declaramos que tiene que ser en español 
# pero mediante la función mb_convert_encoding
$pdf->Cell(40, 10, mb_convert_encoding('¡Mi primera página pdf con FPDF!', 'ISO-8859-1', 'UTF-8'));

# Cerramo pdf
$pdf->Output();
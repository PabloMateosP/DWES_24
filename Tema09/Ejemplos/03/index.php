<?php

/**
 *  Hola Mundo 
 */

# Cargamos clase fpdf
require('fpdf/fpdf.php');

# Creamos objeto de la clase fpdf
# L de landscape por lo que lo ponemos en apaisado
# con medida en milímetros (por defecto siempre es así)
# y formato A3 (por defecto es A4)
$pdf = new FPDF('L', 'mm', 'A3');

# Ponemos fuente y tamaño
# Se le pone familia 
# B (negrita), I (italica), U (cursiva) 
# Tamaño (por defecto es 12)
$pdf->SetFont('Helvetica', 'B', 16);

# Añadimos nueva página
$pdf->AddPage();

# Creamos la celda con una longitud de 40 px y 10 de ancho
# además declaramos que tiene que ser en español pero mediante la función iconv
$pdf->Cell(60, 10, iconv('UTF-8', 'ISO-8859-1', '¡Hola Soy Benito!'));

# --------------------------------------------------------------------

# Ponemos fuente y tamaño
# Se le pone familia 
# B (negrita), I (italica), U (cursiva) 
# Tamaño (por defecto es 12)
$pdf->SetFont('Courier', 'BU', 16);

# Añadimos nueva página
$pdf->AddPage('P');

# Creamos la celda con una longitud de 40 px y 10 de ancho
# además declaramos que tiene que ser en español pero mediante la función iconv
$pdf->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', '¡Hola Soy Benito por segunda vez!'));

# Cerramo pdf
$pdf->Output();
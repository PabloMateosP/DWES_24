<?php

/**
 *  Hola Mundo 
 */

# Cargamos clase fpdf
require('fpdf/fpdf.php');

# Declaro variables 
$id = 1;
$apellidos = 'García Pérez';
$nombre = 'Benito';

# Creamos objeto de la clase fpdf
# L de landscape por lo que lo ponemos en apaisado
# con medida en milímetros (por defecto siempre es así)
# y formato A3 (por defecto es A4)
$pdf = new FPDF('P', 'mm', 'A3');

# Ponemos fuente y tamaño
# Se le pone familia 
# B (negrita), I (italica), U (cursiva) 
# Tamaño (por defecto es 12)
$pdf->SetFont('Helvetica', 'B', 16);

# Ponemos color a la celda 
$pdf->SetFillColor(240, 130, 23);

# Añadimos nueva página
$pdf->AddPage();

# Creamos la celda con una longitud de 40 px y 10 de ancho
# además declaramos que tiene que ser en español pero mediante la función iconv

# Cell(float w [, float h [, string texto [, mixed borde [, int ln [, string 
# align [, boolean fill [, mixed link]]]]]]]) 
#      ◼ w: ancho de la celda. Si ponemos 0 la celda se extiende hasta el margen derecho. 
#      ◼ H: alto de la celda. 
#      ◼ Texto: el texto que le vamos a añadir. 
#      ◼ Borde: nos dice si van a ser visibles o no. si es 0 no serán visibles, si es 1 se verán los 
# bordes. 
#      ◼ Ln: nos dice donde se empezara a escribir después de llamar a esta función. Siendo 0 a 
# la derecha, 1 al comienzo de la siguiente línea, 2 debajo. 
#      ◼ Align: para alinear el texto. L alineado a la izquierda, C centrado y R alineado a la 
# derecha. 
#      ◼ Fill: nos dice si el fondo de la celda va a ir con color o no. los valores son True o False
$pdf->Cell(60, 10, iconv('UTF-8', 'ISO-8859-1', 'ID: '), 1, 0, 'C' , true);
$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', $id), 1, 1, 'L');

$pdf->Cell(60, 10, iconv('UTF-8', 'ISO-8859-1', 'Nombre: '), 1, 0, 'C', true);
$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', $nombre), 1, 1, 'L');

$pdf->Cell(60, 10, iconv('UTF-8', 'ISO-8859-1', 'Apellidos: '), 1, 0, 'C', true);
$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', $apellidos), 1, 1, 'L');

$pdf->Output();
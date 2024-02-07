<?php

# Clase que extiende de FPDF 
class PdfArticulo extends FPDF
{
    //Cabecera de página 
    function Header()
    {

        // En esta función pasamos como parámetro el archivo donde se encuentra la imagen, la abscisa 
        // de la esquina superior izquierda, ordenada de la esquina superior izquierda y la anchura de la   
        // imagen.
        $this->Image('barry-y-adam-en-bee-movie.jpg', 10, 5, 20);
        $this->SetFont('Arial', 'B', 10);
        // La B de la celda es para poner borde debajo de la celda 
        $this->Cell(0, 16, 'Uno me cae bien y el otro no', 'B', 1, 'R');
        // Margen con respecto a la cabecera de mierda
        

    }
}

//Creación del objeto de la clase heredada 
$pdf = new PdfArticulo();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
//Aquí escribimos lo que deseamos mostrar... 
$pdf->Output();


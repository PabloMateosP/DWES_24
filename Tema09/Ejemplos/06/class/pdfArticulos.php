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
        $this->Image('image/barry-y-adam-en-bee-movie.jpg', 10, 5, 20);
        $this->SetFont('Arial', 'B', 10);
        // La B de la celda es para poner borde debajo de la celda 
        $this->Cell(0, 10, 'Uno me cae bien y el otro no', 'B', 1, 'R');
        // Margen con respecto a la cabecera de mierda
        $this->Ln(5);

    }

    function Footer() {
        $this->SetY(-10);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 'T', 0, 'C');
    }
}
<?php
function obtenerNombre($numeroMes)
{
    //Mediante un array guardamos los meses.
    $nombres = [
        'enero',
        'febrero',
        'marzo',
        'abril',
        'mayo',
        'junio',
        'julio',
        'agosto',
        'septiembre',
        'octubre',
        'noviembre',
        'diciembre'
    ];

    //Devolvemos el número del mes menos uno ya que los arrays empiezan en cero
    //y si no se hiciese así este no sería válido.
    return $nombres[$numeroMes - 1];
}

$numeroMes = date('n');
$nombreMes = obtenerNombre($numeroMes);

echo 'Estamos en ' . $nombreMes . ', que es el mes número ' . $numeroMes;
?>
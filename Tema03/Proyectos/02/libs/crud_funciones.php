<?php

/*

función: buscar_en_tabla 
descripción: Buscamos un elemento de la tabla 

*/

function buscar_en_tabla($tabla = [], $columna, $valor)
{
    $columna_valores = array_column($tabla, $columna);

    return array_search($valor, $columna_valores, false);
}


//-------------------------------------------------------------------------------------------


/*

función: generar_Tabla()
descripción: genera la tabla de datos con la que vamos a trabajar
parámetros:

salida:
    - tabla de datos

*/

function generar_Tabla()
{
    $tabla = [
        [
            'id' => 1,
            'descripcion' => 'Portatil Acer',
            'modelo' => 'Aspire 3',
            'categoria' => 0,
            'unidades' => 100,
            'precio' => 430
        ],
        [
            'id' => 2,
            'descripcion' => 'Pantalla @lhua',
            'modelo' => 'Version 102',
            'categoria' => 3,
            'unidades' => 10,
            'precio' => 600
        ],
        [
            'id' => 3,
            'descripcion' => 'Pc Sobremesa - Lenovo Intel core',
            'modelo' => 'ideacentre 5105-07',
            'categoria' => 1,
            'unidades' => 1,
            'precio' => 200
        ],
        [
            'id' => 4,
            'descripcion' => 'Portatil LG',
            'modelo' => '340 - Intel I5',
            'categoria' => 0,
            'unidades' => 3,
            'precio' => 15
        ],
        [
            'id' => 5,
            'descripcion' => 'Placa base ',
            'modelo' => 'ASUS ROG STRIX Z790-F',
            'categoria' => 2,
            'unidades' => 100,
            'precio' => 14
        ]
    ];

    return $tabla;
}


//-------------------------------------------------------------------------------------------

/*

función: genera_tabla_categoria()
descripcion: elimina un elemento de la tabla
parámetros:
salida: 
    - tabla actualizada
    
*/

function generar_Tabla_categoria()
{

    $categorias = ['Portatiles', 'PCs sobremesa', 'Componentes', 'Pantallas', 'Impresora'];

    return $categorias;
}



//-------------------------------------------------------------------------------------------

?>
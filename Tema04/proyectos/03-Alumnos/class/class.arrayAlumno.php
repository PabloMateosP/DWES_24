<?php

/**
 * 
 * class.arrayAlumno.php
 * tabla Alumnos
 * Es un array donde cada elemento es un objeto de la clase Alumnos
 * 
 */

class arrayAlumno
{
    private $tabla;

    public function __construct()
    {
        $this->tabla = [];
    }
    //Metodo para agregar articulos a la lista

    public function getTabla()
    {
        return $this->tabla;
    }

    public function setTabla($tabla)
    {
        $this->tabla = $tabla;

        return $this;
    }

    static public function getAsignaturas()
    {
        $asignaturas = ['Base De Datos', 'Entorno de Desarrollo', 'Formación y Orientación Laboral', 'Lenguaje de Marcas y Sistemas de Gestión de Información', 'Programación',  'Sistemas Informáticos', 'Desarrollo web Entorno Cliente', 'Desarrollo web Entorno Web'];

        asort($asignaturas);

        return $asignaturas;
    }

    static public function getCursos()
    {
        $cursos = [
            '1SMR',
            '2SMR',
            '1DAW',
            '2DAW',
            '1ADI',
            '2ADI'
        ];

        asort($cursos);

        return $cursos;
    }

    public function getDatos()
    {

        #Alumno 1
        $alumno = new Alumno(
            1,
            'Portatil Acer',
            'Aspire 3',
            0,
            [1, 2],
            100,
            430.05
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 2
        $alumno = new Alumno(
            2,
            'Pantalla @lhua',
            'Version 102',
            3,
            [4, 0],
            10.5,
            600.03
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 3
        $alumno = new Alumno(
            3,
            'Pc Sobremesa - Lenovo Intel core',
            'ideacentre 5105-07',
            1,
            [1, 2, 3],
            1.75,
            200.30
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 4
        $alumno = new Alumno(
            4,
            'Portatil LG',
            '340 - Intel I5',
            0,
            [2, 3],
            3.0,
            15.7
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 5
        $alumno = new Alumno(
            5,
            'Placa base ',
            'ASUS ROG STRIX Z790-F',
            2,
            [2, 0],
            100.50,
            14.5
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

    }

    static public function mostrarCategoria($asignaturas, $categoriasArticulo)
    {
        $arrayCategoria = [];

        foreach ($categoriasArticulo as $indice) {
            $arrayCategoria[] = $asignaturas[$indice];
        }

        asort($arrayCategoria);
        return $arrayCategoria;

    }

    public function create(Alumno $data)
    {
        $this->tabla[] = $data;
    }

    public function delete($indice)
    {
        unset($this->tabla[$indice]);
    }

    public function buscarId($indice)
    {
        // retornamos los valores de ese indice en la tabla de la clase
        return $this->tabla[$indice];
    }

    public function update($indice, Alumno $alumn)
    {
        $this->tabla[$indice] = $alumno;
    }

    public function order($indice)
    {
        
    }

    public function buscarCategoria($indice)
    {

    }



}

?>
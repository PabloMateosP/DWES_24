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
        $asignaturas = ['Base De Datos', 'Entorno de Desarrollo', 'Formación y Orientación Laboral', 'Lenguaje de Marcas y Sistemas de Gestión de Información', 'Programación', 'Sistemas Informáticos', 'Desarrollo web Entorno Cliente', 'Desarrollo web Entorno Web'];

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
            'Juan Manuel',
            'Herrera Ramírez',
            'juan.herrera@gmail.com',
            '06/03/2002',
            2,
            [3, 4, 5]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 2
        $alumno = new Alumno(
            2,
            'Pablo',
            'Mateos Palas',
            'pmatpal0105@g.educaand.es',
            '01/05/2004',
            3,
            [3, 7, 8]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 3
        $alumno = new Alumno(3, 'Antonio Jesús', 'Téllez Perdigones', 'atelper@gmail.com', '10/05/1999', 2, [6, 7, 8]);

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 4
        $articulo = new Alumno(4, 'Juan Maria', 'Mateos Ponce', 'jmherrera@gmail.com', '20/10/2004', 4, [6, 7, 8] );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        $alumno = new Alumno(5, 'Jorge', 'Coronil Villalba', 'jcorvil600@gmail.com', '17/04/1997', 3, [6, 7, 8], ); 
        
        #Añadir articulo a la tabla 
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

    public function update($indice, Alumno $alumno)
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
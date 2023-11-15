<?php

/**
 * 
 * class.fp.php
 * 
 * Métodos necesarios para la gestión de la BBDD fp
 * 
 * En este caso solo métodos pertenecientes a la tabla Alumnos 
 * 
 */

class Fp extends Conexion
{

    /*
     * 
     * Método getAlumnos()
     * 
     * Devuelve un objeto con los resultados (mysqli_result)
     * con los detalles de todos los alumnos 
     *  
     */

    public function getAlumnos()
    {
        $sql = "SELECT 
                    alumnos.id, 
                    concat_ws(',', alumnos.apellidos, alumnos.nombre) nombre,
                    alumnos.email, 
                    alumnos.telefono, 
                    alumnos.direccion, 
                    alumnos.poblacion,
                    alumnos.dni, 
                    timestampdiff(YEAR, alumnos.fechaNac, NOW()) edad, 
                    cursos.nombreCorto curso 
                FROM 
                    alumnos 
                INNER JOIN 
                    cursos 
                ON alumnos.id_curso = cursos.id 
                order by id";
    }

}

?>
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
                    concat_ws(\',\', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email, 
                    alumnos.telefono,
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

        #Ejecutamos directamente SQL
        //Objeto de la clase mysqli_result
        //$result = $this->db->query($sql);

        #Mediante Plantilla SQL o Prepare
        //Objeto clase mysqli_stmt
        $stmt = $this->db->prepare($sql);

        //ejecuto
        $stmt->execute();

        //objeto clase mysqli_result
        $result = $stmt->get_result();

        return $result;
    }

    public function getCursos(){
        $sql="select id, nombreCorto curso from cursos order by id";

        # Mediante Plantilla SQL o Prepare 
        // Objeto clase prepare statement
        $stmt=$this->db->prepare($sql);
        // Ejecuto el Statement
        $stmt->execute();
        // Objeto clase mysqli_result
        $result=$stmt->get_result();

        return $result;
    }

}

?>
<!-- Uso de nomenclatura camelCase para nombre del fichero de forma obligatoria -->
<?php

/**
 * alumnosModel.php
 * 
 * Modelo del constructor alumnos
 * 
 * Definir los métodos de acceso a la BBDD
 *  - insert
 *  - update
 *  - select
 *  - delete
 *  - etc
 */

/** Uso de camelCase obligatorio */
/** Extends de Model que está en libs */
 class alumnoModel extends Model {


    /*No necesitamos constructor*/

    public function get(){

      try{

         $sql = "SELECT 
         alumnos.id,
         CONCAT_WS(', ', alumnos.apellidos, alumnos.nombre) AS alumno,
         alumnos.email,
         alumnos.telefono,
         alumnos.poblacion,
         alumnos.dni,
         TIMESTAMPDIFF(YEAR,
             alumnos.fechaNac,
             NOW()) AS edad, /** en este caso edad sería la propiedad del objeto */
         cursos.nombreCorto AS curso /** Los campos calculados requieren alias */
     FROM 
         alumnos
             INNER JOIN
         cursos ON alumnos.id_curso = cursos.id
     ORDER BY id";

         # Conectamos con la BBDD
         // bd = objeto de la clase DataBase (tiene la conexion)
         $conexion = $this->db->connect();

         # ejecutamos mediante prepare
         $pdostmt = $conexion->prepare($sql);

         # Establecemos el fetch como objeto
         $pdostmt->setFetchMode(PDO::FETCH_OBJ);

         # Ejecutamos
         $pdostmt->execute();

         # Retornamos
         return $pdostmt;

      }catch(PDOException $e){
         include('template/partials/errorDB.php');
      }

        
    }
 }


?>
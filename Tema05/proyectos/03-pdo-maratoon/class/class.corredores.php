<?php

/*
    Clase Alumnos

    Métodos específicos para BBDD
    - Alumnos
    - Cursos
*/

class Corredores extends Conexion
{

    /**
     * 
     * GetAlumnos
     * 
     * Devuelve la información de un objeto seleccionado
     * 
     */
    public function getCorredores()
    {

        $sql = "SELECT 
                    corredores.id,
                    concat_ws(', ', corredores.apellidos, corredores.nombre) corredor,
                    corredores.ciudad,
                    corredores.fechaNacimiento,
                    corredores.sexo,
                    corredores.email,
                    corredores.dni,
                    corredores.edad,
                    categorias.nombre as categorias,
                    clubs.nombre as club 
                FROM
                    corredores
                INNER JOIN
                    categorias
                ON corredores.id_categoria = categorias.id
                INNER JOIN 
                    clubs
                ON corredores.id_club = clubs.id
                ORDER BY id";

        # Prepare -> objeto
        $pdostmt = $this->pdo->prepare($sql);

        // Establezco fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        // ejecuto
        $pdostmt->execute();

        return $pdostmt;

    }

    public function getClubs()
    {

        $sql = "SELECT id, nombreCorto club FROM clubs ORDER BY id";

        # Prepare -> objeto
        $pdostmt = $this->pdo->prepare($sql);

        // Establezco fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        // ejecuto
        $pdostmt->execute();

        return $pdostmt;

    }

    public function getCategorias()
    {

        $sql = "SELECT id, nombreCorto categoria FROM categorias ORDER BY id";

        # Prepare -> objeto
        $pdostmt = $this->pdo->prepare($sql);

        // Establezco fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        // ejecuto
        $pdostmt->execute();

        return $pdostmt;

    }

    public function insertCorredor(Corredor $corredor)
    {
        try {
            # Prepare
            $sql = "Insert into corredores values (
                    null,
                    :nombre, 
                    :apellidos, 
                    :ciudad,
                    :fechaNacimiento,
                    :sexo,
                    :email,
                    :dni,
                    :edad,
                    :id_categoria,
                    :id_club
                )";

            # Objeto clase mysqli_stmt
            $pdostmt = $this->pdo->prepare($sql);

            # Vinculo parámetros con variables
            $pdostmt->bindParam(":nombre", $corredor->nombre, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':sexo', $corredor->sexo, PDO::PARAM_STR, 2);
            $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':edad', $corredor->edad, PDO::PARAM_INT, 3);
            $pdostmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT, 2);
            $pdostmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT, 2);
            

            // ejecuto
            $pdostmt->execute();

            // libero memoria
            $pdostmt = null;

            // Cerrar conexión
            $this->pdo = null;

        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }

    }

    public function getCorredor($indice)
    {
        try {

            $sql = "SELECT * FROM corredores WHERE id = :id LIMIT 1";

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':id', $indice, PDO::PARAM_INT);

            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_OBJ);

            if (!$data) {
                throw new Exception('Corredor No Encontrado');
            }

            return $data;

        } catch (Exception $e) {
            include('views/partials/errorDB.php');
            exit();
        }

    }

    public function update_corredor(Corredor $corredor, $id)
    {

        try {
            # Prepare the SQL statement
            $sql = "
                UPDATE Alumnos SET
                    nombre = :nombre,
                    apellidos = :apellidos,
                    ciudad = :ciudad,
                    fechaNacimiento = :fechaNacimiento,
                    sexo = :sexo,
                    email = :email,
                    dni = :dni,
                    edad = :edad,
                    id_categoria = :id_categoria,
                    id_club = :id_club
                WHERE id = :id";

            # Create a PDOStatement object
            $pdostmt = $this->pdo->prepare($sql);

            # Bind the parameters with values
            $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 100);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':sexo', $corredor->sexo, PDO::PARAM_STR, 2);
            $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':edad', $corredor->edad, PDO::PARAM_INT, 3);
            $pdostmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT, 2);
            $pdostmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT, 2);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT); // SE NECESITA EL id DEL ALUMNO A EDITAR PARA EL WHERE

            # Execute the SQL statement
            $pdostmt->execute();

            # Free the PDOStatement object
            $pdostmt = null;

            # Close the connection
            $this->pdo = null;
        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function delete_corredor($id_corredor)
    {
        try {

            $sql = "DELETE FROM corredores WHERE id = :id_corredor";

            echo "SQL: $sql";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            $pdostmt->bindParam(':id_corredor', $id_corredor, PDO::PARAM_INT);

            # ejecutamos sql
            $pdostmt->execute();

            # liberamos objeto 
            $pdostmt = null;

            # cerramos conexión
            $this->pdo = null;

        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }
    }

    public function order($criterio)
    {

        try {
            $sql = "SELECT 
                corredores.id,
                CONCAT_WS(', ',corredores.apellidos, corredores.nombre) as nombre,
                corredores.ciudad,
                corredores.email,
                TIMESTAMPDIFF(YEAR,
                    corredores.fechaNacimiento,
                    NOW()) AS edad,
                categorias.nombrecorto AS categoria,
                clubs.nombreCorto AS club
            FROM
                maratoon.corredores
                    INNER JOIN
                maratoon.categorias ON categorias.id = corredores.id_categoria
                    INNER JOIN
                maratoon.clubs ON clubs.id = corredores.id_club
            ORDER BY $criterio";

            // Preparo la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Elegimos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecuto la consulta
            $pdostmt->execute();

            // Devolvemos el objeto de tipo PDOStatement
            return $pdostmt;

        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    public function filter($expresion)
    {
        try {
            // Creamos sentencia
            $sql = "SELECT 
                corredores.id,
                CONCAT_WS(', ',corredores.apellidos, corredores.nombre) as nombre,
                corredores.ciudad,
                corredores.email,
                TIMESTAMPDIFF(YEAR,
                    corredores.fechaNacimiento,
                    NOW()) AS edad,
                categorias.nombrecorto AS categoria,
                clubs.nombreCorto AS club
            FROM
                maratoon.corredores
                    INNER JOIN
                maratoon.categorias ON categorias.id = corredores.id_categoria
                    INNER JOIN
                maratoon.clubs ON clubs.id = corredores.id_club
            WHERE
            CONCAT_WS('',corredores.apellidos, 
                        corredores.nombre,
                        corredores.ciudad,
                        corredores.email,
                        TIMESTAMPDIFF(YEAR,corredores.fechaNacimiento,NOW()),
                        categorias.nombrecorto,
                        clubs.nombreCorto) 
            LIKE :expresion";

            // Modificamos la expresión recibida como parametro
            $expresion = "%" . $expresion . "%";

            // Preparamos la consulta
            $pdostmt = $this->pdo->prepare($sql);

            // Asignamos el valor del parametro
            $pdostmt->bindParam(":expresion", $expresion);

            // Establecemos el tipo de fetch a usar
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos el resultado de la consulta
            return $pdostmt;
        } catch (PDOException $e) {
            include 'views/partials/errorDB.php';
            exit();
        }
    }

    public function getClub($indice)
    {
        try {

            $sql = "SELECT nombre FROM clubs WHERE id = :id LIMIT 1";

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':id', $indice, PDO::PARAM_INT);

            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_OBJ);

            if (!$data) {
                throw new Exception('Curso No Encontrado');
            }

            return $data;

        } catch (Exception $e) {
            include('views/partials/errorDB.php');
            exit();
        }

    }

    public function getCategoria($indice)
    {
        try {

            $sql = "SELECT nombre FROM categorias WHERE id = :id LIMIT 1";

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':id', $indice, PDO::PARAM_INT);

            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_OBJ);

            if (!$data) {
                throw new Exception('Curso No Encontrado');
            }

            return $data;

        } catch (Exception $e) {
            include('views/partials/errorDB.php');
            exit();
        }

    }

}

?>
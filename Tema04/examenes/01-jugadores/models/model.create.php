<?php

/**
 * Generamos nuevo jugador
 */

$jugadores = new tablaJugadores();
$jugadores->getDatos();

$paises = tablaJugadores::getPaises();
$posiciones = tablaJugadores::getPosiciones();
$equipos = tablaJugadores::getEquipos();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$pais = $_POST['pais'];
$equipo = $_POST['equipos'];
$posiciones_jugador = $_POST['posiciones'];
$contrato = $_POST['contrato'];

# Validación


# Creo un objeto clase alumno a partir de los detalles 
# del formulario 
$jugador = new Jugador(
    $id,
    $nombre,
    $numero,
    $pais,
    $equipo,
    $posiciones_jugador,
    $contrato
);



# Añadimos el jugador a la tabla 
$jugadores->create($jugador);

# Obtengo la tabla de usuarios mediante método getArray()
$t_jugadores = $jugadores->getTabla();

?>
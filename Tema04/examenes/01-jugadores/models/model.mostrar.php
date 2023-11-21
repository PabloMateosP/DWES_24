<?php

# Cargamos los jugadores 
$jugadores = new tablaJugadores();

# Obtengo arrays de paises, posiciones y equipos
$paises = tablaJugadores::getPaises();
$posiciones = tablaJugadores::getPosiciones();
$equipos = tablaJugadores::getEquipos();

# Cargo los datos
$jugadores->getDatos();

$idJugador = $_GET['key'];

$jugador = $jugadores->buscarID($idJugador);

?>
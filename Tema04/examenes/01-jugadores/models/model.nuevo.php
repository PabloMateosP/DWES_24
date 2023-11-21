<?php

    /**
    * Modelo para añadir un nuevo jugador donde tendremos que cargar los países, 
    * los equipos y las posiciones.
    */
   
    # Obtengo arrays de paises, posiciones y equipos
    $paises = tablaJugadores::getPaises();
    $posiciones = tablaJugadores::getPosiciones();
    $equipos = tablaJugadores::getEquipos();

?>
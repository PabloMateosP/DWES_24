<?php

/**
 * Creamos la clase classCliente
 * Clase Cliente con los parámetros creados en la base de datos
 */

class classCliente
{
    public $id;
    public $apellidos;
    public $nombre;
    public $telefono;
    public $ciudad;
    public $dni;
    public $email;

    # Creamos constructor 
    public function __construct(
        $id = null,
        $apellidos = null,
        $nombre = null,
        $telefono = null,
        $ciudad = null,
        $dni = null,
        $email = null
    ) {
        $this->id = $id;
        $this->apellidos = $apellidos;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        $this->dni = $dni;
        $this->email = $email;
    }
}
?>
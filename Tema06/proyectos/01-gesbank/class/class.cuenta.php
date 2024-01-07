<?php

/**
 * Creamos la clase classCuenta
 */

class classCuenta
{

    public $id;
    public $num_cuenta;
    public $id_cliente;
    public $fecha_alta;
    public $fecha_last_move;
    public $num_move;
    public $saldo;

    # Creamos constructor
    public function __construct(

        $id = null, 
        $num_cuenta = null, 
        $id_cliente = null, 
        $fecha_alta = null, 
        $fecha_last_move = null, 
        $num_move = null, 
        $saldo = null

    ) {

        $this->id = $id;
        $this->num_cuenta = $num_cuenta;
        $this->id_cliente = $id_cliente;
        $this->fecha_alta = $fecha_alta;
        $this->fecha_last_move = $fecha_last_move;
        $this->num_move = $num_move;
        $this->saldo = $saldo;
        
    }
}

?>
<?php 

    /*
    
        Nueva clase que es heredera de vehículo
    
    */ 

    class Deportivo extends Vehiculo_privado {

        // Cuando añadimos nuevos datos, el constructor de vehículo ya no nos funciona porque no usa estos parámetros,
        // por lo que deberemos de crear un nuevo constructor
        private $cilindrada;

        private $km;
        
        public function __construct($nombre = null, $modelo = null, $matricula = null, $velocidad = null, $km = null, $cilindrada = null){
            
            parent::__construct($nombre, $modelo, $matricula, $velocidad);

            $this -> cilindrada = $cilindrada;
            $this -> km = $km;
 
        }


    }

?>
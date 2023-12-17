<?php

    class Alumno Extends Controller {

        function __construct() { /**Descriptivo (no necesario, usa constructor de Controller) */

            parent ::__construct();
            
            
        } // no es necesario pero lo dejamos por convención

        /*** Este método se carga de forma automática si no se especifica segundo parámetro en la url */
        function render() { /** Vista acociada a este controlador */

            /** Creamos variable en la vista */
            $this->view->nombre = "Juan"; //-> esto equivale a $nombre = 'Juan'; (hay que hacerlo así)
            $this->view->apellidos = "Jimenez Ordoñez"; // son propiedades dentro de la vista

            $this->view->render('alumno/main/index');
        }

        /**
         * Método new
         * - Crea un nuevo alumno
         */
        function new(){
            $this->view->render('alumno/new/index');
        }


        /**
         * Metodo Show
         * - Muestra los valores de un  registro
         */
        function show($param = []) {
            $this->view->render('alumno/show/index');	

        }
    }

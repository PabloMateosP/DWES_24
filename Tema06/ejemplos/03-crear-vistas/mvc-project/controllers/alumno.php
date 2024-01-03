<?php

    class Alumno Extends Controller {

        function __construct() { /**Descriptivo (no necesario, usa constructor de Controller) */

            parent ::__construct();
            
            
        } // no es necesario pero lo dejamos por convención

        /*** Este método se carga de forma automática si no se especifica segundo parámetro en la url */
        function render() { /** Vista acociada a este controlador */

            /** Cargamos los alumnos de la tabla */
            $this->view->alumnos = $this->model->get(); // propiedad objeto de la clase statment

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

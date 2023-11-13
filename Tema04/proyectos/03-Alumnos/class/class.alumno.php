<?php

/*
    Clase articulo
*/

class Alumno
{
        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $fecha_nacimiento;
        private $curso;
        private $asignatura;


        public function __construct(
                $id = null,
                $nombre = null,
                $apellidos = null,
                $email = null,
                $fecha_nacimiento = null,
                $curso = null,
                $asignatura = null
        ) {
                $this->id = $id;
                $this->nombre = $nombre;
                $this->apellidos = $apellidos;
                $this->email = $email;
                $this->fecha_nacimiento = $fecha_nacimiento;
                $this->curso = $curso;
                $this->asignatura = $asignatura;
        }

        // getters and setters 
        public function getId()
        {
                return $this->id;
        }
        public function getNombre()
        {
                return $this->nombre;
        }
        public function getApellidos()
        {
                return $this->apellidos;
        }
        public function getEmail()
        {
                return $this->email;
        }
        public function getFechaNacimiento()
        {
                return $this->fecha_nacimiento;
        }
        public function getCurso()
        {
                return $this->curso;
        }
        public function getAsignatura()
        {
                return $this->asignatura;
        }
        public function setId($id)
        {
                $this->id = $id;
        }
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;
        }
        public function setApellidos($apellidos)
        {
                $this->apellidos = $apellidos;
        }
        public function setEmail($email)
        {
                $this->email = $email;
        }
        public function setFechaNacimiento($fecha_nacimiento)
        {
                $this->fecha_nacimiento = $fecha_nacimiento;
        }
        public function setCurso($curso)
        {
                $this->curso = $curso;
        }
        public function setAsignatura($asignatura)
        {
                $this->asignatura = $asignatura;
        }
        public function getEdad()
        {
                // Calculamos la edad a partir de la fecha de nacimiento y el dia actual.
                $fechaNac = new DateTime($this -> fecha_nacimiento);
                $hoy = new DateTime();
                # Con el -> y le damos el formato en año.
                $edad = $hoy -> diff($fechaNac)->y;
                return $edad;

        }
}





?>
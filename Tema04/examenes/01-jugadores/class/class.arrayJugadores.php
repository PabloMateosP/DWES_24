
<?php

/*
    Tabla de Usuarios.

    Es un array donde cada elemento es un objeto de la clase
    Usuario.
*/

class tablaJugadores
{

    private $tabla;

    public function __construct()
    {
        $this->tabla = [];
    }

    /**
     * Get the value of tabla
     */ 
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set the value of tabla
     *
     * @return self
     */ 
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;

        return $this;
    }

    // FUNCIONES PEDIDAS 
    public function read($indice)
    {
        return $this->tabla[$indice];
    }

    public function create(Jugador $data)
    {
        $this->tabla[] = $data;
    }

    public function update($indice, Jugador $jugador)
    {
        $this->tabla[$indice] = $jugador;
    }

    public function delete($indice)
    {
        unset($this->tabla[$indice]);
    }

    public function buscarID($indice)
    {
        return $this->tabla[$indice];
    }

    static public function getPaises() {

        $paises = array("Afganistán", "Albania", "Alemania", "Andorra", "Angola", "Antigua y Barbuda", "Arabia Saudita", "Argelia", "Argentina", "Armenia", "Australia", "Austria", "Azerbaiyán", "Bahamas", "Bangladés", "Barbados", "Baréin", "Bélgica", "Belice", "Benín", "Bielorrusia", "Birmania", "Bolivia", "Bosnia y Herzegovina", "Botsuana", "Brasil", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Catar", "Chad", "Chile", "China", "Chipre", "Ciudad del Vaticano", "Colombia", "Comoras", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España", "Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Georgia", "Ghana", "Granada", "Grecia", "Guatemala", "Guyana", "Guinea", "Guinea ecuatorial", "Guinea-Bisáu", "Haití", "Honduras", "Hungría", "India", "Indonesia", "Irak", "Irán", "Irlanda", "Islandia", "Islas Marshall", "Islas Salomón", "Israel", "Italia", "Jamaica", "Japón", "Jordania", "Kazajistán", "Kenia", "Kirguistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Marruecos", "Mauricio", "Mauritania", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montenegro", "Mozambique", "Namibia", "Nauru", "Nepal", "Nicaragua", "Níger", "Nigeria", "Noruega", "Nueva Zelanda", "Omán", "Países Bajos", "Pakistán", "Palaos", "Palestina", "Panamá", "Papúa Nueva Guinea", "Paraguay", "Perú", "Polonia", "Portugal", "Reino Unido", "República Centroafricana", "República Checa", "República de Macedonia", "República del Congo", "República Democrática del Congo", "República Dominicana", "República Sudafricana", "Ruanda", "Rumanía", "Rusia", "Samoa", "San Cristóbal y Nieves", "San Marino", "San Vicente y las Granadinas", "Santa Lucía", "Santo Tomé y Príncipe", "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Sri Lanka", "Suazilandia", "Sudán", "Sudán del Sur", "Suecia", "Suiza", "Surinam", "Tailandia", "Tanzania", "Tayikistán", "Timor Oriental", "Togo", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania", "Uganda", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Yibuti", "Zambia", "Zimbabue");

        asort($paises);
        return $paises;

    }

    static public function getPosiciones()
    {

        $posiciones = [
            'Portero',
            'Central',
            'Lateral',
            'Mediocentro',
            'Centrocampista',
            'Extremo',
            'Delantero'
        ];

        asort($posiciones);
        return $posiciones;

    }

    static public function getEquipos() {
        $equipos = [
            'Real Madrid',
            'Barcelona',
            'Betis',
            'Sevilla',
            'Valencia',
            'Rayo Vallecano',
            'Ath Bilbao',
            'Levante',
            'Real Sociedad',
            'Osasuna'
        ];

        asort($equipos);
        return $equipos;

    }

    public function getDatos() {

        $jugador = new Jugador(
            1,
            'Joaquín',
            '17',
            58,
            2,
            [5,6],
            3000000
           
        );

        # Añadir jugador a la tabla
        $this->tabla[] = $jugador;

        $jugador = new Jugador(
            2,
            'Borja Iglesias',
            '17',
            58,
            2,
            [5,6],
            7000000
           
        );

        # Añadir jugador a la tabla
        $this->tabla[] = $jugador;

        $jugador = new Jugador(
            3,
            'Alvaro Morata',
            '7',
            58,
            2,
            [5,6],
            20000000
        );
        # Añadir jugador a la tabla
        $this->tabla[] = $jugador;
        
        $jugador = new Jugador(
            4,
            'Ivan Alejo',
            '15',
            3,
            1,
            [2,3],
            1000000
        );
        # Añadir jugador a la tabla
        $this->tabla[] = $jugador;
        
        $jugador = new Jugador(
            5,
            'Gabri Veiga',
            '18',
            58,
            3,
            [2,3,4],
            4000000
        );
        # Añadir jugador a la tabla
        $this->tabla[] = $jugador;

    }

    static public function getEncabezado() {
        $encabezado = [
            'Id',
            'Nombre',
            'Num',
            'Pais',
            'Equipo',
            'Posiciones',
            'Contrato',
            'Acciones'
        ];

        return $encabezado;

    }

    # Devuelve el array con los nombres de las posiciones de un jugador
    public function listaPosiciones($indicesPosiciones, $posiciones)
    {
        $arrayPosiciones = [];

        foreach ($indicesPosiciones as $indice) {
            $arrayPosiciones[] = $posiciones[$indice];
        }

        asort($arrayPosiciones);

        return $arrayPosiciones;
    }

}
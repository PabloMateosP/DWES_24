<?php
/**
 * Implementamos el controlador cliente.php
 *      -> Se trata de una clase que hereda de Controller 
 *          - Clase controller: 
 *              - implementada en libs
 *              - será la máquina de nuestro sistema
 *      -> El constructor de esta clase hereda de Controller
 *      -> Nuestras funciones serán implementadas en esta clase
 */

class Cliente extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Funciones de Cliente
     */

    // Funcion render()
    public function render()
    {
        $this->view->title = "Home - Panel Control Clientes";

        $this->view->clientes = $this->model->get();

        $this->view->render('cliente/main/index');

    }

    // Función new()
    public function new()
    {
        $this->view->title = "Nuevo - Gestión Clientes";

        $this->view->render('cliente/new/index');
    }

    // Function create()
    public function create()
    {
        $data = new classCliente(
            null,
            $_POST['apellidos'],
            $_POST['nombre'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni'],
            $_POST['email'],

        );

        # Validación no requerida

        $this->model->create($data);

        # Redirigimos al main de cliente
        header('location:' . URL . 'cliente');
    }

    /**
     * Function edit()
     */
    public function edit($param = [])
    {
        $id_editar = $param[0];

        $this->view->id = $id_editar;

        $this->view->title = "Editar Cliente - Panel de control Clientes";

        $this->view->cliente = $this->model->read($id_editar);

        $this->view->render('cliente/edit/index');

    }

    /**
     * Function update
     */
    public function update($param = [])
    {

        $id_editar = $param[0];

        $data = new classCliente(
            null,
            $_POST['apellidos'],
            $_POST['nombre'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni'],
            $_POST['email'],
        );

        $this->model->update($data, $id_editar);

        // Cargamos el controlador principal
        header('location:' . URL . 'cliente');

    }

    /**
     * Function delete
     */
    public function delete($param = [])
    {
        $id_eliminar = $param[0];

        $this->model->delete($id_eliminar);

        // Cargamos el controlador principal
        header('location:' . URL . 'cliente');
    }

    /**
     * Function show()
     */
    public function show($param = [])
    {
        $id_mostrar = $param[0];

        $this->view->id = $id_mostrar;

        $this->view->title = "Mostrar Cliente";

        $this->view->cliente = $this->model->read($id_mostrar);

        # Cargamos vista
        $this->view->render('cliente/show/index');

    }

    public function order($param = [])
    {
        $criterio = $param[0];

        $this->view->title = "Ordenar - Panel Control Clientes";

        $this->view->clientes = $this->model->order($criterio);

        # Cargo la vista principal
        $this->view->render('cliente/main/index');
    }

    public function filter($param = [])
    {

        $expresion = $_GET['expresion'];

        $this->view->title = "Filtrar - Panel Control Clientes";

        $this->view->clientes = $this->model->filter($expresion);

        # Cargo la vista principal
        $this->view->render('cliente/main/index');
    }





}


?>
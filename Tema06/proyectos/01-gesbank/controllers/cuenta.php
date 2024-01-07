<?php
/**
 * Controlador Cuenta.php
 */

class Cuenta extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Funciones de Cuenta
     */
    
     public function render()
    {
        
        $this->view->title = "Home Cuentas";
        
        $this->view->cuentas = $this->model->get();

        $this->view->render('cuenta/main/index');

    }

    public function new()
    {
        
        $this->view->title = "Nuevo";


        $this->view->customers = $this->model->getClient();

        $this->view->render('cuenta/new/index');
    }

    public function create()
    {
        $data = new classCuenta(
            null,
            $_POST['num_cuenta'],
            $_POST['id_cliente'],
            null,
            null,
            null,
            $_POST['saldo'],

        );

        # Mediantee la función create, será usada para crear una nueva cuenta
        $this->model->create($data);

        header('location:' . URL . 'cuenta');
    }

    /**
     * Function edit()
     */
    public function edit($param = [])
    {
        $id_editar = $param[0];

        $this->view->id = $id_editar;

        $this->view->title = "Editar Cuenta";

        #Mediante la función read leeremos los datos de la cuenta 
        $this->view->cuenta = $this->model->read($id_editar);

        # Cargamos la vista
        $this->view->render('cuenta/edit/index');
    }

    public function update($param = [])
    {
        $id_editar = $param[0];

        $data = new classCuenta(
            null,
            $_POST['num_cuenta'],
            $id_editar,
            $_POST['fecha_alta'],
            $_POST['fecha_ul_mov'],
            $_POST['num_movtos'],
            $_POST['saldo'],
        );

        # Mediante la función update actualizaremos los datos de una cuenta
        $this->model->update($data, $id_editar);

        // Cargamos el controlador
        header('location:' . URL . 'cuenta');
    }

    public function delete($param = [])
    {
        $id_eliminar = $param[0];

        # Mediante la función delete eliminaremos una cuenta mediante su id
        $this->model->delete($id_eliminar);

        // Cargamos el conrtrolador 
        header('location:' . URL . 'cuenta');
    }

    /**
     * Function show()
     */
    public function show($param = [])
    {
        $id_mostrar = $param[0];

        $this->view->id = $id_mostrar;

        $this->view->title = "Mostrar Cuenta";

        # Mediante la función read extraeremos los datos de una cuenta  
        $this->view->cuenta = $this->model->read($id_mostrar);

        # Cargamos la vista
        $this->view->render('cuenta/show/index');

    }

    public function order($param = [])
    {
        $criterio = $param[0];

        $this->view->title = "Ordenar";

        # Mediante la función order ordenaremos los datos según un criterio
        $this->view->Cuentas = $this->model->order($criterio);

        # Cargo la vista principal de Cuenta
        $this->view->render('cuenta/main/index');
    }

    public function filter($param = [])
    {
        $expresion = $_GET['expresion'];

        $this->view->title = "Filtrar";

        # Mediante la función filter filtrará las cuentas que contengan
        $this->view->Cuentas = $this->model->filter($expresion);

        # Cargo la vista principal
        $this->view->render('cuenta/main/index');
    }





}


?>
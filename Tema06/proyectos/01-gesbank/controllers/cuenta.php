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
        
        $this->view->title = "Home - Panel Control Cuentas";
        
        $this->view->cuentas = $this->model->get();

        $this->view->render('cuenta/main/index');

    }

    public function new()
    {
        
        $this->view->title = "Nuevo - Gestión Cuentas";

        $this->view->customers = $this->model->getCustomerName();

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

        $this->view->title = "Editar Cuenta - Panel de control Cuentas";

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

        // actualizamos el Cuenta
        $this->model->update($data, $id_editar);

        // Cargamos el controlador
        header('location:' . URL . 'cuenta');
    }

    public function delete($param = [])
    {
        $id_eliminar = $param[0];

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

        $this->view->Cuenta = $this->model->read($id_mostrar);

        # Cargamos la vista
        $this->view->render('cuenta/show/index');

    }

    public function order($param = [])
    {
        $criterio = $param[0];

        $this->view->title = "Ordenar - Panel Control Cuentas";

        $this->view->Cuentas = $this->model->order($criterio);

        # Cargo la vista principal de Cuenta
        $this->view->render('cuenta/main/index');
    }

    public function filter($param = [])
    {
        $expresion = $_GET['expresion'];

        $this->view->title = "Filtrar - Panel Control Cuentas";

        $this->view->Cuentas = $this->model->filter($expresion);

        # Cargo la vista principal
        $this->view->render('cuenta/main/index');
    }





}


?>
<?php

class Movimientos extends Controller
{

    # Método principal. Muestra todos los clientes
    public function render($param = [])
    {
        #inicio o continuo sesion
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autentificar";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['clientes']['main']))) {
            $_SESSION['mensaje'] = "Usuario sin autentificar";
            header("location:" . URL . "index");

        } else {
            #comprobar si existe mensaje
            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);

            }

            $this->view->title = "Tabla Movimientos";
            $this->view->movimientos = $this->model->get();
            $this->view->render("movimientos/main/index");
        }
    }

    function cuenta($param = [])
    {
        session_start();

        if (!isset($_SESSION['id'])) {

            $_SESSION["mensaje"] = "Usuario debe autentificarse";
            header('Location:' . URL . "login");
        } else {
            if (isset($_SESSION["mensaje"])) {

                $this->view->mensaje = $_SESSION["mensaje"];
                unset($_SESSION["mensaje"]);
            }
        }


        $this->view->title = "Tabla Movimientos cuenta";
        $this->view->id = $param[0];
        $this->view->movimientos = $this->model->get($this->view->id);
        $this->view->render("movimientos/main/index");
    }
}
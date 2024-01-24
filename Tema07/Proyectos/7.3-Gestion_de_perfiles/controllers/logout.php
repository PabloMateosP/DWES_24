<?php

class Logout extends Controller
{
    function render()
    {
        session_start();

        # Destruir variables de sesión.
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        # Destruimos la sesión.
        session_destroy();

        header("location:" . URL . "index");
    }
}

?>
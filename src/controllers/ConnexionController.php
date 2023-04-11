<?php

class ConnexionController extends Controller {

    public function index() {

        $user_is_connected = false;
        $message = null;
        // render la page 
        $this->render('connexion.php', ['message' => $message, 'user_is_connected' => $user_is_connected]);

    }

}

?>
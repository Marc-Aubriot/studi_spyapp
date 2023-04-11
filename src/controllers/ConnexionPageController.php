<?php

if (DEBUG) { define('CONNEXIONPAGECONTROLLER', true); }

class ConnexionPageController extends Controller {

    public function index() {

        $user_is_connected = false;
        $content = 'pageConnexion';
        $message = null;
        // render la page 
        $this->render('index.php', ['content' => $content,'message' => $message, 'user_is_connected' => $user_is_connected]);

    }

}

?>
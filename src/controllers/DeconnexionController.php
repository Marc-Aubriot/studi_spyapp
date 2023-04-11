<?php

include_once ROOT.'/src/models/Admin.php';

if (DEBUG) { define('DECONNEXIONCONTROLLER', true); }

class DeconnexionController extends Controller {

    public function index()
    {
        // render la page 
        $user_is_connected = true;
        $content = 'deconnexion';
        $this->render('index.php', ['content' => $content, 'user_is_connected' => $user_is_connected]);
    }
}

?>
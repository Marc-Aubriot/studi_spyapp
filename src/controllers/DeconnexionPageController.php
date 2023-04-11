<?php

if (DEBUG) { define('DECONNEXIONPAGECONTROLLER', true); }

class DeconnexionPageController extends Controller {

    public function index() {

        $user_is_connected = false;
        $content = 'pageMissionListe';
        // render la page 
        $this->render('index.php', ['content' => $content, 'user_is_connected' => $user_is_connected]);

    }

}

?>
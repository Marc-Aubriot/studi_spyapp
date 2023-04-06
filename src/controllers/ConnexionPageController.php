<?php

if (DEBUG) { define('CONNEXIONPAGECONTROLLER', true); }

class ConnexionPageController extends Controller {

    public function index() {

        $content = 'pageConnexion';
        // render la page 
        $this->render('index.php', ['content' => $content]);

    }

}

?>
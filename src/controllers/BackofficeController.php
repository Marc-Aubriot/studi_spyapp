<?php

class BackofficeController extends Controller {

    public function index($token) {

        // check le token et user admin
        $valid_token = $this->checkToken($token);
        $user_admin = $this->checkUser();
        if (!$valid_token || !$user_admin ) {
            $this->redirectToRoute('/connexion');
        }


        $agents = $this->getList('agent');

        // render la page 
        $this->render('backoffice.php', ['agents' => $agents]);
    }
}

?>
<?php

class BackofficeController extends Controller {

    public function index($token) {

        // check le token et user admin
        if (DEBUG) {
            echo 'mode debug activé: identification annulée';
        } else {
             $valid_token = $this->checkToken($token);
            $user_admin = $this->checkUser();
            if (!$valid_token || !$user_admin ) {
                $_SESSION["user_admin"] = false;
                $_SESSION["user_token"] = null;
                $this->redirectToRoute('/connexion');
            }
        }


        $agents = $this->getList('agent');

        // render la page 
        $this->render('backoffice.php', ['agents' => $agents, 'token' => $token]);
    }
}

?>
<?php

include_once ROOT.'/src/models/Admin.php';

class CheckCredentialsController extends Controller {

    public function index()
    {
        // on récupère l'email et le mot de passe du formulaire et on appelle la methode de l'objet Admin pour check l'Admin
        $form_email = $_POST['email'];
        $form_password = $_POST['password'];
        $user = Admin::checkAdmin($form_email, $form_password);

        // on check le tableau renvoyé par la méthode Admin qui se trouve dans $user
        if ($user[1] !== 'ECHEC-MAIL' && $user[1] !== 'ECHEC-PASS') {

            //on bind l'objet Admin qui se trouve dans user[0] à la variable $admin
            $admin = $user[0];
            $message = null;
            
            // render la page
            $user_is_connected = false;
            $this->redirectToRoute('/backoffice', ['message' => $message, 'user_is_connected' => $user_is_connected]);
        } else {

            // on bind le message d'erreur et on le renvoit
            $message = $user[1];

            // render la page 
            $user_is_connected = false;
            $this->render('connexion.php', ['message' => $message, 'user_is_connected' => $user_is_connected]);
        } 
            
        

        
    }
}

?>
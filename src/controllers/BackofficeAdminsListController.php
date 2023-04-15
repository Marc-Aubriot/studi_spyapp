<?php

include_once ROOT.'/src/models/Admin.php';

class BackofficeAdminsListController extends Controller {

    public function index($token) {

        // check le token et user admin
        $valid_token = $this->checkToken($token);
        $user_admin = $this->checkUser();
        if (!$valid_token || !$user_admin ) {
            $_SESSION["user_admin"] = false;
            $_SESSION["user_token"] = null;
            $this->redirectToRoute('/connexion');
        }


        $admins = $this->getList('administrateur');
        $message = null;
        // render la page 
        $this->render('backofficeAdminsList.php', ['admins' => $admins, 'token' => $token, 'message' => $message]);
    }

    public function formhandler($token,$entity,$form_action,$payload) {

        // check le token et user admin
        $valid_token = $this->checkToken($token);
        $user_admin = $this->checkUser();
        if (!$valid_token || !$user_admin ) {
            $_SESSION["user_admin"] = false;
            $_SESSION["user_token"] = null;
            $this->redirectToRoute('/connexion');
        }

        $message = null;

        if ($entity === 'admins' && $form_action === "update") {
            $admin = Admin::getAdminById($_POST["id"]);
            $admin->updateChamp('nom', $_POST["nom"]);
            $admin->updateChamp('prénom', $_POST["prénom"]);
            $admin->updateChamp('adresse_email', $_POST["adresse"]);
            $admin->updateChamp('mot_de_passe', $_POST["pass"]);

            $message = 'Modification réussie : ADMIN '.$admin->getNom().' => '.$_POST["nom"];

        } else if ($entity === 'admins' && $form_action === "delete") {
            $admin = Admin::getAdminById($_POST["id"]);
            $admin->delete();

            $message = 'Eradication réussie : ADMIN '.$admin->getNom(). ' => supprimé';

        } else if ($entity === 'admins' && $form_action === "create") {
            $admin = new Admin($this->guidv4(), $_POST["nom"], $_POST["prénom"], $_POST["adresse"], $_POST["pass"]);
            $admin->addAdminToDatabase();

            $message = 'Création réussie : ADMIN '.$_POST["nom"].' => ajouté à la base de données';
        }

         // re render la liste mise à jour
         $admins = $this->getList('administrateur');
         $this->render('backofficeAdminsList.php', ['admins' => $admins, 'token' => $token, 'message' => $message]);
    }
}

?>
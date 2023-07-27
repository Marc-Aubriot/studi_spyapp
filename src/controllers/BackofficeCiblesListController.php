<?php

include_once ROOT.'/src/models/Cible.php';

class BackofficeCiblesListController extends Controller {

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


        $cibles = $this->getList('cible');
        $message = null;
        // render la page 
        $this->render('backofficeCiblesList.php', ['cibles' => $cibles, 'token' => $token, 'message' => $message]);
    }

    public function formhandler($token,$entity,$form_action,$payload) {

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

        $message = null;

        if ($entity === 'cibles' && $form_action === "update") {
            $cible = Cible::getCibleById($_POST["id"]);
            $cible->updateChamp('code_identification', $_POST["code"]);
            $cible->updateChamp('nom', $_POST["nom"]);
            $cible->updateChamp('prénom', $_POST["prénom"]);
            $cible->updateChamp('date_de_naissance', $_POST["date"]);
            $cible->updateChamp('nationalité', $_POST["nat"]);

            $message = 'Modification réussie : CIBLE '.$cible->getCodeIdentification().' => '.$_POST["code"];

        } else if ($entity === 'cibles' && $form_action === "delete") {
            $cible = Cible::getCibleById($_POST["id"]);
            $cible->delete();

            $message = 'Eradication réussie : CIBLE '.$cible->getCodeIdentification(). ' => supprimée';

        } else if ($entity === 'cibles' && $form_action === "create") {
            $cible = new Cible($_POST["code"], $_POST["nom"], $_POST["prénom"], $_POST["date"], $_POST["nat"]);
            $cible->addCibleToDatabase();

            $message = 'Création réussie : CIBLE '.$_POST["code"].' => ajoutée à la base de données';
        }

         // re render la liste mise à jour
         $cibles = $this->getList('cible');
         $this->render('backofficeCiblesList.php', ['cibles' => $cibles, 'token' => $token, 'message' => $message]);
    }
}

?>
<?php

include_once ROOT.'/src/models/Agent.php';

class BackofficeAgentsListController extends Controller {

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
        $message = null;
        // render la page 
        $this->render('backofficeAgentsList.php', ['agents' => $agents, 'token' => $token, 'message' => $message]);
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

        if ($entity === 'agents' && $form_action === "update") {
            $agent = Agent::getAgentById($_POST["id"]);
            $agent->updateChamp('code_identification', $_POST["code"]);
            $agent->updateChamp('nom', $_POST["nom"]);
            $agent->updateChamp('prénom', $_POST["prénom"]);
            $agent->updateChamp('date_de_naissance', $_POST["date"]);
            $agent->updateChamp('nationalité', $_POST["nat"]);
            $agent->updateChamp('spécialités', $_POST["spé"]);

            $message = 'Modification réussie : AGENT '.$agent->getCodeIdentification().' => '.$_POST["code"];

        } else if ($entity === 'agents' && $form_action === "delete") {
            $agent = Agent::getAgentById($_POST["id"]);
            $agent->delete();

            $message = 'Eradication réussie : AGENT '.$agent->getCodeIdentification(). ' => supprimé';

        } else if ($entity === 'agents' && $form_action === "create") {
            $agent = new Agent($_POST["code"], $_POST["nom"], $_POST["prénom"], $_POST["date"], $_POST["nat"], $_POST["spé"]);
            $agent->addAgentToDatabase();

            $message = 'Création réussie : AGENT '.$_POST["code"].' => ajouté à la base de données';
        }

         // re render la liste mise à jour
         $agents = $this->getList('agent');
         $this->render('backofficeAgentsList.php', ['agents' => $agents, 'token' => $token, 'message' => $message]);
    }
}

?>
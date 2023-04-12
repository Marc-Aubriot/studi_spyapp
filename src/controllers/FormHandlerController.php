<?php

include_once ROOT.'/src/models/Admin.php';
include_once ROOT.'/src/models/Agent.php';
include_once ROOT.'/src/models/Cible.php';
include_once ROOT.'/src/models/Contact.php';
include_once ROOT.'/src/models/Mission.php';
include_once ROOT.'/src/models/Planque.php';

class FormHandlerController extends Controller {

    public function index($token,$entity,$form_action,$payload) {

        // check le token et user admin
        $valid_token = $this->checkToken($token);
        $user_admin = $this->checkUser();
        if (!$valid_token || !$user_admin ) {
            $this->redirectToRoute('/connexion');
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
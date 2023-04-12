<?php

include_once ROOT.'/src/models/Planque.php';

class BackofficePlanquesListController extends Controller {

    public function index($token) {

        // check le token et user admin
        $valid_token = $this->checkToken($token);
        $user_admin = $this->checkUser();
        if (!$valid_token || !$user_admin ) {
            $this->redirectToRoute('/connexion');
        }


        $planques = $this->getList('planque');
        $message = null;
        // render la page 
        $this->render('backofficePlanquesList.php', ['planques' => $planques, 'token' => $token, 'message' => $message]);
    }

    public function formhandler($token,$entity,$form_action,$payload) {

        // check le token et user admin
        $valid_token = $this->checkToken($token);
        $user_admin = $this->checkUser();
        if (!$valid_token || !$user_admin ) {
            $this->redirectToRoute('/connexion');
        }

        $message = null;

        if ($entity === 'planques' && $form_action === "update") {
            $planque = Planque::getPlanqueById($_POST["id"]);
            $planque->updateChamp('code_identification', $_POST["code"]);
            $planque->updateChamp('adresse', $_POST["adresse"]);
            $planque->updateChamp('pays', $_POST["pays"]);
            $planque->updateChamp('type_de_mission', $_POST["type"]);

            $message = 'Modification réussie : PLANQUE '.$planque->getCodeIdentification().' => '.$_POST["code"];

        } else if ($entity === 'planques' && $form_action === "delete") {
            $planque = Planque::getPlanqueById($_POST["id"]);
            $planque->delete();

            $message = 'Eradication réussie : PLANQUE '.$planque->getCodeIdentification(). ' => supprimée';

        } else if ($entity === 'planques' && $form_action === "create") {
            $planque = new Planque($_POST["code"], $_POST["adresse"], $_POST["pays"], $_POST["type"]);
            $planque->addPlanqueToDatabase();

            $message = 'Création réussie : PLANQUE '.$_POST["code"].' => ajoutée à la base de données';
        }

         // re render la liste mise à jour
         $planques = $this->getList('planque');
         $this->render('backofficePlanquesList.php', ['planques' => $planques, 'token' => $token, 'message' => $message]);
    }
}

?>
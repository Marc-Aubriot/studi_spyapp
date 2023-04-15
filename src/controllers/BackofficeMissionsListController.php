<?php

include_once ROOT.'/src/models/Mission.php';

class BackofficeMissionsListController extends Controller {

    public function index($token) {

        // check le token et user admin
        $valid_token = $this->checkToken($token);
        $user_admin = $this->checkUser();
        if (!$valid_token || !$user_admin ) {
            $_SESSION["user_admin"] = false;
            $_SESSION["user_token"] = null;
            $this->redirectToRoute('/connexion');
        }


        $missions = $this->getList('mission');
        $message = null;
        // render la page 
        $this->render('backofficemissionsList.php', ['missions' => $missions, 'token' => $token, 'message' => $message]);
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

        if ($entity === 'missions' && $form_action === "update") {
            $mission = Mission::getMissionById($_POST["id"]);
            $mission->updateChamp('nom_de_code', $_POST["code"]);
            $mission->updateChamp('titre', $_POST["title"]);
            $mission->updateChamp('description_de_mission', $_POST["desc"]);
            $mission->updateChamp('pays', $_POST["pays"]);
            $mission->updateChamp('agents', $_POST["agents"]);
            $mission->updateChamp('contacts', $_POST["contacts"]);
            $mission->updateChamp('cibles', $_POST["cibles"]);
            $mission->updateChamp('type_de_mission', $_POST["type"]);
            $mission->updateChamp('statut', $_POST["statut"]);
            $mission->updateChamp('planques', $_POST["planques"]);
            $mission->updateChamp('spécialités', $_POST["spé"]);
            $mission->updateChamp('date_début', $_POST["debut"]);
            $mission->updateChamp('date_fin', $_POST["fin"]);

            $message = 'Modification réussie : MISSION '.$mission->getNomDeCode().' => '.$_POST["code"];

        } else if ($entity === 'missions' && $form_action === "delete") {
            $mission = Mission::getMissionById($_POST["id"]);
            $mission->delete();

            $message = 'Eradication réussie : MISSION '.$mission->getNomDeCode(). ' => supprimée';

        } else if ($entity === 'missions' && $form_action === "create") {
            $mission = new Mission($_POST["code"], $_POST["title"], $_POST["desc"], $_POST["pays"], $_POST["agents"], 
            $_POST["contacts"], $_POST["cibles"], $_POST["type"], $_POST["statut"], $_POST["planques"], 
            $_POST["spé"], $_POST["debut"], $_POST["fin"]);
            $mission->addMissionToDatabase();

            $message = 'Création réussie : MISSION '.$_POST["code"].' => ajoutée à la base de données';
        }

         // re render la liste mise à jour
         $missions = $this->getList('mission');
         $this->render('backofficeMissionsList.php', ['missions' => $missions, 'token' => $token, 'message' => $message]);
    }
}

?>
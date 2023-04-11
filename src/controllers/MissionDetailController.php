<?php

include_once ROOT . '/src/models/Mission.php';

class MissionDetailController extends Controller {

    public function index($slug) {

        // fetch la mission par son nom de code via le slug
        $mission = Mission::getMissionById($slug);   

        $message = null;
        $user_is_connected = false;
        // render la page 
        $this->render('missionDetail.php', ['mission' => $mission, 'message' => $message, 'user_is_connected' => $user_is_connected]);
        
    }
}

?>
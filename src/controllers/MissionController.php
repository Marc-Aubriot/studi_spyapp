<?php

include_once ROOT . '/src/models/Mission.php';
if (DEBUG) { define('MISSIONCONTROLLER', true); }

class MissionController extends Controller {

    public function index($slug) {

        // fetch la mission par son nom de code via le slug
        $mission = Mission::getMissionById($slug);   

        $message = null;
        $user_is_connected = false;
        $content = 'pageMissionDetail';
        // render la page 
        $this->render('index.php', ['mission' => $mission, 'content' => $content, 'message' => $message, 'user_is_connected' => $user_is_connected]);
        
    }
}

?>
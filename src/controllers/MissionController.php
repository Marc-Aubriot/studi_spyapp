<?php

include_once ROOT . '/src/models/Mission.php';
if (DEBUG) { define('MISSIONCONTROLLER', true); }

class MissionController extends Controller {

    public function index($slug) {

        // fetch la mission par son nom de code via le slug
        $mission = Mission::getMissionById($slug);   

        $detail = true;
        // render la page 
        $this->render('index.php', ['mission' => $mission, 'detail' => $detail]);
        
    }
}

?>
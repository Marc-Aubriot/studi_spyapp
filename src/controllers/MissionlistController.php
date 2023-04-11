<?php

include_once ROOT . '/src/models/Mission.php';

class MissionListController extends Controller {

    public function index() {

        $missions = $this->getList('mission');

        $message = null;
        // render la page 
        $this->render('missionList.php', ['missions' => $missions, 'message' => $message]);

    }
}

?>
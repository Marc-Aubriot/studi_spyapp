<?php

include_once ROOT . '/src/models/Mission.php';

class MissionListController extends Controller {

    public function index() {

        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('SELECT * FROM mission');

        // Exécution de la requête
        $stmt->execute();

        $missions = $stmt->fetchAll();    
        $user_is_connected = false;
        $message = null;
        // render la page 
        $this->render('missionList.php', ['missions' => $missions, 'message' => $message, 'user_is_connected' => $user_is_connected]);

    }
}

?>
<?php

include_once ROOT . '/src/models/Mission.php';
if (DEBUG) { define('INDEXCONTROLLER', true); }

class IndexController extends Controller {

    public function index() {

        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('SELECT * FROM mission');

        // Exécution de la requête
        $stmt->execute();

        $missions = $stmt->fetchAll();    
        $detail = false;
        // render la page 
        $this->render('index.php', ['missions' => $missions, 'detail' => $detail]);

    }
}

?>
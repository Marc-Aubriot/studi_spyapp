<?php

if (DEBUG) { define('BACKOFFICECONTROLLER', true); }

class BackofficeController extends Controller {

    public function index() {

        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('SELECT * FROM mission');

        // Exécution de la requête
        $stmt->execute();

        $user_is_connected = true;
        $missions = $stmt->fetchAll();    
        $content = 'pageBackoffice';
        // render la page 
        $this->render('index.php', ['missions' => $missions, 'content' => $content, 'user_is_connected' => $user_is_connected]);

    }
}

?>
<?php

class Controller {

    public function render(string $fichier, array $data = []){
        // Récupère les données et les extrait sous forme de variables
        extract($data);

        // Crée le chemin et inclut le fichier de vue
        require_once(ROOT.'/src/views/pages/'.$fichier);
    }

    public function redirectToRoute(string $route, array $datas = []){
        // Récupère les données et les extrait sous forme de variables
        extract($datas);

        $path = URLDUSITE.'public'.$route;

        //if ($datas) {
            foreach ($datas as $data) {
                $path = $path.'/'.$data;
            }
        //}


        // Crée le chemin et inclut le fichier de vue
        header('Location: '.$path);
    }

    public function checkToken(string $token)
    {
        // récupère le token et renvoit true si le token correspond
        if ($_SESSION["user_token"] === $token ) {
            return true;
        } else {
            return false;
        }
    }

    public function checkUser()
    {
        // si l'user est flag comme un admin, retourne true
        if ($_SESSION["user_admin"]) {
            return true;
        } else {
            return false;
        }
    }

    public function getList(string $table)
    {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('SELECT * FROM '.$table);

        // Exécution de la requête
        $stmt->execute();

        return $stmt->fetchAll();
    }
}

?>
<?php

class Planque
{
    private $code_identification;
    private $adresse;
    private $pays;
    private $type_de_mission;
    
    public function __construct($code_identification, $adresse, $pays, $type_de_mission)
    {
        $this->code_identification = $code_identification;
        $this->adresse = $adresse;
        $this->pays = $pays;
        $this->type_de_mission = $type_de_mission;
    }

    // Fonction pour ajouter un nouvelle Planque en base de données
    private function addPlanqueToDatabase() {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('INSERT INTO planque (code_identification, adresse, pays, type_de_mission) VALUES (:code_identification, :adresse, :pays, :type_de_mission)');

        // Attribution des valeurs aux paramètres de la requête
        $stmt->bindValue(':code_identification', $this->code_identification);
        $stmt->bindValue(':adresse', $this->adresse);
        $stmt->bindValue(':pays', $this->pays);
        $stmt->bindValue(':type_de_mission', $this->type_de_mission);
        // Exécution de la requête
        $stmt->execute();

        // Cloture la connexion
        $conn = null;
    }

    // Fonction pour récupérer les informations de la Planque dans la base de données en utilisant son code d'identification
    public static function getPlanqueById($planque_id) {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('SELECT * FROM planque WHERE code_identification = :code_identification');

        // Attribution des valeurs aux paramètres de la requête
        $stmt->bindValue(':code_identification', $planque_id);

        // Exécution de la requête
        $stmt->execute();

        // Récupération du résultat sous forme d'objet Planque
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return new Planque($result['code_identification'], $result['adresse'], $result['pays'], $result['type_de_mission']);
        } else {
            return null;
        }

        // Cloture la connexion
        $conn = null;
    }
    
    // Fonction pour mettre à jour un champ de la Planque dans la base de données
    public function updateChamp($champ, $nouvelleValeur) {
        $db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
        $query = "UPDATE planque SET " . $champ . "=:nouvelleValeur WHERE code_identification=:code_identification";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nouvelleValeur', $nouvelleValeur);
        $stmt->bindParam(':code_identification', $this->code_identification);
        $stmt->execute();

        // Cloture la connexion
        $db = null;
    }

     // Fonction pour delete la Planque dans la base de données
    public function delete() {
        $db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
        $sql = "DELETE FROM planque WHERE code_identification = :code_identification";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':code_identification', $this->code_identification, PDO::PARAM_STR);
        $stmt->execute();

        // Cloture la connexion
        $db = null;
    }

    // Méthodes pour racevoir les paramètres de la Planque
    public function getCodeIdentification()
    {
        return $this->code_identification;
    }
    
    public function getAdresse()
    {
        return $this->adresse;
    }
    
    public function getPays()
    {
        return $this->pays;
    }
    
    public function getTypeDeMission()
    {
        return $this->type_de_mission;
    }

    
    // Méthodes pour modifier les paramètres de la Planque
    public function setCodeIdentification($nouveau_code_identification) {
        $this->code_identification = $nouveau_code_identification;
    }

    public function setAdresse($nouvelle_adresse) {
        $this->adresse = $nouvelle_adresse;
    }

    public function setPays($nouveau_pays) {
        $this->pays = $nouveau_pays;
    }

    public function setTypeDeMission($nouveau_type_de_mission) {
        $this->type_de_mission = $nouveau_type_de_mission;
    }


    
}



?>
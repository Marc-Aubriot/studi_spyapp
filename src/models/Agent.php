<?php

class Agent
{
    private $code_identification;
    private $nom;
    private $prenom;
    private $date_de_naissance;
    private $nationalite;
    private $specialite;
    
    public function __construct($code_identification, $nom, $prenom, $date_de_naissance, $nationalite, $specialite)
    {
        $this->code_identification = $code_identification;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_de_naissance = $date_de_naissance;
        $this->nationalite = $nationalite;
        $this->specialite = $specialite;
    }

    // Fonction pour ajouter un nouvel agent en base de données
    private function addAgentToDatabase() {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('INSERT INTO agent (code_identification, nom, prénom, date_de_naissance, nationalite) VALUES (:code_identification, :nom, :prénom, :date_de_naissance, :nationalité, :spécialités)');

        // Attribution des valeurs aux paramètres de la requête
        $stmt->bindValue(':code_identification', $this->code_identification);
        $stmt->bindValue(':nom', $this->nom);
        $stmt->bindValue(':prénom', $this->prenom);
        $stmt->bindValue(':date_naissance', $this->date_de_naissance);
        $stmt->bindValue(':nationalité', $this->nationalite);
        $stmt->bindValue(':spécialités', $this->specialite);
        // Exécution de la requête
        $stmt->execute();

        // Cloture la connexion
        $conn = null;
    }

    // Fonction pour récupérer les informations de l'agent dans la base de données en utilisant son code d'identification
    public static function getAgentById($agent_id) {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('SELECT * FROM agent WHERE code_identification = :code_identification');

        // Attribution des valeurs aux paramètres de la requête
        $stmt->bindValue(':code_identification', $agent_id);

        // Exécution de la requête
        $stmt->execute();

        // Récupération du résultat sous forme d'objet Agent
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return new Agent($result['code_identification'], $result['nom'], $result['prénom'], $result['date_de_naissance'], $result['nationalité'], $result['spécialités']);
        } else {
            return null;
        }

        // Cloture la connexion
        $conn = null;
    }
    
    public function getCodeIdentification()
    {
        return $this->code_identification;
    }
    
    public function getNom()
    {
        return $this->nom;
    }
    
    public function getPrenom()
    {
        return $this->prenom;
    }
    
    public function getDateDeNaissance()
    {
        return $this->date_de_naissance;
    }
    
    public function getNationalite()
    {
        return $this->nationalite;
    }
    
    public function getSpecialite()
    {
        return $this->specialite;
    }
}



?>
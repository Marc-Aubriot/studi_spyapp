<?php

class Admin
{
    private $id;
    private $nom;
    private $prenom;
    private $adresse_email;
    private $mot_de_passe;
    private $date_creation;
    
    public function __construct($id, $nom, $prenom, $adresse_email, $mot_de_passe, $date_creation)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse_email = $adresse_email;
        $this->mot_de_passe = $mot_de_passe;
        $this->date_creation = $date_creation;
    }

    // Fonction pour ajouter un nouvel Admin en base de données
    private function addAdminToDatabase() {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('INSERT INTO administrateur (ID, nom, prénom, adresse_email, mot_de_passe) VALUES (:id, :nom, :prénom, :adresse_email, :mot_de_passe)');

        // Attribution des valeurs aux paramètres de la requête
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':nom', $this->nom);
        $stmt->bindValue(':prénom', $this->prenom);
        $stmt->bindValue(':adresse_email', $this->adresse_email);
        $stmt->bindValue(':mot_de_passe', $this->mot_de_passe);
        // Exécution de la requête
        $stmt->execute();

        // Cloture la connexion
        $conn = null;
    }

    // Fonction pour récupérer les informations de l'Administrateur' dans la base de données en utilisant son code d'identification
    public static function getAdminById($admin_id) {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('SELECT * FROM administrateur WHERE ID = :id');

        // Attribution des valeurs aux paramètres de la requête
        $stmt->bindValue(':id', $admin_id);

        // Exécution de la requête
        $stmt->execute();

        // Récupération du résultat sous forme d'objet Administrateur
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return new Admin($result['ID'], $result['nom'], $result['prénom'], $result['adresse_email'], $result['mot_de_passe'], $result['date_création']);
        } else {
            return null;
        }

        // Cloture la connexion
        $conn = null;
    }
    
    // Fonction pour mettre à jour un champ d'Admin dans la base de données
    public function updateChamp($champ, $nouvelleValeur) {
        $db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
        $query = "UPDATE administrateur SET " . $champ . "=:nouvelleValeur WHERE ID=:id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nouvelleValeur', $nouvelleValeur);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        // Cloture la connexion
        $db = null;
    }

     // Fonction pour delete l'Administrateur dans la base de données
    public function delete() {
        $db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
        $sql = "DELETE FROM administrateur WHERE ID = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_STR);
        $stmt->execute();

        // Cloture la connexion
        $db = null;
    }

    // Méthodes pour racevoir les paramètres de l'Admin'
    public function getId()
    {
        return $this->id;
    }
    
    public function getNom()
    {
        return $this->nom;
    }
    
    public function getPrenom()
    {
        return $this->prenom;
    }
    
    public function getAdresseEmail()
    {
        return $this->adresse_email;
    }
    
    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    public function getDateCreation()
    {
        return $this->date_creation;
    }
    
    // Méthodes pour modifier les paramètres de l'Admin'
    public function setId($nouvel_Id) {
        $this->id = $nouvel_Id;
    }

    public function setNom($nouveau_nom) {
        $this->nom = $nouveau_nom;
    }

    public function setPrenom($nouveau_prenom) {
        $this->prenom = $nouveau_prenom;
    }

    public function setAdresseEmail($nouvelle_adresse_email) {
        $this->adresse_email = $nouvelle_adresse_email;
    }
}



?>
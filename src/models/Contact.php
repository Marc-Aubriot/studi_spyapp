<?php

class Contact
{
    private $code_identification;
    private $nom;
    private $prenom;
    private $date_de_naissance;
    private $nationalite;
    
    public function __construct($code_identification, $nom, $prenom, $date_de_naissance, $nationalite)
    {
        $this->code_identification = $code_identification;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_de_naissance = $date_de_naissance;
        $this->nationalite = $nationalite;
    }

    // Fonction pour ajouter un nouveau Contact en base de données
    public function addContactToDatabase() {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('INSERT INTO contact (code_identification, nom, prénom, date_de_naissance, nationalité)
        VALUES (:id, :val1, :val2, :val3, :val4)');

        // Exécution de la requête
        $stmt->execute(
            array(':id' => $this->code_identification, 
            ':val1' => $this->nom, 
            ':val2' => $this->prenom, 
            ':val3' => $this->date_de_naissance, 
            ':val4' => $this->nationalite, 
        ));

        // Cloture la connexion
        $conn = null;
    }

    // Fonction pour récupérer les informations du Contact dans la base de données en utilisant son code d'identification
    public static function getContactById($contact_id) {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('SELECT * FROM contact WHERE code_identification = :code_identification');

        // Attribution des valeurs aux paramètres de la requête
        $stmt->bindValue(':code_identification', $contact_id);

        // Exécution de la requête
        $stmt->execute();

        // Récupération du résultat sous forme d'objet Contact
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return new Contact($result['code_identification'], $result['nom'], $result['prénom'], $result['date_de_naissance'], $result['nationalité']);
        } else {
            return null;
        }

        // Cloture la connexion
        $conn = null;
    }
    
    // Fonction pour mettre à jour un champ du Contact dans la base de données
    public function updateChamp($champ, $nouvelleValeur) {
        $db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
        $query = "UPDATE contact SET " . $champ . "=:nouvelleValeur WHERE code_identification=:code_identification";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nouvelleValeur', $nouvelleValeur);
        $stmt->bindParam(':code_identification', $this->code_identification);
        $stmt->execute();

        // Cloture la connexion
        $db = null;
    }

     // Fonction pour delete le Contact dans la base de données
    public function delete() {
        $db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
        $sql = "DELETE FROM contact WHERE code_identification = :code_identification";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':code_identification', $this->code_identification, PDO::PARAM_STR);
        $stmt->execute();

        // Cloture la connexion
        $db = null;
    }

    // Méthodes pour racevoir les paramètres du Contact
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

    
    // Méthodes pour modifier les paramètres du Contact
    public function setCodeIdentification($nouveau_code_identification) {
        $this->code_identification = $nouveau_code_identification;
    }

    public function setNom($nouveau_nom) {
        $this->nom = $nouveau_nom;
    }

    public function setPrenom($nouveau_prenom) {
        $this->prenom = $nouveau_prenom;
    }

    public function setDateDeNaissance($nouvelle_date_de_naissance) {
        $this->date_de_naissance = $nouvelle_date_de_naissance;
    }

    public function setNationalite($nouvelle_nationalite) {
        $this->nationalite = $nouvelle_nationalite;
    }


    
}



?>
<?php

class Mission
{
    private $nom_de_code;
    private $titre;
    private $description_de_mission;
    private $pays;
    private $agents;
    private $contacts;
    private $cibles;
    private $type_de_mission;
    private $statut;
    private $planques;
    private $specialites;
    private $date_debut;
    private $date_fin;
    
    public function __construct($nom_de_code, $titre, $description_de_mission, $pays, $agents, $contacts, $cibles, $type_de_mission, $statut, $planques, $specialites, $date_debut, $date_fin)
    {
        $this->nom_de_code = $nom_de_code;
        $this->titre = $titre;
        $this->description_de_mission = $description_de_mission;
        $this->pays = $pays;
        $this->agents = $agents;
        $this->contacts = $contacts;
        $this->cibles = $cibles;
        $this->type_de_mission = $type_de_mission;
        $this->statut = $statut;
        $this->planques = $planques;
        $this->specialites = $specialites;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
    }

    // Fonction pour ajouter une nouvelle mission en base de données
    private function addMissionToDatabase() {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('INSERT INTO mission (nom_de_code, titre, description_de_mission, pays, agents, contacts, cibles, type_de_mission, statut, planques, spécialités, date_début, date_fin) 
        VALUES (:nom_de_code, :titre, :description_de_mission, :pays, :agents, :contacts, :cibles, :type_de_mission, :statut, :planques, :specialites, :date_debut, :date_fin)');

        // Attribution des valeurs aux paramètres de la requête
        $stmt->bindValue(':nom_de_code', $this->nom_de_code);
        $stmt->bindValue(':titre', $this->titre);
        $stmt->bindValue(':description_de_mission', $this->description_de_mission);
        $stmt->bindValue(':pays', $this->pays);
        $stmt->bindValue(':agents', $this->agents);
        $stmt->bindValue(':contacts', $this->contacts);
        $stmt->bindValue(':cibles', $this->cibles);
        $stmt->bindValue(':type_de_mission', $this->type_de_mission);
        $stmt->bindValue(':statut', $this->statut);
        $stmt->bindValue(':planques', $this->planques);
        $stmt->bindValue(':specialites', $this->specialites);
        $stmt->bindValue(':date_debut', $this->date_debut);
        $stmt->bindValue(':date_fin', $this->date_fin);

        // Exécution de la requête
        $stmt->execute();

        // Cloture la connexion
        $conn = null;
    }

    // Fonction pour récupérer les informations de la mission dans la base de données en utilisant son code d'identification
    public static function getMissionById($mission_id) {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);

        // Préparation de la requête
        $stmt = $conn->prepare('SELECT * FROM mission WHERE nom_de_code = :nom_de_code');

        // Attribution des valeurs aux paramètres de la requête
        $stmt->bindValue(':nom_de_code', $mission_id);

        // Exécution de la requête
        $stmt->execute();

        // Récupération du résultat sous forme d'objet Mission
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return new Mission($result['nom_de_code'], $result['titre'], $result['description_de_mission'], $result['pays'], $result['agents'], $result['contacts'], $result['cibles'], $result['type_de_mission'], $result['statut'], $result['planques'], $result['spécialités'], $result['date_début'], $result['date_fin']);
        } else {
            return null;
        }

        // Cloture la connexion
        $conn = null;
    }
    
    // Fonction pour mettre à jour un champ de la mission dans la base de données
    public function updateChamp($champ, $nouvelleValeur) {
        $db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
        $query = "UPDATE mission SET " . $champ . "=:nouvelleValeur WHERE nom_de_code=:nom_de_code";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nouvelleValeur', $nouvelleValeur);
        $stmt->bindParam(':nom_de_code', $this->nom_de_code);
        $stmt->execute();

        // Cloture la connexion
        $db = null;
    }

     // Fonction pour delete la mission dans la base de données
    public function delete() {
        $db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
        $sql = "DELETE FROM mission WHERE nom_de_code = :nom_de_code";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nom_de_code', $this->nom_de_code, PDO::PARAM_STR);
        $stmt->execute();

        // Cloture la connexion
        $db = null;
    }

    // Méthodes pour racevoir les paramètres de la mission
    public function getNomDeCode()
    {
        return $this->nom_de_code;
    }
    
    public function getTitre()
    {
        return $this->titre;
    }
    
    public function getDescriptionDeMission()
    {
        return $this->description_de_mission;
    }
    
    public function getPays()
    {
        return $this->pays;
    }
    
    public function getAgents()
    {
        return $this->agents;
    }
    
    public function getContacts()
    {
        return $this->contacts;
    }

    public function getCibles()
    {
        return $this->cibles;
    }

    public function getTypeDeMission()
    {
        return $this->type_de_mission;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getPlanques()
    {
        return $this->planques;
    }

    public function getSpecialites()
    {
        return $this->specialites;
    }

    public function getDateDebut()
    {
        return $this->date_debut;
    }

    public function getDateFin()
    {
        return $this->date_fin;
    }

    // Méthodes pour modifier les paramètres de la Mission
    public function setNomDeCode($nouveau_nom_de_code) {
        $this->nom_de_code = $nouveau_nom_de_code;
    }

    public function setTitre($nouveau_titre) {
        $this->titre = $nouveau_titre;
    }
    
    public function setDescriptionDeMission($nouvelle_description_de_mission) {
        $this->description_de_mission = $nouvelle_description_de_mission;
    }

    public function setPays($nouveau_pays) {
        $this->pays = $nouveau_pays;
    }

    public function setAgents($nouveau_agents) {
        $this->agents = $nouveau_agents;
    }

    public function setContacts($nouveau_contacts) {
        $this->contacts = $nouveau_contacts;
    }

    public function setCibles($nouvelle_cibles) {
        $this->cibles = $nouvelle_cibles;
    }

    public function setTypeDeMission($nouveaux_type_de_mission) {
        $this->type_de_mission = $nouveaux_type_de_mission;
    }

    public function setStatut($nouveau_statut) {
        $this->statut = $nouveau_statut;
    }

    public function setPlanques($nouvelles_planques) {
        $this->planques = $nouvelles_planques;
    }

    public function setSpecialites($nouvelles_specialites) {
        $this->specialites = $nouvelles_specialites;
    }

    public function setDateDebut($nouvelle_date_debut) {
        $this->date_debut = $nouvelle_date_debut;
    }

    public function setDateFin($nouvelle_date_fin) {
        $this->date_fin = $nouvelle_date_fin;
    }
}



?>
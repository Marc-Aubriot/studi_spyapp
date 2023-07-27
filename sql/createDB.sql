# on créé la DB (modifier le nom de la DB dans la requête CREATE DATABASE & USE en fonction des besoins de la DB du serveur)
CREATE DATABASE spyappDB;
USE spyappDB;

# on créé les tables
CREATE TABLE administrateur (
	ID CHAR(36) PRIMARY KEY,
    nom VARCHAR(40),
    prénom VARCHAR(80),
    adresse_email VARCHAR(100),
    mot_de_passe VARCHAR(255),
    date_création DATETIME DEFAULT current_timestamp
);

CREATE TABLE agent (
	code_identification VARCHAR(255) PRIMARY KEY,
    nom VARCHAR(40),
    prénom VARCHAR(50),
    date_de_naissance DATE,
    nationalité CHAR(3),
    spécialités VARCHAR(255),
    mission_ID VARCHAR(255)
);

CREATE TABLE cible (
	code_identification VARCHAR(255) PRIMARY KEY,
    nom VARCHAR(40),
    prénom VARCHAR(50),
    date_de_naissance DATE,
    nationalité CHAR(3),
    mission_ID VARCHAR(255)
);

CREATE TABLE contact (
	code_identification VARCHAR(255) PRIMARY KEY,
    nom VARCHAR(40),
    prénom VARCHAR(50),
    date_de_naissance DATE,
    nationalité CHAR(3),
    mission_ID VARCHAR(255)
);

CREATE TABLE planque (
	code_identification VARCHAR(255) PRIMARY KEY,
    adresse VARCHAR(255),
    pays CHAR(3),
    type_de_mission VARCHAR(255),
    mission_ID VARCHAR(255)
);

CREATE TABLE mission (
	nom_de_code VARCHAR(255) PRIMARY KEY,
    titre VARCHAR(100),
    description_de_mission TEXT,
    pays CHAR(3),
    agents VARCHAR(255),
    contacts VARCHAR(255),
    cibles VARCHAR(255),
    type_de_mission VARCHAR(255),
    statut VARCHAR(20),
    planques VARCHAR(100),
    spécialités VARCHAR(255),
    date_début DATE,
    date_fin DATE
);

# on ajoute les clés étrangères
ALTER TABLE agent ADD FOREIGN KEY (mission_ID) REFERENCES mission(nom_de_code);
ALTER TABLE cible ADD FOREIGN KEY (mission_ID) REFERENCES mission(nom_de_code);
ALTER TABLE contact ADD FOREIGN KEY (mission_ID) REFERENCES mission(nom_de_code);
ALTER TABLE planque ADD FOREIGN KEY (mission_ID) REFERENCES mission(nom_de_code);
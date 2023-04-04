# on génère des fakes datas pour remplir nos tables
INSERT INTO administrateur(ID, nom, prénom, adresse_email, mot_de_passe) 
VALUES (UUID(), 'AUBRIOT', 'MARC', 'marc.aubriot@outlook.fr', 'hashmypass');

INSERT INTO agent (code_identification, nom, prénom, date_de_naissance, nationalité, spécialités)
VALUES 
  ('007', 'Bond', 'James', '1963-05-15', 'GBR', 'espionnage'),
  ('Notorious', 'Grant', 'T.H.', '1974-12-28', 'GBR', 'espionnage'),
  ('Black Widow', 'Romanoff', 'Natasha', '1984-11-22', 'RUS', 'infiltration'),
  ('Undertaker', 'Jones', 'Mark', '1965-03-24', 'USA', 'assassinat'),
  ('Crimson Tide', 'Hunter', 'Frank', '1960-11-12', 'USA', 'sabotage'),
  ('Red Sparrow', 'Egorova', 'Dominika', '1990-06-22', 'RUS', 'infiltration'),
  ('Matryoshka', 'Ivanova', 'Olga', '1980-08-09', 'RUS', 'infiltration'),
  ('Bear', 'Petrenko', 'Dmitri', '1985-01-17', 'RUS', 'assassinat'),
  ('Spassky', 'Petrov', 'Sergei', '1971-07-03', 'RUS', 'espionnage'),
  ('Tovarisch', 'Ivanov', 'Igor', '1982-04-09', 'RUS', 'sabotage'),
  ('Ovechkin', 'Alex', 'Mikhailovich', '1985-09-17', 'RUS', 'infiltration'),
  ('Popov', 'Georgi', 'Nikolaevich', '1962-12-02', 'RUS', 'espionnage'),
  ('Suvorov', 'Viktor', 'Alexandrovich', '1978-06-18', 'RUS', 'assassinat'),
  ('Zolotov', 'Grigori', 'Vladimirovich', '1995-02-07', 'RUS', 'sabotage'),
  ('Kuznetsov', 'Alexei', 'Ivanovich', '1992-09-30', 'RUS', 'infiltration'),
  ('Rodchenkov', 'Grigory', 'Genrikhovich', '1958-07-26', 'RUS', 'espionnage'),
  ('Smirnov', 'Nikolai', 'Pavlovich', '1966-11-05', 'RUS', 'assassinat'),
  ('Babushka', 'Ivanova', 'Maria', '1990-04-14', 'RUS', 'infiltration'),
  ('Kovalchuk', 'Sergei', 'Nikolaevich', '1983-12-22', 'RUS', 'sabotage'),
  ('Gagarin', 'Yuri', 'Alexeyevich', '1934-03-09', 'RUS', 'espionnage');

   
INSERT INTO cible (code_identification, nom, prénom, date_de_naissance, nationalité)
VALUES 
  ('T-1000', 'Connor', 'John', '1985-02-28', 'USA'),
  ('Bourne', 'Webb', 'Jason', '1971-04-15', 'USA'),
  ('Russo', 'Natalia', 'Mila', '1984-06-25', 'RUS'),
  ('Smith', 'Neo', 'Thomas', '1962-09-13', 'USA'),
  ('Cobb', 'Dominick', 'Christopher', '1978-10-28', 'USA'),
  ('Doe-1', 'John', 'Michael', '1970-01-01', 'USA'),
  ('Kruger', 'Derek', 'Adam', '1967-03-14', 'CAN'),
  ('O\'Connell', 'Ricks', 'Peter', '1968-12-22', 'GBR'),
  ('Bale', 'Walter', 'David', '1975-06-04', 'USA'),
  ('Worm', 'Jimmy', 'Matthew', '1979-01-01', 'USA'),
  ('Reynolds', 'Vanessa', 'Grace', '1990-08-07', 'USA'),
  ('Doe-2', 'Jane', 'Emily', '1975-03-10', 'USA'),
  ('Shaw', 'John', 'Edward', '1974-11-15', 'USA'),
  ('Underwood', 'Francis', 'Joseph', '1959-11-05', 'USA'),
  ('Lannister', 'Cersei', 'Jaime', '1978-07-03', 'GBR'),
  ('Stark', 'Arya', 'Sansa', '2003-11-25', 'USA'),
  ('Potter', 'Harry', 'James', '1980-07-31', 'GBR'),
  ('Skywalker', 'Luke', 'Anakin', '1951-09-25', 'USA'),
  ('Kenobi', 'Obi-Wan', 'Ben', '1964-04-23', 'GBR'),
  ('Soprano', 'Tony', 'Anthony', '1959-08-22', 'USA');

INSERT INTO contact (code_identification, nom, prénom, date_de_naissance, nationalité)
VALUES 
	('Alpha', 'Smith', 'John', '1990-03-14', 'USA'),
	('Bravo', 'Jones', 'Mary', '1985-09-21', 'USA'),
	('Charlie', 'Wilson', 'Tom', '1988-05-10', 'USA'),
	('Delta', 'Anderson', 'Emily', '1992-12-05', 'USA'),
	('Echo', 'Thompson', 'Daniel', '1995-02-28', 'USA'),
	('Foxtrot', 'Brown', 'Jessica', '1991-11-17', 'USA'),
	('Golf', 'Miller', 'Alex', '1986-07-02', 'USA'),
	('Hotel', 'Taylor', 'Olivia', '1993-08-20', 'USA'),
	('India', 'Davis', 'William', '1994-06-08', 'USA'),
	('Juliet', 'Moore', 'Sophia', '1989-04-12', 'USA'),
	('Kilo', 'Wilson', 'Emma', '1997-01-03', 'USA'),
	('Lima', 'Lee', 'Michael', '1996-09-15', 'USA'),
	('Mike', 'Smith', 'Julia', '1987-12-26', 'GBR'),
	('November', 'Wilson', 'David', '1990-06-25', 'GBR'),
	('Oscar', 'Johnson', 'Lucy', '1993-04-05', 'FRA'),
	('Papa', 'Martin', 'Maxime', '1988-10-08', 'FRA'),
	('Quebec', 'Schmidt', 'Hans', '1992-02-13', 'DEU'),
	('Romeo', 'Müller', 'Anna', '1995-07-18', 'DEU'),
	('Sierra', 'Davis', 'Alice', '1986-11-30', 'USA'),
	('Tango', 'Smith', 'Ryan', '1991-01-22', 'USA'),
    ('Storm', 'Williams', 'Jonathan', '1986-06-24', 'GHA');


INSERT INTO planque (code_identification, adresse, pays, type_de_mission)
VALUES 
	('Phoenix', '221B Baker Street', 'GBR', 'Surveillance'),
	('Raven', '1600 Pennsylvania Avenue NW', 'USA', 'Infiltration'),
	('Dragon', '13, Rue del Percebe', 'ESP', 'Vols'),
	('Cobra', '5th Avenue', 'USA', 'Sabotage'),
	('Condor', '1, rue Scribe', 'FRA', 'Assassinat'),
	('Viper', 'Kurfürstendamm', 'DEU', 'Infiltration'),
	('Tiger', '3, rue des Moulins', 'FRA', 'Assassinat'),
	('Lion', '10 Downing Street', 'GBR', 'Sabotage'),
	('Bear', 'Red Square', 'RUS', 'Surveillance'),
	('Panther', 'Brandenburger Tor', 'DEU', 'Vols'),
	('Wolf', 'The White House', 'USA', 'Sabotage'),
	('Shark', 'Paseo de la Castellana', 'ESP', 'Infiltration'),
	('Eagle', 'Tour Eiffel', 'FRA', 'Assassinat'),
	('Whale', 'The Kremlin', 'RUS', 'Surveillance'),
	('Spider', 'Potsdamer Platz', 'DEU', 'Vols'),
	('Scorpion', 'Puerta del Sol', 'ESP', 'Infiltration'),
	('Gorilla', '1600 Amphitheatre Parkway', 'USA', 'Assassinat'),
	('Elephant', 'Trafalgar Square', 'GBR', 'Surveillance'),
	('Raccoon', 'Champs-Élysées', 'FRA', 'Sabotage'),
	('Hedgehog', 'Hohenzollernstraße', 'DEU', 'Vols'),
    ('Lionheart', '12 Rue de l\'Espoir', 'GHA', 'Infiltration');
    
INSERT INTO mission (nom_de_code, titre, description_de_mission, pays, agents, contacts, cibles, type_de_mission, statut, planques, spécialités, date_début, date_fin)
VALUES (
	'Opération Blackout',
    'Infiltration d\'un réseau de terroristes',
    'Infiltrer un réseau terroriste international pour prévenir une série d\'attaques imminentes',
    'FRA',
    (SELECT code_identification FROM agent WHERE nationalité != 'USA' AND spécialités = 'assassinat' ORDER BY RAND() LIMIT 1),
    (SELECT code_identification FROM contact WHERE nationalité = 'USA' ORDER BY RAND() LIMIT 1),
    (SELECT code_identification FROM cible WHERE nationalité = 'RUS' ORDER BY RAND() LIMIT 1),
    'infiltration',
    'en cours',
    (SELECT code_identification FROM planque WHERE pays = 'FRA' ORDER BY RAND() LIMIT 1),
    'espionnage',
    '2022-03-10',
    '2022-06-15'
);

insert into mission (nom_de_code, titre, description_de_mission, pays, agents, contacts, cibles, type_de_mission, statut, planques, spécialités, date_début, date_fin)
values ('Phoenix', 'Opération Feu d\'artifice', 'Infiltrer une organisation terroriste et empêcher un attentat à la bombe lors d\'un événement majeur en Allemagne.', 'DEU', '007', 'John Smith', 'Mark Johnson', 'Contre-terrorisme', 'en cours', '13 Rue de la paix, Berlin', 'Infiltration', '2023-05-15', '2023-05-30');

insert into mission (nom_de_code, titre, description_de_mission, pays, agents, contacts, cibles, type_de_mission, statut, planques, spécialités, date_début, date_fin)
values ('Bulldog', 'Opération Goldeneye', 'S\'infiltrer dans un laboratoire secret en Russie et voler un prototype d\'arme nucléaire miniature.', 'RUS', 'John Doe', 'Emma Watson', 'Igor Petrov', 'Infiltration', 'préparation', '6 Rue des Roses, Moscou', 'Infiltration', '2023-07-01', '2023-07-31');

insert into mission (nom_de_code, titre, description_de_mission, pays, agents, contacts, cibles, type_de_mission, statut, planques, spécialités, date_début, date_fin)
values ('Cobra', 'Opération Révolution', 'Renverser un dictateur dans un pays d\'Afrique de l\'Ouest avec l\'aide d\'une faction rebelle locale.', 'GHA', 'Jane Smith', 'William Brown', 'Mamadou Keita', 'Assassinat', 'terminé', '10 Rue de la liberté, Accra', 'Infiltration, Combat', '2022-10-15', '2022-11-30');

insert into mission (nom_de_code, titre, description_de_mission, pays, agents, contacts, cibles, type_de_mission, statut, planques, spécialités, date_début, date_fin)
values ('Eagle', 'Opération 9/11', 'Retrouver et éliminer le cerveau d\'un réseau terroriste international avant qu\'il ne planifie une attaque de grande envergure sur le sol américain.', 'USA', 'Jack Ryan', 'Sarah Johnson', 'Mohammed Ali', 'Contre-terrorisme', 'échec', '101 Main Street, New York', 'Infiltration, Combat', '2021-09-10', '2021-09-15');

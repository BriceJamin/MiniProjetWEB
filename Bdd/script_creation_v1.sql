Classe (BTS SE OU IRIS) 
?  Nom, prenom, date de naissance 
?  No de telephone, portable 
?  Adresse mail 
?  Date d'entree/sortie de l'etablissement 
?  Entreprise de stage 
?  Parcours POST BTS 
?  Un champ information libre. 

GRANT ALL PRIVILEGES ON `bdd_ent` . * TO 'user_ent' IDENTIFIED BY 'mdp_ent' WITH GRANT OPTION;

DROP database IF EXISTS bdd_ent;

CREATE database IF NOT EXISTS bdd_ent CHARACTER SET utf8 COLLATE utf8_bin;

USE bdd_ent;

-- --------------------------------------------------------
--
-- 		ELEVE
--

CREATE TABLE if not exists etudiant
(
	id				INT				UNSIGNED 	NOT NULL 		AUTO_INCREMENT,
	nom 			VARCHAR(40) 				NOT NULL,
	prenom			VARCHAR(40) 				NOT NULL,
	dateNaissance	DATE,
	telFixe			VARCHAR(40),
	telPortable		VARCHAR(40),
	email			VARCHAR(40),
	dateArrivee		DATE,
	dateDepart		DATE,
	
	PRIMARY KEY(id)
	
)CHARACTER SET utf8 TYPE=InnoDB;

--
-- Contenu de la table eleve
--

INSERT IGNORE INTO eleve
	(nom)
VALUES
	("Hdv des alchimistes"),

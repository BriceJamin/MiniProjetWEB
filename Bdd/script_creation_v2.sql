-- D�truit la bdd (pour les tests)
DROP DATABASE IF EXISTS bdd_ent;

CREATE DATABASE bdd_ent CHARACTER SET 'utf8';
USE bdd_ent;

/*
	etudiant
	Permet de stocker toutes les infos d'un �tudiant
	ayant �tudi� un jour au Lyc�e Benoit
*/
CREATE TABLE etudiant
(
	id				INT AUTO_INCREMENT,
	nomSection		VARCHAR(20)			NOT NULL,
	nom				VARCHAR(40)			NOT NULL,
	prenom			VARCHAR(40)			NOT NULL,
	dateNaissance	DATETIME			NOT NULL,
	telFixe			VARCHAR(20),
	telPortable		VARCHAR(20),
	mail			VARCHAR(50),
	dateEntree		DATETIME			NOT NULL,
	dateSortie		DATETIME,						-- date de sortie de l'etablissement
	infoLibre		TEXT,							-- champ d'information libre
	
	PRIMARY KEY (nom, prenom, dateNaissance)
	
)ENGINE=INNODB;

/*
	section
	Liste le nom des sections qu'a ou a eu le lyc�e Benoit
*/
CREATE TABLE section
(
	id				INT AUTO_INCREMENT,
	nom				VARCHAR(40)	NOT NULL UNIQUE,
	
	PRIMARY KEY (id)
	
)ENGINE=INNODB;

/*
	parcours
	Permet de stocker les infos du parcours (professionel) d'un eleve durant sa vie
	Par exemple, si un etudiant effectue un stage, il peut le renseigner, en ajoutant
	des informations sur la boite qui l'a embauch�.
*/
CREATE TABLE parcours
(
	id				INT AUTO_INCREMENT,
	id_etudiant 	INT					NOT NULL,
	dateDebut		DATE				NOT NULL,
	dateFin			DATE,
	etablissement	VARCHAR(40)			NOT NULL,
	pays			VARCHAR(40)			NOT NULL,
	departement		VARCHAR(40)			NOT NULL,
	ville			VARCHAR(40)			NOT NULL,
	adresse			VARCHAR(40),
	tel				VARCHAR(20),
	statut			VARCHAR(40),
	infos 			TEXT
	
	
	
)ENGINE=INNODB;

/*
	compte
	Permet de stocker toutes les infos d'un compte.
	Un compte est n�cessaire pour se connecter, sans il est impossible d'acc�der au
	contenu du site.
*/
CREATE TABLE compte
(
	id					INT AUTO_INCREMENT,
	nom					VARCHAR(40),
	mdp					VARCHAR(40),
	mail				VARCHAR(50),
	dateCreation		DATETIME,
	dateDerniereVisite	DATETIME,
	
	PRIMARY KEY (id)
	
)ENGINE=INNODB;

/*
	categorie
	Permet de regrouper des comptes par un nom.
	Par exemple, il peut exister la categorie professeur, admin, eleve...
	Un compte peut avoir zero ou plusieurs cat�gories.
*/
CREATE TABLE categorie
(
	id	INT,
	nom	VARCHAR(40),
	
	PRIMARY KEY (id)
	
)ENGINE=INNODB;

/*
	compte_categorie
	Fait le lien entre compte et categorie
	C'est l� qu'on voit quel compte appartient � quelle cat�gorie
*/
CREATE TABLE compte_categorie
(
	id_compte		INT,
	id_categorie	INT,
	
	PRIMARY KEY(id_compte, id_categorie)
	
)ENGINE=INNODB;

/*
	Ajout des clefs etrangeres 
*/

alter table parcours
	add constraint FK_PARCOURS_REFERENCE_ETUDIANT foreign key (id_etudiant),
	references etudiant (id)
	on delete cascade on update cascade;
	
alter table compte_categorie
	add constraint FK_COMPTE_CATEGORIE_REFERENCE_COMPTE foreign key (id_compte)
    references compte (id)
    on delete cascade on update cascade;
	
alter table compte_categorie
	add constraint FK_COMPTE_CATEGORIE_REFERENCE_CATEGORIE foreign key (id_categorie)
    references categorie (id)
    on delete cascade on update cascade;
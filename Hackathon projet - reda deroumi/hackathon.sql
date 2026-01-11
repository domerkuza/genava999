create database Geneva ;
use Geneva;

create table stagiaire (
	IdStagiaire int primary key auto_increment,
	nom varchar(255),
    prenom varchar(255),
    institut varchar(255),
    filier varchar(255),
    anner varchar(255),
    tele varchar(255),
    email varchar(255),
    mdp varchar(255),
    valiadtion ENUM('invalide', 'valide') DEFAULT 'invalide');
    
alter  table jury add fonction varchar(233) default "jury";
CREATE TABLE project (
    IdProject INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    category VARCHAR(255),
    description_pr VARCHAR(255),
    membre1 VARCHAR(255),
    email_membre1 VARCHAR(255),
    role_membre1 VARCHAR(255),
    membre2 VARCHAR(255),
    email_membre2 VARCHAR(255),
    role_membre2 VARCHAR(255),
    membre3 VARCHAR(255),
    email_membre3 VARCHAR(255),
    role_membre3 VARCHAR(255),
    video_url VARCHAR(255),
    doc_url VARCHAR(255),
    validation_pr ENUM('invalide', 'valide') DEFAULT 'invalide' -- Corrected column name
);

CREATE TABLE ponderation (
	Id int primary key auto_increment,
    P_jury INT,
    P_stagiaires int
);

create table jury (
	Idjury int primary key auto_increment ,
    nom varchar(255),
    prenom varchar(255),
    email varchar(255),
    mdp varchar(255)
    );
create table admins (
	Idadmins int primary key auto_increment ,
    nom varchar(255),
    prenom varchar(255),
    email varchar(255),
    mdp varchar(255)
    );
    INSERT INTO jury (nom, prenom, email, mdp)
VALUES ('wahbi', 'ahmed', 'reda@example.com', '2080');

create table voteJury (
	id int primary key auto_increment,
    Idjury int,
	Idprojet int,
	score INT,
    comments varchar(300),
    pup varchar(300),
    FOREIGN KEY (Idjury ) REFERENCES jury(Idjury),
    FOREIGN KEY (Idprojet) REFERENCES project(IdProject)
    );


create table voteStagiaire (
	id int primary key auto_increment,
    IdStagiaire int,
	Idprojet int,
	score INT,
    comments varchar(300),
    pup varchar(300),
    FOREIGN KEY (IdStagiaire ) REFERENCES stagiaire(IdStagiaire),
    FOREIGN KEY (Idprojet) REFERENCES project(IdProject)
    );
    

    
    
    

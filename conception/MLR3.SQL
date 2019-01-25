REM -----------------------------------------------------------------------------
REM                Génération d'une base de données
REM                         SQL Générique (SQL 2)
REM                           (25/1/2019 11:34:49)
REM -----------------------------------------------------------------------------
REM      Nom de la base : MLR3
REM      Projet : Accueil Win'Design version 7
REM      Auteur : eugene
REM      Date de dernière modification : 25/1/2019 11:34:05
REM -----------------------------------------------------------------------------

DROP TABLE MATIERE;

DROP TABLE ADMIN;

DROP TABLE MATERIEL;

DROP TABLE FREQUENCE;

DROP TABLE ENSEIGNEMENT;

DROP TABLE EMPLACEMENT;

DROP TABLE CLASSE;

DROP TABLE TYPE_EMPLACEMENT;

DROP TABLE GRADE;

DROP TABLE SUPERADMIN;

DROP TABLE FILIERE;

DROP TABLE ENSEIGNANT;

DROP TABLE EMPRINTER;

DROP TABLE PROGRAMMER;

REM -----------------------------------------------------------------------------
REM       TABLE : MATIERE
REM -----------------------------------------------------------------------------

CREATE TABLE MATIERE
   (
   CODE_MATIERE CHAR(32) NOT NULL ,
   INTITULE_MATIERE VARCHAR(1000)  ,
   ID CHAR(32) NOT NULL 
,
     PRIMARY KEY (ID) CONSTRAINT PK_MATIERE
   );

REM -----------------------------------------------------------------------------
REM       TABLE : ADMIN
REM -----------------------------------------------------------------------------

CREATE TABLE ADMIN
   (
   ID CHAR(32) NOT NULL ,
   ID_AJOUTER1 CHAR(32) NOT NULL ,
   PASSWORD CHAR(32)  ,
   ROLE CHAR(32) NOT NULL 
,
     PRIMARY KEY (ID) CONSTRAINT PK_ADMIN
   );

REM -----------------------------------------------------------------------------
REM       INDEX DE LA TABLE ADMIN
REM -----------------------------------------------------------------------------

CREATE  INDEX I_FK_ADMIN_SUPERADMIN
     ON ADMIN (ID_AJOUTER1 ASC);

REM -----------------------------------------------------------------------------
REM       TABLE : MATERIEL
REM -----------------------------------------------------------------------------

CREATE TABLE MATERIEL
   (
   CODE_MAT CHAR(32) NOT NULL ,
   ID CHAR(32) NOT NULL ,
   NOM_MAT VARCHAR(255)  ,
   QNTE_DISPO CHAR(32)  ,
   QTE CHAR(32) NOT NULL 
,
     PRIMARY KEY (CODE_MAT) CONSTRAINT PK_MATERIEL
   );

REM -----------------------------------------------------------------------------
REM       INDEX DE LA TABLE MATERIEL
REM -----------------------------------------------------------------------------

CREATE  INDEX I_FK_MATERIEL_SUPERADMIN
     ON MATERIEL (ID ASC);

REM -----------------------------------------------------------------------------
REM       TABLE : FREQUENCE
REM -----------------------------------------------------------------------------

CREATE TABLE FREQUENCE
   (
   JOUR CHAR(32) NOT NULL ,
   HEURE_DEBUT TIME(4) NOT NULL ,
   HEURE_FIN TIME(4) NOT NULL 
,
     PRIMARY KEY (JOUR, HEURE_DEBUT, HEURE_FIN) CONSTRAINT PK_FREQUENCE
   );

REM -----------------------------------------------------------------------------
REM       TABLE : ENSEIGNEMENT
REM -----------------------------------------------------------------------------

CREATE TABLE ENSEIGNEMENT
   (
   ID_ENSEIGNEMENT CHAR(32) NOT NULL ,
   TYE_ENSEIGNEMENT VARCHAR(255) NOT NULL 
,
     PRIMARY KEY (ID_ENSEIGNEMENT) CONSTRAINT PK_ENSEIGNEMENT
   );

REM -----------------------------------------------------------------------------
REM       TABLE : EMPLACEMENT
REM -----------------------------------------------------------------------------

CREATE TABLE EMPLACEMENT
   (
   CODE_SALLE CHAR(32) NOT NULL ,
   ID CHAR(32) NOT NULL ,
   JOUR CHAR(32) NOT NULL ,
   HEURE_DEBUT TIME(4) NOT NULL ,
   HEURE_FIN TIME(4) NOT NULL ,
   ID_APPARTENIR1 CHAR(32) NOT NULL ,
   NOM_SALLE CHAR(32)  ,
   NBRE_PLACE CHAR(32)  ,
   DATE_DEBUT DATE(8) NOT NULL ,
   DATE_FIN DATE(8) NOT NULL ,
   MOTIF VARCHAR(1000) NOT NULL 
,
     PRIMARY KEY (CODE_SALLE) CONSTRAINT PK_EMPLACEMENT
   );

REM -----------------------------------------------------------------------------
REM       INDEX DE LA TABLE EMPLACEMENT
REM -----------------------------------------------------------------------------

CREATE  INDEX I_FK_EMPLACEMENT_SUPERADMIN
     ON EMPLACEMENT (ID ASC);

CREATE  INDEX I_FK_EMPLACEMENT_FREQUENCE
     ON EMPLACEMENT (JOUR ASC, HEURE_DEBUT ASC, HEURE_FIN ASC);

CREATE  INDEX I_FK_EMPLACEMENT_TYPE_EMPLACEMEN
     ON EMPLACEMENT (ID_APPARTENIR1 ASC);

REM -----------------------------------------------------------------------------
REM       TABLE : CLASSE
REM -----------------------------------------------------------------------------

CREATE TABLE CLASSE
   (
   CODE_CLASSE CHAR(32) NOT NULL ,
   CODE_FILIERE CHAR(32) NOT NULL ,
   NOM_CLASSE VARCHAR(255)  
,
     PRIMARY KEY (CODE_CLASSE) CONSTRAINT PK_CLASSE
   );

REM -----------------------------------------------------------------------------
REM       INDEX DE LA TABLE CLASSE
REM -----------------------------------------------------------------------------

CREATE  INDEX I_FK_CLASSE_FILIERE
     ON CLASSE (CODE_FILIERE ASC);

REM -----------------------------------------------------------------------------
REM       TABLE : TYPE_EMPLACEMENT
REM -----------------------------------------------------------------------------

CREATE TABLE TYPE_EMPLACEMENT
   (
   ID CHAR(32) NOT NULL ,
   NOM CHAR(32) NOT NULL 
,
     PRIMARY KEY (ID) CONSTRAINT PK_TYPE_EMPLACEMENT
   );

REM -----------------------------------------------------------------------------
REM       TABLE : GRADE
REM -----------------------------------------------------------------------------

CREATE TABLE GRADE
   (
   ID CHAR(32) NOT NULL ,
   NOM VARCHAR(255) NOT NULL 
,
     PRIMARY KEY (ID) CONSTRAINT PK_GRADE
   );

REM -----------------------------------------------------------------------------
REM       TABLE : SUPERADMIN
REM -----------------------------------------------------------------------------

CREATE TABLE SUPERADMIN
   (
   ID CHAR(32) NOT NULL ,
   ID_ETRE CHAR(32) NOT NULL ,
   NOM CHAR(32) NOT NULL 
,
     PRIMARY KEY (ID) CONSTRAINT PK_SUPERADMIN
   );

REM -----------------------------------------------------------------------------
REM       INDEX DE LA TABLE SUPERADMIN
REM -----------------------------------------------------------------------------

CREATE UNIQUE INDEX I_FK_SUPERADMIN_ADMIN
     ON SUPERADMIN (ID_ETRE ASC);

REM -----------------------------------------------------------------------------
REM       TABLE : FILIERE
REM -----------------------------------------------------------------------------

CREATE TABLE FILIERE
   (
   CODE_FILIERE CHAR(32) NOT NULL ,
   NOM_FILIERE CHAR(32) NOT NULL 
,
     PRIMARY KEY (CODE_FILIERE) CONSTRAINT PK_FILIERE
   );

REM -----------------------------------------------------------------------------
REM       TABLE : ENSEIGNANT
REM -----------------------------------------------------------------------------

CREATE TABLE ENSEIGNANT
   (
   CODE_ENSEIGNANT CHAR(32) NOT NULL ,
   ID CHAR(32) NOT NULL ,
   ID_AVOIR CHAR(32) NOT NULL ,
   NOM_ENSEIGNANT CHAR(32) NOT NULL 
,
     PRIMARY KEY (CODE_ENSEIGNANT) CONSTRAINT PK_ENSEIGNANT
   );

REM -----------------------------------------------------------------------------
REM       INDEX DE LA TABLE ENSEIGNANT
REM -----------------------------------------------------------------------------

CREATE  INDEX I_FK_ENSEIGNANT_ADMIN
     ON ENSEIGNANT (ID ASC);

CREATE  INDEX I_FK_ENSEIGNANT_GRADE
     ON ENSEIGNANT (ID_AVOIR ASC);

REM -----------------------------------------------------------------------------
REM       TABLE : EMPRINTER
REM -----------------------------------------------------------------------------

CREATE TABLE EMPRINTER
   (
   CODE_MAT CHAR(32) NOT NULL ,
   CODE_ENSEIGNANT CHAR(32) NOT NULL ,
   JOUR CHAR(32) NOT NULL ,
   HEURE_DEBUT TIME(4) NOT NULL ,
   HEURE_FIN TIME(4) NOT NULL ,
   DATE_DEBUT DATE(8) NOT NULL ,
   DATE_FIN DATE(8) NOT NULL ,
   QTE INTEGER(4) NOT NULL 
,
     PRIMARY KEY (CODE_MAT, CODE_ENSEIGNANT, JOUR, HEURE_DEBUT, HEURE_FIN) CONSTRAINT PK_EMPRINTER
   );

REM -----------------------------------------------------------------------------
REM       INDEX DE LA TABLE EMPRINTER
REM -----------------------------------------------------------------------------

CREATE  INDEX I_FK_EMPRINTER_MATERIEL
     ON EMPRINTER (CODE_MAT ASC);

CREATE  INDEX I_FK_EMPRINTER_ENSEIGNANT
     ON EMPRINTER (CODE_ENSEIGNANT ASC);

CREATE  INDEX I_FK_EMPRINTER_FREQUENCE
     ON EMPRINTER (JOUR ASC, HEURE_DEBUT ASC, HEURE_FIN ASC);

REM -----------------------------------------------------------------------------
REM       TABLE : PROGRAMMER
REM -----------------------------------------------------------------------------

CREATE TABLE PROGRAMMER
   (
   CODE_ENSEIGNANT CHAR(32) NOT NULL ,
   ID_ENSEIGNEMENT CHAR(32) NOT NULL ,
   CODE_CLASSE CHAR(32) NOT NULL ,
   CODE_SALLE CHAR(32) NOT NULL ,
   ID CHAR(32) NOT NULL ,
   JOUR CHAR(32) NOT NULL ,
   HEURE_DEBUT TIME(4) NOT NULL ,
   HEURE_FIN TIME(4) NOT NULL ,
   DATE_DEBUT DATE(8) NOT NULL ,
   DATE_FIN DATE(8) NOT NULL 
,
     PRIMARY KEY (CODE_ENSEIGNANT, ID_ENSEIGNEMENT, CODE_CLASSE, CODE_SALLE, ID, JOUR, HEURE_DEBUT, HEURE_FIN) CONSTRAINT PK_PROGRAMMER
   );

REM -----------------------------------------------------------------------------
REM       INDEX DE LA TABLE PROGRAMMER
REM -----------------------------------------------------------------------------

CREATE  INDEX I_FK_PROGRAMMER_ENSEIGNANT
     ON PROGRAMMER (CODE_ENSEIGNANT ASC);

CREATE  INDEX I_FK_PROGRAMMER_ENSEIGNEMENT
     ON PROGRAMMER (ID_ENSEIGNEMENT ASC);

CREATE  INDEX I_FK_PROGRAMMER_CLASSE
     ON PROGRAMMER (CODE_CLASSE ASC);

CREATE  INDEX I_FK_PROGRAMMER_EMPLACEMENT
     ON PROGRAMMER (CODE_SALLE ASC);

CREATE  INDEX I_FK_PROGRAMMER_MATIERE
     ON PROGRAMMER (ID ASC);

CREATE  INDEX I_FK_PROGRAMMER_FREQUENCE
     ON PROGRAMMER (JOUR ASC, HEURE_DEBUT ASC, HEURE_FIN ASC);


REM -----------------------------------------------------------------------------
REM       CREATION DES REFERENCES DE TABLE
REM -----------------------------------------------------------------------------

ALTER TABLE ADMIN ADD (FOREIGN KEY (ID_AJOUTER1)
      REFERENCES SUPERADMIN (ID)
      CONSTRAINT FK_ADMIN_SUPERADMIN );

ALTER TABLE MATERIEL ADD (FOREIGN KEY (ID)
      REFERENCES SUPERADMIN (ID)
      CONSTRAINT FK_MATERIEL_SUPERADMIN );

ALTER TABLE EMPLACEMENT ADD (FOREIGN KEY (ID)
      REFERENCES SUPERADMIN (ID)
      CONSTRAINT FK_EMPLACEMENT_SUPERADMIN );

ALTER TABLE EMPLACEMENT ADD (FOREIGN KEY (JOUR, HEURE_DEBUT, HEURE_FIN)
      REFERENCES FREQUENCE (JOUR, HEURE_DEBUT, HEURE_FIN)
      CONSTRAINT FK_EMPLACEMENT_FREQUENCE );

ALTER TABLE EMPLACEMENT ADD (FOREIGN KEY (ID_APPARTENIR1)
      REFERENCES TYPE_EMPLACEMENT (ID)
      CONSTRAINT FK_EMPLACEMENT_TYPE_EMPLACEMENT );

ALTER TABLE CLASSE ADD (FOREIGN KEY (CODE_FILIERE)
      REFERENCES FILIERE (CODE_FILIERE)
      CONSTRAINT FK_CLASSE_FILIERE );

ALTER TABLE SUPERADMIN ADD (FOREIGN KEY (ID_ETRE)
      REFERENCES ADMIN (ID)
      CONSTRAINT FK_SUPERADMIN_ADMIN );

ALTER TABLE ENSEIGNANT ADD (FOREIGN KEY (ID)
      REFERENCES ADMIN (ID)
      CONSTRAINT FK_ENSEIGNANT_ADMIN );

ALTER TABLE ENSEIGNANT ADD (FOREIGN KEY (ID_AVOIR)
      REFERENCES GRADE (ID)
      CONSTRAINT FK_ENSEIGNANT_GRADE );

ALTER TABLE EMPRINTER ADD (FOREIGN KEY (CODE_MAT)
      REFERENCES MATERIEL (CODE_MAT)
      CONSTRAINT FK_EMPRINTER_MATERIEL );

ALTER TABLE EMPRINTER ADD (FOREIGN KEY (CODE_ENSEIGNANT)
      REFERENCES ENSEIGNANT (CODE_ENSEIGNANT)
      CONSTRAINT FK_EMPRINTER_ENSEIGNANT );

ALTER TABLE EMPRINTER ADD (FOREIGN KEY (JOUR, HEURE_DEBUT, HEURE_FIN)
      REFERENCES FREQUENCE (JOUR, HEURE_DEBUT, HEURE_FIN)
      CONSTRAINT FK_EMPRINTER_FREQUENCE );

ALTER TABLE PROGRAMMER ADD (FOREIGN KEY (CODE_ENSEIGNANT)
      REFERENCES ENSEIGNANT (CODE_ENSEIGNANT)
      CONSTRAINT FK_PROGRAMMER_ENSEIGNANT );

ALTER TABLE PROGRAMMER ADD (FOREIGN KEY (ID_ENSEIGNEMENT)
      REFERENCES ENSEIGNEMENT (ID_ENSEIGNEMENT)
      CONSTRAINT FK_PROGRAMMER_ENSEIGNEMENT );

ALTER TABLE PROGRAMMER ADD (FOREIGN KEY (CODE_CLASSE)
      REFERENCES CLASSE (CODE_CLASSE)
      CONSTRAINT FK_PROGRAMMER_CLASSE );

ALTER TABLE PROGRAMMER ADD (FOREIGN KEY (CODE_SALLE)
      REFERENCES EMPLACEMENT (CODE_SALLE)
      CONSTRAINT FK_PROGRAMMER_EMPLACEMENT );

ALTER TABLE PROGRAMMER ADD (FOREIGN KEY (ID)
      REFERENCES MATIERE (ID)
      CONSTRAINT FK_PROGRAMMER_MATIERE );

ALTER TABLE PROGRAMMER ADD (FOREIGN KEY (JOUR, HEURE_DEBUT, HEURE_FIN)
      REFERENCES FREQUENCE (JOUR, HEURE_DEBUT, HEURE_FIN)
      CONSTRAINT FK_PROGRAMMER_FREQUENCE );


REM -----------------------------------------------------------------------------
REM                FIN DE GENERATION
REM -----------------------------------------------------------------------------
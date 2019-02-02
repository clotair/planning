DROP DATABASE IF EXISTS MLR6;

CREATE DATABASE IF NOT EXISTS MLR6;
USE MLR6;
# -----------------------------------------------------------------------------
#       TABLE : MATIERE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MATIERE
 (
   ID_MATIERE CHAR(32) NOT NULL  ,
   NOM VARCHAR(255) NULL  ,
   CODE VARCHAR(255) NOT NULL  
   , PRIMARY KEY (ID_MATIERE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PLANNING_MATERIEL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PLANNING_MATERIEL
 (
   ID CHAR(32) NOT NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : MATERIEL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MATERIEL
 (
   ID_MATERIEL CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_MATERIEL) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PLANNING_COUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PLANNING_COUR
 (
   ID_PLANNING CHAR(32) NOT NULL  ,
   ID_CLASSE CHAR(32) NOT NULL  ,
   ID_MATIERE CHAR(32) NOT NULL  ,
   ID_ENSEIGNANT CHAR(32) NOT NULL  ,
   ID_SALLE CHAR(32) NOT NULL  ,
   ID_TYPE CHAR(32) NOT NULL  ,
   DATE_DEBUT DATE NOT NULL  ,
   DATE_FIN DATE NOT NULL  
   , PRIMARY KEY (ID_PLANNING) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PLANNING_COUR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PLANNING_COUR_CLASS
     ON PLANNING_COUR (ID_CLASSE ASC);

CREATE  INDEX I_FK_PLANNING_COUR_MATIERE
     ON PLANNING_COUR (ID_MATIERE ASC);

CREATE  INDEX I_FK_PLANNING_COUR_ENSEIGNANT
     ON PLANNING_COUR (ID_ENSEIGNANT ASC);

CREATE  INDEX I_FK_PLANNING_COUR_SALLLE
     ON PLANNING_COUR (ID_SALLE ASC);

CREATE  INDEX I_FK_PLANNING_COUR_TYPE_ENSEIGNEMENT
     ON PLANNING_COUR (ID_TYPE ASC);

# -----------------------------------------------------------------------------
#       TABLE : TYPE_ENSEIGNEMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPE_ENSEIGNEMENT
 (
   ID_TYPE CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_TYPE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SALLLE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SALLLE
 (
   ID_SALLE CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_SALLE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : JOUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS JOUR
 (
   ID_JOUR CHAR(32) NOT NULL  ,
   ID CHAR(32) NOT NULL  ,
   HEURE_DEBUT TIME NOT NULL  ,
   HEURE_FIN TIME NOT NULL  
   , PRIMARY KEY (ID_JOUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE JOUR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_JOUR_PLANNING_REUNION
     ON JOUR (ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : REUNION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS REUNION
 (
   ID_REUNION CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_REUNION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PLANNING_REUNION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PLANNING_REUNION
 (
   ID CHAR(32) NOT NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : GRADE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS GRADE
 (
   ID_GRADE CHAR(32) NOT NULL  ,
   NOM CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_GRADE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : FILIERE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FILIERE
 (
   ID_FILIERE CHAR(32) NOT NULL  ,
   CODE VARCHAR(255) NOT NULL  ,
   NOM VARCHAR(255) NULL  
   , PRIMARY KEY (ID_FILIERE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ENSEIGNANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ENSEIGNANT
 (
   ID_ENSEIGNANT CHAR(32) NOT NULL  ,
   ID_GRADE CHAR(32) NOT NULL  ,
   NOM CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_ENSEIGNANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ENSEIGNANT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ENSEIGNANT_GRADE
     ON ENSEIGNANT (ID_GRADE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CLASS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLASS
 (
   ID_CLASSE CHAR(32) NOT NULL  ,
   NOM VARCHAR(255) NULL  ,
   CODE VARCHAR(255) NOT NULL  
   , PRIMARY KEY (ID_CLASSE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ETALLER2
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETALLER2
 (
   ID CHAR(32) NOT NULL  ,
   ID_JOUR CHAR(32) NOT NULL  
   , PRIMARY KEY (ID,ID_JOUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ETALLER2
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ETALLER2_PLANNING_MATERIEL
     ON ETALLER2 (ID ASC);

CREATE  INDEX I_FK_ETALLER2_JOUR
     ON ETALLER2 (ID_JOUR ASC);

# -----------------------------------------------------------------------------
#       TABLE : APPARTIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS APPARTIENT
 (
   ID_FILIERE CHAR(32) NOT NULL  ,
   ID_CLASSE CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_FILIERE,ID_CLASSE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE APPARTIENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_APPARTIENT_FILIERE
     ON APPARTIENT (ID_FILIERE ASC);

CREATE  INDEX I_FK_APPARTIENT_CLASS
     ON APPARTIENT (ID_CLASSE ASC);

# -----------------------------------------------------------------------------
#       TABLE : TENIR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TENIR
 (
   ID_REUNION CHAR(32) NOT NULL  ,
   ID_SALLE CHAR(32) NOT NULL  ,
   ID CHAR(32) NOT NULL  ,
   DATE_DEBUT CHAR(32) NOT NULL  ,
   DATE_FIN CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_REUNION,ID_SALLE,ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE TENIR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_TENIR_REUNION
     ON TENIR (ID_REUNION ASC);

CREATE  INDEX I_FK_TENIR_SALLLE
     ON TENIR (ID_SALLE ASC);

CREATE  INDEX I_FK_TENIR_PLANNING_REUNION
     ON TENIR (ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : ETALLER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETALLER
 (
   ID_PLANNING CHAR(32) NOT NULL  ,
   ID_JOUR CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_PLANNING,ID_JOUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ETALLER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ETALLER_PLANNING_COUR
     ON ETALLER (ID_PLANNING ASC);

CREATE  INDEX I_FK_ETALLER_JOUR
     ON ETALLER (ID_JOUR ASC);

# -----------------------------------------------------------------------------
#       TABLE : EMPRUNTER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EMPRUNTER
 (
   ID_ENSEIGNANT CHAR(32) NOT NULL  ,
   ID_MATERIEL CHAR(32) NOT NULL  ,
   ID CHAR(32) NOT NULL  ,
   DATE_DEBUT CHAR(32) NOT NULL  ,
   DATE_FIN CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_ENSEIGNANT,ID_MATERIEL,ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EMPRUNTER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EMPRUNTER_ENSEIGNANT
     ON EMPRUNTER (ID_ENSEIGNANT ASC);

CREATE  INDEX I_FK_EMPRUNTER_MATERIEL
     ON EMPRUNTER (ID_MATERIEL ASC);

CREATE  INDEX I_FK_EMPRUNTER_PLANNING_MATERIEL
     ON EMPRUNTER (ID ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE PLANNING_COUR 
  ADD FOREIGN KEY FK_PLANNING_COUR_CLASS (ID_CLASSE)
      REFERENCES CLASS (ID_CLASSE) ;


ALTER TABLE PLANNING_COUR 
  ADD FOREIGN KEY FK_PLANNING_COUR_MATIERE (ID_MATIERE)
      REFERENCES MATIERE (ID_MATIERE) ;


ALTER TABLE PLANNING_COUR 
  ADD FOREIGN KEY FK_PLANNING_COUR_ENSEIGNANT (ID_ENSEIGNANT)
      REFERENCES ENSEIGNANT (ID_ENSEIGNANT) ;


ALTER TABLE PLANNING_COUR 
  ADD FOREIGN KEY FK_PLANNING_COUR_SALLLE (ID_SALLE)
      REFERENCES SALLLE (ID_SALLE) ;


ALTER TABLE PLANNING_COUR 
  ADD FOREIGN KEY FK_PLANNING_COUR_TYPE_ENSEIGNEMENT (ID_TYPE)
      REFERENCES TYPE_ENSEIGNEMENT (ID_TYPE) ;


ALTER TABLE JOUR 
  ADD FOREIGN KEY FK_JOUR_PLANNING_REUNION (ID)
      REFERENCES PLANNING_REUNION (ID) ;


ALTER TABLE ENSEIGNANT 
  ADD FOREIGN KEY FK_ENSEIGNANT_GRADE (ID_GRADE)
      REFERENCES GRADE (ID_GRADE) ;


ALTER TABLE ETALLER2 
  ADD FOREIGN KEY FK_ETALLER2_PLANNING_MATERIEL (ID)
      REFERENCES PLANNING_MATERIEL (ID) ;


ALTER TABLE ETALLER2 
  ADD FOREIGN KEY FK_ETALLER2_JOUR (ID_JOUR)
      REFERENCES JOUR (ID_JOUR) ;


ALTER TABLE APPARTIENT 
  ADD FOREIGN KEY FK_APPARTIENT_FILIERE (ID_FILIERE)
      REFERENCES FILIERE (ID_FILIERE) ;


ALTER TABLE APPARTIENT 
  ADD FOREIGN KEY FK_APPARTIENT_CLASS (ID_CLASSE)
      REFERENCES CLASS (ID_CLASSE) ;


ALTER TABLE TENIR 
  ADD FOREIGN KEY FK_TENIR_REUNION (ID_REUNION)
      REFERENCES REUNION (ID_REUNION) ;


ALTER TABLE TENIR 
  ADD FOREIGN KEY FK_TENIR_SALLLE (ID_SALLE)
      REFERENCES SALLLE (ID_SALLE) ;


ALTER TABLE TENIR 
  ADD FOREIGN KEY FK_TENIR_PLANNING_REUNION (ID)
      REFERENCES PLANNING_REUNION (ID) ;


ALTER TABLE ETALLER 
  ADD FOREIGN KEY FK_ETALLER_PLANNING_COUR (ID_PLANNING)
      REFERENCES PLANNING_COUR (ID_PLANNING) ;


ALTER TABLE ETALLER 
  ADD FOREIGN KEY FK_ETALLER_JOUR (ID_JOUR)
      REFERENCES JOUR (ID_JOUR) ;


ALTER TABLE EMPRUNTER 
  ADD FOREIGN KEY FK_EMPRUNTER_ENSEIGNANT (ID_ENSEIGNANT)
      REFERENCES ENSEIGNANT (ID_ENSEIGNANT) ;


ALTER TABLE EMPRUNTER 
  ADD FOREIGN KEY FK_EMPRUNTER_MATERIEL (ID_MATERIEL)
      REFERENCES MATERIEL (ID_MATERIEL) ;


ALTER TABLE EMPRUNTER 
  ADD FOREIGN KEY FK_EMPRUNTER_PLANNING_MATERIEL (ID)
      REFERENCES PLANNING_MATERIEL (ID) ;


DROP DATABASE IF EXISTS MLR1;

CREATE DATABASE IF NOT EXISTS planning;
USE planning;
# -----------------------------------------------------------------------------
#       TABLE : MATIERE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MATIERE
 (
   CODE_MATIERE CHAR(32) NULL  ,
   INTITULE_MATIERE CHAR(32) NULL  ,
   ID CHAR(32) NOT NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ADMIN
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ADMIN
 (
   ID CHAR(32) NOT NULL  ,
   ID_AJOUTER1 CHAR(32) NOT NULL  ,
   PASSWORD CHAR(32) NULL  ,
   ROLE CHAR(32) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ADMIN
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ADMIN_SUPERADMIN
     ON ADMIN (ID_AJOUTER1 ASC);

# -----------------------------------------------------------------------------
#       TABLE : MATERIEL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MATERIEL
 (
   CODE_MAT CHAR(32) NOT NULL  ,
   ID CHAR(32) NOT NULL  ,
   NOM_MAT CHAR(32) NULL  ,
   QNTE_DISPO CHAR(32) NULL  ,
   QTE CHAR(32) NOT NULL  
   , PRIMARY KEY (CODE_MAT,QTE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE MATERIEL
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_MATERIEL_SUPERADMIN
     ON MATERIEL (ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : FREQUENCE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FREQUENCE
 (
   JOUR CHAR(32) NOT NULL  ,
   HEURE_DEBUT TIME NOT NULL  ,
   HEURE_FIN TIME NOT NULL  
   , PRIMARY KEY (JOUR,HEURE_DEBUT,HEURE_FIN) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ENSEIGNEMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ENSEIGNEMENT
 (
   ID_ENSEIGNEMENT CHAR(32) NOT NULL  ,
   TYE_ENSEIGNEMENT CHAR(32) NULL  
   , PRIMARY KEY (ID_ENSEIGNEMENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : EMPLACEMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EMPLACEMENT
 (
   CODE_SALLE CHAR(32) NOT NULL  ,
   ID CHAR(32) NOT NULL  ,
   JOUR CHAR(32) NOT NULL  ,
   HEURE_DEBUT TIME NOT NULL  ,
   HEURE_FIN TIME NOT NULL  ,
   ID_APPARTENIR1 CHAR(32) NOT NULL  ,
   NOM_SALLE CHAR(32) NULL  ,
   NBRE_PLACE CHAR(32) NULL  ,
   DATE_DEBUT CHAR(32) NULL  ,
   DATE_FIN CHAR(32) NULL  ,
   MOTIF CHAR(32) NULL  
   , PRIMARY KEY (CODE_SALLE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EMPLACEMENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EMPLACEMENT_SUPERADMIN
     ON EMPLACEMENT (ID ASC);

CREATE  INDEX I_FK_EMPLACEMENT_FREQUENCE
     ON EMPLACEMENT (JOUR ASC,HEURE_DEBUT ASC,HEURE_FIN ASC);

CREATE  INDEX I_FK_EMPLACEMENT_TYPE_EMPLACEMENT
     ON EMPLACEMENT (ID_APPARTENIR1 ASC);

# -----------------------------------------------------------------------------
#       TABLE : CLASSE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLASSE
 (
   CODE_CLASSE CHAR(32) NOT NULL  ,
   CODE_FILIERE CHAR(32) NOT NULL  ,
   NOM_CLASSE VARCHAR(255) NULL  
   , PRIMARY KEY (CODE_CLASSE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CLASSE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CLASSE_FILIERE
     ON CLASSE (CODE_FILIERE ASC);

# -----------------------------------------------------------------------------
#       TABLE : TYPE_EMPLACEMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPE_EMPLACEMENT
 (
   ID CHAR(32) NOT NULL  ,
   NOM CHAR(32) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SUPERADMIN
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SUPERADMIN
 (
   ID CHAR(32) NOT NULL  ,
   ID_ETRE CHAR(32) NOT NULL  ,
   NOM CHAR(32) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE SUPERADMIN
# -----------------------------------------------------------------------------


CREATE UNIQUE INDEX I_FK_SUPERADMIN_ADMIN
     ON SUPERADMIN (ID_ETRE ASC);

# -----------------------------------------------------------------------------
#       TABLE : FILIERE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FILIERE
 (
   CODE_FILIERE CHAR(32) NOT NULL  ,
   NOM_FILIERE CHAR(32) NULL  
   , PRIMARY KEY (CODE_FILIERE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ENSEIGNANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ENSEIGNANT
 (
   CODE_ENSEIGNANT CHAR(32) NOT NULL  ,
   ID CHAR(32) NOT NULL  ,
   NOM_ENSEIGNANT CHAR(32) NULL  ,
   GRADE_ENSEIGNANT CHAR(32) NULL  
   , PRIMARY KEY (CODE_ENSEIGNANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ENSEIGNANT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ENSEIGNANT_ADMIN
     ON ENSEIGNANT (ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : EMPRINTER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EMPRINTER
 (
   CODE_MAT CHAR(32) NOT NULL  ,
   QTE CHAR(32) NOT NULL  ,
   CODE_ENSEIGNANT CHAR(32) NOT NULL  ,
   JOUR CHAR(32) NOT NULL  ,
   HEURE_DEBUT TIME NOT NULL  ,
   HEURE_FIN TIME NOT NULL  ,
   DATE_DEBUT CHAR(32) NULL  ,
   DATE_FIN CHAR(32) NULL  ,
   QNTE CHAR(32) NULL  
   , PRIMARY KEY (CODE_MAT,QTE,CODE_ENSEIGNANT,JOUR,HEURE_DEBUT,HEURE_FIN) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EMPRINTER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EMPRINTER_MATERIEL
     ON EMPRINTER (CODE_MAT ASC,QTE ASC);

CREATE  INDEX I_FK_EMPRINTER_ENSEIGNANT
     ON EMPRINTER (CODE_ENSEIGNANT ASC);

CREATE  INDEX I_FK_EMPRINTER_FREQUENCE
     ON EMPRINTER (JOUR ASC,HEURE_DEBUT ASC,HEURE_FIN ASC);

# -----------------------------------------------------------------------------
#       TABLE : PROGRAMMER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PROGRAMMER
 (
   CODE_ENSEIGNANT CHAR(32) NOT NULL  ,
   ID_ENSEIGNEMENT CHAR(32) NOT NULL  ,
   CODE_CLASSE CHAR(32) NOT NULL  ,
   CODE_SALLE CHAR(32) NOT NULL  ,
   ID CHAR(32) NOT NULL  ,
   JOUR CHAR(32) NOT NULL  ,
   HEURE_DEBUT TIME NOT NULL  ,
   HEURE_FIN TIME NOT NULL  ,
   DATE_DEBUT CHAR(32) NULL  ,
   DATE_FIN CHAR(32) NULL  
   , PRIMARY KEY (CODE_ENSEIGNANT,ID_ENSEIGNEMENT,CODE_CLASSE,CODE_SALLE,ID,JOUR,HEURE_DEBUT,HEURE_FIN) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PROGRAMMER
# -----------------------------------------------------------------------------


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
     ON PROGRAMMER (JOUR ASC,HEURE_DEBUT ASC,HEURE_FIN ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE ADMIN 
  ADD FOREIGN KEY FK_ADMIN_SUPERADMIN (ID_AJOUTER1)
      REFERENCES SUPERADMIN (ID) ;


ALTER TABLE MATERIEL 
  ADD FOREIGN KEY FK_MATERIEL_SUPERADMIN (ID)
      REFERENCES SUPERADMIN (ID) ;


ALTER TABLE EMPLACEMENT 
  ADD FOREIGN KEY FK_EMPLACEMENT_SUPERADMIN (ID)
      REFERENCES SUPERADMIN (ID) ;


ALTER TABLE EMPLACEMENT 
  ADD FOREIGN KEY FK_EMPLACEMENT_FREQUENCE (JOUR,HEURE_DEBUT,HEURE_FIN)
      REFERENCES FREQUENCE (JOUR,HEURE_DEBUT,HEURE_FIN) ;


ALTER TABLE EMPLACEMENT 
  ADD FOREIGN KEY FK_EMPLACEMENT_TYPE_EMPLACEMENT (ID_APPARTENIR1)
      REFERENCES TYPE_EMPLACEMENT (ID) ;


ALTER TABLE CLASSE 
  ADD FOREIGN KEY FK_CLASSE_FILIERE (CODE_FILIERE)
      REFERENCES FILIERE (CODE_FILIERE) ;


ALTER TABLE SUPERADMIN 
  ADD FOREIGN KEY FK_SUPERADMIN_ADMIN (ID_ETRE)
      REFERENCES ADMIN (ID) ;


ALTER TABLE ENSEIGNANT 
  ADD FOREIGN KEY FK_ENSEIGNANT_ADMIN (ID)
      REFERENCES ADMIN (ID) ;


ALTER TABLE EMPRINTER 
  ADD FOREIGN KEY FK_EMPRINTER_MATERIEL (CODE_MAT,QTE)
      REFERENCES MATERIEL (CODE_MAT,QTE) ;


ALTER TABLE EMPRINTER 
  ADD FOREIGN KEY FK_EMPRINTER_ENSEIGNANT (CODE_ENSEIGNANT)
      REFERENCES ENSEIGNANT (CODE_ENSEIGNANT) ;


ALTER TABLE EMPRINTER 
  ADD FOREIGN KEY FK_EMPRINTER_FREQUENCE (JOUR,HEURE_DEBUT,HEURE_FIN)
      REFERENCES FREQUENCE (JOUR,HEURE_DEBUT,HEURE_FIN) ;


ALTER TABLE PROGRAMMER 
  ADD FOREIGN KEY FK_PROGRAMMER_ENSEIGNANT (CODE_ENSEIGNANT)
      REFERENCES ENSEIGNANT (CODE_ENSEIGNANT) ;


ALTER TABLE PROGRAMMER 
  ADD FOREIGN KEY FK_PROGRAMMER_ENSEIGNEMENT (ID_ENSEIGNEMENT)
      REFERENCES ENSEIGNEMENT (ID_ENSEIGNEMENT) ;


ALTER TABLE PROGRAMMER 
  ADD FOREIGN KEY FK_PROGRAMMER_CLASSE (CODE_CLASSE)
      REFERENCES CLASSE (CODE_CLASSE) ;


ALTER TABLE PROGRAMMER 
  ADD FOREIGN KEY FK_PROGRAMMER_EMPLACEMENT (CODE_SALLE)
      REFERENCES EMPLACEMENT (CODE_SALLE) ;


ALTER TABLE PROGRAMMER 
  ADD FOREIGN KEY FK_PROGRAMMER_MATIERE (ID)
      REFERENCES MATIERE (ID) ;


ALTER TABLE PROGRAMMER 
  ADD FOREIGN KEY FK_PROGRAMMER_FREQUENCE (JOUR,HEURE_DEBUT,HEURE_FIN)
      REFERENCES FREQUENCE (JOUR,HEURE_DEBUT,HEURE_FIN) ;


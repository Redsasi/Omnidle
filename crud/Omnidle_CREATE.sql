# -----------------------------------------------------------------------------
#       DATABASE : OMNIDLE
# -----------------------------------------------------------------------------

DROP DATABASE IF EXISTS OMNIDLE; 

CREATE DATABASE IF NOT EXISTS OMNIDLE;
USE OMNIDLE;


# -----------------------------------------------------------------------------
#       TABLE :  OD_USER   
# -----------------------------------------------------------------------------
CREATE TABLE OD_USER (
  USER_ID INTEGER NOT NULL AUTO_INCREMENT,
  USER_PSEUDO VARCHAR(100) NOT NULL,
  USER_MAIL VARCHAR(200) NOT NULL,
  CONSTRAINT CK_USER_MAIL CHECK (USER_MAIL LIKE "%@%.%"),
  USER_PASSWORD VARCHAR(255) NOT NULL,
  PRIMARY KEY (USER_ID) 
);


# -----------------------------------------------------------------------------
#       TABLE :  OD_QUIZZ
# -----------------------------------------------------------------------------
CREATE TABLE OD_QUIZZ (
  QUIZZ_ID INTEGER NOT NULL AUTO_INCREMENT,
  QUIZZ_NAME VARCHAR(100) NOT NULL,
  QUIZZ_IMAGE MEDIUMBLOB,
  QUIZZ_DESCRIPTION VARCHAR(500) NOT NULL,
  USER_ID INTEGER NOT NULL,
  PRIMARY KEY (QUIZZ_ID),
  FOREIGN KEY (USER_ID) REFERENCES OD_USER(USER_ID) 
);


# -----------------------------------------------------------------------------
#       TABLE :  OD_ENTITY  
# -----------------------------------------------------------------------------
CREATE TABLE OD_ENTITY (
  ENTITY_ID INTEGER NOT NULL AUTO_INCREMENT,
  ENTITY_NAME VARCHAR(100) NOT NULL,
  ENTITY_IMAGE MEDIUMBLOB,
  QUIZZ_ID INTEGER NOT NULL,
  PRIMARY KEY (ENTITY_ID),
  FOREIGN KEY (QUIZZ_ID) REFERENCES OD_QUIZZ(QUIZZ_ID) 
);



# -----------------------------------------------------------------------------
#       TABLE :  OD_ATTRIBUT
# -----------------------------------------------------------------------------
CREATE TABLE OD_ATTRIBUT (
  ATTRI_ID INTEGER NOT NULL AUTO_INCREMENT,
  ATTRI_NAME VARCHAR(100) NOT NULL,
  ATTRI_DESCRIPTION VARCHAR(200) NOT NULL,
  ATTRI_TYPE VARCHAR(50) NOT NULL,
  ATTRI_ISMULTIPLE BOOLEAN,
  QUIZZ_ID INTEGER NOT NULL,
  PRIMARY KEY (ATTRI_ID),
  FOREIGN KEY (QUIZZ_ID) REFERENCES OD_QUIZZ(QUIZZ_ID) 
);


# -----------------------------------------------------------------------------
#       TABLE :  OD_VALUE
# -----------------------------------------------------------------------------

CREATE TABLE OD_VALUE (
  VAL_ID INTEGER NOT NULL AUTO_INCREMENT,
  VAL_VALEUR VARCHAR(500) NOT NULL,
  ATTRI_ID INTEGER NOT NULL,
  PRIMARY KEY (VAL_ID),
  FOREIGN KEY (ATTRI_ID) REFERENCES OD_ATTRIBUT(ATTRI_ID) 
);


# -----------------------------------------------------------------------------
#       TABLE :  OD_ENTITY_VALUE
# -----------------------------------------------------------------------------

CREATE TABLE OD_ENTITY_VALUE (
  VAL_ID INTEGER NOT NULL,
  ENTITY_ID INTEGER NOT NULL,
  PRIMARY KEY (VAL_ID, ENTITY_ID),
  FOREIGN KEY (VAL_ID) REFERENCES OD_VALUE(VAL_ID),
  FOREIGN KEY (ENTITY_ID) REFERENCES OD_ENTITY(ENTITY_ID) 
);

USE OMNIDLE;
insert into od_user (`USER_PSEUDO`, `USER_EMAIL`, `USER_TPAUTH`, `USER_PASSWORD`)
values 
  ('Test', 'test@test.test', NULL, '$2y$10$cWDxjitSrx9MG9EbG0aa/ujji1XxWpX6jZhXCkkE.83NZS6yGXOEa');
/* TITLE OF THE QUIZZ*/
insert into od_quizz (`QUIZZ_NAME`, `QUIZZ_DESCRIPTION`, `USER_ID`)
values
  ('Programming language', 'TO DO', 1);

/* ALL THE ATTRIBUTS */
insert into  od_attribut (`ATTRI_NAME`, `ATTRI_TYPE`, `ATTRI_ISMULTIPLE`, `QUIZZ_ID`)
values
  ('First appeared', 'Date', FALSE, 1),
  ('Filename extensions', 'String', TRUE, 1),
  ('Paradigme', 'String', TRUE, 1),
  ('Auteur', 'String', TRUE, 1);

/* Insert C# */
insert into od_entity (`ENTITY_NAME`, `ENTITY_IMAGE`, `QUIZZ_ID`)
values
  ('C#', NULL, 1);

insert into od_value (`VAL_VALEUR`, `ATTRI_ID`)
values
  ('2001', 1),
  ('.cs', 2),
  ('orienté objet', 3),
  ('impératif', 3),
  ('Structuré', 3),
  ('Microsoft', 4);


insert into od_entity_value (`VAL_ID`, `ENTITY_ID`)
values
  (1, 1),
  (2, 1),
  (3, 1),
  (4, 1),
  (5, 1),
  (6, 1);


/* Insert Java */
insert into od_entity (`ENTITY_NAME`, `ENTITY_IMAGE`, `QUIZZ_ID`)
values
  ('Java', NULL, 1);

insert into od_value (`VAL_VALEUR`, `ATTRI_ID`)
values
  ('1995', 1),
  ('.java', 2),
  ('.class', 2),
  ('.jar', 2),
  ('.jad', 2),
  ('.jmod', 2),
  ('fonctionnel', 3),
  ('générique', 3),
  ('Oracle Corporation', 4);
  
insert into od_entity_value (`VAL_ID`, `ENTITY_ID`)
values
  (7, 2),
  (8, 2),
  (9, 2),
  (10, 2),
  (11, 2),
  (12, 2),
  (3, 2),
  (4, 2),
  (5, 2),
  (14, 2),
  (15, 2);

/* Insert PHP */
insert into od_entity (`ENTITY_NAME`, `ENTITY_IMAGE`, `QUIZZ_ID`)
values
  ('PHP', NULL, 1);

insert into od_value (`VAL_VALEUR`, `ATTRI_ID`)
values
  ('.php', 2),
  ('.phar', 2),
  ('procédural', 3),
  ('réflexif', 3),
  ('interprété', 3),
  ('Rasmus Lerdorf', 4);
  
insert into od_entity_value (`VAL_ID`, `ENTITY_ID`)
values
  (7, 3),
  (16, 3),
  (17, 3),
  (3, 3),
  (4, 3),
  (5, 3),
  (13, 3),
  (14, 3),
  (18, 3),
  (19, 3),
  (20, 3),
  (21, 3);

  /*
  SELECT od_entity.ENTITY_ID, od_entity.ENTITY_NAME, od_entity.ENTITY_IMAGE, GROUP_CONCAT(,od_value.VAL_VALEUR), od_attribut.ATTRI_NAME  FROM `od_entity`
	JOIN `od_entity_value` ON `od_entity_value`.ENTITY_ID = `od_entity`.`ENTITY_ID`
    JOIN `od_value` on `od_value`.`VAL_ID` = `od_entity_value`.`VAL_ID`
    JOIN `od_attribut` ON `od_attribut`.`ATTRI_ID` = `od_value`.`ATTRI_ID`
	WHERE `od_entity`.`ENTITY_ID` = 2
	GROUP BY od_attribut.ATTRI_ID;
  */

  /*
  SELECT * FROM od_attribut 
	JOIN od_value ON od_value.ATTRI_ID = od_attribut.ATTRI_ID
    JOIN od_entity_value ON od_entity_value.VAL_ID = od_value.VAL_ID
	WHERE od_entity_value.ENTITY_ID = 1;
  */
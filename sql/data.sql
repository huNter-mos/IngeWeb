INSERT INTO `triplea`.`user` (nickname,nom,prenom,email,password,date_inscription) 
values ("admin","admin","admin","admin@mail.com", "password",'2020-12-06');

INSERT INTO `triplea`.`user` (nickname,nom,prenom,email,password,date_inscription) 
values ("user","user","user","user@mail.com", "password",'2020-12-05');

INSERT INTO `triplea`.`categorie` (titre) values ("Informatique");
INSERT INTO `triplea`.`categorie` (titre) values ("Multimédia");

INSERT INTO `triplea`.`topic` (titre, message, date_creation, fk_categorie, fk_user) values ("Le CSS pour les noobs","  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel adipisci aut voluptate recusandae voluptatum architecto ea, id repudiandae doloribus enim autem consequuntur possimus doloremque reiciendis modi ratione deleniti est voluptatibus!
" ,'2020-07-20', 1, 1);
INSERT INTO `triplea`.`topic` (titre, message, date_creation, fk_categorie, fk_user) values ("Game of thrones", " Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel adipisci aut voluptate recusandae voluptatum architecto ea, id repudiandae doloribus enim autem consequuntur possimus doloremque reiciendis modi ratione deleniti est voluptatibus!
", '2020-07-20', 2, 2);

INSERT INTO `triplea`.`post` (message, date_creation, fk_topic, fk_user) values ("Bien vu", '2020-07-20', 1, 1);
INSERT INTO `triplea`.`post` (message, date_creation, fk_topic, fk_user) values ("Bien vu", '2020-07-20', 2, 2);
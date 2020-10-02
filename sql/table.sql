DROP TABLE IF EXISTS `post`;
DROP TABLE IF EXISTS `topic`;
DROP TABLE IF EXISTS `categorie`;
DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `avatar_url` varchar(255) DEFAULT NULL
);

CREATE TABLE `categorie` 
( `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
`titre` VARCHAR(255) NOT NULL);

CREATE TABLE `topic` 
( `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL , 
`titre` VARCHAR(255) NOT NULL ,
`message` VARCHAR(1020) NOT NULL ,
`date_creation` DATE NOT NULL,
 `fk_categorie` int,
 `fk_user` int,
FOREIGN KEY (fk_categorie) REFERENCES categorie (id) ON DELETE CASCADE,
FOREIGN KEY (fk_user) REFERENCES user (id) ON DELETE CASCADE
 );

CREATE TABLE `post` 
( `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL , 
`message` VARCHAR(1020) NOT NULL , 
`date_creation` DATE NOT NULL,
 `fk_topic` int,
 `fk_user` int,
FOREIGN KEY (fk_topic) REFERENCES topic (id) ON DELETE CASCADE,
FOREIGN KEY (fk_user) REFERENCES user (id) ON DELETE CASCADE
 );



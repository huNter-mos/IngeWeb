DROP TABLE IF EXISTS `post`;
DROP TABLE IF EXISTS `topic`;
DROP TABLE IF EXISTS `categorie`;
DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `nickname` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `avatar_url` varchar(255) DEFAULT NULL
);

CREATE TABLE `categorie` 
( `id` INTEGER PRIMARY KEY  AUTOINCREMENT, 
`titre` VARCHAR(255) NOT NULL);

CREATE TABLE `topic` 
( `id` INTEGER PRIMARY KEY AUTOINCREMENT , 
`titre` VARCHAR(255) NOT NULL ,
`message` VARCHAR(1020) NOT NULL ,
`date_creation` DATE NOT NULL,
 `fk_categorie` INTEGER,
 `fk_user` INTEGER,
FOREIGN KEY (fk_categorie) REFERENCES categorie (id) ON DELETE CASCADE,
FOREIGN KEY (fk_user) REFERENCES user (id) ON DELETE CASCADE
 );

CREATE TABLE `post` 
( `id` INTEGER PRIMARY KEY AUTOINCREMENT, 
`message` VARCHAR(1020) NOT NULL , 
`date_creation` DATE NOT NULL,
 `fk_topic` INTEGER,
 `fk_user` INTEGER,
FOREIGN KEY (fk_topic) REFERENCES topic (id) ON DELETE CASCADE,
FOREIGN KEY (fk_user) REFERENCES user (id) ON DELETE CASCADE
 );



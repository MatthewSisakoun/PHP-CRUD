create database CRUD;
use CRUD;

CREATE TABLE eleve (
  `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, -- PK AUTO
  `Prenom` VARCHAR(50) NOT NULL,
  `Nom` VARCHAR(100) NOT NULL,
  `DateNaissance` DATE NOT NULL,
  `Classe` VARCHAR(45) NULL,
  `Groupe` CHAR(1) NULL,
  `Sexe` TINYINT NOT NULL DEFAULT 3,	-- 1 Homme 2 Femme 3 Other
  `Email` VARCHAR(255) NOT NULL,
  `Telephone` VARCHAR(20) NULL,
  `Passwd` VARCHAR(255) NOT NULL,
   CONSTRAINT UC_EMAIL UNIQUE (`Email`)
  );

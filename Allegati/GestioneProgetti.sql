CREATE DATABASE IF NOT EXISTS `gestione_progetti`;
USE `gestione_progetti`;

CREATE TABLE IF NOT EXISTS `Project`(
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255),
  `description` VARCHAR(255),
  `startedAt` DATETIME,
  `archived` TINYINT(1),
  `Contributor_id` INT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS `ProjectState`(
  id INT NOT NULL AUTO_INCREMENT,
  state ENUM('assigned','ongoing','testing','finished'),
  `updatedAt` DATETIME,
  `Project_id` INT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS `User`(
  id INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50),
  surname VARCHAR(50),
  email VARCHAR(255),
  `phoneNumber` VARCHAR(22),
  `role` ENUM('contributor','admin','superadmin'),
  `password` CHAR(64),
  PRIMARY KEY(id)
);

ALTER TABLE `ProjectState`
  ADD CONSTRAINT `Progetti_ProjectState`
    FOREIGN KEY (`Project_id`) REFERENCES `Project` (id);

ALTER TABLE `Project`
  ADD CONSTRAINT `Contributor_Progetti`
    FOREIGN KEY (`Contributor_id`) REFERENCES `User` (id);

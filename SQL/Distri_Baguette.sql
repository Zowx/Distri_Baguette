-- Création de la BBD
CREATE DATABASE `Distri_Baguette`;

-- Pour utiliser la BDD
USE Distri_Baguette;

-- Création de la table Boulangerie 
CREATE TABLE `Boulangerie` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` integer(6) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
);

-- Création de la table Distributeur
CREATE TABLE `Distributeur` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom`varchar(50) NOT NULL,
  `f_boulangerie` integer NOT NULL,
  `max_stock` integer NOT NULL,
  `stock_live` integer,
  `prix` integer NOT NULL,
  `rue` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` integer(6) NOT NULL,
  `etat` bool,
  `seuil_de_declenchement` bool NOT NULL,
  `siefox_id` integer NOT NULL,
  `hygrométrie` integer NOT NULL,
  `temperature` integer NOT NULL,
  `horodatage` datetime NOT NULL
);

-- Création de la table Vente
CREATE TABLE `Vente` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `f_distributeur` integer NOT NULL,
  `nombre` integer,
  `horodatage` datetime NOT NULL
);

-- Lien entre PK et FK
ALTER TABLE `Distributeur` ADD FOREIGN KEY (`f_boulangerie`) REFERENCES `Boulangerie` (`id`);

ALTER TABLE `Vente` ADD FOREIGN KEY (`f_distributeur`) REFERENCES `Distributeur` (`id`);

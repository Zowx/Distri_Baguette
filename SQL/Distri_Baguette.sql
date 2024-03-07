-- Création de la BBD
CREATE DATABASE `Distri_Baguette`;

-- Pour utiliser la BDD
USE Distri_Baguette;

-- Création de la table Boulangerie 
CREATE TABLE `Boulangerie` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `rue` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `code_postal` integer(5) NOT NULL,
  `user` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL
);

-- Création de la table Distributeur
CREATE TABLE `Distributeur` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `f_boulangerie` integer NOT NULL,
  `max_stock` integer NOT NULL,
  `prix` integer NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `seuil_de_declenchement` boolean NOT NULL,
  `sigfox_id` integer NOT NULL
);

-- Création de la table Mesures
CREATE TABLE `Mesure` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `f_distributeur` integer NOT NULL,
  `état` boolean,
  `stock_live` integer,
  `hygrométrie` integer NOT NULL,
  `température` integer NOT NULL,
  `horodatage` datetime NOT NULL
);

-- Lien entre PK et FK
ALTER TABLE `Distributeur` ADD FOREIGN KEY (`f_boulangerie`) REFERENCES `Boulangerie` (`id`);

ALTER TABLE `Mesure` ADD FOREIGN KEY (`f_distributeur`) REFERENCES `Distributeur` (`id`);

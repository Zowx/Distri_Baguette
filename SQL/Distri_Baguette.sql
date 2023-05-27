-- Création de la BBD
CREATE DATABASE `Distri_Baguette`;

-- Création de la table Boulangerie 
CREATE TABLE `Boulangerie` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` integer(5) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
);

-- Création de la table Distributeur
CREATE TABLE `Distributeur` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `f_boulangerie` integer NOT NULL,
  `max_stock` integer NOT NULL,
  `prix` integer NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `seuil_de_declenchement` bool NOT NULL,
  `sigfox_id` integer NOT NULL
);

-- Création de la table Vente
CREATE TABLE `Mesure` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `f_distributeur` integer NOT NULL,
  `état` bool,
  `stock_live` integer,
  `hygrométrie` integer NOT NULL,
  `température` integer NOT NULL,
  `horodatage` datetime NOT NULL
);

-- Lien entre PK et FK
ALTER TABLE `Distributeur` ADD FOREIGN KEY (`f_boulangerie`) REFERENCES `Boulangerie` (`id`);

ALTER TABLE `Mesure` ADD FOREIGN KEY (`f_distributeur`) REFERENCES `Distributeur` (`id`);

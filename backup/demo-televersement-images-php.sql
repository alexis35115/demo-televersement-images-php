-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 04 avr. 2021 à 19:11
-- Version du serveur :  8.0.22
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `demo-televersement-images-php`
--
CREATE DATABASE IF NOT EXISTS `demo-televersement-images-php` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `demo-televersement-images-php`;

-- --------------------------------------------------------

--
-- Structure de la table `vache`
--

DROP TABLE IF EXISTS `vache`;
CREATE TABLE `vache` (
  `id_vache` int NOT NULL COMMENT 'Clé primaire de la table vache',
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nom de la vache',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de création de la vache',
  `nom_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nom de l''image représentant la vache'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `vache`
--
ALTER TABLE `vache`
  ADD PRIMARY KEY (`id_vache`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `vache`
--
ALTER TABLE `vache`
  MODIFY `id_vache` int NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire de la table vache';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

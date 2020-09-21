-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : database
-- Généré le : lun. 21 sep. 2020 à 17:05
-- Version du serveur :  5.7.29
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lamp`
--
CREATE DATABASE IF NOT EXISTS `lamp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lamp`;

-- --------------------------------------------------------

--
-- Structure de la table `servers`
--

DROP TABLE IF EXISTS `servers`;
CREATE TABLE `servers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `servers`
--

INSERT INTO `servers` (`id`, `name`, `description`, `status`) VALUES
(1, 'Server 1', 'Nullam iaculis, diam ut fermentum iaculis, arcu nisl maximus lorem, ut facilisis quam elit id magna.', 0),
(2, 'Server 2', 'Aliquam efficitur turpis at egestas hendrerit. Integer bibendum efficitur iaculis.', 0),
(3, 'Server 3', 'In at volutpat velit. In hac habitasse platea dictumst. Orci varius natoque penatibus.', 0),
(4, 'Server 4', 'Aliquam efficitur turpis at egestas hendrerit. Integer bibendum efficitur iaculis. Sed suscipit libero.', 0),
(5, 'Server 5', 'Maecenas nisi eros, sagittis quis pharetra at, convallis quis diam. Morbi dictum fringilla.', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'The user id.',
  `name` varchar(128) NOT NULL COMMENT 'The username used to log in on the site.',
  `pass` varchar(128) NOT NULL COMMENT 'The hashed password used to compare when log in to the site.',
  `status` tinyint(2) NOT NULL COMMENT 'The user status "1" for active users that are authorized to log in to the site, "0" for blocked users that can''t log in to the site.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `status`) VALUES
(1, 'first-administrator', '$2y$10$IaA2Pc1OtshAWGC3oHBq0e2CTfl0XZ8mXZYgO68/E40Bim97j3xuG', 1),
(2, 'second-administrator', '$2y$10$wYI8kBvReZI8qe3.OpLomeRXPPSLhWbEJv/AhpvYZ1H3IFSFkqW3e', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'The user id.', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

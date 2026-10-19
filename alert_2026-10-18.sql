-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 18 oct. 2026 à 19:04
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `cavril_db1`
--

-- --------------------------------------------------------

--
-- Structure de la table `ft_alerte`
--

CREATE TABLE `ft_alerte` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `filtre` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `frequence` enum('daily','weekly') DEFAULT 'daily',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `ft_alerte`
--

INSERT INTO `ft_alerte` (`id`, `email`, `filtre`, `frequence`, `created_at`) VALUES
(112, 'cedric_avril_pro@hotmail.fr', '{\"departement\":\"\",\"romeInput\":\"\",\"codeROME\":\"\",\"contrat\":\"CDI\",\"typeContrat\":\"\",\"experience\":\"0\",\"motsCles\":\"fromagerie\",\"commune\":\"\",\"range\":\"\"}', 'daily', '2026-10-17 15:10:28'),
(116, 'cedric_avril@hotmail.com', '{\"departement\":\"05\",\"romeInput\":\"\",\"codeROME\":\"\",\"contrat\":\"CDI\",\"typeContrat\":\"\",\"experience\":\"0\",\"motsCles\":\"fromagerie\",\"commune\":\"\",\"range\":\"\"}', 'daily', '2026-10-07 17:09:03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ft_alerte`
--
ALTER TABLE `ft_alerte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ft_alerte`
--
ALTER TABLE `ft_alerte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
COMMIT;

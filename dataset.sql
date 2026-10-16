-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 07 oct. 2026 à 17:50
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `cavril_db1`
--

--
-- Déchargement des données de la table `ft_alerte`
--

INSERT INTO `ft_alerte` (`id`, `email`, `filtre`, `frequence`, `created_at`) VALUES
(112, 'cedric_avril_pro@hotmail.fr', '{\"departement\":\"32\",\"romeInput\":\"Agent \\/ Agente de diagnostic et d\'intervention en machinisme agricole (I1603)\",\"codeROME\":\"I1603\",\"contrat\":\"\",\"typeContrat\":\"\",\"experience\":\"\",\"motsCles\":\"\",\"commune\":\"\",\"range\":\"\"}', 'daily', '2026-09-19 13:31:49'),
(116, 'cedric_avril@hotmail.com', '{\"departement\":\"05\",\"romeInput\":\"\",\"codeROME\":\"\",\"contrat\":\"CDI\",\"typeContrat\":\"\",\"experience\":\"0\",\"motsCles\":\"fromagerie\",\"commune\":\"\",\"range\":\"\"}', 'daily', '2026-10-07 00:24:14');
COMMIT;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 07 oct. 2026 à 17:51
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `cavril_db1`
--

--
-- Déchargement des données de la table `ft_old_offers`
--

INSERT INTO `ft_old_offers` (`id`, `email`, `num_offer`, `created_at`) VALUES
(368, 'cedric_avril@hotmail.com', '213NJMN', '2026-09-24 15:39:45'),
(369, 'cedric_avril@hotmail.com', '214FYDD', '2026-09-24 15:39:45'),
(370, 'cedric_avril@hotmail.com', '214DSQH', '2026-09-24 15:39:45'),
(371, 'cedric_avril@hotmail.com', '213XPRH', '2026-09-24 15:39:45'),
(372, 'cedric_avril@hotmail.com', '213XPQB', '2026-09-24 15:39:45'),
(373, 'cedric_avril@hotmail.com', '213VQTT', '2026-09-24 15:39:45'),
(374, 'cedric_avril@hotmail.com', '213QRXB', '2026-09-24 15:39:45'),
(375, 'cedric_avril@hotmail.com', '213JHSH', '2026-09-24 15:39:45'),
(376, 'cedric_avril@hotmail.com', '212XTSZ', '2026-09-24 15:39:45'),
(377, 'cedric_avril@hotmail.com', '211LWKM', '2026-09-24 15:39:45'),
(378, 'cedric_avril@hotmail.com', '6907422', '2026-09-24 15:39:45'),
(379, 'cedric_avril@hotmail.com', '6745123', '2026-09-24 15:39:45'),
(380, 'cedric_avril@hotmail.com', '7069411', '2026-09-24 15:39:45'),
(381, 'cedric_avril@hotmail.com', '7010818', '2026-09-24 15:39:45'),
(382, 'cedric_avril@hotmail.com', '6685572', '2026-09-24 15:39:45'),
(383, 'cedric_avril@hotmail.com', '6394562', '2026-09-24 15:39:45'),
(384, 'cedric_avril@hotmail.com', '4591034', '2026-09-24 15:39:45'),
(385, 'cedric_avril_pro@hotmail.fr', '213VBJM', '2026-09-24 15:39:48'),
(386, 'cedric_avril_pro@hotmail.fr', '208ZRLS', '2026-09-24 15:39:48'),
(387, 'cedric_avril_pro@hotmail.fr', '5687801', '2026-09-24 15:39:48'),
(388, 'cedric_avril_pro@hotmail.fr', '7155183', '2026-09-24 15:39:48'),
(389, 'cedric_avril_pro@hotmail.fr', '7008581', '2026-09-24 15:39:48'),
(390, 'cedric_avril_pro@hotmail.fr', '6962765', '2026-09-24 15:39:48'),
(391, 'cedric_avril_pro@hotmail.fr', '6472342', '2026-09-24 15:39:48'),
(392, 'cedric_avril_pro@hotmail.fr', '6472319', '2026-09-24 15:39:48'),
(393, 'cedric_avril_pro@hotmail.fr', '5687740', '2026-09-24 15:39:48'),
(394, 'cedric_avril@hotmail.com', '7381551', '2026-09-26 16:36:46'),
(395, 'cedric_avril@hotmail.com', '7348512', '2026-09-26 16:36:46'),
(396, 'cedric_avril_pro@hotmail.fr', '7380632', '2026-09-26 16:36:48'),
(414, 'cedric_avril_pro@hotmail.fr', '7471686', '2026-09-28 22:01:32'),
(416, 'cedric_avril@hotmail.com', '214NMYP', '2026-09-29 22:02:01'),
(417, 'cedric_avril@hotmail.com', '214NKNQ', '2026-09-29 22:02:01'),
(418, 'cedric_avril@hotmail.com', '7493143', '2026-09-29 22:02:01'),
(419, 'cedric_avril@hotmail.com', '7497210', '2026-09-30 22:00:48'),
(420, 'cedric_avril_pro@hotmail.fr', '214PHPC', '2026-09-30 22:00:51'),
(421, 'cedric_avril@hotmail.com', '214RDDR', '2026-10-06 19:00:13'),
(422, 'cedric_avril@hotmail.com', '7558196', '2026-10-06 19:00:13'),
(423, 'cedric_avril_pro@hotmail.fr', '214QXCG', '2026-10-06 19:00:13'),
(424, 'cedric_avril_pro@hotmail.fr', '214QWWP', '2026-10-06 19:00:13'),
(425, 'cedric_avril_pro@hotmail.fr', '7602929', '2026-10-06 19:00:13'),
(426, 'cedric_avril_pro@hotmail.fr', '7602901', '2026-10-06 19:00:13'),
(427, 'cedric_avril@hotmail.com', '5505142', '2026-10-07 00:17:35');
COMMIT;

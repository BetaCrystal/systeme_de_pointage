-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 20 juin 2026 à 21:28
-- Version du serveur : 12.0.2-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pointage`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `id` int(10) NOT NULL,
  `heure_debut` datetime(6) NOT NULL,
  `heure_fin` datetime(6) NOT NULL,
  `utilisateur` int(10) NOT NULL,
  `type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`id`, `heure_debut`, `heure_fin`, `utilisateur`, `type`) VALUES
(1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 1, 1),
(2, '2026-06-20 17:46:00.000000', '2026-06-20 18:46:00.000000', 1, 1),
(3, '2026-06-20 00:16:00.000000', '2026-06-20 01:20:00.000000', 10, 2),
(4, '2026-06-20 11:16:00.000000', '2026-06-20 17:19:00.000000', 10, 1),
(5, '2026-06-20 21:18:00.000000', '2026-06-20 22:18:00.000000', 3, 2),
(6, '2026-06-20 22:19:00.000000', '2026-06-20 22:20:00.000000', 3, 1),
(7, '2026-06-20 06:19:00.000000', '2026-06-20 13:21:00.000000', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pin`
--

CREATE TABLE `pin` (
  `id` int(10) NOT NULL,
  `code` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pin`
--

INSERT INTO `pin` (`id`, `code`) VALUES
(1, 1111),
(2, 1112),
(3, 1113),
(4, 1114),
(5, 1115),
(6, 1116),
(7, 1117),
(8, 1118),
(9, 1119),
(10, 1120),
(11, 1121),
(12, 1122),
(13, 1123),
(14, 1124),
(15, 1125),
(16, 1126),
(17, 1127),
(18, 1128),
(19, 1129),
(20, 1130),
(21, 2026);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'Admin'),
(2, 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(1, 'Arrivée'),
(2, 'Départ');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` int(10) NOT NULL,
  `id_pin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `mot_de_passe`, `role`, `id_pin`) VALUES
(1, 'Utilisateur1', 'Pass_121', 2, 1),
(2, 'Utilisateur2', 'Pass_121', 2, 2),
(3, 'Utilisateur3', 'Pass_121', 2, 3),
(4, 'Utilisateur4', 'Pass_121', 2, 4),
(5, 'Utilisateur5', 'Pass_121', 2, 5),
(6, 'Utilisateur6', 'Pass_121', 2, 6),
(7, 'Utilisateur7', 'Pass_121', 2, 7),
(8, 'Utilisateur8', 'Pass_121', 2, 8),
(9, 'Utilisateur9', 'Pass_121', 2, 9),
(10, 'Utilisateur10', 'Pass_121', 2, 10),
(11, 'Utilisateur11', 'Pass_121', 2, 11),
(12, 'Utilisateur12', 'Pass_121', 2, 12),
(13, 'Utilisateur13', 'Pass_121', 2, 13),
(14, 'Utilisateur14', 'Pass_121', 2, 14),
(15, 'Utilisateur15', 'Pass_121', 2, 15),
(16, 'Utilisateur16', 'Pass_121', 2, 16),
(17, 'Utilisateur17', 'Pass_121', 2, 17),
(18, 'Utilisateur18', 'Pass_121', 2, 18),
(19, 'Utilisateur19', 'Pass_121', 2, 19),
(20, 'Utilisateur20', 'Pass_121', 2, 20),
(21, 'Admin1', 'Pass_121', 1, 21);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur` (`utilisateur`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`),
  ADD KEY `id_pin` (`id_pin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `pin`
--
ALTER TABLE `pin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateur` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `billet_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`id_pin`) REFERENCES `pin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

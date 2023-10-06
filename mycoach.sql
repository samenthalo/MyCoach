-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 06 oct. 2023 à 14:58
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mycoach`
--

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `id` int NOT NULL,
  `niveau` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `niveau`) VALUES
(1, 'Débutant'),
(2, 'Moyen'),
(3, 'Expert');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id` int NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` int NOT NULL,
  `ville` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `adresse`, `cp`, `ville`, `nom`) VALUES
(201, '16 rue de fleur', 81000, 'Albi', 'Fitness Paradise'),
(215, '23 rue de ploit', 81000, 'Albi', 'Gymnase Vitalité Plus'),
(245, '54 rue de la mer', 81000, 'Albi', 'Studio de yoga Zen'),
(248, '16 rue de fleur', 81000, 'Albi', ' Studio Pilates Équilibre'),
(250, '23 rue de ploit', 81000, 'Albi', 'Centre de bien-être Harmony');

-- --------------------------------------------------------

--
-- Structure de la table `seances`
--

DROP TABLE IF EXISTS `seances`;
CREATE TABLE IF NOT EXISTS `seances` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_sport` int NOT NULL,
  `id_niveau` int NOT NULL,
  `horaire` varchar(50) NOT NULL,
  `jour` varchar(50) NOT NULL,
  `id_salle` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sport` (`id_sport`),
  KEY `salle` (`id_salle`),
  KEY `niveau` (`id_niveau`),
  KEY `id` (`id`),
  KEY `id_sport` (`id_sport`,`id_niveau`,`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `seances`
--

INSERT INTO `seances` (`id`, `id_sport`, `id_niveau`, `horaire`, `jour`, `id_salle`) VALUES
(1, 1, 1, '14h-15h', 'Lundi', 201),
(2, 1, 3, '16h-17h', 'Mardi', 250),
(3, 3, 3, '16h-17h', 'Mercredi', 245),
(4, 4, 2, '12h-13h', 'Jeudi', 215),
(5, 2, 2, '11h-12h', 'Vendredi', 248),
(6, 4, 2, '12h-13h', 'Samedi', 245);

-- --------------------------------------------------------

--
-- Structure de la table `sports`
--

DROP TABLE IF EXISTS `sports`;
CREATE TABLE IF NOT EXISTS `sports` (
  `id` int NOT NULL,
  `sport` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sports`
--

INSERT INTO `sports` (`id`, `sport`) VALUES
(1, 'Renforcement physique'),
(2, 'Zumba énergétique'),
(3, 'Cardio intense'),
(4, 'Pilates');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `mdp`) VALUES
(9, 'ORTEGA', 'Samantha', 'ortega.samantha81400@gmail.com', '$2y$10$3vaayjEyxKsHdWVgmr6pkOxS0Nae.FZIy0GwS1r/3iy.Tj66tpX/e'),
(10, 'AFEZG', 'FSDFGHD', 'ortega.samantha81400@gmail.comdfsxdg', '$2y$10$eIzi0uHiJFaALvF7Kl/c7uFRHkFGJ81hxGVAywzv81GhbizD4Kawa');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD CONSTRAINT `niveau` FOREIGN KEY (`id`) REFERENCES `seances` (`id_niveau`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `salle` FOREIGN KEY (`id`) REFERENCES `seances` (`id_salle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sports`
--
ALTER TABLE `sports`
  ADD CONSTRAINT `sport` FOREIGN KEY (`id`) REFERENCES `seances` (`id_sport`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

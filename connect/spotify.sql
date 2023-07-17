-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 17 juil. 2023 à 11:45
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
-- Base de données : `spotify`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int NOT NULL AUTO_INCREMENT,
  `title` varchar(8000) DEFAULT NULL,
  `img` varchar(8000) DEFAULT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `album`
--

INSERT INTO `album` (`id_album`, `title`, `img`) VALUES
(1, 'Test1', 'twilight.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_com` int NOT NULL AUTO_INCREMENT,
  `content` varchar(8000) DEFAULT NULL,
  `id_musique` int NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `id_musique` (`id_musique`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

DROP TABLE IF EXISTS `musique`;
CREATE TABLE IF NOT EXISTS `musique` (
  `id_musique` int NOT NULL AUTO_INCREMENT,
  `path` varchar(8000) DEFAULT NULL,
  `title` varchar(8000) DEFAULT NULL,
  `id_album` int NOT NULL,
  PRIMARY KEY (`id_musique`),
  KEY `id_album` (`id_album`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `musique`
--

INSERT INTO `musique` (`id_musique`, `path`, `title`, `id_album`) VALUES
(1, '../audio/sample.mp3', 'Test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `musique_playlist`
--

DROP TABLE IF EXISTS `musique_playlist`;
CREATE TABLE IF NOT EXISTS `musique_playlist` (
  `id_musique` int NOT NULL,
  `id_playlist` int NOT NULL,
  PRIMARY KEY (`id_musique`,`id_playlist`),
  KEY `id_playlist` (`id_playlist`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

DROP TABLE IF EXISTS `playlist`;
CREATE TABLE IF NOT EXISTS `playlist` (
  `id_playlist` int NOT NULL AUTO_INCREMENT,
  `tilte` varchar(8000) DEFAULT NULL,
  `img` varchar(300) NOT NULL,
  PRIMARY KEY (`id_playlist`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `tilte`, `img`) VALUES
(1, 'Test', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

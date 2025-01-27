-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 27 jan. 2025 à 15:02
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecf2`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_messages` int NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_messages`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_messages`, `content`, `created_at`, `id_user`) VALUES
(8, 'coucou', '2025-01-24 20:31:11', 1),
(10, 'l\'expo était cool', '2025-01-27 08:46:19', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `name`, `first_name`, `email`, `password`, `image`, `created_at`) VALUES
(1, 'hendrickx', 'christelle', 'chris@gmail.com', '$2y$10$9226jBCY5uDJZSh4fY0LV.PMyHXwr7hxisdwF0Cfc.giCOma3ZP8C', 'uploads/profile_6797960c5ddb41.43157736.jpg', '0000-00-00 00:00:00'),
(2, 'chris', 'mady', 'essai@gmail.com', '$2y$10$fYDkiahOlVS.fNi5Lk7K1ukzxBor5ZG7DQJ4ruuiyQXcSF2ZHH9IW', '', '0000-00-00 00:00:00'),
(3, 'soeur', 'cecile', 'cecile@gmail.com', '$2y$10$QyapKGqoGPQUILLZCW69VeK2G5Jklm1lWwBq2fm96CZPewTD7h8lO', 'uploads/profile_679746ba23bb07.27198538.jpg', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

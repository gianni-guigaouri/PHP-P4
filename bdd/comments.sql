-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 25 mars 2020 à 11:52
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `POO_PERSO`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `state` varchar(255) NOT NULL,
  `addDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `postId`, `author`, `content`, `state`, `addDate`) VALUES
(7, 7, 'aa', 'aaa', 'valid', '2020-03-17 16:37:50'),
(9, 7, 'aa', 'aa', 'valid', '2020-03-20 14:54:09'),
(10, 8, 'Gianni', 'bonjour', 'valid', '2020-03-20 16:07:53'),
(11, 10, 'Gianni', 'Hello', 'valid', '2020-03-20 19:50:00'),
(17, 8, 'aa', 'aaaa', 'valid', '2020-03-23 18:15:59'),
(18, 7, 'aa', 'aa', 'Ok', '2020-03-24 18:37:57'),
(19, 10, 'aa', 'aaa', 'valid', '2020-03-24 18:51:41'),
(21, 8, 'aaaaa', 'aaaa', 'valid', '2020-03-25 00:03:15'),
(23, 10, 'Max', 'aa', 'valid', '2020-03-25 00:32:54'),
(25, 7, 'Max', 'aa', 'valid', '2020-03-25 00:35:09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postId` (`postId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

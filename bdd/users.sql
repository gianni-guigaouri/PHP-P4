-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 25 mars 2020 à 11:53
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `POO_PERSO`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `confirmKey` varchar(255) NOT NULL,
  `confirm` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mail`, `password`, `role`, `confirmKey`, `confirm`) VALUES
(35, 'Max', 'giannikostamusic@gmail.com', '$2y$10$SC4VthnjQXMVI9S7CkgYLO4FKZYWgkKH/yzcGWUkrXsFVS2oU0Rvi', 'moderator', '993446949', 1),
(36, 'Gianni', 'giannimarchello92@gmail.com', '$2y$10$x/C34MXgtoh5CGHxrtEi9OSdw0EAvpzAhCnVHf952T3TFqPFBTArS', 'utilisateur', '291306147', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 04 Mai 2017 à 17:38
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `2017_projet3_vente`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `ctid` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`ctid`, `nom`) VALUES
(1, 'Alimentaire'),
(2, 'Vêtements'),
(3, 'Jouets');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `cmdid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qte` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `statut` enum('en_cours','acceptee','refusee','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`cmdid`, `pid`, `uid`, `qte`, `date`, `statut`) VALUES
(1, 1, 3, 3, '2017-05-01 10:00:00', 'acceptee'),
(2, 1, 4, 5, '2017-04-19 13:03:00', 'acceptee'),
(3, 2, 3, 3, '2017-04-01 05:00:00', 'refusee'),
(4, 4, 4, 2, '2017-04-11 08:20:00', 'acceptee'),
(5, 5, 3, 1, '2017-04-17 17:16:00', 'en_cours'),
(6, 6, 3, 1, '2017-04-17 17:16:00', 'acceptee'),
(7, 8, 4, 2, '2017-04-27 12:25:00', 'acceptee'),
(8, 9, 4, 1, '2017-04-29 18:21:17', 'acceptee'),
(9, 1, 4, 1, '2017-05-03 16:10:46', 'en_cours'),
(10, 1, 4, 1, '2017-05-03 16:16:36', 'en_cours'),
(11, 13, 3, 2, '2017-05-04 19:07:14', 'en_cours'),
(12, 6, 4, 2, '2017-05-04 19:19:09', 'en_cours');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `pid` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `qte` int(11) UNSIGNED NOT NULL,
  `prix` float UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `ctid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`pid`, `nom`, `description`, `qte`, `prix`, `uid`, `ctid`) VALUES
(1, 'Lait', 'Du lait de montagne.', 17, 0.8, 5, 1),
(2, 'Pain', 'Pain doré Retrodor', 100, 1, 5, 1),
(3, 'Sucre', 'Sucre de canne.', 15, 2.24, 6, 1),
(4, 'Crème fraîche', 'Crème fraîche de Normandie', 50, 1.8, 6, 1),
(5, 'Veste', 'Veste hiver, taille 48', 3, 122.5, 5, 2),
(6, 'Pantalon', 'Pantalon homme, noir, taille 50', 5, 40, 6, 2),
(7, 'Chaussettes', 'Chaussettes noires taille unique', 20, 4.5, 6, 2),
(8, 'Playmobil', 'Diverses figurines Playmobil', 39, 1.9, 6, 3),
(9, 'Voiture', 'Voiture à télécommande sans fil', 5, 25, 5, 3),
(10, ' Chemin de fer ', ' Chemin de fer éléctrique ', 4, 36, 5, 3),
(13, 'Chemise', 'tissus & coton', 2, 99.99, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` enum('acheteur','vendeur') NOT NULL DEFAULT 'acheteur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`uid`, `nom`, `prenom`, `login`, `mdp`, `role`) VALUES
(3, 'Acheteur', '1', 'a1', '$2y$10$P8G..ohvFEfqLNoKrNrAWuMWZBnh/P/mREJrOlGurLAgXJ/G8IxIC', 'acheteur'),
(4, 'Acheteur', '2', 'a2', '$2y$10$EE7Bopz3kPquQfefWBM20us2khBlCV6B8ADspyjAFf5g04XsKfI5m', 'acheteur'),
(5, 'Vendeur', '1', 'v1', '$2y$10$pL0lHn0pdrBoM0kJWjsdT.Av70yFTF287x5OAKcp9WAdGgN5X4/Rq', 'vendeur'),
(6, 'Vendeur', '2', 'v2', '$2y$10$LFIX4541UmeDSSkNxXxKUuQfPBPqfBlE5/v7mm2pbIvgtUqrdoXie', 'vendeur');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ctid`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`cmdid`),
  ADD KEY `pid` (`pid`) USING BTREE,
  ADD KEY `uid` (`uid`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `ctid` (`ctid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `ctid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `cmdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `produits` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`ctid`) REFERENCES `categories` (`ctid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

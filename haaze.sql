-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 avr. 2021 à 00:49
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `haaze`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `Id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mdp` text NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` text NOT NULL,
  `moyenne` float NOT NULL DEFAULT 2.5,
  `avatar` varchar(255) NOT NULL DEFAULT 'img/avatar/Profil1.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`Id`, `nom`, `prenom`, `mdp`, `pseudo`, `mail`, `moyenne`, `avatar`) VALUES
(1, 'Mercier', 'Nicolas', '$2y$10$tLtaTnvkGQ38e/G7T3xei.Qw9Cz2xY8UBC2hveC9Nyn8hWgUhw7D2', 'broutremis', 'mr.mercier.nicolas@gmail.com', 3.8, 'img/avatar/Profil2.png'),
(2, 'titi', 'titi', '$2y$10$z/Bz6MuSMWiBuNdvzhM5aeZ9JEZQZLwmCFFJbZMcQPvBhp06B7G42', 'titi', 'titi@titi.titi', 2.5, 'img/avatar/Profil1.png');

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

CREATE TABLE `notation` (
  `idNotation` int(11) NOT NULL,
  `publication` int(11) DEFAULT NULL,
  `Idvoteur` int(11) DEFAULT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notation`
--

INSERT INTO `notation` (`idNotation`, `publication`, `Idvoteur`, `note`) VALUES
(1, 1, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `iDpubli` int(11) NOT NULL,
  `contenus` text NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `datePubli` datetime NOT NULL,
  `idC` int(11) NOT NULL,
  `moyenne` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`iDpubli`, `contenus`, `Nom`, `Prenom`, `datePubli`, `idC`, `moyenne`) VALUES
(1, 'Bonjour !', 'Mercier', 'Nicolas', '2021-04-01 00:17:34', 1, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `notation`
--
ALTER TABLE `notation`
  ADD PRIMARY KEY (`idNotation`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`iDpubli`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `notation`
--
ALTER TABLE `notation`
  MODIFY `idNotation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `iDpubli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

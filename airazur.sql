-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 21 Septembre 2017 à 14:14
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `airazur`
--

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

CREATE TABLE `avion` (
  `numavion` int(11) NOT NULL,
  `nomavion` varchar(30) DEFAULT NULL,
  `capmax` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `avion`
--

INSERT INTO `avion` (`numavion`, `nomavion`, `capmax`) VALUES
(1, 'AIR037', 100),
(2, 'BOEING119', 300);

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE `reserver` (
  `idvol` varchar(7) NOT NULL,
  `idutil` int(11) NOT NULL,
  `nbplace` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `numutil` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `datenaiss` date DEFAULT NULL,
  `adress` varchar(50) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `numvol` varchar(7) NOT NULL,
  `nomvol` varchar(15) DEFAULT NULL,
  `depart` varchar(30) DEFAULT NULL,
  `arrivee` varchar(30) DEFAULT NULL,
  `datedepart` varchar(30) DEFAULT NULL,
  `datearrive` varchar(30) DEFAULT NULL,
  `place` int(3) DEFAULT NULL,
  `idavion` int(3) DEFAULT NULL,
  `prix` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vol`
--

INSERT INTO `vol` (`numvol`, `nomvol`, `depart`, `arrivee`, `datedepart`, `datearrive`, `place`, `idavion`, `prix`) VALUES
('1', 'AIR5007', 'Paris CDG - France', 'Dakar - Sénégal', '22/04/2011 12:00', '22/04/2011 17:00', 120, 1, 560),
('2', 'AIR5108', 'Paris CDG - France', 'Dakar - Sénégal', '23/04/2011 13:00', '23/04/2011 18:20', 120, 2, 600);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`numavion`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`idvol`,`idutil`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`numutil`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`numvol`),
  ADD KEY `fk_avi_vol` (`idavion`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `numutil` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 11 Octobre 2017 à 14:14
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
(1, 'AIR037', 120),
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

--
-- Contenu de la table `reserver`
--

INSERT INTO `reserver` (`idvol`, `idutil`, `nbplace`) VALUES
('AIR5007', 1, 3),
('AIR5108', 2, 7),
('AIR5007', 9, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `numutil` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `adress` varchar(50) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`numutil`, `nom`, `prenom`, `email`, `adress`, `ville`, `cp`) VALUES
(1, 'Bost', 'Anne', 'bost.anne@gmail.com', '15 rue de pavillon', 'Le Blanc-Mesnil', '93150'),
(2, 'Marguet', 'Céline', 'marguet.celine@gmail.com', '230 avenue Jean Jaurès', 'Drancy', '93700'),
(9, 'Kent', 'Jonathan', 'jonathan.kent@gmail.com', '79 rue des compagnes', 'Smallville', '54320');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `numvol` varchar(15) NOT NULL,
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

INSERT INTO `vol` (`numvol`, `depart`, `arrivee`, `datedepart`, `datearrive`, `place`, `idavion`, `prix`) VALUES
('AIR5007', 'Paris CDG - France', 'Dakar - Sénégal', '22/04/2011 12:00', '22/04/2011 17:00', 120, 1, 560),
('AIR5108', 'Paris CDG - France', 'Londre - Angleterre', '23/04/2011 13:00', '23/04/2011 18:20', 300, 2, 600);

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
  MODIFY `numutil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

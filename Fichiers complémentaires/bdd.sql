-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Jeu 27 Février 2020 à 09:03
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gsb2`
--
CREATE DATABASE `gsb3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gsb3`;

-- --------------------------------------------------------

--
-- Structure de la table `animateur`
--

CREATE TABLE IF NOT EXISTS `animateur` (
  `code` int(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `adresse` varchar(25) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ville` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `animateur`
--

INSERT INTO `animateur` (`code`, `nom`, `prenom`, `adresse`, `cp`, `ville`) VALUES
(2, 'Ducombe', 'Claude', '254 avenue des roses', 91200, 'Arpajon'),
(3, 'ba', 'ibrahima', '15 bd champs elysées', 91000, 'Evry'),
(4, 'tho', 'thomas', '46 allée des dragon', 91000, 'Evry');

-- --------------------------------------------------------

--
-- Structure de la table `conference`
--

CREATE TABLE IF NOT EXISTS `conference` (
  `id` int(11) NOT NULL,
  `horaire` varchar(25) DEFAULT NULL,
  `duree` varchar(25) DEFAULT NULL,
  `nbPlace` int(11) DEFAULT NULL,
  `dateP` varchar(25) DEFAULT NULL,
  `CodeC` int(11) NOT NULL,
  `code` int(5) DEFAULT NULL,
  `codeSalle` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`,`CodeC`),
  KEY `FK_Presentation_CodeC` (`CodeC`),
  KEY `FK_Presentation_code` (`code`),
  KEY `FK_Presentation_codeSalle` (`codeSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `conference`
--

INSERT INTO `conference` (`id`, `horaire`, `duree`, `nbPlace`, `dateP`, `CodeC`, `code`, `codeSalle`) VALUES
(1, '12:50', '00:30', 2, '12-12-2020', 2, 2, 200),
(4, '12:10', '01:00', 0, '12-12-2020', 1, 2, 201),
(4, '12:50', '00:30', 6, '12-12-2020', 2, 2, 200),
(5, '12:10', '01:00', 7, '12-12-2020', 1, 2, 201),
(5, '12:10', '01:00', 10, '12-12-2020', 2, 2, 201),
(6, '12:50', '12:12', 12, '11-12-2020', 1, 4, 101),
(6, '12:50', '12:12', 14, '11-12-2020', 2, 4, 101),
(7, '12:50', '12:12', 16, '11-12-2020', 1, 4, 101),
(7, '12:50', '12:12', 18, '11-12-2020', 2, 4, 101),
(8, '12:50', '12:12', 20, '11-12-2020', 2, 4, 101),
(9, '12:50', '12:12', 22, '11-12-2020', 2, 4, 101);

-- --------------------------------------------------------

--
-- Structure de la table `inscris`
--

CREATE TABLE IF NOT EXISTS `inscris` (
  `code` varchar(25) NOT NULL,
  `id` int(11) NOT NULL,
  `CodeC` int(11) NOT NULL,
  PRIMARY KEY (`code`,`id`,`CodeC`),
  KEY `FK_Inscris_id` (`id`),
  KEY `FK_Inscris_CodeC` (`CodeC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscris`
--

INSERT INTO `inscris` (`code`, `id`, `CodeC`) VALUES
('a131', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `codeSalle` int(25) NOT NULL,
  `nomSalle` varchar(100) NOT NULL,
  `capacite` int(11) DEFAULT NULL,
  PRIMARY KEY (`codeSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`codeSalle`, `nomSalle`, `capacite`) VALUES
(100, 'Salle A', 10),
(101, 'Salle B', 5),
(200, 'Salle C', 25),
(201, 'Salle D', 40);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `CodeC` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CodeC`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`CodeC`, `theme`) VALUES
(1, 'Molecule'),
(2, 'Enfant');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE IF NOT EXISTS `visiteur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(40) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `Statut` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `Statut`) VALUES
('a131', 'Villechalane', 'Louis', 'lvillechalane', 'b4447b4b0dd97c2f0fc05931cda5955ce1ab6a3f', '8 rue des Charmes', '46000', 'Cahors', 'R'),
('a17', 'Andre', 'David', 'dandre', '145cca2956395d7eae397a4fd728ac30da5d2517', '1 rue Petit', '46200', 'Lalbenque', 'V'),
('a55', 'Bedos', 'Christian', 'cbedos', '4e9ef08dc10360e6dd0b697493d47e17c6c9c98e', '1 rue Peranud', '46250', 'Montcuq', 'V'),
('a93', 'Tusseau', 'Louis', 'ltusseau', 'ea7c70091b0bfad66e3bca809c0cce8372ce9d70', '22 rue des Ternes', '46123', 'Gramat', 'V'),
('b13', 'Bentot', 'Pascal', 'pbentot', 'bcf540d2d6a16a1a83020ee410e690cb889a44cd', '11 allée des Cerises', '46512', 'Bessines', 'V'),
('b16', 'Bioret', 'Luc', 'lbioret', 'd1da4114a3fe1f1dbd884c0d42057603dfff64bc', '1 Avenue gambetta', '46000', 'Cahors', 'V'),
('b19', 'Bunisset', 'Francis', 'fbunisset', '13120fd04f8db21df2475b353d46be8e8e8ff54c', '10 rue des Perles', '93100', 'Montreuil', 'V'),
('b25', 'Bunisset', 'Denise', 'dbunisset', 'ea89e9a72657c1efc208c649420fd81838fd4343', '23 rue Manin', '75019', 'paris', 'V'),
('b28', 'Cacheux', 'Bernard', 'bcacheux', 'f6d3f5c3e83b72775cecf0ebdeadff277d3fda14', '114 rue Blanche', '75017', 'Paris', 'V'),
('b34', 'Cadic', 'Eric', 'ecadic', 'ebe86fc00784e8269ed1052a5397c1b466083eed', '123 avenue de la République', '75011', 'Paris', 'V'),
('b4', 'Charoze', 'Catherine', 'ccharoze', 'f896842641bdd4e81c9aa953e9e3ad8074988bde', '100 rue Petit', '75019', 'Paris', 'V'),
('b50', 'Clepkens', 'Christophe', 'cclepkens', '8b1d2acef4fd5afb4db2288f0fc874ee0303c914', '12 allée des Anges', '93230', 'Romainville', 'V'),
('b59', 'Cottin', 'Vincenne', 'vcottin', 'cdcc7f0d709eeb42288941b0b1dcaa4d605d2b45', '36 rue Des Roches', '93100', 'Monteuil', 'V'),
('c14', 'Daburon', 'François', 'fdaburon', '38a8558c84f0b3c5ed4a0506bf074da5389410ea', '13 rue de Chanzy', '94000', 'Créteil', 'V'),
('c3', 'De', 'Philippe', 'pde', '32e2e298d881b616b996d2808d1564b386192fc2', '13 rue Barthes', '94000', 'Créteil', 'V'),
('c54', 'Debelle', 'Michel', 'mdebelle', '06a119585f64ae3df40de002470a8d61a10892c8', '181 avenue Barbusse', '93210', 'Rosny', 'V'),
('d13', 'Debelle', 'Jeanne', 'jdebelle', '243c1b4a2f1cf639464ef29d3b6fc5143b7a1d4d', '134 allée des Joncs', '44000', 'Nantes', 'V'),
('d51', 'Debroise', 'Michel', 'mdebroise', 'b4590409b2d4ffe494192b0556619711fbea2d7d', '2 Bld Jourdain', '44000', 'Nantes', 'V'),
('e22', 'Desmarquest', 'Nathalie', 'ndesmarquest', '00d4fe6d815bc752007b1a92e6ee8e9b7f07bb87', '14 Place d Arc', '45000', 'Orléans', 'V'),
('e24', 'Desnost', 'Pierre', 'pdesnost', 'ac6d3f11aa42c38a50e2f2df3883d757a8a0cedd', '16 avenue des Cèdres', '23200', 'Guéret', 'V'),
('e39', 'Dudouit', 'Frédéric', 'fdudouit', '6e06fd4b3a26145bbc55216eae408e69ad7f9612', '18 rue de l église', '23120', 'GrandBourg', 'V'),
('e49', 'Duncombe', 'Claude', 'cduncombe', '11b718e8dc6c4d8afaa77f508ce1ccbe1490d93c', '19 rue de la tour', '23100', 'La souteraine', 'V');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `FK_Presentation_code` FOREIGN KEY (`code`) REFERENCES `animateur` (`code`),
  ADD CONSTRAINT `FK_Presentation_CodeC` FOREIGN KEY (`CodeC`) REFERENCES `theme` (`CodeC`),
  ADD CONSTRAINT `FK_Presentation_codeSalle` FOREIGN KEY (`codeSalle`) REFERENCES `salle` (`codeSalle`);

--
-- Contraintes pour la table `inscris`
--
ALTER TABLE `inscris`
  ADD CONSTRAINT `FK_Inscris_code` FOREIGN KEY (`code`) REFERENCES `visiteur` (`id`),
  ADD CONSTRAINT `FK_Inscris_CodeC` FOREIGN KEY (`CodeC`) REFERENCES `theme` (`CodeC`),
  ADD CONSTRAINT `FK_Inscris_id` FOREIGN KEY (`id`) REFERENCES `conference` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

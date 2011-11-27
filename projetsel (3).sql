-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 27 Novembre 2011 à 16:11
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projetsel`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateurId` int(10) NOT NULL,
  `typeAnnonceId` int(5) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `desc` text NOT NULL,
  `date` date NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(40) NOT NULL,
  `coutPoivre` int(10) NOT NULL,
  `idAnnonceParent` int(11) NOT NULL,
  `annonceValide` int(2) NOT NULL,
  `datePublication` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`id`, `utilisateurId`, `typeAnnonceId`, `titre`, `desc`, `date`, `adresse`, `cp`, `ville`, `coutPoivre`, `idAnnonceParent`, `annonceValide`, `datePublication`) VALUES
(1, 0, 0, 'Annonce 2bis', 'Description de l''annonce2', '2012-09-29', 'adresse2', 'Cp2', 'ville2', 100, 0, 0, '0000-00-00'),
(3, 0, 0, 'Annonce 1', 'blabla1', '2011-09-29', 'ICi', '95490', 'Vaureal', 0, 0, 0, '0000-00-00'),
(4, 2, 0, 'Annonce 3', 'blabla3', '2011-09-29', 'ICi', '95490', 'Vaureal', 100, 100, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  `datePublication` date NOT NULL,
  `annonceId` int(10) NOT NULL,
  `utilisateurId` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `texte`, `datePublication`, `annonceId`, `utilisateurId`) VALUES
(2, 'Com2', '2011-09-29', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `contenulibre`
--

CREATE TABLE IF NOT EXISTS `contenulibre` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idFonctionnel` varchar(100) NOT NULL,
  `texte` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `contenulibre`
--

INSERT INTO `contenulibre` (`id`, `idFonctionnel`, `texte`) VALUES
(3, 'CONTENU_HOME', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(4, 'CONTENU_CONTACT', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum 2');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE IF NOT EXISTS `niveau` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`id`, `label`) VALUES
(1, 'niveau23');

-- --------------------------------------------------------

--
-- Structure de la table `typeannonce`
--

CREATE TABLE IF NOT EXISTS `typeannonce` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `typeannonce`
--

INSERT INTO `typeannonce` (`id`, `label`) VALUES
(1, 'label12');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `telephonePortable` varchar(50) NOT NULL,
  `telephoneFixe` varchar(50) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `poivre` int(100) NOT NULL,
  `dateDerniereConnection` date NOT NULL,
  `niveauId` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `pseudo`, `password`, `email`, `adresse`, `cp`, `ville`, `telephonePortable`, `telephoneFixe`, `photo`, `poivre`, `dateDerniereConnection`, `niveauId`) VALUES
(2, 'Roussel', 'Guillaume', 'Exod', '370095', 'timolasson95@hotmail.fr', 'adresse1', 'Cp', 'ville', '0101010101', '0606060606', '', 150000, '2011-12-09', -1);

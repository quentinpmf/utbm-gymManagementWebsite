-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 29 mai 2018 à 06:12
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetta70`
--
CREATE DATABASE IF NOT EXISTS `projetta70` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetta70`;

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

DROP TABLE IF EXISTS `abonnements`;
CREATE TABLE IF NOT EXISTS `abonnements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texte` varchar(50) NOT NULL,
  `tarif` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`id`, `texte`, `tarif`) VALUES
(1, 'Abonnement Etudiant', 19.99),
(2, 'Abonnement Normal', 29.99),
(3, 'Abonnement Elite', 39.99);

-- --------------------------------------------------------

--
-- Structure de la table `abonnements_utilisateurs`
--

DROP TABLE IF EXISTS `abonnements_utilisateurs`;
CREATE TABLE IF NOT EXISTS `abonnements_utilisateurs` (
  `id_abonne` int(11) NOT NULL AUTO_INCREMENT,
  `id_abonnement` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_abonnement` date NOT NULL,
  PRIMARY KEY (`id_abonne`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `abonnements_utilisateurs`
--

INSERT INTO `abonnements_utilisateurs` (`id_abonne`, `id_abonnement`, `id_utilisateur`, `date_abonnement`) VALUES
(1, 1, 1, '2018-05-18'),
(2, 3, 2, '2018-05-18'),
(3, 3, 3, '2018-05-18'),
(4, 2, 5, '2018-05-21');

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

DROP TABLE IF EXISTS `actualites`;
CREATE TABLE IF NOT EXISTS `actualites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date_creation` date NOT NULL,
  `image` blob NOT NULL,
  `publie` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_coach` int(11) NOT NULL,
  `date` date NOT NULL,
  `plage_horraire` varchar(20) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `nb_max_participants` int(11) NOT NULL,
  `participants` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `demande_achat`
--

DROP TABLE IF EXISTS `demande_achat`;
CREATE TABLE IF NOT EXISTS `demande_achat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_coach` int(11) NOT NULL,
  `raison` text NOT NULL,
  `montant` float NOT NULL,
  `date_demande` date NOT NULL,
  `date_validation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `chemin` varchar(50) NOT NULL,
  `date_creation` date NOT NULL,
  `date_limite_paiement` date NOT NULL,
  `date_validation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `texte` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `machines`
--

DROP TABLE IF EXISTS `machines`;
CREATE TABLE IF NOT EXISTS `machines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `date_achat` date NOT NULL,
  `etat` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reparation`
--

DROP TABLE IF EXISTS `reparation`;
CREATE TABLE IF NOT EXISTS `reparation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_machine` int(11) NOT NULL,
  `date_reparation` date NOT NULL,
  `remarque` text NOT NULL,
  `etat` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `num_adherent` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `bloque` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `password`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `telephone`, `num_adherent`, `role`, `bloque`) VALUES
(1, 'quentinpmf@gmail.com', 'a984197e1420b7ea4006a75e7dd4b55a4bc04263', 'Boudinot', 'Quentin', '1 avenue charles bohn, appartement 149', '90000', 'Belfort', '0672755858', 1, 1, 0),
(4, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'Compte', '', '', '', '', 0, 4, 0),
(5, 'abdelrazak@gmail.com', 'a984197e1420b7ea4006a75e7dd4b55a4bc04263', 'Abdel', 'Razak', 'adresse', '90000', 'Belfort', '0303030303', 4, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

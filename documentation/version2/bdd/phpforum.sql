-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 25 Janvier 2015 à 06:15
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `phpforum`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `idMembre` int(11) DEFAULT NULL,
  `nomCategorie` varchar(25) DEFAULT NULL,
  `dateCreationCategorie` date DEFAULT NULL,
  `descriptionCategorie` varchar(255) DEFAULT NULL,
  `nombreSousCategorie` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `idMembre`, `nomCategorie`, `dateCreationCategorie`, `descriptionCategorie`, `nombreSousCategorie`) VALUES
(4, 2, 'GÃ©nÃ©ral', '2015-01-24', 'Forum destinÃ© aux rÃ¨gles, avis, annonces importantes.', 5),
(5, 2, 'Le coin dÃ©tente', '2015-01-24', 'Ici on aura tout ce qui est en rapport avec la dÃ©tente', 3),
(6, 2, 'Informatique', '2015-01-24', 'Forum destinÃ© Ã  l''informatique', 2),
(7, 2, 'Graphisme', '2015-01-24', 'Forum destinÃ© aux graphisme', 1),
(8, 2, 'Divers', '2015-01-24', 'L''inclassable', 1),
(9, 2, 'Section VIP', '2015-01-24', 'Forum destinÃ© aux membres VIP', 2),
(10, 2, 'Poubelle', '2015-01-24', 'Corbeille de tous les forums.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `idGrade` int(11) NOT NULL AUTO_INCREMENT,
  `idMembre` int(11) NOT NULL COMMENT 'Celui qui a crée le grade',
  `nomGrade` varchar(25) DEFAULT NULL,
  `dateCreationGrade` date DEFAULT NULL,
  PRIMARY KEY (`idGrade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `grade`
--

INSERT INTO `grade` (`idGrade`, `idMembre`, `nomGrade`, `dateCreationGrade`) VALUES
(1, 1, 'Administrateur', '2015-01-22'),
(2, 1, 'Membre Lambda', '2015-01-22');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `idMembre` int(11) NOT NULL AUTO_INCREMENT,
  `idGrade` int(11) DEFAULT NULL,
  `mailMembre` varchar(35) DEFAULT NULL,
  `mdpMembre` varchar(50) DEFAULT NULL,
  `pseudoMembre` varchar(30) DEFAULT NULL,
  `nomMembre` varchar(25) DEFAULT NULL,
  `prenomMembre` varchar(25) DEFAULT NULL,
  `adresseMembre` varchar(25) DEFAULT NULL,
  `cpMembre` int(5) DEFAULT NULL,
  `villeMembre` varchar(25) DEFAULT NULL,
  `estAdminMembre` enum('oui','non') DEFAULT NULL,
  `dateInscriptionMembre` date DEFAULT NULL,
  `nbMessageMembre` int(11) NOT NULL DEFAULT '0',
  `lienAvatarMembre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idMembre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `idGrade`, `mailMembre`, `mdpMembre`, `pseudoMembre`, `nomMembre`, `prenomMembre`, `adresseMembre`, `cpMembre`, `villeMembre`, `estAdminMembre`, `dateInscriptionMembre`, `nbMessageMembre`, `lienAvatarMembre`) VALUES
(8, 2, 'qsqsqsq@live.fr', '098f6bcd4621d373cade4e832627b4f6', 'moktar', 'nomMoktar', 'prenomMoktar', 'azzaaz', 91580, 'orleans', 'non', '2015-01-19', 12, NULL),
(14, 1, 'admin@live.fr', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'nomAdmin', 'prenomAdmin', '4 rue du cocacola', 45000, 'Orleans', 'oui', '2015-01-24', 12, 'avatar/14.jpg'),
(17, 2, 'zaza@live.fr', '8ba97607a1485ccdbe19745ed80cd52d', 'Tintin', 'nomTintin', 'reerer', '', 0, '', NULL, '2015-01-25', 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `idReponse` int(11) NOT NULL AUTO_INCREMENT,
  `idSousCategorie` int(11) DEFAULT NULL,
  `idSujet` int(11) DEFAULT NULL,
  `idMembre` int(11) DEFAULT NULL,
  `dateCreationReponse` date DEFAULT NULL,
  `messageReponse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idReponse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`idReponse`, `idSousCategorie`, `idSujet`, `idMembre`, `dateCreationReponse`, `messageReponse`) VALUES
(1, 5, 48, 2, '2015-01-24', 'dfdfdfdfdf'),
(3, 6, 49, 8, '2015-01-24', 'fddfdffd'),
(4, 6, 51, 8, '2015-01-24', 'dfdfddf'),
(5, 6, 49, 8, '2015-01-24', 'dfdd'),
(8, 6, 49, 8, '2015-01-24', 'rgggggggggggggg'),
(9, 6, 50, 2, '2015-01-24', 'Bonjour Moktar'),
(10, 6, 49, 2, '2015-01-24', 'Quelle belle prez !'),
(12, 5, 48, 8, '2015-01-24', 'C''est oufff !'),
(13, 5, 48, 14, '2015-01-24', 'On sort le champagne !'),
(14, 6, 49, 14, '2015-01-24', 'Il faut arrÃªter de rÃ©pondre maintenant ! Merci'),
(29, 5, 48, 8, '2015-01-25', 'Superbe forum !'),
(32, 5, 48, 17, '2015-01-25', 'fddffd'),
(33, 5, 61, 8, '2015-01-25', 'TrÃ¨s bonne initiative !'),
(34, 7, 65, 14, '2015-01-25', 'Merci pour cet avis constructif !'),
(35, 6, 49, 17, '2015-01-25', 'J''adore cette prez !');

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE IF NOT EXISTS `souscategorie` (
  `idSousCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorie` int(11) DEFAULT NULL,
  `idMembre` int(11) DEFAULT NULL,
  `dateCreationSousCategorie` date DEFAULT NULL,
  `nomSousCategorie` varchar(25) DEFAULT NULL,
  `descriptionSousCategorie` varchar(100) DEFAULT NULL,
  `nombreSujetSousCategorie` int(11) NOT NULL DEFAULT '0',
  `nombreReponseSousCategorie` int(11) NOT NULL DEFAULT '0',
  `dateDernierMessage` date DEFAULT NULL,
  `pseudoDernierMessage` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idSousCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `souscategorie`
--

INSERT INTO `souscategorie` (`idSousCategorie`, `idCategorie`, `idMembre`, `dateCreationSousCategorie`, `nomSousCategorie`, `descriptionSousCategorie`, `nombreSujetSousCategorie`, `nombreReponseSousCategorie`, `dateDernierMessage`, `pseudoDernierMessage`) VALUES
(5, 4, 2, '2015-01-24', 'RÃ¨gles/Informations', 'Toutes les rÃ¨gles et informations.', 2, 5, '2015-01-25', 'moktar'),
(6, 4, 2, '2015-01-24', 'PrÃ©sentation', 'Vous Ãªtes nouvelle? Nouveau?', 2, 5, '2015-01-25', 'Tintin'),
(7, 4, 2, '2015-01-24', 'Avis', 'Des suggestions, avis ou critiques.', 2, 1, '2015-01-25', 'admin'),
(8, 5, 2, '2015-01-24', 'CafÃ©', 'Pour parler de tout et de rien.', 0, 0, NULL, NULL),
(9, 5, 2, '2015-01-24', 'Humour/Insolite', 'Toutes vos histoires, liens, vidÃ©os.', 0, 0, NULL, NULL),
(10, 5, 2, '2015-01-24', ' Jeux alakon', 'Tous vos jeux "alakon".', 0, 0, NULL, NULL),
(11, 6, 2, '2015-01-24', 'Programmation/Coding', 'Discussions autour des langages informatiques', 0, 0, NULL, NULL),
(12, 6, 2, '2015-01-24', 'Informatique GÃ©nÃ©rale', 'Tout ce qui concerne l''informatique', 0, 0, NULL, NULL),
(13, 6, 2, '2015-01-24', 'Tutoriels', 'Tous vos tutoriels relatifs Ã  l''informatique', 0, 0, NULL, NULL),
(14, 7, 2, '2015-01-24', 'Demandes graphiques', 'Pour toutes demandes graphiques ', 0, 0, NULL, NULL),
(15, 7, 2, '2015-01-24', 'Galerie', 'Vos galeries d''images ici! Montrez nous vos talents!', 0, 0, '2015-01-24', 'admin'),
(16, 8, 2, '2015-01-24', 'Divers', 'Tous ce qui ne rentrent pas dans les autres cases', 0, 0, NULL, NULL),
(17, 9, 2, '2015-01-24', 'CafÃ© du V.I.P', 'Parler entre V.I.P, telle est notre devise! ', 0, 0, NULL, NULL),
(18, 9, 2, '2015-01-24', 'Partage V.I.P', 'Tous vos partages VIP !', 0, 0, NULL, NULL),
(19, 10, 2, '2015-01-24', 'Corbeille', 'La corbeille', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE IF NOT EXISTS `sujet` (
  `idSujet` int(11) NOT NULL AUTO_INCREMENT,
  `idSousCategorie` int(1) DEFAULT NULL,
  `idMembre` int(11) DEFAULT NULL,
  `nomSujet` varchar(100) DEFAULT NULL,
  `messageSujet` varchar(255) DEFAULT NULL,
  `dateCreationSujet` date DEFAULT NULL,
  `statutSujet` enum('ouvert','clos') DEFAULT NULL,
  `nombreReponseSujet` int(11) NOT NULL DEFAULT '0',
  `dateDernierMessage` date DEFAULT NULL,
  `pseudoDernierMessage` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idSujet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`idSujet`, `idSousCategorie`, `idMembre`, `nomSujet`, `messageSujet`, `dateCreationSujet`, `statutSujet`, `nombreReponseSujet`, `dateDernierMessage`, `pseudoDernierMessage`) VALUES
(48, 5, 14, 'L''anniversaire de... phpForum', 'Aujourd''hui, c''est un grand jour, le forum est ready !', '2015-01-24', 'ouvert', 4, '2015-01-25', 'zaza'),
(49, 6, 14, 'Dylan RockStar', 'Je me prÃ©sente je mâ€™appelle Dylan !', '2015-01-24', 'ouvert', 5, '2015-01-25', 'Tintin'),
(55, 7, 14, 'Bluffant', 'Trop cool ce forum', '2015-01-24', 'clos', 0, NULL, NULL),
(56, 6, 14, 'Dylan Rockstar', 'Toujours plus haut toujours plus loin !', '2015-01-24', 'clos', 0, NULL, NULL),
(61, 5, 14, 'Attention au flood', 'Je rappelle qu''il est interdit de flooder.', '2015-01-24', 'ouvert', 1, '2015-01-25', 'moktar'),
(65, 7, 8, 'Amazing', 'Il est gÃ©nial ce forum ! Non?!', '2015-01-25', 'ouvert', 1, '2015-01-25', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

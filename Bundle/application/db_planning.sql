-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 21 Juin 2017 à 16:15
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db_planning`
--

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

CREATE TABLE IF NOT EXISTS `horaires` (
  `id_horaire` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` tinyint(3) unsigned NOT NULL,
  `start` datetime DEFAULT NULL,
  `type1` char(4) NOT NULL,
  `pause` datetime DEFAULT NULL,
  `reprise` datetime DEFAULT NULL,
  `type2` char(4) NOT NULL,
  `fin` datetime DEFAULT NULL,
  `jour` date NOT NULL,
  `total_heure_normal` time NOT NULL,
  `total_semaine` time NOT NULL,
  `total_mois` time NOT NULL,
  `total_annee` time NOT NULL,
  `annee` year(4) NOT NULL,
  `mois` int(4) NOT NULL,
  `semaine` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_horaire`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2008 ;

--
-- Contenu de la table `horaires`
--

INSERT INTO `horaires` (`id_horaire`, `id_users`, `start`, `type1`, `pause`, `reprise`, `type2`, `fin`, `jour`, `total_heure_normal`, `total_semaine`, `total_mois`, `total_annee`, `annee`, `mois`, `semaine`) VALUES
(1973, 40, '2017-05-04 09:45:51', 'norm', '2017-05-04 10:32:58', '2017-05-04 10:33:00', 'maj1', '2017-05-04 10:33:06', '2017-05-04', '00:47:13', '00:47:13', '00:47:13', '00:47:13', 2017, 5, 18),
(1975, 40, '2017-05-10 16:42:53', 'norm', '2017-05-10 16:43:02', '2017-05-10 16:43:06', 'form', '2017-05-10 16:43:10', '2017-05-10', '00:00:13', '00:00:13', '00:47:26', '00:47:26', 2017, 5, 19),
(1977, 40, '2017-05-31 11:45:39', 'form', '2017-05-31 11:46:11', '2017-05-31 11:46:15', 'norm', '2017-05-31 11:46:19', '2017-05-31', '00:00:36', '00:00:36', '00:48:02', '00:48:02', 2017, 5, 22),
(1979, 40, '2017-06-06 16:55:53', 'norm', '2017-06-06 16:56:08', '2017-06-06 17:24:59', 'norm', '2017-06-06 17:32:01', '2017-06-06', '00:07:17', '00:07:17', '00:07:17', '00:55:19', 2017, 6, 23),
(1985, 40, '2017-06-07 17:59:01', 'norm', '2017-06-07 18:00:26', '2017-06-07 18:00:33', 'maj2', '2017-06-07 18:00:37', '2017-06-07', '00:01:29', '00:08:46', '00:08:46', '00:56:48', 2017, 6, 23),
(1991, 40, '2017-06-08 12:18:34', 'maj1', '2017-06-08 17:28:22', '2017-06-08 17:28:31', 'form', '2017-06-08 17:28:36', '2017-06-08', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 2017, 6, 23),
(1992, 40, '2017-06-12 11:43:32', 'maj1', '2017-06-13 10:15:00', '2017-06-12 12:50:29', 'maj2', '2017-06-12 12:50:39', '2017-06-12', '00:27:13', '00:27:13', '00:35:59', '01:24:01', 2017, 6, 24),
(1994, 40, '2017-06-13 17:35:50', 'norm', '2017-06-13 17:57:47', '2017-06-13 18:16:49', 'maj1', '2017-06-13 18:16:59', '2017-06-13', '00:22:07', '00:49:20', '00:58:06', '01:46:08', 2017, 6, 24),
(1995, 40, '2017-06-14 15:09:29', 'norm', '2017-06-14 17:09:20', '2017-06-14 17:09:27', 'norm', '2017-06-14 17:09:33', '2017-06-14', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 2017, 6, 24),
(1997, 40, '2017-06-15 12:42:27', 'norm', '2017-06-15 12:42:33', '2017-06-15 12:49:55', 'maj1', '2017-06-15 12:55:57', '2017-06-15', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 2017, 6, 24),
(2006, 40, '2017-06-20 18:35:29', 'maj1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2017-06-20', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 2017, 6, 25),
(2007, 40, '2017-06-21 10:46:54', 'norm', '2017-06-21 11:00:33', '2017-06-21 11:09:22', 'norm', '2017-06-21 11:25:30', '2017-06-21', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 2017, 6, 25);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `libelle`) VALUES
(1, 'admin'),
(2, 'developpeur'),
(3, 'secretaire'),
(4, 'veilleur'),
(5, 'stagiaire'),
(6, 'chef de projet');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` tinyint(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL,
  `start_contrat` date NOT NULL,
  `end_contrat` date NOT NULL,
  `heure_semaine` int(11) NOT NULL,
  `salaire_brut` int(11) NOT NULL,
  `salaire_net` int(11) NOT NULL,
  `societe` varchar(255) NOT NULL,
  `role_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_users`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_users`, `nom`, `prenom`, `email`, `password`, `start_contrat`, `end_contrat`, `heure_semaine`, `salaire_brut`, `salaire_net`, `societe`, `role_id`) VALUES
(40, 'touati', 'morgane', 'morgane.touati@dartybox.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2016-10-01', '2019-09-29', 32, 1320, 1120, 'MUNCI(Issy)', 2),
(41, 'je suis admin', 'ceci est un admin', 'a.dmin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2014-01-03', '2018-03-03', 32, 526, 555, 'MUNCI(Issy)', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `horaires`
--
ALTER TABLE `horaires`
  ADD CONSTRAINT `horaires_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

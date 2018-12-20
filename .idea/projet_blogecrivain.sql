-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 01 nov. 2018 à 19:55
-- Version du serveur :  5.7.19
-- Version de PHP :  7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_blogecrivain`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf16 NOT NULL,
  `post` text CHARACTER SET utf16 NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `title`, `post`, `date_created`) VALUES
(33, 'toto', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2018-11-01 01:13:48'),
(37, 'Soo', '<p>Votre Contenu...</p>', '2018-11-01 01:41:05');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_billet` int(11) NOT NULL,
  `author` varchar(100) CHARACTER SET latin1 NOT NULL,
  `comment` text NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `signaled` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_billet` (`id_billet`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `author`, `comment`, `date_comment`, `signaled`) VALUES
(1, 1, 'toto', 'cghtfyfkuycly \r\nvvjljbv \r\nbvkvmuomhvh! ;xc', '2018-10-04 00:10:30', 1),
(4, 2, 'toto', 'nnn', '2018-10-06 20:34:06', NULL),
(5, 2, 'toto', 'nnn', '2018-10-06 20:36:49', NULL),
(6, 2, 'toto', 'bjkbhjdfej', '2018-10-06 20:36:55', NULL),
(7, 2, 'toto', 'bjkbhjdfej', '2018-10-06 20:44:36', NULL),
(9, 2, 'toto', 'JO', '2018-10-06 20:48:55', NULL),
(10, 1, 'toto', 'NN', '2018-10-06 20:49:25', NULL),
(11, 1, 'toto', 'NN', '2018-10-06 20:50:26', NULL),
(12, 1, 'toto', 'NN', '2018-10-06 20:55:58', NULL),
(13, 1, 'dimom', 'fzefcbjkhmz', '2018-10-06 21:07:16', NULL),
(14, 1, 'dimom', 'fzefcbjkhmz', '2018-10-07 00:07:01', NULL),
(15, 2, 'toto', 'jh', '2018-10-07 00:07:24', NULL),
(16, 2, 'toto', 'jh', '2018-10-07 00:08:06', NULL),
(17, 2, 'h', 'h', '2018-10-07 00:12:57', NULL),
(18, 2, 'j', 'u', '2018-10-07 00:13:38', NULL),
(19, 2, 'j', 'u', '2018-10-07 00:15:36', NULL),
(20, 2, 'j', 'u', '2018-10-07 00:16:20', NULL),
(21, 2, 'gg', 'nn', '2018-10-07 20:23:20', NULL),
(22, 2, 'gg', 'nn', '2018-10-07 20:24:07', NULL),
(23, 2, 'j', 'nn', '2018-10-07 20:24:15', NULL),
(24, 2, 'j', 'nn', '2018-10-07 20:24:39', NULL),
(25, 1, 'momo', 'jghukftvo', '2018-10-07 20:49:02', NULL),
(26, 1, 'hh', 'hh', '2018-10-07 20:49:33', NULL),
(27, 1, 'hh', 'hh', '2018-10-07 20:50:12', NULL),
(28, 1, 'hh', 'hh', '2018-10-07 20:50:55', NULL),
(29, 1, 'hh', 'hh', '2018-10-07 20:59:05', NULL),
(30, 1, 'hh', 'hh', '2018-10-07 21:12:47', NULL),
(31, 1, 'hh', 'hh', '2018-10-07 21:25:25', NULL),
(32, 1, 'hh', 'hh', '2018-10-07 21:26:22', NULL),
(33, 1, 'hh', 'hh', '2018-10-07 21:26:57', NULL),
(35, 1, 'toto', 'bb', '2018-10-08 00:03:51', NULL),
(36, 3, 'toto', ',n', '2018-10-09 01:05:13', NULL),
(37, 2, 'toto', 'vv', '2018-10-09 22:35:49', NULL),
(38, 2, 'toto', 'vv', '2018-10-09 22:48:56', NULL),
(39, 2, 'toto', 'vv', '2018-10-09 22:52:40', NULL),
(40, 2, 'toto', 'vv', '2018-10-09 22:56:31', NULL),
(41, 2, 'toto', 'vv', '2018-10-09 22:57:38', NULL),
(42, 3, 'toto', 'bndfvlghdfp', '2018-10-11 00:09:27', NULL),
(83, 5, 'toto', 'nn', '2018-10-22 00:46:05', NULL),
(89, 4, 'toto', 'bbbbbbbbbbb', '2018-10-29 15:51:43', 1),
(90, 4, 'gg', 'hhhh', '2018-10-29 15:51:52', 1),
(91, 6, 'gg', 'SUPER', '2018-10-30 14:37:24', 0),
(92, 6, 'gg', 'SUPER', '2018-10-30 14:38:28', 0),
(93, 6, 'gg', 'SUPER', '2018-10-30 14:39:11', 0),
(94, 6, 'gg', 'SUPER', '2018-10-30 14:39:25', 0),
(98, 24, 'TOTO', 'SUPER ARTICLE', '2018-10-30 17:37:35', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf16 NOT NULL,
  `date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `date_registration`) VALUES
(1, 'jojo', 'faveurextra@gmailcom', '9cf95dacd226dcf43da376cdb6cbba7035218921', '2018-10-15 22:36:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

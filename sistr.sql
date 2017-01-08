-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 08 Janvier 2017 à 19:07
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sistr`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(10) unsigned NOT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `login` varchar(256) NOT NULL,
  `motdepasse` varchar(256) NOT NULL,
  `creation` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `connexion` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `login`, `motdepasse`, `creation`, `connexion`) VALUES
(1, 'Oulab-Moussa', 'Mustapha', 'mom@3il.fr', 'mom', 'fb5b10ff80b00672580c7504526e3996eb9c38f7fcf4b08371f77a3ed050b7be', '2016-10-17 00:00:00', '0000-00-00 00:00:00'),
(2, 'Gaudin', 'Hervé', 'gaudin@3il.fr', 'gaudin', 'fb5b10ff80b00672580c7504526e3996eb9c38f7fcf4b08371f77a3ed050b7be', '2016-10-17 00:00:00', '0000-00-00 00:00:00'),
(3, 'Ruchaud', 'William', 'ruchaud@3il.fr', 'ruchaud', 'fb5b10ff80b00672580c7504526e3996eb9c38f7fcf4b08371f77a3ed050b7be', '2016-10-17 00:00:00', '0000-00-00 00:00:00'),
(40, 'Chervy', 'Benjamin', 'chervy@3il.fr', 'lecreusois', '86052c4a4ea4fe70933fea74432de1704365744d1a147ebe0eab2af287b8add0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'wang', 'yuchen', '228349600@qq.com', 'wangyc', 'acb8eb091427fc5c80e64850d8724383c6f7dc13bfdfae14019af246fd3e2634', '2017-01-02 17:06:33', '0000-00-00 00:00:00'),
(62, 'wang', 'yuchen', '228349600@qq.com', 'wangyc1234', '63002a7c85e5f3486ff1bfaf629c3b4b0d2fabf75ffd8e1529652d0218683c96', '2017-01-06 23:40:44', '0000-00-00 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 12 Décembre 2017 à 04:36
-- Version du serveur :  5.6.31
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `index_sangiaodich`
--

-- --------------------------------------------------------

--
-- Structure de la table `info_giaodich`
--

CREATE TABLE IF NOT EXISTS `info_giaodich` (
  `id` int(11) NOT NULL,
  `midman_name` varchar(255) NOT NULL,
  `midman_fbid` int(11) NOT NULL,
  `midman_fb` varchar(255) NOT NULL,
  `hirer_name` varchar(255) NOT NULL,
  `hirer_fb` varchar(255) NOT NULL,
  `hirer_fbid` int(11) NOT NULL,
  `hirer_phone` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `info_giaodich`
--

INSERT INTO `info_giaodich` (`id`, `midman_name`, `midman_fbid`, `midman_fb`, `hirer_name`, `hirer_fb`, `hirer_fbid`, `hirer_phone`, `service`, `price`, `note`, `created_date`) VALUES
(7, 'Trần Quốc Long', 2147483647, 'https://www.facebook.com/hellcat.info', 'Vuong gia moc', 'fb.com/tql.clone', 1516546156, 25186461, 'BNS', 100000, 'ko co', '2017-12-01 05:30:09'),
(8, 'Trần Quốc Long', 2147483647, 'https://www.facebook.com/hellcat.info', 'Vuong gia moc', 'fb.com/tql.clone', 1516546156, 25186461, 'BNS', 110000, 'ko co', '2017-12-01 05:30:14'),
(9, 'Trần Quốc Long', 2147483647, 'https://www.facebook.com/hellcat.info', 'Vuong gia moc', 'fb.com/tql.clone', 1516546156, 25186461, 'BNS', 120000, 'ko co', '2017-12-01 05:30:19'),
(10, 'Trần Quốc Long', 2147483647, 'https://www.facebook.com/hellcat.info', 'Vuong gia moc', 'fb.com/tql.clone', 1516546156, 25186461, 'BNS', 130000, 'ko co', '2017-12-01 05:30:23'),
(11, 'Trần Quốc Long', 2147483647, 'https://www.facebook.com/hellcat.info', 'Vuong gia moc', 'fb.com/tql.clone', 1516546156, 25186461, 'BNS', 140000, 'ko co', '2017-12-01 05:30:29'),
(12, 'Trần Quốc Long', 2147483647, 'https://www.facebook.com/hellcat.info', 'Vuong gia moc', 'fb.com/tql.clone', 1516546156, 25186461, 'BNS', 150000, 'ko co', '2017-12-01 05:30:33'),
(13, 'Trần Quốc Long', 2147483647, 'https://www.facebook.com/hellcat.info', 'Vuong gia moc', 'fb.com/tql.clone', 1516546156, 25186461, 'BNS', 160000, 'ko co', '2017-12-01 05:30:43'),
(14, 'Trần Quốc Long', 2147483647, 'https://www.facebook.com/hellcat.info', 'Vuong gia moc', 'fb.com/tql.clone', 1516546156, 25186461, 'BNS', 170000, 'ko co', '2017-12-01 05:30:48'),
(15, 'Trần Quốc Long', 2147483647, 'https://www.facebook.com/hellcat.info', 'Vuong gia moc', 'fb.com/tql.clone', 1516546156, 25186461, 'BNS', 180000, 'ko co', '2017-12-01 05:30:53');

-- --------------------------------------------------------

--
-- Structure de la table `info_mm`
--

CREATE TABLE IF NOT EXISTS `info_mm` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `midman_name` varchar(255) NOT NULL,
  `midman_fbid` varchar(255) NOT NULL,
  `midman_fb` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `fstlogin` bit(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `info_mm`
--

INSERT INTO `info_mm` (`id`, `username`, `midman_name`, `midman_fbid`, `midman_fb`, `role`, `password`, `salt`, `fstlogin`) VALUES
(3, 'hellcatvn', 'Trần Quốc Long', '100007458363302', 'https://www.facebook.com/hellcat.info', 'Middle Man', '4f0e2da02e1c690268248f4a6ad00f93', '15475146785a1057b4981194.95302089', b'1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `info_giaodich`
--
ALTER TABLE `info_giaodich`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `info_mm`
--
ALTER TABLE `info_mm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `info_giaodich`
--
ALTER TABLE `info_giaodich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `info_mm`
--
ALTER TABLE `info_mm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

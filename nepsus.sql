-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 02 Mai 2017 à 11:42
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nepsus`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codepostal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `siteweb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `capital` double DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matriculefiscale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `registre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `adresse`, `region`, `ville`, `pays`, `codepostal`, `mobile`, `siteweb`, `created`, `capital`, `ref`, `matriculefiscale`, `telephone`, `registre`) VALUES
(20, 'Achref', 'Tlija', 'achref.tlija@gmail.com', 'Rue Hedi Ben Amor Wedi Jnen Akouda', 'Sousse', 'Akouda', 'TN', '4022', 99756805, NULL, '2017-04-19 16:42:18', NULL, NULL, 'BF452125c90', 0, ''),
(21, 'Achref', 'Tlija', 'achref.tlija@gmail.com', 'Rue Hedi Ben Amor Wedi Jnen Akouda', 'Sousse', 'Akouda', 'TN', '4022', 52969785, NULL, '2017-04-19 16:42:59', NULL, NULL, 'adzadaz588', 0, ''),
(22, 'Aymen', 'Ghannouchi', 'contact@zenhosting.tn', 'av leopard senghour immeuble el ayachi 2éme etage sousse', 'Sousse', 'Sousse', 'AT', '4002', 99756805, 'zadaz', '2017-04-19 16:56:54', 15000, 'dzad', 'dazdzadzad', 0, ''),
(23, 'Achref', 'Tlija', 'achref.tlija@gmail.com', 'Rue Hedi Ben Amor Wedi Jnen Akouda', 'Sousse', 'Akouda', 'TN', '4022', 44, NULL, '2017-04-20 23:06:59', NULL, NULL, 'a', 0, ''),
(24, 'Achref', 'Tlija', 'achref.tlija@gmail.com', 'Rue Hedi Ben Amor Wedi Jnen Akouda', 'Sousse', 'Akouda', 'TN', '4022', 55075955, 'a', '2017-04-24 04:13:44', 526665, 'Affazad', 'Afazfzafazdazd', 52969785, ''),
(25, 'Achref', NULL, 'achref.tlija@gmail.com', 'AVENUE EL HARIK', NULL, NULL, 'BS', NULL, 21407489, NULL, '2017-04-26 01:48:32', NULL, NULL, 'a', 21407489, '');

-- --------------------------------------------------------

--
-- Structure de la table `contact_client`
--

CREATE TABLE `contact_client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codepostal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tva` tinyint(1) NOT NULL,
  `capital` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matriculefiscal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formejuridique` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nbemp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codedouane` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `siteweb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `codepostal`, `adresse`, `pays`, `ville`, `region`, `email`, `telephone`, `fax`, `tva`, `capital`, `registre`, `matriculefiscal`, `formejuridique`, `nbemp`, `codedouane`, `siteweb`, `created`) VALUES
(2, 'Fournisseur14', '4002', 'av leopard senghour immeuble el ayachi 2éme etage sousse', 'FR', 'Sousse', 'Sousse', 'contact@zenhosting.tn', '99756805', '56666996', 0, '15000000', 'B15245', 'Af45222', 'Société à responsabilité limitée (SARL)', '12', '5556', 'http://www.google.fr', '2017-05-02 10:22:27');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'achref.tlija@gmail.com', 'achref.tlija@gmail.com', 1, NULL, '$2y$13$zH801Nye7ilp9X075jUfQ.TkUcaMZS1J80o4O3LXIKOhUEFhoVLCq', '2017-04-08 19:35:10', NULL, NULL, 'a:0:{}');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact_client`
--
ALTER TABLE `contact_client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `contact_client`
--
ALTER TABLE `contact_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

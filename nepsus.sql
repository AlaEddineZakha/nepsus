-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 10 déc. 2017 à 09:21
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Structure de la table `bon_commande_client`
--

CREATE TABLE `bon_commande_client` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totalht` double NOT NULL,
  `totalttc` double NOT NULL,
  `created` datetime NOT NULL,
  `dateecheance` datetime NOT NULL,
  `facture_id` int(11) DEFAULT NULL,
  `livraison_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `bon_commande_client`
--

INSERT INTO `bon_commande_client` (`id`, `client_id`, `statut`, `totalht`, `totalttc`, `created`, `dateecheance`, `facture_id`, `livraison_id`) VALUES
(1, 1, 'En cours de traitement', 60, 67.2, '2017-11-26 20:39:33', '2017-12-26 20:39:33', 1, NULL),
(2, 8, 'Annulé', 20, 22.4, '2017-12-05 23:51:28', '2018-01-04 23:51:28', 2, NULL),
(3, 1, 'Confirmé', 270, 302.4, '2017-12-05 23:53:10', '2018-01-04 23:53:10', 3, NULL),
(4, 1, 'En attente', 349.45, 391.384, '2017-12-06 07:55:41', '2018-01-05 07:55:41', 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bon_commande_fournisseur`
--

CREATE TABLE `bon_commande_fournisseur` (
  `id` int(11) NOT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totalht` double NOT NULL,
  `totalttc` double NOT NULL,
  `created` datetime NOT NULL,
  `dateecheance` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bon_livraison_client`
--

CREATE TABLE `bon_livraison_client` (
  `id` int(11) NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totalht` double NOT NULL,
  `totalttc` double NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `nom`, `depth`) VALUES
(3, NULL, 'Informatique', 1),
(4, 3, 'PC fixe', 2),
(5, 3, 'Pc portable', 2),
(6, 4, 'Carte mère', 3),
(7, 6, 'Chipset', 4),
(8, 5, 'Touchepad', 3);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `capital` double DEFAULT NULL,
  `matriculefiscale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `raison` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `siteweb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formejuridique` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `capital`, `matriculefiscale`, `raison`, `email`, `adresse`, `region`, `ville`, `pays`, `telephone`, `mobile`, `fax`, `siteweb`, `registre`, `formejuridique`, `created`) VALUES
(1, 4.022, 'AF54855912', 'Client4', 'achref.tlija@gmail.com', 'Rue Hedi Ben Amor Wedi Jnen Akouda', 'Sousse', 'Akouda', 'TN', 21407489, 71685472, 0, '', 'AF54855995', 'Société à responsabilité limitée (SARL)', '2017-08-26 20:38:38'),
(8, NULL, 'AF54855995', 'Client1', 'client54@gmail.com', 'Rue Lieutenant', 'Sfax', 'Sfax', 'TN', 55895475, 0, 0, '', 'AF54855995', 'Société anonyme (SA)', '2017-08-05 21:00:48'),
(9, 4.022, 'AF54855963', 'Client2', 'client2@gmail.com', 'Rue Hedi Ben Amor Wedi Jnen Akouda', 'Sousse', 'Sousse', 'TN', 99756805, 71528526, 0, '', 'AF54855966', 'Société à responsabilité limitée (SARL)', '2017-03-26 20:38:38');

-- --------------------------------------------------------

--
-- Structure de la table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `administrateur_id` int(11) DEFAULT NULL,
  `raison` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `init` tinyint(1) NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `siteweb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` longblob,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `fax` int(11) DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formejuridique` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codedouane` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matriculefiscale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registredecommerce` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rib` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abreviation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `lastmodified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `configuration`
--

INSERT INTO `configuration` (`id`, `administrateur_id`, `raison`, `init`, `ville`, `siteweb`, `logo`, `adresse`, `telephone`, `fax`, `pays`, `formejuridique`, `codedouane`, `matriculefiscale`, `registredecommerce`, `iban`, `bic`, `rib`, `abreviation`, `created`, `lastmodified`) VALUES
(1, 1, 'Societe1', 1, 'Sfax', '', NULL, 'Rue Hedi Ben Amor Wedi Jnen Akouda', 99756805, 99756805, 'AD', 'Société à responsabilité limitée (SARL)', '', 'AF54855995', 'AF54855995', '', '', '', 'SCR', '2017-11-16 08:55:15', NULL),
(2, 5, 'Societe1', 1, 'Sousse', '', NULL, 'Rue Hedi Ben Amor Wedi Jnen Akouda', 50234761, 71234761, 'TN', 'Société unipersonnelle à responsabilité limitée (SUARL)', '', 'AF54855995', 'AF54855995', '', '', '', 'SCR', '2017-12-05 15:09:29', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact_client`
--

CREATE TABLE `contact_client` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact_fournisseur`
--

CREATE TABLE `contact_fournisseur` (
  `id` int(11) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

CREATE TABLE `devise` (
  `id` int(11) NOT NULL,
  `libele` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entrepot`
--

CREATE TABLE `entrepot` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacite` int(11) NOT NULL,
  `espacerempli` int(11) NOT NULL,
  `espacerestant` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `facture_client`
--

CREATE TABLE `facture_client` (
  `id` int(11) NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totalht` double NOT NULL,
  `totalttc` double NOT NULL,
  `created` datetime NOT NULL,
  `dateecheance` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `facture_client`
--

INSERT INTO `facture_client` (`id`, `statut`, `totalht`, `totalttc`, `created`, `dateecheance`) VALUES
(1, 'Payée', 60, 67.2, '2017-11-26 20:39:33', '2017-12-26 20:39:33'),
(2, 'Impayée', 20, 22.4, '2017-12-05 23:51:28', '2018-01-04 23:51:28'),
(3, 'Impayée', 270, 302.4, '2017-12-05 23:53:10', '2018-01-04 23:53:10'),
(4, 'Impayée', 349.45, 391.384, '2017-12-06 07:55:41', '2018-01-05 07:55:41'),
(5, 'Impayée', 349.45, 391.384, '2017-12-06 07:58:22', '2018-01-05 07:58:22');

-- --------------------------------------------------------

--
-- Structure de la table `facture_fournisseur`
--

CREATE TABLE `facture_fournisseur` (
  `id` int(11) NOT NULL,
  `bf_id` int(11) DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totalht` double NOT NULL,
  `totalttc` double NOT NULL,
  `created` datetime NOT NULL,
  `dateecheance` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `matriculefiscale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `raison` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `siteweb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formejuridique` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `matriculefiscale`, `raison`, `email`, `adresse`, `region`, `ville`, `pays`, `telephone`, `mobile`, `fax`, `siteweb`, `registre`, `formejuridique`, `created`) VALUES
(1, '', '', '', '', '', '', 'TN', 0, 0, 0, '', '', '', '2017-12-05 15:13:59');

-- --------------------------------------------------------

--
-- Structure de la table `historique_client`
--

CREATE TABLE `historique_client` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `historique_client`
--

INSERT INTO `historique_client` (`id`, `client_id`, `action`, `time`) VALUES
(1, 1, ' Nouvelle commande # a été créé  ', '2017-11-26 20:39:33'),
(2, 8, ' Nouvelle commande # a été créé  ', '2017-12-05 23:51:28'),
(3, 1, ' Nouvelle commande # a été créé  ', '2017-12-05 23:53:10'),
(4, 1, ' Nouvelle commande # a été créé  ', '2017-12-06 07:55:41'),
(5, 1, ' Nouvelle commande # a été créé  ', '2017-12-06 07:58:22');

-- --------------------------------------------------------

--
-- Structure de la table `historique_fournisseur`
--

CREATE TABLE `historique_fournisseur` (
  `id` int(11) NOT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_bcc`
--

CREATE TABLE `ligne_bcc` (
  `id` int(11) NOT NULL,
  `bc_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `quatity` int(11) NOT NULL,
  `totalht` double NOT NULL,
  `totalttc` double NOT NULL,
  `tva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ligne_bcc`
--

INSERT INTO `ligne_bcc` (`id`, `bc_id`, `produit_id`, `quatity`, `totalht`, `totalttc`, `tva`) VALUES
(1, 1, 1, 4, 40, 44.8, 20),
(2, 1, 2, 2, 20, 22.4, 20),
(3, 2, 1, 1, 10, 11.2, 20),
(4, 2, 2, 1, 10, 11.2, 20),
(5, 3, 1, 1, 10, 11.2, 20),
(6, 3, 1, 5, 50, 56, 20),
(7, 3, 2, 2, 20, 22.4, 20),
(8, 3, 1, 1, 10, 11.2, 20),
(9, 3, 2, 7, 70, 78.4, 20),
(10, 3, 2, 1, 10, 11.2, 20),
(11, 3, 2, 10, 100, 112, 20),
(12, 4, 1, 1, 10, 11.2, 20),
(13, 4, 2, 3, 31.65, 35.448, 20),
(14, 4, 5, 15, 234, 262.08, 20),
(15, 4, 3, 6, 73.8, 82.656, 25),
(16, 5, 1, 1, 10, 11.2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_bcf`
--

CREATE TABLE `ligne_bcf` (
  `id` int(11) NOT NULL,
  `bf_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `quatity` int(11) NOT NULL,
  `totalht` double NOT NULL,
  `totalttc` double NOT NULL,
  `tva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_blc`
--

CREATE TABLE `ligne_blc` (
  `id` int(11) NOT NULL,
  `livraison_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `quatity` int(11) NOT NULL,
  `totalht` double NOT NULL,
  `totalttc` double NOT NULL,
  `tva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_devis`
--

CREATE TABLE `ligne_devis` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_fc`
--

CREATE TABLE `ligne_fc` (
  `id` int(11) NOT NULL,
  `facture_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `quatity` int(11) NOT NULL,
  `totalht` double NOT NULL,
  `totalttc` double NOT NULL,
  `tva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ligne_fc`
--

INSERT INTO `ligne_fc` (`id`, `facture_id`, `produit_id`, `quatity`, `totalht`, `totalttc`, `tva`) VALUES
(1, 1, 1, 4, 40, 44.8, 20),
(2, 1, 2, 2, 20, 22.4, 20),
(3, 2, 1, 1, 10, 11.2, 20),
(4, 2, 2, 1, 10, 11.2, 20),
(5, 3, 1, 1, 10, 11.2, 20),
(6, 3, 1, 5, 50, 56, 20),
(7, 3, 2, 2, 20, 22.4, 20),
(8, 3, 1, 1, 10, 11.2, 20),
(9, 3, 2, 7, 70, 78.4, 20),
(10, 3, 2, 1, 10, 11.2, 20),
(11, 3, 2, 10, 100, 112, 20),
(12, 4, 1, 1, 10, 11.2, 20),
(13, 4, 2, 3, 31.65, 35.448, 20),
(14, 4, 5, 15, 234, 262.08, 20),
(15, 4, 3, 6, 73.8, 82.656, 25),
(16, 5, 1, 1, 10, 11.2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_ff`
--

CREATE TABLE `ligne_ff` (
  `id` int(11) NOT NULL,
  `facture_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `quatity` int(11) NOT NULL,
  `totalht` double NOT NULL,
  `totalttc` double NOT NULL,
  `tva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

CREATE TABLE `lot` (
  `id` int(11) NOT NULL,
  `entrepot_id` int(11) DEFAULT NULL,
  `commandefournisseur_id` int(11) DEFAULT NULL,
  `nbproduits` int(11) NOT NULL,
  `prix` double NOT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `methode_transaction`
--

CREATE TABLE `methode_transaction` (
  `id` int(11) NOT NULL,
  `libele` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20171116135358'),
('20171126182607'),
('20171126193513');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `nom`, `active`) VALUES
(1, 'Entrepots', 1),
(2, 'Fournisseurs', 0),
(3, 'Categories', 1);

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `libele` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `permission`
--

INSERT INTO `permission` (`id`, `libele`, `description`, `created`) VALUES
(1, 'ajouterclient', 'Permet d\'ajouter un client', '2017-11-16'),
(2, 'modifierclient', 'Permet d\'ajouter un client', '2017-11-16'),
(3, 'supprimerclient', 'Permet d\'ajouter un client', '2017-11-16'),
(4, 'voirclient', 'Permet d\'ajouter un client', '2017-11-16');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `tva_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `libele` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `limitestock` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codedouane` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `origine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prixvente` double NOT NULL,
  `prixachat` double NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `tva_id`, `category_id`, `libele`, `etat`, `description`, `type`, `limitestock`, `codedouane`, `origine`, `prixvente`, `prixachat`, `created`) VALUES
(1, 1, 6, 'Produit 1', 'En vente', '', 'Matière première', '10', '', 'Tunisie', 10, 12, '2017-11-01'),
(2, 1, NULL, 'Produit 2', 'En vente', '', 'Matière première', '12', '598213214', 'Maroc', 10.55, 8.45, '2017-11-01'),
(3, 2, 6, 'Produit 3 ', 'En vente', '', 'Manfacturé', '5', '548879', 'Tunisie', 12.3, 10.5, '2017-09-27'),
(4, 1, 4, 'Produit 5 ', 'Hors vente', '', 'Produit fini', '4', '', 'France', 15.5, 12.25, '2017-10-28'),
(5, 1, NULL, 'Produit 4', 'En vente', '', 'Matière première', '12', '598213214', 'Maroc', 15.6, 12.3, '2017-11-01');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `nom`, `description`, `created`) VALUES
(1, 'Magasinier', '   Magasinier', '2017-07-16'),
(3, 'admin', 'tous les permission', '2017-08-08'),
(4, 'Commercial', '', '2017-08-06'),
(5, 'Comptable', '', '2017-09-06');

-- --------------------------------------------------------

--
-- Structure de la table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`) VALUES
(2, 1, 2),
(3, 1, 3),
(5, 3, 1),
(6, 3, 2),
(7, 3, 3),
(8, 3, 4),
(9, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

CREATE TABLE `statistiques` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `taxe`
--

CREATE TABLE `taxe` (
  `id` int(11) NOT NULL,
  `montant` double NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `taxe`
--

INSERT INTO `taxe` (`id`, `montant`, `active`, `created`) VALUES
(1, 20, '1', '2017-11-02 00:00:00'),
(2, 25, '0', '2017-11-09 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `facture_id` int(11) DEFAULT NULL,
  `facturefournisseur_id` int(11) DEFAULT NULL,
  `devise_id` int(11) DEFAULT NULL,
  `methodetransaction_id` int(11) DEFAULT NULL,
  `datepaiement` date NOT NULL,
  `montant` double NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`id`, `facture_id`, `facturefournisseur_id`, `devise_id`, `methodetransaction_id`, `datepaiement`, `montant`, `note`, `etat`) VALUES
(1, 1, NULL, NULL, NULL, '2017-12-06', 67.2, 'Facture #1 payée avec succes', 'Terminé'),
(2, 1, NULL, NULL, NULL, '2017-12-06', 67.2, 'Facture #1 payée avec succes', 'Terminé'),
(3, 1, NULL, NULL, NULL, '2017-12-06', 67.2, 'Facture #1 payée avec succes', 'Terminé'),
(4, 1, NULL, NULL, NULL, '2017-12-06', 67.2, 'Facture #1 payée avec succes', 'Terminé');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
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
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `role_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `name`) VALUES
(1, 3, 'admin', 'admin', 'achref.tlija@gmail.com', 'achref.tlija@gmail.com', 1, NULL, '$2y$13$/HG1kjnxt.DJgHAFz1N1n.Wbb5qOAcF.Fpt5FAb921yjn84zmfUeq', '2017-12-06 09:08:24', NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', NULL),
(2, 1, 'ala', 'ala', 'achref.tddlija@gmail.com', 'achref.tddlija@gmail.com', 1, NULL, '$2y$13$zo234RxpSLMzSWtxALKspe9czpg1wplw6opsERDdDddu7ujcPwD0u', '2017-12-06 01:44:58', NULL, NULL, 'a:0:{}', NULL),
(5, 3, 'admin54', 'admin54', 'achref.tlija5@gmail.com', 'achref.tlija5@gmail.com', 1, NULL, '$2y$13$CzcUFjZ7GTMeGo014LE9M.GtxwKO3/TzDt0eoPL3f8uGMVtz/S2qK', NULL, NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', NULL),
(6, NULL, 'testuser', 'testuser', '', '', 1, NULL, '$2y$13$m6WNXFiTb5dEP/XVXJgnTuVyM6ztSo6owJxFS9lo8p0CQ2VfYQZ1G', NULL, NULL, NULL, 'a:0:{}', NULL),
(7, 1, 'maga', 'maga', 'maga@gmail.com', 'maga@gmail.com', 1, NULL, '$2y$13$x30OSPI05.PFyFXdHm43XepakEpphanQVMstNkzWYHxFPYzqsGBDm', '2017-12-06 08:38:05', NULL, NULL, 'a:0:{}', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bon_commande_client`
--
ALTER TABLE `bon_commande_client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B235C53B7F2DEE08` (`facture_id`),
  ADD UNIQUE KEY `UNIQ_B235C53B8E54FB25` (`livraison_id`),
  ADD KEY `IDX_B235C53B19EB6921` (`client_id`);

--
-- Index pour la table `bon_commande_fournisseur`
--
ALTER TABLE `bon_commande_fournisseur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D91605A9670C757F` (`fournisseur_id`);

--
-- Index pour la table `bon_livraison_client`
--
ALTER TABLE `bon_livraison_client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_64C19C1727ACA70` (`parent_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C7440455E7927C74` (`email`);

--
-- Index pour la table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A5E2A5D77EE5403C` (`administrateur_id`);

--
-- Index pour la table `contact_client`
--
ALTER TABLE `contact_client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_57D633D4E7927C74` (`email`),
  ADD KEY `IDX_57D633D419EB6921` (`client_id`);

--
-- Index pour la table `contact_fournisseur`
--
ALTER TABLE `contact_fournisseur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5832758CE7927C74` (`email`),
  ADD KEY `IDX_5832758C670C757F` (`fournisseur_id`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devise`
--
ALTER TABLE `devise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entrepot`
--
ALTER TABLE `entrepot`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `facture_client`
--
ALTER TABLE `facture_client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `facture_fournisseur`
--
ALTER TABLE `facture_fournisseur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_311911C4A29D67CD` (`bf_id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_369ECA32E7927C74` (`email`);

--
-- Index pour la table `historique_client`
--
ALTER TABLE `historique_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E06A40919EB6921` (`client_id`);

--
-- Index pour la table `historique_fournisseur`
--
ALTER TABLE `historique_fournisseur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EF30C454670C757F` (`fournisseur_id`);

--
-- Index pour la table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ligne_bcc`
--
ALTER TABLE `ligne_bcc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FC9131CE954397FF` (`bc_id`),
  ADD KEY `IDX_FC9131CEF347EFB` (`produit_id`);

--
-- Index pour la table `ligne_bcf`
--
ALTER TABLE `ligne_bcf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8CFBC541A29D67CD` (`bf_id`),
  ADD KEY `IDX_8CFBC541F347EFB` (`produit_id`);

--
-- Index pour la table `ligne_blc`
--
ALTER TABLE `ligne_blc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7B092D018E54FB25` (`livraison_id`),
  ADD KEY `IDX_7B092D01F347EFB` (`produit_id`);

--
-- Index pour la table `ligne_devis`
--
ALTER TABLE `ligne_devis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ligne_fc`
--
ALTER TABLE `ligne_fc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_43BF071A7F2DEE08` (`facture_id`),
  ADD KEY `IDX_43BF071AF347EFB` (`produit_id`);

--
-- Index pour la table `ligne_ff`
--
ALTER TABLE `ligne_ff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_33D5F3957F2DEE08` (`facture_id`),
  ADD KEY `IDX_33D5F395F347EFB` (`produit_id`);

--
-- Index pour la table `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B81291B296851E9` (`commandefournisseur_id`),
  ADD KEY `IDX_B81291B72831E97` (`entrepot_id`);

--
-- Index pour la table `methode_transaction`
--
ALTER TABLE `methode_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29A5EC274D79775F` (`tva_id`),
  ADD KEY `IDX_29A5EC2712469DE2` (`category_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6F7DF886D60322AC` (`role_id`),
  ADD KEY `IDX_6F7DF886FED90CCA` (`permission_id`);

--
-- Index pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `taxe`
--
ALTER TABLE `taxe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_723705D17F2DEE08` (`facture_id`),
  ADD KEY `IDX_723705D19BBB7FB1` (`facturefournisseur_id`),
  ADD KEY `IDX_723705D1F4445056` (`devise_id`),
  ADD KEY `IDX_723705D1389B2500` (`methodetransaction_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`),
  ADD KEY `IDX_8D93D649D60322AC` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bon_commande_client`
--
ALTER TABLE `bon_commande_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `bon_commande_fournisseur`
--
ALTER TABLE `bon_commande_fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `bon_livraison_client`
--
ALTER TABLE `bon_livraison_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `contact_client`
--
ALTER TABLE `contact_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contact_fournisseur`
--
ALTER TABLE `contact_fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `devise`
--
ALTER TABLE `devise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `entrepot`
--
ALTER TABLE `entrepot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `facture_client`
--
ALTER TABLE `facture_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `facture_fournisseur`
--
ALTER TABLE `facture_fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `historique_client`
--
ALTER TABLE `historique_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `historique_fournisseur`
--
ALTER TABLE `historique_fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ligne_bcc`
--
ALTER TABLE `ligne_bcc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `ligne_bcf`
--
ALTER TABLE `ligne_bcf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ligne_blc`
--
ALTER TABLE `ligne_blc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ligne_devis`
--
ALTER TABLE `ligne_devis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ligne_fc`
--
ALTER TABLE `ligne_fc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `ligne_ff`
--
ALTER TABLE `ligne_ff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lot`
--
ALTER TABLE `lot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `methode_transaction`
--
ALTER TABLE `methode_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `statistiques`
--
ALTER TABLE `statistiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `taxe`
--
ALTER TABLE `taxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bon_commande_client`
--
ALTER TABLE `bon_commande_client`
  ADD CONSTRAINT `FK_B235C53B19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_B235C53B7F2DEE08` FOREIGN KEY (`facture_id`) REFERENCES `facture_client` (`id`),
  ADD CONSTRAINT `FK_B235C53B8E54FB25` FOREIGN KEY (`livraison_id`) REFERENCES `bon_livraison_client` (`id`);

--
-- Contraintes pour la table `bon_commande_fournisseur`
--
ALTER TABLE `bon_commande_fournisseur`
  ADD CONSTRAINT `FK_D91605A9670C757F` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`);

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C1727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `configuration`
--
ALTER TABLE `configuration`
  ADD CONSTRAINT `FK_A5E2A5D77EE5403C` FOREIGN KEY (`administrateur_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `contact_client`
--
ALTER TABLE `contact_client`
  ADD CONSTRAINT `FK_57D633D419EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `contact_fournisseur`
--
ALTER TABLE `contact_fournisseur`
  ADD CONSTRAINT `FK_5832758C670C757F` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`);

--
-- Contraintes pour la table `facture_fournisseur`
--
ALTER TABLE `facture_fournisseur`
  ADD CONSTRAINT `FK_311911C4A29D67CD` FOREIGN KEY (`bf_id`) REFERENCES `bon_commande_fournisseur` (`id`);

--
-- Contraintes pour la table `historique_client`
--
ALTER TABLE `historique_client`
  ADD CONSTRAINT `FK_E06A40919EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `historique_fournisseur`
--
ALTER TABLE `historique_fournisseur`
  ADD CONSTRAINT `FK_EF30C454670C757F` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`);

--
-- Contraintes pour la table `ligne_bcc`
--
ALTER TABLE `ligne_bcc`
  ADD CONSTRAINT `FK_FC9131CE954397FF` FOREIGN KEY (`bc_id`) REFERENCES `bon_commande_client` (`id`),
  ADD CONSTRAINT `FK_FC9131CEF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `ligne_bcf`
--
ALTER TABLE `ligne_bcf`
  ADD CONSTRAINT `FK_8CFBC541A29D67CD` FOREIGN KEY (`bf_id`) REFERENCES `bon_commande_fournisseur` (`id`),
  ADD CONSTRAINT `FK_8CFBC541F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `ligne_blc`
--
ALTER TABLE `ligne_blc`
  ADD CONSTRAINT `FK_7B092D018E54FB25` FOREIGN KEY (`livraison_id`) REFERENCES `bon_livraison_client` (`id`),
  ADD CONSTRAINT `FK_7B092D01F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `ligne_fc`
--
ALTER TABLE `ligne_fc`
  ADD CONSTRAINT `FK_43BF071A7F2DEE08` FOREIGN KEY (`facture_id`) REFERENCES `facture_client` (`id`),
  ADD CONSTRAINT `FK_43BF071AF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `ligne_ff`
--
ALTER TABLE `ligne_ff`
  ADD CONSTRAINT `FK_33D5F3957F2DEE08` FOREIGN KEY (`facture_id`) REFERENCES `facture_fournisseur` (`id`),
  ADD CONSTRAINT `FK_33D5F395F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `lot`
--
ALTER TABLE `lot`
  ADD CONSTRAINT `FK_B81291B296851E9` FOREIGN KEY (`commandefournisseur_id`) REFERENCES `bon_commande_fournisseur` (`id`),
  ADD CONSTRAINT `FK_B81291B72831E97` FOREIGN KEY (`entrepot_id`) REFERENCES `entrepot` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC2712469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_29A5EC274D79775F` FOREIGN KEY (`tva_id`) REFERENCES `taxe` (`id`);

--
-- Contraintes pour la table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `FK_6F7DF886D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `FK_6F7DF886FED90CCA` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`);

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK_723705D1389B2500` FOREIGN KEY (`methodetransaction_id`) REFERENCES `methode_transaction` (`id`),
  ADD CONSTRAINT `FK_723705D17F2DEE08` FOREIGN KEY (`facture_id`) REFERENCES `facture_client` (`id`),
  ADD CONSTRAINT `FK_723705D19BBB7FB1` FOREIGN KEY (`facturefournisseur_id`) REFERENCES `facture_fournisseur` (`id`),
  ADD CONSTRAINT `FK_723705D1F4445056` FOREIGN KEY (`devise_id`) REFERENCES `devise` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

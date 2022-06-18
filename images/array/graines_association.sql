-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 10 mai 2022 à 15:01
-- Version du serveur :  8.0.29-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `graines_association`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `idArticle` int NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `texte` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `titre`, `texte`, `valide`, `date`, `auteur`) VALUES
(10, 'Premier article', 'Nous voilà sur la page d\'acceuil de l\'association.', 1, '2022-05-05 16:28:23', 3),
(11, 'Bristot &amp; Anchois', 'Je suis un belle anchois.', 1, '2022-05-09 15:58:43', 3);

-- --------------------------------------------------------

--
-- Structure de la table `compta`
--

CREATE TABLE `compta` (
  `idActe` int NOT NULL,
  `dateActe` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numeroTransaction` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `objet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `montant` float NOT NULL,
  `formeBanquaire` tinyint(1) NOT NULL,
  `anneeExercice` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `auteurActes` int NOT NULL,
  `auteurDel` int DEFAULT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `bilan` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compta`
--

INSERT INTO `compta` (`idActe`, `dateActe`, `numeroTransaction`, `type`, `objet`, `montant`, `formeBanquaire`, `anneeExercice`, `auteurActes`, `auteurDel`, `valide`, `bilan`) VALUES
(91, '2022-05-05 16:27:46', 'Chéque n°456564', 1, 'Caisse de démarrage de l\'association.', 100, 1, '2021-2022', 3, NULL, 1, 1),
(92, '2022-05-06 15:13:50', 'Reçus n°002', 1, 'Cotisation de 20 € pour l\'année 2021-2022 de Bernard Arnaud n°22BAF3CEnLRv', 20, 0, '2021-2022', 2, NULL, 1, 1),
(93, '2022-05-09 13:29:37', 'n°124565465', 1, 'Cotisation de 20 € pour l\'année 2021-2022 de Zarra White n°22ZWiZcopcK9', 20, 1, '2021-2022', 3, NULL, 1, 1),
(94, '2022-05-09 13:32:41', 'n°45678945E', 1, 'Cotisation de 20 € pour l\'année 2021-2022 de Oshishan Yutuber n°22OYiIG7xFYo', 20, 3, '2021-2022', 3, NULL, 1, 1),
(95, '2022-05-09 15:16:17', 'kdkkdk', 0, '1235346', 256.34, 0, '2021-2022', 3, 3, 0, 1),
(96, '2022-05-09 15:17:01', 'kdkkdldld', 0, 'Test', 350, 0, '2021-2022', 3, 3, 0, 1),
(97, '2022-05-09 15:44:25', 'Non Applicable', 1, 'Report Bilan :2021-2022', 160, 3, '2022-2023', 3, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `dataSite`
--

CREATE TABLE `dataSite` (
  `idDataSite` int NOT NULL,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sousTitre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `anneeCour` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cotisation` float NOT NULL,
  `clotureCompta` tinyint(1) NOT NULL DEFAULT '0',
  `emailContact` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `dataSite`
--

INSERT INTO `dataSite` (`idDataSite`, `titre`, `sousTitre`, `description`, `anneeCour`, `cotisation`, `clotureCompta`, `emailContact`, `url`, `adresse`) VALUES
(1, 'Graines d\'association', 'Créer un site web pour une association', 'association loi 1901, comptabilité, tresorie, site web, création, prestation de site web.', '2022-2023', 20, 0, 'matusalem@gmail.com', 'https://graines1901.fr', 'Domicile de l\'association');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `idEvenement` int NOT NULL,
  `idCreateur` int NOT NULL,
  `titre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateEvenement` date NOT NULL,
  `heure` time NOT NULL,
  `texteEvenement` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `public` tinyint(1) NOT NULL,
  `typeEvenement` int NOT NULL,
  `lieu` int NOT NULL,
  `nombre` tinyint NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `archive` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`idEvenement`, `idCreateur`, `titre`, `dateCreation`, `dateEvenement`, `heure`, `texteEvenement`, `public`, `typeEvenement`, `lieu`, `nombre`, `valide`, `archive`) VALUES
(51, 48, 'ADD v2.5', '2022-05-10 11:29:15', '2022-05-12', '14:30:00', 'Jeu de rôle d\'initiation.', 0, 6, 2, 5, 1, 0),
(53, 48, 'ADD v2.5', '2022-05-10 13:51:54', '2022-05-14', '15:30:00', 'Jeu de rôle d\'initiation.', 0, 6, 2, 5, 1, 0),
(54, 49, 'Echec', '2022-05-10 14:03:54', '2022-05-11', '16:00:00', 'Une petite partie d\'échec ?', 0, 12, 3, 2, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `journaux`
--

CREATE TABLE `journaux` (
  `idConnexion` int NOT NULL,
  `ipUser` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idUser` int NOT NULL DEFAULT '0',
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `mdpHacker` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `dateHeure` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `okConnexion` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `journaux`
--

INSERT INTO `journaux` (`idConnexion`, `ipUser`, `idUser`, `login`, `mdpHacker`, `dateHeure`, `okConnexion`) VALUES
(1, '127.0.0.1', 2, 'Admin', '0', '2022-05-09 12:50:22', 1),
(2, '127.0.0.1', 2, 'Admin', '0', '2022-05-09 12:52:14', 1),
(3, '127.0.0.1', 2, 'Admin', '0', '2022-05-09 12:55:49', 1),
(4, '127.0.0.1', 2, 'Admin', '0', '2022-05-09 12:58:46', 1),
(5, '127.0.0.1', 2, 'Admin', '0', '2022-05-09 13:01:24', 1),
(6, '127.0.0.1', 3, 'RTS', '0', '2022-05-09 13:01:43', 1),
(7, '127.0.0.1', 3, 'RTS', '0', '2022-05-09 13:02:30', 1),
(8, '127.0.0.1', 2, 'Admin', '0', '2022-05-09 13:05:13', 1),
(9, '127.0.0.1', 3, 'RTS', '0', '2022-05-09 13:08:02', 1),
(10, '127.0.0.1', 3, 'RTS', '0', '2022-05-09 13:20:29', 1),
(11, '127.0.0.1', 3, 'RTS', '0', '2022-05-09 15:04:06', 1),
(12, '127.0.0.1', 2, 'Admin', '0', '2022-05-09 15:04:32', 1),
(13, '127.0.0.1', 2, 'Admin', '0', '2022-05-09 15:26:36', 1),
(14, '127.0.0.1', 3, 'RTS', '0', '2022-05-09 15:35:24', 1),
(15, '127.0.0.1', 3, 'RTS', '0', '2022-05-10 10:35:06', 1),
(16, '127.0.0.1', 2, 'Admin', '0', '2022-05-10 10:37:04', 1),
(17, '127.0.0.1', 43, 'Bernardoe', '0', '2022-05-10 10:37:34', 1),
(18, '127.0.0.1', 2, 'Admin', '0', '2022-05-10 10:38:44', 1),
(19, '127.0.0.1', 43, 'Bernardoe', '0', '2022-05-10 10:45:58', 1),
(20, '127.0.0.1', 3, 'RTS', '0', '2022-05-10 10:58:39', 1),
(21, '127.0.0.1', 48, 'Zarra', '0', '2022-05-10 10:59:00', 1),
(22, '127.0.0.1', 43, 'Bernardoe', '0', '2022-05-10 11:00:22', 1),
(23, '127.0.0.1', 48, 'Zarra', '0', '2022-05-10 11:18:11', 1),
(24, '127.0.0.1', 43, 'Bernardoe', '0', '2022-05-10 11:18:59', 1),
(25, '127.0.0.1', 48, 'Zarra', '0', '2022-05-10 11:22:47', 1),
(26, '127.0.0.1', 48, 'Zarra', '0', '2022-05-10 13:43:23', 1),
(27, '127.0.0.1', 2, 'Admin', '0', '2022-05-10 13:45:05', 1),
(28, '127.0.0.1', 3, 'RTS', '0', '2022-05-10 13:57:25', 1),
(29, '127.0.0.1', 49, 'Agent', '0', '2022-05-10 13:59:01', 1),
(30, '127.0.0.1', 48, 'Zarra', '0', '2022-05-10 14:04:11', 1),
(31, '127.0.0.1', 0, 'Zarra', 'dusud', '2022-05-10 14:18:29', 0),
(32, '127.0.0.1', 48, 'Zarra', '0', '2022-05-10 14:18:54', 1),
(33, '127.0.0.1', 2, 'Admin', '0', '2022-05-10 14:50:47', 1),
(34, '127.0.0.1', 2, 'Admin', '0', '2022-05-10 15:00:58', 1);

-- --------------------------------------------------------

--
-- Structure de la table `lieuxSceances`
--

CREATE TABLE `lieuxSceances` (
  `idLieux` int NOT NULL,
  `nomLieu` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rue` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ville` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CP` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valideLieu` tinyint(1) NOT NULL DEFAULT '1',
  `lieuVirtuel` tinyint(1) NOT NULL DEFAULT '0',
  `proprietaire` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lieuxSceances`
--

INSERT INTO `lieuxSceances` (`idLieux`, `nomLieu`, `rue`, `ville`, `CP`, `valideLieu`, `lieuVirtuel`, `proprietaire`) VALUES
(2, 'Maison des associations', '55 Rue André Marie Ampère', 'Salon De Provence', '13300', 1, 0, 0),
(3, 'Guyajeux Salon', '239 Bd Jean Jaurès', 'Salon De Provence', '13300', 1, 0, 0),
(13, 'Roll 20', '-', '-', '-', 1, 1, 0),
(19, 'Christophe Calmes', '25 Rue Amiel', 'Salon De Provence', '13300', 0, 0, 0),
(20, 'Christophe Calmes', '25 Rue Amiel', 'Salon De Provence', '13300', 1, 0, 48);

-- --------------------------------------------------------

--
-- Structure de la table `navigation`
--

CREATE TABLE `navigation` (
  `idNav` int NOT NULL,
  `nomNav` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cheminNav` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `menuVisible` tinyint(1) NOT NULL,
  `zoneMenu` int NOT NULL,
  `ordre` tinyint NOT NULL,
  `niveau` tinyint NOT NULL,
  `valide` tinyint NOT NULL DEFAULT '1',
  `deroulant` tinyint NOT NULL DEFAULT '0',
  `targetRoute` varchar(16) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `navigation`
--

INSERT INTO `navigation` (`idNav`, `nomNav`, `cheminNav`, `menuVisible`, `zoneMenu`, `ordre`, `niveau`, `valide`, `deroulant`, `targetRoute`) VALUES
(1, 'connexion', 'sources/connexion/connexion.php', 1, 0, 15, 0, 1, 0, '101'),
(2, 'Deco', 'sources/connexion/deconnexion.php', 1, 0, 10, 4, 1, 0, '322'),
(3, 'Plan site', 'sources/navigation/administration/addLien.php', 1, 6, 1, 4, 1, 0, '458'),
(4, 'Deco', 'sources/connexion/deconnexion.php', 1, 0, 10, 1, 1, 0, '73'),
(5, 'Deco', 'sources/connexion/deconnexion.php', 1, 0, 10, 2, 1, 0, '239'),
(6, 'Deco', 'sources/connexion/deconnexion.php', 1, 0, 10, 3, 1, 0, '179'),
(7, 'Pré-Inscription', 'sources/utilisateurs/administration/creationCompte.php', 1, 2, 0, 3, 1, 0, '67'),
(8, 'Inscription', 'sources/utilisateurs/inscription.php', 1, 0, 1, 0, 1, 0, '4'),
(9, 'Formulaire d\'inscription', 'sources/utilisateurs/formulairesInscription.php', 0, 0, 0, 0, 1, 0, '615'),
(10, 'Préinscrit', 'sources/utilisateurs/administration/listePreInscrit.php', 1, 2, 2, 3, 1, 0, '65'),
(11, 'Liste inscrit', 'sources/utilisateurs/administration/listeInscrit.php', 1, 2, 3, 3, 1, 0, '77'),
(12, 'admin Site', 'sources/adminSite/tstdac.php', 1, 6, 2, 4, 1, 0, '89'),
(13, 'Journaux comptable', 'sources/tresorie/compte.php', 1, 1, 3, 3, 1, 0, '11'),
(15, 'Comptabilité', 'sources/navigation/erreur404.php', 1, 0, 3, 3, 1, 1, '190'),
(16, 'Add acte', 'sources/tresorie/addActe.php', 1, 1, 1, 3, 1, 0, '15'),
(17, 'Admin Compta', 'sources/tresorie/compteAdmin.php', 1, 0, 3, 4, 1, 0, '5'),
(18, 'Fin exercice', 'sources/tresorie/cloreExercice.php', 1, 1, 3, 3, 1, 0, '427'),
(19, 'User', 'sources/navigation/erreur404.php', 1, 0, 1, 3, 1, 2, '71'),
(20, 'Anciens membres', 'sources/utilisateurs/administration/listeAncienMembre.php', 1, 2, 3, 3, 1, 0, '422'),
(21, 'Secretariat', 'sources/navigation/erreur404.php', 1, 0, 4, 3, 1, 3, '97'),
(22, 'Add présentation', 'sources/secretariat/addIndex.php', 1, 3, 0, 3, 1, 0, '518'),
(24, 'Liste articles', 'sources/secretariat/listeArticles.php', 1, 3, 1, 3, 1, 0, '98'),
(25, 'Affichage Article', 'sources/secretariat/affichageArticle.php', 0, 3, 0, 3, 1, 0, '35'),
(26, 'Admin User', 'sources/navigation/erreur404.php', 1, 0, 4, 4, 1, 4, '79'),
(27, 'Droits', 'sources/utilisateurs/administration/droitsUser.php', 1, 4, 0, 4, 1, 0, '92'),
(28, 'Journaux de connexion', 'sources/journaux/journauxConnexion.php', 1, 4, 1, 4, 1, 0, '19'),
(29, 'Profil', 'sources/utilisateurs/profil.php', 1, 0, 7, 1, 1, 0, '18'),
(30, 'Profil Admini', 'sources/utilisateurs/administration/profil.php', 0, 4, 0, 4, 1, 0, '34'),
(31, 'Evenements', 'sources/navigation/erreur404.php', 1, 0, 2, 1, 1, 5, '12'),
(32, 'Ajouter une séance', 'sources/evenements/addEvenement.php', 1, 5, 0, 1, 1, 0, '61'),
(33, 'Admin Type', 'sources/evenements/typesEvenement.php', 1, 0, 0, 2, 1, 0, '64'),
(34, 'Lieux séances', 'sources/evenements/lieuEvenement.php', 1, 0, 2, 2, 1, 0, '39'),
(35, 'Vos évenement', 'sources/evenements/adminSeance.php', 1, 5, 1, 1, 1, 0, '100'),
(36, 'modEvenement', 'sources/evenements/dupEvenement.php', 0, 0, 0, 1, 1, 0, '82'),
(37, 'modification Sortie', 'sources/evenements/modEvenement.php', 0, 5, 0, 1, 1, 0, '8'),
(38, 'Recherche', 'sources/evenements/recherche.php', 1, 5, 3, 1, 1, 0, '95'),
(39, 'Agenda', 'sources/evenements/mySeance.php', 1, 0, 4, 1, 1, 0, '51'),
(40, 'Changer MDP', 'sources/connexion/changeMDP.php', 0, 0, 0, 0, 1, 0, '69'),
(41, 'Administration Site', 'sources/navigation/erreur404.php', 1, 0, 0, 4, 1, 6, '90'),
(42, 'Compte de l\'association', 'sources/tresorie/comptePublic.php', 1, 0, 8, 1, 1, 0, '41'),
(43, 'CGU', 'sources/rgpd/cguSite.php', 0, 0, 0, 0, 1, 0, '37'),
(45, 'Moderation Evenement', 'sources/evenements/moderationEvenement.php', 1, 0, 5, 2, 1, 0, '59'),
(46, 'Fiche', 'sources/evenements/ficheEvenement.php', 0, 0, 0, 3, 1, 0, '84'),
(50, 'Modération', 'sources/navigation/erreur404.php', 1, 0, 5, 3, 1, 7, '40'),
(51, 'Admin Type', 'sources/evenements/typesEvenement.php', 1, 7, 0, 3, 1, 0, '49'),
(52, 'Lieux séances', 'sources/evenements/lieuEvenement.php', 1, 7, 2, 3, 1, 0, '22'),
(53, 'Moderation Evenement', 'sources/evenements/moderationEvenement.php', 1, 7, 5, 3, 1, 0, '62'),
(54, 'Routage form', 'sources/adminSite/routageForm.php', 1, 6, 3, 4, 1, 0, '43');

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `idParticipation` int NOT NULL,
  `idMembre` int NOT NULL,
  `idSeance` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participants`
--

INSERT INTO `participants` (`idParticipation`, `idMembre`, `idSeance`) VALUES
(87, 49, 51),
(88, 49, 54),
(90, 48, 54);

-- --------------------------------------------------------

--
-- Structure de la table `targetRCUD`
--

CREATE TABLE `targetRCUD` (
  `idTarget` int NOT NULL,
  `chemin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `securite` tinyint(1) NOT NULL DEFAULT '0',
  `routageToken` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `targetRCUD`
--

INSERT INTO `targetRCUD` (`idTarget`, `chemin`, `valide`, `securite`, `routageToken`) VALUES
(1, 'sources/evenements/RCUD/Create/addLieuxAdmin.php', 1, 2, '955057518060'),
(2, 'sources/navigation/administration/insertLien.php', 1, 4, '04168866'),
(3, 'sources/navigation/administration/GestionInscription.php', 1, 4, '405355633'),
(4, 'sources/adminSite/modifSite.php', 1, 4, '1878155936'),
(5, 'sources/journaux/delLog.php', 1, 4, '42654475'),
(6, 'sources/tresorie/RCUD/Update/cloture.php', 1, 4, '225416633'),
(8, 'sources/utilisateurs/CUD/Update/adminUser.php', 1, 4, '00640601'),
(9, 'sources/utilisateurs/CUD/Create/InsertCompte.php', 1, 3, '569974039572'),
(10, 'sources/utilisateurs/CUD/Delette/delPreInscription.php', 1, 3, '3560759655'),
(12, 'sources/utilisateurs/CUD/Update/cotisation.php', 1, 3, '759737643'),
(13, 'sources/utilisateurs/CUD/Update/suppressionCompte.php', 1, 3, '875446212100'),
(14, 'sources/tresorie/RCUD/Create/addActe.php', 1, 3, '8304559480'),
(15, 'sources/tresorie/RCUD/Update/updateActe.php', 1, 3, '05607644860'),
(16, 'sources/tresorie/RCUD/Update/restoreActe.php', 1, 4, '96874402'),
(17, 'sources/tresorie/RCUD/Update/cloreExercice.php', 1, 3, '18144844'),
(18, 'sources/secretariat/RCUD/Create/addIndex.php', 1, 3, '854756624'),
(19, 'sources/secretariat/RCUD/Update/administreArticle.php', 1, 3, '605483566686'),
(20, 'sources/secretariat/RCUD/Delette/administreArticle.php', 1, 3, '546211540502'),
(21, 'sources/evenements/RCUD/Create/newType.php', 1, 2, '760163654586'),
(22, 'sources/evenements/RCUD/Update/updateType.php', 1, 2, '59528703'),
(23, 'sources/evenements/RCUD/Update/adminLieu.php', 1, 2, '46211135'),
(24, 'sources/evenements/RCUD/Update/moderationValide.php', 1, 2, '4204964226'),
(25, 'sources/evenements/RCUD/Delette/evenement.php', 1, 2, '99680580'),
(26, 'sources/evenements/RCUD/Create/evenement.php', 1, 1, '56334246780'),
(27, 'sources/evenements/RCUD/Update/valideEvenement.php', 1, 1, '504778667361'),
(28, 'sources/evenements/RCUD/Update/evenement.php', 1, 1, '183639334'),
(29, 'sources/evenements/RCUD/Create/inscription.php', 1, 1, '458382633551'),
(30, 'sources/evenements/RCUD/Delette/inscription.php', 1, 1, '18825240'),
(31, 'sources/utilisateurs/CUD/Update/demissionUser.php', 1, 1, '455040136'),
(32, 'sources/utilisateurs/CUD/Update/updateProfilbyUser.php', 1, 1, '563544605632'),
(33, 'sources/evenements/RCUD/Create/addLieux.php', 1, 1, '9044644248'),
(34, 'sources/evenements/RCUD/Update/adminLieuPerso.php', 1, 1, '2370029496');

-- --------------------------------------------------------

--
-- Structure de la table `typeE`
--

CREATE TABLE `typeE` (
  `idTypeE` int NOT NULL,
  `type` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `typeE`
--

INSERT INTO `typeE` (`idTypeE`, `type`, `valide`) VALUES
(6, 'Jeux de rôle', 1),
(7, 'Jeux de plateaux', 1),
(8, 'Jeux de figurines', 1),
(9, 'Grandeur Nature', 0),
(10, 'Partie en ligne', 1),
(11, 'Semi-réel', 0),
(12, 'Wargame', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `login` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mdp` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `codePostal` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bornYear` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `valide` tinyint(1) DEFAULT '0',
  `token` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cotisation` tinyint(1) DEFAULT '0',
  `dateInscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateCotisation` date DEFAULT NULL,
  `dateConnexion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `telephone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numeroAdherant` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `login`, `mdp`, `email`, `nom`, `prenom`, `adresse`, `ville`, `codePostal`, `bornYear`, `role`, `valide`, `token`, `cotisation`, `dateInscription`, `dateCotisation`, `dateConnexion`, `telephone`, `numeroAdherant`) VALUES
(2, 'Admin', '$2y$10$H5eBD7EbQUOMr9ypQkqEUe3nHYZPFDc18Umel.6GCwlR3YySZPFRy', NULL, 'Calmes', 'Christophe', NULL, NULL, NULL, NULL, 4, 1, '6k7wKK3eJT', 0, '2022-04-04 14:55:44', NULL, '2022-05-10 15:00:58', NULL, NULL),
(3, 'RTS', '$2y$10$H5eBD7EbQUOMr9ypQkqEUe3nHYZPFDc18Umel.6GCwlR3YySZPFRy', NULL, 'Calmes', 'Christophe', NULL, NULL, NULL, NULL, 3, 1, 'hHob8QxZko', 0, '2022-04-04 14:55:44', NULL, '2022-05-10 13:57:25', NULL, NULL),
(43, 'Bernardoe', '$2y$10$P7Dohmj8JFefsdMpOfA40eWKxjoeEcwsKOqGMxT2wfRd8IANKQo/G', 'moderateur@gmail.com', 'Doe', 'Bernard', '25 Rue Amiel', 'Salon De Provence', '13300', '1995', 2, 1, 'kWWH1VUIjM', 0, '2022-05-05 16:30:02', NULL, '2022-05-10 11:18:59', NULL, '22BDX65Kg5cN'),
(44, 'Babe', '$2y$10$tExG3./.2cZlcBHITpYwmeH61um/3vKmMMMCkmMmG619RRUa.oMIy', 'bernardarnaud@gmail.com', 'Arnaud', 'Bernard', '25 quaie Branly', 'Paris', '75009', '1954', 2, 1, NULL, 0, '2022-05-06 14:59:02', '2022-05-06', '2022-05-06 14:59:02', NULL, '22BAF3CEnLRv'),
(47, 'Oshishan', '$2y$10$H3Vfw0joCxYobMhjzCGxZOwch4pivn78frQPa.FQUayH/aOi4hwxS', 'ramen@gmail.com', 'Yutuber', 'Oshishan', '75 cours Gimon', 'Salon de Provence', '13300', '1945', 1, 0, NULL, 0, '2022-05-09 13:13:49', '2022-05-09', '2022-05-09 13:13:49', NULL, '22OYiIG7xFYo'),
(48, 'Zarra', '$2y$10$XI/Qoo5wgmShepzlYdUyd.WGxVitXKk3r/i1x33tI3ftS1zQfcuEW', 'bilbo@gmail.com', 'White', 'Zarra', '48 rue des charmes', 'Salon de Provence', '13300', '1962', 1, 1, 'x5T6fzE1uU', 0, '2022-05-09 13:14:18', '2022-05-09', '2022-05-10 14:18:54', NULL, '22ZWiZcopcK9'),
(49, 'Agent', '$2y$10$sEzRSU6RFelH7fE/3i16AO/6K2J3m1f0Ngr6R7dl8kjkFKhH2C7/S', 'edmond@gmail.com', 'Ferdinant', 'Edmond', '45 Rue du Bac', 'Salon De Provence', '13300', '1995', 1, 1, 'Yg5AflhTl9', 0, '2022-05-10 13:58:01', NULL, '2022-05-10 13:59:01', NULL, '22EFBoPhe1Nv');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `auteur_Article` (`auteur`);

--
-- Index pour la table `compta`
--
ALTER TABLE `compta`
  ADD PRIMARY KEY (`idActe`);

--
-- Index pour la table `dataSite`
--
ALTER TABLE `dataSite`
  ADD PRIMARY KEY (`idDataSite`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`idEvenement`),
  ADD KEY `createur_evenement` (`idCreateur`),
  ADD KEY `lieu_evenement` (`lieu`),
  ADD KEY `type_evenement` (`typeEvenement`);

--
-- Index pour la table `journaux`
--
ALTER TABLE `journaux`
  ADD PRIMARY KEY (`idConnexion`);

--
-- Index pour la table `lieuxSceances`
--
ALTER TABLE `lieuxSceances`
  ADD PRIMARY KEY (`idLieux`);

--
-- Index pour la table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`idNav`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`idParticipation`),
  ADD KEY `participant_seance` (`idMembre`),
  ADD KEY `evenement_seance` (`idSeance`);

--
-- Index pour la table `targetRCUD`
--
ALTER TABLE `targetRCUD`
  ADD PRIMARY KEY (`idTarget`);

--
-- Index pour la table `typeE`
--
ALTER TABLE `typeE`
  ADD PRIMARY KEY (`idTypeE`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `idArticle` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `compta`
--
ALTER TABLE `compta`
  MODIFY `idActe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `idEvenement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `journaux`
--
ALTER TABLE `journaux`
  MODIFY `idConnexion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `lieuxSceances`
--
ALTER TABLE `lieuxSceances`
  MODIFY `idLieux` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `idNav` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `participants`
--
ALTER TABLE `participants`
  MODIFY `idParticipation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `targetRCUD`
--
ALTER TABLE `targetRCUD`
  MODIFY `idTarget` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `typeE`
--
ALTER TABLE `typeE`
  MODIFY `idTypeE` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `auteur_Article` FOREIGN KEY (`auteur`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `createur_evenement` FOREIGN KEY (`idCreateur`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lieu_evenement` FOREIGN KEY (`lieu`) REFERENCES `lieuxSceances` (`idLieux`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `type_evenement` FOREIGN KEY (`typeEvenement`) REFERENCES `typeE` (`idTypeE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `evenement_seance` FOREIGN KEY (`idSeance`) REFERENCES `evenements` (`idEvenement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_seance` FOREIGN KEY (`idMembre`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

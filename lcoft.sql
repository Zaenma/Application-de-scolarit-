-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 22 Mai 2020 à 09:14
-- Version du serveur :  8.0.20-0ubuntu0.19.10.1
-- Version de PHP :  7.2.24-0ubuntu0.19.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lcoft`
--

-- --------------------------------------------------------

--
-- Structure de la table `Absence`
--

CREATE TABLE `Absence` (
  `Id` int NOT NULL,
  `Matieres` varchar(100) NOT NULL,
  `Matricules` varchar(20) NOT NULL,
  `Justiee` tinyint(1) NOT NULL DEFAULT '0',
  `Commentaire` text,
  `Date_seance` date DEFAULT NULL,
  `Heure_debut` time NOT NULL,
  `Heure_fin` time NOT NULL,
  `Type_seance` varchar(100) NOT NULL,
  `personnel` varchar(255) DEFAULT NULL,
  `Date_enregistree` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Absence`
--

INSERT INTO `Absence` (`Id`, `Matieres`, `Matricules`, `Justiee`, `Commentaire`, `Date_seance`, `Heure_debut`, `Heure_fin`, `Type_seance`, `personnel`) VALUES
(1, 'Physique', '9-AMINMA-955', 0, NULL, '2020-04-16', '12:44:00', '12:08:00', 'Cours magistral', 'Enseignant'),
(3, 'Mathématique', '31-CAE9F699B', 1, 'Raison de l\'absence', '2020-03-18', '02:09:00', '03:00:00', 'Examen', 'Élève'),
(4, 'Science de la vie et de la terre ', '126UJY9', 0, NULL, '2020-05-29', '12:00:00', '18:00:00', 'Séance d\'exercice', 'Élève'),
(5, 'Mathématique', '31-CAE9F699B', 1, 'Malade', '2020-05-31', '08:00:00', '12:00:00', 'Devoir', 'Élève'),
(6, 'Arabe', '31-CAE9F699B', 0, NULL, '2020-06-07', '12:18:00', '16:00:00', 'Devoir', 'Élève');

-- --------------------------------------------------------

--
-- Structure de la table `Actualite`
--

CREATE TABLE `Actualite` (
  `Id` int NOT NULL,
  `Titres` varchar(255) NOT NULL,
  `Publications` text NOT NULL,
  `Auteur` varchar(255) NOT NULL,
  `Photos_1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Photos_2` varchar(255) DEFAULT NULL,
  `DatePublication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Etat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Actualite`
--

INSERT INTO `Actualite` (`Id`, `Titres`, `Publications`, `Auteur`, `Photos_1`, `Photos_2`, `Etat`) VALUES
(1, 'On mange du tcheb chaque jour ', 'Les Ã®les comores sont des Ã®les connues avec le nom Â«Les Ã®les de la luneÂ» c\'est grÃ¢ce Ã  la magnifique nature ', 'Zaenma', 'Cbsp.PNG', NULL, 0),
(2, 'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.', 'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.\r\nDignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.\r\nDignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.', 'Zaenma', 'IMG_20200422_14446.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Admins`
--

CREATE TABLE `Admins` (
  `Id` int NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Role` varchar(255) DEFAULT NULL,
  `Token` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'default.png',
  `Etat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Admins`
--

INSERT INTO `Admins` (`Id`, `Nom`, `Email`, `Password`, `Role`, `Token`, `Photo`, `Etat`) VALUES
(1, 'Zaenma', 'contacte.zaenma@gmail.com', 'Zaenma', 'Super administrateur', NULL, 'default.png', 1),
(2, 'Amirddine', 'zaenma@zaenma.fr', NULL, 'Super administrateur', 'PI7C72L3B76VYY4X8B7T9VR63CRROG4270DMI4T90Y8LKYRD2G', 'default.png', 0),
(3, 'Saindou Salim', 'saindou@saindou.fr', NULL, 'Surveillant', 'OO6B7TYO9V9N73EYOZ7TR394TB8T7NNXBY747CKU8N4TJON3YB', 'default.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Articles`
--

CREATE TABLE `Articles` (
  `Id` int NOT NULL,
  `Titres` varchar(255) NOT NULL,
  `Articles` text NOT NULL,
  `Auteur` varchar(255) NOT NULL,
  `Image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'default.png',
  `Categorie` varchar(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Articles`
--

INSERT INTO `Articles` (`Id`, `Titres`, `Articles`, `Auteur`, `Image`, `Categorie`, `Date`, `Visible`) VALUES
(1, 'Teste', 'on fait un teste sur la publication des articles sur notre sites\n\nNam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo.\n\nNullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed.\n\nNam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo.', 'contacte.zaenma@gmail.com', 'default.png', 'Mathématique', '2020-05-03 13:03:53', 1),
(2, 'Teste 2', 'Publication des articles \nNam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo.\n\nNullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed.\n\nNam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo.', 'contacte.zaenma@gmail.com', 'default.png', 'Physique', '2020-05-03 13:33:48', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Bibliothèque`
--

CREATE TABLE `Bibliothèque` (
  `Id` int NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Document` varchar(255) NOT NULL,
  `Description` text,
  `Niveau` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Source` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Bibliothèque`
--

INSERT INTO `Bibliothèque` (`Id`, `Titre`, `Document`, `Description`, `Niveau`, `Source`) VALUES
(1, 'Exercice de HTML et CSS', 'Exo_25_-_La_compagnie_Gravenair_-_HTML-CSS3.pdf', 'Exercice de HTML et CSS', 'L1', 'zaenma@gmail.com'),
(2, 'Exercice de HTML et CSS', 'Exo_25_-_La_compagnie_Gravenair_-_HTML-CSS3.pdf', 'Exercice de HTML et CSS', 'Licence 1', 'halidi@halidi.fr'),
(3, 'Anal Maths Terminal ', 'Anal Terminal.pdf', 'Anal de mathématique niveau terminal', 'Terminal D', 'contacte.zaenma@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `Classes`
--

CREATE TABLE `Classes` (
  `Id` int NOT NULL,
  `Code` varchar(50) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Etat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Classes`
--

INSERT INTO `Classes` (`Id`, `Code`, `Nom`, `Etat`) VALUES
(1, 'T-12-YU', 'Terminal S1', 1),
(6, '90-SEC', 'Seconde  S', 1),
(7, '8-QUA', 'Quatrième', 0),
(8, '23-E90709', 'Terminal D', 0),
(9, '14-138709', 'Sixième', 0),
(10, '62-40D709', 'Première D', 1),
(11, '34-0D2709', 'Première C', 0),
(12, '79-78C709', 'Première S2', 0),
(13, '96-030709', 'Terminal C', 0),
(15, '48-A36709', 'Première A4', 0),
(16, '10-C33709', 'Troisième', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Commentaires`
--

CREATE TABLE `Commentaires` (
  `Id` int NOT NULL,
  `Id_publications` int NOT NULL,
  `Auteur` varchar(255) NOT NULL,
  `Commentaire` text NOT NULL,
  `Date_commente` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Commentaires`
--

INSERT INTO `Commentaires` (`Id`, `Id_publications`, `Auteur`, `Commentaire`) VALUES
(1, 2, 'Zaenma', 'Teste commentaire'),
(2, 2, 'Saindou Salim', 'Deuxième teste ! \r\nBravooooooooooooooooooooooooooooooooooo !'),
(3, 1, 'Zaenma', 'Les îles Comores me manquent les amis ! ! ! ');

-- --------------------------------------------------------

--
-- Structure de la table `Eleves`
--

CREATE TABLE `Eleves` (
  `Id` int NOT NULL,
  `Nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Prenom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `VilleResidence` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `VilleNaissance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Date_de_naissance` date DEFAULT NULL,
  `Niveau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Infos_supp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `Photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'default.png',
  `Code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Piece` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DateInscrit` datetime DEFAULT NULL,
  `Sexe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `MatriculeRes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Session` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `AutreContacte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Etat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Eleves`
--

INSERT INTO `Eleves` (`Id`, `Nom`, `Prenom`, `Telephone`, `Email`, `VilleResidence`, `VilleNaissance`, `Date_de_naissance`, `Niveau`, `Infos_supp`, `Photo`, `Code`, `Piece`, `DateInscrit`, `Sexe`, `MatriculeRes`, `Session`, `AutreContacte`, `Password`, `Etat`) VALUES
(1, 'Zaenma', 'Zaenma', NULL, 'contacte.zaenma@gmail.com', NULL, NULL, NULL, 'Terminal S1', NULL, 'default.png', 'TYUYU-FG1', NULL, NULL, NULL, NULL, '2019/2020', NULL, 'Zaenma', 0),
(2, 'Salim', 'Zaenma', '+2210000899', 'halidi@halidi.fr', 'saint-Louis', 'saint-Louis', '2020-04-26', 'Terminal S1', 'Oui', 'default.png', '126UJY9', '', '2020-04-19 00:00:00', 'Femme', 'GFJGHJHJ', '2019/2020', 'Saint-Louis', NULL, 1),
(3, 'Salim Amirddine', 'Zaenma', '+2210000899', 'halidi@halidi.fr', NULL, NULL, NULL, NULL, NULL, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5a76ed0ca9e857d4a283187cea5eb0b3dc4dcfb3', 0),
(4, 'Amirddine', 'Zaenma', '+221000000034', 'zaenma@zaenma.fr', 'saint-Louis', 'saint-Louis', '2020-04-19', 'TroisiÃ¨me', 'Information supplÃ©mentaire  ', 'default.png', '9-AMINMA-955', '', '2020-04-02 00:00:00', 'Homme', 'GFJGH-A', '2019/2020', 'Saint-Louis', NULL, 1),
(5, 'Salim', 'Saindou', '5789890', 'saindou@saindou.fr', NULL, NULL, NULL, NULL, NULL, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$uYa9cRUIrl7ft1EOnEz9v.WfSkx7pwf50EaAPPwKiqikMO75FHXmG', 0),
(6, 'Mohamed', 'Soubira', '9870898767', 'soubi@soubi.fr', 'saint-Louis', 'Dzindri', '2020-03-30', '', 'Quelque infos', NULL, '63-CAE9FTYU', NULL, '2019-09-07 00:00:00', 'Homme', 'GFJGH-ARR', '2019/2020', 'Saint-Louis, Sénégal', NULL, 0),
(7, 'Mohamed', 'Soubira', '9870898767', 'soubi@soubi.fr', 'saint-Louis', 'Dzindri', '2020-03-30', 'Troisième ', 'Quelque infos', NULL, '31-CAE9F699B', NULL, '2019-09-07 00:00:00', 'Homme', 'GFJGH-ARR', '2019/2020', 'Saint-Louis, Sénégal', NULL, 0),
(8, 'Fazaenti', 'Salim', '56789', 'zaenma@zaenma.fr', 'Bandracouni', 'Bandracouni', '1992-06-12', 'Quatrième', 'Infos', 'default.png', '28-957ABF', 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', '2019-09-06 00:00:00', 'Femme', 'GFJGHJY', '2019/2020', 'Saint-Louis, Sénégal', NULL, 1),
(9, 'Andhoimati', 'Salim', '1232122', 'e@e.fr', 'Bandracouni', 'Comores', '1998-02-12', 'Première C', 'Quelques infos', 'default.png', '91-44FABF', 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', '2020-05-02 00:00:00', 'Femme', 'RTYUI-YUIO', '2019/2020', 'Bandrani-Bandracouni', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Enseignants`
--

CREATE TABLE `Enseignants` (
  `Id` int NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Specialite` varchar(255) NOT NULL,
  `Diplome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'default.png',
  `Piece` varchar(255) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `DateRecrute` date DEFAULT NULL,
  `Infos_supp` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci,
  `LieuResidence` varchar(255) DEFAULT NULL,
  `Sexe` varchar(255) DEFAULT NULL,
  `Matricule` varchar(255) DEFAULT NULL,
  `Etat` tinyint(1) NOT NULL DEFAULT '0',
  `CV` varchar(255) DEFAULT NULL,
  `Universite` varchar(255) DEFAULT NULL,
  `LieuNaissance` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Attestation` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Enseignants`
--

INSERT INTO `Enseignants` (`Id`, `Nom`, `Prenom`, `Specialite`, `Diplome`, `Email`, `Telephone`, `Photo`, `Piece`, `DateNaissance`, `DateRecrute`, `Infos_supp`, `LieuResidence`, `Sexe`, `Matricule`, `Etat`, `CV`, `Universite`, `LieuNaissance`, `Attestation`, `Password`, `Token`) VALUES
(1, 'Salim', 'Zaenma Amirddine ', 'Mathématique', 'Doctorat ', 'zaenma@zaenma.fr', '+2210000000', 'z.jpg', 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', '2020-04-11', '2020-04-24', 'Quelques information supplémentaires ', 'saint-Louis', 'Homme', '126U-JY9000', 1, 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', 'des Comores', 'Bandracouni Anjouan', '', '0c91ed0bbb0a008aefde3d02560e48b5d70e2b4d', NULL),
(2, 'Saindou ', 'Salim', 'Logistique', 'Doctorat ', 'zaenma.halidisa@gmail.com', '9870898767', 'f.PNG', 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', '1990-04-11', '2020-04-12', 'Biographie de M. Saindou Salim', 'Dubai', 'Homme', 'ZOIUZ-OIYZ8', 1, 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', '........... Egypte', 'Bandracouni-Anjouan', 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', NULL, NULL),
(3, 'Salim', 'Zaenma', 'PC', 'Licence', 'zaenma.yaya@gmail.com', '212322123222', 'IMG_20200422_204711_242.jpg', 'sujud-as-sahw-reparation-de-la-priere--1.pdf', '2020-04-11', '2020-04-11', 'Teste', 'saint-Louis', 'Homme', '126UJY9Z', 1, 'School Software Features & Document.pdf', 'Ugb', 'Bandracouni (Comores)', 'Exo_25_-_La_compagnie_Gravenair_-_HTML-CSS3.pdf', NULL, NULL),
(4, 'Salim', 'Ali Salim', 'Mathématique', 'Licence 3', 'zaenma.yaya@gmail.com', '212322123222', 'za.jpg', 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', '2020-04-05', '2020-04-04', 'infos', 'Tananarive', 'Homme', 'HKHJH6HJ-H', 1, 'School Software Features & Document.pdf', 'Hankatso', 'Bandracouni (Comores)', 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Evenements`
--

CREATE TABLE `Evenements` (
  `Id` int NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Type_evenement` varchar(255) DEFAULT NULL,
  `Description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_debut` datetime NOT NULL,
  `Date_fin` datetime NOT NULL,
  `Etat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Evenements`
--

INSERT INTO `Evenements` (`Id`, `Nom`, `Type_evenement`, `Description`, `date_debut`, `Date_fin`, `Etat`) VALUES
(1, 'Teste', 'Je n\'avais pas précisé le type d\'évènement', 'Teste ', '2020-05-16 11:11:00', '2020-05-05 22:25:00', 0),
(2, 'Teste 2', NULL, 'Teste 2', '2020-04-25 14:30:00', '2020-04-28 12:30:00', 0),
(3, 'Démonstration', 'Examen Pour la classe de terminal', 'Une petite démonstration', '2020-05-03 12:10:00', '2020-05-28 15:15:00', 0),
(4, 'Sortie Pédagogique', 'Sirtie pedagogique', 'Une petite description de la sortie !', '2020-05-21 12:00:00', '2020-05-29 18:00:00', 0),
(5, 'Teste', 'Teste', 'teste', '2020-05-14 12:00:00', '2020-05-14 16:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Matiere`
--

CREATE TABLE `Matiere` (
  `Id` int NOT NULL,
  `Code` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Nom` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Etat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Contenu de la table `Matiere`
--

INSERT INTO `Matiere` (`Id`, `Code`, `Nom`, `Etat`) VALUES
(8, '76-HISHIE', 'Histoire Géographie', 1),
(9, '73-MATQUE', 'Mathématique', 0),
(10, '73-SCIRE ', 'Science de la vie et de la terre ', 1),
(11, '88-ANGAIS', 'Anglais', 1),
(12, '99-PHIHIE', 'Philosophie', 1),
(13, '83-CULLE ', 'Culture Générale', 1),
(14, '15-ARAABE', 'Arabe', 1),
(15, '68-FRAAIS', 'FraÃ§ais', 0),
(16, '66-ALGME ', 'Algorithme ', 0),
(18, '77-8DB46B', 'Culture Générale ', 1),
(19, '91-F9819F', 'Algorithme', 0),
(20, '63-139550', 'Sql', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Messages`
--

CREATE TABLE `Messages` (
  `Id` int NOT NULL,
  `Nom` varchar(200) DEFAULT NULL,
  `Telephone` char(20) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Sujet` varchar(255) DEFAULT NULL,
  `Message` mediumtext,
  `Date_envoie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Lu` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Messages`
--

INSERT INTO `Messages` (`Id`, `Nom`, `Telephone`, `Email`, `Sujet`, `Message`, `Lu`) VALUES
(1, 'Zaenma Halidi Salim', '+221000000034', 'contacte.zaenma@gmail.com', 'Teste', 'Teste', 1),
(2, 'Saindou Salim', '1212', 'saindou@saindou.fr', 'Titre du message', 'Pour toutes vos questions, vos demandes... Contactez-nous en remplissant le formulaire suivant', 1),
(3, 'Zaenma', '+221781158169', 'contacte.zaenma@gmail.com', 'Demande d\'infos sur les compositions des examens', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.\r\n\r\nFar far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Message_envoyes`
--

CREATE TABLE `Message_envoyes` (
  `Id` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `Messages` text NOT NULL,
  `expéditeur` varchar(100) NOT NULL,
  `destinataire` varchar(100) NOT NULL,
  `Heure_envoie` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Message_envoyes`
--

INSERT INTO `Message_envoyes` (`Id`, `titre`, `Messages`, `expéditeur`, `destinataire`) VALUES
(1, 'Teste d\'envoie de message', 'Teste d\'envoie de message  à n\'importe qui', 'zaenma@zaenma.fr', 'contacte.zaenma@gmail.com'),
(2, 'Teste 2', 'Je fais un teste sur l\'envoie des messages', 'halidi@halidi.fr', 'zaenma.halidisalim@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `Outil_administrations`
--

CREATE TABLE `Outil_administrations` (
  `Id` int NOT NULL,
  `Email_admin` varchar(255) NOT NULL,
  `Nom_etablissement` varchar(255) DEFAULT NULL,
  `Telephone_Admin` varchar(20) DEFAULT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  `Logo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Date_creation` date NOT NULL DEFAULT '2010-12-12',
  `Directeur` varchar(255) DEFAULT NULL,
  `Histoire` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Date_modif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Outil_administrations`
--

INSERT INTO `Outil_administrations` (`Id`, `Email_admin`, `Nom_etablissement`, `Telephone_Admin`, `Fax`, `Logo`, `Date_creation`, `Directeur`, `Histoire`) VALUES
(1, 'contacte.zaenma@gmail.com', 'Jules ferry', '+26935333333', '2346890000', 'logo.png', '2010-12-12', 'Zaenma Salim', 'on fait un teste sur la publication des articles sur notre sites Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo.');

-- --------------------------------------------------------

--
-- Structure de la table `Publications`
--

CREATE TABLE `Publications` (
  `Id` int NOT NULL,
  `Titres` varchar(255) NOT NULL,
  `Publications` longtext NOT NULL,
  `Auteurs` varchar(255) NOT NULL,
  `Source` varchar(255) NOT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Documents` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Niveau` varchar(255) NOT NULL,
  `Matieres` varchar(255) NOT NULL,
  `Date_poste` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `Publications`
--

INSERT INTO `Publications` (`Id`, `Titres`, `Publications`, `Auteurs`, `Source`, `Photo`, `Documents`, `Niveau`, `Matieres`) VALUES
(1, 'Titre', 'titre', 'Zaenma', '', 'd.png', 'de.pdf', 'Terminal', 'Physique'),
(2, 'Titre', 'titre', 'Zaenma', '', 'd.png', 'de.pdf', 'Terminal', 'Physique'),
(3, 'Teste', 'Attention !\r\nInterdit de faire des publications hors de l\'éducation, elles seront supprimés par les administrateurs et l\'auteur sera suspendu !', 'contacte.zaenma@gmail.com', 'Examen bac 2017', 'de.PNG', 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', 'Terminal S1', 'MathÃ©matique');

-- --------------------------------------------------------

--
-- Structure de la table `Reponse`
--

CREATE TABLE `Reponse` (
  `Id` int NOT NULL,
  `Id_message` int NOT NULL,
  `Reponses` mediumtext NOT NULL,
  `Date_reponse` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Reponse`
--

INSERT INTO `Reponse` (`Id`, `Id_message`, `Reponses`) VALUES
(1, 1, 'Zaenma teste '),
(2, 1, 'Zaenma teste '),
(3, 1, 'Zae'),
(4, 1, 'teste 2'),
(5, 1, 'ljqhjkdh vipsoudoezi  '),
(6, 1, '2&');

-- --------------------------------------------------------

--
-- Structure de la table `Responsables`
--

CREATE TABLE `Responsables` (
  `Id` int NOT NULL,
  `Matricule` varchar(20) NOT NULL,
  `Nom` text NOT NULL,
  `Telephone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Lien` varchar(255) NOT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Piece` varchar(255) DEFAULT NULL,
  `Residence` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Responsables`
--

INSERT INTO `Responsables` (`Id`, `Matricule`, `Nom`, `Telephone`, `Email`, `Lien`, `Photo`, `Piece`, `Residence`) VALUES
(1, 'GFJGHJHJ', 'Amirddine', '2123221223', 'amir@amir.com', 'PÃ¨re', '', '', 'Saint-louis'),
(2, 'GFJGH-A', 'Amirddine Halidi', '2123221245', 'amir.amir@halidi.com', 'PÃ¨re', '', '', 'Bandracouni'),
(3, 'GFJGH-ARR', 'Soubira Mohamed', '2123221223', 'kj@jhj.com', 'Père', NULL, NULL, 'Vououani-Anjouan'),
(4, 'GFJGH-ARR', 'Soubira Mohamed', '2123221223', 'kj@jhj.com', 'Père', NULL, NULL, 'Vououani-Anjouan'),
(5, 'GFJGHJY', 'Salim Houmadi', '126789009', 'salim@salim.fr', 'Père', 'Cbsp.PNG', 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', 'Bandracouni'),
(6, 'RTYUI-YUIO', 'Salim Houmadi', '+2693488356', 'salim@salim.com', 'Père', 'IMG_20200422_204711_242.jpg', 'Attestation_Num_00b8cefe-e4be-41f5-896e-4d714da0020c.pdf', 'Bandracouni comores');

-- --------------------------------------------------------

--
-- Structure de la table `SessionEncours`
--

CREATE TABLE `SessionEncours` (
  `Id` int NOT NULL,
  `Sessionencours` varchar(50) NOT NULL,
  `Debut_session` date DEFAULT NULL,
  `Fin_session` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `SessionEncours`
--

INSERT INTO `SessionEncours` (`Id`, `Sessionencours`, `Debut_session`, `Fin_session`) VALUES
(1, '2019/2020', '2019-09-12', '2020-09-10');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Absence`
--
ALTER TABLE `Absence`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Actualite`
--
ALTER TABLE `Actualite`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Bibliothèque`
--
ALTER TABLE `Bibliothèque`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Classes`
--
ALTER TABLE `Classes`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Eleves`
--
ALTER TABLE `Eleves`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Enseignants`
--
ALTER TABLE `Enseignants`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Evenements`
--
ALTER TABLE `Evenements`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Matiere`
--
ALTER TABLE `Matiere`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Message_envoyes`
--
ALTER TABLE `Message_envoyes`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Outil_administrations`
--
ALTER TABLE `Outil_administrations`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Publications`
--
ALTER TABLE `Publications`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Reponse`
--
ALTER TABLE `Reponse`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Responsables`
--
ALTER TABLE `Responsables`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `SessionEncours`
--
ALTER TABLE `SessionEncours`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Absence`
--
ALTER TABLE `Absence`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Actualite`
--
ALTER TABLE `Actualite`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Bibliothèque`
--
ALTER TABLE `Bibliothèque`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Classes`
--
ALTER TABLE `Classes`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Eleves`
--
ALTER TABLE `Eleves`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `Enseignants`
--
ALTER TABLE `Enseignants`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Evenements`
--
ALTER TABLE `Evenements`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Matiere`
--
ALTER TABLE `Matiere`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Message_envoyes`
--
ALTER TABLE `Message_envoyes`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Outil_administrations`
--
ALTER TABLE `Outil_administrations`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Publications`
--
ALTER TABLE `Publications`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Reponse`
--
ALTER TABLE `Reponse`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Responsables`
--
ALTER TABLE `Responsables`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `SessionEncours`
--
ALTER TABLE `SessionEncours`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

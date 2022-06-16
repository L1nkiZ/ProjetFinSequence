-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 13 Juin 2022 à 13:24
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `distroff`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `date_echeance` date NOT NULL,
  `statut_action` varchar(40) COLLATE utf8_bin NOT NULL,
  `id_type_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `arbitrage`
--

CREATE TABLE `arbitrage` (
  `id_arbitre` int(11) NOT NULL,
  `id_match` int(11) NOT NULL,
  `id_fonction_arbitre` int(11) NOT NULL,
  `remuneration` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `arbitre`
--

CREATE TABLE `arbitre` (
  `id_arbitre` int(11) NOT NULL,
  `nom` varchar(40) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE `authentification` (
  `login` varchar(40) COLLATE utf8_bin NOT NULL,
  `mot_de_passe` varchar(40) COLLATE utf8_bin NOT NULL,
  `adresse_recuperation` varchar(40) COLLATE utf8_bin NOT NULL,
  `id_authentification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'U6'),
(2, 'U7'),
(3, 'U8'),
(4, 'U9'),
(5, 'U10'),
(6, 'U11'),
(7, 'U12'),
(8, 'U13'),
(9, 'U14'),
(10, 'U15'),
(11, 'U16'),
(12, 'U17'),
(13, 'U18'),
(14, 'U19'),
(15, 'Sénior');

-- --------------------------------------------------------

--
-- Structure de la table `composition_equipe`
--

CREATE TABLE `composition_equipe` (
  `id_personne` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `composition_pack`
--

CREATE TABLE `composition_pack` (
  `id_pack` int(11) NOT NULL,
  `id_marchandise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `concerne_dirigeant`
--

CREATE TABLE `concerne_dirigeant` (
  `id_action` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `concerne_joueur`
--

CREATE TABLE `concerne_joueur` (
  `id_action` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_personne` int(11) NOT NULL,
  `personne_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `cotisation`
--

CREATE TABLE `cotisation` (
  `id_saison` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `prix` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `cout_pack`
--

CREATE TABLE `cout_pack` (
  `id_saison` int(11) NOT NULL,
  `id_statut` int(11) NOT NULL,
  `id_pack` int(11) NOT NULL,
  `prix` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `encadre_entrainement`
--

CREATE TABLE `encadre_entrainement` (
  `id_personne` int(11) NOT NULL,
  `id_entrainement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `encadre_match`
--

CREATE TABLE `encadre_match` (
  `id_personne` int(11) NOT NULL,
  `id_match` int(11) NOT NULL,
  `passage_au_stade_aller` tinyint(1) NOT NULL,
  `passage_au_stade_retour` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

CREATE TABLE `entrainement` (
  `id_entrainement` int(11) NOT NULL,
  `date_heure_entrainement` datetime NOT NULL,
  `lieu` varchar(80) COLLATE utf8_bin NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `id_saison` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `fonction_arbitre`
--

CREATE TABLE `fonction_arbitre` (
  `id_fonction_arbitre` int(11) NOT NULL,
  `fonction_arbitre` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `fonction_arbitre`
--

INSERT INTO `fonction_arbitre` (`id_fonction_arbitre`, `fonction_arbitre`) VALUES
(1, 'touche'),
(2, 'centre');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `nom_formation` varchar(80) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `nom_formation`) VALUES
(1, 'CFF1'),
(2, 'CFF2'),
(3, 'CFF3'),
(4, 'BMF'),
(5, 'BPJEPS');

-- --------------------------------------------------------

--
-- Structure de la table `formation_suivie`
--

CREATE TABLE `formation_suivie` (
  `id_formation` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `date_obtention` date NOT NULL,
  `finance_par_le_club` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `joue_dans_categorie`
--

CREATE TABLE `joue_dans_categorie` (
  `id_personne` int(11) NOT NULL,
  `id_saison` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `joue_dans_categorie`
--

INSERT INTO `joue_dans_categorie` (`id_personne`, `id_saison`, `id_categorie`) VALUES
(8, 1, 2),
(12, 1, 2),
(10, 1, 3),
(11, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `marchandise`
--

CREATE TABLE `marchandise` (
  `id_marchandise` int(11) NOT NULL,
  `nom_marchandise` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `id_match` int(11) NOT NULL,
  `date_heure_match` datetime NOT NULL,
  `lieu` varchar(80) COLLATE utf8_bin NOT NULL,
  `equipe1` int(11) NOT NULL,
  `equipe2` int(11) NOT NULL,
  `score1` int(10) UNSIGNED NOT NULL,
  `score2` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `pack`
--

CREATE TABLE `pack` (
  `id_pack` int(11) NOT NULL,
  `nom_pack` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `date_paiement` date NOT NULL,
  `intitule` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `id_personne` int(11) NOT NULL,
  `id_saison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `participe_entrainement`
--

CREATE TABLE `participe_entrainement` (
  `id_personne` int(11) NOT NULL,
  `id_entrainement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(40) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(40) COLLATE utf8_bin NOT NULL,
  `adresse_postale` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `adresse_mail` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `tel` int(10) UNSIGNED DEFAULT NULL,
  `id_sexe` int(11) NOT NULL,
  `id_taille` int(11) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `adresse_postale`, `adresse_mail`, `tel`, `id_sexe`, `id_taille`, `date_naissance`) VALUES
(1, 'ABE', 'Frederic', NULL, NULL, NULL, 1, NULL, '1987-11-02'),
(2, 'FAZ', 'Jerome', NULL, NULL, NULL, 1, NULL, '1967-02-07'),
(3, 'FR', 'Emmanuel', NULL, NULL, NULL, 1, NULL, '1975-02-26'),
(4, 'MAR', 'Joseph', NULL, NULL, NULL, 1, NULL, '1950-04-08'),
(5, 'ABB', 'Kadour', NULL, NULL, NULL, 1, NULL, '1969-03-23'),
(6, 'ABE', 'Frederic', NULL, NULL, NULL, 1, NULL, '1987-11-02'),
(7, 'FOR', 'Virgile', NULL, NULL, NULL, 1, NULL, '1982-11-15'),
(8, 'ANG', 'Liam', NULL, NULL, NULL, 1, NULL, '2015-11-16'),
(9, 'ANG', 'Mr', NULL, NULL, NULL, 1, NULL, NULL),
(10, 'BER', 'Clovis', NULL, NULL, NULL, 1, NULL, '2014-11-18'),
(11, 'CIT', 'Lois', NULL, NULL, NULL, 1, NULL, '2003-09-25'),
(12, 'DEV', 'Louis', NULL, NULL, NULL, 1, NULL, '2015-02-28');

-- --------------------------------------------------------

--
-- Structure de la table `responsabilite_legale`
--

CREATE TABLE `responsabilite_legale` (
  `responsable` int(11) NOT NULL,
  `mineur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `responsabilite_legale`
--

INSERT INTO `responsabilite_legale` (`responsable`, `mineur`) VALUES
(9, 8);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_personne` int(11) NOT NULL,
  `id_saison` int(11) NOT NULL,
  `id_statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id_personne`, `id_saison`, `id_statut`) VALUES
(1, 1, 6),
(2, 1, 6),
(3, 1, 6),
(4, 1, 6),
(5, 1, 6),
(6, 1, 3),
(6, 1, 4),
(7, 1, 1),
(7, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE `saison` (
  `id_saison` int(11) NOT NULL,
  `nom_saison` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `saison`
--

INSERT INTO `saison` (`id_saison`, `nom_saison`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

CREATE TABLE `sexe` (
  `id_sexe` int(11) NOT NULL,
  `symbole_sexe` varchar(2) COLLATE utf8_bin NOT NULL,
  `designation_sexe` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `sexe`
--

INSERT INTO `sexe` (`id_sexe`, `symbole_sexe`, `designation_sexe`) VALUES
(1, 'M', 'masculin'),
(2, 'F', 'feminin');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id_statut` int(11) NOT NULL,
  `nom_statut` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `nom_statut`) VALUES
(1, 'président'),
(2, 'secrétaire'),
(3, 'secrétaire général'),
(4, 'trésorier'),
(5, 'trésorier général'),
(6, 'éducateur'),
(7, 'volontaire'),
(8, 'joueur');

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

CREATE TABLE `taille` (
  `id_taille` int(11) NOT NULL,
  `symbole_taille` varchar(2) COLLATE utf8_bin NOT NULL,
  `designation_taille` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `type_action`
--

CREATE TABLE `type_action` (
  `id_type_action` int(11) NOT NULL,
  `nom_type_action` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_vehicule` int(11) NOT NULL,
  `carburant` varchar(20) COLLATE utf8_bin NOT NULL,
  `puissance_fiscale` int(10) UNSIGNED NOT NULL,
  `id_personne` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`),
  ADD KEY `id_type_action` (`id_type_action`);

--
-- Index pour la table `arbitrage`
--
ALTER TABLE `arbitrage`
  ADD PRIMARY KEY (`id_arbitre`,`id_match`),
  ADD KEY `id_arbitre` (`id_arbitre`),
  ADD KEY `id_match` (`id_match`),
  ADD KEY `id_fonction_arbitre` (`id_fonction_arbitre`);

--
-- Index pour la table `arbitre`
--
ALTER TABLE `arbitre`
  ADD PRIMARY KEY (`id_arbitre`);

--
-- Index pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`id_authentification`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `composition_equipe`
--
ALTER TABLE `composition_equipe`
  ADD PRIMARY KEY (`id_personne`,`id_equipe`),
  ADD KEY `id_equipe` (`id_equipe`),
  ADD KEY `id_personne` (`id_personne`);

--
-- Index pour la table `composition_pack`
--
ALTER TABLE `composition_pack`
  ADD PRIMARY KEY (`id_pack`,`id_marchandise`),
  ADD KEY `id_pack` (`id_pack`),
  ADD KEY `id_marchandise` (`id_marchandise`);

--
-- Index pour la table `concerne_dirigeant`
--
ALTER TABLE `concerne_dirigeant`
  ADD PRIMARY KEY (`id_action`,`id_personne`),
  ADD KEY `id_action` (`id_action`),
  ADD KEY `id_personne` (`id_personne`);

--
-- Index pour la table `concerne_joueur`
--
ALTER TABLE `concerne_joueur`
  ADD PRIMARY KEY (`id_action`),
  ADD KEY `id_personne` (`id_personne`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_personne`,`personne_contact`),
  ADD KEY `id_personne` (`id_personne`),
  ADD KEY `personne_contact` (`personne_contact`);

--
-- Index pour la table `cotisation`
--
ALTER TABLE `cotisation`
  ADD PRIMARY KEY (`id_saison`,`id_categorie`),
  ADD KEY `id_saison` (`id_saison`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `cout_pack`
--
ALTER TABLE `cout_pack`
  ADD PRIMARY KEY (`id_saison`,`id_statut`,`id_pack`),
  ADD KEY `id_saison` (`id_saison`),
  ADD KEY `id_statut` (`id_statut`),
  ADD KEY `id_pack` (`id_pack`);

--
-- Index pour la table `encadre_entrainement`
--
ALTER TABLE `encadre_entrainement`
  ADD PRIMARY KEY (`id_personne`,`id_entrainement`),
  ADD KEY `id_personne` (`id_personne`),
  ADD KEY `id_entrainement` (`id_entrainement`);

--
-- Index pour la table `encadre_match`
--
ALTER TABLE `encadre_match`
  ADD PRIMARY KEY (`id_personne`,`id_match`),
  ADD KEY `id_personne` (`id_personne`),
  ADD KEY `id_match` (`id_match`);

--
-- Index pour la table `entrainement`
--
ALTER TABLE `entrainement`
  ADD PRIMARY KEY (`id_entrainement`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`),
  ADD KEY `id_saison` (`id_saison`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `fonction_arbitre`
--
ALTER TABLE `fonction_arbitre`
  ADD PRIMARY KEY (`id_fonction_arbitre`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `formation_suivie`
--
ALTER TABLE `formation_suivie`
  ADD PRIMARY KEY (`id_formation`,`id_personne`),
  ADD KEY `id_formation` (`id_formation`),
  ADD KEY `id_personne` (`id_personne`);

--
-- Index pour la table `joue_dans_categorie`
--
ALTER TABLE `joue_dans_categorie`
  ADD PRIMARY KEY (`id_personne`,`id_saison`),
  ADD KEY `id_personne` (`id_personne`),
  ADD KEY `id_saison` (`id_saison`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `marchandise`
--
ALTER TABLE `marchandise`
  ADD PRIMARY KEY (`id_marchandise`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `equipe1` (`equipe1`),
  ADD KEY `equipe2` (`equipe2`);

--
-- Index pour la table `pack`
--
ALTER TABLE `pack`
  ADD PRIMARY KEY (`id_pack`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `id_personne` (`id_personne`),
  ADD KEY `id_saison` (`id_saison`);

--
-- Index pour la table `participe_entrainement`
--
ALTER TABLE `participe_entrainement`
  ADD PRIMARY KEY (`id_personne`,`id_entrainement`),
  ADD KEY `id_personne` (`id_personne`),
  ADD KEY `id_entrainement` (`id_entrainement`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`),
  ADD KEY `id_sexe` (`id_sexe`),
  ADD KEY `id_taille` (`id_taille`);

--
-- Index pour la table `responsabilite_legale`
--
ALTER TABLE `responsabilite_legale`
  ADD PRIMARY KEY (`responsable`,`mineur`),
  ADD KEY `responsable` (`responsable`),
  ADD KEY `mineur` (`mineur`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_personne`,`id_saison`,`id_statut`),
  ADD KEY `id_personne` (`id_personne`),
  ADD KEY `id_saison` (`id_saison`),
  ADD KEY `id_statut` (`id_statut`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`id_saison`);

--
-- Index pour la table `sexe`
--
ALTER TABLE `sexe`
  ADD PRIMARY KEY (`id_sexe`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id_statut`);

--
-- Index pour la table `taille`
--
ALTER TABLE `taille`
  ADD PRIMARY KEY (`id_taille`);

--
-- Index pour la table `type_action`
--
ALTER TABLE `type_action`
  ADD PRIMARY KEY (`id_type_action`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`),
  ADD KEY `id_personne` (`id_personne`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `arbitre`
--
ALTER TABLE `arbitre`
  MODIFY `id_arbitre` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `entrainement`
--
ALTER TABLE `entrainement`
  MODIFY `id_entrainement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `marchandise`
--
ALTER TABLE `marchandise`
  MODIFY `id_marchandise` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id_match` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pack`
--
ALTER TABLE `pack`
  MODIFY `id_pack` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `saison`
--
ALTER TABLE `saison`
  MODIFY `id_saison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `taille`
--
ALTER TABLE `taille`
  MODIFY `id_taille` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_action`
--
ALTER TABLE `type_action`
  MODIFY `id_type_action` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`id_type_action`) REFERENCES `type_action` (`id_type_action`);

--
-- Contraintes pour la table `arbitrage`
--
ALTER TABLE `arbitrage`
  ADD CONSTRAINT `arbitrage_ibfk_1` FOREIGN KEY (`id_arbitre`) REFERENCES `arbitre` (`id_arbitre`),
  ADD CONSTRAINT `arbitrage_ibfk_2` FOREIGN KEY (`id_match`) REFERENCES `matchs` (`id_match`),
  ADD CONSTRAINT `arbitrage_ibfk_3` FOREIGN KEY (`id_fonction_arbitre`) REFERENCES `fonction_arbitre` (`id_fonction_arbitre`);

--
-- Contraintes pour la table `composition_equipe`
--
ALTER TABLE `composition_equipe`
  ADD CONSTRAINT `composition_equipe_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `composition_equipe_ibfk_2` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`);

--
-- Contraintes pour la table `composition_pack`
--
ALTER TABLE `composition_pack`
  ADD CONSTRAINT `composition_pack_ibfk_1` FOREIGN KEY (`id_pack`) REFERENCES `pack` (`id_pack`),
  ADD CONSTRAINT `composition_pack_ibfk_2` FOREIGN KEY (`id_marchandise`) REFERENCES `marchandise` (`id_marchandise`);

--
-- Contraintes pour la table `concerne_dirigeant`
--
ALTER TABLE `concerne_dirigeant`
  ADD CONSTRAINT `concerne_dirigeant_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`),
  ADD CONSTRAINT `concerne_dirigeant_ibfk_2` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `concerne_joueur`
--
ALTER TABLE `concerne_joueur`
  ADD CONSTRAINT `concerne_joueur_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`),
  ADD CONSTRAINT `concerne_joueur_ibfk_2` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`personne_contact`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `cotisation`
--
ALTER TABLE `cotisation`
  ADD CONSTRAINT `cotisation_ibfk_1` FOREIGN KEY (`id_saison`) REFERENCES `saison` (`id_saison`),
  ADD CONSTRAINT `cotisation_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `cout_pack`
--
ALTER TABLE `cout_pack`
  ADD CONSTRAINT `cout_pack_ibfk_1` FOREIGN KEY (`id_saison`) REFERENCES `saison` (`id_saison`),
  ADD CONSTRAINT `cout_pack_ibfk_2` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id_statut`),
  ADD CONSTRAINT `cout_pack_ibfk_3` FOREIGN KEY (`id_pack`) REFERENCES `pack` (`id_pack`);

--
-- Contraintes pour la table `encadre_entrainement`
--
ALTER TABLE `encadre_entrainement`
  ADD CONSTRAINT `encadre_entrainement_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `encadre_entrainement_ibfk_2` FOREIGN KEY (`id_entrainement`) REFERENCES `entrainement` (`id_entrainement`);

--
-- Contraintes pour la table `encadre_match`
--
ALTER TABLE `encadre_match`
  ADD CONSTRAINT `encadre_match_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `encadre_match_ibfk_2` FOREIGN KEY (`id_match`) REFERENCES `matchs` (`id_match`);

--
-- Contraintes pour la table `entrainement`
--
ALTER TABLE `entrainement`
  ADD CONSTRAINT `entrainement_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`id_saison`) REFERENCES `saison` (`id_saison`),
  ADD CONSTRAINT `equipe_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `formation_suivie`
--
ALTER TABLE `formation_suivie`
  ADD CONSTRAINT `formation_suivie_ibfk_1` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`),
  ADD CONSTRAINT `formation_suivie_ibfk_2` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `joue_dans_categorie`
--
ALTER TABLE `joue_dans_categorie`
  ADD CONSTRAINT `joue_dans_categorie_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `joue_dans_categorie_ibfk_2` FOREIGN KEY (`id_saison`) REFERENCES `saison` (`id_saison`),
  ADD CONSTRAINT `joue_dans_categorie_ibfk_3` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`equipe1`) REFERENCES `equipe` (`id_equipe`),
  ADD CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`equipe2`) REFERENCES `equipe` (`id_equipe`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `paiement_ibfk_2` FOREIGN KEY (`id_saison`) REFERENCES `saison` (`id_saison`);

--
-- Contraintes pour la table `participe_entrainement`
--
ALTER TABLE `participe_entrainement`
  ADD CONSTRAINT `participe_entrainement_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `participe_entrainement_ibfk_2` FOREIGN KEY (`id_entrainement`) REFERENCES `entrainement` (`id_entrainement`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`id_sexe`) REFERENCES `sexe` (`id_sexe`),
  ADD CONSTRAINT `personne_ibfk_2` FOREIGN KEY (`id_taille`) REFERENCES `taille` (`id_taille`);

--
-- Contraintes pour la table `responsabilite_legale`
--
ALTER TABLE `responsabilite_legale`
  ADD CONSTRAINT `responsabilite_legale_ibfk_1` FOREIGN KEY (`responsable`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `responsabilite_legale_ibfk_2` FOREIGN KEY (`mineur`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `role_ibfk_2` FOREIGN KEY (`id_saison`) REFERENCES `saison` (`id_saison`),
  ADD CONSTRAINT `role_ibfk_3` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id_statut`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

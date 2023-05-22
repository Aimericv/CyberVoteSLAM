-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 22 mai 2023 à 18:41
-- Version du serveur :  10.3.34-MariaDB-0ubuntu0.20.04.1
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
-- Base de données : `cybervote`
--

-- --------------------------------------------------------

--
-- Structure de la table `Asso_10`
--

CREATE TABLE `Asso_10` (
  `id_election` tinyint(4) NOT NULL,
  `NumCarteVote` varchar(50) NOT NULL,
  `CodeSecret` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Asso_10`
--

INSERT INTO `Asso_10` (`id_election`, `NumCarteVote`, `CodeSecret`) VALUES
(1, '1234-1234-1234-1234', '123456789'),
(2, '1234-1234-1234-1234', '987654321');

-- --------------------------------------------------------

--
-- Structure de la table `A_Voté`
--

CREATE TABLE `A_Voté` (
  `id_election` tinyint(4) NOT NULL,
  `NumCarteVote` varchar(50) NOT NULL,
  `DateVote` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Candidat`
--

CREATE TABLE `Candidat` (
  `Id_Candidat` int(11) NOT NULL,
  `Nom_Candidat` varchar(50) DEFAULT NULL,
  `Prenom_Candidat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Candidat`
--

INSERT INTO `Candidat` (`Id_Candidat`, `Nom_Candidat`, `Prenom_Candidat`) VALUES
(1, 'Macron', 'Emmanuel'),
(2, 'Melenchon', 'Jean-Luc'),
(3, 'Véron', 'Aurélien');

-- --------------------------------------------------------

--
-- Structure de la table `CARTE_VOTE`
--

CREATE TABLE `CARTE_VOTE` (
  `NumCarteVote` varchar(50) NOT NULL,
  `Id_Electeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `CARTE_VOTE`
--

INSERT INTO `CARTE_VOTE` (`NumCarteVote`, `Id_Electeur`) VALUES
('1234-1234-1234-1234', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Electeur`
--

CREATE TABLE `Electeur` (
  `Id_Electeur` int(11) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `Nom_Electeur` varchar(50) DEFAULT NULL,
  `Prenom_Electeur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Electeur`
--

INSERT INTO `Electeur` (`Id_Electeur`, `date_naissance`, `code_postal`, `Nom_Electeur`, `Prenom_Electeur`) VALUES
(1, '2000-01-01', 17000, 'a', 'b'),
(2, '2000-01-01', 17260, 'Vermesse', 'Aimeric'),
(3, '2000-01-01', 17260, 'Vermesse', 'Aimeric'),
(4, '2000-01-01', 17260, 'Vermesse', 'Aimeric'),
(5, '2000-10-01', 17260, 'Vermesse', 'Aimeric'),
(6, '2000-01-01', 17260, 'Vermesse', 'Aimeric'),
(7, '2000-01-01', 17000, 'a', 'b'),
(8, '2000-01-01', 17260, 'Vermesse', 'Aimeric');

-- --------------------------------------------------------

--
-- Structure de la table `Election`
--

CREATE TABLE `Election` (
  `id_election` tinyint(4) NOT NULL,
  `nom_election` varchar(50) DEFAULT NULL,
  `date_election` date DEFAULT NULL,
  `VoteBlanc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Election`
--

INSERT INTO `Election` (`id_election`, `nom_election`, `date_election`, `VoteBlanc`) VALUES
(1, 'Presidentielle', '2023-10-10', '4'),
(2, 'Election_Maire', '2023-06-01', '2');

-- --------------------------------------------------------

--
-- Structure de la table `Se_Presentent`
--

CREATE TABLE `Se_Presentent` (
  `Id_Candidat` int(11) NOT NULL,
  `id_election` tinyint(4) NOT NULL,
  `NbVoix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Se_Presentent`
--

INSERT INTO `Se_Presentent` (`Id_Candidat`, `id_election`, `NbVoix`) VALUES
(1, 1, 24),
(2, 1, 10),
(3, 2, 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Asso_10`
--
ALTER TABLE `Asso_10`
  ADD PRIMARY KEY (`id_election`,`NumCarteVote`),
  ADD KEY `NumCarteVote` (`NumCarteVote`);

--
-- Index pour la table `A_Voté`
--
ALTER TABLE `A_Voté`
  ADD PRIMARY KEY (`id_election`,`NumCarteVote`),
  ADD KEY `NumCarteVote` (`NumCarteVote`);

--
-- Index pour la table `Candidat`
--
ALTER TABLE `Candidat`
  ADD PRIMARY KEY (`Id_Candidat`);

--
-- Index pour la table `CARTE_VOTE`
--
ALTER TABLE `CARTE_VOTE`
  ADD PRIMARY KEY (`NumCarteVote`),
  ADD UNIQUE KEY `Id_Electeur` (`Id_Electeur`);

--
-- Index pour la table `Electeur`
--
ALTER TABLE `Electeur`
  ADD PRIMARY KEY (`Id_Electeur`);

--
-- Index pour la table `Election`
--
ALTER TABLE `Election`
  ADD PRIMARY KEY (`id_election`);

--
-- Index pour la table `Se_Presentent`
--
ALTER TABLE `Se_Presentent`
  ADD PRIMARY KEY (`Id_Candidat`,`id_election`),
  ADD KEY `id_election` (`id_election`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Asso_10`
--
ALTER TABLE `Asso_10`
  ADD CONSTRAINT `Asso_10_ibfk_1` FOREIGN KEY (`id_election`) REFERENCES `Election` (`id_election`),
  ADD CONSTRAINT `Asso_10_ibfk_2` FOREIGN KEY (`NumCarteVote`) REFERENCES `CARTE_VOTE` (`NumCarteVote`);

--
-- Contraintes pour la table `A_Voté`
--
ALTER TABLE `A_Voté`
  ADD CONSTRAINT `A_Voté_ibfk_1` FOREIGN KEY (`id_election`) REFERENCES `Election` (`id_election`),
  ADD CONSTRAINT `A_Voté_ibfk_2` FOREIGN KEY (`NumCarteVote`) REFERENCES `CARTE_VOTE` (`NumCarteVote`);

--
-- Contraintes pour la table `CARTE_VOTE`
--
ALTER TABLE `CARTE_VOTE`
  ADD CONSTRAINT `CARTE_VOTE_ibfk_1` FOREIGN KEY (`Id_Electeur`) REFERENCES `Electeur` (`Id_Electeur`);

--
-- Contraintes pour la table `Se_Presentent`
--
ALTER TABLE `Se_Presentent`
  ADD CONSTRAINT `Se_Presentent_ibfk_1` FOREIGN KEY (`Id_Candidat`) REFERENCES `Candidat` (`Id_Candidat`),
  ADD CONSTRAINT `Se_Presentent_ibfk_2` FOREIGN KEY (`id_election`) REFERENCES `Election` (`id_election`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

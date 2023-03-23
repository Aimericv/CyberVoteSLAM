-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2022 at 06:32 PM
-- Server version: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybervote`
--

-- --------------------------------------------------------

--
-- Table structure for table `Asso_7`
--

CREATE TABLE `Asso_7` (
  `Id_Electeur` int(11) NOT NULL,
  `Id_candidat` varchar(50) NOT NULL,
  `Id_Electeur_1` int(11) NOT NULL,
  `id_election` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Asso_8`
--

CREATE TABLE `Asso_8` (
  `Id_candidat` int(11) NOT NULL,
  `Id_candidat_1` varchar(50) NOT NULL,
  `Id_Electeur` int(11) NOT NULL,
  `id_election` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Asso_9`
--

CREATE TABLE `Asso_9` (
  `id_election` tinyint(4) NOT NULL,
  `Id_candidat` varchar(50) NOT NULL,
  `Id_Electeur` int(11) NOT NULL,
  `id_election_1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Asso_10`
--

CREATE TABLE `Asso_10` (
  `Id_Electeur` int(11) NOT NULL,
  `Id_Electeur_1` int(11) NOT NULL,
  `id_election` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Asso_11`
--

CREATE TABLE `Asso_11` (
  `id_election` tinyint(4) NOT NULL,
  `Id_Electeur` int(11) NOT NULL,
  `id_election_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Authentification`
--

CREATE TABLE `Authentification` (
  `Id_Electeur` int(11) NOT NULL,
  `id_election` int(11) NOT NULL,
  `code_secret` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `candidat`
--

CREATE TABLE `candidat` (
  `Id_candidat` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Electeur`
--

CREATE TABLE `Electeur` (
  `Id_Electeur` int(11) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `code_postale` int(11) DEFAULT NULL,
  `numero_carte_vote` varchar(30) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Electeur`
--

INSERT INTO `Electeur` (`Id_Electeur`, `date_naissance`, `code_postale`, `numero_carte_vote`, `nom`, `prenom`) VALUES
(1, '2001-10-10', 79000, '1234-1234-1234-1234', 'dqzdq', 'dqzdqz'),
(2, '2001-10-10', 79000, NULL, 'toi', 'salut'),
(3, '2001-10-10', 86000, NULL, 'test', 'test'),
(4, '2001-10-10', 86000, NULL, 'test', 'test'),
(5, '2003-01-01', 17000, NULL, 'b', 'a'),
(6, '2000-10-10', 79000, NULL, 'test', 'test'),
(7, '2000-10-10', 79000, NULL, 'test', 'test'),
(8, '2000-12-12', 6666, NULL, 'dzqdzq', 'dzqdzq'),
(9, '2022-11-24', 79000, NULL, 'A', 'L'),
(10, '2022-11-23', 23333, NULL, 'qqqq', 'dzqdzq');

-- --------------------------------------------------------

--
-- Table structure for table `Election`
--

CREATE TABLE `Election` (
  `id_election` tinyint(4) NOT NULL,
  `date_election` date DEFAULT NULL,
  `nb_vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Resultat`
--

CREATE TABLE `Resultat` (
  `nb_vote` int(11) NOT NULL,
  `id_election` int(11) DEFAULT NULL,
  `Id_candidat` int(11) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Se_Presentent`
--

CREATE TABLE `Se_Presentent` (
  `Id_candidat` int(11) NOT NULL,
  `id_election` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Vote`
--

CREATE TABLE `Vote` (
  `Id_candidat` varchar(50) NOT NULL,
  `Id_Electeur` int(11) NOT NULL,
  `id_election` varchar(50) NOT NULL,
  `vote` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Asso_7`
--
ALTER TABLE `Asso_7`
  ADD PRIMARY KEY (`Id_Electeur`,`Id_candidat`,`Id_Electeur_1`,`id_election`),
  ADD KEY `Id_candidat` (`Id_candidat`,`Id_Electeur_1`,`id_election`);

--
-- Indexes for table `Asso_8`
--
ALTER TABLE `Asso_8`
  ADD PRIMARY KEY (`Id_candidat`,`Id_candidat_1`,`Id_Electeur`,`id_election`),
  ADD KEY `Id_candidat_1` (`Id_candidat_1`,`Id_Electeur`,`id_election`);

--
-- Indexes for table `Asso_9`
--
ALTER TABLE `Asso_9`
  ADD PRIMARY KEY (`id_election`,`Id_candidat`,`Id_Electeur`,`id_election_1`),
  ADD KEY `Id_candidat` (`Id_candidat`,`Id_Electeur`,`id_election_1`);

--
-- Indexes for table `Asso_10`
--
ALTER TABLE `Asso_10`
  ADD PRIMARY KEY (`Id_Electeur`,`Id_Electeur_1`,`id_election`),
  ADD KEY `Id_Electeur_1` (`Id_Electeur_1`,`id_election`);

--
-- Indexes for table `Asso_11`
--
ALTER TABLE `Asso_11`
  ADD PRIMARY KEY (`id_election`,`Id_Electeur`,`id_election_1`),
  ADD KEY `Id_Electeur` (`Id_Electeur`,`id_election_1`);

--
-- Indexes for table `Authentification`
--
ALTER TABLE `Authentification`
  ADD PRIMARY KEY (`Id_Electeur`,`id_election`);

--
-- Indexes for table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`Id_candidat`);

--
-- Indexes for table `Electeur`
--
ALTER TABLE `Electeur`
  ADD PRIMARY KEY (`Id_Electeur`);

--
-- Indexes for table `Election`
--
ALTER TABLE `Election`
  ADD PRIMARY KEY (`id_election`),
  ADD KEY `nb_vote` (`nb_vote`);

--
-- Indexes for table `Resultat`
--
ALTER TABLE `Resultat`
  ADD PRIMARY KEY (`nb_vote`);

--
-- Indexes for table `Se_Presentent`
--
ALTER TABLE `Se_Presentent`
  ADD PRIMARY KEY (`Id_candidat`,`id_election`),
  ADD KEY `id_election` (`id_election`);

--
-- Indexes for table `Vote`
--
ALTER TABLE `Vote`
  ADD PRIMARY KEY (`Id_candidat`,`Id_Electeur`,`id_election`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `Id_candidat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Electeur`
--
ALTER TABLE `Electeur`
  MODIFY `Id_Electeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Asso_7`
--
ALTER TABLE `Asso_7`
  ADD CONSTRAINT `Asso_7_ibfk_1` FOREIGN KEY (`Id_Electeur`) REFERENCES `Electeur` (`Id_Electeur`),
  ADD CONSTRAINT `Asso_7_ibfk_2` FOREIGN KEY (`Id_candidat`,`Id_Electeur_1`,`id_election`) REFERENCES `Vote` (`Id_candidat`, `Id_Electeur`, `id_election`);

--
-- Constraints for table `Asso_8`
--
ALTER TABLE `Asso_8`
  ADD CONSTRAINT `Asso_8_ibfk_1` FOREIGN KEY (`Id_candidat`) REFERENCES `candidat` (`Id_candidat`),
  ADD CONSTRAINT `Asso_8_ibfk_2` FOREIGN KEY (`Id_candidat_1`,`Id_Electeur`,`id_election`) REFERENCES `Vote` (`Id_candidat`, `Id_Electeur`, `id_election`);

--
-- Constraints for table `Asso_9`
--
ALTER TABLE `Asso_9`
  ADD CONSTRAINT `Asso_9_ibfk_1` FOREIGN KEY (`id_election`) REFERENCES `Election` (`id_election`),
  ADD CONSTRAINT `Asso_9_ibfk_2` FOREIGN KEY (`Id_candidat`,`Id_Electeur`,`id_election_1`) REFERENCES `Vote` (`Id_candidat`, `Id_Electeur`, `id_election`);

--
-- Constraints for table `Asso_10`
--
ALTER TABLE `Asso_10`
  ADD CONSTRAINT `Asso_10_ibfk_1` FOREIGN KEY (`Id_Electeur`) REFERENCES `Electeur` (`Id_Electeur`),
  ADD CONSTRAINT `Asso_10_ibfk_2` FOREIGN KEY (`Id_Electeur_1`,`id_election`) REFERENCES `Authentification` (`Id_Electeur`, `id_election`);

--
-- Constraints for table `Asso_11`
--
ALTER TABLE `Asso_11`
  ADD CONSTRAINT `Asso_11_ibfk_1` FOREIGN KEY (`id_election`) REFERENCES `Election` (`id_election`),
  ADD CONSTRAINT `Asso_11_ibfk_2` FOREIGN KEY (`Id_Electeur`,`id_election_1`) REFERENCES `Authentification` (`Id_Electeur`, `id_election`);

--
-- Constraints for table `Election`
--
ALTER TABLE `Election`
  ADD CONSTRAINT `Election_ibfk_1` FOREIGN KEY (`nb_vote`) REFERENCES `Resultat` (`nb_vote`);

--
-- Constraints for table `Se_Presentent`
--
ALTER TABLE `Se_Presentent`
  ADD CONSTRAINT `Se_Presentent_ibfk_1` FOREIGN KEY (`Id_candidat`) REFERENCES `candidat` (`Id_candidat`),
  ADD CONSTRAINT `Se_Presentent_ibfk_2` FOREIGN KEY (`id_election`) REFERENCES `Election` (`id_election`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

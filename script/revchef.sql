-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 17 déc. 2024 à 10:41
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `revchef`
--

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

-- --------------------------------------------------------

--
-- Structure de la table `plate`
--

CREATE TABLE `plate` (
  `id_plate` int NOT NULL,
  `name` varchar(300) NOT NULL,
  `type` varchar(300) DEFAULT 'principales',
  `description` varchar(1500) NOT NULL,
  `id_menu` int DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int NOT NULL,
  `date_reservation` date DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL,
  `id_menu` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `role_name`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `name_utilisateur` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(200) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `id_role` int DEFAULT NULL,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `menu` (
  `id_menu` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `descreption` varchar(1000) NOT NULL,
  `prix` int NOT NULL,
  `id_utilisateur` int DEFAULT NULL,
  PRIMARY KEY(`id_menu`)
  FOREIGN KEY(`id_utilisateur`) REFERENCES utilisateur(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `name_utilisateur`, `Email`, `telephone`, `password`, `id_role`) VALUES
(16, 'Omar', 'omar54@example.com', '+212600000008', ' password105', 2),
(17, 'Sara Youssef', 'sara727@example.com', '+212600000009', 'password106', 2),
(19, 'Meryem Sara', 'meryem627@example.com', '+212600000011', 'password108', 2),
(21, 'Khalid Fatima', 'khalid345@example.com', '+212600000013', 'password110', 2),
(22, 'Youssef Sara', 'youssef563@example.com', '+212600000014', 'password111', 2),
(23, 'Fatima Khalid', 'fatima605@example.com', '+212600000015', 'password112', 2),
(26, 'Omar Rania', 'omar707@example.com', '+212600000018', 'password115', 2),
(29, 'HAMZA', 'hamza@gmail.com', '+1 (955) 136-9942', 'HAMZA', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `menu`
--
--ALTER TABLE `menu`
  -- ADD PRIMARY KEY (`id_menu`),
  -- ADD KEY `menu_ibfk_1` (`id_utilisateur`);

--
-- Index pour la table `plate`
--
ALTER TABLE `plate`
  ADD PRIMARY KEY (`id_plate`),
  ADD KEY `plate_ibfk_1` (`id_menu`),
  ADD KEY `fk_plate` (`id_utilisateur`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `reservation_ibfk_2` (`id_menu`),
  ADD KEY `reservation_ibfk_1` (`id_utilisateur`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `menu`
--
--ALTER TABLE `menu`
  -- MODIFY `id_menu` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plate`
--
ALTER TABLE `plate`
  MODIFY `id_plate` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `menu`
--
-- ALTER TABLE `menu`
  -- ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `plate`
--
ALTER TABLE `plate`
  ADD CONSTRAINT `fk_plate` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `plate_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 11 juin 2023 à 10:57
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `login_sample_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `collaboration`
--

CREATE TABLE `collaboration` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `plat` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `collaboration`
--

INSERT INTO `collaboration` (`id`, `nom`, `email`, `telephone`, `plat`, `adresse`) VALUES
(1, 'hello', 'ji', 'hu', 'helo', 'helo'),
(2, 'manal bendali', 'manalbendali02@gmail.com', '067339033', 'plat traditionnel', 'oujda'),
(3, 'taha ben-dahou', 'aminaamina@gmail.com', '067338933', 'entree', 'casa'),
(4, 'manal bendali', 'manalbendali02@gmail.com', '067339033', 'plat traditionnel', 'berkane'),
(5, 'BERRADA Mohamed', 'berrada@gmail.com', '0535987352', 'dessert', 'Casablanca anfa');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `txt` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_user`, `txt`) VALUES
(14, 28, 'j aime beaucoup la cuisine marocaine'),
(13, 25, 'je recommande vivement ce site '),
(12, 27, 'very helpfull !'),
(11, 26, 'meilleure site du monde'),
(15, 29, 'le cousocus marocain est l un de mes meilleures recettes dans ce site');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `password`, `email`, `telephone`) VALUES
(29, 'DAHMANI', 'Oumayma', '849894c73f3d8cf890b49ba184da5ba5', 'dah@gmail.com', 763592083),
(28, 'BENDALI', 'Manal', '8acc04d924c5d06a0c2d5cb92f7511d2', 'benadali@gmail.com', 675432198),
(27, 'ALAMI', 'Saida', 'f5cef96d7e57bb60d8ea3457cb735d26', 'saida@gmail.com', 673623836),
(25, 'ANIBA', 'Doha', 'ff7b5114c1e961d6a3f488f7ae627686', 'anibadoha@gmail.com', 624966492),
(26, 'TOUIL', 'jaouad', 'd39cd5381af508825336ae9fcd0d9f0b', 'anbar@email.com', 683879234);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `collaboration`
--
ALTER TABLE `collaboration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`nom`),
  ADD KEY `email` (`email`),
  ADD KEY `telephone` (`telephone`),
  ADD KEY `plat` (`plat`),
  ADD KEY `adresse` (`adresse`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `collaboration`
--
ALTER TABLE `collaboration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

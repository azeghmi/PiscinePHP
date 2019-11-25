-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3307
-- Généré le :  Dim 20 oct. 2019 à 14:30
-- Version du serveur :  5.6.43
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `f_minishop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'root', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(12) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(6, 'Lunette');

-- --------------------------------------------------------

--
-- Structure de la table `categories_produit`
--

CREATE TABLE `categories_produit` (
  `id` int(12) NOT NULL,
  `id_produit` int(12) NOT NULL,
  `id_categories` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories_produit`
--

INSERT INTO `categories_produit` (`id`, `id_produit`, `id_categories`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 5, 2),
(4, 6, 2),
(13, 8, 6),
(14, 7, 6),
(15, 10, 6),
(16, 11, 6);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(12) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `login`, `email`, `nom`, `prenom`, `password`, `admin_id`) VALUES
(2, 'root', 'root@gmail.com', 'Fleur', 'Jean', 'root', 1),
(3, 'lisa', 'liso', 'PIII', 'liso', 'a102091308303c2d0ec73001f8c33bcb2d90d9a37523104490fd88456b18bd3e166f6e23606f2d8993e714543801372b4607a63db2bf9176bc52da55e0d60e6f', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(12) NOT NULL,
  `id_client` int(12) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `prix`) VALUES
(3, 3, 450);

-- --------------------------------------------------------

--
-- Structure de la table `commande_c`
--

CREATE TABLE `commande_c` (
  `id` int(10) NOT NULL,
  `id_client` int(10) NOT NULL,
  `prix` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande_c`
--

INSERT INTO `commande_c` (`id`, `id_client`, `prix`) VALUES
(1, 2, 500),
(2, 3, 400);

-- --------------------------------------------------------

--
-- Structure de la table `commande_client`
--

CREATE TABLE `commande_client` (
  `id` int(12) NOT NULL,
  `id_produit` int(12) NOT NULL,
  `id_commande` int(12) NOT NULL,
  `prix` int(12) NOT NULL,
  `quantite` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande_client`
--

INSERT INTO `commande_client` (`id`, `id_produit`, `id_commande`, `prix`, `quantite`) VALUES
(2, 1, 3, 450, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(12) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `image`, `description`) VALUES
(1, 'Iphone30', 500, 'img/iphone1.png', 'nouvo'),
(2, 'iphone15', 800, 'img/iphone2.png', 'super iphone'),
(5, 'Samsung10', 450, 'img/samsung1.png', 'waouw'),
(6, 'Samsung3', 552, 'img/samsung2.png', 'tres bon phone'),
(7, 'lunette', 20, 'img/glasses1.png', 'superbe lunette'),
(8, 'lunette bleue', 60, 'img/glasses2.png', 'monture grise'),
(10, 'Lunette dorée', 80, 'img/glasses4.png', ''),
(11, 'lunette orange', 3, 'img/glasses3.png', 'lunette enfant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories_produit`
--
ALTER TABLE `categories_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product` (`id_produit`),
  ADD KEY `fk_categorie` (`id_categories`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-order` (`id_client`);

--
-- Index pour la table `commande_c`
--
ALTER TABLE `commande_c`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande_client`
--
ALTER TABLE `commande_client`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_commande` (`id_produit`),
  ADD KEY `fk_produit` (`id_commande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories_produit`
--
ALTER TABLE `categories_produit`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande_c`
--
ALTER TABLE `commande_c`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `commande_client`
--
ALTER TABLE `commande_client`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories_produit`
--
ALTER TABLE `categories_produit`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk-order` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `commande_client`
--
ALTER TABLE `commande_client`
  ADD CONSTRAINT `fk_commande` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `fk_produit` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

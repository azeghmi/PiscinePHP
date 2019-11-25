SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'root', 'root');

CREATE TABLE `categories` (
  `id` int(12) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(6, 'Lunette');

CREATE TABLE `categories_produit` (
  `id` int(12) NOT NULL,
  `id_produit` int(12) NOT NULL,
  `id_categories` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories_produit` (`id`, `id_produit`, `id_categories`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 5, 2),
(4, 6, 2),
(13, 8, 6),
(14, 7, 6),
(15, 10, 6),
(16, 11, 6);

CREATE TABLE `client` (
  `id` int(12) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `client` (`id`, `login`, `email`, `nom`, `prenom`, `password`, `admin_id`) VALUES
(2, 'root', 'root@gmail.com', 'Fleur', 'Jean', 'root', 1),
(3, 'lisa', 'liso', 'PIII', 'liso', 'a102091308303c2d0ec73001f8c33bcb2d90d9a37523104490fd88456b18bd3e166f6e23606f2d8993e714543801372b4607a63db2bf9176bc52da55e0d60e6f', 1);

CREATE TABLE `commande` (
  `id` int(12) NOT NULL,
  `id_client` int(12) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `commande` (`id`, `id_client`, `prix`) VALUES
(3, 3, 450);

CREATE TABLE `commande_client` (
  `id` int(12) NOT NULL,
  `id_produit` int(12) NOT NULL,
  `id_commande` int(12) NOT NULL,
  `prix` int(12) NOT NULL,
  `quantite` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `commande_client` (`id`, `id_produit`, `id_commande`, `prix`, `quantite`) VALUES
(2, 1, 3, 450, 1);

CREATE TABLE `produit` (
  `id` int(12) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `produit` (`id`, `nom`, `prix`, `image`, `description`) VALUES
(1, 'Iphone30', 500, 'img/iphone1.png', 'nouvo'),
(2, 'iphone15', 800, 'img/iphone2.png', 'super iphone'),
(5, 'Samsung10', 450, 'img/samsung1.png', 'waouw'),
(6, 'Samsung3', 552, 'img/samsung2.png', 'tres bon phone'),
(7, 'lunette', 20, 'img/glasses1.png', 'superbe lunette'),
(8, 'lunette bleue', 60, 'img/glasses2.png', 'monture grise'),
(10, 'Lunette dorée', 80, 'img/glasses4.png', ''),
(11, 'lunette orange', 3, 'img/glasses3.png', 'lunette enfant');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categories_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product` (`id_produit`),
  ADD KEY `fk_categorie` (`id_categories`);

ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `commande_client`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_commande` (`id_produit`);

ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `categories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `categories_produit`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `client`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `commande`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `commande_client`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `produit`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `categories_produit`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE;

ALTER TABLE `commande`
  ADD CONSTRAINT `fk-order` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

ALTER TABLE `commande_client`
  ADD CONSTRAINT `fk_commande` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `fk_produit` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE CASCADE;
COMMIT;
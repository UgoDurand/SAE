-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 02 mars 2023 à 14:04
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SAE`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `full_name`, `email`, `sujet`, `message`, `created_at`) VALUES
(19, 'Durand Ugo', 'durand.ugo77@gmail.com', 'Demande ajout Avenger', 'Bonjour, j\'aimerai retrouver le film Avenger sur ce site\r\nPourriez vous l\'ajouter ?', '2023-03-02 08:23:30');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`, `prenom`, `linkedin`, `image`) VALUES
(15, 'Abdul-Malak', 'Dany', 'https://www.linkedin.com/in/dany-abdul-malak-2b68a1220/?originalSubdomain=fr', 'dany-63e666e640ad2625218984.jpeg'),
(16, 'Kibangu', 'Chrinovic', 'https://www.linkedin.com/in/chrinovic-kibangu-tsimba-9a7a0b241/?originalSubdomain=fr', 'chrino-63e66776ca085395901834.jpeg'),
(17, 'Durand', 'Ugo', 'https://www.linkedin.com/in/ugodurand', 'moi-63e668c57c632204236100.jpeg'),
(22, 'Loquemanique', 'Jonathan', 'https://www.linkedin.com/in/jonathan-loquemanique-41a966224/', 'img-35754bd5f74a-1-64005f14bea72673107132.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `name_basics`
--

CREATE TABLE `name_basics` (
  `id` int(11) NOT NULL,
  `primary_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_year` int(11) NOT NULL,
  `death_year` int(11) DEFAULT NULL,
  `primary_profession` json NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `name_basics`
--

INSERT INTO `name_basics` (`id`, `primary_name`, `birth_year`, `death_year`, `primary_profession`, `name`) VALUES
(1, 'DiCaprio', 1975, NULL, '[\"Acteur\", \"Réalisateur\", \"Scénariste\"]', 'Leonardo'),
(2, 'Winslet', 1975, NULL, '[\"Actrice\"]', 'Kate'),
(5, 'Pratt', 1979, NULL, '[\"Acteur\"]', 'Chris'),
(6, 'Sy ', 1978, NULL, '[\"Acteur\", \"Humoriste\", \"Producteur\"]', 'Omar'),
(7, 'Wentworth', 1972, NULL, '[\"Acteur\", \"Scénariste\", \"Producteur\"]', 'Miller'),
(8, 'Worhington', 1976, NULL, '[\"Acteur\", \"Réalisateur\", \"Scénariste\"]', 'Sam'),
(9, 'Downey Jr', 1965, NULL, '[\"Acteur\", \"Scénariste\"]', 'Robert'),
(10, 'Boseman', 1976, 2020, '[\"Acteur\", \"Producteur\", \"Scénariste\"]', 'Chadwick'),
(11, 'Cameron', 1954, NULL, '[\"Réalisateur\"]', 'James');

-- --------------------------------------------------------

--
-- Structure de la table `name_basics_title_basic`
--

CREATE TABLE `name_basics_title_basic` (
  `name_basics_id` int(11) NOT NULL,
  `title_basic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `name_basics_title_basic`
--

INSERT INTO `name_basics_title_basic` (`name_basics_id`, `title_basic_id`) VALUES
(1, 10),
(2, 10),
(5, 13),
(6, 13),
(7, 16),
(8, 3),
(9, 12),
(10, 11);

-- --------------------------------------------------------

--
-- Structure de la table `title_basic`
--

CREATE TABLE `title_basic` (
  `id` int(11) NOT NULL,
  `title_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_adult` tinyint(1) NOT NULL,
  `start_year` date DEFAULT NULL,
  `end_year` date DEFAULT NULL,
  `runtime_minutes` int(11) DEFAULT NULL,
  `genres` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `title_basic`
--

INSERT INTO `title_basic` (`id`, `title_type`, `primary_title`, `original_title`, `is_adult`, `start_year`, `end_year`, `runtime_minutes`, `genres`) VALUES
(3, 'Film', 'Avatar : la voie de l\'eau', 'Avatar : The way of water', 0, NULL, NULL, 192, '[\"Science-Fiction\"]'),
(10, 'Film', 'Titanic', 'Titanic', 0, NULL, NULL, 195, '[\"Drame\", \"Romantique\"]'),
(11, 'Film', 'Black Panther', 'Black Panther', 0, NULL, NULL, 134, '[\"Science-Fiction\", \"Action\"]'),
(12, 'Film', 'Iron-Man', 'Iron-Man', 0, NULL, NULL, 126, '[\"Super-Héros\"]'),
(13, 'Film', 'Jurassic World', 'Jurassic World', 0, NULL, NULL, 124, '[\"Science-Fiction\"]'),
(14, 'Film', 'La Guerre des Étoiles', 'Star Wars', 0, NULL, NULL, 136, '[\"Science-Fiction\"]'),
(15, 'Film', 'Fast and Furious', 'The Fast and The Furious', 0, NULL, NULL, 106, '[\"Action\", \"Policier\", \"Thriller\"]'),
(16, 'Série Télévisée', 'Prison Break', 'Prison Break', 0, '2005-08-29', '2009-05-15', NULL, '[\"Thriller\", \"Drame\", \"Policier\"]');

-- --------------------------------------------------------

--
-- Structure de la table `title_crew`
--

CREATE TABLE `title_crew` (
  `id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `title_crew`
--

INSERT INTO `title_crew` (`id`, `title_id`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `title_crew_name_basics`
--

CREATE TABLE `title_crew_name_basics` (
  `title_crew_id` int(11) NOT NULL,
  `name_basics_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `title_crew_name_basics`
--

INSERT INTO `title_crew_name_basics` (`title_crew_id`, `name_basics_id`) VALUES
(1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `title_ratings`
--

CREATE TABLE `title_ratings` (
  `id` int(11) NOT NULL,
  `average_rating` double NOT NULL,
  `num_votes` int(11) NOT NULL,
  `name_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `title_ratings`
--

INSERT INTO `title_ratings` (`id`, `average_rating`, `num_votes`, `name_id`) VALUES
(1, 4.3, 124194, 3),
(2, 4.3, 98137, 10),
(3, 3.8, 29657, 11),
(4, 4, 61311, 12),
(5, 3.5, 40301, 13),
(6, 3.8, 57581, 14),
(7, 2.9, 27676, 15);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `roles`, `nom`, `prenom`, `age`, `sexe`) VALUES
(9, '$2y$13$X1ecvQAD7.8mlMTuYkSN4uMDq6G8jONLAwwnsIaJJHNx08CcOZfvu', 'durand.ugo77@gmail.com', '[\"ROLE_ADMIN\"]', 'Durand', 'Ugo', '19', 'Homme'),
(10, '$2y$13$J9ZigqhTpjVzvbXqV9Ye2O7I2qHnJXlPooyNjX7seJgBH4IbZbPd6', 'test@test.fr', '[]', 'test', 'test', '12', 'h');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `name_basics`
--
ALTER TABLE `name_basics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `name_basics_title_basic`
--
ALTER TABLE `name_basics_title_basic`
  ADD PRIMARY KEY (`name_basics_id`,`title_basic_id`),
  ADD KEY `IDX_497A3514384EA902` (`name_basics_id`),
  ADD KEY `IDX_497A35145AB1A4C3` (`title_basic_id`);

--
-- Index pour la table `title_basic`
--
ALTER TABLE `title_basic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `title_crew`
--
ALTER TABLE `title_crew`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C2939ACDA9F87BD` (`title_id`);

--
-- Index pour la table `title_crew_name_basics`
--
ALTER TABLE `title_crew_name_basics`
  ADD PRIMARY KEY (`title_crew_id`,`name_basics_id`),
  ADD KEY `IDX_F827FF891D9E608F` (`title_crew_id`),
  ADD KEY `IDX_F827FF89384EA902` (`name_basics_id`);

--
-- Index pour la table `title_ratings`
--
ALTER TABLE `title_ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8CCA3EB071179CD6` (`name_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `name_basics`
--
ALTER TABLE `name_basics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `title_basic`
--
ALTER TABLE `title_basic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `title_crew`
--
ALTER TABLE `title_crew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `title_ratings`
--
ALTER TABLE `title_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `name_basics_title_basic`
--
ALTER TABLE `name_basics_title_basic`
  ADD CONSTRAINT `FK_497A3514384EA902` FOREIGN KEY (`name_basics_id`) REFERENCES `name_basics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_497A35145AB1A4C3` FOREIGN KEY (`title_basic_id`) REFERENCES `title_basic` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `title_crew`
--
ALTER TABLE `title_crew`
  ADD CONSTRAINT `FK_C2939ACDA9F87BD` FOREIGN KEY (`title_id`) REFERENCES `title_basic` (`id`);

--
-- Contraintes pour la table `title_crew_name_basics`
--
ALTER TABLE `title_crew_name_basics`
  ADD CONSTRAINT `FK_F827FF891D9E608F` FOREIGN KEY (`title_crew_id`) REFERENCES `title_crew` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F827FF89384EA902` FOREIGN KEY (`name_basics_id`) REFERENCES `name_basics` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `title_ratings`
--
ALTER TABLE `title_ratings`
  ADD CONSTRAINT `FK_8CCA3EB071179CD6` FOREIGN KEY (`name_id`) REFERENCES `title_basic` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

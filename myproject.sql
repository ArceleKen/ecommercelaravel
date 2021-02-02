-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 10 août 2019 à 12:30
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `digicareweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `description` text NOT NULL,
  `info_compl` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `description`, `info_compl`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 16, ' consulter le compte test', 'resultat OK', '2019-06-19 07:25:02', '2019-06-19 07:25:02', NULL),
(13, 16, ' consulter le ticket {\"msisdn\":\"697479254\",\"type\":\"topup\"}', ' Aucune données ', '2019-06-19 07:25:31', '2019-06-19 07:25:31', NULL),
(14, 16, 'créer un compte le compte {\"name\":\"test21\",\"email\":\"test21@test.com\",\"login\":\"test21\",\"updated_at\":\"2019-07-25 08:29:54\",\"created_at\":\"2019-07-25 08:29:54\",\"id\":23}', ' roles [\"agent\"]', '2019-07-25 07:29:55', '2019-07-25 07:29:55', NULL),
(15, 16, 'créer un compte le compte {\"name\":\"testcr\",\"email\":\"testcr@test.com\",\"login\":\"testcr\",\"updated_at\":\"2019-07-26 17:53:51\",\"created_at\":\"2019-07-26 17:53:51\",\"id\":24}', ' roles [\"agent\"]', '2019-07-26 16:53:51', '2019-07-26 16:53:51', NULL),
(16, 16, 'créer un compte le compte {\"name\":\"testcr1\",\"email\":\"testcr1@test.com\",\"login\":\"testcr1\",\"updated_at\":\"2019-07-26 18:00:06\",\"created_at\":\"2019-07-26 18:00:06\",\"id\":25}', ' roles [\"agent\"]', '2019-07-26 17:00:06', '2019-07-26 17:00:06', NULL),
(17, 16, 'créer un compte le compte {\"name\":\"testcr2\",\"email\":\"testcr2@test.com\",\"login\":\"testcr2\",\"debut\":\"10:20\",\"fin\":\"12:30\",\"updated_at\":\"2019-07-26 18:03:09\",\"created_at\":\"2019-07-26 18:03:09\",\"id\":26}', ' roles [\"agent\"]', '2019-07-26 17:03:10', '2019-07-26 17:03:10', NULL),
(18, 16, ' consulter le compte empiretamo1er', 'resultat OK', '2019-08-10 09:09:36', '2019-08-10 09:09:36', NULL),
(19, 16, ' consulter le compte empiretamo1er', 'resultat OK', '2019-08-10 09:11:45', '2019-08-10 09:11:45', NULL),
(20, 16, ' consulter le compte empiretamo1er', 'resultat OK', '2019-08-10 09:45:57', '2019-08-10 09:45:57', NULL),
(21, 16, ' consulter le compte empiretamo1er', 'resultat OK', '2019-08-10 09:49:44', '2019-08-10 09:49:44', NULL),
(22, 16, ' consulter le compte empiretamo1er', 'resultat OK', '2019-08-10 10:04:44', '2019-08-10 10:04:44', NULL),
(23, 16, ' consulter le compte empiretamo1er', 'resultat OK', '2019-08-10 10:08:02', '2019-08-10 10:08:02', NULL),
(24, 16, ' consulter le compte empiretamo1er', 'resultat OK', '2019-08-10 10:10:33', '2019-08-10 10:10:33', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(16, 15, 'App\\User'),
(15, 16, 'App\\User'),
(15, 18, 'App\\User'),
(17, 18, 'App\\User'),
(17, 19, 'App\\User'),
(17, 20, 'App\\User'),
(17, 21, 'App\\User'),
(17, 22, 'App\\User'),
(17, 23, 'App\\User'),
(17, 24, 'App\\User'),
(17, 25, 'App\\User'),
(17, 26, 'App\\User'),
(17, 17, 'App\\User');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'create_user', 'web', 'Créer un utilisateur', '2017-12-08 11:54:58', '2017-12-08 11:54:58', NULL),
(17, 'modif_user', 'web', 'Modifier un utilisateur', '2017-12-08 11:56:02', '2017-12-08 11:56:02', NULL),
(18, 'delete_user', 'web', 'Supprimer un utilisateur', '2017-12-08 11:56:22', '2017-12-08 11:56:22', NULL),
(19, 'create_role', 'web', 'Créer un rôle ( )', '2017-12-08 12:02:57', '2017-12-12 15:05:31', NULL),
(20, 'modif_role', 'web', 'Modifier un rôle', '2017-12-08 12:03:13', '2017-12-08 12:03:13', NULL),
(21, 'delete_role', 'web', 'Supprimer un rôle', '2017-12-08 12:03:30', '2017-12-08 12:03:30', NULL),
(22, 'create_permission', 'web', 'Créer une permission', '2017-12-08 12:03:49', '2017-12-08 12:03:49', NULL),
(23, 'modif_permission', 'web', 'Modifier une permission', '2017-12-08 12:04:03', '2017-12-08 12:04:03', NULL),
(24, 'delete_permission', 'web', 'Supprimer une permission', '2017-12-08 12:04:19', '2017-12-08 12:04:19', NULL),
(27, 'gestion_compte', 'web', 'Accéder a la gestions des comptes', '2017-12-08 12:30:37', '2017-12-08 12:30:37', NULL),
(29, 'lister_user', 'web', 'lister les utiisateurs', NULL, NULL, NULL),
(30, 'lister_role', 'web', 'lister les rôles', NULL, NULL, NULL),
(31, 'lister_permissions', 'web', 'lister les permissions', NULL, NULL, NULL),
(32, 'detail_user', 'web', 'voir les details d\'un utilisateur', NULL, NULL, NULL),
(33, 'detail_role', 'web', 'voir les details d\'un role', NULL, NULL, NULL),
(34, 'detail_permission', 'web', 'voir les details d\'une permission', NULL, NULL, NULL),
(50, 'check_compte', 'web', 'Consulter l’état d\'un compte', '2019-06-17 23:00:00', '2019-06-17 23:00:00', NULL),
(51, 'check_requette', 'web', 'consulter l’état d\'une requête', '2019-06-17 23:00:00', '2019-06-17 23:00:00', NULL),
(52, 'check_transaction', 'web', 'Consulter l\'état d\'une transaction', '2019-06-16 23:00:00', '2019-06-16 23:00:00', NULL),
(53, 'check_ticket', 'web', 'Consulter un ticket', '2019-06-17 23:00:00', '2019-06-17 23:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'super_admin', 'web', 'Super administrateur, qui a tous les droits', '2017-12-08 12:05:08', '2017-12-08 12:05:08', NULL),
(16, 'admin', 'web', 'Adminstrateur, qui a tous les droits', '2017-12-08 12:05:36', '2017-12-08 12:05:36', NULL),
(17, 'agent', 'web', 'Agent modif', '2017-12-08 12:11:34', '2017-12-12 15:05:04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(16, 16),
(17, 16),
(18, 16),
(19, 16),
(20, 16),
(21, 16),
(22, 16),
(23, 16),
(24, 16),
(16, 15),
(17, 15),
(18, 15),
(19, 15),
(20, 15),
(21, 15),
(22, 15),
(23, 15),
(24, 15),
(41, 15),
(44, 15),
(45, 15),
(46, 15),
(16, 17),
(35, 17),
(47, 17);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `login` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apikey` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apitoken` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `debut` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00:00',
  `fin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '23:59'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `login`, `apikey`, `apitoken`, `deleted_at`, `debut`, `fin`) VALUES
(15, 'admin', 'admin@wv.com', '$2y$10$iSN0/RWBzxoosfiTkhk1Seaa48HF16/YG1z2jidAWFVVmeXroogFy', NULL, '2017-12-08 12:23:37', '2017-12-08 12:23:37', 'admin', 'admin', 'admin', NULL, '00:00', '23:59'),
(16, 'superadmin', 'superadmin@wv.com', '$2y$10$7eoTESvBlJCzX4H9MjgFD.N0PJ09GJ6m8xbIrXhvxIvKrsQWP/Ywe', 's09uwc5iOtl3uTFJbpDq5lSVoOE81bT1l9Uq93URhgoVFiBfBgDddHn18flS', '2017-12-08 12:24:16', '2017-12-08 12:24:16', 'superadmin', 'superadmin', 'superadmin', NULL, '00:00', '23:59'),
(17, 'agent', 'agent@wv.com', '$2y$10$0uxXPms7eateDJSwKu0YtevOKGzhN89nl5V4Fvcwg8GIG25duO7K6', NULL, '2017-12-08 12:24:46', '2019-08-01 07:53:15', 'agent', 'agent', 'agent', NULL, '12:00', '23:50'),
(18, 'test', 'testmango@test4.com', '$2y$10$29YY2.GTVDHsRZpbX9oF8e8DHSs6L2MFTuRtS1i3FWQGUejoNwFPi', NULL, '2019-06-17 10:44:32', '2019-06-17 10:44:32', 'test123', NULL, NULL, NULL, '00:00', '23:59'),
(19, 'test1234', 'test1234@test.com', '$2y$10$9y5ddK7OKR6X347aKE0IF.YmdAmQP6A55fFEEwkVTsmxheCB7gIO.', NULL, '2019-06-17 11:45:41', '2019-06-17 11:45:41', 'test123', NULL, NULL, NULL, '00:00', '23:59'),
(20, 'test12345', 'test12345@test.com', '$2y$10$XF7kAEmtFSdYkqMEYwfrOuZUE/Wp7O71NnlfFbHU3RbWrxb.YUO72', NULL, '2019-06-17 11:46:43', '2019-06-17 11:46:43', 'test1235', NULL, NULL, NULL, '00:00', '23:59'),
(21, 'test123456', 'test123456@test.com', '$2y$10$s3bolrLomkq/pYBox5G/nukYwRpW0Uq/ZLTMRxG.jwdsQzdVXUqGq', NULL, '2019-06-17 11:54:58', '2019-06-17 11:54:58', 'test12356', NULL, NULL, NULL, '00:00', '23:59'),
(22, 'test123457', 'test123457@test.com', '$2y$10$qtlz2aHy4D9CHDBgaE8OFOy5rbvBJSwgKBB8aCptcqI0Yw9VR1Mpa', NULL, '2019-06-17 11:59:41', '2019-06-17 11:59:41', 'test12357', NULL, NULL, NULL, '00:00', '23:59'),
(23, 'test21', 'test21@test.com', '$2y$10$veDEFcZ5p6HgMokdFPBsJO4de4PX9V2Q36dVU4yXJ3OKriee/TfAu', NULL, '2019-07-25 07:29:54', '2019-07-25 07:29:54', 'test21', NULL, NULL, NULL, '00:00', '23:59'),
(24, 'testcr', 'testcr@test.com', '$2y$10$HTfgoEvH3Nw6EfsKiSdTR.znIagRaknNHUGTK4nE5Sy1iwcG847gi', NULL, '2019-07-26 16:53:51', '2019-07-26 16:53:51', 'testcr', NULL, NULL, NULL, '00:00', '23:59'),
(25, 'testcr1', 'testcr1@test.com', '$2y$10$1FCRmDCNcxOiBPjhw4lZuOrCP6609O3Oo.TZRm8IJhOhuQ5h9/58O', NULL, '2019-07-26 17:00:06', '2019-07-26 17:00:06', 'testcr1', NULL, NULL, NULL, '00:00', '23:59'),
(26, 'testcr2', 'testcr2@test.com', '$2y$10$vW8sANv7Eo5zQqt.axj4yucIe3IaHS0bfvK8qkpHDjA5fkjUUD.c.', NULL, '2019-07-26 17:03:09', '2019-07-26 17:03:09', 'testcr2', NULL, NULL, NULL, '10:20', '12:30');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

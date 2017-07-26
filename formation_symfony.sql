-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 10 Juillet 2017 à 16:29
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formation_symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `profile` longtext COLLATE utf8_unicode_ci,
  `details` longtext COLLATE utf8_unicode_ci,
  `updated_at` datetime DEFAULT NULL,
  `nb_Applications` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `advert`
--

INSERT INTO `advert` (`id`, `date`, `title`, `author`, `description`, `published`, `image_id`, `profile`, `details`, `updated_at`, `nb_Applications`, `slug`) VALUES
(27, '2017-07-03 15:03:05', 'H/F développeur PHP/Symfony', 'Web-atrio', '<p>Au sein du pôle IT, sous la direction du Responsable Système d’Information, vous serez en charge de :<ul><li>Concevoir, développer et maintenir des projets Front/Back-End.</li><li>Respecter les bonnes pratiques de codage.</li><li>Tester et valider les fonctionnalités développées.</li><li>La veille technologique</li></ul></p>', 1, 26, '<p>Vous êtes diplômé(e) d’un Bac +2/5 en Informatique .</p><p>Profil jeune diplômé avec le goût du challenge.</p><p>Vous avez le goût du travail en équipe et la volonté de vous investir au sein d’une start-up en pleine croissance.</p><p>Vous êtes organisé(e), rigoureux(se), motivé(e).</p><p>Type d\'emploi : Temps plein</p><p>Formation(s) exigée(s) :<ul><li>Études secondaires (niveau Bac)</li></ul></p>",<p>Web-atrio est une entreprise dynamique qui fonctionne en tant qu\'entreprise libérée.</p>', NULL, NULL, 2, ''),
(28, '2017-07-03 16:00:05', 'H/F développeur Android', 'Web-atrio', '<ul><li>Participer à la rédaction du cahier des charges pour définir les besoins fonctionnels et techniques</li><li>Concevoir, réaliser, développer des applications mobiles Android en langage natif</li><li>Tester vos réalisations, piloter les phases de recette et validation</li><li>Maintenir et faire évoluer les applications existantes</li><li>Effectuer une veille technologique sur les technologies du marché</li></ul>', 1, 27, '<ul><li>De formation minimum bac +3 en informatique, vous disposez d’au moins un an d’expérience en entreprise</li><li>Maitrise de JAVA et DALVIK</li><li>Connaissance des IDE (Eclipse, Netbeans, Android Studio)</li><li>La maitrise de l’anglais est souhaitable</li></ul>', NULL, NULL, 0, ''),
(29, '2017-07-04 10:30:22', 'H/F Intégrateur web / Graphiste', 'Web-atrio', '<p>Au sein du pôle animation digitale et studio graphique, vous serez en charge de l’intégration et du webdesign sur les emailing & les sites d\'un de nos clients.</p><p>Vous interviendrez pour la production des visuels, tout en respectant les guides-lines et la charte graphique du groupe pour animer les différents services.</p><p><ul><li>Design des emailing & des sites</li><li>Intégration email et pages web dans les environnements clients</li><li>Recommandations d’optimisations graphiques et ergonomiques</li></ul></p>', 1, 28, '<ul><li>De formation minimum bac +3 en informatique, vous disposez d’au moins un an d’expérience en entreprise</li><li>Maitrise de JAVA et DALVIK</li><li>Connaissance des IDE (Eclipse, Netbeans, Android Studio)</li><li>La maitrise de l’anglais est souhaitable</li></ul>', '<p>Web-atrio est une entreprise dynamique qui fonctionne en tant qu\'entreprise libérée.</p>', NULL, 2, ''),
(30, '2017-07-04 14:12:02', 'Chef de projet web H/F', 'Web-atrio', '<ul><li>Evaluation de la faisabilité technique des projets,</li><li>Suivi de projets, coordination ( mini- sites, sites et oéprations digitales)</li><li>Réalisation de cahiers de charges pour les appels d\'offres de prestataires,</li><li>Réalisation et suivi de rétro- planning de production,</li><li>Vérification finales avant envoie au client,</li><li>Suivi des noms de domaines,</li><li>Suivi du blog agence et des pages MEDIAPRISM L\'Agence sur les réseaux sociaux ( Facebook, Twitter)</li></ul>', 1, 29, '<ul><li>Maîtrise de la gestion de projet,</li><li>Analyse des devis des prestataires,</li><li> Maîtrise des logiciels et des principaux langages de programmation,</li><li>Maîtrise des innovations digitales,</li><li>Connaissance codage,</li><li>Autonomie pour animer coordonner et conduire un projet,</li><li>Travail en équipe, qualités relationnelles, réactivité, rigueur et souplesse.</li></ul>', NULL, NULL, 3, '');

-- --------------------------------------------------------

--
-- Structure de la table `advert_category`
--

CREATE TABLE `advert_category` (
  `advert_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `advert_category`
--

INSERT INTO `advert_category` (`advert_id`, `category_id`) VALUES
(27, 8),
(28, 9),
(29, 10),
(29, 11),
(30, 12);

-- --------------------------------------------------------

--
-- Structure de la table `advert_skill`
--

CREATE TABLE `advert_skill` (
  `id` int(11) NOT NULL,
  `advert_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `advert_skill`
--

INSERT INTO `advert_skill` (`id`, `advert_id`, `skill_id`, `level`) VALUES
(1, 27, 1, 'Expert'),
(2, 27, 2, 'Expert'),
(3, 29, 3, 'Expert'),
(4, 30, 4, 'Expert'),
(5, 29, 5, 'Expert');

-- --------------------------------------------------------

--
-- Structure de la table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `advert_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `application`
--

INSERT INTO `application` (`id`, `advert_id`, `content`, `last_name`, `date`, `first_name`) VALUES
(10, 27, '<p>Bonjour,<br>Je suis intéressée par votre offre d\'emploi. Pouvez-vous me contactez ?<br>Cordialement</p>', 'WA', '2017-07-03 17:04:23', 'Elodie'),
(11, 27, '<p>Bonjour,<br>Je suis intéressé par votre offre d\'emploi. Pouvez-vous me contactez ?<br>Cordialement</p>', 'Doe', '2017-07-03 17:04:43', 'Doe'),
(12, 28, '<p>Bonjour,<br>Je suis intéressée par votre offre d\'emploi. Pouvez-vous me contactez ?<br>Cordialement</p>', 'WA', '2017-07-03 17:05:12', 'Elodie'),
(13, 28, '<p>Bonjour,<br>Je suis intéressé par votre offre d\'emploi. Pouvez-vous me contactez ?<br>Cordialement</p>', 'Doe', '2017-07-03 17:05:20', 'Doe'),
(14, 30, '<p>Bonjour,<br>Je suis intéressé par votre offre d\'emploi. Pouvez-vous me contactez ?<br>Cordialement</p>', 'WA', '2017-07-03 17:05:59', 'Jeremy'),
(15, 30, '<p>Bonjour,<br>Je suis intéressé par votre offre d\'emploi. Pouvez-vous me contactez ?<br>Cordialement</p>', 'WA', '2017-07-03 17:06:09', 'Laurent'),
(16, 30, '<p>Bonjour,<br>Je suis intéressé par votre offre d\'emploi. Pouvez-vous me contactez ?<br>Cordialement</p>', 'WA', '2017-07-03 17:06:19', 'Arnaud');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(13, 'Administratif'),
(9, 'Développement mobile'),
(8, 'Développement web'),
(12, 'Gestion de projet'),
(10, 'Graphisme'),
(11, 'Intégration');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `url`, `alt`) VALUES
(26, 'http://static8.viadeo-static.com/nB1iV387YzOsQ1hvxFsQqq8EIuA=/fit-in/200x200/filters:fill(white)/71865124654443b2bf70612b45b3f2d8/1434476532.jpeg', 'Logo Web-atrio'),
(27, 'http://static8.viadeo-static.com/nB1iV387YzOsQ1hvxFsQqq8EIuA=/fit-in/200x200/filters:fill(white)/71865124654443b2bf70612b45b3f2d8/1434476532.jpeg', 'Logo Web-atrio'),
(28, 'http://static8.viadeo-static.com/nB1iV387YzOsQ1hvxFsQqq8EIuA=/fit-in/200x200/filters:fill(white)/71865124654443b2bf70612b45b3f2d8/1434476532.jpeg', 'Logo Web-atrio'),
(29, 'http://static8.viadeo-static.com/nB1iV387YzOsQ1hvxFsQqq8EIuA=/fit-in/200x200/filters:fill(white)/71865124654443b2bf70612b45b3f2d8/1434476532.jpeg', 'Logo Web-atrio'),
(30, 'http://static8.viadeo-static.com/nB1iV387YzOsQ1hvxFsQqq8EIuA=/fit-in/200x200/filters:fill(white)/71865124654443b2bf70612b45b3f2d8/1434476532.jpeg', 'Logo Web-atrio');

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `skill`
--

INSERT INTO `skill` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'Symfony'),
(3, 'Photoshop'),
(4, 'MS-Office'),
(5, 'Illustrator');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_54F1F40B3DA5256D` (`image_id`);

--
-- Index pour la table `advert_category`
--
ALTER TABLE `advert_category`
  ADD PRIMARY KEY (`advert_id`,`category_id`),
  ADD KEY `IDX_84EEA340D07ECCB6` (`advert_id`),
  ADD KEY `IDX_84EEA34012469DE2` (`category_id`);

--
-- Index pour la table `advert_skill`
--
ALTER TABLE `advert_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5619F91BD07ECCB6` (`advert_id`),
  ADD KEY `IDX_5619F91B5585C142` (`skill_id`);

--
-- Index pour la table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A45BDDC1D07ECCB6` (`advert_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_64C19C15E237E06` (`name`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `advert_skill`
--
ALTER TABLE `advert_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `advert`
--
ALTER TABLE `advert`
  ADD CONSTRAINT `FK_54F1F40B3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Contraintes pour la table `advert_category`
--
ALTER TABLE `advert_category`
  ADD CONSTRAINT `FK_84EEA34012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_84EEA340D07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `advert_skill`
--
ALTER TABLE `advert_skill`
  ADD CONSTRAINT `FK_B7F1DD4C5585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`),
  ADD CONSTRAINT `FK_B7F1DD4CD07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`);

--
-- Contraintes pour la table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `FK_A45BDDC1D07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

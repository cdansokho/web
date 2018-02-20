-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2017 at 11:30 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `c1` text NOT NULL,
  `c2` text NOT NULL,
  `c3` text NOT NULL,
  `presentation` text NOT NULL,
  `role` text NOT NULL,
  `datep` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `auteur`, `contenu`, `c1`, `c2`, `c3`, `presentation`, `role`, `datep`) VALUES
(16, 'Testeur', 'Teurteur', 'qmdfhjqdfjdskf:ksdjfkj hdskjf ghsdg f jsgdjhf gsjdhfg jdhsgf jdhsg fjdhsfj dsgjhfz gjhfdgs jhfg sjhdfg jhsdfg jhsdg fjhsdg fj,sfhsg dfgsfgsdfhg dhsf sfsfjhsdfg ,dsfhjgs djfhg sjdhfgjhsdgfjhsdgfjhsdgfjhsdgf jhsgdf jhg sjdfhgjshdfg jhsdfg jhsdfg jhsdg fsj djhfg shfg shfg sjdhg jfsdhg fsjdhgfjhdsgf jhsg jhdsgf jdhsg fsfjsdfhjsdg,fhjd,s sdfdssdfdhjf g gfjds,hj,gs dhjsd gfdhjsfg ', 'qmdfhjqdfjdskf:ksdjfkj hdskjf ghsdg f jsgdjhf gsjdhfg jdhsgf jdhsg fjdhsfj dsgjhfz gjhfdgs jhfg sjhdfg jhsdfg jhsdg fjhsdg fj,sfhsg dfgsfgsdfhg dhsf sfsfjhsdfg ,dsfhjgs djfhg sjdhfgjhsdgfjhsdgfjhsdgfjhsdgf jhsgdf jhg sjdfhgjshdfg jhsdfg jhsdfg jhsdg fsj djhfg shfg shfg sjdhg jfsdhg fsjdhgfjhdsgf jhsg jhdsgf jdhsg fsfjsdfhjsdg,fhjd,s sdfdssdfdhjf g gfjds,hj,gs dhjsd gfdhjsfg qmdfhjqdfjdskf:ksdjfkj hdskjf ghsdg f jsgdjhf gsjdhfg jdhsgf jdhsg fjdhsfj dsgjhfz gjhfdgs jhfg sjhdfg jhsdfg jhsdg fjhsdg fj,sfhsg dfgsfgsdfhg dhsf sfsfjhsdfg ,dsfhjgs djfhg sjdhfgjhsdgfjhsdgfjhsdgfjhsdgf jhsgdf jhg sjdfhgjshdfg jhsdfg jhsdfg jhsdg fsj djhfg shfg shfg sjdhg jfsdhg fsjdhgfjhdsgf jhsg jhdsgf jdhsg fsfjsdfhjsdg,fhjd,s sdfdssdfdhjf g gfjds,hj,gs dhjsd gfdhjsfg ', 'qmdfhjqdfjdskf:ksdjfkj hdskjf ghsdg f jsgdjhf gsjdhfg jdhsgf jdhsg fjdhsfj dsgjhfz gjhfdgs jhfg sjhdfg jhsdfg jhsdg fjhsdg fj,sfhsg dfgsfgsdfhg dhsf sfsfjhsdfg ,dsfhjgs djfhg sjdhfgjhsdgfjhsdgfjhsdgfjhsdgf jhsgdf jhg sjdfhgjshdfg jhsdfg jhsdfg jhsdg fsj djhfg shfg shfg sjdhg jfsdhg fsjdhgfjhdsgf jhsg jhdsgf jdhsg fsfjsdfhjsdg,fhjd,s sdfdssdfdhjf g gfjds,hj,gs dhjsd gfdhjsfg qmdfhjqdfjdskf:ksdjfkj hdskjf ghsdg f jsgdjhf gsjdhfg jdhsgf jdhsg fjdhsfj dsgjhfz gjhfdgs jhfg sjhdfg jhsdfg jhsdg fjhsdg fj,sfhsg dfgsfgsdfhg dhsf sfsfjhsdfg ,dsfhjgs djfhg sjdhfgjhsdgfjhsdgfjhsdgfjhsdgf jhsgdf jhg sjdfhgjshdfg jhsdfg jhsdfg jhsdg fsj djhfg shfg shfg sjdhg jfsdhg fsjdhgfjhdsgf jhsg jhdsgf jdhsg fsfjsdfhjsdg,fhjd,s sdfdssdfdhjf g gfjds,hj,gs dhjsd gfdhjsfg ', 'qmdfhjqdfjdskf:ksdjfkj hdskjf ghsdg f jsgdjhf gsjdhfg jdhsgf jdhsg fjdhsfj dsgjhfz gjhfdgs jhfg sjhdfg jhsdfg jhsdg fjhsdg fj,sfhsg dfgsfgsdfhg dhsf sfsfjhsdfg ,dsfhjgs djfhg sjdhfgjhsdgfjhsdgfjhsdgfjhsdgf jhsgdf jhg sjdfhgjshdfg jhsdfg jhsdfg jhsdg fsj djhfg shfg shfg sjdhg jfsdhg fsjdhgfjhdsgf jhsg jhdsgf jdhsg fsfjsdfhjsdg,fhjd,s sdfdssdfdhjf g gfjds,hj,gs dhjsd gfdhjsfg qmdfhjqdfjdskf:ksdjfkj hdskjf ghsdg f jsgdjhf gsjdhfg jdhsgf jdhsg fjdhsfj dsgjhfz gjhfdgs jhfg sjhdfg jhsdfg jhsdg fjhsdg fj,sfhsg dfgsfgsdfhg dhsf sfsfjhsdfg ,dsfhjgs djfhg sjdhfgjhsdgfjhsdgfjhsdgfjhsdgf jhsgdf jhg sjdfhgjshdfg jhsdfg jhsdfg jhsdg fsj djhfg shfg shfg sjdhg jfsdhg fsjdhgfjhdsgf jhsg jhdsgf jdhsg fsfjsdfhjsdg,fhjd,s sdfdssdfdhjf g gfjds,hj,gs dhjsd gfdhjsfg ', '', 'Niqué des mere, hééé oui ', '2017-01-19 00:00:00'),
(24, 'Les plates', 'MOI', 'Le gladiateur est un pur bourrin (est c’est pour ça qu’on l’aime :3), cette classe  attaque essentiellement au cac, c’est souvent la classe la plus choisi pour un premier personnage. Certains décroche rapidement quand ils ne connaissent pas toutes les facettes du jeu car sans stuff il est très difficile de PVP avec et le PVE est laborieux dû à l’inexpérience du joueur. Pourtant un joueur expérimenté sera redoutable avec cette classe qui présente un DPS physique non négligeable.  La plupart des joueurs s’équipe d’une guisarme qui est l’arme de prédilection du gladiateur car elle présente une plage de dégât plus élevée. D’autres utiliseront un espadon (ce qui est une erreur pour moi car réservé au templier) et d’autres en ambidextre pour pouvoir tanker en instance. La spécificité du gladiateur est qu’il pourra facilement tuer plusieurs adversaire grâce à ses AOE dévastateur. Il possède aussi la faculté de KD ses adversaires avec des skills infligeant plus de dégât.', 'PVE solo : cette partie est assez compliqué en début de jeu car cette classe au CAC perdra facilement des PV donc équipe-toi de potion de vie. Bizarrement en end-game on manquera plus souvent de mana que de vie =)\r\n\r\nPVE de groupe : Cette classe aura parfois du mal à trouver sa place et son utilité dans le groupe car il ne devra (théoriquement) pas utiliser ses AOE sous peine d’aggro de nouveaux mobs ou supprimer les mezz et autres contrôle des sorciers.', 'PVP : elle peut aisément être une des plus forte classe de Aion en terme de PVP mais pour cela il lui faudra un excellent stuff. Souvent déconcerté de ne pas toucher les classes magiques, il faudra développer un gameplay irréprochable pour les approcher et surtout ne pas les lâcher ! C’est aussi la seule classe qui a un skill PVP à bas level.\r\n\r\nPVP de groupe : Indispensable pour le PVP de groupe, il n’a qu’une idée, sauter dans le groupe ennemi et tout défoncer avec ses AOE (vous avez dit classe de bourrin ?)\r\n\r\nArme de prédilection : guisarme/double épéesPVP : elle peut aisément être une des plus forte classe de Aion en terme de PVP mais pour cela il lui faudra un excellent stuff. Souvent déconcerté de ne pas toucher les classes magiques, il faudra développer un gameplay irréprochable pour les approcher et surtout ne pas les lâcher ! C’est aussi la seule classe qui a un skill PVP à bas level.\r\n\r\nPVP de groupe : Indispensable pour le PVP de groupe, il n’a qu’une idée, sauter dans le groupe ennemi et tout défoncer avec ses AOE (vous avez dit classe de bourrin ?)\r\n\r\nArme de prédilection : guisarme/double épées', 'PVP : elle peut aisément être une des plus forte classe de Aion en terme de PVP mais pour cela il lui faudra un excellent stuff. Souvent déconcerté de ne pas toucher les classes magiques, il faudra développer un gameplay irréprochable pour les approcher et surtout ne pas les lâcher ! C’est aussi la seule classe qui a un skill PVP à bas level.\r\n\r\nPVP de groupe : Indispensable pour le PVP de groupe, il n’a qu’une idée, sauter dans le groupe ennemi et tout défoncer avec ses AOE (vous avez dit classe de bourrin ?)\r\n\r\nArme de prédilection : guisarme/double épéesPVP : elle peut aisément être une des plus forte classe de Aion en terme de PVP mais pour cela il lui faudra un excellent stuff. Souvent déconcerté de ne pas toucher les classes magiques, il faudra développer un gameplay irréprochable pour les approcher et surtout ne pas les lâcher ! C’est aussi la seule classe qui a un skill PVP à bas level.\r\n\r\nPVP de groupe : Indispensable pour le PVP de groupe, il n’a qu’une idée, sauter dans le groupe ennemi et tout défoncer avec ses AOE (vous avez dit classe de bourrin ?)\r\n\r\nArme de prédilection : guisarme/double épées', '', 'PVE solo : cette partie est assez compliqué en début de jeu car cette classe au CAC perdra facilement des PV donc équipe-toi de potion de vie. Bizarrement en end-game on manquera plus souvent de mana que de vie =)', '2017-01-13 00:00:00'),
(25, 'Le templier', 'teur', 'C’est la classe indispensable en instance car c’est le tank du jeu. Dans le principe, le gameplay peut paraître simple. Attaquer en 1er et faire monter l’hostilité pour garder l’aggro sur soi. Mais c’est plus compliqué que ça ! En effet, le templier devra aussi user de ses sorts pour augmenter et régénérer ses PV si le healer à du mal à suivre. Il pourra aussi utiliser des sorts de protection sur ses alliés pour prendre des dégats.\r\n\r\nC’est la classe indispensable en instance car c’est le tank du jeu. Dans le principe, le gameplay peut paraître simple. Attaquer en 1er et faire monter l’hostilité pour garder l’aggro sur soi. Mais c’est plus compliqué que ça ! En effet, le templier devra aussi user de ses sorts pour augmenter et régénérer ses PV si le healer à du mal à suivre. Il pourra aussi utiliser des sorts de protection sur ses alliés pour prendre des dégats.\r\n\r\n', '\r\nPVE de groupe : essentiel en instance pour tanker\r\n\r\nPVP : redoutable contre les cuirs et même les tissus, il pourra aussi facilement battre un gladiateur.\r\n\r\nPVP de groupe : il est utile pour « grab » son adversaire vers son groupe et protéger le healer qui lui est focus juste après les dps (ou parfois déjà focus par un personnage du groupe adverse).\r\n\r\nAstuce : pour PVE plus facilement en solo, fait toi un stuff entièrement gemmé de pierre critique ! (a bas level)\r\nPVE de groupe : essentiel en instance pour tanker\r\n\r\nPVP : redoutable contre les cuirs et même les tissus, il pourra aussi facilement battre un gladiateur.\r\n\r\nPVP de groupe : il est utile pour « grab » son adversaire vers son groupe et protéger le healer qui lui est focus juste après les dps (ou parfois déjà focus par un personnage du groupe adverse).\r\n\r\nAstuce : pour PVE plus facilement en solo, fait toi un stuff entièrement gemmé de pierre critique ! (a bas level)', '\r\nPVE de groupe : essentiel en instance pour tanker\r\n\r\nPVP : redoutable contre les cuirs et même les tissus, il pourra aussi facilement battre un gladiateur.\r\n\r\nPVP de groupe : il est utile pour « grab » son adversaire vers son groupe et protéger le healer qui lui est focus juste après les dps (ou parfois déjà focus par un personnage du groupe adverse).\r\n\r\nAstuce : pour PVE plus facilement en solo, fait toi un stuff entièrement gemmé de pierre critique ! (a bas level)\r\nPVE de groupe : essentiel en instance pour tanker\r\n\r\nPVP : redoutable contre les cuirs et même les tissus, il pourra aussi facilement battre un gladiateur.\r\n\r\nPVP de groupe : il est utile pour « grab » son adversaire vers son groupe et protéger le healer qui lui est focus juste après les dps (ou parfois déjà focus par un personnage du groupe adverse).\r\n\r\nAstuce : pour PVE plus facilement en solo, fait toi un stuff entièrement gemmé de pierre critique ! (a bas level)', '\r\nPVE de groupe : essentiel en instance pour tanker\r\n\r\nPVP : redoutable contre les cuirs et même les tissus, il pourra aussi facilement battre un gladiateur.\r\n\r\nPVP de groupe : il est utile pour « grab » son adversaire vers son groupe et protéger le healer qui lui est focus juste après les dps (ou parfois déjà focus par un personnage du groupe adverse).\r\n\r\nAstuce : pour PVE plus facilement en solo, fait toi un stuff entièrement gemmé de pierre critique ! (a bas level)\r\nPVE de groupe : essentiel en instance pour tanker\r\n\r\nPVP : redoutable contre les cuirs et même les tissus, il pourra aussi facilement battre un gladiateur.\r\n\r\nPVP de groupe : il est utile pour « grab » son adversaire vers son groupe et protéger le healer qui lui est focus juste après les dps (ou parfois déjà focus par un personnage du groupe adverse).\r\n\r\nAstuce : pour PVE plus facilement en solo, fait toi un stuff entièrement gemmé de pierre critique ! (a bas level)', '', '\r\nPVE de groupe : essentiel en instance pour tanker\r\n\r\nPVP : redoutable contre les cuirs et même les tissus, il pourra aussi facilement battre un gladiateur.\r\n\r\nPVP de groupe : il est utile pour « grab » son adversaire vers son groupe et protéger le healer qui lui est focus juste après les dps (ou parfois déjà focus par un personnage du groupe adverse).\r\n\r\nAstuce : pour PVE plus facilement en solo, fait toi un stuff entièrement gemmé de pierre critique ! (a bas level)', '2017-02-02 00:00:00'),
(26, 'Les mailles', 'je asi', 'Une classe fort sympathique mais assez difficile à jouer car elle contient peu de sort offensif et fait souvent office de buff sur pattes. Son dps n’est pas très élevé face à un adversaire à stuff équivalent. Utile pour assister le Healer, ses sorts de supports sont vraiment utile et permet à un groupe d’être plus efficace.\r\n\r\nUne classe fort sympathique mais assez difficile à jouer car elle contient peu de sort offensif et fait souvent office de buff sur pattes. Son dps n’est pas très élevé face à un adversaire à stuff équivalent. Utile pour assister le Healer, ses sorts de supports sont vraiment utile et permet à un groupe d’être plus efficace.\r\n\r\n', 'PVE solo : malgré son faible dps il pourra aisément se heal, pas de souci à ce niveau là\r\n\r\nPVE de groupe : il est là pour ses mantras d’amélioration et assister le clerc\r\n\r\nPVP : Un gameplay assez difficile car il faut souvent se soigner pendant le burst de l’ennemi avant d’engager réellement le combat (je sais pas si tu suis ?!)\r\n\r\nPVP de groupe : a part les mantras il est possible qu’il inflige des trébuchements dû à son arme et il a aussi le rôle d’assist heal en cas de souci.\r\n\r\nArme de prédilection : baton / bouclier – massePVE solo : malgré son faible dps il pourra aisément se heal, pas de souci à ce niveau là\r\n\r\nPVE de groupe : il est là pour ses mantras d’amélioration et assister le clerc\r\n\r\nPVP : Un gameplay assez difficile car il faut souvent se soigner pendant le burst de l’ennemi avant d’engager réellement le combat (je sais pas si tu suis ?!)\r\n\r\nPVP de groupe : a part les mantras il est possible qu’il inflige des trébuchements dû à son arme et il a aussi le rôle d’assist heal en cas de souci.\r\n\r\nArme de prédilection : baton / bouclier – masse', 'PVE solo : malgré son faible dps il pourra aisément se heal, pas de souci à ce niveau là\r\n\r\nPVE de groupe : il est là pour ses mantras d’amélioration et assister le clerc\r\n\r\nPVP : Un gameplay assez difficile car il faut souvent se soigner pendant le burst de l’ennemi avant d’engager réellement le combat (je sais pas si tu suis ?!)\r\n\r\nPVP de groupe : a part les mantras il est possible qu’il inflige des trébuchements dû à son arme et il a aussi le rôle d’assist heal en cas de souci.\r\n\r\nArme de prédilection : baton / bouclier – massePVE solo : malgré son faible dps il pourra aisément se heal, pas de souci à ce niveau là\r\n\r\nPVE de groupe : il est là pour ses mantras d’amélioration et assister le clerc\r\n\r\nPVP : Un gameplay assez difficile car il faut souvent se soigner pendant le burst de l’ennemi avant d’engager réellement le combat (je sais pas si tu suis ?!)\r\n\r\nPVP de groupe : a part les mantras il est possible qu’il inflige des trébuchements dû à son arme et il a aussi le rôle d’assist heal en cas de souci.\r\n\r\nArme de prédilection : baton / bouclier – masse', 'PVE solo : malgré son faible dps il pourra aisément se heal, pas de souci à ce niveau là\r\n\r\nPVE de groupe : il est là pour ses mantras d’amélioration et assister le clerc\r\n\r\nPVP : Un gameplay assez difficile car il faut souvent se soigner pendant le burst de l’ennemi avant d’engager réellement le combat (je sais pas si tu suis ?!)\r\n\r\nPVP de groupe : a part les mantras il est possible qu’il inflige des trébuchements dû à son arme et il a aussi le rôle d’assist heal en cas de souci.\r\n\r\nArme de prédilection : baton / bouclier – massePVE solo : malgré son faible dps il pourra aisément se heal, pas de souci à ce niveau là\r\n\r\nPVE de groupe : il est là pour ses mantras d’amélioration et assister le clerc\r\n\r\nPVP : Un gameplay assez difficile car il faut souvent se soigner pendant le burst de l’ennemi avant d’engager réellement le combat (je sais pas si tu suis ?!)\r\n\r\nPVP de groupe : a part les mantras il est possible qu’il inflige des trébuchements dû à son arme et il a aussi le rôle d’assist heal en cas de souci.\r\n\r\nArme de prédilection : baton / bouclier – masse', '', 'PVE solo : malgré son faible dps il pourra aisément se heal, pas de souci à ce niveau là\r\n\r\nPVE de groupe : il est là pour ses mantras d’amélioration et assister le clerc\r\n\r\nPVP : Un gameplay assez difficile car il faut souvent se soigner pendant le burst de l’ennemi avant d’engager réellement le combat (je sais pas si tu suis ?!)\r\n\r\nPVP de groupe : a part les mantras il est possible qu’il inflige des trébuchements dû à son arme et il a aussi le rôle d’assist heal en cas de souci.\r\n\r\nArme de prédilection : baton / bouclier – masse', '2017-01-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_c` int(11) NOT NULL,
  `auteur_c` varchar(255) NOT NULL,
  `contenu_c` text NOT NULL,
  `id_articles` int(11) NOT NULL,
  `date_c` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id_c`, `auteur_c`, `contenu_c`, `id_articles`, `date_c`) VALUES
(900, 'MastaSD', 'et la ?', 3, '2017-01-18 20:18:36'),
(901, 'MastaSD', 'ok la sa amrche', 3, '2017-01-18 20:20:14'),
(902, 'MastaSD', 'iok', 3, '2017-01-19 14:57:43'),
(903, 'MastaSD', 'ok', 1, '2017-01-20 12:54:17'),
(904, 'MastaSD', 'je test', 1, '2017-01-20 12:54:25'),
(905, 'MastaSD', 'sa amrche bien', 1, '2017-01-20 12:54:35'),
(906, 'ccc', 'test', 8, '2017-01-23 09:47:47'),
(907, 'ccc', 'ok sa marche', 8, '2017-01-23 09:47:55'),
(908, 'MastaSD', 'azekoaz o', 15, '2017-01-23 17:35:45'),
(909, 'MastaSD', 'mdrr', 15, '2017-01-23 17:37:08'),
(910, 'MastaSD', 'salut', 15, '2017-01-23 17:37:39'),
(911, 'MastaSD', 'aaaaa', 15, '2017-01-23 17:37:53'),
(912, 'MastaSD', 'C\'est cool ça marche (je suis un pd)', 15, '2017-01-23 17:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  `lvl` int(11) NOT NULL DEFAULT '1',
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mail`, `motdepasse`, `lvl`, `avatar`) VALUES
(1, 'MastaSD', 'cdansokho@hotmail.com', 'f36b4825e5db2cf7dd2d2593b3f5c24c0311d8b2', 3, ''),
(2, 'MastaSD', 'sdx18@hotmail.fr', '808cb9d6b4ac356879a30fe9794af1dd623dfccc', 2, ''),
(4, 'fg', 'dz@df.fr', 'f36b4825e5db2cf7dd2d2593b3f5c24c0311d8b2', 1, ''),
(5, 'test', 'ok@ok.marche', 'f36b4825e5db2cf7dd2d2593b3f5c24c0311d8b2', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_c`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=913;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
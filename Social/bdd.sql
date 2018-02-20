-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 15 Mai 2017 à 22:38
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `site_social_baptiste`
--
CREATE DATABASE IF NOT EXISTS `site_social_baptiste` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `site_social_baptiste`;

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE `albums` (
  `id_album` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `date_album` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom_album` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `albums`
--

INSERT INTO `albums` (`id_album`, `id_author`, `date_album`, `nom_album`) VALUES
(1, 1, '2017-05-07 19:15:35', 'Vacances 2017'),
(2, 1, '2017-05-07 19:15:35', 'Projet PPE'),
(7, 1, '2017-05-14 19:41:48', 'Divers');

-- --------------------------------------------------------

--
-- Structure de la table `emojis`
--

CREATE TABLE `emojis` (
  `id_emoji` int(11) NOT NULL,
  `nom_emoji` varchar(255) NOT NULL,
  `raccourci_emoji` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `emojis`
--

INSERT INTO `emojis` (`id_emoji`, `nom_emoji`, `raccourci_emoji`) VALUES
(1, 'Yo', ':yo:'),
(2, 'Bravo', ':bravo:'),
(3, 'Like', ':like:'),
(4, 'Courgette', ':courgette:'),
(5, 'Bisous', ':bisous:'),
(6, 'Caca, Merde', ':caca:'),
(7, 'Coeur', '<3'),
(8, 'Etonner, Choquer', 'O_o'),
(9, 'Clin d\'oeil', ';)'),
(10, 'Tire la langue', ':p'),
(11, 'Fuck, Merde', ':fuck:'),
(12, 'Dislike, J\'aime Pas', ':dislike:'),
(13, 'Je t\'aime, Love', ':love:'),
(14, 'Mdr, Mdrr, Mdrrr', 'x)'),
(15, 'Mouai, Mince', ':sad:'),
(16, 'Oh', ':o'),
(17, 'Sourire bouche ouverte', ':D'),
(18, 'Nan, triste', ':('),
(19, 'Sourir, Content', ':)'),
(20, 'Pense, Réfléchi', ':pense:'),
(21, 'Chut, Muet', ':chut:'),
(22, 'Pleurer', ':pleure:'),
(23, 'Argent, Money', ':argent:'),
(24, 'Larme, triste', ':\'('),
(25, 'Bave', ':bave:');

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `id_f` int(11) NOT NULL,
  `id_a1` int(11) NOT NULL,
  `id_a2` int(11) NOT NULL,
  `date_amitier` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed` int(11) NOT NULL,
  `has_blocked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `friends`
--

INSERT INTO `friends` (`id_f`, `id_a1`, `id_a2`, `date_amitier`, `confirmed`, `has_blocked`) VALUES
(3, 2, 3, '2017-05-05 11:20:48', 1, 0),
(5, 2, 4, '2017-05-07 17:15:55', 1, 0),
(17, 1, 2, '2017-05-09 07:38:08', 1, 0),
(25, 3, 1, '2017-05-14 22:03:47', 1, 0),
(27, 1, 4, '2017-05-15 12:24:35', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `lier_photos`
--

CREATE TABLE `lier_photos` (
  `id_lp` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL,
  `id_album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lier_photos`
--

INSERT INTO `lier_photos` (`id_lp`, `id_photo`, `id_album`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 25, 1),
(4, 2, 2),
(5, 4, 2),
(10, 167, 1);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id_n` int(11) NOT NULL,
  `msgFor` int(11) NOT NULL,
  `msgFrom` int(11) NOT NULL,
  `message` text NOT NULL,
  `type_n` varchar(255) NOT NULL,
  `date_notif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `viewed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `notifications`
--

INSERT INTO `notifications` (`id_n`, `msgFor`, `msgFrom`, `message`, `type_n`, `date_notif`, `viewed`) VALUES
(1, 1, 0, 'bbbbbbb', '', '2017-05-14 20:24:46', 1),
(2, 1, 0, 'aaaaaaa', '', '2017-05-14 20:24:46', 1),
(3, 1, 0, 'pazepoaze', '', '2017-05-14 20:56:29', 1),
(7, 1, 3, '<b>Cheikhou Dansokho</b> vous a ajouté ! Confirmez la demande d\'amis ? &nbsp; <button id=\"acceptFriendRequest\" data-msgFrom=\"3\" class=\"btn btn-success\">Oui</button> &nbsp;  <button id=\"denyFriendRequest\" data-msgFrom=\"3\" class=\"btn btn-danger\">Non</button>', 'friends', '2017-05-14 22:03:47', 1),
(8, 3, 1, '<i class=\"fa fa-check\" style=\"color: green\"> Amis</i> <a href=\'/Social/profil/1\'><b>Baptiste Vasseur</b></a> a confirmé votre demande d\'amis !', 'confirmFriends', '2017-05-14 22:10:46', 1),
(9, 4, 1, '<b>Baptiste Vasseur</b> vous a ajouté ! Confirmez la demande d\'amis ? &nbsp; <button id=\"acceptFriendRequest\" data-msgFrom=\"1\" class=\"btn btn-success\">Oui</button> &nbsp;  <button id=\"denyFriendRequest\" data-msgFrom=\"1\" class=\"btn btn-danger\">Non</button>', 'friends', '2017-05-14 22:33:28', 1),
(10, 1, 4, '<i class=\"fa fa-check\" style=\"color: green\"> Amis</i> <a href=\'/Social/profil/4\'><b>Théo Huchard</b></a> a confirmé votre demande d\'amis !', 'confirmFriends', '2017-05-14 22:33:52', 0),
(11, 4, 1, '<b>Baptiste Vasseur</b> vous a ajouté ! Confirmez la demande d\'amis ? &nbsp; <button id=\"acceptFriendRequest\" data-msgFrom=\"1\" class=\"btn btn-success\">Oui</button> &nbsp;  <button id=\"denyFriendRequest\" data-msgFrom=\"1\" class=\"btn btn-danger\">Non</button>', 'friends', '2017-05-15 12:24:35', 0);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int(11) NOT NULL,
  `nom_photo` varchar(255) NOT NULL,
  `id_u` int(11) NOT NULL,
  `date_publi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id_photo`, `nom_photo`, `id_u`, `date_publi`) VALUES
(1, 'photo 1', 1, '2017-05-10 17:39:39'),
(2, 'photo 2', 1, '2017-05-10 17:40:04'),
(3, 'photo 3', 1, '2017-05-10 17:40:04'),
(4, 'photo 4', 1, '2017-05-10 17:40:04'),
(5, 'photo 5', 1, '2017-05-10 17:40:04'),
(6, 'photo 6', 1, '2017-05-10 17:40:04'),
(7, 'photo 7', 1, '2017-05-10 17:40:04'),
(8, 'photo 8', 1, '2017-05-10 17:40:04'),
(9, 'photo 9', 1, '2017-05-10 17:40:04'),
(10, 'photo 10', 1, '2017-05-10 17:40:04'),
(11, 'photo 11', 1, '2017-05-10 17:40:04'),
(12, 'photo 12', 1, '2017-05-10 17:40:04'),
(13, 'photo 13', 1, '2017-05-10 17:40:04'),
(14, 'photo 14', 1, '2017-05-10 17:40:04'),
(15, 'photo 15', 1, '2017-05-10 17:40:04'),
(16, 'photo 16', 1, '2017-05-10 17:40:04'),
(17, 'photo 17', 1, '2017-05-10 17:40:04'),
(18, 'photo 18', 1, '2017-05-10 17:40:26'),
(19, 'photo 19', 1, '2017-05-10 17:40:26'),
(20, 'photo 20', 1, '2017-05-10 17:40:26'),
(21, 'photo 21', 1, '2017-05-10 17:40:26'),
(22, 'photo 22', 1, '2017-05-10 17:40:26'),
(23, 'photo 23', 1, '2017-05-10 17:40:26'),
(24, 'photo 24', 1, '2017-05-10 17:40:26'),
(25, 'photo 25', 1, '2017-05-10 17:40:26'),
(26, 'photo 26', 1, '2017-05-10 17:40:26'),
(27, 'photo 27', 1, '2017-05-10 17:40:26'),
(28, 'photo 28', 1, '2017-05-10 17:40:26'),
(29, 'photo 29', 1, '2017-05-10 17:40:26'),
(34, 'photo 1', 2, '2017-05-10 18:20:17'),
(35, 'photo 2', 2, '2017-05-10 18:20:17'),
(36, 'photo 3', 2, '2017-05-10 18:20:26'),
(153, 'Ville de nuit', 1, '2017-05-14 19:24:38'),
(166, 'CCCCC', 1, '2017-05-14 22:58:24'),
(167, 'lorempixel', 1, '2017-05-15 14:42:56');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id_p` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `date_p` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `private` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id_p`, `author`, `message`, `date_p`, `private`) VALUES
(1, 1, '<img class=\"img-responsive pad\" src=\"/Social/images/photos/3.jpg\" alt=\"Photo\">\nI took this photo this morning. What do you guys think??', '2017-05-05 12:16:09', 0),
(2, 3, '<p>Far far away, behind the word mountains, far from the\n                      countries Vokalia and Consonantia, there live the blind\n                      texts. Separated they live in Bookmarksgrove right at</p>\n\n                      <p>the coast of the Semantics, a large language ocean.\n                      A small river named Duden flows by their place and supplies\n                      it with the necessary regelialia. It is a paradisematic\n                      country, in which roasted parts of sentences fly into\n                      your mouth.</p>\n\n                      <div class=\"attachment-block clearfix\">\n                        <img class=\"attachment-img\" src=\"images/Photos/2.jpg\" alt=\"Attachment Image\">\n                        <div class=\"attachment-pushed\">\n                        <h4 class=\"attachment-heading\"><a href=\"http://www.bootdey.com/\">Lorem ipsum text generator</a></h4>\n                        <div class=\"attachment-text\">\n                        Description about the attachment can be placed here.\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href=\"#\">more</a>\n                        </div>\n                        </div></div>', '2017-05-02 12:16:09', 0),
(3, 4, 'Aime et je publie :D', '2017-05-07 17:07:55', 0),
(5, 1, 'Bonjour :)', '2017-05-07 22:27:33', 0),
(10, 1, 'C\'est Génial :D <img class=\"img-responsive pad\" src=\"/Social/images/Photos/1/167.jpg\" alt=\"Photo\">', '2017-05-15 14:42:56', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `contenu` longtext NOT NULL,
  `date_reponse` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_posts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reponses`
--

INSERT INTO `reponses` (`id`, `author`, `contenu`, `date_reponse`, `id_posts`) VALUES
(1, 2, 'M1 : It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2017-05-03 04:30:29', 1),
(2, 1, 'M2 : It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2017-05-05 12:20:10', 1),
(3, 2, 'M1 : It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2017-05-17 23:04:16', 2),
(4, 1, 'M2 : It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2017-05-17 08:45:27', 2),
(5, 3, 'MDRRRRR :)', '2017-05-07 16:30:50', 1),
(6, 1, 'Lourdingue :like:', '2017-05-07 16:31:48', 2),
(7, 1, ':fuck:', '2017-05-07 16:38:21', 2),
(12, 1, 'mdrrr', '2017-05-07 16:50:24', 2),
(17, 4, 'Aurevoir :sad:', '2017-05-07 22:29:09', 5),
(24, 2, 'MDRRRR x)', '2017-05-15 20:04:20', 10),
(29, 3, 'lolololol ;)', '2017-05-15 20:11:01', 10);

-- --------------------------------------------------------

--
-- Structure de la table `tchat_conv`
--

CREATE TABLE `tchat_conv` (
  `id_conv` int(11) NOT NULL,
  `nom_conv` varchar(255) NOT NULL,
  `id_users_creator` int(11) NOT NULL,
  `id_users_conv` longtext NOT NULL,
  `id_users_view` longtext NOT NULL,
  `date_last_msg` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `tchat_conv`
--

INSERT INTO `tchat_conv` (`id_conv`, `nom_conv`, `id_users_creator`, `id_users_conv`, `id_users_view`, `date_last_msg`) VALUES
(1, 'Théo Huchard - Baptiste Vasseur - ', 4, 'user-4,user-1,', 'user-1,', '2017-05-07 17:18:55'),
(2, 'Cheikhou Dansokho - Baptiste Vasseur - ', 1, 'user-1,user-3,', 'user-1,user-3,', '2017-03-22 09:40:49'),
(3, 'Maha Amar - Baptiste Vasseur - ', 1, 'user-2,', 'user-1,', '2017-04-01 12:06:46'),
(5, 'Théo Huchard - Alex Buy - ', 5, 'user-5,user-4,', 'user-1,', '2017-03-19 16:57:39'),
(6, 'Baptiste Vasseur - Alex Buy - ', 1, 'user-1,user-5,', 'user-1,', '2017-04-05 09:40:26'),
(11, 'Baptiste Vasseur - Théo Huchard - Maha Amar - ', 1, 'user-1,user-4,user-2,', 'user-1,', '2017-05-07 17:18:28'),
(12, 'Baptiste Vasseur - Alex Buy - Maha Amar - Cheikhou Dansokho - ', 1, 'user-5,user-2,user-3', 'user-1,', '2017-05-05 11:55:27'),
(13, 'Baptiste Vasseur - Maha Amar - ', 1, 'user-1,user-2,', 'user-1,', '2017-05-09 10:45:26');

-- --------------------------------------------------------

--
-- Structure de la table `tchat_msg`
--

CREATE TABLE `tchat_msg` (
  `id_msg` int(11) NOT NULL,
  `id_conv` int(11) NOT NULL,
  `date_msg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_author` int(11) NOT NULL,
  `contenu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tchat_msg`
--

INSERT INTO `tchat_msg` (`id_msg`, `id_conv`, `date_msg`, `id_author`, `contenu`) VALUES
(1, 1, '2017-03-18 21:16:05', 4, 'Bienvenue chez AutoWheel Baptiste ! :)'),
(2, 1, '2017-03-18 21:16:18', 1, 'Merci Je vais enfin pouvoir passe mon permis ^^ :D'),
(3, 1, '2017-03-18 21:18:16', 4, 'Et oui, le permis, c\'est un grand pas dans la vie ^^, interresé par la conduite accompagnée ?'),
(4, 1, '2017-03-18 21:18:27', 1, 'Ouaip, je vais venir a l\'agence cette aprés midi, faire ma premiére séance de code ^^'),
(5, 1, '2017-03-19 09:16:05', 4, 'Ah c\'est cool ça ! Tu va voir au début ça va être compliqué mais tu va t\'améliorer.'),
(6, 1, '2017-03-19 09:16:05', 1, 'Je sais quand j\'ai fait une séance sur le site, j\'ai fait 23/40 :\'D'),
(15, 2, '2017-03-19 09:16:05', 3, 'Bonjour, je suis votre Moniteur Permis B'),
(16, 3, '2017-03-18 09:16:05', 2, 'Bonjour, je suis votre Monitrice Permis A'),
(17, 1, '2017-03-19 12:13:43', 1, 'Ah ! Je vient de faire 35/40 x)'),
(22, 1, '2017-03-19 14:19:54', 4, ':like:'),
(23, 1, '2017-03-19 14:38:09', 1, 'Je pense :pense: que dans 2-3 semaines je serai incollable'),
(25, 3, '2017-03-19 14:47:38', 1, 'Bonjour :)'),
(26, 2, '2017-03-19 14:52:12', 1, 'Salut :yo:'),
(29, 5, '2017-03-19 16:57:13', 5, 'Salut toi :like:'),
(30, 5, '2017-03-19 16:57:39', 4, 'Wsh :caca:'),
(31, 6, '2017-03-19 17:12:27', 1, 'Salut toi :D'),
(32, 6, '2017-03-19 17:12:36', 1, 'ça va ? :bave:'),
(34, 6, '2017-03-19 17:13:24', 5, 'Ouai tranquillou et toi x) ?'),
(35, 6, '2017-03-19 17:45:26', 1, 'T\'es la ? :pense:'),
(38, 6, '2017-03-19 17:49:18', 5, 'Ouai :fuck:'),
(52, 1, '2017-03-20 08:07:13', 1, ':pense:'),
(64, 2, '2017-03-22 09:40:49', 1, 'pa'),
(65, 6, '2017-03-22 09:43:19', 1, ':love:'),
(72, 1, '2017-03-22 15:40:57', 4, 'ae'),
(75, 3, '2017-04-01 11:49:17', 2, 'slt'),
(76, 3, '2017-04-01 11:50:37', 2, 'slt'),
(77, 3, '2017-04-01 12:06:46', 1, 'slt toi :)'),
(91, 1, '2017-04-05 09:39:57', 1, ':)'),
(93, 1, '2017-04-05 09:40:11', 1, ':like:'),
(113, 1, '2017-05-04 09:18:47', 1, ' x)  x) '),
(114, 1, '2017-05-04 20:49:50', 1, '<b style=\"color:blue\">Baptiste Vasseur</b> à quitter cette conversation !<br><i>Il ne recevra aucun messages envoyés dans cette conversation :( </i><br><u>Créez s\'en une nouvelle !</u>'),
(116, 9, '2017-05-05 09:59:06', 1, 'Bonjour'),
(118, 11, '2017-05-05 10:04:16', 1, '<span style=\"color:red\">Baptiste Vasseur à créer la conversation !</span>'),
(119, 12, '2017-05-05 11:55:27', 1, '<span>Baptiste Vasseur à créer la conversation !</span>'),
(120, 12, '2017-05-05 11:55:37', 1, '<b style=\'color:blue;\'>Baptiste Vasseur</b> à quitter cette conversation !<br><i>Il ne recevra plus aucun messages envoyés dans cette conversation :( </i><br><u>Créez s\'en une nouvelle !</u>'),
(121, 11, '2017-05-07 17:18:28', 1, 'Bonjour :D'),
(122, 1, '2017-05-07 17:18:55', 1, 'I\'m Here ! ^^'),
(124, 3, '2017-05-09 10:00:07', 1, '<b style=\'color:blue;\'>Baptiste Vasseur</b> à quitter cette conversation !<br><i>Il ne recevra plus aucun messages envoyés dans cette conversation :( </i><br><u>Créez s\'en une nouvelle !</u>'),
(125, 13, '2017-05-09 10:03:12', 1, '<span>Baptiste Vasseur à créer la conversation !</span>'),
(126, 13, '2017-05-09 10:04:21', 1, ':D'),
(127, 13, '2017-05-09 10:04:21', 2, ':p'),
(128, 13, '2017-05-09 10:06:16', 1, ' :pleure: '),
(129, 13, '2017-05-09 10:45:26', 1, ' :bave: ');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_u` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `job` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_u`, `nom`, `email`, `mdp`, `dob`, `job`, `gender`, `adresse`, `phone`, `url`, `description`) VALUES
(1, 'Baptiste Vasseur', 'admin@admin.admin', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', '1998-05-22', 'Développeur', 'Homme', '32 B rue de sigy, 77520 Donnemarie-dontilly', '07.86.87.52.46', 'http://b-v.ddns.net', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.'),
(2, 'Maha Amar', 'maha@maha.maha', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', '1998-02-18', 'Etudiante', 'Femme', '132 Avenue de la poule rouge, 92001 Levallois', '01.23.45.67.89', 'http://www.google.fr', 'Aucune description !'),
(3, 'Cheikhou Dansokho', 'serou@serou.serou', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', '1996-04-10', 'Livreur de Pizza', 'Homme', '132 Rue des poissonniers, 75018 Paris', '11.22.33.44.55', 'http://apple.com/fr/', 'Aucune description !'),
(4, 'Théo Huchard', 'theo@theo.theo', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', '1999-12-31', 'Centre d\'appel', 'Indeterminé', '11 Rue de l\'allée, 75011 Paris', '41.23.16.74.12', 'http://youtube.com', 'Aucune description !'),
(5, 'Alex Buy', 'alex@alex.alex', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', '1999-05-14', 'Technicien', 'Homme', '999 Rue du X, 97477 YouP', '19.28.37.46.55', 'http://azerty.uiop', 'Aucune description !'),
(6, 'Moni Chuon', 'moni@moni.moni', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', '1999-03-04', 'Main d\'oeuvre', 'Homme', '13 Rue mongalet', '12.00.32.42.01', 'http://fb.com', 'Lorem Ipsum'),
(7, 'Luc Levéque', 'luc@luc.luc', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', '1990-01-08', 'Ingénieur', 'Homme', '113 Rue malet', '12.00.32.42.01', 'http://fb.com', 'Lorem Ipsum'),
(8, 'Marko Stefanovic', 'marko@marko.marko', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', '1998-05-27', 'Trafiquant', 'Homme', '40 Avenue Poutine', '12.00.32.42.01', 'http://fb.com', 'Lorem Ipsum'),
(9, 'Rohid Badouraly', 'rohid@rohid.rohid', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', '1989-03-12', 'Coupeur Pro', 'Homme', '74 Blvrd Banania', '12.00.32.42.01', 'http://fb.com', 'Lorem Ipsum'),
(10, 'Eddy Malou', 'eddy@eddy.eddy', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', '1111-11-11', 'Scientifique', 'Masculin', '10 Rue de l\'industrie', '11,22,33,44,55', 'http://edml.congo', 'C\'est la congolexicomatisation des lois du marché au congo');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id_album`);

--
-- Index pour la table `emojis`
--
ALTER TABLE `emojis`
  ADD PRIMARY KEY (`id_emoji`);

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id_f`);

--
-- Index pour la table `lier_photos`
--
ALTER TABLE `lier_photos`
  ADD PRIMARY KEY (`id_lp`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_n`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_p`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tchat_conv`
--
ALTER TABLE `tchat_conv`
  ADD PRIMARY KEY (`id_conv`);

--
-- Index pour la table `tchat_msg`
--
ALTER TABLE `tchat_msg`
  ADD PRIMARY KEY (`id_msg`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `albums`
--
ALTER TABLE `albums`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `emojis`
--
ALTER TABLE `emojis`
  MODIFY `id_emoji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `friends`
--
ALTER TABLE `friends`
  MODIFY `id_f` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `lier_photos`
--
ALTER TABLE `lier_photos`
  MODIFY `id_lp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `tchat_conv`
--
ALTER TABLE `tchat_conv`
  MODIFY `id_conv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `tchat_msg`
--
ALTER TABLE `tchat_msg`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
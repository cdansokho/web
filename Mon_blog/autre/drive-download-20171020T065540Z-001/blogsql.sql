-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2017 at 04:21 PM
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
  `imgcouv` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `c1` text NOT NULL,
  `c2` text NOT NULL,
  `c3` text NOT NULL,
  `presentation` text NOT NULL,
  `role` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `datep` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `auteur`, `imgcouv`, `contenu`, `c1`, `c2`, `c3`, `presentation`, `role`, `image`, `image2`, `datep`) VALUES
(1, 'Eclaireur', 'Le beau gosse', 'image/test2.jpg', 'Du niveau 1 au niveau 9, l\'Eclaireur est une classe de corps à corps (hé oui...). \r\nVous apprendrez diverses techniques comme le camouflage, l\'ambidextrie, ou la frappe dans le dos. \r\nL\'éclaireur peut faire cavalier seul jusqu\'au niveau 10, à condition de faire quelques pauses salvatrices entre chaque adversaire. \r\nUne fois devenu un Daeva, vous devrez choisir entre Rôdeur et Assassin. \r\nLe premier vous donnera accès aux compétences de tir à l\'arc et aux pièges tandis que le second continuera sa spécialisation des armes ambidextres et des attaques fourbes, tout en y rajoutant la possibilité d\'empoisonner ses armes. \r\nL\'un comme l\'autre occasionnent beaucoup de dégâts mais restent très fragiles au corps à corps. \r\nLa gestion des déplacements est un aspect du jeu qu\'il faudra maîtriser.\r\n', 'Le Rôdeur est souvent synonyme d\'arc et de flèches dans les MMORPGs. Alors, Aion reste-t-il fidèle à la tradition ? Sans équivoque, on peut dire que oui. Si le Rôdeur n\'est pas la seule classe à pouvoir tirer à l\'arc, c\'est néanmoins la seule à posséder les compétences qui vont avec. Pour autant, le Rôdeur est-il cantonné à cette arme, ou bien peut-il faire ses preuves dans d\'autres domaines ?\r\n', 'Il reste évident que la classe de rôdeur a été conçue pour l\'arc : les compétences sont assez diverses et permettent un gameplay assez attirant sur le papier, et pouvant s\'adapter à n\'importe quelle situation. Voyez plutôt : déluge de flèches, poison, immobilisations, ralentissements, aphonie, endormissement... Toute la panoplie y est. Si l\'arc ne vous tente pas, il vous restera les épées et les dagues, avec la possibilité de jouer en ambidextrie. Vous ne serez pas aussi efficace qu\'un Assassin à ce jeu-là, mais vous aurez quand même quelques compétences pour gérer le corps à corps. Gardez tout de même à l\'esprit que le Rôdeur n\'est clairement pas constitué pour cela : votre armure de cuir ne sera pas d\'une très grande utilité face à un Gladiateur lourdement armé.\r\n', 'Mais le gameplay du Rôdeur ne se résume pas à un arc et des flèches. Cette classe possède deux autres atouts de charme exclusifs : les pièges et les transformations (ces dernières sont partagées avec l\'Assassin). Les premiers vous permettront de piéger un terrain avant d\'y attirer vos ennemis afin de les aveugler, les immobiliser, les ralentir, voire même dans certains cas les massacrer. Si, si... \r\nLes transformations, quant à elles, vous permettront de vous mettre dans la peau de diverses bestioles animales ou humanoïdes même parfois (espérons que vous aimez les félins en tout cas...).\r\nBien que tout cela soit très alléchant, il vous faut néanmoins conserver à l\'esprit que tout cela se paye : flèches pour l\'arc, ingrédients pour les pièges et les transformations... Vous aurez un pouvoir d\'achat légèrement inférieur aux autres classes. Mais bon, quand on aime, on ne compte pas, n\'est-ce pas ?\r\n', 'Presentation du Rodeur', 'Rôle : DPS à distance, pièges et transformations\r\n', 'image/rod.jpg', 'image/rod2.jpg', '2017-01-25 00:00:00'),
(2, 'Eclaireur', 'Le beau gosse', 'image/test2.jpg', 'Du niveau 1 au niveau 9, l\'Eclaireur est une classe de corps à corps (hé oui...). \r\nVous apprendrez diverses techniques comme le camouflage, l\'ambidextrie, ou la frappe dans le dos. \r\nL\'éclaireur peut faire cavalier seul jusqu\'au niveau 10, à condition de faire quelques pauses salvatrices entre chaque adversaire. \r\nUne fois devenu un Daeva, vous devrez choisir entre Rôdeur et Assassin. \r\nLe premier vous donnera accès aux compétences de tir à l\'arc et aux pièges tandis que le second continuera sa spécialisation des armes ambidextres et des attaques fourbes, tout en y rajoutant la possibilité d\'empoisonner ses armes. \r\nL\'un comme l\'autre occasionnent beaucoup de dégâts mais restent très fragiles au corps à corps. \r\nLa gestion des déplacements est un aspect du jeu qu\'il faudra maîtriser.\r\n', 'Le Rôdeur est souvent synonyme d\'arc et de flèches dans les MMORPGs. Alors, Aion reste-t-il fidèle à la tradition ? Sans équivoque, on peut dire que oui. Si le Rôdeur n\'est pas la seule classe à pouvoir tirer à l\'arc, c\'est néanmoins la seule à posséder les compétences qui vont avec. Pour autant, le Rôdeur est-il cantonné à cette arme, ou bien peut-il faire ses preuves dans d\'autres domaines ?\r\n', 'Il reste évident que la classe de rôdeur a été conçue pour l\'arc : les compétences sont assez diverses et permettent un gameplay assez attirant sur le papier, et pouvant s\'adapter à n\'importe quelle situation. Voyez plutôt : déluge de flèches, poison, immobilisations, ralentissements, aphonie, endormissement... Toute la panoplie y est. Si l\'arc ne vous tente pas, il vous restera les épées et les dagues, avec la possibilité de jouer en ambidextrie. Vous ne serez pas aussi efficace qu\'un Assassin à ce jeu-là, mais vous aurez quand même quelques compétences pour gérer le corps à corps. Gardez tout de même à l\'esprit que le Rôdeur n\'est clairement pas constitué pour cela : votre armure de cuir ne sera pas d\'une très grande utilité face à un Gladiateur lourdement armé.\r\n', 'Mais le gameplay du Rôdeur ne se résume pas à un arc et des flèches. Cette classe possède deux autres atouts de charme exclusifs : les pièges et les transformations (ces dernières sont partagées avec l\'Assassin). Les premiers vous permettront de piéger un terrain avant d\'y attirer vos ennemis afin de les aveugler, les immobiliser, les ralentir, voire même dans certains cas les massacrer. Si, si... \r\nLes transformations, quant à elles, vous permettront de vous mettre dans la peau de diverses bestioles animales ou humanoïdes même parfois (espérons que vous aimez les félins en tout cas...).\r\nBien que tout cela soit très alléchant, il vous faut néanmoins conserver à l\'esprit que tout cela se paye : flèches pour l\'arc, ingrédients pour les pièges et les transformations... Vous aurez un pouvoir d\'achat légèrement inférieur aux autres classes. Mais bon, quand on aime, on ne compte pas, n\'est-ce pas ?\r\n', 'Presentation du Rodeur', 'Rôle : DPS à distance, pièges et transformations\r\n', 'image/rod.jpg', 'image/rod2.jpg', '2017-01-25 00:00:00'),
(3, 'Eclaireur', 'Le beau gosse', 'image/test2.jpg', 'Du niveau 1 au niveau 9, l\'Eclaireur est une classe de corps à corps (hé oui...). \r\nVous apprendrez diverses techniques comme le camouflage, l\'ambidextrie, ou la frappe dans le dos. \r\nL\'éclaireur peut faire cavalier seul jusqu\'au niveau 10, à condition de faire quelques pauses salvatrices entre chaque adversaire. \r\nUne fois devenu un Daeva, vous devrez choisir entre Rôdeur et Assassin. \r\nLe premier vous donnera accès aux compétences de tir à l\'arc et aux pièges tandis que le second continuera sa spécialisation des armes ambidextres et des attaques fourbes, tout en y rajoutant la possibilité d\'empoisonner ses armes. \r\nL\'un comme l\'autre occasionnent beaucoup de dégâts mais restent très fragiles au corps à corps. \r\nLa gestion des déplacements est un aspect du jeu qu\'il faudra maîtriser.\r\n', 'Le Rôdeur est souvent synonyme d\'arc et de flèches dans les MMORPGs. Alors, Aion reste-t-il fidèle à la tradition ? Sans équivoque, on peut dire que oui. Si le Rôdeur n\'est pas la seule classe à pouvoir tirer à l\'arc, c\'est néanmoins la seule à posséder les compétences qui vont avec. Pour autant, le Rôdeur est-il cantonné à cette arme, ou bien peut-il faire ses preuves dans d\'autres domaines ?\r\n', 'Il reste évident que la classe de rôdeur a été conçue pour l\'arc : les compétences sont assez diverses et permettent un gameplay assez attirant sur le papier, et pouvant s\'adapter à n\'importe quelle situation. Voyez plutôt : déluge de flèches, poison, immobilisations, ralentissements, aphonie, endormissement... Toute la panoplie y est. Si l\'arc ne vous tente pas, il vous restera les épées et les dagues, avec la possibilité de jouer en ambidextrie. Vous ne serez pas aussi efficace qu\'un Assassin à ce jeu-là, mais vous aurez quand même quelques compétences pour gérer le corps à corps. Gardez tout de même à l\'esprit que le Rôdeur n\'est clairement pas constitué pour cela : votre armure de cuir ne sera pas d\'une très grande utilité face à un Gladiateur lourdement armé.\r\n', 'Mais le gameplay du Rôdeur ne se résume pas à un arc et des flèches. Cette classe possède deux autres atouts de charme exclusifs : les pièges et les transformations (ces dernières sont partagées avec l\'Assassin). Les premiers vous permettront de piéger un terrain avant d\'y attirer vos ennemis afin de les aveugler, les immobiliser, les ralentir, voire même dans certains cas les massacrer. Si, si... \r\nLes transformations, quant à elles, vous permettront de vous mettre dans la peau de diverses bestioles animales ou humanoïdes même parfois (espérons que vous aimez les félins en tout cas...).\r\nBien que tout cela soit très alléchant, il vous faut néanmoins conserver à l\'esprit que tout cela se paye : flèches pour l\'arc, ingrédients pour les pièges et les transformations... Vous aurez un pouvoir d\'achat légèrement inférieur aux autres classes. Mais bon, quand on aime, on ne compte pas, n\'est-ce pas ?\r\n', 'Presentation du Rodeur', 'Rôle : DPS à distance, pièges et transformations\r\n', 'image/rod.jpg', 'image/rod2.jpg', '2017-01-25 00:00:00');

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
(907, 'ccc', 'ok sa marche', 8, '2017-01-23 09:47:55');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=908;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
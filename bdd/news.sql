-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 30 mars 2020 à 20:19
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `POO_PERSO`
--

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL DEFAULT '0',
  `author` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `addDate` datetime NOT NULL,
  `editDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `userId`, `author`, `title`, `content`, `addDate`, `editDate`) VALUES
(7, 0, 'Jean Forteroche', 'Chapitre 1 - Quand le rêve devient réalité', '<p><span style=\"caret-color: #212529; color: #212529; font-family: Lato; font-size: 18.66666603088379px; background-color: #ffffff;\">Cette ville, Anchorage, de plus de trois cent mille habitants ressemble, d&rsquo;apr&egrave;s elle, plus &agrave; une ville canadienne, avec des espaces verts, la mer d&rsquo;un c&ocirc;t&eacute; et la montagne de l&rsquo;autre, qu&rsquo;aux grandes m&eacute;tropoles des &Eacute;tats-Unis avec leurs immenses buildings. La plupart des habitants p&ecirc;chent leur propre poisson dans les rivi&egrave;res au printemps et en &eacute;t&eacute;, et profitent de la saison ensoleill&eacute;e pour faire de la randonn&eacute;e. La station de ski situ&eacute;e &agrave; une heure de route de la ville leur permet de pratiquer &eacute;galement les sports d&rsquo;hiver. C&rsquo;est dans ce cadre naturel que Marion, bien souvent, occupait ses apr&egrave;s-midi et ses week-ends, entre promenades, photographie et visites avec sa famille. La situation g&eacute;ographique de cet &eacute;tat le soumet &agrave; des diff&eacute;rences d&rsquo;ensoleillement extr&ecirc;mes selon la saison. En hiver, il fait nuit tr&egrave;s t&ocirc;t. Marion se souvient s&rsquo;&ecirc;tre retrouv&eacute;e pr&ecirc;te &agrave; aller se coucher avant de r&eacute;aliser qu&rsquo;il &eacute;tait&hellip; 16 heures 30! En revanche, durant l&rsquo;&eacute;t&eacute;, il ne fait jamais vraiment nuit, ce qui favorise les activit&eacute;s ext&eacute;rieures. L&rsquo;hiver, au contraire, permet aux habitants de cette r&eacute;gion de se concentrer sur des activit&eacute;s d&rsquo;int&eacute;rieur telles que le th&eacute;&acirc;tre, le cin&eacute;ma ou tout simplement une soir&eacute;e en famille &agrave; la maison.</span></p>', '2020-03-17 15:13:59', '2020-03-24 19:55:49'),
(8, 0, 'Jean Forteroche', 'Chapitre 2 - Découverte de l\'Alaska', '<p><span style=\"font-size: 14pt; caret-color: #212529; color: #212529; font-family: Lato; background-color: #ffffff;\">Cette ville, Anchorage, de plus de trois cent mille habitants ressemble, d&rsquo;apr&egrave;s elle, plus &agrave; une ville canadienne, avec des espaces verts, la mer d&rsquo;un c&ocirc;t&eacute; et la montagne de l&rsquo;autre, qu&rsquo;aux grandes m&eacute;tropoles des &Eacute;tats-Unis avec leurs immenses buildings. La plupart des habitants p&ecirc;chent leur propre poisson dans les rivi&egrave;res au printemps et en &eacute;t&eacute;, et profitent de la saison ensoleill&eacute;e pour faire de la randonn&eacute;e. La station de ski situ&eacute;e &agrave; une heure de route de la ville leur permet de pratiquer &eacute;galement les sports d&rsquo;hiver. C&rsquo;est dans ce cadre naturel que Marion, bien souvent, occupait ses apr&egrave;s-midi et ses week-ends, entre promenades, photographie et visites avec sa famille. La situation g&eacute;ographique de cet &eacute;tat le soumet &agrave; des diff&eacute;rences d&rsquo;ensoleillement extr&ecirc;mes selon la saison. En hiver, il fait nuit tr&egrave;s t&ocirc;t. Marion se souvient s&rsquo;&ecirc;tre retrouv&eacute;e pr&ecirc;te &agrave; aller se coucher avant de r&eacute;aliser qu&rsquo;il &eacute;tait&hellip; 16 heures 30! En revanche, durant l&rsquo;&eacute;t&eacute;, il ne fait jamais vraiment nuit, ce qui favorise les activit&eacute;s ext&eacute;rieures. L&rsquo;hiver, au contraire, permet aux habitants de cette r&eacute;gion de se concentrer sur des activit&eacute;s d&rsquo;int&eacute;rieur telles que le th&eacute;&acirc;tre, le cin&eacute;ma ou tout simplement une soir&eacute;e en famille &agrave; la maison.</span></p>', '2020-03-19 02:32:43', '2020-03-19 20:08:52'),
(9, 0, 'Jean Forteroche', 'Chapitre 3 - Les études en Alaska', '<p><span style=\"font-size: 14pt; caret-color: #212529; color: #212529; font-family: Lato; background-color: #ffffff;\">Le lyc&eacute;e &eacute;tait l&agrave; pour rappeler &agrave; Marion qu&rsquo;elle se trouvait bien aux &Eacute;tats-Unis: les casiers, les &eacute;l&egrave;ves qui s&rsquo;habillent aux couleurs du lyc&eacute;e, les grands matchs, les bals&hellip; Toutes ces choses qui, finalement, n&rsquo;existent pas qu&rsquo;&agrave; la t&eacute;l&eacute;! Elle a tout de suite &eacute;t&eacute; int&eacute;gr&eacute;e. Arriv&eacute;e lors de la &laquo;Semaine de d&eacute;couvertes d&rsquo;autres cultures&raquo;, elle a imm&eacute;diatement &eacute;t&eacute; identifi&eacute;e en tant que &laquo;La Fran&ccedil;aise&raquo;. Elle a pu choisir des cours aussi vari&eacute;s qu&rsquo;int&eacute;ressants : photographie, sciences criminelles, percussions&hellip; Elle a m&ecirc;me &eacute;t&eacute; &laquo;Assistante de fran&ccedil;ais&raquo;! Le soutien des professeurs, l&rsquo;ambiance g&eacute;n&eacute;rale, ou encore la possibilit&eacute; de choisir des cours en fonction de ses int&eacute;r&ecirc;ts rendent le lyc&eacute;e l&agrave;-bas plus attractif : &laquo;Je m&rsquo;amusais, j&rsquo;avais vraiment envie d&rsquo;aller &agrave; l&rsquo;&eacute;cole.&raquo; Son int&eacute;gration au sein de sa famille d&rsquo;accueil s&rsquo;est tr&egrave;s bien d&eacute;roul&eacute;e. D&egrave;s le lendemain de son arriv&eacute;e, Marion a &eacute;t&eacute; pr&eacute;sent&eacute;e &agrave; tous les amis de la famille. Que de noms &agrave; retenir! Mais ce qui lui a fait le plus plaisir, c&rsquo;est qu&rsquo;&laquo;ils ne [la] pr&eacute;sentaient pas comme Marion, l&rsquo;&eacute;tudiante d&rsquo;&eacute;change, mais comme Marion, leur troisi&egrave;me fille.&raquo; Si la langue a pu poser quelques petits probl&egrave;mes de compr&eacute;hension dans les d&eacute;buts, apr&egrave;s quelques mois, Marion pouvait comprendre parfaitement les gens, ou regarder des films sans les sous-titres. Elle se souvient du moment o&ugrave; elle en a pris conscience: &laquo;Dans mon cours d&rsquo;histoire des Etats-Unis, j&rsquo;&eacute;tais en train de parler avec quelqu&rsquo;un, et je me suis rendue compte que je comprenais ce que la prof disait alors que je ne l&rsquo;&eacute;coutais pas sp&eacute;cialement.&raquo; Quel bonheur! Le &laquo;Homesick&raquo;, Marion ne l&rsquo;a pas vraiment connu. L&rsquo;excitation de cette nouvelle aventure et son int&eacute;gration imm&eacute;diate au sein de la famille et du lyc&eacute;e y ont beaucoup contribu&eacute;. Elle se rappelle cependant avoir f&ecirc;t&eacute; ses 18 ans, au moment de No&euml;l, au Texas, dans une famille de quarante personnes dont elle ne connaissait vraiment que quatre membres&hellip; &laquo;C&rsquo;&eacute;tait un peu le coup dur, mais apr&egrave;s que je sois remont&eacute;e en Alaska au mois de janvier, c&rsquo;&eacute;tait reparti.&raquo; Au fil de l&rsquo;ann&eacute;e, les amiti&eacute;s tiss&eacute;es se sont renforc&eacute;es. Le petit groupe d&rsquo;&eacute;tudiants d&rsquo;&eacute;change qui s&rsquo;&eacute;tait constitu&eacute; en d&eacute;but d&rsquo;ann&eacute;e s&rsquo;est vite agrandi, avec les amis am&eacute;ricains que chacun apportait. Mais lorsque l&rsquo;&eacute;t&eacute; arrive, synonyme de fin des cours, les au revoir mettent les nerfs de chacun &agrave; rude &eacute;preuve. L&rsquo;envie de rentrer en France, de revoir sa famille et ses amis, se m&ecirc;le &agrave; celle de rester, de ne pas voir partir ses amis pour les quatre coins du monde et de ne pas quitter sa famille d&rsquo;accueil et tous les gens rencontr&eacute;s durant cette ann&eacute;e</span></p>', '2020-03-19 02:39:17', '2020-03-19 20:08:32'),
(10, 0, 'Jean Forteroche', 'Chapitre 4 - Expérience unique au coeur des glaciers', '<p><span style=\"font-size: 14pt; caret-color: #212529; color: #212529; font-family: Lato; background-color: #ffffff;\">Avec quelques amis, nous souhaitions d&eacute;couvrir les glaciers, une nouvelle exp&eacute;rience inoubliable s\'offrait &agrave; nous. Nous redescendons dans le sud de l&rsquo;ALASKA en empruntant la RICHARDSON HIGHWAY. Les paysages sont magnifiques&hellip;. Pas vraiment besoin de s&rsquo;arreter dans des points pr&eacute;cis. Sur la route, on d&eacute;couvre des lacs &agrave; moiti&eacute;s glac&eacute;s&hellip;et en plus il fait beau ! Nous reprenons la route vers 10 heures. La route n&rsquo;est fait que de chemin de terre et de graviers.. Et l&agrave; on se dit Vive les 4X4 ! Sans ce genre de v&eacute;hicule c&rsquo;est r&eacute;ellement difficilement praticable. Nous avons environs 3heures de route soit 100 miles pour se rendre &agrave; Mc Cathy. On croise seulement une station essence qui fait &eacute;galement petit h&ocirc;tel Laundry et douche ! &agrave; la bonheur ! A midi nous arrivons &agrave; proximit&eacute; d&rsquo;un centre d&rsquo;information juste avant l&rsquo;entr&eacute;e d&rsquo;un pont. Avant de nous rendre au KENNICOTT GLACIER, nous ne savions pas que la ville n&rsquo;&eacute;tait accessible qu&rsquo;&agrave; pieds ou en mini navette (la mini navette passe une fois toutes les heures) prix du ticket 5 $. La journ&eacute;e bien commenc&eacute;e nous d&eacute;cidons de visiter le village de Mc CATHY. c&rsquo;est comme-ci le temps c&rsquo;&eacute;tait arr&ecirc;t&eacute;. Tout est d&rsquo;&eacute;poque ! Il faut savoir qu&rsquo;il s&rsquo;agit d&rsquo;une ancienne ville mini&egrave;re de cuivre. Les Alaskiens mais plus particuli&egrave;rement les Am&eacute;ricians qui avaient flair&eacute; le potentiel de ce village ont pu extraire &eacute;norm&eacute;ment de cuivre pour la fabrication de la monnaie , des tuyauteries&hellip;. Le Parc National de &laquo; WRANGELL-St ELIAS &raquo; vaut apparemment plus que le d&eacute;tour&hellip; iIl est le plus grand des USA et regroupe 4 chaines de montagnes ! Ce parc est un peu moins fr&eacute;quent&eacute; que le DENALI NATIONAL PARK mais connu des tr&egrave;s grands alpinistes pour les glaciers. Il offre la possibilit&eacute; de dormir &agrave; seulement quelques m&egrave;tres du KENNICOTT Glacier. On peut s&rsquo;y rendre au plus pr&eacute;s avec des chaussures de randonn&eacute;es. En revanche, si l&rsquo;on d&eacute;cide de s&rsquo;aventurer sur la journ&eacute;e ou plus, il est vivement recommand&eacute; de r&eacute;server l&rsquo;excursion avec un guide.</span></p>', '2020-03-19 21:59:07', '2020-03-20 19:44:32');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

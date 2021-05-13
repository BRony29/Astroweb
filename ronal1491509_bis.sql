-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 25 jan. 2021 à 10:35
-- Version du serveur :  10.3.25-MariaDB-0+deb10u1
-- Version de PHP : 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `App`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(11) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `imagePath` varchar(64) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`id`, `titre`, `imagePath`, `date`, `commentaire`) VALUES
(1, 'MatÃ©riel: Les diffÃ©rentes montures de tÃ©lescopes', 'newactu04.png', '2020-11-13', 'Saviez-vous qu\'il existe deux type de monture pour les instruments astronomiques ?\r\nToutes les explications dont dans cet article.\r\n[url=/articles/consulter/1]Consulter cet article...[/url]'),
(2, 'Astronomie: Pourquoi les Ã©toiles changent dans le ciel dâ€™un mois sur lâ€™autre ?', 'newactu05.png', '2020-11-13', 'Aujourdâ€™hui, je vais expliquer ce principe. Tout dâ€™abord, il faut commencer par les bases de lâ€™astronomie.\r\nLa Terre tourne autour du Soleil en 365 jours un quart. Chaque mois est dÃ©fini par un signe zodiacal. Mais pourquoi ?.\r\n[url=/articles/consulter/2]Consulter cet article...[/url]'),
(3, 'Observations: PhÃ©nomÃ¨nes astronomiques - Mars 2020', 'newactu03.png', '2020-11-27', 'Retrouver dans cet article les Ã©phÃ©mÃ©rides pour le mois de mars 2020. Tous les phÃ©nomÃ¨nes remarquables du ciel Ã©toilÃ© du mois de mars.\r\n[url=/articles/consulter/3]Consulter cet article...[/url]'),
(4, 'Astronomie: Le SystÃ¨me Solaire 01 : Introduction', 'newactu02.png', '2020-11-27', 'Article d\'introduction d\'une sÃ©rie dÃ©diÃ©e au SystÃ¨me Solaire. Ces articles vous expliquerons sa composition, ainsi que comparer les distances entre les planÃ¨tes, les tailles des planÃ¨tes...\r\n[url=/articles/consulter/4]Consulter cet article...[/url]'),
(5, 'Astronomie: Le SystÃ¨me Solaire 02 : De quoi est composÃ© le systÃ¨me solaire ?', 'newactu02.png', '2020-11-27', 'Second article dÃ©diÃ© au SystÃ¨me Solaire et nous rentrons dans le vif du sujet, avec sa structure. Qu\'il a t\'il dans le SystÃ¨me Solaire ?.\r\n[url=/articles/consulter/5]Consulter cet article...[/url]'),
(6, 'Astronomie: Le SystÃ¨me Solaire 03 : Les planÃ¨tes telluriques, les planÃ¨tes gazeuses et les planÃ¨tes naines', 'newactu04.png', '2020-11-27', 'TroisiÃ¨me article de la sÃ©rie dÃ©diÃ© au SystÃ¨me Solaire, il vous Ã©clairera sur les diffÃ©rents types de planÃ¨tes prÃ©sentes autour de nous.\r\n[url=/articles/consulter/6]Consulter cet article...[/url]'),
(7, 'Astronomie: Les saisons', 'newactu09.png', '2020-12-01', 'Pourquoi existe-tâ€™il des saisons sur Terre ? Vous allez comprendre ce principe. La Terre dispose dâ€™un axe de rotation de 23.5Â°. Et cette derniÃ¨re tourne autour du Soleil en 365.25 jours. Câ€™est que lâ€™on appelle la RÃ©volution de la Terre.\r\n[url=/articles/consulter/7]Consulter cet article...[/url]'),
(8, 'Astronomie: Le SystÃ¨me Solaire 04 : Les distances', 'newactu08.png', '2020-12-01', 'Cet article traite des distances dans le SystÃ¨me Solaire. Les distances exprimÃ©es sont importantes, on parlera ici en millions voir en milliards de kilomÃ¨tres, ou en UA !.\r\n[url=/articles/consulter/8]Consulter cet article...[/url]'),
(9, 'Astronomie: Le SystÃ¨me Solaire 05 : Les tailles', 'newactu06.png', '2020-12-01', 'Cet article traite des tailles dans le SystÃ¨me Solaire. Elles sont trÃ¨s diverses et contrairement Ã  ce que l\'on pourrait penser, ce ne sont pas forcÃ©ment toutes les planÃ¨tes qui tiennent le haut du panier.\r\n[url=/articles/consulter/9]Consulter cet article...[/url]'),
(10, 'Astronomie: Le SystÃ¨me Solaire 06 : Les tempÃ©ratures', 'newactu06.png', '2020-12-01', 'Notre Ã©toile (Le Soleil), est notre source de chaleur. Grace Ã  lui, la vie est possible sur notre planÃ¨te. Mais comme tout bon moyen de chauffage, plus on sâ€™Ã©loigne de lui, plus la tempÃ©rature chute.\r\n[url=/articles/consulter/10]Consulter cet article...[/url]'),
(11, 'Astronomie: Le SystÃ¨me Solaire 07 : Les rÃ©volutions', 'newactu01.png', '2020-12-01', 'Chaque planÃ¨te dispose dâ€™une durÃ©e de rÃ©volution diffÃ©rentes, qui augmente avec la distance qui la sÃ©pare du Soleil.\r\n[url=/articles/consulter/11]Consulter cet article...[/url]'),
(12, 'Astronomie: Le SystÃ¨me Solaire 08 : Les axes de rotations.', 'newactu04.png', '2020-12-01', 'Chaque planÃ¨te du systÃ¨me solaire dispose dâ€™une axe de rotation, qui lui est propre.\r\n[url=/articles/consulter/12]Consulter cet article...[/url]'),
(13, 'Astronomie: Le SystÃ¨me Solaire 09 : OÃ¹ sommes-nous ?', 'newactu09.png', '2020-12-02', 'Le SystÃ¨me solaire Ã©volue dans lâ€™un des bras de notre galaxie spirale, la Voie lactÃ©e, Ã  quelque 26.000 annÃ©es-lumiÃ¨re de son centre.[br][url=/articles/consulter/13]Consultez cet article...[/url]'),
(14, 'MatÃ©riel: Les diffÃ©rents moyens dâ€™observation et les types de tÃ©lescopes 01 : Introduction', 'newactu07.png', '2020-12-02', 'Nous allons aborder ici, les diffÃ©rents moyens et les diffÃ©rents types de tÃ©lescopes, qui existent sur le marchÃ©, et comparer les avantages et inconvÃ©nients de chacun. Si vous avez fait un tour sur Internet, vous aurez croiser diffÃ©rents termes comme rÃ©fracteur, lunettes astronomiques, Dobson, Newton, â€¦[br][url=/articles/consulter/14]Consultez cet article...[/url]'),
(15, 'MatÃ©riel: Les diffÃ©rents moyens dâ€™observation et les types de tÃ©lescopes 02 : Les rÃ©fracteurs', 'newactu07.png', '2020-12-04', 'Aussi appelÃ© lunette astronomique, elle est constituÃ©e de 2 lentilles. La lumiÃ¨re est collectÃ©e Ã  partir de la lentille situÃ©e Ã  lâ€™avant du tÃ©lescope...[br][url=/articles/consulter/15]Consultez cet article...[/url]'),
(16, 'MatÃ©riel: Les diffÃ©rents moyens dâ€™observation et les types de tÃ©lescopes 03 : Les rÃ©flecteurs', 'newactu02.png', '2020-12-04', 'Ce type de tÃ©lescope est dotÃ© dâ€™un miroir primaire concave, permettant de collecter et de concentrer la lumiÃ¨re sur le miroir secondaire, qui renvoie la lumiÃ¨re vers lâ€™oculaire...[br][url=/articles/consulter/16]Consultez cet article...[/url]'),
(17, 'MatÃ©riel: Les diffÃ©rents moyens dâ€™observation et les types de tÃ©lescopes 04 : Les catadioptriques', 'newactu010.png', '2020-12-04', 'Le tÃ©lescope catadioptrique combine la construction du rÃ©flecteur (construction avec miroirs) et la construction du rÃ©fracteur (construction avec lentilles). Lâ€™image produite par ce type de tÃ©lescope est composÃ©e dâ€™un mÃ©lange de rÃ©fraction et de rÃ©flexion...[br][url=/articles/consulter/17]Consultez cet article...[/url]'),
(18, 'Observations: PhÃ©nomÃ¨nes astronomiques - Octobre 2020', 'newactu09.png', '2020-12-15', 'Publication des Ã©phÃ©mÃ©rides pour le mois d\'octobre 2020.[br][url=/articles/consulter/18]Consultez cet article...[/url]'),
(19, 'Observations: PhÃ©nomÃ¨nes astronomiques - Novembre 2020', 'newactu01.png', '2020-12-15', 'Publication des Ã©phÃ©mÃ©rides pour le mois de novembre 2020[br][url=/articles/consulter/19]Consultez cet article...[/url]');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `categorie` varchar(32) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `contenu` text NOT NULL,
  `id_Membres` int(11) NOT NULL,
  `id_Actualites` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `categorie`, `titre`, `date`, `contenu`, `id_Membres`, `id_Actualites`) VALUES
(1, 'MatÃ©riel', 'Les diffÃ©rentes montures de tÃ©lescopes', '2020-11-13', 'Il existe 2 types de montures pour un tÃ©lescope :\r\n\r\n[center][img]/public/articles/montures.gif[/img]ï»¿[/center]\r\n[color=#ffff00][size=150]La monture azimutale[/size][/color]\r\n\r\nUne monture azimutale permet de dÃ©placer le tube optique parallÃ¨lement et perpendiculairement au sol. Un astre se dÃ©plaÃ§ant de biais dans le ciel, il convient de combiner ces 2 mouvements, pour suivre la progression de lâ€™astre dans le ciel.\r\n\r\nCe type de monture est gÃ©nÃ©ralement utilisÃ© pour faire de lâ€™observation simple. Elle est utilisÃ©e par exemple, sur les tÃ©lescope de type Dobson, ou on oriente ce dernier Ã  la main, pour viser lâ€™objet Ã  observer.\r\n\r\n[color=#ffff00][size=150]La monture Ã©quatoriale[/size][/color]\r\n\r\nUne monture Ã©quatoriale, est une monture azimutale, montÃ©e sur une table Ã©quatoriale. Elle permet de suivre le mÃªme astre en faisant pivoter lâ€™instrument sur un seul axe, lâ€™autre Ã©tant parallÃ¨le Ã  lâ€™axe de rotation de la Terre. Pour cela, les montures Ã©quatoriales possÃ¨dent quatre axes :\r\n\r\n[list][*]Deux permettent de mettre en station la monture.[/*][*]Les deux autres servent Ã  orienter lâ€™instrument selon les coordonnÃ©es cÃ©lestes, en dÃ©clinaison et en ascension droite.[/*][/list]\r\nCâ€™est la monture gÃ©nÃ©ralement utilisÃ©e sur les tÃ©lescopes des astronomes amateurs. Une fois la prise en main effectuÃ©e, la monture Ã©quatoriale donne un excellent confort dâ€™utilisation, notamment pour suivre un astre. Cependant la mÃ©canique dâ€™une monture Ã©quatoriale est sujette Ã  de fortes contraintes : porte-Ã -faux, flexions, etcâ€¦ nÃ©cessitant une grande rigiditÃ© de ses supports et lâ€™ajustage mÃ©ticuleux de ses engrenages.', 2, 1),
(2, 'Astronomie', 'Pourquoi les Ã©toiles changent dans le ciel dâ€™un mois sur lâ€™autre ?', '2020-11-13', 'Aujourdâ€™hui, je vais expliquer ce principe. Tout dâ€™abord, il faut commencer par les bases de lâ€™astronomie.\r\nLa Terre tourne autour du Soleil en 365 jours un quart. Chaque mois est dÃ©fini par un signe zodiacal. Mais pourquoi ?\r\n\r\n\r\n[center][img]/public/articles/zodiaque2.jpg[/img]ï»¿[/center]\r\n\r\nComme on peut le voir sur cette image, si on trace un droite entre la Terre et le Soleil, on aperÃ§oit dans le prolongement de cette droite, Ã  quelques millions de kilomÃ¨tres, un signe zodiacal.\r\n\r\nChaque soir les Ã©toiles se dÃ©placent de 360Â°/365jours ~ 1Â° par jour. Par analogie, chaque mois, les constellations se dÃ©placent de 30Â° dans le ciel.\r\n\r\nCâ€™est pour cela que nous observons des constellations diffÃ©rentes saisons aprÃ¨s saison.\r\n\r\nSi cela est vrai pour les constellations, vous constaterez ceci pour toutes les Ã©toiles.\r\n\r\nÂ \r\n[center][img]/public/articles/Animation2.gif[/img]ï»¿[/center]\r\n\r\nDans cette animation, vous pourrez observer les positions des Ã©toiles sur une annÃ©e. Vous constaterez que les constellations se dÃ©placent dâ€™Ouest en Est.\r\n\r\nJâ€™espÃ¨re avoir Ã©tÃ© clair, et que vous avez compris ce principe.', 2, 2),
(3, 'Observations', 'PhÃ©nomÃ¨nes astronomiques - Mars 2020', '2020-11-27', '[center][img]/public/articles/Actualite_astronomique_mars2020_page1.jpg[/img][/center]ï»¿\r\n[center][img]/public/articles/Actualite_astronomique_mars2020_page2.jpg[/img][/center]', 2, 3),
(4, 'Astronomie', 'Le SystÃ¨me Solaire 01 : Introduction', '2020-11-27', 'Cet ensemble d\'articles va vous expliquer la composition du systÃ¨me solaire, comparer les distances entre les planÃ¨tes, les tailles des planÃ¨tes, â€¦\r\n\r\n[list][*][url=/articles/consulter/4]Ch01. Introduction[/url][/*][*][url=/articles/consulter/5]Ch02. De quoi est composer le systÃ¨me solaire[/url][/*][*][url=/articles/consulter/6]Ch03. Les planÃ¨tes telluriques et les planÃ¨tes gazeuses[/url][/*][*][url=/articles/consulter/8]Ch04. Les distances[/url][/*][*][url=/articles/consulter/9]Ch05. Les tailles[/url][/*][*][url=/articles/consulter/10]Ch06. Les tempÃ©ratures[/url][/*][*][url=/articles/consulter/11]Ch07. Les rÃ©volutions[/url][/*][*][url=/articles/consulter/12]Ch08. Les axes de rotation[/url][/*][*]ï»¿[url=/articles/consulter/13]Ch09. Ou sommes-nous ?[/url][/*][/list]\r\n[color=#ffff00][size=150]Quel Ã¢ge a notre systÃ¨me solaire ?[/size][/color]\r\n\r\nOn estime que notre systÃ¨me solaire est Ã¢gÃ© de 4,5 milliards dâ€™annÃ©es.\r\n\r\n[color=#ffff00][size=150]En rÃ©sumÃ©[/size][/color]\r\n\r\n[center][img]/Public/articles/solar-system-11.gif[/img][/center]\r\n\r\n[color=#ffff00][size=150]CrÃ©dits :[/size][/color]\r\n\r\n[list][*][url=https://acegif.com]https://acegif.com[/url][/*][*][url=http://systeme-solaire.univers-et-espace.com]http://systeme-solaire.univers-et-espace.com[/url][/*][/list]', 2, 4),
(5, 'Astronomie', 'Le SystÃ¨me Solaire 02 : De quoi est composÃ© le systÃ¨me solaire ?', '2020-11-27', 'Le SystÃ¨me Solaire est composÃ© dâ€™une Ã©toile (Le Soleil) et dâ€™un ensemble dâ€™objets cÃ©lestes, qui gravitent autour de lui.\r\nParmi ces objets cÃ©lestes, on retrouve 8 planÃ¨tes, et voici une petite phrase, qui permettra de retenir facilement les positions:\r\n\r\n[quote]&quot;Me Voici Tout MouillÃ©, Je Suis Un Nuage&quot;[/quote][list][*]M : Mercure[/*][*]V : VÃ©nus[/*][*]T : Terre[/*][*]M : Mars[/*][*]J : Jupiter[/*][*]S : Saturne[/*][*]U : Uranus[/*][*]N : Neptune[/*][/list]\r\n[center][img]/public/articles/solar-system-01.jpg[/img][/center]\r\nPluton ayant Ã©tÃ© dÃ©classÃ© en planÃ¨te naine, le 24 AoÃ»t 2006, par lâ€™Union Astronomique Internationale, elle ne fait plus partie de la liste des planÃ¨tes.\r\n\r\nIl existe en plus de nos 8 planÃ¨tes :\r\n\r\n[list][*]Des milliers dâ€™astÃ©roÃ¯des : composÃ©s de roches et de minÃ©raux mÃ©talliques essentiellement. Leur taille est extrÃªmement variable, de plusieurs centaines de kilomÃ¨tres aux grains de poussiÃ¨re. Ils sont regroupÃ©s majoritairement dans la Ceinture dâ€™astÃ©roÃ¯des, situÃ©e entre Mars et Jupiter.[/*][*]Des milliers de comÃ¨tes : composÃ©es de glace et de poussiÃ¨res,de plusieurs milliers de corps glacÃ©s, qui gravitent dans la Ceinture de Kuiper.[/*][/list]', 2, 5),
(6, 'Astronomie', 'Le SystÃ¨me Solaire 03 : Les planÃ¨tes telluriques, les planÃ¨tes gazeuses et les planÃ¨tes naines', '2020-11-27', 'On peut classer les planÃ¨tes en 3 catÃ©gories :\r\n\r\n[list][*]les planÃ¨tes telluriques.[/*][*]les planÃ¨tes gazeuses.[/*][*]Les planÃ¨tes naines.[/*][/list]\r\nUne [b]planÃ¨te tellurique[/b] est une planÃ¨te composÃ©e essentiellement de roches et de mÃ©tal. Elle possÃ¨de en gÃ©nÃ©ral trois enveloppes concentriques (noyau, manteau et croÃ»te). Sa surface est solide et est composÃ©e principalement de matÃ©riaux non volatils, gÃ©nÃ©ralement des roches silicatÃ©es et du fer mÃ©tallique. Sa densitÃ© est comprise entre 4 et 5,7. Mercure, VÃ©nus, la Terre et Mars font parties des planÃ¨tes telluriques.\r\n\r\n[center][img]/public/articles/planetes_telluriques.png[/img][/center]\r\n\r\nUne [b]planÃ¨te gazeuse[/b] est une planÃ¨te composÃ©e essentiellement de gaz lÃ©gers, câ€™est-Ã -dire dâ€™hydrogÃ¨ne et dâ€™hÃ©lium. Jupiter, Saturne, Uranus et Neptune font parties des planÃ¨tes gazeuses.\r\n\r\n[center][img]/public/articles/planetes_gazeuses.png[/img]ï»¿[/center]\r\n\r\nUne [b]planÃ¨te naine [/b]est un objet cÃ©leste du SystÃ¨me solaire de classe intermÃ©diaire entre une planÃ¨te et un petit corps du SystÃ¨me solaire. Depuis 2008, cinq objets sont reconnus comme planÃ¨tes naines par l\'UAI :Â  CÃ©rÃ¨s, Pluton, HaumÃ©a, MakÃ©makÃ© et Ã‰ris. Les objets connus les plusÂ  susceptibles d\'Ãªtre ajoutÃ©s Ã  cette catÃ©gorie sont Gonggong, Charon, Quaoar, Sedna, Orcus et Hygie.\r\n\r\nÂ [center][img]/public/articles/planetes_naines.png[/img]ï»¿[/center]\r\n\r\n[color=#ffff00][size=150]Glossaire[/size][/color]\r\n\r\nUne [b]planÃ¨te tellurique [/b]est une planÃ¨te composÃ©e essentiellement de roches et de mÃ©tal. Elle possÃ¨de en gÃ©nÃ©ral trois enveloppes concentriques (noyau, manteau et croÃ»te). Sa surface estÂ  solide et est composÃ©e principalement de matÃ©riaux non volatils, gÃ©nÃ©ralement des roches silicatÃ©es et du fer mÃ©tallique. Sa densitÃ© est comprise entre 4 et 5,7.\r\n\r\nUne [b]planÃ¨te gazeuse [/b]est une planÃ¨te composÃ©e essentiellement de gaz lÃ©gers, câ€™est-Ã -dire dâ€™hydrogÃ¨ne et dâ€™hÃ©lium.\r\n\r\nUne [b]planÃ¨te naine [/b]est un objet de classe intermÃ©diaire entre une planÃ¨te et un petit corps du SystÃ¨me solaire.', 2, 6),
(7, 'Astronomie', 'Les saisons', '2020-12-01', '[size=100][b]Pourquoi existe-tâ€™il des saisons sur Terre ?\r\n[/b][/size]\r\nVous allez comprendre ce principe. La Terre dispose dâ€™un axe de rotation de 23.5Â°. Et cette derniÃ¨re tourne autour du Soleil en 365.25 jours. Câ€™est que lâ€™on appelle la RÃ©volution de la Terre.\r\n\r\n[center][img]/public/articles/saisons.png[/img]ï»¿[/center]\r\nDu fait de sa position par rapport au Soleil, les rayons atteignent la Terre sur une surface plus ou moins grande.\r\n\r\n[color=#ffff00][size=150]Solstices dâ€™Ã©tÃ© et dâ€™Hiver[/size][/color]\r\n\r\n[color=#1e84cc][size=100][b]En Ã‰tÃ©[/b][/size][/color]\r\n\r\n[center][img]/public/articles/Solstice-dEte.png[/img]ï»¿[/center]\r\n\r\nSi on se rÃ©fÃ¨re au dessin ci-dessus, lâ€™axe de positionnement de la France est symbolisÃ© par le trait bleu. La Terre est frappÃ© par les rayons du Soleil, avec un surface plus au moins grande. Ici, en Ã©tÃ©, les rayons du Soleil sont concentrÃ©s sur une petite surface.\r\n\r\nDans cette configuration, lâ€™hÃ©misphÃ¨re Nord est baignÃ© par les rayons du Soleil, par consÃ©quent lâ€™hÃ©misphÃ¨re Nord est en EtÃ© et lâ€™hÃ©misphÃ¨re Sud recevant moins de rayons du Soleil, câ€™est lâ€™Hiver dans lâ€™hÃ©misphÃ¨re Sud.\r\n\r\n[color=#1e84cc][size=100][b]En Hiver[/b][/size][/color]\r\n\r\n[center][img]/public/articles/Solstice-dHiver1.png[/img]ï»¿[/center]\r\n\r\nA lâ€™inverse, au moment du solstice dâ€™Hiver, les rayons du Soleil sâ€™Ã©tendent sur une plus grande surface de la planÃ¨te, par consÃ©quent, on rÃ©colte moins de chaleur.\r\nDans cette configuration, lâ€™hÃ©misphÃ¨re Nord reÃ§oit moins de rayons du Soleil, par consÃ©quent lâ€™hÃ©misphÃ¨re Nord est en Hiver et lâ€™hÃ©misphÃ¨re Sud recevant plus de rayons du Soleil, câ€™est lâ€™Ã‰tÃ© dans lâ€™hÃ©misphÃ¨re Sud.\r\n\r\n[color=#ffff00][size=150]Ã‰quinoxes de Printemps et dâ€™Automne[/size][/color]\r\n\r\nA cette pÃ©riode de lâ€™annÃ©e, les 2 HÃ©misphÃ¨res reÃ§oivent autant de rayons du Soleil. Mais cela est une saison transitoire entre Hiver -&gt; Ã‰tÃ© / Ã‰tÃ© -&gt; Hiver.\r\n\r\nPar consÃ©quent dans lâ€™HÃ©misphÃ¨re Nord, si on est en Ã‰tÃ©, on basculera vers lâ€™Automne, tandis que dans lâ€™HÃ©misphÃ¨re Sud, qui sera en Hiver (comme expliquÃ© ci-dessus) bascule vers le Printemps.\r\n\r\nInversement, dans lâ€™HÃ©misphÃ¨re Nord, si on est en Hiver, on basculera vers le Printemps, tandis que dans lâ€™HÃ©misphÃ¨re Sud, qui sera en Ã‰tÃ© (comme expliquÃ© ci-dessus) bascule vers lâ€™Automne.\r\n[color=#ffff00][size=150]\r\nAlternance des saisons[/size][/color]\r\n\r\nComme il a Ã©tÃ© expliquÃ© plus, les 2 hÃ©misphÃ¨res ont des saisons opposÃ©es. Quand câ€™est lâ€™etÃ© dans lâ€™hÃ©misphÃ¨re Nord, câ€™est lâ€™Hiver dans lâ€™hÃ©misphÃ¨re Sud, et vice et versa.\r\n\r\n[color=#1e84cc][size=100][b]HÃ©misphÃ¨re Nord[/b][/size][/color]\r\n\r\nPrintemps : ~20 mars.\r\nÃ‰tÃ© : ~21 juin.\r\nAutomne : ~23 septembre.\r\nHiver : ~21 dÃ©cembre.\r\n[color=#1e84cc][b]\r\n[size=100]HÃ©misphÃ¨re Sud[/size][/b][/color]\r\n\r\nPrintemps austral : ~23 septembre.\r\nÃ‰tÃ© austral : ~21 dÃ©cembre.\r\nAutomne austral : ~20 mars.\r\nHiver austral : ~21 juin.\r\n\r\nOn voit bien lâ€™alternance des saisons et leurs complÃ©mentaritÃ©s.\r\n\r\n[color=#ffff00][size=150]Glossaire[/size][/color]\r\n\r\n[b]RÃ©volution [/b]: Rotation complÃ¨te dâ€™un corps mobile autour de son axe (axe de rÃ©volution).', 2, 7),
(8, 'Astronomie', 'Le SystÃ¨me Solaire 04 : Les distances', '2020-12-01', 'A cette Ã©chelle, les distances exprimÃ©es sont importantes, on parlera ici en millions voir en milliards de kilomÃ¨tres.\r\n\r\n[list][*]Mercure : 58 mkm[/*][*]VÃ©nus : 108 mkm[/*][*]Terre : 150 mkm[/*][*]Mars : 228 mkm[/*][*]Jupiter : 778 mkm[/*][*]Saturne : 1.4 Mkm[/*][*]Uranus : 2.87 Mkm[/*][*]Neptune : 4.5 Mkm[/*][/list]\r\n[b]mkm [/b]: million de kilomÃ¨tres.\r\n[b]Mkm [/b]: milliard de kilomÃ¨tres.\r\n\r\nOn peut simplifier si on prend comme unitÃ© commune lâ€™[b]UA [/b](unitÃ© astronomique). Mais quâ€™est-ce ?\r\n\r\nLâ€™unitÃ© astronomique est une unitÃ© de longueur qui a comme rÃ©fÃ©rence la distance Soleil â€“ Terre. Par consÃ©quent 1 ua (unitÃ© astronomique) = 150 mkm. Ceci transforme les valeurs de notre liste des distances, non plus exprimÃ© en million de kilomÃ¨tres, mais en ratio par rapport Ã  la distance Soleil â€“ Terre. On divise donc les distances exprimÃ©es en million/millier de kilomÃ¨tres, par la distance Soleil â€“ Terre.\r\n\r\nPrenons un exemple :\r\n Pour calculer la distance Soleil â€“ Mercure en unitÃ© astronomique, nous allons diviser la distance que nous avons citÃ© prÃ©cÃ©demment soit 58 mkm, par la distance Soleil â€“ Terre soit 150 mkm. Cela nous donne environ 0.39 ua.\r\n\r\nNe vous inquiÃ©tez pas, vous allez comprendre :\r\n\r\n[list][*]Mercure : 58 mkm =&gt; 0.39 ua[/*][*]VÃ©nus : 108 mkm =&gt; 0.72 ua[/*][*]Terre : 150 mkm =&gt; 1 ua[/*][*]Mars : 228 mkm =&gt; 1.52 ua[/*][*]Jupiter : 778 mkm =&gt; 5.2 ua[/*][*]Saturne : 1.4 Mkm =&gt; 9.5 ua[/*][*]Uranus : 2.87 Mkm =&gt; 19.2 ua[/*][*]Neptune : 4.5 Mkm =&gt; 30 ua[/*][/list]\r\nBien entendu, ces valeurs sont arrondies.\r\n\r\n[color=#ffff00][size=150]Glossaire[/size][/color]\r\n\r\n[b]mkm [/b]: million de kilomÃ¨tres.\r\n\r\n[b]Mkm [/b]: milliard de kilomÃ¨tres.\r\n\r\n[b]Lâ€™unitÃ© astronomique[/b] est une unitÃ© de longueur qui a comme rÃ©fÃ©rence la distance Soleil â€“ Terre. Par consÃ©quent 1 ua (unitÃ© astronomique) = 150 mkm.', 2, 8),
(9, 'Astronomie', 'Le SystÃ¨me Solaire 05 : Les tailles', '2020-12-01', 'Voici la liste des tailles (diamÃ¨tre estimÃ©) de quelques corps de notre SystÃ¨me Solaire :\r\n\r\n[b][size=100]Les planÃ¨tes :[/size][/b]\r\n\r\n[list][*]Mercure : 4 900 km[/*][*]VÃ©nus : 12 100 km[/*][*]Terre : 12 800 km[/*][*]Mars : 6 800 km[/*][*]Jupiter : 143 000 km[/*][*]Saturne : 121 000 km[/*][*]Uranus : 51 100 km[/*][*]Neptune : 49 600 km[/*][/list]\r\n[b][size=100]PlanÃ¨tes naines :[/size][/b]\r\n\r\n[list][*]Pluton : 2370 km[/*][*]Eris : ~2330 km[/*][*]MakÃ©makÃ© : ~1430 km[/*][*]Quaoar : ~1110 km[/*][*]Sedna : ~995 km[/*][*]HaumÃ©a : ~1960 km x 1580 km x 996 km[/*][*]CÃ©rÃ¨s : 952 km[/*][/list]\r\n[b][size=100]Quelques astÃ©roÃ¯des :[/size][/b]\r\n\r\n[list][*]45 Eugenia : ~ 214 km[/*][*]87 Sylvia : ~286 km[/*][*]52 Europa : ~315 km[/*][*]10 Hygiea : ~434 km[/*][*]Pallas : ~512 km[/*][*]Vesta : ~525 km[/*][/list]\r\n[b][size=100]Quelques satellites :[/size][/b]\r\n\r\n[list][*]Lune : 3475 km[/*][*]Io : 3643 km[/*][*]Europe : 3122 km[/*][*]GanymÃ¨de : 5262 km[/*][*]Callisto : 4820 km[/*][*]Titan : 5150 km[/*][/list][center]\r\n[img]/public/articles/Taille_planetes.jpg[/img][/center]ï»¿', 2, 9),
(10, 'Astronomie', 'Le SystÃ¨me Solaire 06 : Les tempÃ©ratures', '2020-12-01', 'Notre Ã©toile (Le Soleil), est notre source de chaleur. Grace Ã  lui, la vie est possible sur notre planÃ¨te.\r\n\r\nMais comme tout bon moyen de chauffage, plus on sâ€™Ã©loigne de lui, plus  la tempÃ©rature chute. Câ€™est le mÃªme principe quâ€™une cheminÃ©e. Plus vous  Ãªtes prÃªt de votre cheminÃ©e, et plus vous vous apercevez que la tempÃ©rature augmente.\r\n\r\nVoici un rÃ©capitulatif des tempÃ©ratures moyennes mesurÃ©e en surface sur les diffÃ©rentes planÃ¨tes du systÃ¨me solaire.\r\n\r\n[list][*]Mercure : 169 Â°C[/*][*]VÃ©nus : 470 Â°C[/*][*]Terre : 15Â°C[/*][*]Mars : -63Â°C[/*][*]Jupiter : -163Â°C[/*][*]Saturne : -189 Â°C[/*][*]Uranus : -220 Â°C[/*][*]Neptune : -218 Â°C[/*][/list]\r\n[b]Alors, pourquoi Mercure est moins chaude que vÃ©nus ?[/b]\r\n\r\nÃ€ la surface de VÃ©nus, il fait environ 470Â°C. Câ€™est plus que sur Mercure, oÃ¹ la tempÃ©rature de surface peut atteindre jusquâ€™Ã  430Â°C en journÃ©e. Lâ€™Ã©cart de tempÃ©rature entre ces deux planÃ¨tes peut paraÃ®tre Ã©tonnant, car lâ€™orbite de Mercure est situÃ©e plus prÃ¨s du Soleil que celle de VÃ©nus. Alors pourquoi y fait-il moins chaud que sur sa voisine ?\r\n\r\nTout simplement parce que Mercure ne possÃ¨de pas dâ€™atmosphÃ¨re, contrairement Ã  VÃ©nus qui est dotÃ©e dâ€™une Ã©paisse atmosphÃ¨re, riche en dioxyde de carbone et en nuages dâ€™acide sulfurique. Cette atmosphÃ¨re conserve la chaleur, grÃ¢ce Ã  un phÃ©nomÃ¨ne que lâ€™on connaÃ®t bien sur Terre : lâ€™effet de serre.', 2, 10),
(11, 'Astronomie', 'Le SystÃ¨me Solaire 07 : Les rÃ©volutions', '2020-12-01', 'Chaque planÃ¨te dispose dâ€™une durÃ©e de rÃ©volution diffÃ©rentes, qui augmente avec la distance qui la sÃ©pare du Soleil.\r\n\r\n[list][*]Mercure : 88 jours[/*][*]VÃ©nus : 225 jours[/*][*]Terre : 365,25 jours[/*][*]Mars : 1 an et 322 jours[/*][*]Jupiter : environ 12 ans[/*][*]Saturne : environ 30 ans[/*][*]Uranus : 84 ans[/*][*]Neptune : environ 65 ans[/*][/list]\r\n[color=#ffff00][size=150]Glossaire[/size][/color]\r\n\r\n[b]RÃ©volution[/b] : Temps que met une planÃ¨te, pour faire le tour du Soleil.', 2, 11),
(12, 'Astronomie', 'Le SystÃ¨me Solaire 08 : Les axes de rotations.', '2020-12-01', 'Chaque planÃ¨te du systÃ¨me solaire dispose dâ€™une axe de rotation, qui lui est propre.\r\n\r\n[center][img]/Public/articles/Inclinaison_axiale_saisons_plan%c3%a8tes_ss.jpg[/img]\r\nï»¿[/center]Comme on peut le voir, lâ€™inclinaison des planÃ¨tes est plus ou moins  forte. A noter, mention spÃ©ciale pour Uranus, qui dispose dâ€™une axe  \r\nquasiment couchÃ©, avec ces 82Â°. On dit quâ€™elle possÃ¨de une orbite  couchÃ©e.\r\n\r\nAutre mention, toutes les planÃ¨tes tournent dans le mÃªme sens, sauf une : VÃ©nus, qui tourne dans le sens contraire.', 2, 12),
(13, 'Astronomie', 'Le SystÃ¨me Solaire 09 : OÃ¹ sommes-nous ?', '2020-12-02', 'Le SystÃ¨me solaire Ã©volue dans lâ€™un des bras de notre galaxie spirale, la Voie lactÃ©e, Ã  quelque 26.000 [i]annÃ©es-lumiÃ¨re[/i] de son centre.\r\n\r\n\r\n[center][img]/Public/articles/Voie_Lact%c3%a9e_localisation.jpg[/img][/center]\r\n\r\n[color=#ffff00][size=150]Glossaire[/size][/color][b]\r\n\r\nVitesse de la lumiÃ¨re[/b] dans le vide : reprÃ©sente une constante physique universelle et vaut 299 792 458 m/s. On lâ€™arrondit Ã  300 000 km/s.\r\n\r\n[b]AnnÃ©e-lumiÃ¨re : [/b]reprÃ©sente  une unitÃ© de mesure de distance. Elle reprÃ©sente la distance parcourue  par la lumiÃ¨re dans leÂ  vide en 1 annÃ©e julienne (365, 25 jours =&gt; 31  557 600 secondes). Ceci donne 31 557 600 s * 300 000 km/s = 9,461Â Ã—â€¯10[sup]12[/sup] km. On arrondira cette valeur Ã  10 000 000 000 000 (dix mille milliards) de kilomÃ¨tres.', 2, 13),
(14, 'MatÃ©riel', 'Les diffÃ©rents moyens dâ€™observation et les types de tÃ©lescopes 01 : Introduction', '2020-12-02', 'Nous allons aborder ici, les diffÃ©rents moyens et les diffÃ©rents types de tÃ©lescopes, qui existent sur le marchÃ©, et comparer  les avantages et inconvÃ©nients de chacun. Si vous avez fait un tour sur  Internet, vous aurez croiser diffÃ©rents termes comme rÃ©fracteur, lunettes astronomiques, Dobson, Newton, â€¦\r\n\r\nNe vous inquiÃ©tez pas, nous allons tenter dâ€™Ã©claircir tout ceci.\r\n\r\nChaque type de tÃ©lescope possÃ¨de des avantages, des inconvÃ©nients et termes de facilitÃ© dâ€™utilisation, de prix, et de ce que vous voulez observer.\r\n\r\nIl existe 3 types principaux de tÃ©lescopes :\r\n\r\n[list][*][url=/articles/consulter/15]Les rÃ©fracteurs[/url][/*][*][url=/articles/consulter/16]Les rÃ©flecteurs[/url][/*][*][url=/articles/consulter/17]Les catadioptriques[/url][/*][/list]\r\n[color=#ffff00][size=150]Conclusion[/size][/color]\r\n\r\nMaintenant, vous devez Ãªtre incollable !\r\n\r\nVous vous posez des questions ? : venez nous voir, nous nous efforcerons de vous aiguiller dans vos choix de matÃ©riel.\r\nVous voulez observer sans faire un gros investissement ? : commencez par une simple paire de jumelles 10Ã—50.\r\n\r\n[color=#ffff00][size=150]CrÃ©dits[/size][/color]\r\n\r\n[list][*][url=https://www.astrofiles.net]https://www.astrofiles.net[/url][/*][*][url=http://www.achat-telescope.net]http://www.achat-telescope.net[/url][/*][/list]', 2, 14),
(15, 'MatÃ©riel', 'Les diffÃ©rents moyens dâ€™observation et les types de tÃ©lescopes 02 : Les rÃ©fracteurs', '2020-12-04', 'Aussi appelÃ© lunette astronomique, elle est constituÃ©e de 2 lentilles. \r\n\r\n[center][img]/Public/articles/lunette_astro.jpg[/img]ï»¿[/center]\r\n\r\nLa lumiÃ¨re est collectÃ©e Ã  partir de la [b]lentille [/b]situÃ©e Ã  lâ€™avant du tÃ©lescope. La [b]lentille [/b]est courbÃ©e, de faÃ§on Ã  faire converger la lumiÃ¨re sur le [b]point focale[/b]. Câ€™est pour cela que lâ€™on parle de [b]rÃ©fracteur[/b], car la lumiÃ¨re est rÃ©fractÃ©e Ã  cause de la lentille. \r\n\r\n[color=#ffff00][size=150]Avantages du rÃ©fracteur:[/size][/color]\r\n\r\n[list][*]Il est robuste et solide.[/*][*]Il est simple de conception. Câ€™est le premier systÃ¨me Ã  avoir Ã©tÃ© inventÃ©, il y a de cela 4 siÃ¨cles. Cette simplicitÃ©, est un gage de qualitÃ©.[/*][*]Le tube Ã©tant fermÃ© avec les lentilles de chaque cÃ´tÃ©, le systÃ¨me ne prend jamais de poussiÃ¨res, et donc ne nÃ©cessite aucun entretien.[/*][*]Ce type de tÃ©lescope nâ€™est pas sensible au courant dâ€™air, ni au changement de tempÃ©rature (apparition de buÃ©e), ce qui permet dâ€™obtenir des images plus nettes.[/*][*]TrÃ¨s peu encombrant, donc plus facile Ã  transporter.[/*][*]Excellent pour lâ€™observation planÃ©taire.[/*][/list]\r\n[color=#ffff00][size=150]InconvÃ©nients du rÃ©fracteur:[/size][/color]\r\n\r\n[list][*]Ce tÃ©lescope peut parfois subir un effet appelÃ© [i]Â«Â aberration chromatiqueÂ Â»[/i] (distorsion des couleurs). Cet effet produit une sorte dâ€™arc-en-ciel autour de lâ€™image observÃ©e, ce qui peut avoir pour consÃ©quence de crÃ©er une image floue et de mauvaise qualitÃ©.[/*][*]Selon la longueur dâ€™onde de lumiÃ¨re projetÃ©e, lâ€™objet captÃ© peut ne pas Ãªtre correctement restituÃ© dans lâ€™oculaireÂ : les ultraviolets ne peuvent pas traverser la lentille des lunettes.[/*][*]Plus lâ€™Ã©paisseur de la lentille augmente, moins la lumiÃ¨re passe facilement.[/*][*][b]La lunette astronomique nâ€™est pas adaptÃ©e pour observer le ciel profond.[/b][/*][*]Ã€ diamÃ¨tre Ã©gal, la lunette est plus performante quâ€™un tÃ©lescope, mais son prix est exorbitant.[/*][/list]', 2, 15),
(16, 'MatÃ©riel', 'Les diffÃ©rents moyens dâ€™observation et les types de tÃ©lescopes 03 : Les rÃ©flecteurs', '2020-12-04', 'Ce type de tÃ©lescope est dotÃ© dâ€™un [b]miroir primaire[/b] concave, permettant de collecter et de concentrer la lumiÃ¨re sur le [b]miroir secondaire[/b], qui renvoie la lumiÃ¨re vers lâ€™oculaire.\r\n\r\nCe type de tÃ©lescope permet dâ€™Ã©viter lâ€™effet chromatique induit par les  lunettes astronomiques. Il existe deux principaux types de \r\ntÃ©lescopes  rÃ©flecteursÂ :\r\n\r\n[list][*]Le tÃ©lescope de Newton[/*][*]Le tÃ©lescope de Cassegrain.[/*][/list]\r\n[color=#ffff00][size=150]Le tÃ©lescope de Newton[/size][/color]\r\n\r\nCâ€™est lâ€™un des tÃ©lescopes classiques trÃ¨s prisÃ©s par le grand public. Ce  modÃ¨le a Ã©tÃ© imaginÃ© par Isaac Newton en voulant amÃ©liorer la lunette  de GalilÃ©e. Ainsi, le miroir primaire collecte la lumiÃ¨re venant du ciel  tandis que le miroir secondaire redirige la lumiÃ¨re recueillie vers  lâ€™oculaire situÃ© sur le cÃ´tÃ© du tube. La plupart des tÃ©lescopes de  Newton sont montÃ©s sur des montures Ã©quatoriales pour suivre aisÃ©ment  les mouvements des astres dans le ciel. Ils offrent ainsi un champ de  vision Ã©largi. Son tube protÃ¨ge ces instruments contre le gel et la  buÃ©e. Parmi les Newton, on compte le Dobson montÃ© sur des montures  azimutales, qui a notamment rencontrÃ© un grand succÃ¨s. Une conception  compacte et lÃ©gÃ¨re.\r\n\r\n[center][img]/Public/articles/fop_newt.gif[/img]ï»¿[/center]\r\n\r\n[color=#ffff00][size=150]Le tÃ©lescope de Cassegrain[/size][/color]\r\n\r\nImaginÃ© par Laurent Cassegrain, ce sous-type de tÃ©lescope dispose dâ€™un  miroir primaire percÃ© en son centre, câ€™est ce qui le diffÃ¨re de lâ€™ouvrage dâ€™Isaac Newton. En principe, il embarque un miroir parabolique convergent et un miroir hyperbolique divergent. De cette faÃ§on, lâ€™image  se forme derriÃ¨re lâ€™appareil. Ce type de construction est plus compact.\r\n\r\n[center][img]/Public/articles/500px-Casegraintelescope.png[/img]ï»¿[/center]\r\n\r\n[color=#ffff00][size=150]Avantages du rÃ©flecteur:[/size][/color]\r\n\r\n[list][*]Le tÃ©lescope ne subit aucune aberration chromatique, car toute la lumiÃ¨re qui rÃ©flÃ©chit le miroir ne souffre dâ€™aucune distorsion.[/*][*]Le coÃ»t de fabrication dâ€™un tÃ©lescope est bien moindre quâ€™une lunette, ce qui se rÃ©percute sur le prix grand public.[/*][*]La taille du diamÃ¨tre est beaucoup plus grande que la lunette, donc plus de lumiÃ¨re est collectÃ©e, et par consÃ©quent, le tÃ©lescope permet lâ€™observation dâ€™un ciel profond (NÃ©buleuses, galaxies, amas globulairesâ€¦).[/*][*]Beaucoup de tÃ©lescopes sont adaptÃ©s pour la pratique de lâ€™astrophotographie.[/*][*]Conception compacte et lÃ©gÃ¨re pour les Dobson.[/*][*]TrÃ¨s apprÃ©ciÃ© des astronomes amateurs grÃ¢ce Ã  la confortable position du porte-oculaire.[/*][*]Le tube protÃ¨ge les tÃ©lescopes de Newton contre la buÃ©e et le gel.[/*][*]GrÃ¢ce Ã  son systÃ¨me optique simple, le Newton est un instrument facile Ã  rÃ©gler (collimation).[/*][*]Le type de construction du Cassegrain lui permet dâ€™Ãªtre plus compact.[/*][*]Au-dessus dâ€™un rapport focal de f/6, les images recueillies sont trÃ¨s lumineuses.[/*][/list]\r\n[color=#ffff00][size=150]InconvÃ©nients du rÃ©flecteur:[/size][/color]\r\n\r\n[list][*]Assez encombrants, prÃ©voir de quoi les transporter.[/*][*][b]Plus sensibles aux turbulences atmosphÃ©riques que les lunettes.[/b][/*][*]Collimation parfois difficile.[/*][*]Il est nÃ©cessaire dâ€™entretenir rÃ©guliÃ¨rement son tÃ©lescope (nettoyage).[/*][*]Plus fragiles quâ€™une lunette ou quâ€™un tÃ©lescope catadioptrique.[/*][*]Aberration optiqueÂ : la coma (donne une sorte dâ€™aspect de comÃ¨te Ã  lâ€™objet observÃ©, ainsi que des contours irisÃ©s).[/*][*]Les tubes de 200Â mm commencent Ã  devenir vraiment encombrants, chers et lourds.[/*][*]Ces types de tÃ©lescopes ne sont pas adaptÃ©s Ã  lâ€™observation terrestre.[/*][/list]', 2, 16),
(17, 'MatÃ©riel', 'Les diffÃ©rents moyens dâ€™observation et les types de tÃ©lescopes 04 : Les catadioptriques', '2020-12-04', 'Le tÃ©lescope catadioptrique combine la construction du rÃ©flecteur  (construction avec miroirs) et la construction du rÃ©fracteur  (construction avec lentilles). Lâ€™image produite par ce type de tÃ©lescope est composÃ©e dâ€™un mÃ©lange de rÃ©fraction et de rÃ©flexion.\r\n\r\n[center][img]/Public/articles/Objectif_catadioptrique.png[/img][/center]ï»¿\r\nLes catadioptriques les plus courantes sont :\r\n\r\n[list][*]Le Schmidt-Cassegrain.[/*][*]Le Maksutov-Cassegrain.[/*][*]Le Ritchey-ChrÃ©tien.[/*][/list]\r\n[color=#ffff00][size=150]Le tÃ©lescope Schmidt-Cassegrain[/size][/color]\r\n\r\nLe tÃ©lescope Schmidt-Cassegrain dispose dâ€™un miroir primaire  sphÃ©rique (et non parabolique, contrairement au tÃ©lescope de Cassegrain) et dâ€™une lentille correctrice, que lâ€™on appelle Â«Â [b]Lame de Schmidt[/b]Â Â».\r\n\r\n\r\n[center][img]/Public/articles/Telescope_schmidt_cassegrain_complet.png[/img]ï»¿[/center]\r\nCe [b]tÃ©lescope sÃ©duit un grand nombre dâ€™astronomes amateurs par sa grande polyvalence[/b]. Il est trÃ¨s douÃ© pour lâ€™observation des planÃ¨tes, mais Ã©galement pour le ciel profond, sans oublier lâ€™astrophotographieÂ !\r\n\r\n[b][color=#1e84cc][size=100]Avantages du Schmidt-Cassegrain:[/size][/color][/b]\r\n\r\n[list][*]La polyvalenceÂ : on a rassemblÃ© en un seul appareil les avantages dâ€™une lunette astronomique et ceux dâ€™un tÃ©lescope.[/*][*]Câ€™est le compagnon idÃ©al de lâ€™astrophotographe.[/*][*]Les images subissent trÃ¨s peu de nuisance grÃ¢ce au tube optique fermÃ©.[/*][*]La coma est trÃ¨s peu prÃ©sente.[/*][*]Il est trÃ¨s bon pourÂ : lâ€™observation des planÃ¨tes, lâ€™observation du ciel profond, et mÃªme lâ€™observation de la natureÂ ![/*][*]Il restitue des images de trÃ¨s grande qualitÃ© sur un champ large.[/*][*][b]La fiabilitÃ© et la robustesse dâ€™un tÃ©lescope de ce type ne  sont plus Ã  dÃ©montrerÂ : câ€™est lâ€™un des prÃ©fÃ©rÃ©s des astronomes amateurs[/b].[/*][*]Le Schmidt-Cassegrain bÃ©nÃ©ficie dâ€™un trÃ¨s large choix dâ€™accessoires en tous genres.[/*][*]Sa grande compacitÃ© le rend trÃ¨s facile Ã  transporter.[/*][*]Lâ€™entretien est trÃ¨s aisÃ©, la collimation plutÃ´t rare.[/*][/list][b][color=#1e84cc][size=100]InconvÃ©nients du Schmidt-Cassegrain:[/size][/color][/b]\r\n\r\n[list][*]Ã€ diamÃ¨tre Ã©quivalent, le Schmidt-Cassegrain revient bien plus  cher quâ€™un tÃ©lescope de Newton, notamment Ã  cause de sa lame de Schmidt.[/*][*]Si vous optez pour un modÃ¨le Ã©quipÃ© dâ€™une monture altazimutale, [b]vous aurez du mal Ã  pratiquer lâ€™astrophotographie[/b].[/*][*]Par rapport Ã  un rÃ©fracteur, on peut constater une certaine perte de lumiÃ¨re due Ã  lâ€™obstruction du miroir.[/*][/list]\r\n[color=#ffff00][size=150]Le tÃ©lescope Maksutov-Cassegrain[/size][/color]\r\n\r\nLes lames de Schmidt Ã©tant trÃ¨s coÃ»teuses, elles ont Ã©tÃ© retirÃ©es dans les modÃ¨les de type Maksutov, pour faire place Ã  un mÃ©nisque Ã©pais dont la fabrication est plus facile et moins onÃ©reuse.\r\n\r\nLe maksutov doit son nom Ã  lâ€™opticien russe Dmitri Dmitrievich Maksutov, qui sâ€™est basÃ© sur le TÃ©lescope Schmidt-Cassegrain pour rÃ©aliser le Maksutov-Cassegrain.\r\n\r\nLe maksutov est grosso modo un dÃ©rivÃ© du Schmidt. On peut donc affirmer quâ€™il possÃ¨de les mÃªmes avantages et inconvÃ©nients que le Schmidt-Cassegrain (voir plus haut). La diffÃ©rence majeure est la prÃ©sence du mÃ©nisque frontal dont nous avons parlÃ© plus haut, et cela lui confÃ¨re une qualitÃ© optique surprenante.\r\n\r\nCâ€™est un instrument de choix pour les amateurs exigeants qui souhaitent observer les galaxies, la Lune, les planÃ¨tes, les amas globulaires, les nÃ©buleuses ou encore les Ã©toiles doubles.\r\n[b][color=#1e84cc][size=100]\r\nAvantages du Maksutov-Cassegrain:[/size][/color][/b]\r\n\r\n[list][*]Les mÃªmes que ceux du Schmidt-Cassegrain.[/*][*]Images dâ€™une qualitÃ© vraiment exceptionnelle.[/*][*]Collimation assez stable.[/*][*]Compact, donc facile Ã  transporter.[/*][*]Permets dâ€™effectuer de forts grossissements.[/*][*]TrÃ¨s pratique dâ€™utilisation.[/*][/list]\r\n[b][color=#1e84cc][size=100]InconvÃ©nients du Maksutov-Cassegrain:[/size][/color][/b]\r\n\r\n[list][*]Ratio de longueur focale Ã©levÃ© (temps dâ€™exposition plus longs pour lâ€™astrophoto).[/*][*][b]Mise en tempÃ©rature assez longue[/b].[/*][*]La collimation ne peut se faire que sur le miroir primaire.[/*][*]Le mÃ©nisque est sensible Ã  la buÃ©e.[/*][*]Le champ de vision est restreint.[/*][/list]\r\n[color=#ffff00][size=150]Le tÃ©lescope Ritchey-ChrÃ©tien[/size][/color]\r\n\r\nOn entre ici dans la catÃ©gorie trÃ¨s haut de gamme. [b]Ce type de tÃ©lescope est conÃ§u pour corriger toute aberration chromatique de maniÃ¨re spectaculaire[/b].\r\n\r\n[center][img]/Public/articles/Ritchey-Chr%c3%a9tien.png[/img][/center]\r\n\r\nSi vous avez les moyens, si vous Ãªtes exigeant et avez de bonnes connaissances en astronomie, câ€™est sans aucun doute vers un tÃ©lescope de type Ritchey-ChrÃ©tien que vous devez vous tourner. Câ€™est le top du top  en matiÃ¨re dâ€™observation astronomique. Mais forcÃ©ment, Ã§a coute trÃ¨s cherÂ ! Les prix dÃ©marrent en gÃ©nÃ©ral Ã  1000Â euros.\r\n\r\nPour vous donner un ordre dâ€™idÃ©e, [b]sachez que ce type de construction est utilisÃ© dans la conception du tÃ©lescope spatial Hubble, rien que Ã§aÂ ![/b]\r\n\r\n[b][color=#1e84cc][size=100]Avantages du Ritchey-ChrÃ©tien:[/size][/color][/b]\r\n\r\n[list][*]Aucune coma nâ€™est Ã  dÃ©plorer, la correction est tout simplement excellente.[/*][*]Lâ€™optique frise la perfection, et est bien meilleure que tous les types de tÃ©lescopes dÃ©crits plus haut.[/*][*]PossibilitÃ© dâ€™acquÃ©rir ce genre de tÃ©lescopes avec ou sans lame correctrice de fermeture.[/*][*]Les tÃ©lescopes Ã©quipÃ©s de lame correctrice de fermeture voient lâ€™astigmatisme corrigÃ©. La lame ferme le tube optique.[/*][*]Le contraste est augmentÃ©, jusquâ€™Ã  17%.[/*][*][b]Performances exceptionnelles, notamment dans la pratique de lâ€™astrophotographie[/b].[/*][/list][b][color=#1e84cc][size=100]InconvÃ©nients du Ritchey-ChrÃ©tien:[/size][/color][/b]\r\n\r\n[list][*]Son prix en gÃ©nÃ©ral plus Ã©levÃ© que les autres types de tÃ©lescopes.[/*][*]Collimation difficile Ã  effectuer (mais elle peut-Ãªtre ajustÃ©e de maniÃ¨re Ã©lectronique).[/*][*]PrÃ©sence dâ€™un certain astigmatisme (sauf dans la version Ã©quipÃ©e dâ€™une lame de fermeture).[/*][/list]', 2, 17),
(18, 'Observations', 'PhÃ©nomÃ¨nes astronomiques - Octobre 2020', '2020-12-15', 'ï»¿[center][img]/Public/articles/Actualite_astronomique_octobre2020_page1.jpg[/img][/center]\r\nï»¿[center][img]/Public/articles/Actualite_astronomique_octobre2020_page2.jpg[/img]ï»¿[/center]\r\nï»¿[center][img]/Public/articles/Actualite_astronomique_octobre2020_page3.jpg[/img]ï»¿[/center]\r\nï»¿[center][img]/Public/articles/Actualite_astronomique_octobre2020_page4.jpg[/img]ï»¿[/center]', 2, 18),
(19, 'Observations', 'PhÃ©nomÃ¨nes astronomiques - Novembre 2020', '2020-12-15', '[center][img]/Public/articles/actu_novembre2020_page2.jpg[/img][/center]\r\n[center][img]/Public/articles/actu_novembre2020_page3.jpg[/img][/center]\r\n[center][img]/Public/articles/actu_novembre2020_page1.jpg[/img][/center]', 2, 19);

-- --------------------------------------------------------

--
-- Structure de la table `articlesimages`
--

CREATE TABLE `articlesimages` (
  `id` int(11) NOT NULL,
  `imagePath` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articlesimages`
--

INSERT INTO `articlesimages` (`id`, `imagePath`) VALUES
(1, 'montures.gif'),
(2, 'zodiaque2.jpg'),
(3, 'Animation2.gif'),
(4, 'saisons.png'),
(5, 'Solstice-dEte.png'),
(6, 'Solstice-dHiver1.png'),
(7, 'Actualite_astronomique_mars2020_page1.jpg'),
(8, 'Actualite_astronomique_mars2020_page2.jpg'),
(9, 'solar-system-11.gif'),
(10, 'solar-system-01.jpg'),
(11, 'planetes_telluriques.png'),
(12, 'planetes_gazeuses.png'),
(13, 'planetes_naines.png'),
(14, 'Taille_planetes.jpg'),
(15, 'Inclinaison_axiale_saisons_planÃ¨tes_ss.jpg'),
(17, 'Voie_LactÃ©e_localisation.jpg'),
(18, 'lunette_astro.jpg'),
(19, 'fop_newt.gif'),
(20, '500px-Casegraintelescope.png'),
(21, 'Objectif_catadioptrique.png'),
(22, 'Telescope_schmidt_cassegrain_complet.png'),
(23, 'Ritchey-ChrÃ©tien.png'),
(24, 'Actualite_astronomique_octobre2020_page1.jpg'),
(25, 'Actualite_astronomique_octobre2020_page2.jpg'),
(26, 'Actualite_astronomique_octobre2020_page3.jpg'),
(27, 'Actualite_astronomique_octobre2020_page4.jpg'),
(28, 'actu_novembre2020_page1.jpg'),
(29, 'actu_novembre2020_page2.jpg'),
(30, 'actu_novembre2020_page3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `associations`
--

CREATE TABLE `associations` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `adresse` varchar(64) NOT NULL,
  `codePostale` int(11) NOT NULL,
  `ville` varchar(64) NOT NULL,
  `nSiret` varchar(14) NOT NULL,
  `nRNA` varchar(14) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `associations`
--

INSERT INTO `associations` (`id`, `nom`, `adresse`, `codePostale`, `ville`, `nSiret`, `nRNA`, `tel`, `email`) VALUES
(1, 'PÃ©gase', 'Local Les Pierres Noires. Rue des Pierres', 29290, 'Saint-Renan', 'xx_siret', 'xx-rna', '0000000000', 'xxxxxxx.xx@xxx.com');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` int(11) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `lieu` varchar(64) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `titre`, `lieu`, `date`, `description`) VALUES
(1, 'ConfÃ©rence', 'Centre socio culturel de Saint-Renan', '2020-10-03 15:00:00', 'Le mystÃ¨re astronomique de la grande forge de Buffon.\r\nEmeric Falize, Astrophysicien au CEA.'),
(2, 'ConfÃ©rence', 'Centre socio culturel de Saint-Renan', '2020-10-03 17:00:00', 'Le Soleil : un vieux compagnon encore mÃ©connu.\r\nWilly Rothhut, confÃ©rencier Ã  l\'UTL de Brest et membre du club PÃ©gase.'),
(3, 'ConfÃ©rence', 'Centre socio culturel de Saint-Renan', '2020-10-04 11:00:00', 'DÃ©couvrir de nouvelle nÃ©buleuse planÃ©taire en tant qu\'astronome amateur.\r\nPascal Le Du, astronome amateur et membre du club PÃ©gase.'),
(4, 'ConfÃ©rence', 'Centre socio culturel de Saint-Renan', '2020-10-04 15:00:00', 'La conquÃªte spatiale : de l\'eolipyle Ã  la Lune.\r\nRonan Perrot, prÃ©sident du club PÃ©gase.');

-- --------------------------------------------------------

--
-- Structure de la table `f_categories`
--

CREATE TABLE `f_categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `f_categories`
--

INSERT INTO `f_categories` (`id`, `nom`) VALUES
(1, 'observations planÃ©taires'),
(2, 'observations du ciel profond'),
(3, 'MatÃ©riels astro'),
(4, 'Informatique'),
(5, 'Photographie');

-- --------------------------------------------------------

--
-- Structure de la table `f_messages`
--

CREATE TABLE `f_messages` (
  `id` int(11) NOT NULL,
  `date_heure_post` datetime NOT NULL,
  `date_heure_edition` datetime NOT NULL,
  `contenu` text NOT NULL,
  `id_f_topics` int(11) NOT NULL,
  `id_Membres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `f_souscategories`
--

CREATE TABLE `f_souscategories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_f_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `f_souscategories`
--

INSERT INTO `f_souscategories` (`id`, `nom`, `id_f_categories`) VALUES
(1, 'Soleil', 1),
(2, 'Mercure', 1),
(3, 'Fonds du ciel', 2),
(4, 'Galaxies', 2),
(5, 'TÃ©lÃ©scopes', 3),
(6, 'Lunettes', 3),
(7, 'MatÃ©riels', 4),
(8, 'Logiciels', 4),
(9, 'Techniques', 5),
(10, 'Topic dÃ©diÃ© aux paysages de nuit', 5),
(11, 'VÃ©nus', 1),
(12, 'Terre/Lune', 1),
(13, 'Mars', 1),
(14, 'Jupiter', 1),
(15, 'Saturne', 1),
(16, 'Uranus', 1),
(17, 'Neptune', 1),
(18, 'Divers', 1),
(19, 'Montures', 3),
(20, 'Appareils Photos', 3),
(21, 'cameras Webcams', 3),
(22, 'Aide', 4),
(23, 'Divers', 4),
(24, 'NÃ©buleuses', 2);

-- --------------------------------------------------------

--
-- Structure de la table `f_topics`
--

CREATE TABLE `f_topics` (
  `id` int(11) NOT NULL,
  `sujet` text NOT NULL,
  `date_heure_creation` datetime NOT NULL,
  `notif_createur` tinyint(1) NOT NULL,
  `id_Membres` int(11) NOT NULL,
  `id_f_souscategories` int(11) NOT NULL,
  `id_f_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `id` int(11) NOT NULL,
  `dataCaption` varchar(256) NOT NULL,
  `imagePath` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id`, `dataCaption`, `imagePath`) VALUES
(1, 'Galaxie 1', 'image001.jpg'),
(2, 'Galaxie 2', 'image002.jpg'),
(3, 'AndromÃ¨de', 'image003.jpg'),
(4, 'NÃ©buleuse', 'image004.jpg'),
(5, 'Saturne', 'image005.jpg'),
(6, 'Jupiter', 'image006.jpg'),
(7, 'Mars', 'image007.jpg'),
(8, 'Orion', 'image008.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `galeriepending`
--

CREATE TABLE `galeriepending` (
  `id` int(11) NOT NULL,
  `description` varchar(256) NOT NULL,
  `imagePath` varchar(32) NOT NULL,
  `id_Membres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livredors`
--

CREATE TABLE `livredors` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pwd` varchar(256) NOT NULL,
  `actif` varchar(3) NOT NULL DEFAULT 'oui',
  `fonction` int(11) NOT NULL DEFAULT 1,
  `adresse` varchar(64) NOT NULL,
  `codePostale` int(11) NOT NULL,
  `ville` varchar(32) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(64) NOT NULL,
  `id_Associations` int(11) NOT NULL DEFAULT 1,
  `loginError` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `login`, `pwd`, `actif`, `fonction`, `adresse`, `codePostale`, `ville`, `tel`, `email`, `id_Associations`, `loginError`) VALUES
(1, 'invité', 'invité', 'invitÃ©', '', 'oui', 0, '', 0, '', '', '', 1, 0),
(2, 'admin', 'admin', 'admin', '$2y$10$0TcH1nbT2AXpLYNhPKGi3uRoEUyI0KOE5qXobEWYLE5bv8hSKSM/y', 'oui', 3, '', 0, '', '', 'admin@ronald-begoc.fr', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `lue` tinyint(1) NOT NULL,
  `id_Membres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `confirme` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `defaultPwd` varchar(256) NOT NULL,
  `essaisMax` int(11) NOT NULL DEFAULT 5,
  `dureeSession` int(11) NOT NULL DEFAULT 600,
  `poidsPhoto` int(11) NOT NULL DEFAULT 2,
  `poidsThumb` int(11) NOT NULL DEFAULT 200,
  `superadminLogin` varchar(16) NOT NULL,
  `superadminPwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `defaultPwd`, `essaisMax`, `dureeSession`, `poidsPhoto`, `poidsThumb`, `superadminLogin`, `superadminPwd`) VALUES
(1, '$2y$10$gAheq4fkTlN7ZBhvTCNsyOtw.3SOFukFr3KlP91vhSNsSXy4nF/g6', 5, 1200, 2, 200, 'superAdmin', '$2y$10$Ixeb2p1eSyDSjFDavgGKe.HTcJIdMJqoID2Dq2dV4t/xMs.tKkU6K');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Articles_Membres_FK` (`id_Membres`);

--
-- Index pour la table `articlesimages`
--
ALTER TABLE `articlesimages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `f_categories`
--
ALTER TABLE `f_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `f_messages`
--
ALTER TABLE `f_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_messages_Membres0_FK` (`id_Membres`),
  ADD KEY `f_messages_f_topics_FK` (`id_f_topics`);

--
-- Index pour la table `f_souscategories`
--
ALTER TABLE `f_souscategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_souscategories_f_categories_FK` (`id_f_categories`);

--
-- Index pour la table `f_topics`
--
ALTER TABLE `f_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `_topics_f_souscategories_FK` (`id_f_souscategories`),
  ADD KEY `f_topics_Membres_FK` (`id_Membres`),
  ADD KEY `f_topics_f_categories_FK` (`id_f_categories`);

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `galeriepending`
--
ALTER TABLE `galeriepending`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeriePending_Membres_FK` (`id_Membres`);

--
-- Index pour la table `livredors`
--
ALTER TABLE `livredors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Membres_Associations_FK` (`id_Associations`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_Membres_FK` (`id_Membres`);

--
-- Index pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `articlesimages`
--
ALTER TABLE `articlesimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `associations`
--
ALTER TABLE `associations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `f_categories`
--
ALTER TABLE `f_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `f_messages`
--
ALTER TABLE `f_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `f_souscategories`
--
ALTER TABLE `f_souscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `f_topics`
--
ALTER TABLE `f_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `galeriepending`
--
ALTER TABLE `galeriepending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livredors`
--
ALTER TABLE `livredors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `Articles_Membres_FK` FOREIGN KEY (`id_Membres`) REFERENCES `membres` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `f_messages`
--
ALTER TABLE `f_messages`
  ADD CONSTRAINT `f_messages_Membres0_FK` FOREIGN KEY (`id_Membres`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `f_messages_f_topics_FK` FOREIGN KEY (`id_f_topics`) REFERENCES `f_topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `f_souscategories`
--
ALTER TABLE `f_souscategories`
  ADD CONSTRAINT `f_souscategories_f_categories_FK` FOREIGN KEY (`id_f_categories`) REFERENCES `f_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `f_topics`
--
ALTER TABLE `f_topics`
  ADD CONSTRAINT `_topics_f_souscategories_FK` FOREIGN KEY (`id_f_souscategories`) REFERENCES `f_souscategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `f_topics_Membres_FK` FOREIGN KEY (`id_Membres`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `f_topics_f_categories_FK` FOREIGN KEY (`id_f_categories`) REFERENCES `f_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `galeriepending`
--
ALTER TABLE `galeriepending`
  ADD CONSTRAINT `galeriePending_Membres_FK` FOREIGN KEY (`id_Membres`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `Membres_Associations_FK` FOREIGN KEY (`id_Associations`) REFERENCES `associations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_Membres_FK` FOREIGN KEY (`id_Membres`) REFERENCES `membres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

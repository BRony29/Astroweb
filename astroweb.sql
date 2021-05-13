-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 mai 2021 à 21:31
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `astroweb`
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
(1, 'Observations: Ph&eacute;nom&egrave;nes astronomiques - Mars 2020', 'newactu02.png', '2020-11-11', 'Retrouver les &eacute;ph&eacute;m&eacute;rides pour le mois de mars 2020. Tous les ph&eacute;nom&egrave;nes remarquables du ciel &eacute;toil&eacute; du mois de mars.\r\n[url=/articles/consulter/4]Consulter cet article...[/url]'),
(2, 'Astronomie: Le Système Solaire 01 : Intoduction', 'newactu02.png', '2020-11-12', 'Les articles dédiés au Système Solaire vous expliquerons sa composition, ainsi que comparer les distances entre les planètes, les tailles des planètes.\r\n[url=/articles/consulter/7]Consulter cet article...[/url]'),
(3, 'Astronomie: Le Système Solaire 04 : Les distances', 'newactu01.png', '2020-11-30', 'Cet article traite des distances dans le Système Solaire. Les distances exprimées sont importantes, on parlera ici en millions voir en milliards de kilomètres.\r\n[url=/articles/consulter/8]Consulter cet article...[/url]'),
(4, 'Astronomie: Le Système Solaire 05 : Les tailles', 'newactu04.png', '2020-11-30', 'Cet article traite des tailles dans le Système Solaire. Elles sont très diverses et contrairement à ce que l\'on pourrait penser, ce ne sont pas forcément toutes les planètes qui tiennent le haut du panier.\r\n[url=/articles/consulter/9]Consulter cet article...[/url]'),
(5, 'Astronomie: Le Système Solaire 06 : Les températures', 'newactu03.png', '2020-12-01', 'Notre étoile (Le Soleil), est notre source de chaleur. Grace à lui, la vie est possible sur notre planète.\r\nMais comme tout bon moyen de chauffage, plus on s’éloigne de lui, plus la température chute.\r\n[url=/articles/consulter/10]Consulter cet article...[/url]'),
(6, 'Astronomie: Le Système Solaire 07 : Les révolutions', 'newactu02.png', '2020-12-01', 'Chaque planète dispose d’une durée de révolution différentes, qui augmente avec la distance qui la sépare du Soleil.\r\n[url=/articles/consulter/11]Consulter cet article...[/url]');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `categorie` varchar(32) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `contenu` text NOT NULL,
  `id_Membres` int(11) NOT NULL,
  `id_Actualites` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `categorie`, `titre`, `date`, `contenu`, `id_Membres`, `id_Actualites`) VALUES
(1, 'Matériel', 'Les différentes montures de télescopes', '2020-11-13', 'Il existe 2 types de montures pour un télescope :\r\n\r\n[center][img]/public/articles/montures.gif[/img]ï»¿[/center]\r\n[color=#ffff00][size=150]La monture azimutale[/size][/color]\r\n\r\nUne monture azimutale permet de déplacer le tube optique parallèlement et perpendiculairement au sol. Un astre se déplaçant de biais dans le ciel, il convient de combiner ces 2 mouvements, pour suivre la progression de l\'astre dans le ciel.\r\n\r\nCe type de monture est généralement utilisé pour faire de l\'observation simple. Elle est utilisée par exemple, sur les télescopes de type Dobson, ou on oriente ce dernier à la main, pour viser l\'objet à observer.\r\n\r\n[color=#ffff00][size=150]La monture équatoriale[/size][/color]\r\n\r\nUne monture équatoriale, est une monture azimutale, montée sur une table équatoriale. Elle permet de suivre le même astre en faisant pivoter l\'instrument sur un seul axe, l\'autre étant parallèle à l\'axe de rotation de la Terre. Pour cela, les montures équatoriales possèdent quatre axes :\r\n\r\n[list][*]Deux permettent de mettre en station la monture.[/*][*]Les deux autres servent à orienter l\'instrument selon les coordonnées célestes, en déclinaison et en ascension droite.[/*][/list]\r\nC\'est la monture généralement utilisée sur les télescopes des astronomes amateurs. Une fois la prise en main effectuée, la monture équatoriale donne un excellent confort d\'utilisation, notamment pour suivre un astre. Cependant la mécanique d\'une monture équatoriale est sujette à de fortes contraintes : porte-à-faux, flexions,  etc… nécessitant une  grande rigidité de ses supports et l’ajustage méticuleux de ses  engrenages.', 1, 0),
(2, 'Astronomie', 'Pourquoi les étoiles changent dans le ciel d\'un mois sur l\'autre ?', '2020-11-13', 'Aujourd\'hui, je vais expliquer ce principe. Tout d\'abord, il faut commencer par les bases de l\'astronomie.\r\nLa Terre tourne autour du Soleil en 365 jours un quart. Chaque mois est d\'fini par un signe zodiacal. Mais pourquoi ?\r\n\r\n\r\n[center][img]/public/articles/zodiaque2.jpg[/img][/center]\r\n\r\nComme on peut le voir sur cette image, si on trace un droite entre la Terre et le Soleil, on aperçoit dans le prolongement de cette droite, à quelques millions de kilomètres, un signe zodiacal.\r\n\r\nChaque soir les étoiles se déplacent de 360°/365jours par jour. Par analogie, chaque mois, les constellations se déplacent de 30° dans le ciel.\r\n\r\nC\'est pour cela que nous observons des constellations différentes saisons après saison.\r\n\r\nSi cela est vrai pour les constellations, vous constaterez ceci pour toutes les étoiles.\r\n\r\n\r\n[center][img]/public/articles/Animation2.gif[/img][/center]\r\n\r\nDans cette animation, vous pourrez observer les positions des étoiles sur une année. Vous constaterez que les constellations se déplacent d\'Ouest en Est.', 1, 0),
(3, 'Observations', 'Phénomènes astronomiques - Mars 2020', '2020-11-27', '[center][img]/public/articles/Actualite_astronomique_mars2020_page1.jpg[/img][/center]ï»¿\r\n[center][img]/public/articles/Actualite_astronomique_mars2020_page2.jpg[/img][/center]', 1, 1),
(4, 'Astronomie', 'Le Système Solaire 01 : Introduction', '2020-11-27', 'Cet ensemble d\'articles va vous expliquer la composition du système solaire, comparer les distances entre les planètes et leur tailles.\r\n\r\n[list][*][url=/articles/consulter/4]Ch01. Introduction[/url][/*][*][url=/articles/consulter/5]Ch02. De quoi est composer le système solaire[/url][/*][*][url=/articles/consulter/6]Ch03. Les planètes telluriques et les planètes gazeuses[/url][/*][*][url=/articles/consulter/8]Ch04. Les distances[/url][/*][*][url=/articles/consulter/9]Ch05. Les tailles[/url][/*][*][url=/articles/consulter/10]Ch06. Les températures[/url][/*][*][url=/articles/consulter/11]Ch07. Les révolutions[/url][/*][*][url=/articles/consulter/12]Ch08. Les axes de rotation[/url][/*][*][url=/articles/consulter/13]Ch09. Où sommes-nous ?[/url]\r\n[url=/articles/consulter/13][/url][/*][/list]\r\n[color=#ffff00][size=150]Quel âge a notre système solaire ?[/size][/color]\r\n\r\nOn estime que notre système solaire est âgé de 4,5 milliards d\'années.\r\n\r\n[color=#ffff00][size=150]En résumé[/size][/color]\r\n\r\n[center][img]/Public/articles/solar-system-11.gif[/img][/center]\r\n\r\n[color=#ffff00][size=150]Crédits :[/size][/color]\r\n\r\n[list][*][url=https://acegif.com]https://acegif.com[/url][/*][*][url=http://systeme-solaire.univers-et-espace.com]http://systeme-solaire.univers-et-espace.com[/url][/*][/list]', 1, 2),
(5, 'Astronomie', 'Le Système Solaire 02 : De quoi est composé le système solaire ?', '2020-11-27', 'Le Système Solaire est composé d\'une étoile (Le Soleil) et d\'un ensemble d\'astres et objets célestes, qui gravitent autour de lui.\r\nParmi ces objets célestes, on retrouve 8 planètes, et voici une petite phrase, qui permettra de retenir facilement les positions:\r\n\r\n[quote]&quot;Me Voici Tout Mouillé, Je Suis Un Nuage&quot;[/quote][list][*]M : Mercure[/*][*]V : Vénus[/*][*]T : Terre[/*][*]M : Mars[/*][*]J : Jupiter[/*][*]S : Saturne[/*][*]U : Uranus[/*][*]N : Neptune[/*][/list]\r\n[center][img]/public/articles/solar-system-01.jpg[/img][/center]\r\nPluton ayant été déclassée en planète naine, le 24 Août 2006, par l\'Union Astronomique Internationale, elle ne fait plus partie de la liste des planètes.\r\n\r\nIl existe en plus des 8 planètes :\r\n\r\n[list][*]Des milliers d\'astéroïdes : composés de roches et de minéraux métalliques essentiellement. Leur taille est extrêmement variable, de plusieurs centaines de kilomètres aux grains de poussière. Ils sont regroupés majoritairement dans la Ceinture d\'astéroïdes, située entre Mars et Jupiter.[/*][*]Des milliers de comètes : composées de glace et de poussières, de plusieurs milliers de corps glacés, qui gravitent dans la Ceinture de Kuiper.[/*][*]De plusieurs dizaines de planètes naines situées au delà de l\'orbite de Pluton.\r\n[/*][/list]', 1, 0),
(6, 'Astronomie', 'Le Système Solaire 03 : Les planètes telluriques, les planètes gazeuses et les planètes naines', '2020-11-27', 'On peut classer les planètes en 3 catégories :\r\n\r\n[list][*]les planètes telluriques.[/*][*]les planètes gazeuses.[/*][*]Les planètes naines.[/*][/list]\r\nUne [b]planète tellurique[/b] est une planète composée essentiellement de roches et de métal. Elle possède en général trois enveloppes concentriques (noyau, manteau et croûte). Sa surface est solide et est composée principalement de matériaux non volatils, généralement des roches silicatées et du fer métallique. Sa densité est comprise entre 4 et 5,7. Mercure, Vénus, la Terre et Mars font parties des planètes telluriques.\r\n\r\n[center][img]/public/articles/planetes_telluriques.png[/img][/center]\r\n\r\nUne [b]planète gazeuse[/b] est une planète composèe essentiellement de gaz légers, c\'est à dire d\'hydrogène et d’hélium. Jupiter, Saturne, Uranus et Neptune font parties des planètes gazeuses.\r\n\r\n[center][img]/public/articles/planetes_gazeuses.png[/img][/center]\r\n\r\nUne [b]planète naine [/b]est un objet céleste du Système solaire de classe intermédiaire entre une planète et un petit corps du Système solaire. Depuis 2008, cinq objets sont reconnus comme planètes naines par l\'UAI : Céres, Pluton, Hauméa, Makémaké et Eris. Les objets connus les plus  susceptibles d\'être ajoutés à  cette catégorie sont Gonggong, Charon, Quaoar, Sedna, Orcus et Hygie.\r\n\r\n\r\n[center][img]/public/articles/planetes_naines.png[/img][/center]\r\n\r\n[color=#ffff00][size=150]Glossaire[/size][/color]\r\n\r\nUne [b]planète tellurique [/b]est une planè¨te composée essentiellement de roches et de métal. Elle possède en général trois enveloppes concentriques (noyau, manteau et croûte). Sa surface est  solide et est composée principalement de matériaux non volatils, généralement des roches silicatées et du fer métallique. Sa densité est comprise entre 4 et 5,7.\r\n\r\nUne [b]planète gazeuse [/b]est une planète composée essentiellement de gaz légers, c\'est à dire d-hydrogène et d’hélium.\r\n\r\nUne [b]planète naine [/b]est un objet de classe intermédiaire entre une planè¨te et un petit corps du Système solaire.', 1, 0),
(7, 'Astronomie', 'Les saisons', '2020-12-01', '[size=100][b]Pourquoi existe-t\'il des saisons sur Terre ?\r\n[/b][/size]\r\nVous allez comprendre ce principe. La Terre dispose d\'un axe de rotation de 23.5 °. Et cette dernière tourne autour du Soleil en 365.25 jours. C\'est ce que l\'on appelle la Révolution de la Terre.\r\n\r\n[center][img]/public/articles/saisons.png[/img]ï»¿[/center]\r\nDu fait de sa position par rapport au Soleil, les rayons atteignent la Terre sur une surface plus ou moins grande.\r\n\r\n[color=#ffff00][size=150]Solstices d\'été et d\'Hiver[/size][/color]\r\n\r\n[color=#1e84cc][size=100][b]En Été[/b][/size][/color]\r\n\r\n[center][img]/public/articles/Solstice-dEte.png[/img]ï»¿[/center]\r\n\r\nSi on se réfère au dessin ci-dessus, l\'axe de positionnement de la France est symbolisé par le trait bleu. La Terre est frappée par les rayons du Soleil, avec un surface plus au moins grande. Ici, en été, les rayons du Soleil sont concentrés sur une petite surface.\r\n\r\nDans cette configuration, l\'hémisphère Nord est baigné par les rayons du Soleil. Par conséquent l\'hémisphère Nord est en été. L\'hémisphère Sud, recevant moins de rayons du Soleil, est en hiver.\r\n\r\n[color=#1e84cc][size=100][b]En Hiver[/b][/size][/color]\r\n\r\n[center][img]/public/articles/Solstice-dHiver1.png[/img]ï»¿[/center]\r\n\r\nA l\'inverse, au moment du solstice d\'Hiver, les rayons du Soleil s\'étendent sur une plus grande surface de la planète, par conséquent, on récolte moins de chaleur.\r\n\r\nDans cette configuration, l\'hémisphère Nord reçoit moins de rayons du Soleil, par conséquent l\'hémisphère Nord est en Hiver et l\'hémisphère Sud recevant plus de rayons du Soleil, est en été.\r\n\r\n[color=#ffff00][size=150]Équinoxes de Printemps et d\'Automne[/size][/color]\r\n\r\nA cette période de l’année, les 2 Hémisphères reçoivent autant de rayons du Soleil. Mais cela est une saison transitoire entre Hiver -&gt; Été / Été -&gt; Hiver.\r\n\r\nPar conséquent dans l’Hémisphère Nord, si on est en Été, on basculera vers l’Automne, tandis que dans l’Hémisphère Sud, qui sera en Hiver (comme expliqué ci-dessus) bascule vers le Printemps.\r\n\r\nInversement, dans l’Hémisphère Nord, si on est en Hiver, on basculera vers le Printemps, tandis que dans l’Hémisphère Sud, qui sera en Été (comme expliqué ci-dessus) bascule vers l’Automne.\r\n[color=#ffff00][size=150]\r\nAlternance des saisons[/size][/color]\r\n\r\nComme il a été expliqué plus haut, les 2 hémisphères ont des saisons opposées. Quand c\'est l\'Été dans l\'hémisphère Nord, c\'est l\'Hiver dans l\'hémisphère Sud, et vice et versa.\r\n\r\n[color=#1e84cc][size=100][b]Hémisphère Nord[/b][/size][/color]\r\n\r\nPrintemps : ~20 mars.\r\nÉté : ~21 juin.\r\nAutomne : ~23 septembre.\r\nHiver : ~21 décembre.\r\n[color=#1e84cc][b]\r\n[size=100]Hémisphère Sud[/size][/b][/color]\r\n\r\nPrintemps austral : ~23 septembre.\r\nÉté austral : ~21 décembre.\r\nAutomne austral : ~20 mars.\r\nHiver austral : ~21 juin.\r\n\r\nOn voit bien l’alternance des saisons et leurs complémentarités.\r\n\r\n[color=#ffff00][size=150]Glossaire[/size][/color]\r\n\r\n[b]Révolution :[/b] Rotation complète d’un corps mobile autour de son axe [i](axe de révolution).[/i]', 1, 0),
(8, 'Astronomie', 'Le Système Solaire 04 : Les distances', '2020-12-01', 'A cette échelle, les distances exprimées sont importantes, on parlera ici en millions voir en milliards de kilomètres.\r\n\r\n[list][*]Mercure : 58 mkm[/*][*]Vénus : 108 mkm[/*][*]Terre : 150 mkm[/*][*]Mars : 228 mkm[/*][*]Jupiter : 778 mkm[/*][*]Saturne : 1.4 Mkm[/*][*]Uranus : 2.87 Mkm[/*][*]Neptune : 4.5 Mkm[/*][/list]\r\n[b]mkm [/b]: million de kilomètres.\r\n[b]Mkm [/b]: milliard de kilomètres.\r\n\r\nOn peut simplifier si on prend comme unitée commune l\'[b]UA [/b](unité astronomique). Mais qu\'est-ce ?\r\n\r\nL\'[b]UA[/b] ou unité astronomique est une unité de longueur qui a comme référence la distance Soleil - Terre. Par conséquent 1 UA (unité astronomique) = 150 mkm. Ceci transforme les valeurs de notre liste des distances, non plus exprimé en million de kilomètres, mais en ratio par rapport à  la distance Soleil - Terre. On divise donc les distances exprimées en million/millier de kilomètres, par la distance Soleil - Terre.\r\n\r\nPrenons un exemple :\r\n Pour calculer la distance Soleil - Mercure en unité astronomique, nous allons diviser la distance que nous avons citée précédemment soit 58 mkm, par la distance Soleil - Terre soit 150 mkm. Cela nous donne environ 0.39 ua.\r\n\r\nNe vous inquiétez pas, vous allez comprendre :\r\n\r\n[list][*]Mercure : 58 mkm =&gt; 0.39 ua[/*][*]Vénus : 108 mkm =&gt; 0.72 ua[/*][*]Terre : 150 mkm =&gt; 1 ua[/*][*]Mars : 228 mkm =&gt; 1.52 ua[/*][*]Jupiter : 778 mkm =&gt; 5.2 ua[/*][*]Saturne : 1.4 Mkm =&gt; 9.5 ua[/*][*]Uranus : 2.87 Mkm =&gt; 19.2 ua[/*][*]Neptune : 4.5 Mkm =&gt; 30 ua[/*][/list]\r\nBien entendu, ces valeurs sont arrondies.\r\n\r\n[color=#ffff00][size=150]Glossaire[/size][/color]\r\n\r\n[b]mkm [/b]: million de kilomètres.\r\n[b]Mkm [/b]: milliard de kilomètres.\r\n\r\n[b]L\' unité astronomique[/b] est une unité de longueur qui a comme référence la distance Soleil - Terre. Par conséquent 1 ua (unité astronomique) = 150 mkm.', 1, 3),
(9, 'Astronomie', 'Le Système Solaire 05 : Les tailles', '2020-12-01', 'Voici la liste des tailles (diamètre estimé) de quelques corps de notre Système Solaire :\r\n\r\n[b][size=100]Les planètes :[/size][/b]\r\n\r\n[list][*]Mercure : 4 900 km[/*][*]Vénus : 12 100 km[/*][*]Terre : 12 800 km[/*][*]Mars : 6 800 km[/*][*]Jupiter : 143 000 km[/*][*]Saturne : 121 000 km[/*][*]Uranus : 51 100 km[/*][*]Neptune : 49 600 km[/*][/list]\r\n[b][size=100]Planètes naines :[/size][/b]\r\n\r\n[list][*]Pluton : 2370 km[/*][*]Eris : ~2330 km[/*][*]Makémaké : ~1430 km[/*][*]Quaoar : ~1110 km[/*][*]Sedna : ~995 km[/*][*]Hauméa : ~1960 km x 1580 km x 996 km[/*][*]Cérès : 952 km[/*][/list]\r\n[b][size=100]Quelques astéroïdes :[/size][/b]\r\n\r\n[list][*]45 Eugenia : ~214 km[/*][*]87 Sylvia : ~286 km[/*][*]52 Europa : ~315 km[/*][*]10 Hygiea : ~434 km[/*][*]Pallas : ~512 km[/*][*]Vesta : ~525 km[/*][/list]\r\n[b][size=100]Quelques satellites :[/size][/b]\r\n\r\n[list][*]Lune : 3475 km[/*][*]Io : 3643 km[/*][*]Europe : 3122 km[/*][*]Ganymède : 5262 km[/*][*]Callisto : 4820 km[/*][*]Titan : 5150 km[/*][/list]\r\n\r\n[center][img]/public/articles/taille_planetes.jpg[/img][/center]', 1, 4),
(10, 'Astronomie', 'Le Système Solaire 06 : Les températures', '2020-12-01', 'Notre étoile (Le Soleil), est notre source de chaleur. Grace à  lui, la vie est possible sur notre planète.\r\n\r\nMais comme tout bon moyen de chauffage, plus on s\'éloigne de lui, plus  la température chute. C\'est le même principe qu\'une cheminée. Plus vous  êtes prêt de votre cheminée, et plus vous vous apercevez que la température augmente.\r\n\r\nVoici un récapitulatif des temp©ratures moyennes mesurée en surface sur les différentes planètes du système solaire.\r\n\r\n[list][*]Mercure : 169 °C[/*][*]Vénus : 470 °C[/*][*]Terre : 15 °C[/*][*]Mars : -63 °C[/*][*]Jupiter : -163 °C[/*][*]Saturne : -189 °C[/*][*]Uranus : -220 °C[/*][*]Neptune : -218 °C[/*][/list]\r\n[b]Alors, pourquoi Mercure est moins chaude que vénus ?[/b]\r\n\r\nA la surface de Vénus, il fait environ 470 °C. C\'est plus que sur Mercure, où la température de surface peut atteindre jusqu\'à 430 °C en journée. L\'écart de température entre ces deux planètes peut paraitre étonnant, car l\'orbite de Mercure est située plus près du Soleil que celle de Vénus. Alors pourquoi y fait-il moins chaud que sur sa voisine ?\r\n\r\nTout simplement parce que Mercure ne possède pas d\'atmosphère, contrairement à  Vénus qui est dotée d\'une épaisse atmosphère, riche en dioxyde de carbone et en nuages d\'acide sulfurique. Cette atmosphère conserve la chaleur, grâce à un puissant phénomène que l\'on connait bien sur Terre : l\'effet de serre.', 1, 5),
(11, 'Astronomie', 'Le Système Solaire 07 : Les révolutions', '2020-12-01', 'Chaque planète dispose d\'une durée de révolution différente, qui augmente avec la distance qui la sépare du Soleil.\r\n\r\n[list][*]Mercure : 88 jours[/*][*]Vénus : 225 jours[/*][*]Terre : 365,25 jours[/*][*]Mars : 1 an et 322 jours[/*][*]Jupiter : environ 12 ans[/*][*]Saturne : environ 30 ans[/*][*]Uranus : 84 ans[/*][*]Neptune : environ 65 ans[/*][/list]\r\n[color=#ffff00][size=150]Glossaire[/size][/color]\r\n\r\n[b]Révolution[/b] : Temps que met une planète, pour faire le tour du Soleil.', 1, 6),
(12, 'Astronomie', 'Le Système Solaire 08 : Les axes de rotations.', '2020-12-01', 'Chaque planète du système solaire dispose d\'un axe de rotation, qui lui est propre.\r\n\r\n[center][img]/Public/articles/Inclinaison_axiale_saisons_plan%c3%a8tes_ss.jpg[/img]\r\nï»¿[/center]Comme on peut le voir, l\'inclinaison des planètes est plus ou moins  forte. A noter, mention spéciale pour Uranus, qui dispose d\'un axe  \r\nquasiment couchée, avec ces 82°. On dit qu\'elle possède une orbite  couchée.\r\n\r\nAutre mention, toutes les planètes tournent dans le même sens, sauf une : Vénus, qui tourne dans le sens contraire.', 1, 0),
(13, 'Astronomie', 'Le Système Solaire 09 : Où sommes-nous ?', '2020-12-02', 'Le Système solaire évolue dans l\'un des bras de notre galaxie spirale, la Voie lactée, à quelque 26.000 [i]années-lumière[/i] de son centre.\r\n\r\n\r\n[center][img]/Public/articles/Voie_Lact%c3%a9e_localisation.jpg[/img][/center]\r\n\r\n[color=#ffff00][size=150]Glossaire[/size][/color][b]\r\n\r\nVitesse de la lumière[/b] dans le vide : représente une constante physique universelle et vaut 299 792 458 m/s. On l\'arrondit à 300 000 km/s.\r\n\r\n[b]Année-lumière : [/b]représente  une unité de mesure de distance. Elle représente la distance parcourue  par la lumière dans le vide en 1 année julienne (365, 25 jours =&gt; 31  557 600 secondes). Ceci donne 31 557 600 s * 300 000 km/s = 9,461 × 10[sup]12[/sup] km. On arrondira cette valeur à 10 000 000 000 000 (dix mille milliards) de kilomètres.', 1, 0),
(14, 'Matériel', 'Les différents moyens d\'observation et les types de télescopes 01 : Introduction', '2020-12-02', 'Nous allons aborder ici, les différents moyens et les différents types de télescopes, qui existent sur le marché, et comparer  les avantages et inconvénients de chacun. Si vous avez fait un tour sur  Internet, vous aurez croiser différents termes comme réfracteur, lunettes astronomiques, Dobson, Newton, etc...\r\n\r\nNe vous inquiétez pas, nous allons tenter d\'éclaircir tout ceci.\r\n\r\nChaque type de télescope possède des avantages, des inconvénients et termes de facilité d\'utilisation, de prix, et de ce que vous voulez observer.\r\n\r\nIl existe 3 types principaux de télescopes :\r\n\r\n[list][*][url=/articles/consulter/15]Les réfracteurs[/url][/*][*][url=/articles/consulter/16]Les réflecteurs[/url][/*][*][url=/articles/consulter/17]Les catadioptriques[/url][/*][/list]\r\n[color=#ffff00][size=150]Conclusion[/size][/color]\r\n\r\nMaintenant, vous devez être incollable !\r\n\r\nVous vous posez des questions ? : venez nous voir, nous nous efforcerons de vous aiguiller dans vos choix de matériel.\r\nVous voulez observer sans faire un gros investissement ? : commencez par une simple paire de jumelles 10x50.\r\n\r\n[color=#ffff00][size=150]Crédits[/size][/color]\r\n\r\n[list][*][url=https://www.astrofiles.net]https://www.astrofiles.net[/url][/*][*][url=http://www.achat-telescope.net]http://www.achat-telescope.net[/url][/*][/list]', 1, 0),
(15, 'Matériel', 'Les différents moyens d\'observation et les types de télescopes 02 : Les réfracteurs', '2020-12-04', 'Aussi appelée lunette astronomique, elle est constituée de 2 lentilles. \r\n\r\n[center][img]/Public/articles/lunette_astro.jpg[/img]ï»¿[/center]\r\n\r\nLa lumière est collectée à  partir de la [b]lentille [/b]située à l\'avant du télescope. La [b]lentille [/b]est courbée, de façon ç faire converger la lumière sur le [b]point focale[/b]. C\'est pour cela que l\'on parle de [b]réfracteur[/b], car la lumière est réfractée à cause de la lentille. \r\n\r\n[color=#ffff00][size=150]Avantages du réfracteur:[/size][/color]\r\n\r\n[list][*]Il est robuste et solide.[/*][*]Il est simple de conception. C\'est le premier système à avoir été inventé, il y a de cela 4 siècles. Cette simplicité est un gage de qualité.[/*][*]Le tube étant fermé avec les lentilles de chaque côté, le système ne prend jamais de poussières, et donc ne nécessite aucun entretien.[/*][*]Ce type de télescope n\'est pas sensible au courant d\'air, ni au changement de température (apparition de buée), ce qui permet d\'obtenir des images plus nettes.[/*][*]Trè¨s peu encombrant, donc plus facile à transporter.[/*][*]Excellent pour l\'observation planétaire.[/*][/list]\r\n[color=#ffff00][size=150]Inconvénients du réfracteur:[/size][/color]\r\n\r\n[list][*]Ce télescope peut parfois subir un effet appelé [i]« aberration chromatique »[/i] (distorsion des couleurs). Cet effet produit une sorte d\'arc-en-ciel autour de l\'image observ\'e, ce qui peut avoir pour cons\'quence de créer une image floue et de mauvaise qualité.[/*][*]Selon la longueur d\'onde de lumière projetée, l\'objet capté peut ne pas être correctement restitué dans l\'oculaire : les ultraviolets ne peuvent pas traverser la lentille des lunettes.[/*][*]Plus l\'épaisseur de la lentille augmente, moins la lumière passe facilement.[/*][*][b]La lunette astronomique n\'est pas adaptée pour observer le ciel profond.[/b][/*][*]A diamètre égal, la lunette est plus performante qu\'un télescope, mais son prix est exorbitant.[/*][/list]', 1, 0),
(16, 'Matériel', 'Les différents moyens d\'observation et les types de télescopes 03 : Les réflecteurs', '2020-12-04', 'Ce type de télescope est doté d\'un [b]miroir primaire[/b] concave, permettant de collecter et de concentrer la lumière sur le [b]miroir secondaire[/b], qui renvoie la lumière vers l\'oculaire.\r\n\r\nCe type de télescope permet d\'éviter l\'effet chromatique induit par les  lunettes astronomiques. Il existe deux principaux types de  télescopes  rélecteurs :\r\n\r\n[list][*]Le télescope de Newton[/*][*]Le télescope de Cassegrain.[/*][/list]\r\n[color=#ffff00][size=150]Le télescope de Newton[/size][/color]\r\n\r\nC’est l’un des télescopes classiques très prisés par le grand public. Ce  modèle a été imaginé par Isaac Newton en voulant améliorer la lunette de Galilée. Ainsi, le miroir primaire collecte la lumière venant du ciel  tandis que le miroir secondaire redirige la lumière recueillie vers  l’oculaire situé sur le côté du tube. La plupart des télescopes de Newton sont montés sur des montures équatoriales pour suivre aisément les mouvements des astres dans le ciel. Ils offrent ainsi un champ de  vision élargi. Son tube protège ces instruments contre le gel et la  buée. Parmi les Newton, on compte le Dobson monté sur des montures  azimutales, qui a notamment rencontré un grand succès. Une conception  compacte et légère.\r\n\r\n[center][img]/Public/articles/fop_newt.gif[/img]ï»¿[/center]\r\n\r\n[color=#ffff00][size=150]Le télescope de Cassegrain[/size][/color]\r\n\r\nImaginé par Laurent Cassegrain, ce sous-type de télescope dispose d’un  miroir primaire percé en son centre, c’est ce qui le diffère de  l’ouvrage d’Isaac Newton. En principe, il embarque un miroir parabolique convergent et un miroir hyperbolique divergent. De cette façon, l’image  se forme derrière l’appareil. Ce type de construction est plus compact.\r\n\r\n[center][img]/Public/articles/500px-Casegraintelescope.png[/img]ï»¿[/center]\r\n\r\n[color=#ffff00][size=150]Avantages du réflecteur:[/size][/color]\r\n\r\n[list][*]Le télescope ne subit aucune aberration chromatique, car toute la lumière qui réfléchit le miroir ne souffre d’aucune distorsion.[/*][*]Le coût de fabrication d’un télescope est bien moindre qu’une lunette, ce qui se répercute sur le prix grand public.[/*][*]La taille du diamètre est beaucoup plus grande que la lunette, donc plus de lumière est collectée, et par conséquent, le télescope permet l’observation d’un ciel profond (Nébuleuses, galaxies, amas globulaires…).[/*][*]Beaucoup de télescopes sont adaptés pour la pratique de l’astrophotographie.[/*][*]Conception compacte et légère pour les Dobson.[/*][*]Très apprécié des astronomes amateurs grâce à la confortable position du porte-oculaire.[/*][*]Le tube protège les télescopes de Newton contre la buée et le gel.[/*][*]Grâce à son système optique simple, le Newton est un instrument facile à régler (collimation).[/*][*]Le type de construction du Cassegrain lui permet d’être plus compact.[/*][*]Au-dessus d’un rapport focal de f/6, les images recueillies sont très lumineuses [/*][/list]\r\n[color=#ffff00][size=150]Inconvénients du réflecteur:[/size][/color]\r\n\r\n[list][*]Assez encombrants, prévoir de quoi les transporter.[/*][*][b]Plus sensibles aux turbulences atmosphériques que les lunettes.[/b][/*][*]Collimation parfois difficile.[/*][*]Il est nécessaire d’entretenir régulièrement son télescope (nettoyage).[/*][*]Plus fragiles qu’une lunette ou qu’un télescope catadioptrique.[/*][*]Aberration optique : la coma (donne une sorte d’aspect de comète à l’objet observé, ainsi que des contours irisés).[/*][*]Les tubes de 200 mm commencent à devenir vraiment encombrants, chers et lourds.[/*][*]Ces types de télescopes ne sont pas adaptés à l’observation terrestre. [/*][/list]', 1, 0),
(17, 'Matériel', 'Les différents moyens d\'observation et les types de télescopes 04 : Les catadioptriques', '2020-12-04', 'Le télescope catadioptrique combine la construction du réflecteur  (construction avec miroirs) et la construction du réfracteur  (construction avec lentilles). L’image produite par ce type de télescope est composée d’un mélange de réfraction et de réflexion.\r\n\r\n[center][img]/Public/articles/Objectif_catadioptrique.png[/img][/center]\r\nLes catadioptriques les plus courantes sont :\r\n\r\n[list][*]Le Schmidt-Cassegrain.[/*][*]Le Maksutov-Cassegrain.[/*][*]Le Ritchey-Chrétien.[/*][/list]\r\n[color=#ffff00][size=150]Le télescope Schmidt-Cassegrain[/size][/color]\r\n\r\nLe télescope Schmidt-Cassegrain dispose d’un miroir primaire  sphérique (et non parabolique, contrairement au télescope de Cassegrain)  et d’une lentille correctrice, que l’on appelle « [b]Lame de Schmidt[/b] ».\r\n\r\n\r\n[center][img]/Public/articles/Telescope_schmidt_cassegrain_complet.png[/img]ï»¿[/center]\r\nCe [b]télescope séduit un grand nombre d’astronomes amateurs par sa grande polyvalence[/b]. Il est très doué pour l’observation des planètes, mais également pour le ciel profond, sans oublier l’astrophotographie !\r\n\r\n[b][color=#1e84cc][size=100]Avantages du Schmidt-Cassegrain:[/size][/color][/b]\r\n\r\n[list][*]La polyvalence : on a rassemblé en un seul appareil les avantages d’une lunette astronomique et ceux d’un télescope.[/*][*]C’est le compagnon idéal de l’astrophotographe.[/*][*]Les images subissent très peu de nuisance grâce au tube optique fermé.[/*][*]La coma est très peu présente.[/*][*]Il est très bon pour : l’observation des planètes, l’observation du ciel profond, et même l’observation de la nature ![/*][*]Il restitue des images de très grande qualité sur un champ large.[/*][*][b]La fiabilité et la robustesse d’un télescope de ce type ne  sont plus à démontrer : c’est l’un des préférés des astronomes amateurs[/b].[/*][*]Le Schmidt-Cassegrain bénéficie d’un très large choix d’accessoires en tous genres.[/*][*]Sa grande compacité le rend très facile à transporter.[/*][*]L’entretien est très aisé, la collimation plutôt rare. [/*][/list]\r\n[b][color=#1e84cc][size=100]Inconvénients du Schmidt-Cassegrain:[/size][/color][/b]\r\n\r\n[list][*]À diamètre équivalent, le Schmidt-Cassegrain revient bien plus  cher qu’un télescope de Newton, notamment à cause de sa lame de Schmidt.[/*][*]Si vous optez pour un modèle équipé d’une monture altazimutale, [b]vous aurez du mal à pratiquer l’astrophotographie[/b].[/*][*]Par rapport à un réfracteur, on peut constater une certaine perte de lumière due à l’obstruction du miroir. [/*][/list]\r\n[color=#ffff00][size=150]Le télescope Maksutov-Cassegrain[/size][/color]\r\n\r\nLes lames de Schmidt étant très coûteuses, elles ont été retirées  dans  les modèles de type Maksutov, pour faire place à un ménisque épais dont  la fabrication est plus facile et moins onéreuse.\r\n\r\nLe maksutov doit son nom à l’opticien russe Dmitri Dmitrievich Maksutov, qui s’est basé sur le Télescope Schmidt-Cassegrain pour réaliser le Maksutov-Cassegrain.\r\n\r\nLe maksutov est grosso modo un dérivé du Schmidt. [b]On peut donc affirmer qu’il possède les mêmes avantages et inconvénients que le Schmidt-Cassegrain (voir plus haut)[/b]. La différence majeure est la présence du ménisque frontal dont nous  avons parlé plus haut, et cela lui confère une qualité optique surprenante.\r\n\r\nC’est un instrument de choix pour les amateurs exigeants qui  souhaitent  observer les galaxies, la Lune, les planètes, les amas  globulaires,  les nébuleuses ou encore les étoiles doubles.\r\n[b][color=#1e84cc][size=100]\r\nAvantages du Maksutov-Cassegrain:[/size][/color][/b]\r\n\r\n[list][*]Les mêmes que ceux du Schmidt-Cassegrain.[/*][*]Images d’une qualité vraiment exceptionnelle.[/*][*]Collimation assez stable.[/*][*]Compact, donc facile à transporter.[/*][*]Permets d’effectuer de forts grossissements.[/*][*]Très pratique d’utilisation. [/*][/list]\r\n[b][color=#1e84cc][size=100]Inconvénients du Maksutov-Cassegrain:[/size][/color][/b]\r\n\r\n[list][*]Ratio de longueur focale élevé (temps d’exposition plus longs pour l’astrophotographie).[/*][*][b]Mise en température assez longue[/b].[/*][*]La collimation ne peut se faire que sur le miroir primaire.[/*][*]Le ménisque est sensible à la buée.[/*][*]Le champ de vision est restreint. [/*][/list]\r\n[color=#ffff00][size=150]Le télescope Ritchey-Chrétien[/size][/color]\r\n\r\nOn entre ici dans la catégorie très haut de gamme. [b]Ce type de télescope est conçu pour corriger toute aberration chromatique de manière spectaculaire[/b].\r\n\r\n[center][img]/Public/articles/Ritchey-Chr%c3%a9tien.png[/img][/center]\r\n\r\nSi vous avez les moyens, si vous êtes exigeant et avez de bonnes connaissances en astronomie, c’est sans aucun doute vers un télescope de type Ritchey-Chrétien que vous devez vous tourner. C’est le top du top en matière d’observation astronomique. Mais forcément, ça coute très  cher ! Les prix démarrent en général à 1000 euros.\r\n\r\nPour vous donner un ordre d’idée, [b]sachez que ce type de construction est utilisé dans la conception du télescope spatial Hubble, rien que ça ![/b]\r\n\r\n[b][color=#1e84cc][size=100]Avantages du Ritchey-Chrétien:[/size][/color][/b]\r\n\r\n[list][*]Aucune coma n’est à déplorer, la correction est tout simplement excellente.[/*][*]L’optique frise la perfection, et est bien meilleure que tous les types de télescopes décrits plus haut.[/*][*]Possibilité d’acquérir ce genre de télescopes avec ou sans lame correctrice de fermeture.[/*][*]Les télescopes équipés de lame correctrice de fermeture voient l’astigmatisme corrigé. La lame ferme le tube optique.[/*][*]Le contraste est augmenté, jusqu’à 17%.[/*][*][b]Performances exceptionnelles, notamment dans la pratique de l’astrophotographie[/b].[/*][/list][b][color=#1e84cc][size=100]Inconvénients du Ritchey-Chrétien:[/size][/color][/b]\r\n\r\n[list][*]Son prix en général plus élevé que les autres types de télescopes.[/*][*]Collimation difficile à effectuer (mais elle peut-être ajustée de manière électronique).[/*][*]Présence d’un certain astigmatisme (sauf dans la version équipée d’une lame de fermeture). [/*][/list]', 1, 0),
(18, 'Observations', 'Phénomènes astronomiques - Octobre 2020', '2020-12-15', 'ï»¿[center][img]/Public/articles/Actualite_astronomique_octobre2020_page1.jpg[/img][/center]\r\nï»¿[center][img]/Public/articles/Actualite_astronomique_octobre2020_page2.jpg[/img]ï»¿[/center]\r\nï»¿[center][img]/Public/articles/Actualite_astronomique_octobre2020_page3.jpg[/img]ï»¿[/center]\r\nï»¿[center][img]/Public/articles/Actualite_astronomique_octobre2020_page4.jpg[/img]ï»¿[/center]', 1, 0),
(19, 'Observations', 'Phénomènes astronomiques - Novembre 2020', '2020-12-15', '[center][img]/Public/articles/actu_novembre2020_page2.jpg[/img][/center]\r\n[center][img]/Public/articles/actu_novembre2020_page3.jpg[/img][/center]\r\n[center][img]/Public/articles/actu_novembre2020_page1.jpg[/img][/center]', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `articlesimages`
--

CREATE TABLE `articlesimages` (
  `id` int(11) NOT NULL,
  `imagePath` varchar(255) NOT NULL
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
(11, 'planetes_gazeuses.png'),
(12, 'planetes_naines.png'),
(13, 'planetes_telluriques.png'),
(14, 'Taille_planetes.jpg'),
(15, 'actu_novembre2020_page1.jpg'),
(16, 'actu_novembre2020_page2.jpg'),
(17, 'actu_novembre2020_page3.jpg');

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
(1, 'Astroweb', 'Adresse', 12345, 'Ville', 'xx_siret', 'xx-rna', '0123456789', 'xxxxxxx.xx@xxx.com');

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
(1, 'Conférence', 'Centre socio culturel de Saint-Renan', '2020-10-03 15:00:00', 'Le mystère astronomique de la grande forge de Buffon.\r\nEmeric Falize, Astrophysicien au CEA.'),
(2, 'Conférence', 'Centre socio culturel de Saint-Renan', '2020-10-03 17:00:00', 'Le Soleil : un vieux compagnon encore méconnu.\r\nWilly Rothhut, conférencier à l\'UTL de Brest et membre du club Pégase.'),
(3, 'Conférence', 'Centre socio culturel de Saint-Renan', '2020-10-04 11:00:00', 'Découvrir de nouvelle nébuleuse planétaire en tant qu\'astronome amateur.\r\nPascal Le Du, astronome amateur et membre du club Pégase.'),
(4, 'Conférence', 'Centre socio culturel de Saint-Renan', '2020-10-04 15:00:00', 'La conquète spatiale : de l\'eolipyle à la Lune.\r\nRonan Perrot, président du club Pégase.');

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
(1, 'observations planétaires'),
(2, 'observations du ciel profond'),
(3, 'Matériels astro'),
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
(3, 'Les Pléiades', 2),
(4, 'Galaxie d\'Andromède', 2),
(5, 'Téléscopes', 3),
(6, 'Lunettes', 3),
(7, 'Matériels', 4),
(8, 'Logiciels', 4),
(9, 'Techniques', 5),
(10, 'Topic dédié aux paysages de nuit', 5),
(11, 'Vénus', 1),
(12, 'Terre/Lune', 1),
(13, 'Mars', 1),
(14, 'Jupiter', 1),
(15, 'Saturne', 1),
(16, 'Uranus', 1),
(17, 'Neptune', 1),
(18, 'Divers', 1),
(22, 'Montures', 3),
(23, 'Appareils Photos', 3),
(24, 'cameras Webcams', 3),
(25, 'Aide', 4),
(26, 'Divers', 4);

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
(1, 'Tr&egrave;s belle galaxie !', 'image001.jpg'),
(2, 'Galaxie 2', 'image002.jpg'),
(3, 'Andromède', 'image003.jpg'),
(4, 'Nébuleuse', 'image004.jpg'),
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

--
-- Déchargement des données de la table `livredors`
--

INSERT INTO `livredors` (`id`, `pseudo`, `email`, `date`, `message`) VALUES
(1, 'Administrateur', 'admin@astroweb.fr', '2021-05-13', 'Bienvenue sur le site Astroweb !\r\nN\'hésitez pas à laisser un commentaire, et donner votre avis.\r\nBonne visite ! [sm1]');

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
  `actif` tinyint(4) NOT NULL DEFAULT 1,
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
(1, 'admin', 'admin', 'admin', '$2y$10$d36uBZ9YdSA.l7SgkJoSgez3U5rWCaMLkN1jAVbh0uh0QuZU.XI6C', 1, 3, '', 0, '', '', 'admin@astroweb.fr', 1, 0),
(2, 'invité', 'invité', 'invité', '', 1, 0, '', 0, '', '', '', 1, 0),
(3, 'Galilei', 'Galileo', 'Galilé', '$2y$10$NIyMaSvU6eCepnwdhFEKFeSV/fGiMHT/eVRZoRiigEWIpotn26ami', 1, 1, '12 rue de Lilas', 29290, 'saint-Renan', '1111111111', '1111.11@11.com', 1, 0),
(4, 'Copernic', 'Nicolas', 'Nico', '$2y$10$2WNzcK2FRZY8Rr0I0KChwO98qQoKR9TUEShNnwqkWyWrfu.I1zPAy', 1, 2, '14 rue des Roses', 29830, 'Ploudalmézeau', '2222222222', '222.2222@222.com', 1, 0),
(5, 'Guest', 'Guest', 'Guest', '$2y$10$1BxEaqalfUBYiCk69IjUB.tfZE6Xy/BGifdqpLg4Gin8UCEYXE8ze', 1, 1, 'A remplir', 0, 'A remplir', 'A remplir', 'No-reply@astroweb.fr', 1, 0);

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
(1, '$2y$10$0kAZw.oO9pQ4AvgD71DHBegR1gIoAXSyvQ6WQ4bEX8jHpOMIUuacy', 5, 1200, 2, 200, 'superAdmin', '$2y$10$Ixeb2p1eSyDSjFDavgGKe.HTcJIdMJqoID2Dq2dV4t/xMs.tKkU6K');

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
  ADD KEY `galeriePEnding_Membres_FK` (`id_Membres`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `articlesimages`
--
ALTER TABLE `articlesimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `associations`
--
ALTER TABLE `associations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `f_categories`
--
ALTER TABLE `f_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `f_messages`
--
ALTER TABLE `f_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `f_souscategories`
--
ALTER TABLE `f_souscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `f_topics`
--
ALTER TABLE `f_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `galeriepending`
--
ALTER TABLE `galeriepending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livredors`
--
ALTER TABLE `livredors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `Articles_Membres_FK` FOREIGN KEY (`id_Membres`) REFERENCES `membres` (`id`);

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
  ADD CONSTRAINT `galeriePEnding_Membres_FK` FOREIGN KEY (`id_Membres`) REFERENCES `membres` (`id`);

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

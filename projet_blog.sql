-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 11:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `commentContent` text NOT NULL,
  `postId` smallint(5) UNSIGNED DEFAULT NULL,
  `validation` enum('toValidate','validated','denied') NOT NULL,
  `commentAuthor` varchar(150) DEFAULT NULL,
  `creationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `commentContent`, `postId`, `validation`, `commentAuthor`, `creationDate`) VALUES
(24, 'J&#39;adore! ', 35, 'validated', 'Mickael ', '2021-02-14'),
(25, 'Je déteste...', 35, 'denied', 'Ludo', '2021-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` smallint(5) NOT NULL,
  `name` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `messagecontent` text NOT NULL,
  `creationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `lastname`, `mail`, `messagecontent`, `creationDate`) VALUES
(4, 'Ludovic', 'Manga', 'ludo@ipt.fr', 'Bonjour, voici mon message', '2021-02-13'),
(5, 'Ludovic', 'Manga-jocky', 'ludovic.mangaj@gmail.com', 'Bonjour\r\n', '2021-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `content` text NOT NULL,
  `userId` smallint(5) UNSIGNED NOT NULL,
  `creationDate` datetime DEFAULT NULL,
  `modificationDate` datetime DEFAULT NULL,
  `subtitle` varchar(150) DEFAULT NULL,
  `topicId` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `image`, `content`, `userId`, `creationDate`, `modificationDate`, `subtitle`, `topicId`) VALUES
(35, 'La FoodTech Not So Dark lève 20 millions d’euros avec le cofondateur d’Uber', 'img/space.jpg', '                  Le succès des « dark kitchen » n’est plus à prouver. Depuis le début de la pandémie de Covid-19, les restaurants ferment pour éviter la propagation du virus, et boostent par la même occasion ce concept qui consiste à préparer uniquement des plats à livrer. Cela fait l’affaire des startups lancées sur ce marché, et notamment de Not So Dark, qui vient d’annoncer une levée de fonds de 20 millions d’euros pour se développer à l’international. \r\nUne opération à laquelle le fonds d’investissement Kharis Capital participe à hauteur de 70%, au côté d’autres investisseurs comme Oscar Salazar, cofondateur d’Uber. Cette levée de fonds doit permettre à la jeune pousse de financer la création de 30 cuisines  en France, Espagne et Belgique principalement-, et 20 nouvelles « marques virtuelles« . Ses marques actuelles – Como Kitchen, Gaïa, JFK, Recoleta, Maison dumplings, 6AM et Torpedo – « figurent déjà dans le top des ventes des plateformes » de livraison de repas Deliveroo et Uber Eats, affirme la startup.\r\nCréée en 2020 par Clément Benoit, le fondateur du service de livraison Stuart, et Alexandre Haggai, Not So Dark a déjà ouvert neuf cuisines à Paris, Nice, Bordeaux et Barcelone. Elle emploie plus de 150 personnes pour un chiffre d’affaires mensuel d’un million d’euros et une croissance de + 30% par mois. Des résultats que la startup entend encore faire exploser, puisqu’elle prévoit notamment de recruter un millier de collaborateurs en Europe. \r\n« Nous accompagnons la croissance des plateformes de livraison. Notre modèle rentable se base sur les nouveaux besoins des consommateurs en termes de conception et de réalisation de plats de qualité, adaptés à la livraison rapide, explique Clément Benoit, cofondateur de Not So Dark. L’expérience que nous avons acquise avec Stuart nous a permis de nous développer très rapidement. À travers cette levée de fonds avec Kharis Capital, nous ambitionnons de devenir le leader du secteur en Europe » , explique le dirigeant dans un communiqué.\r\n                 ', 22, '2021-02-03 20:17:10', '2021-02-14 15:07:01', 'La startup a annoncé ce mercredi avoir procédé à une levée de fonds de 20 millions d’euros. Cela lui permettra d’ouvrir 30 cuisines &#34;fantômes&#34;', 3),
(41, 'Clubhouse, la nouvelle app qui séduit les entrepreneurs', 'img/space.jpg', '<div class=\"article-text\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-family: agrandir, arial, sans-serif;\">\r\n<p style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-family: agrandir-narrow, agrandir, arial, sans-serif; font-size: 1.125rem; line-height: 1.5rem;\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Si la crise a profit&eacute; aux applications de visioconf&eacute;rence, l&rsquo;engouement pour le podcast a lui aussi connu un bel essor. Une&nbsp;<a style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; color: #000000; text-decoration-line: none;\" href=\"https://www.lalettre.pro/Covid-19-Audion-s-interesse-a-la-consommation-audio-des-Francais-pendant-le-confinement_a22773.html\" target=\"_blank\" rel=\"noopener\">&eacute;tude r&eacute;alis&eacute;e par Happydemics pour Audion</a>&nbsp;r&eacute;v&egrave;le que 46% des Fran&ccedil;ais&middot;es ont &eacute;cout&eacute; davantage de contenu audio pendant le confinement. &laquo;&nbsp;</span><em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Avec la pand&eacute;mie, le format audio a pris tout son sens, les discussions semblent beaucoup plus chaleureuses que sur les r&eacute;seaux sociaux o&ugrave; seul l&rsquo;&eacute;crit domine&nbsp;&raquo; ,</em><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">&nbsp;d&eacute;taille Patrick Amiel, co-fondateur et CEO de 321Founded.</span></p>\r\n<p style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-family: agrandir-narrow, agrandir, arial, sans-serif; font-size: 1.125rem; line-height: 1.5rem;\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">L&rsquo;investisseur en sait quelque chose : il fait partie de ces n&eacute;o-utilisateurs de Clubhouse, une application qui r&eacute;unit pour l&rsquo;instant essentiellement des entrepreneurs, journalistes, investisseurs et observateurs de la tech. Pour ne citer qu&rsquo;eux, Elon Musk, Mark Zuckerberg et Xavier Niel y ont fait&nbsp; une apparition ces derni&egrave;res semaines. Cr&eacute;&eacute; il y a un an, le r&eacute;seau social am&eacute;ricain, uniquement bas&eacute; sur l&rsquo;audio, serait d&eacute;j&agrave; valoris&eacute; plus d&rsquo;un milliard de dollars. &laquo;&nbsp;</span><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\"><em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Dans trois mois, certains patrons du CAC 40 accepteront de participer &agrave; une discussion sur Clubhouse apr&egrave;s avoir &eacute;t&eacute; brief&eacute;s par leur DirCom&nbsp;&raquo;&nbsp;</em>, pr&eacute;dit&nbsp;</span><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Patrick Amiel.</span></p>\r\n<h2 style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-size: 2.1875rem; line-height: 2.625rem;\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: bolder;\">Dis moi qui tu connais, je te parrainerai&nbsp;</span></h2>\r\n<p style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-family: agrandir-narrow, agrandir, arial, sans-serif; font-size: 1.125rem; line-height: 1.5rem;\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Mais qu&rsquo;est-ce qui attire ces initi&eacute;s et ces patrons en vogue &agrave; venir &eacute;changer sur Clubhouse alors qu&rsquo;ils pourraient tr&egrave;s bien le faire sur WhatsApp, Zoom ou Livestorm en toute discr&eacute;tion? Pour les non initi&eacute;s, qui n&rsquo;auraient pas encore test&eacute; Clubhouse, c&rsquo;est justement cette s&eacute;lection qui semble leur plaire. Ce nouveau r&eacute;seau fonctionne sous forme de room. Une fois entr&eacute;e dans l&rsquo;application, on peut cr&eacute;er des conf&eacute;rences, entrer dans celles qui sont publiques, &eacute;couter ce qui s&rsquo;y dit et, si l&rsquo;animateur nous y autorise, intervenir pour exposer son point de vue. &laquo;&nbsp;</span><em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">On voit ce que font les personnes qu&rsquo;on suit et on re&ccedil;oit des recommandations en fonction de nos centres d&rsquo;int&eacute;r&ecirc;t. C&rsquo;est un peu comme un programme t&eacute;l&eacute; qui se construit au fil du temps&nbsp;&raquo;&nbsp;</em><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">, sugg&egrave;re Patrick Amiel.&nbsp;</span></p>\r\n<p style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-family: agrandir-narrow, agrandir, arial, sans-serif; font-size: 1.125rem; line-height: 1.5rem;\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Analyse d&rsquo;exp&eacute;rience pour les uns, publicit&eacute; pour les autres, le r&eacute;seau social a r&eacute;ussi son pari : faire parler de lui, et qui plus est, sans une once de publicit&eacute; payante. Initialement ouvert aux grands patrons de la Silicon Valley puis, sur invitation limit&eacute;e aux seuls d&eacute;tenteurs d&rsquo;un iPhone, Clubhouse n&rsquo;irait-il pas &agrave; contre courant des besoins d&rsquo;inclusion et de diversit&eacute; point&eacute;s dans le milieu de la tech &ndash; en favorisant d&eacute;lib&eacute;r&eacute;ment l&rsquo;entre soi ?&nbsp;</span><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">&nbsp;</span><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">&ldquo;</span><em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Ce positionnement un peu VIP avec un acc&egrave;s limit&eacute; &agrave; l&rsquo;application au d&eacute;part, est un argument marketing&nbsp;&raquo; ,&nbsp;</em><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">analyse Patrick Amiiel.&nbsp;</span><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Finalement, cultiver cet entre soi est une mani&egrave;re d&rsquo;asseoir sa l&eacute;gitimit&eacute;.</span></p>\r\n<blockquote style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-family: agrandir-wide, agrandir, arial, sans-serif; font-size: 1.875rem; font-style: italic; line-height: 2.625rem; border-left-width: 0.0625rem; border-left-color: #000000; margin: 2.5rem 0px 2.5rem -97.5312px; padding: 0px 0px 0px 2rem;\">\r\n<p style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-size: 1.875rem; line-height: 2.625rem;\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">&laquo;&nbsp;<em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">T</em></span><em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">ypiquement, faire appel &agrave; de grands investisseurs, au d&eacute;part, a pour but d&rsquo;attirer l&rsquo;attention des entrepreneurs en leur disant : ce sont des gens int&eacute;ressants, venez les &eacute;couter. Il fallait s&rsquo;assurer que les premi&egrave;res conf&eacute;rences &eacute;taient int&eacute;ressantes afin de s&rsquo;assurer que les gens reviennent&nbsp;&raquo; ,</em><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">&nbsp;souligne l&rsquo;investisseur.&nbsp;</span></p>\r\n</blockquote>\r\n<p style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-family: agrandir-narrow, agrandir, arial, sans-serif; font-size: 1.125rem; line-height: 1.5rem;\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Dans la r&eacute;alit&eacute;, Clubhouse est r&eacute;serv&eacute; pour l&rsquo;instant &agrave; une &eacute;lite.&nbsp; &laquo;&nbsp;<em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Il</em></span><em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\"><em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">&nbsp;y a</em>&nbsp;de gros volumes d&rsquo;entrepreneurs sur l&rsquo;appli, j&rsquo;ai actuellement 12 invitations &agrave; distribuer&nbsp;&raquo;</em><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">&nbsp;, reconna&icirc;t-il. De nombreux acteurs de l&rsquo;&eacute;cosyst&egrave;me tech y sont ainsi d&eacute;j&agrave; pr&eacute;sents. Pour peu qu&rsquo;on connaisse d&eacute;j&agrave; une ou deux personnes qui gravitent dans le monde de la tech, on trouvera toujours un moyen d&rsquo;y acc&eacute;der.&nbsp;</span><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Mais une intrusion dans ce c&eacute;nacle restera plus d&eacute;licat aux non initi&eacute;s. Etudiants, salari&eacute;s, observateurs devront de trouver un mentor pour les parrainer et leur ouvrir les portes de ce club, encore, tr&egrave;s select.&nbsp; Vous l&rsquo;aurez compris : Clubhouse demeure pour l&rsquo;instant difficile d&rsquo;acc&egrave;s au grand public.</span></p>\r\n<h2 style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-size: 2.1875rem; line-height: 2.625rem;\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-weight: bolder;\">Une opportunit&eacute; pour les marques</span></h2>\r\n<p style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-family: agrandir-narrow, agrandir, arial, sans-serif; font-size: 1.125rem; line-height: 1.5rem;\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Une fois &agrave; l&rsquo;int&eacute;rieur, &laquo;&nbsp;c<em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">&rsquo;est hyper instructif pour un entrepreneur&middot;euse d&rsquo;&eacute;couter un VC expliquer ce qu&rsquo;est un bon deal flow&nbsp;&raquo; ,&nbsp;</em>donne comme exemple Patrick Amiel, pour qui ce syst&egrave;me de parrainage favoriserait aussi les &eacute;changes. &laquo;&nbsp;<em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Toutes</em></span><em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">&nbsp;les personnes pr&eacute;sentes peuvent participer, c&rsquo;est beaucoup plus interactif qu&rsquo;une conf&eacute;rence qu&rsquo;on &eacute;coute passivement&nbsp;&raquo; &hellip;&nbsp;</em><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">&agrave; condition qu&rsquo;on vous octroie la parole.&nbsp;</span><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Rien oblige les utilisateurs &agrave; devenir conf&eacute;rencier et partager leur savoir. Mais si vous voulez recevoir les notifications des personnes que vous suivez, vous devrez aussi laisser l&rsquo;application acc&eacute;der &agrave; tous les contacts de votre r&eacute;pertoire. Clubhouse, un aspirateur &agrave; donn&eacute;es?</span></p>\r\n</div>\r\n<div class=\"read-also\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border: 0.0625rem solid #000000; margin: 1.875rem 0px 1.875rem -97.5312px; padding: 1.25rem 97.5312px 0px; font-family: agrandir, arial, sans-serif;\">\r\n<div class=\"read-also__title\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-size: 1.25rem; font-style: italic; line-height: 1.5rem; margin-bottom: 1.25rem;\">&Agrave; lire aussi</div>\r\n<div class=\"push-article\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; border-top: 0.1875rem solid #000000; display: inline-block; margin-bottom: 1.25rem; padding-top: 1.25rem; width: 550.74px;\"><a class=\"typo-tribune push-article__title\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; color: #000000; text-decoration-line: none; font-size: 1.25rem; font-weight: bold; line-height: 1.5rem;\" href=\"https://www.maddyness.com/2021/01/13/yubo-moderation-contenus-twitter/\">Le r&eacute;seau social Yubo mise sur une mod&eacute;ration accrue pour &eacute;viter les d&eacute;rives</a></div>\r\n</div>\r\n<div class=\"article-text\" style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-family: agrandir, arial, sans-serif;\">\r\n<p style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-family: agrandir-narrow, agrandir, arial, sans-serif; font-size: 1.125rem; line-height: 1.5rem;\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Cet espace ouvert et enti&egrave;rement gratuit &ndash; du moins pour le moment &ndash; laisse une grande place aux patrons du CAC40 et aux marques. C&rsquo;est sans doute elles qui pourraient bient&ocirc;t affluer sur l&rsquo;application. &ldquo;</span><em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Il y aura toujours du monde pour venir &eacute;couter un grand PDG parler business. Du c&ocirc;t&eacute; des grandes marques aussi, il y a quelques choses &agrave; faire. Bient&ocirc;t, Sephora ou L&rsquo;Or&eacute;al organiseront, elles aussi, des conf&eacute;rences sur la beautytech pour asseoir leur l&eacute;gitimit&eacute;&nbsp;&raquo;</em><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">, imagine d&eacute;j&agrave; Patrick Amiel. Quelque soit le conf&eacute;rencier, Clubhouse ouvre les portes d&rsquo;un auditoire qualifi&eacute; et c&rsquo;est clairement une aubaine pour les annonceurs. &Agrave; condition d&rsquo;&ecirc;tre bon en animation. &laquo;&nbsp;<em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">J&rsquo;ai d&eacute;j&agrave; quitt&eacute; des rooms au bout de trois minutes. De nouveaux m&eacute;tiers pourraient na&icirc;tre pour animer les &eacute;changes dans un avenir proche</em>.&nbsp;&raquo; Patrick Amiel a de son c&ocirc;t&eacute; franchit le pas : il a d&eacute;cid&eacute; d&rsquo;animer une &eacute;mission tous les lundis dans laquelle il invite une jeune pousse. &laquo;&nbsp;<em style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">Elle explique rapidement sa difficult&eacute; et on ouvre les discussions avec les participant&middot;e&middot;s pour qu&rsquo;ils apportent leurs id&eacute;es.&nbsp;&raquo;</em>&nbsp;</span></p>\r\n<p style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-family: agrandir-narrow, agrandir, arial, sans-serif; font-size: 1.125rem; line-height: 1.5rem;\"><span style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased;\">&Agrave; la faveur de sa notori&eacute;t&eacute; grandissante, la question du business model de Clubhouse commence s&eacute;rieusement &agrave; se poser. D&rsquo;autant que Twitter n&rsquo;a pas attendu pour riposter. En fin de semaine derni&egrave;re, le r&eacute;seau lan&ccedil;ait Twitter Spaces sur un mod&egrave;le quasi-identique o&ugrave; la parole prend le pas sur l&rsquo;&eacute;crit, une fonctionnalit&eacute; encore en b&ecirc;ta test pour quelques utilisateurs&middot;rices.&nbsp;</span></p>\r\n</div>', 22, '2021-02-15 18:22:06', NULL, 'Depuis quelques jours, Clubhouse affole la toile, entraînant la frustration des uns, renforçant le sentiment d&#39;importance des autres. Ce nouveau r', 1),
(42, 'Comment limiter l’effet d’épuisement des visioconférences', 'img/space.jpg', '                                    \r\n\r\n\r\n\r\nAvec l’arrivée du premier confinement, les applications de type Zoom, Google Meet et consorts nous ont permis de continuer à échanger à distance et garder le contact avec nos proches. Théâtre, danse ou mariage… Les activités confinées battent leur plein. Mais après un an de pratique plus ou moins contrainte, la fatigue se fait sentir. Une conséquence logique que nous pouvons néanmoins atténuer.\r\nLe cerveau mis à rude épreuve\r\nPsychologues, neurologues et chercheurs s’accordent, en France comme à l’étranger, sur le risque d’épuisement engendré par l’enchainement des visioconférences. Le phénomène a même trouvé un surnom, « la Zoom fatigue », citée comme telle dans plusieurs médias. Les raisons de cet épuisement sont multiples. On y trouve, par exemple, le besoin de chercher et capter le regard de l’autre, ce qui s’avère impossible car il faudrait à la fois regarder son écran et sa caméra. Un léger décalage de temps ou de son, ajouté à l’absence de perception des signaux faibles (respiration, mains qui se lèvent, posture pour prendre la parole) obligent notre cerveau à doubler d’effort pour analyser les réactions des autres participant·e·s. Sans parler de tous ces visages qui nous scrutent et du sentiment de mal aise qui peut en émaner.Et ne vous y trompez pas. Vos moments entre ami·e·s ont exactement le même effet.\r\n« La fatigue mentale est générée par l’accumulation du temps passé sur une même tâche », expose Nawal Abboub, docteure en sciences cognitives dans une interview donnée à France Info. Même en jonglant avec des réunions professionnelles et des appels vidéo entre amis, l’activité reste similaire et suscite donc de l’épuisement. D’autant plus si les participants sont peu actifs lors de ces visioconférences. « Cela peut paraître contre-intuitif, mais rester passif [face à un ordinateur] est encore plus demandeur d’énergie », ajoute l’experte, comparant cette situation au travail « très fatigant » des professionnels de la vidéosurveillance qui scrutent en permanence des écrans. \r\nRésultat, en plus d’avoir un effet délétère sur notre santé, la visioconférence nous fait perdre une partie de notre concentration. \r\nPour limiter au maximum la fatigue et les mots de tête, voici quelques conseils délivrés par divers professionnel·le·s du monde médical, français·es ou étranger·ère·s : \r\n\r\nLimitez les réunions via Zoom ou Google Meet si vous le pouvez et proposez des appels téléphoniques pour éviter l’effet tunnel. Profitez des appels téléphoniques pour marcher et vous dégourdir les jambes. \r\nSi vous êtes l’animateur de la réunion, prévoyez un ordre du jour afin de donner une ligne directrice qui permettra à tous les participant·e·s de suivre. \r\nLimitez le nombre de participant·e·s et la durée de la réunion \r\nLaissez la caméra ouverte au début pour faire les présentations et ensuite, coupez l’image \r\nFaites au moins 15 minutes de pause entre deux réunions et profitez en pour faire une tâche complètement différente : promener son chien, faire une promenade, prendre l’air…\r\nToutes les 20 minutes, quittez l’écran des yeux pendant au moins 20 secondes en réalisant des exercices de yoga des yeux.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nArticle écrit par ANNE TAFFIN\r\n\r\n                                ', 22, '2021-02-15 18:23:18', '2021-02-16 20:24:05', ' Media Articles Toutes catégories Actus Outils et conseils Décryptage Tribunes Portfolio Secteurs Ressources Maddymoney Maddybasics Panoramas Entrepri', 2),
(43, '40 nuances de Next met à nu les stars du Next40 : épisode 21, iAdvize', 'img/space.jpg', '                  \r\nSoutenu par Maddyness, la French Tech, France Digitale et la Tribune, 40 nuances de Next est le nouveau podcast qui dévoile les recettes des entrepreneur·e·s du Next40. Parce que cet écosystème repose sur le partage des apprentissages tirés des échecs et des réussites de celles et ceux qui sont rôdés à l’aventure entrepreneuriale, les dirigeant·e·s les plus en vue du moment se livrent et se racontent au micro d’Olivier Mathiot et Thomas Benzazon.\r\nCes entrepreneur·e·s partagent aussi bien leurs clés et conseils business, glanés au fil des années, que leur vision plus personnelle du monde dans lequel on vit et de la place de l’entrepreneuriat dans celui-ci. Mais au-delà de leur posture de dirigeant·e, ils se livrent également sur leurs parcours et sur ce qui les a menés là où ils en sont aujourd’hui, sur ce qui les a construits. Bonne découverte !\r\n\r\nÉcouter les épisodes\r\n\r\nÉpisode 01 – Julia Bijaoui, Frichti\r\nL’invitée de ce premier épisode est Julia Bijaoui, co-fondatrice et dirigeante de Frichti. Dans une discussion d’une heure et demie, elle revient sur sa manière de gérer cette crise mondiale et sur la réaction de ses investisseurs, elle dévoile sa vision de son entreprise dans le monde déconfiné et le regard qu’elle porte sur le monde du travail et de l’emploi, mais elle aborde aussi des pans plus personnels de sa vie, notamment sa relation de couple qui est aussi une relation d’associés, ses échecs avant son succès et nous en dit plus sur sa vie chahutée en confinement.\r\n\r\n\r\nÉpisode 02 – Frédéric Mazzella, BlaBlaCar\r\nDeuxième invité du podcast : Frédéric Mazzella, le Macaulay Culkin de l’entrepreneuriat (sans les frasques, évidemment), l’enfant star de la startup nation qu’on suit depuis ses débuts. Entre réaction à la crise, accompagnement et soutien aux startups, relation aux investisseurs, il partage avec nous le regard qu’il porte sur l’écosystème et les effets du contexte actuel sur ce dernier. Sans filtre, il partage ses réflexions sur le monde actuel, « On empêche les jeunes on est en train de quelque part pénaliser le monde de demain pour essayer de sauver le monde d’hier. il faut qu’on réfléchisse bien à tout ça » et sur ce qui l’inspire au quotidien.\r\n\r\n\r\nÉpisode 03 – Eric La Bonnardière, Evaneos\r\nTroisième invité de ce podcast qui donne la parole aux entrepreneur·e·s du Next 40, Eric la Bonnardière, co-fondateur d’Evaneos, voyagiste nouvelle génération qui compte 200 collaborateurs et collaboratrices aujourd’hui. Dans un secteur – voyage et tourisme – sinistré par la crise et le confinement général, comment maintenir son activité ? Le co-fondateur raconte l’hibernation d’Evaneos et surtout sa vision du redémarrage de son activité et du secteur au global.\r\n\r\n\r\nÉpisode 04 – Pierre Dubuc, OpenClassrooms\r\nQuatrième invité, Pierre Dubuc, cofondateur d’OpenClassrooms qui raconte sa vie d’entrepreneur, démarrée à 11 ans avec la création de ses premiers sites web et qu’il poursuit aujourd’hui aux côté de Mathieu Nebra, avec une mission et une ambition : réinventer l’apprentissage, repenser l’école, promouvoir le savoir.\r\nDans cet épisode, on découvre les ressorts personnels qui ont forgé l’entrepreneur et on comprend d’autant mieux les valeurs qui sous-tendent cette entreprise à mission. Au delà de la gestion de crise, c’est le concept même de croissance, et le sens du travail qui sont questionnés ici. Pierre Dubuc revient aussi sur la relation aux investisseurs, la vie entre associés, l’importance de l’éducation mais aussi les laissés pour compte du fait de l’exclusion numérique.\r\n\r\n\r\nÉpisode 05 – Charles Egly et Geoffroy Guigou, Younited Credit\r\nPour ce cinquième épisode de la série, Olivier Mathiot et Thomas Benzazon reçoivent Charles Egly et Geoffroy Guigou, qui, un jour, ont pris leur voiture pour Brest, avec quatre slides en poche pour présenter leur jeune entreprise à de futurs investisseurs, pour connaître le succès qu’on leur connait aujourd’hui, 10 ans plus tard. Si en une décennie l’entreprise a changé de nom pour devenir Younited Credit, elle n’a pas changé de mission : simplifier l’industrie bancaire européenne. Découvrez les coulisses de cette réussite avec des réponses aux questions surprises de Ronan Le Moal, qui avait investi chez eux lorsqu’il dirigeait Crédit Mutuel Arkea, et de Jean de La Rochebrochard, Partner chez Kima Ventures.\r\n\r\n\r\nÉpisode 06 – Jean-Charles Samuelian, Alan\r\nComment traverse-t-on une crise sanitaire quand on est une assurance santé ? Comment adapter un modèle local quand on se déploie à l’étranger ? Comment lève-t-on 50 millions d’euros en pleine crise ? Autant de questions, plus une bonus posée directement par Cédric O, auquel le cofondateur d’Alan a répondu aux micros de Thomas Benzazon et Olivier Mathiot. Il livre également son regard sur la globalisation, la redistribution de la valeur, le potentiel rachat d’Alan ou ses projets d’acquisition, mais aussi son regard sur l’application Stop-Covid.\r\n\r\n\r\nÉpisode 07 – Pascal Gauthier, CEO de Ledger\r\nCryptomonnaies, sécurisation des données et blockchain sont au programme de ce septième épisode dans lequel Pascal Gauthier, CEO de Ledger, évoque les défis relevés par la scaleup. Avis aux amateurs, le dirigeant évoque pêle-mêle l’avenir des données de santé à l’aune de la blockchain, l’attractivité des régions françaises et la continuité de l’activité pendant la crise. Avec l’intervention surprise d’Éric Larchevêque, fondateur de Ledger, qui interroge le nouveau dirigeant, nommé au printemps 2019, sur les conséquences d’un changement de gouvernance au sein d’une entreprise. Enfin, dans la pastille dédiée au mouvement Sista, Marie Ekeland dévoile son nouveau projet : le lancement du fonds d’investissement 2050.\r\n\r\n\r\nÉpisode 08 – Ismaël Ould, CEO de Wynd\r\nLe fondateur de Wynd évoque dans ce nouvel épisode de 40 Nuances de Next l’avenir du retail face à des géants de l’e-commerce comme Amazon. Comment les commerçants, les franchises, les boutiques peuvent se réinventer pour perdurer dans un environnement toujours plus concurrentiel ? Comment associer les corporates à cette mission ? Et l’essor du commerce en ligne peut-il menacer directement les commerces physiques ? Autant de questions auxquelles Ismaël Ould s’efforce de répondre dans la première partie du podcast, alors qu’il aborde des problématiques plus personnelles et son retour d’expérience d’entrepreneur dans la seconde.\r\n\r\n\r\nÉpisode 09 – Alexandre Pachulski, CEO de Talentsoft\r\nFutur du recrutement, du management, des RH… Le programme est vaste pour cet épisode de 40 Nuances de Next, avec Alexandre Pachulski, figure emblématique de l’écosystème startup. Avec la crise du Covid, le rôle des managers a été bouleversé par les questionnements des salariés et l’essor du télétravail. Sans parler de la crise de sens et des enjeux sociétaux qui ont émergé ces derniers mois. Maladie du reporting, manque de confiance, process de recrutement à l’origine des discriminations que l’on connait et qui ne sont pas étrangères au mouvement #BlackLivesMatter qui agite aujourd’hui de nombreux pays à travers le monde ; le statu quo n’est plus possible. Restons optimistes, nos entreprises portent une partie de la réponse.\r\n\r\n\r\nÉpisode 10 – Jonathan Cherki, CEO de ContentSquare\r\nJonathan Cherki se livre sur ce qu’il a appris lors de son arrivée aux États-Unis : les erreurs et les bonnes surprises, mais aussi la culture de la gagne qu’il insuffle dans son entreprise. Tout en défendant les atouts de la France et les moyens qu’il identifie pour faire émerger des leaders mondiaux. En bonus : il annonce en exclusivité la création d’un incubateur chez ContentSquare pour accompagner de futures pépites. Dans une deuxième partie, Jonathan Cherki évoque son histoire personnelle et l’homme derrière l’entrepreneur à succès.\r\n\r\n\r\nÉpisode 11 – Franck Le Tendre, CEO de Finalcad\r\nDans ce nouvel épisode du podcast 40 Nuances de Next, le CEO de Finalcad évoque ses multiples vies d’athlète, puis de militaire, qui l’ont finalement mené à l’entrepreneuriat. Racontant avec beaucoup d’honnêteté aussi bien son parcours professionnel que ses difficultés personnelles, il porte un regard plein de curiosité sur le monde du numérique et interroge les espoirs qu’il suscite comme les limites qu’il porte.\r\n\r\n\r\nÉpisode 12 – Olivier Goy, CEO d’October\r\nQui de mieux placé qu’Olivier Goy, fondateur de Lendix qui deviendra plus tard October, scaleup implantée dans cinq pays européens, pour brosser un portrait de la Fintech européenne et des défis qu’il lui reste à relever ? En pleine crise et alors que les plateformes de crowdlending ont été autorisées à distribuer les fameux prêts garantis par l’État (PGE), revenir sur les débuts de l’entreprise permet de mieux comprendre ses victoires actuelles. L’occasion aussi pour l’entrepreneur de révéler quelques anecdotes et souvenirs de ses débuts… et d’inspirer une nouvelle génération d’entrepreneur·e·s ?\r\n\r\n\r\nÉpisode 13 – François Boulet et Cyril Courtin, cofondateurs de HR Path\r\nCofondateurs et associés, François Boulet et Cyril Courtin évoquent leur duo dans ce nouvel épisode de 40 Nuances de Next. L’occasion de revenir sur les avantages (et les inconvénients ?) de se lancer à deux dans l’aventure, de raconter comment le duo a vécu la croissance de HR Path mais aussi de dévoiler quelle est la recette miracle d’une association durable.\r\nÉpisode 14 – Firmin Zocchetto, cofondateur de Payfit\r\nDe sa passion pour Zinedine Zidane à celle pour l’entrepreneuriat, dans lequel il est tombé dès son adolescence, Firmin Zocchetto retrace la (courte) route qui l’a mené jusqu’à Payfit et au succès que la scaleup connaît aujourd’hui. Ses quelques galères, ses réussites, ses ambitions : il dévoile tout ce qui constitue désormais l’ADN de l’entreprise.\r\nÉpisode 15 – Matthieu Beucher, CEO de Klaxoon\r\nDans ce nouvel épisode, Matthieu Beucher revient sur son passage dans l’industrie et la façon dont celui-ci a influencé sa manière de penser le produit Klaxoon mais aussi le management de ses équipes. Impossible de ne pas évoquer aussi la réunion, que la scaleup cherche à réinventer, et les bonnes pratiques à adopter pour en finir avec les rendez-vous improductifs.\r\nÉpisode 16 – Thibaud Hug de Larauze, CEO de Back Market\r\nFaire du neuf avec du vieux, c’est tout le concept de Back Market. Dans cet épisode, son cofondateur revient sur les enjeux du marché du reconditionnement, qui a explosé ces dernières années. Il évoque aussi de manière plus personnelle ce qu’il a hérité de son père et son grand-père, tous deux entrepreneurs, et des avantages et inconvénients de ce statut.\r\nÉpisode 17 – Armand Thiberge, fondateur de Sendinblue\r\n400 salariés, 180 000 clients et 50 millions de chiffre d’affaires dans 60 pays : Sendinblue est une affaire qui roule. Son fondateur revient sur les coulisses de cette belle histoire de la French Tech et esquisse aussi les différents projets personnels qui l’animent, bien loin du marketing : la construction d’un avion solaire ou de fermes offshores, qui concrétisent son engagement contre le changement climatique.\r\nÉpisode 18 – Jacques-Antoine Granjon, co-fondateur de Veepee\r\nRetour sur la success story à la française de Vente-Privée devenu Veepee, dont l’histoire a débuté dans des bureaux de 10m2 pour continuer dans un immense bâtiment de la Plaine Saint-Denis reconnaissable entre tous. Pourtant, l’un des fondateurs emblématiques de la marque et pionniers de la French Tech bien avant qu’elle ne naisse reste discret : ce nouvel épisode est l’occasion de le (re)découvrir. Et de se laisser porter par sa vision de cet écosystème qui, en deux décennies, a évolué à la vitesse de l’hypercroissance.\r\nÉpisode 19 – Antoine Hubert, co-fondateur d’Ynsect\r\nConstruire un géant de l’agro-alimentaire tout en ayant un impact positif sur l’environnement, sacré challenge que celui que relève Antoine Hubert, l’un des co-fondateurs d’Ynsect. Dans ce nouvel épisode, l’entrepreneur revient aux sources de la passion, très différentes de ce qu’on peut traditionnellement entendre dans le milieu startup : la paléobiologie, paléontologie, exobiologie… Bref, les sciences et la recherche, bien loin de l’entrepreneuriat auquel il a fini par succomber !\r\nÉpisode 20 – Pierre-Étienne Roinat, co-fondateur de Recommerce\r\nLutter contre le gaspillage et préserver les ressources en allant à contre-courant des habitudes de consommation, voilà l’ambitieux projet lancé auquel s’attaque Recommerce. Pour créer un nouveau modèle de consommation plus durable, Pierre-Étienne Roinat, Benoit Varin, Cédric Maucourt et Antoine Jeanjean s’attaquent au reconditionnement de smartphones en se positionnant sur une offre BtoB. On découvre dans cet épisode avec Pierre-Étienne Roinat, les enjeux, les limites, les opportunités de ce secteur en pleine croissance évalué à 100 milliards mais aussi les conséquences éventuelles de l’arrivée de la 5G, le partenariat de la startup avec Amazon ou encore comment gérer sa relation amis/ associés…\r\nEpisode 21 – Julien Hervouet, co-fondateur d’iAdvize\r\nConvaincu que la relation client doit se ré-inventer, Julien Hervouet se lance dans le développement d’outils de chat et messaging. A l’époque, on ne parle pas encore de commerce conversationnel, le client est alors avant tout une adresse IP : « la composante humaine était très éloignée du e-commerce ».Dans cet épisode, on s’interroge sur la capacité des robots et autres algorithmes à supplanter l’humain, ou pas. On questionne l’utilisation des données personnelles dans les business modèles de nos boites, ou pas. « C’est peut être possible, mais est-ce que c’est souhaitable ? ».\r\n                ', 22, '2021-02-15 18:24:08', '2021-02-17 20:16:16', 'Les entrepreneur·e·s du Next40 se dévoilent chaque semaine dans un entretien mené par Olivier Mathiot et Thomas Benzazon.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `topic_content` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `topic_content`) VALUES
(1, 'développement web'),
(2, 'blockchain'),
(3, 'finance'),
(4, 'Biologie');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `lastName`, `name`, `mail`, `password`) VALUES
(22, 'Manga', 'Ludovic', 'ludovic.mangaj@gmail.com', '$2y$10$feabfSVJkaSRMIfdFUbV/.AfIFebFlwWDHopCMXEZhsy5JDdkW4xi'),
(23, 'Manga', 'Claude', 'Claude@gmail.com', '$2y$10$EYWHnZJHMoFlMLySWgheBejci/kgNWUPAXqLlEfDbi2E2Jjj9Nj82');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_post` (`postId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_postUserId` (`userId`),
  ADD KEY `fk_postTopic` (`topicId`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comments_post` FOREIGN KEY (`postId`) REFERENCES `post` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_postTopic` FOREIGN KEY (`topicId`) REFERENCES `topic` (`id`),
  ADD CONSTRAINT `fk_postUserId` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

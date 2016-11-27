-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 28 Avril 2016 à 16:11
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `horeca`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `AdminID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Admin`
--

INSERT INTO `Admin` (`AdminID`, `UserID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Cafe`
--

CREATE TABLE `Cafe` (
  `CafeID` int(11) NOT NULL,
  `EstabID` int(11) NOT NULL,
  `Smoking` tinyint(1) DEFAULT NULL,
  `Snack` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Cafe`
--

INSERT INTO `Cafe` (`CafeID`, `EstabID`, `Smoking`, `Snack`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 1),
(3, 3, 0, 1),
(4, 4, 0, 1),
(5, 5, 1, 1),
(6, 6, 0, 1),
(7, 7, 0, 1),
(8, 8, 1, 0),
(9, 9, 1, 0),
(10, 10, 1, 1),
(11, 11, 1, 1),
(12, 12, 1, 0),
(13, 13, 1, 1),
(14, 14, 1, 1),
(15, 15, 1, 1),
(16, 16, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ClosedOn`
--

CREATE TABLE `ClosedOn` (
  `ClosedID` int(11) NOT NULL,
  `RestID` int(11) NOT NULL,
  `EstabID` int(11) NOT NULL,
  `Day` tinyint(1) NOT NULL,
  `Hour` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ClosedOn`
--

INSERT INTO `ClosedOn` (`ClosedID`, `RestID`, `EstabID`, `Day`, `Hour`) VALUES
(1, 1, 17, 0, '0'),
(2, 1, 17, 6, '0'),
(3, 1, 17, 1, 'pm'),
(4, 1, 17, 2, 'pm'),
(5, 1, 17, 3, 'pm'),
(6, 1, 17, 4, 'pm'),
(7, 1, 17, 5, 'pm'),
(8, 3, 19, 0, '0'),
(9, 3, 19, 6, 'am'),
(10, 5, 21, 0, '0'),
(11, 6, 22, 0, 'am'),
(12, 6, 22, 6, 'am'),
(13, 7, 23, 0, 'am'),
(14, 7, 23, 1, 'am'),
(15, 7, 23, 6, 'am'),
(16, 8, 24, 0, '0'),
(17, 8, 24, 1, '0'),
(18, 8, 24, 6, 'am'),
(19, 10, 26, 0, '0'),
(20, 10, 26, 1, '0'),
(21, 10, 26, 3, 'am'),
(22, 14, 30, 1, '0');

-- --------------------------------------------------------

--
-- Structure de la table `Comment`
--

CREATE TABLE `Comment` (
  `CommentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EstabID` int(11) NOT NULL,
  `ComDate` datetime NOT NULL,
  `ComScore` int(11) NOT NULL,
  `ComText` text NOT NULL,
  `Thumb` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Comment`
--

INSERT INTO `Comment` (`CommentID`, `UserID`, `EstabID`, `ComDate`, `ComScore`, `ComText`, `Thumb`) VALUES
(1, 2, 1, '2008-05-02 00:00:00', 5, 'Bonne ambiance à partir de 23h. Déco apache. Spécialité : sous marin.', 0),
(2, 3, 1, '2008-08-07 00:00:00', 3, 'Spécialité : sous marin. Petit défaut, il n''y a rien à manger mais on peut aller chercher un durum en face.', 0),
(3, 5, 2, '2008-03-02 00:00:00', 4, 'Très enfumé mais superbe terrasse. Bons cocktails. Happy hour de 18 à 20h : deux cocktails pour le prix d''un. Serveurs parfois pas très sympas. Club privé avec sorteur à partir de 22h.', 0),
(4, 3, 2, '2008-10-01 00:00:00', 2, 'Club privé avec sorteur à partir de 22h.', 0),
(5, 8, 2, '2008-10-05 00:00:00', 1, 'Serveurs parfois pas très sympas. Club privé avec sorteur à partir de 22h.', 0),
(6, 7, 3, '2008-05-02 00:00:00', 4, 'Belle terrasse, ambiance un peu BCBG, concerts certains soirs. ', 0),
(7, 8, 3, '2008-02-02 00:00:00', 2, 'Toilettes pas très propres.', 0),
(8, 2, 4, '2008-04-02 00:00:00', 3, 'Sympa à l''extérieur en été mais très bruyant à l''intérieur. ', 0),
(9, 5, 5, '2008-10-02 00:00:00', 5, 'Très bonne ambiance. Le patron connaît bien ses vins. Petit en cas offert avec le vin.', 0),
(10, 2, 5, '2008-10-07 00:00:00', 3, 'Un peu chèr.', 0),
(11, 3, 6, '2008-10-03 00:00:00', 3, 'Bar classique. Terrasse sur le trottoir. Belle sélection de Tapas.', 0),
(12, 2, 6, '2008-10-12 00:00:00', 5, 'Belle sélection de Tapas.', 0),
(13, 4, 6, '2008-10-12 00:00:00', 4, 'Bon vin et tapas. Un peu cher.', 0),
(14, 6, 7, '2008-05-02 00:00:00', 1, 'Serveurs pas sympas. Carte ridicule.', 0),
(15, 4, 7, '2008-05-02 00:00:00', 2, 'Cher, tapas et vin pas mal.', 0),
(16, 5, 8, '2008-10-02 00:00:00', 5, 'Bar de gauchistes dont le patron s''appelle Jean-Marie.', 0),
(17, 8, 8, '2008-10-09 00:00:00', 3, 'Très enfumé.', 0),
(18, 4, 8, '2008-10-09 00:00:00', 4, 'Sympaz, pas cher, jeu d''échec.', 0),
(19, 2, 9, '2008-10-05 00:00:00', 3, 'Réservé uniquement aux étudiants.', 0),
(20, 7, 9, '2008-09-05 00:00:00', 4, 'Ambiance festive.', 0),
(21, 5, 9, '2008-10-01 00:00:00', 2, 'Très bruyant.', 0),
(22, 4, 9, '2008-10-01 00:00:00', 2, 'Impossible d''avoir une bière après 20h, trop de monde.', 0),
(23, 2, 10, '2008-10-02 00:00:00', 4, 'Minuscule bar mais très bonne ambiance. Prix très raisonnables et service à table. Le saucisson goute la nourriture pour chats. Cacahuètes gratuites. Terrasse sur la rue.', 0),
(24, 3, 11, '2008-10-02 00:00:00', 3, 'Super ambiance !', 0),
(25, 2, 11, '2008-09-02 00:00:00', 4, ' Les habitués y viennent souvent entre amis et en soirée l’atmosphère y est à l’humour et à la bonne humeur !', 0),
(26, 5, 12, '2008-10-02 00:00:00', 4, 'Bar à cocktails très sympas - Quelques bon vins Espagnols', 0),
(27, 4, 12, '2008-10-02 00:00:00', 4, 'Bonne adresse.', 0),
(28, 7, 13, '2008-10-30 00:00:00', 5, 'Un beau petit coin où il fait bon vivre, on s’y sent à la maison avec des bons petits plats et une ambiance multicolore... Le vrai visage de Bruxelles, qualité et ambiance! You wanna go where everybody knows your name…', 0),
(29, 2, 13, '2008-09-05 00:00:00', 5, 'Délicieux troquet, l''Union, avec sa faune toujours changeante et le plus souvent de bonne humeur. Les alcools à moins de 4 Euro y sont certainement pour quelque chose..', 0),
(30, 4, 13, '2008-09-05 00:00:00', 5, 'Top.', 0),
(31, 4, 14, '2006-06-05 00:00:00', 4, 'bistrot tranquille, jeux d''échecs pour les passionnes, authentique', 0),
(32, 5, 14, '2007-10-02 00:00:00', 1, '-35 ans s''abstenir', 0),
(33, 7, 14, '2008-09-13 00:00:00', 3, 'bon rapport qualité prix', 0),
(34, 6, 15, '2008-10-04 00:00:00', 3, 'Un pub traditionnel Irlandais dans Bruxelles avec comme activité principale la retransmission de match de foot ou de rugby. Bière à 4 euros et cocktails à 5 euros.', 0),
(35, 3, 15, '2008-10-03 00:00:00', 3, 'Pub assez chèr', 0),
(36, 4, 15, '2008-10-03 00:00:00', 3, 'WiFi, quand ca marche. Hamburger++.', 0),
(37, 4, 16, '2008-03-01 00:00:00', 3, 'Pub irlandais. Très bonne petite restauration surtout le Hamburger++.', 0),
(38, 6, 16, '2008-02-09 00:00:00', 4, 'Serveuses charmantes mais ne parlent pas français.', 0),
(39, 2, 16, '2008-06-01 00:00:00', 1, 'Très plein les soirs de match, bruyant et enfumé.', 0),
(40, 7, 17, '2008-10-23 00:00:00', 3, 'Bon steak le mercredi, ambiance retro "happy Days" très sympa! Beaucoup de monde en dehors des vacances, mais service impeccable! Surtout une serveuse blonde super souriante.\n', 0),
(41, 5, 17, '2008-11-02 00:00:00', 4, 'La sodexo, c''est différent! Vous êtes soucieux de votre santé, vous en avez assez du ''fast food'' et du sandwich ordinaire. Vous voulez quelque chose de différent. Vous avez raison. Chez Théo est un retaurant rapide de qualité, dont la devise est ''natrual, fresh and ready''.\n', 0),
(42, 8, 17, '2008-10-29 00:00:00', 1, 'Faut pas déconner. Cher, pas bon même les choses les plus simples.', 0),
(43, 4, 17, '2008-11-03 00:00:00', 2, 'Testez absolument les nouvelles lasagnes (aubergine) et canneloni au rayon ''pates'', c''est bon. Si, si, c''est bon!', 0),
(44, 7, 18, '2008-10-21 00:00:00', 5, 'Je suis un habitué de La Mirabelle, j''y ai mangé pour la première fois en 1983 (découverte de la brochette Macao qui n''est plus à la carte il me semble?) et depuis j''y retourne régulièrement, et j''apprécie beaucoup l''accueil sympa, le service rapide, et la bonne cuisine de type "brasserie", ingrédients frais et de qualité. Bien sûr le week-end en soirée ça peut être bondé et il vaudra mieux réserver, surtout pour les groupes. Samedi dernier nous avons goûté le gaspacho en suggestion et les fondus parmesan (avec le persil frit, chouette) et comme plat un waterzooï à la gantoise (copieux!) et un saumon poêlé aux légumes wok, avec 1/2 bouteille de vin. Tout était franchement très bon.\n', 0),
(45, 8, 18, '2008-10-24 00:00:00', 3, 'Loin d''être aussi parfait que ce que l''on dit : une table mal située (face aux toilettes) alors que d''autres tables sont restées vides . Service un peu rapide et pas très souriant. Nourriture correcte. Peut-être avions-nous choisi un mauvais jour ( il pleuvait!!). \n', 0),
(46, 5, 18, '2008-11-02 00:00:00', 4, 'service toujours souriant et efficace, et qualité constante depuis.... ouh la la tant d''années !\n', 0),
(47, 4, 19, '2008-10-25 00:00:00', 4, 'Resto cool et sympa où la nourriture est de qualité mais il ce n''est en rien un lieu calme et intime. ', 0),
(48, 6, 19, '2008-10-28 00:00:00', 4, ' Qualité du service parfois déçevante mais surtout dû au fait que le lieu est très fréquenté.', 0),
(49, 5, 19, '2008-10-28 00:00:00', 5, ' ça déchire. L''italie en plein. J''adore.', 0),
(50, 8, 20, '2008-10-30 00:00:00', 5, 'Pour la seconde fois en qlq mois j''ai pu apprécié la fraicheur des produits du comptoir à huitre. Bonne présentation du plateau de fruit de mer à 60 euros /2 personnes, avec un sympathique sauvignon chilien...tout bien sauf peut être le service un peu expéditif, genre la vidange d''asssiette se fait sans nous en demandé l''autorisation..résultat pff j''avais plus d''aiguille pour mes bigorneaux ...mais bon ... (163488)\n', 0),
(51, 6, 20, '2008-11-04 00:00:00', 1, 'That''s really incredible! Such a beautiful place and such a bad service ! As usual you think you can have your dinner at 8:30PM and enjoy a nice evening ? Well not here they absolutely want to make a lot of money so you need to be there or at 7:00PM or at 9:30PM and they tell you they''ll throw you out if you are not finished! I only knew this in a few restaurants of London and by the time they realized that this helps loosing the local customers, it''s too late the place is already in bankrupcy. So watch out Belga Queen team and try to behave in front of your customer, your going to need them sometime... And food is so and so, so you are really going to need them ! ', 0),
(52, 8, 20, '2008-10-03 00:00:00', 4, 'J''y suis allée pour un lunch à deux personnes. La formule Business Lunch est avantageuse et nous avons très bien mangé. A recommander !\n', 0),
(53, 5, 20, '2008-10-02 00:00:00', 4, 'cadre superbe, bonne cuisine mais cher.', 0),
(54, 7, 20, '2008-10-02 00:00:00', 4, 'très bon', 0),
(55, 3, 20, '2008-10-02 00:00:00', 4, 'Based in the premises of an old bank this is must visit restaurants in Brussels although its really a flashy brasserie. Dine in magnificent surroundings either at the oyster bar, beer bar or the brasserie itself where some mouth watering Belgian dishes are offered. Wine list is also extensive and will meet all tastes / budgets. Business lunch at €15 per head is fantastic value for money and worth checking out. Book in advance for weekends and evenings. Cigar lounge / club in basement finishes off an evening in style. I''m no guru but would give Belga a big thumbs up for anyone looking for a sophisticated yet charming dining experience in Brussels.', 0),
(56, 7, 21, '2008-10-12 00:00:00', 5, 'En un mot: hétéroclite. La clientèle, la décoration, le cadre... On y mange chinois et indonésien sur des banquettes en bois. ', 0),
(57, 5, 21, '2008-10-12 00:00:00', 5, 'Très ''couleur locale'', ce petit resto où l’on est accueilli comme si on faisait partie de la famille', 0),
(58, 3, 21, '2008-10-12 00:00:00', 4, 'Sympa! pas cher, mais vraiment sympa.', 0),
(59, 4, 22, '2008-10-02 00:00:00', 3, 'Cuisine africaine. Service lent mais sympa et surtout bonne cuisine dépaysante.', 0),
(60, 5, 22, '2008-10-02 00:00:00', 4, 'Dépaysant, bon, les vins sont super et pas chers (Australien, Afrique du sud...).', 0),
(61, 4, 23, '2008-10-08 00:00:00', 2, 'Cuisine sans plus. La terrasse est potable.', 0),
(62, 5, 23, '2008-10-14 00:00:00', 5, 'Meilleur adresse dans le quartier. Surtout pour les salades.', 0),
(63, 6, 23, '2008-10-21 00:00:00', 1, 'Pas bon. ', 0),
(64, 7, 23, '2008-10-22 00:00:00', 4, 'Agréable jardin. Bonne ambiance parfois un peu trop bruyant. Belles salades sans oublier les pâtes...carbonara ou poulet fumé et mascarpone...un vrai délice!\n', 0),
(65, 3, 23, '2008-10-29 00:00:00', 5, 'Superbe cadre pour déguster les petits plats proposés. Des plats simples mais qui se laissent savourer. Sans parler du moelleux au chocolat... Un service de qualité et une ambiance de fête. Le resto n''est pas très grand donc n''hésitez pas à réserver votre table. Amateurs d''ambiance et de bonne bouffe, ceci est votre adresse!\n', 0),
(66, 3, 24, '2008-10-02 00:00:00', 3, 'Comme annoncé dans les précédents commentaires, la cuisine était vraiment excellente, les plats raffinés et le rapport qualité-prix imbattable. \n', 0),
(67, 8, 24, '2008-10-02 00:00:00', 1, 'Nous avons été réellement déçus par le service (personnel de salle peu disponible et désagréable). En ce qui concerne l’ambiance également, nous nous attendions à un cadre plus cosy, un peu plus accueillant. ', 0),
(68, 6, 24, '2008-10-02 00:00:00', 2, 'Impression générale : malgré la qualité des plats, nous ne retournerons pas dans cet endroit à cause du service (dommage!).', 0),
(69, 7, 24, '2008-10-02 00:00:00', 5, 'Excellent!', 0),
(70, 4, 24, '2008-10-02 00:00:00', 5, 'Canneloni de saumon et fromage de chèvre, dos de bar au gros sel et épinards en branche, soupe glacé aux framboises le tout servi avec sourire et fraîcheur pour 18 euros ce midi ... Grégory Yarm (le chef-patron) n''a pas fini de m''étonner et c''est tant mieux ! ', 0),
(71, 4, 25, '2008-10-02 00:00:00', 5, 'Meilleur adresse du centre. plat de brasserie, simple et bon. Rapport qualité prix imbattable', 0),
(72, 8, 25, '2008-10-02 00:00:00', 2, 'Plein de bruit, service rapide, trop rapide.', 0),
(73, 2, 26, '2008-10-21 00:00:00', 5, 'Un repas offert au meilleur projet. Ou pas...', 0),
(74, 4, 26, '2008-10-29 00:00:00', 5, ':-)', 0),
(75, 6, 26, '2008-10-23 00:00:00', 5, 'So great!', 0),
(76, 5, 28, '2008-10-23 00:00:00', 3, 'Une valeur sûre. Ambiance sympa, sans prétention. ', 0),
(77, 7, 28, '2008-10-21 00:00:00', 4, 'Le steak est excellent, le personnel aimable et attentionné. Nous y allons souvent et tjrs avec le même plaisir.', 0),
(78, 6, 28, '2008-10-29 00:00:00', 3, 'Good.', 0),
(79, 5, 29, '2008-10-21 00:00:00', 3, 'Sodexo++ ?', 0),
(80, 4, 29, '2008-10-22 00:00:00', 2, 'Bon rapport qualité/prix. Pas cher', 0),
(81, 8, 29, '2008-10-25 00:00:00', 1, 'Nee', 0),
(82, 4, 30, '2008-10-02 00:00:00', 4, 'J''adore. ', 0),
(83, 3, 30, '2008-10-02 00:00:00', 3, 'Dans la poele, bonne cuisine d''ici.', 0),
(84, 8, 30, '2008-10-02 00:00:00', 2, 'Nee', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Establishment`
--

CREATE TABLE `Establishment` (
  `EstabID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `AdStreet` varchar(30) NOT NULL,
  `AdNum` int(11) NOT NULL,
  `AdZip` int(11) NOT NULL,
  `AdCity` varchar(15) NOT NULL,
  `AdLongitude` float NOT NULL,
  `AdLatitude` float NOT NULL,
  `Tel` varchar(15) NOT NULL,
  `SiteLink` varchar(255) DEFAULT NULL,
  `CreationDate` date NOT NULL,
  `CreatorNickname` varchar(30) NOT NULL,
  `Pic` varchar(255) NOT NULL DEFAULT 'view/pic/house.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Establishment`
--

INSERT INTO `Establishment` (`EstabID`, `Name`, `AdStreet`, `AdNum`, `AdZip`, `AdCity`, `AdLongitude`, `AdLatitude`, `Tel`, `SiteLink`, `CreationDate`, `CreatorNickname`, `Pic`) VALUES
(1, 'Ratabar', 'Chaussée de Boondael', 345, 1050, 'Ixelles', 4.38407, 50.8186, '02/644 09 92', '', '2008-03-01', 'Boris', 'view/pic/house.jpg'),
(2, 'Waff', 'Chaussée de Boondael', 455, 1050, 'Ixelles', 4.38934, 50.8164, '02/640 00 42', 'http://www.waff.be', '2008-01-02', 'Boris', 'view/pic/house.jpg'),
(3, 'Tavernier', 'Chaussée de Boondael', 44, 1050, 'Ixelles', 4.38912, 50.8167, '02/640 71 91', 'www.le-tavernier.be', '2008-01-02', 'Boris', 'view/pic/house.jpg'),
(4, 'Belga', 'Place Eugène Flagey', 18, 1050, 'Ixelles', 4.37258, 50.8272, '02/640 35 08', 'www.cafebelga.be', '2008-03-23', 'Boris', 'view/pic/house.jpg'),
(5, 'Marché au vin', 'Rue du Belvédère', 14, 1050, 'Ixelles', 4.37404, 50.8268, '02/640 56 10', '', '2007-12-06', 'Boris', 'view/pic/house.jpg'),
(6, 'Delecta', 'Rue lannoy', 2, 1050, 'Ixelles', 4.36993, 50.826, '02/644 19 49', '', '2008-03-03', 'Fred', 'view/pic/house.jpg'),
(7, 'Piola', 'Rue du page', 2, 1050, 'Ixelles', 4.35963, 50.8241, '02/538 91 29', '', '2008-01-24', 'Fred', 'view/pic/house.jpg'),
(8, 'Pantin', 'Chaussée d''ixelles', 355, 1050, 'Ixelles', 4.37133, 50.828, '02/644 80 91', '', '2008-03-02', 'Fred', 'view/pic/house.jpg'),
(9, 'Gauguin', 'Chaussée de Boondael', 420, 1050, 'Ixelles', 4.38855, 50.8174, '02/646 39 72', '', '2008-08-01', 'Fred', 'view/pic/house.jpg'),
(10, 'Le Corto', 'Chaussée de Boondael', 485, 1050, 'Ixelles', 4.39014, 50.8153, '02/000 00 00', '', '2008-10-02', 'Boris', 'view/pic/house.jpg'),
(11, 'Suprabailly', 'Rue du bailli', 77, 1050, 'Ixelles', 4.3601, 50.8258, '02/534 09 01', '', '2008-04-02', 'Boris', 'view/pic/house.jpg'),
(12, 'SuperMercado', 'Rue de Florence', 100, 1050, 'Ixelles', 4.36018, 50.8296, '02/222 22 22', '', '2003-04-04', 'Boris', 'view/pic/house.jpg'),
(13, 'Brasserie L''union', 'Parvis de Saint-Gilles', 55, 1050, 'Ixelles', 4.34608, 50.8308, '02/538 15 79', '', '2008-09-02', 'Fred', 'view/pic/house.jpg'),
(14, 'Greenwich', 'Rue des Chartreux', 5, 1050, 'Ixelles', 4.34748, 50.8488, '02/511 41 67', '', '2004-07-04', 'Fred', 'view/pic/house.jpg'),
(15, 'Michael Collins', 'Rue du Bailli', 1, 1050, 'Ixelles', 4.36349, 50.8272, '02/644 61 21', '', '2008-10-02', 'Fred', 'view/pic/house.jpg'),
(16, 'de Valera''s', 'Place Flagey', 17, 1050, 'Ixelles', 4.37169, 50.8275, '02/649 80 54', '', '2008-01-19', 'Fred', 'view/pic/house.jpg'),
(17, 'Chez Théo Sodexho ULB', 'Avenue Paul Héger', 22, 1050, 'Ixelles', 4.38157, 50.8133, '02/650 49 35', 'http://www.dev.ulb.ac.be/restaurants/solbosch_s/r_pub.php3', '2008-10-02', 'Boris', 'view/pic/house.jpg'),
(18, 'Mirabelle', 'Chaussée de Boondael', 459, 1050, 'Ixelles', 4.38942, 50.8163, '02/649 51 73', '', '2008-10-02', 'Boris', 'view/pic/house.jpg'),
(19, 'Mano a Mano', 'Rue Saint-Boniface', 8, 1050, 'Ixelles', 4.36481, 50.8358, '02/502 08 01', '', '2008-10-02', 'Boris', 'view/pic/house.jpg'),
(20, 'Le belga queen', 'Rue Fossé-aux-Loups', 32, 1000, 'Bruxelles', 4.35448, 50.8503, '02/217 21 87', 'http://www.belgaqueen.be/', '2008-10-02', 'Boris', 'view/pic/house.jpg'),
(21, 'Indochine', 'Rue Lesbroussart', 58, 1050, 'Ixelles', 4.36822, 50.8277, '02/649 96 15', '', '2008-10-02', 'Boris', 'view/pic/house.jpg'),
(22, 'L''horloge du sud', 'Rue du Trône', 141, 1050, 'Ixelles', 4.37143, 50.8358, '02/512 18 64', '', '2008-10-02', 'Fred', 'view/pic/house.jpg'),
(23, 'Grenier d''Elvire', 'Chaussée de Boondael', 339, 1050, 'Ixelles', 4.38384, 50.8188, '02/648 43 48', 'http://www2.resto.be/grenierdelvire/', '2008-10-02', 'Fred', 'view/pic/house.jpg'),
(24, 'Grain de sel', 'Chaussée de Vleurgat', 9, 1050, 'Ixelles', 4.37122, 50.8275, '02/648 18 58', '', '2008-10-02', 'Fred', 'view/pic/house.jpg'),
(25, 'Le Fin de Siècle', 'rue des Chartreux', 10, 1000, 'Bruxelles', 4.34739, 50.8488, '02/648 80 81', 'http://www.lafindesiecle.be', '2008-10-02', 'Fred', 'view/pic/house.jpg'),
(26, 'Comme Chez Soi', 'Place Rouppe', 23, 1000, 'Bruxelles', 4.34569, 50.8426, '02/512 29 21', 'www.commechezsoi.be', '2008-10-02', 'Fred', 'view/pic/house.jpg'),
(27, 'Le café des épices', 'Place Jourdan', 21, 1040, 'Etterbeek', 4.38158, 50.8372, '02/280 43 17', 'www.cafedesepices.be', '2008-10-02', 'Boris', 'view/pic/house.jpg'),
(28, 'Bécasse', 'Chaussée de Boondael', 476, 1050, 'Ixelles', 4.38977, 50.8159, '02/649 06 41', '', '2008-10-02', 'Boris', 'view/pic/house.jpg'),
(29, 'La Bastoche', 'Chaussée de Boondael', 473, 1050, 'Ixelles', 4.38973, 50.8159, '02/640 34 17', '', '2008-10-02', 'Boris', 'view/pic/house.jpg'),
(30, 'Au Vieux Bruxelles', 'Rue Saint-Boniface', 35, 1050, 'Ixelles', 4.36373, 50.8363, '02/503 31 11', '', '2008-10-02', 'Fred', 'view/pic/house.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Hotel`
--

CREATE TABLE `Hotel` (
  `HotelID` int(11) NOT NULL,
  `EstabID` int(11) NOT NULL,
  `Stars` int(11) NOT NULL,
  `Bedrooms` int(11) NOT NULL,
  `PrizeDoubleRoom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `RestID` int(11) NOT NULL,
  `EstabID` int(11) NOT NULL,
  `PriceRange` int(11) NOT NULL,
  `TakeAway` tinyint(1) DEFAULT NULL,
  `Delivery` tinyint(1) DEFAULT NULL,
  `BanquetCapacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Restaurant`
--

INSERT INTO `Restaurant` (`RestID`, `EstabID`, `PriceRange`, `TakeAway`, `Delivery`, `BanquetCapacity`) VALUES
(1, 17, 6, 1, 1, 200),
(2, 18, 40, 0, 0, 40),
(3, 19, 30, 1, 1, 10),
(4, 20, 50, 0, 0, 180),
(5, 21, 20, 1, 1, 30),
(6, 22, 30, 1, 0, 150),
(7, 23, 20, 1, 1, 25),
(8, 24, 30, 1, 1, 60),
(9, 25, 20, 0, 0, 10),
(10, 26, 100, 0, 0, 34),
(11, 27, 40, 0, 0, 25),
(12, 28, 40, 0, 0, 80),
(13, 29, 20, 0, 0, 20),
(14, 30, 40, 0, 0, 40);

-- --------------------------------------------------------

--
-- Structure de la table `Tag`
--

CREATE TABLE `Tag` (
  `TagID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EstabID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Tag`
--

INSERT INTO `Tag` (`TagID`, `UserID`, `EstabID`, `Name`) VALUES
(4, 2, 1, 'Bon marché'),
(1, 2, 1, 'Fumeur'),
(17, 2, 2, 'Happy hour'),
(11, 2, 2, 'Terrasse'),
(21, 2, 2, 'WiFi'),
(29, 2, 3, 'Service au bar'),
(31, 2, 4, 'Concert'),
(36, 2, 4, 'Service au bar'),
(34, 2, 4, 'terrasse'),
(37, 2, 5, 'Bar à vin'),
(46, 2, 5, 'Service au bar'),
(44, 2, 5, 'Terrasse'),
(51, 2, 6, 'Terrasse'),
(67, 2, 10, 'Terrasse'),
(70, 2, 12, 'Bar à vin'),
(77, 2, 13, 'Bon marché'),
(74, 2, 13, 'Fumeur'),
(88, 2, 14, 'Bon marché'),
(81, 2, 14, 'Echec'),
(93, 2, 15, 'WiFi'),
(98, 2, 16, 'Fumeur'),
(107, 2, 17, 'Bon marché'),
(111, 2, 18, 'Cuisine gastronomique'),
(118, 2, 19, 'Terrasse'),
(122, 2, 20, 'Cuisine gastronomique'),
(124, 2, 20, 'Fumoir'),
(129, 2, 21, 'Bon rapport qualité/prix'),
(132, 2, 22, 'Bon rapport qualité/prix'),
(133, 2, 22, 'Terrasse'),
(139, 2, 23, 'Bon rapport qualité/prix'),
(145, 2, 23, 'Fusion'),
(146, 2, 24, 'Bon rapport qualité/prix'),
(151, 2, 25, 'Bon rapport qualité/prix'),
(155, 2, 26, 'Bon'),
(160, 2, 27, 'Bon marché'),
(166, 2, 28, 'Bon marché'),
(170, 2, 29, 'Cuisine brasserie'),
(173, 2, 30, 'Bon rapport qualité/prix'),
(2, 3, 1, 'Fumeur'),
(9, 3, 2, 'Fumeur'),
(43, 3, 5, 'Terrasse'),
(47, 3, 6, 'Bar à vin'),
(56, 3, 8, 'Fumeur'),
(68, 3, 12, 'Bar à vin'),
(75, 3, 13, 'Fumeur'),
(99, 3, 16, 'Fumeur'),
(96, 3, 16, 'WiFi'),
(114, 3, 18, 'Terrasse'),
(128, 3, 21, 'Bon rapport qualité/prix'),
(140, 3, 23, 'Bon rapport qualité/prix'),
(154, 3, 25, 'Bon rapport qualité/prix'),
(164, 3, 28, 'Bon marché'),
(171, 3, 30, 'Bon rapport qualité/prix'),
(6, 4, 1, 'Bon marché'),
(3, 4, 1, 'Fumeur'),
(10, 4, 2, 'Fumeur'),
(19, 4, 2, 'Happy hour'),
(14, 4, 2, 'Terrasse'),
(33, 4, 4, 'terrasse'),
(39, 4, 5, 'Bar à vin'),
(42, 4, 5, 'Fumeur'),
(49, 4, 6, 'Bar à vin'),
(54, 4, 7, 'Bar à vin'),
(60, 4, 8, 'Echec'),
(57, 4, 8, 'Fumeur'),
(62, 4, 9, 'Fumeur'),
(65, 4, 10, 'Fumeur'),
(73, 4, 12, 'Fumeur'),
(79, 4, 13, 'Bon marché'),
(76, 4, 13, 'Fumeur'),
(86, 4, 14, 'Bon marché'),
(82, 4, 14, 'Echec'),
(85, 4, 14, 'Fumeur'),
(92, 4, 15, 'WiFi'),
(97, 4, 16, 'Fumeur'),
(102, 4, 16, 'Terrasse'),
(95, 4, 16, 'WiFi'),
(119, 4, 19, 'Terrasse'),
(130, 4, 21, 'Bon rapport qualité/prix'),
(134, 4, 22, 'Terrasse'),
(142, 4, 23, 'Terrasse'),
(156, 4, 26, 'Bon'),
(167, 4, 28, 'Bon marché'),
(169, 4, 29, 'Cuisine brasserie'),
(5, 5, 1, 'Bon marché'),
(16, 5, 2, 'Service au bar'),
(12, 5, 2, 'Terrasse'),
(22, 5, 2, 'WiFi'),
(25, 5, 3, 'Concert'),
(27, 5, 3, 'Terrasse'),
(35, 5, 4, 'Service au bar'),
(45, 5, 5, 'Service au bar'),
(50, 5, 6, 'Terrasse'),
(69, 5, 12, 'Bar à vin'),
(78, 5, 13, 'Bon marché'),
(87, 5, 14, 'Bon marché'),
(83, 5, 14, 'Fumeur'),
(90, 5, 15, 'Service au bar'),
(103, 5, 16, 'Terrasse'),
(105, 5, 17, 'Bon rapport qualité/prix'),
(116, 5, 19, 'Bon rapport qualité/prix'),
(123, 5, 20, 'Cuisine gastronomique'),
(136, 5, 22, 'Fumoir'),
(143, 5, 23, 'Terrasse'),
(147, 5, 24, 'Terrasse'),
(153, 5, 25, 'Bon rapport qualité/prix'),
(162, 5, 27, 'Terrasse'),
(165, 5, 28, 'Bon marché'),
(168, 5, 29, 'Bon rapport qualité/prix'),
(175, 5, 30, 'Bon'),
(7, 6, 1, 'Service au bar'),
(15, 6, 2, 'Service au bar'),
(13, 6, 2, 'Terrasse'),
(28, 6, 3, 'Service au bar'),
(32, 6, 4, 'terrasse'),
(40, 6, 5, 'Fumeur'),
(52, 6, 7, 'Bar à vin'),
(59, 6, 8, 'Echec'),
(61, 6, 9, 'Fumeur'),
(64, 6, 10, 'Fumeur'),
(71, 6, 12, 'Fumeur'),
(94, 6, 15, 'WiFi'),
(100, 6, 16, 'Fumeur'),
(110, 6, 17, 'Bon marché'),
(112, 6, 18, 'Cuisine gastronomique'),
(117, 6, 19, 'Bon rapport qualité/prix'),
(120, 6, 19, 'Terrasse'),
(125, 6, 20, 'Fumoir'),
(127, 6, 21, 'Bon rapport qualité/prix'),
(135, 6, 22, 'Terrasse'),
(141, 6, 23, 'Bon rapport qualité/prix'),
(150, 6, 24, 'Fumoir'),
(157, 6, 26, 'Terrasse'),
(163, 6, 27, 'Cuisine brasserie'),
(176, 6, 30, 'Bon'),
(177, 6, 30, 'Cuisine brasserie'),
(8, 7, 1, 'Babyfoot'),
(20, 7, 2, 'Happy hour'),
(23, 7, 2, 'WiFi'),
(24, 7, 3, 'Concert'),
(26, 7, 3, 'Terrasse'),
(38, 7, 5, 'Bar à vin'),
(48, 7, 6, 'Bar à vin'),
(53, 7, 7, 'Bar à vin'),
(58, 7, 8, 'Echec'),
(63, 7, 10, 'Fumeur'),
(80, 7, 14, 'Echec'),
(89, 7, 15, 'Service au bar'),
(104, 7, 16, 'Terrasse'),
(108, 7, 17, 'Bon marché'),
(106, 7, 17, 'Bon rapport qualité/prix'),
(113, 7, 18, 'Terrasse'),
(126, 7, 20, 'Fumoir'),
(131, 7, 22, 'Bon rapport qualité/prix'),
(138, 7, 22, 'Fumoir'),
(148, 7, 24, 'Terrasse'),
(159, 7, 26, 'Cuisine gastronomique'),
(161, 7, 27, 'Bon marché'),
(174, 7, 30, 'Bon'),
(18, 8, 2, 'Happy hour'),
(30, 8, 4, 'Concert'),
(41, 8, 5, 'Fumeur'),
(55, 8, 8, 'Fumeur'),
(66, 8, 10, 'Terrasse'),
(72, 8, 12, 'Fumeur'),
(84, 8, 14, 'Fumeur'),
(91, 8, 15, 'Service au bar'),
(101, 8, 16, 'Fumeur'),
(109, 8, 17, 'Bon marché'),
(115, 8, 18, 'Terrasse'),
(121, 8, 19, 'Terrasse'),
(137, 8, 22, 'Fumoir'),
(144, 8, 23, 'Terrasse'),
(149, 8, 24, 'Terrasse'),
(152, 8, 25, 'Bon rapport qualité/prix'),
(158, 8, 26, 'Terrasse'),
(172, 8, 30, 'Bon rapport qualité/prix');

-- --------------------------------------------------------

--
-- Structure de la table `Thumbs`
--

CREATE TABLE `Thumbs` (
  `ThumbsID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `UpDown` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `UserID` int(11) NOT NULL,
  `Nickname` varchar(30) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `RegisterDate` date NOT NULL,
  `Pic` varchar(255) DEFAULT 'view/pic/dango.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`UserID`, `Nickname`, `Mail`, `Password`, `RegisterDate`, `Pic`) VALUES
(1, 'Ziyad', 'poki@ulb.ac.be', '$2y$10$Cm9u8OjIkBfMELGzv9vCnuLV2R0pdJUXEzTqe7e4f4cNURPofAw4a', '2016-04-21', 'view/pic/dango.png'),
(2, 'Boris', 'Boris@hotmail.com', '$2y$10$jqDw2wQ6vi.dgaj5Rmy5Kup9qJO5.fzEavC5SJw07l6qC2Iq6IOmO', '2016-04-21', 'view/pic/dango.png'),
(3, 'Brenda', 'Brenda@hotmail.com', '$2y$10$S2o47qxe6tfrwUn4OIsRUeJe7tK77Fk1yq9vGgHpapw2bGN1G09.S', '2016-04-21', 'view/pic/dango.png'),
(4, 'Fred', 'Fred@hotmail.com', '$2y$10$p9hG7c1OWp9FNIiUMxd6OeEwi2JUNObGAkcLT2Lg8Xylnwi8eo7ou', '2016-04-21', 'view/pic/dango.png'),
(5, 'Ivan', 'Ivan@hotmail.com', '$2y$10$OICU5BEOS6fsYEebTR3.y.wLFAZW8SpE46tQB5P4l6UMBc80dkdLe', '2016-04-21', 'view/pic/dango.png'),
(6, 'Sarah', 'Sarah@hotmail.com', '$2y$10$h/.Lv46813wt4Rf4fWzds.e33w1mvsbzW02dxv7EiJpskh.6/TswW', '2016-04-21', 'view/pic/dango.png'),
(7, 'Serge', 'Serge@hotmail.com', '$2y$10$DflcrPeZgbcO9vwzVRQM2OTbFuv0jRreZFGvCVLfkLLv3x7VlbsR.', '2016-04-21', 'view/pic/dango.png'),
(8, 'Joelle', 'Joelle@hotmail.com', '$2y$10$ly2BLhWWtecFqXb.B5WuVOFD0xSbDbLjy4MWuLadiMTgjWQkLCSRW', '2016-04-21', 'view/pic/dango.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `UserID` (`UserID`);

--
-- Index pour la table `Cafe`
--
ALTER TABLE `Cafe`
  ADD PRIMARY KEY (`CafeID`),
  ADD KEY `EstabID` (`EstabID`);

--
-- Index pour la table `ClosedOn`
--
ALTER TABLE `ClosedOn`
  ADD PRIMARY KEY (`ClosedID`),
  ADD KEY `RestID` (`RestID`),
  ADD KEY `EstabID` (`EstabID`);

--
-- Index pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD UNIQUE KEY `UserID_2` (`UserID`,`EstabID`,`ComDate`),
  ADD KEY `EstabID` (`EstabID`),
  ADD KEY `UserID` (`UserID`);

--
-- Index pour la table `Establishment`
--
ALTER TABLE `Establishment`
  ADD PRIMARY KEY (`EstabID`),
  ADD UNIQUE KEY `Name` (`Name`,`AdNum`,`AdStreet`,`AdZip`,`AdCity`) USING BTREE;

--
-- Index pour la table `Hotel`
--
ALTER TABLE `Hotel`
  ADD PRIMARY KEY (`HotelID`),
  ADD KEY `EstabID` (`EstabID`);

--
-- Index pour la table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`RestID`),
  ADD KEY `EstabID` (`EstabID`);

--
-- Index pour la table `Tag`
--
ALTER TABLE `Tag`
  ADD PRIMARY KEY (`TagID`),
  ADD UNIQUE KEY `UniqueTag` (`UserID`,`EstabID`,`Name`) USING BTREE,
  ADD KEY `Tag_ibfk_2` (`EstabID`),
  ADD KEY `UserID` (`UserID`);

--
-- Index pour la table `Thumbs`
--
ALTER TABLE `Thumbs`
  ADD PRIMARY KEY (`ThumbsID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CommentID` (`CommentID`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Mail` (`Mail`),
  ADD UNIQUE KEY `Nickname` (`Nickname`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Cafe`
--
ALTER TABLE `Cafe`
  MODIFY `CafeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `ClosedOn`
--
ALTER TABLE `ClosedOn`
  MODIFY `ClosedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT pour la table `Establishment`
--
ALTER TABLE `Establishment`
  MODIFY `EstabID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `Hotel`
--
ALTER TABLE `Hotel`
  MODIFY `HotelID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `RestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `Tag`
--
ALTER TABLE `Tag`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT pour la table `Thumbs`
--
ALTER TABLE `Thumbs`
  MODIFY `ThumbsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `Admin_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Cafe`
--
ALTER TABLE `Cafe`
  ADD CONSTRAINT `Cafe_ibfk_1` FOREIGN KEY (`EstabID`) REFERENCES `Establishment` (`EstabID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ClosedOn`
--
ALTER TABLE `ClosedOn`
  ADD CONSTRAINT `ClosedOn_ibfk_1` FOREIGN KEY (`RestID`) REFERENCES `Restaurant` (`RestID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ClosedOn_ibfk_2` FOREIGN KEY (`EstabID`) REFERENCES `Restaurant` (`EstabID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`EstabID`) REFERENCES `Establishment` (`EstabID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Hotel`
--
ALTER TABLE `Hotel`
  ADD CONSTRAINT `Hotel_ibfk_1` FOREIGN KEY (`EstabID`) REFERENCES `Establishment` (`EstabID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD CONSTRAINT `Restaurant_ibfk_1` FOREIGN KEY (`EstabID`) REFERENCES `Establishment` (`EstabID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Tag`
--
ALTER TABLE `Tag`
  ADD CONSTRAINT `Tag_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Tag_ibfk_2` FOREIGN KEY (`EstabID`) REFERENCES `Establishment` (`EstabID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Thumbs`
--
ALTER TABLE `Thumbs`
  ADD CONSTRAINT `Thumbs_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Thumbs_ibfk_2` FOREIGN KEY (`CommentID`) REFERENCES `Comment` (`CommentID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

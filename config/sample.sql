-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 26 Juin 2017 à 06:17
-- Version du serveur :  5.7.18-0ubuntu0.17.04.1
-- Version de PHP :  7.0.18-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reugeot`
--

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'ROLE_USER'),
(2, 'ROLE_ADMIN'),
(3, 'ROLE_PROFESSIONAL');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `activation_token` varchar(255) CHARACTER SET latin1 NOT NULL,
  `role_id` int(11) NOT NULL,
  `home_phone` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `cell_phone` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `address` text CHARACTER SET latin1 NOT NULL,
  `zip_code` varchar(5) CHARACTER SET latin1 NOT NULL,
  `city` varchar(255) CHARACTER SET latin1 NOT NULL,
  `professional` tinyint(1) NOT NULL,
  `company_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `company_phone` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `company_website` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `company_email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `profile_pic` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `activation_token`, `role_id`, `home_phone`, `cell_phone`, `address`, `zip_code`, `city`, `professional`, `company_name`, `company_phone`, `company_website`, `company_email`, `profile_pic`) VALUES
(1, 'Alexis', 'Bachelet', 'app.bachelet@gmail.com', '8aebf962debf6bb9e4aad3ca9a71e7f2e1d2035a', '', 2, '', '0665910690', '69 D Boulevard Mansart', '21000', 'Dijon', 1, 'Web Partner / DIjon Formation', '0380484899', 'http://www.dijonformation.com', 'accueil@dijonformation.com', '/uploads/profile_pics/1.jpg'),
(5, 'Alexis', 'Bachelet', 'a-bachelet@dijonformation.com', '7c222fb2927d828af22f592134e8932480637c0d', '', 3, '', '0665910690', '69 D Boulevard Mansart', '21000', 'Dijon', 1, 'WEB Partner', '', 'http://www.dijonformation.com', 'accueil@dijonformation.com', '/uploads/profile_pics/5.jpg'),
(6, 'Alexis', 'Bachelet', 'app.bachelet@gmail.com', '8aebf962debf6bb9e4aad3ca9a71e7f2e1d2035a', '781c659993516e86d77bbdf3ea1887c7be0f5406', 1, '', '0665910690', '69 D Boulevard Mansart', '21000', 'Dijon', 0, '', '', '', '', ''),
(7, 'Ian', 'Neal', 'luctus.felis@euaccumsan.ca', 'YZC84LKG2YX', '', 1, '03 77 34 3', '06 54 89 6', '531-6273 Purus Ave', '18336', 'Clarksville', 0, 'Nam LLC', '07 67 92 9', NULL, 'posuere.vulputate.lacus@Seddiamlorem.ca', ''),
(8, 'Clayton', 'Mejia', 'mauris@semperrutrumFusce.ca', 'KLT21DTY9LZ', '', 3, '03 72 39 5', '06 97 91 1', '979-8080 Metus Ave', '77694', 'Serramonacesca', 0, 'Dictum LLP', '02 90 04 4', NULL, 'nibh.enim@quamvelsapien.ca', ''),
(9, 'Louis', 'Fitzpatrick', 'enim@arcuVestibulumante.ca', 'VIR13HQQ4JV', '', 3, '03 20 27 6', '06 77 72 2', 'Appartement 679-1960 Torquent Rue', '08320', 'Medemblik', 0, 'Eros Institute', '06 91 35 8', NULL, 'Vivamus.molestie@aliquetvel.ca', ''),
(10, 'Brennan', 'Pearson', 'erat@lacusQuisqueimperdiet.co.uk', 'VMI23MBE4YB', '', 1, '03 20 93 1', '06 81 56 9', '362-4781 Ipsum. Ave', '39118', 'Fort Smith', 0, 'Aenean Eget Ltd', '03 13 76 4', NULL, 'neque.Sed@adipiscingelitAliquam.net', ''),
(11, 'Peter', 'Slater', 'ullamcorper.Duis.at@orci.edu', 'NAP09IYR0VQ', '', 2, '03 64 46 6', '06 95 54 8', '9273 Magna Av.', '63-91', 'Tarragona', 0, 'Imperdiet Non Vestibulum Company', '09 11 66 7', NULL, 'ligula.Aliquam@nequepellentesque.com', ''),
(12, 'Russell', 'Adams', 'nunc.ac@urnaNunc.co.uk', 'OTO65ZOV3YP', '', 2, '03 63 84 6', '06 88 58 9', '5948 Vulputate Av.', '57718', 'Senftenberg', 0, 'Felis Ullamcorper Viverra Limited', '05 79 61 8', NULL, 'porttitor.interdum.Sed@amet.edu', ''),
(13, 'Nash', 'Whitehead', 'Mauris.vel.turpis@Inornare.com', 'CAH20KGR5FT', '', 3, '03 44 53 5', '06 17 79 4', 'Appartement 455-1364 Tincidunt. Chemin', '07593', 'Marseille', 0, 'Quis Incorporated', '04 37 56 3', NULL, 'nibh.Phasellus.nulla@sociisnatoquepenatibus.org', ''),
(14, 'Jakeem', 'Dalton', 'Morbi@Utsemper.com', 'RXS42LMH9GE', '', 1, '03 22 13 0', '06 82 78 2', 'CP 957, 8851 Arcu. Route', '7750K', 'Travo', 0, 'Non Enim Industries', '02 73 21 5', NULL, 'interdum.Curabitur.dictum@Maecenas.ca', ''),
(15, 'Jameson', 'Shepard', 'nulla.Integer.vulputate@ligulatortordictum.net', 'XOV31LOL0KB', '', 2, '03 24 33 9', '06 55 57 9', '323-3109 Duis Route', '11502', 'Gulfport', 0, 'Proin Corp.', '05 59 47 0', NULL, 'Curabitur@nonummy.co.uk', ''),
(16, 'Ronan', 'Gutierrez', 'tellus.sem.mollis@vestibulum.edu', 'ZHC62SIB2MH', '', 2, '03 25 94 7', '06 81 57 0', '4135 Risus. Rd.', '20713', 'Wabamun', 0, 'Maecenas Industries', '06 15 07 1', NULL, 'et.tristique@tellusnon.com', ''),
(17, 'Jonah', 'Flores', 'Mauris.eu.turpis@arcuAliquam.co.uk', 'PXC68HWN7GB', '', 2, '03 43 95 6', '06 11 18 4', '5347 Mi. Rue', '67744', 'Zignago', 1, 'Fermentum Metus Associates', '02 55 45 3', NULL, 'Sed.dictum@Infaucibus.edu', ''),
(18, 'Jelani', 'Spencer', 'commodo@velit.org', 'VMH88XJP5UG', '', 3, '03 14 80 4', '06 55 15 8', '415-307 Magna. Route', '2705', 'Rekem', 1, 'Non Nisi PC', '09 70 87 5', NULL, 'neque.tellus.imperdiet@Vivamus.com', ''),
(19, 'Michael', 'Lane', 'ut@nasceturridiculus.co.uk', 'VPH53DPX6JW', '', 3, '03 46 74 6', '06 67 78 4', '621-267 Feugiat Rue', '6047', 'Brighton', 1, 'Nunc PC', '08 56 31 6', NULL, 'Praesent.eu@commodo.org', ''),
(20, 'Yardley', 'Woodard', 'augue@Nulla.org', 'DCX06JYV2MO', '', 1, '03 23 33 9', '06 34 22 5', '1571 Consequat Rd.', '92106', 'Hulste', 1, 'Praesent Ltd', '07 92 69 8', NULL, 'neque.In.ornare@arcuAliquamultrices.ca', ''),
(21, 'Kareem', 'Clark', 'imperdiet.non.vestibulum@Sedmolestie.com', 'OQM89QBC4DT', '', 1, '03 71 87 9', '06 23 25 9', 'CP 622, 3981 Sagittis. Avenue', '99710', 'Whithorn', 1, 'Faucibus Lectus Limited', '07 54 55 6', NULL, 'dictum.Proin@lectus.org', ''),
(22, 'Dylan', 'Cantu', 'ut.molestie@ipsumSuspendissenon.org', 'BFO44ZYF5QB', '', 2, '03 10 66 6', '06 03 68 7', '1982 Nam Route', '9197', 'Gouy-lez-PiŽton', 1, 'Laoreet Ipsum Consulting', '03 13 47 3', NULL, 'eu@vitaeposuere.org', ''),
(23, 'Hoyt', 'Serrano', 'faucibus.id.libero@egetlaoreetposuere.edu', 'AFI35BXR3AM', '', 2, '03 01 50 3', '06 00 25 9', 'CP 121, 2803 Justo Rd.', '86-57', 'Vitry-sur-Seine', 1, 'Posuere Cubilia Foundation', '06 32 74 2', NULL, 'orci.Ut.semper@tellusidnunc.co.uk', ''),
(24, 'Yuli', 'Sawyer', 'lectus.pede.et@Donec.co.uk', 'SAC19LQE3IO', '', 2, '03 43 97 5', '06 57 04 5', '595-4438 Ligula. Route', '72609', 'Pepingen', 1, 'Vel Mauris Consulting', '08 57 52 4', NULL, 'Morbi@eu.co.uk', ''),
(25, 'Jerry', 'Diaz', 'congue.elit@sitametconsectetuer.co.uk', 'SMW82JCY6IX', '', 2, '03 38 16 5', '06 29 28 2', 'Appartement 522-5467 Non, Av.', '41516', 'Merseburg', 1, 'Vitae Sodales At PC', '03 34 16 8', NULL, 'ut@Crasvehicula.org', ''),
(26, 'Lee', 'Watkins', 'orci.Donec.nibh@ipsumdolorsit.org', 'DDT42YXJ6NP', '', 3, '03 02 62 0', '06 59 11 7', 'CP 332, 7562 Tellus Impasse', '58480', 'Plancenoit', 1, 'Dictum LLC', '06 33 56 8', NULL, 'Duis.volutpat@lectus.co.uk', ''),
(27, 'Jarrod', 'Dunlap', 'odio@orciinconsequat.edu', 'JCO15HWY9JH', '', 1, '03 13 20 9', '06 71 64 4', 'Appartement 434-5727 Eu Ave', '94367', 'Dudzele', 0, 'Montes Nascetur Foundation', '02 29 20 6', NULL, 'tristique@risusDonec.com', ''),
(28, 'Emerson', 'Miles', 'id@pede.net', 'BER24SQU7OK', '', 2, '03 33 17 2', '06 10 37 1', 'CP 556, 6960 Vitae Avenue', '87347', 'Ostrowiec ?wi?tokrzyski', 0, 'Egestas Incorporated', '03 33 33 8', NULL, 'nec.urna.suscipit@ullamcorper.org', ''),
(29, 'Elvis', 'Garrett', 'dis.parturient@magnisdis.edu', 'TDX78XVW6WG', '', 1, '03 34 93 2', '06 87 37 2', '296 Lectus. Route', '10001', 'Hindupur', 0, 'Ornare Lectus Ante Institute', '08 67 64 4', NULL, 'Aliquam.erat.volutpat@purus.co.uk', ''),
(30, 'Zeph', 'Melton', 'leo.in@egestas.com', 'PSJ24TBC3TQ', '', 3, '03 74 05 8', '06 23 01 7', 'Appartement 807-827 Maecenas Avenue', '92675', 'Bonnyville Municipal District', 0, 'Id Blandit At Ltd', '09 64 47 7', NULL, 'orci@etlacinia.co.uk', ''),
(31, 'Donovan', 'Hopper', 'et.ipsum.cursus@Duiscursusdiam.ca', 'FTP42OJL7AX', '', 2, '03 93 89 8', '06 86 53 8', 'Appartement 701-5314 Ultrices Av.', '16660', 'Tezze sul Brenta', 0, 'Felis Company', '01 61 02 7', NULL, 'Donec@magnaUttincidunt.net', ''),
(32, 'Mason', 'Flynn', 'lorem@auctorMauris.net', 'RSQ69XMZ3FY', '', 2, '03 85 43 8', '06 69 96 6', '2340 Per Rue', '71039', 'Mira Bhayandar', 0, 'In Dolor Inc.', '09 94 85 1', NULL, 'amet@Nuncullamcorper.net', ''),
(33, 'Aquila', 'Warren', 'dictum.cursus@ultriciesligulaNullam.edu', 'ARI20BLW3JT', '', 2, '03 95 80 2', '06 83 75 8', 'CP 760, 1076 Risus Route', '5009', 'Latisana', 0, 'Imperdiet Non Vestibulum Corp.', '04 11 65 3', NULL, 'tincidunt.tempus.risus@Aeneanmassa.org', ''),
(34, 'Ivan', 'West', 'mus@nibhdolor.com', 'CNJ35EXQ5EW', '', 1, '03 18 04 0', '06 29 40 8', 'Appartement 677-3143 Aenean Rd.', '5515', 'Marchienne-au-Pont', 0, 'Eget Incorporated', '07 64 64 8', NULL, 'faucibus@nonmassa.ca', ''),
(35, 'Kasper', 'Randall', 'Integer.eu@quisarcu.co.uk', 'UAB82PWQ0ZW', '', 1, '03 45 47 2', '06 26 74 7', 'CP 791, 1776 Dolor Route', '36984', 'Wiekevorst', 0, 'At Velit Pellentesque Ltd', '02 92 57 7', NULL, 'dui@lobortismaurisSuspendisse.com', ''),
(36, 'Cedric', 'Lynch', 'Ut.tincidunt.vehicula@metus.edu', 'TBN63YCR0BX', '', 2, '03 14 22 1', '06 17 77 9', 'Appartement 189-3085 Ipsum. Av.', '34492', 'Chatillon', 0, 'Tempus Industries', '02 38 17 9', NULL, 'erat.eget.ipsum@consectetueradipiscing.co.uk', ''),
(37, 'Chaim', 'Dorsey', 'in.dolor.Fusce@sedconsequatauctor.net', 'PKC55FNU1BQ', '', 3, '03 76 41 4', '06 45 64 7', '8725 Eget Avenue', '7812J', 'Saint-Louis', 1, 'Consequat Auctor LLP', '02 06 49 1', NULL, 'dis@sitametfaucibus.edu', ''),
(38, 'Oleg', 'York', 'eleifend@Inmi.net', 'SNF91YOR5SY', '', 2, '03 13 60 3', '06 68 84 3', '4039 Neque Rd.', '38651', 'Rio Marina', 1, 'In Nec Institute', '07 24 07 3', NULL, 'fringilla.mi@aliquetdiam.net', ''),
(39, 'Clayton', 'Acosta', 'consequat.enim@tortornibhsit.edu', 'ERZ60RZV9JA', '', 2, '03 76 86 2', '06 01 98 4', '5874 Tristique Ave', '67322', 'Lavacherie', 1, 'At Augue Id Associates', '04 96 32 8', NULL, 'Phasellus.dolor@auctornuncnulla.com', ''),
(40, 'Kareem', 'Burns', 'luctus@risus.co.uk', 'XSL10RQA9UM', '', 2, '03 86 92 8', '06 33 54 7', '8759 Pellentesque Avenue', '28167', 'Tongrinne', 1, 'Sem Company', '03 71 38 6', NULL, 'diam.eu@fames.co.uk', ''),
(41, 'Joshua', 'Brennan', 'est.ac@odiotristiquepharetra.edu', 'XUA49XJY3QT', '', 3, '03 31 19 2', '06 80 75 2', '4189 Cum Rd.', '43871', 'Serrata', 1, 'Auctor Mauris Consulting', '01 15 53 5', NULL, 'justo.sit.amet@ligula.ca', ''),
(42, 'Samuel', 'Bishop', 'egestas@eudolor.ca', 'RBU57GWJ3WG', '', 3, '03 98 23 4', '06 03 90 4', 'CP 706, 9471 Eget Impasse', '13411', 'Calle Blancos', 1, 'Ipsum Corp.', '04 62 83 5', NULL, 'justo.sit.amet@Nulla.com', ''),
(43, 'Zephania', 'Carrillo', 'dui.Cum@feugiat.edu', 'LKX28UCR9MY', '', 3, '03 97 55 5', '06 70 69 5', 'CP 967, 9213 Fringilla, Ave', 'N0L 9', '?om?a', 1, 'At Corporation', '07 33 53 7', NULL, 'a@Nam.ca', ''),
(45, 'Eagan', 'Cross', 'ultrices@musProinvel.com', 'LVZ22QYD3GG', '', 3, '03 48 81 4', '06 52 18 8', 'CP 158, 3843 Non, Chemin', '76081', 'Aurora', 1, 'Et Arcu Imperdiet Corporation', '04 20 24 4', NULL, 'mollis.Phasellus.libero@nullamagnamalesuada.edu', ''),
(46, 'Lucas', 'Shannon', 'Quisque.tincidunt@gravida.co.uk', 'LMA03VLA3HR', '', 3, '03 93 48 9', '06 53 11 4', 'CP 265, 1480 Vel Route', 'A4H 3', 'San Ramón', 1, 'Iaculis Corp.', '01 97 36 6', NULL, 'dolor.dolor@Nulla.org', ''),
(47, 'Brett', 'Campbell', 'Mauris@primis.net', 'HGX04VYL6UL', '', 1, '03 52 26 5', '06 71 75 3', 'Appartement 775-2120 Lobortis Ave', '19036', 'Mobile', 0, 'Ut PC', '03 15 56 4', NULL, 'imperdiet@cursusluctus.com', ''),
(48, 'Hammett', 'Morin', 'ornare.placerat.orci@dictum.co.uk', 'YIO18GGO3UM', '', 2, '03 13 68 9', '06 76 35 3', 'CP 588, 210 Vulputate, Rd.', '29955', 'Corte Brugnatella', 0, 'Dictum Associates', '06 49 24 5', NULL, 'arcu.et.pede@dapibusid.com', ''),
(49, 'Ferris', 'Yates', 'elit.Aliquam.auctor@egestas.com', 'NYT52MUL5YN', '', 2, '03 61 80 1', '06 10 10 1', '5598 Ultrices Rd.', '31808', 'Massello', 0, 'Turpis Consulting', '06 82 18 2', NULL, 'Pellentesque.tincidunt.tempus@Fuscealiquetmagna.com', ''),
(50, 'Derek', 'Swanson', 'dignissim@Vivamuseuismodurna.edu', 'FTK05XXY0OI', '', 1, '03 29 31 3', '06 70 96 4', '6853 Metus Av.', '63052', 'Huissen', 0, 'Ornare Libero Foundation', '04 25 04 5', NULL, 'a.aliquet.vel@netus.net', ''),
(51, 'Kenneth', 'Warren', 'varius.Nam.porttitor@arcu.net', 'SDP78SCF7OV', '', 2, '03 42 35 9', '06 99 51 2', '534-3180 Rutrum Route', '47131', 'Obertshausen', 0, 'At Nisi Cum Industries', '01 66 20 7', NULL, 'vitae.aliquam.eros@nequetellus.org', ''),
(52, 'Dolan', 'Conway', 'dis.parturient@dapibusquam.co.uk', 'RIW72VVS4QB', '', 1, '03 60 29 9', '06 99 85 4', 'Appartement 503-6139 Tempor Ave', '32807', 'Medemblik', 0, 'Neque Nullam Corp.', '02 90 18 5', NULL, 'amet.diam.eu@vulputateullamcorper.net', ''),
(53, 'Quinlan', 'Nolan', 'id.sapien.Cras@leoin.co.uk', 'VCJ39HAI2XN', '', 3, '03 22 28 9', '06 37 49 9', 'CP 913, 1764 Curabitur Avenue', '3433', 'Temuka', 0, 'Felis Corp.', '06 17 83 2', NULL, 'malesuada@eget.ca', ''),
(54, 'Chadwick', 'Jenkins', 'ornare.lectus@Donectempus.ca', 'JHX22BBL7JE', '', 3, '03 29 03 6', '06 42 60 8', 'CP 216, 1772 Sem Ave', '75954', 'Tsiigehtchic', 0, 'Erat Company', '06 05 01 2', NULL, 'fermentum.fermentum@magnaLorem.org', ''),
(55, 'Buckminster', 'Clements', 'dolor@Curabitur.com', 'NFC57XWY8RS', '', 2, '03 07 73 9', '06 32 54 3', '7512 Fringilla Chemin', '3503', 'Buzenol', 0, 'Senectus Institute', '01 53 85 8', NULL, 'cursus.et.eros@justonecante.net', ''),
(56, 'Anthony', 'Wolf', 'fringilla.cursus.purus@loremipsumsodales.net', 'RHP95GSF2RL', '', 2, '03 78 44 7', '06 10 74 1', '1587 Cursus Rue', 'B6 1G', 'Lethbridge', 0, 'Cras Dolor Limited', '02 57 51 6', NULL, 'Donec@liberoMorbiaccumsan.co.uk', ''),
(57, 'Aristotle', 'Fleming', 'risus.odio@dictumProin.org', 'LYU54YCU1YC', '', 2, '03 51 52 0', '06 99 03 9', 'Appartement 441-6702 Adipiscing. Av.', '13349', 'Nadrin', 1, 'Consectetuer Ipsum Nunc Corp.', '09 30 50 5', NULL, 'Suspendisse.sed.dolor@interdumCurabitur.co.uk', ''),
(58, 'Yuli', 'Little', 'elit.erat.vitae@primisin.ca', 'XYQ68WNX5AT', '', 1, '03 60 99 8', '06 21 13 2', '270-4873 Malesuada. Rd.', '76622', 'Santa Vittoria in Matenano', 1, 'Quam Elementum Inc.', '06 52 33 4', NULL, 'nec.luctus.felis@eumetus.com', ''),
(59, 'Keith', 'Atkins', 'nibh@commodoatlibero.org', 'IBI08HNX5GD', '', 2, '03 04 57 5', '06 20 06 1', 'CP 677, 7606 Curabitur Chemin', '79894', 'Tacoma', 1, 'Sem Egestas Blandit Company', '06 07 28 1', NULL, 'vitae@In.co.uk', ''),
(60, 'Jasper', 'Stark', 'auctor.non.feugiat@magnaPraesent.net', 'FIH69PJH6HC', '', 2, '03 64 40 9', '06 97 71 9', 'Appartement 439-1726 Quis Rd.', '49-10', 'Forbach', 1, 'Aliquet Phasellus Fermentum Inc.', '09 71 60 4', NULL, 'enim.diam@liberoIntegerin.org', ''),
(61, 'Slade', 'Harris', 'dolor@dictumPhasellusin.com', 'THA38KBA8RB', '', 3, '03 84 14 1', '06 08 38 1', '4618 Senectus Chemin', '65827', 'Pratovecchio', 1, 'Eu Elit Associates', '05 49 26 2', NULL, 'vitae.purus@lorem.com', ''),
(62, 'Randall', 'Forbes', 'consectetuer.ipsum.nunc@scelerisquemollisPhasellus.ca', 'VMI51NQK6VD', '', 1, '03 73 49 8', '06 25 72 7', '1164 Eget Impasse', '15101', 'Ilesa', 1, 'Velit Sed Malesuada LLP', '05 26 89 6', NULL, 'metus.sit.amet@anunc.co.uk', ''),
(63, 'Acton', 'Avery', 'egestas.Duis.ac@orciconsectetuer.edu', 'RPU12VVD3AB', '', 3, '03 84 31 3', '06 42 70 0', 'CP 527, 8565 Ipsum. Av.', '5056', 'Houtvenne', 1, 'Non Ante Bibendum Corporation', '06 02 93 6', NULL, 'arcu.eu.odio@egetmetuseu.ca', ''),
(64, 'Elvis', 'Newton', 'sed@cursus.co.uk', 'XTI99CXM3IN', '', 3, '03 07 39 7', '06 83 50 2', '567-9957 Arcu. Avenue', '71219', 'Hay-on-Wye', 1, 'Vitae Erat Corp.', '07 86 13 8', NULL, 'Cum.sociis@auctor.com', ''),
(65, 'Wang', 'Barr', 'tristique.ac.eleifend@netuset.co.uk', 'JSH36KBU8SG', '', 3, '03 29 16 6', '06 49 15 8', '373-5673 Vitae Chemin', '50104', 'Auxerre', 1, 'Tempus Institute', '04 07 20 4', NULL, 'eu.augue.porttitor@vitaenibh.ca', ''),
(66, 'Reuben', 'Wall', 'elit.elit.fermentum@adipiscingelitCurabitur.com', 'ZRJ83PTF5BW', '', 1, '03 67 07 8', '06 95 42 2', '910-7458 Tellus. Rd.', '30000', 'Richmond', 1, 'Ridiculus Mus Institute', '02 60 42 6', NULL, 'in.faucibus.orci@convallisincursus.com', ''),
(67, 'Wesley', 'Fry', 'nisi@sociisnatoquepenatibus.org', 'KIG44HFO8FI', '', 1, '03 59 05 6', '06 49 96 0', '6753 Et Route', 'T2P 4', 'San Cristóbal de la Laguna', 0, 'Ipsum Suspendisse Inc.', '01 69 72 3', NULL, 'Duis@DonecegestasDuis.edu', ''),
(68, 'Josiah', 'Walters', 'Aliquam@eu.net', 'YGU24UXJ3HL', '', 1, '03 63 00 2', '06 04 89 2', '638-4401 Facilisis Impasse', '83707', 'Juan Fernández', 0, 'Integer Vitae Nibh Inc.', '02 38 77 1', NULL, 'arcu@bibendumfermentummetus.net', ''),
(69, 'Slade', 'Spears', 'fermentum@iaculisnec.edu', 'EPN95UAF5FO', '', 3, '03 82 59 0', '06 21 28 5', 'Appartement 887-9373 Parturient Rue', '65731', 'Baddeck', 0, 'Vel Convallis In LLC', '07 69 77 5', NULL, 'Nulla@gravidaAliquam.ca', ''),
(70, 'Uriel', 'Ramirez', 'tincidunt.tempus@eudolor.net', 'NDE86MHG3VW', '', 2, '03 90 18 6', '06 90 41 7', '517-869 Sem, Ave', '8401', 'Gulbarga', 0, 'Nullam Inc.', '03 58 54 9', NULL, 'semper.dui@dolorFuscemi.ca', ''),
(71, 'Malcolm', 'Kinney', 'Nullam.velit@mauriserat.ca', 'BPO08CMH9OW', '', 2, '03 09 98 5', '06 28 88 9', '112 Sed Avenue', '79046', 'Cambiago', 0, 'Sed Leo Institute', '03 65 04 1', NULL, 'et@CurabiturmassaVestibulum.com', ''),
(72, 'Donovan', 'Richard', 'nulla@consequatlectussit.net', 'ELU13APO5MW', '', 1, '03 95 90 1', '06 62 65 3', '675-5324 Vivamus Chemin', '39897', 'Bad Nauheim', 0, 'Aliquam Erat Foundation', '08 11 40 5', NULL, 'senectus.et.netus@diam.ca', ''),
(73, 'Raja', 'Maxwell', 'Phasellus.nulla@quisarcuvel.ca', 'VUE37NVV7KN', '', 2, '03 56 87 0', '06 31 30 1', '4711 Malesuada Ave', '1572', 'Lerum', 0, 'Nascetur Ridiculus Institute', '06 11 21 8', NULL, 'Sed@Aeneansed.org', ''),
(74, 'Hasad', 'Beard', 'at@volutpat.edu', 'ABK89OZP3HN', '', 3, '03 03 66 7', '06 80 08 9', 'CP 194, 2095 Pretium Av.', '82438', 'Pettoranello del Molise', 0, 'Non Dui Associates', '09 50 51 4', NULL, 'Nulla@eunulla.net', ''),
(75, 'Xander', 'Pace', 'dolor.egestas@ipsum.ca', 'KTU11DTV2EE', '', 2, '03 15 79 8', '06 61 30 8', 'Appartement 581-2938 Pellentesque, Ave', '05603', 'Bon Accord', 0, 'Sed Dictum Proin PC', '09 04 30 3', NULL, 'ipsum@porttitorinterdum.co.uk', ''),
(76, 'Derek', 'Oneil', 'volutpat.Nulla@egestasFuscealiquet.edu', 'IZY27IJR1KY', '', 3, '03 75 04 5', '06 99 81 2', 'Appartement 303-1013 Urna. Av.', '29988', 'Curitiba', 0, 'Tincidunt Aliquam Arcu Ltd', '01 53 16 6', NULL, 'Vivamus@ornare.org', ''),
(80, 'Nigel', 'Richard', 'Sed.congue@necmalesuada.co.uk', 'ZCX50CPU5ZT', '', 2, '03 12 04 5', '06 02 54 1', '363-4345 Sodales Ave', 'Y4B 3', 'Cochin', 1, 'Nibh Ltd', '03 55 20 4', NULL, 'sed.pede.nec@luctus.ca', '');

-- --------------------------------------------------------

--
-- Structure de la table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `model` varchar(255) CHARACTER SET latin1 NOT NULL,
  `vehicle_category_id` int(11) NOT NULL,
  `vehicle_brand_id` int(11) NOT NULL,
  `price_without_taxes` float NOT NULL,
  `price_with_taxes` float NOT NULL,
  `professional` tinyint(1) NOT NULL,
  `vehicle_picture` varchar(255) CHARACTER SET latin1 NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicles`
--

INSERT INTO `vehicles` (`id`, `model`, `vehicle_category_id`, `vehicle_brand_id`, `price_without_taxes`, `price_with_taxes`, `professional`, `vehicle_picture`, `active`) VALUES
(2, 'Véhicule A', 2, 1, 14569, 15647.2, 0, '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vehicle_brands`
--

CREATE TABLE `vehicle_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicle_brands`
--

INSERT INTO `vehicle_brands` (`id`, `name`) VALUES
(1, 'Reugeot'),
(2, 'Reugeot Deluxe');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle_categories`
--

CREATE TABLE `vehicle_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicle_categories`
--

INSERT INTO `vehicle_categories` (`id`, `name`) VALUES
(1, 'Transport'),
(2, 'Utilitaire'),
(3, 'Poids Lourd');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Index pour la table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_category_id` (`vehicle_category_id`),
  ADD KEY `vehicle_brand_id` (`vehicle_brand_id`);

--
-- Index pour la table `vehicle_brands`
--
ALTER TABLE `vehicle_brands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicle_categories`
--
ALTER TABLE `vehicle_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT pour la table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `vehicle_brands`
--
ALTER TABLE `vehicle_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `vehicle_categories`
--
ALTER TABLE `vehicle_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`vehicle_category_id`) REFERENCES `vehicle_categories` (`id`),
  ADD CONSTRAINT `vehicles_ibfk_2` FOREIGN KEY (`vehicle_brand_id`) REFERENCES `vehicle_brands` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

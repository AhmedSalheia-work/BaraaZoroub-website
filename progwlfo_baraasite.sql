-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2020 at 08:33 AM
-- Server version: 10.3.25-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progwlfo_baraasite`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_imgs`
--

CREATE TABLE `about_imgs` (
  `id` int(11) NOT NULL,
  `imgId` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_imgs`
--

INSERT INTO `about_imgs` (`id`, `imgId`, `title`) VALUES
(1, 1, 'baraa_1'),
(2, 30, 'Screenshot (560)'),
(3, 3, 'baraa_3'),
(4, 4, 'baraa_4'),
(5, 5, 'baraa_5'),
(6, 6, 'baraa_6'),
(7, 7, 'baraa_7');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `imgId` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `imgId`, `title`) VALUES
(1, 8, 'mercycorps'),
(2, 9, 'microsoft'),
(3, 10, 'work-without-border'),
(4, 11, 'newline'),
(5, 12, 'gazaskygeeks'),
(6, 13, 'prography'),
(7, 14, 'kookies'),
(8, 15, 'msq');

-- --------------------------------------------------------

--
-- Table structure for table `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imgs`
--

INSERT INTO `imgs` (`id`, `img`) VALUES
(1, 'baraa_1.jpg'),
(2, 'baraa_2.jpg'),
(3, 'baraa_3.jpg'),
(4, 'baraa_4.jpg'),
(5, 'baraa_5.jpg'),
(6, 'baraa_6.jpg'),
(7, 'baraa_7.jpg'),
(8, 'mercycorps1.png'),
(9, 'microsoft.svg'),
(10, 'work-without-border.svg'),
(11, 'newline.svg'),
(12, 'gazaskygeeks.svg'),
(13, 'prography.svg'),
(14, 'kookies.svg'),
(15, 'msq.svg'),
(16, 'home1.png'),
(17, 'home2.png'),
(18, 'project1.png'),
(19, 'project2.png'),
(20, 'gWLylV.jpg'),
(21, 'cymjPz.jpg'),
(22, 'GTstnu.y'),
(23, 'FdteMQ.jpg'),
(24, 'YmuvU.jpg'),
(25, 'uDtyHm.jpg'),
(26, 'UQuNw.png'),
(27, 'uwTOpk.png'),
(28, 'cBXKG.png'),
(29, 'dNViUm.png'),
(30, 'WOoHLR.png'),
(31, 'qfLWK.png'),
(32, 'hFBXJ.png'),
(33, 'dXamoy.png'),
(34, 'iNsfU.jpg'),
(35, 'tiTUN.jpg'),
(36, 'mZLVr.jpg'),
(37, 'xybvj.jpg'),
(38, 'IlcCi.jpg'),
(181, '2-37.png'),
(180, '2-36.png'),
(179, '2-35.png'),
(178, '2-34.png'),
(177, '2-33.png'),
(176, '2-32.png'),
(175, '2-31.png'),
(174, '2-30.png'),
(173, '2-29.png'),
(172, '2-28.png'),
(171, '2-27.png'),
(170, '2-26.png'),
(169, '2-25.png'),
(168, '2-24.png'),
(167, '2-22.png'),
(166, '2-21.png'),
(165, '2-20.png'),
(164, '2-19.png'),
(163, '2-18.png'),
(162, '2-17.png'),
(161, '2-16.png'),
(160, '2-15.png'),
(159, '2-14.png'),
(158, '2-13.png'),
(157, '2-12.png'),
(156, '2-11.png'),
(155, '2-10.png'),
(154, '2-09.png'),
(153, '2-08.png'),
(152, '2-07.png'),
(151, '2-06.png'),
(150, '2-05.png'),
(149, '2-04.png'),
(148, '2-03.png'),
(147, '2-02.png'),
(146, '2-01.png'),
(145, '2-23.png'),
(144, '1-31.jpg'),
(77, 'Pavilion (2).jpg'),
(143, '1-30.jpg'),
(142, '1-29.jpg'),
(141, '1-28.jpg'),
(140, '1-27.jpg'),
(139, '1-26.jpg'),
(138, '1-25.jpg'),
(137, '1-24.jpg'),
(136, '1-23.jpg'),
(135, '1-22.jpg'),
(134, '1-21.jpg'),
(133, '1-20.jpg'),
(132, '1-18.jpg'),
(131, '1-17.jpg'),
(130, '1-16.jpg'),
(129, '1-15.jpg'),
(128, '1-14.jpg'),
(127, '1-13.jpg'),
(126, '1-12.jpg'),
(125, '1-11.jpg'),
(124, '1-10.jpg'),
(123, '1-012.jpg'),
(122, '1-011.jpg'),
(121, '1-010.jpg'),
(120, '1-09.jpg'),
(119, '1-08.jpg'),
(118, '1-07.jpg'),
(117, '1-06.jpg'),
(116, '1-05.jpg'),
(115, '1-04.jpg'),
(114, '1-03.jpg'),
(113, '1-02.jpg'),
(112, '1-01.jpg'),
(111, '1-19.jpg'),
(182, '2-38.png'),
(183, '2-39.png'),
(184, '2-40.png'),
(185, '2-42.png'),
(186, '2-43.png'),
(187, '2-44.png'),
(188, '2-45.png'),
(189, '2-46.png'),
(190, '2-47.png'),
(191, '2-48.png'),
(192, '2-49.png'),
(193, '2-50.png'),
(194, '2-51.png'),
(195, '3-01.jpg'),
(196, '3-02.jpg'),
(197, '3-03.jpg'),
(198, '3-04.jpg'),
(199, '3-05.jpg'),
(200, '3-06.jpg'),
(201, '3-07.jpg'),
(202, '3-08.jpg'),
(203, '3-09.jpg'),
(204, '3-10.jpg'),
(205, '3-11.jpg'),
(206, '3-12.jpg'),
(207, '3-13.jpg'),
(208, '3-14.jpg'),
(209, '3-15.jpg'),
(210, '4-01.png'),
(211, '4-02.png'),
(212, '4-03.png'),
(213, '4-04.png'),
(214, '4-05.png'),
(215, '4-06.png'),
(216, '4-07.png'),
(217, '4-08.png'),
(218, '4-09.png'),
(219, '4-10.png'),
(220, '4-11.png'),
(221, '4-12.png'),
(222, '4-13.png'),
(223, '4-14.png'),
(224, '4-15.png'),
(225, '4-16.png'),
(226, '4-17.png'),
(227, '4-18.png'),
(228, '4-19.png'),
(229, '4-20.png'),
(230, '4-21.png'),
(231, '4-22.png'),
(232, '4-23.png'),
(233, '4-24.png'),
(234, '5-46.png'),
(235, '5-01.png'),
(236, '5-02.png'),
(237, '5-03.png'),
(238, '5-04.png'),
(239, '5-05.png'),
(240, '5-06.png'),
(241, '5-07.png'),
(242, '5-08.png'),
(243, '5-09.png'),
(244, '5-10.png'),
(245, '5-11.png'),
(246, '5-12.png'),
(247, '5-13.png'),
(248, '5-14.png'),
(249, '5-15.png'),
(250, '5-16.png'),
(251, '5-17.png'),
(252, '5-18.png'),
(253, '5-19.png'),
(254, '5-20.png'),
(255, '5-25.png'),
(256, '5-26.png'),
(257, '5-27.png'),
(258, '5-28.png'),
(259, '5-29.png'),
(260, '5-30.png'),
(261, '5-31.png'),
(262, '5-32.png'),
(263, '5-33.png'),
(264, '5-34.png'),
(265, '5-35.png'),
(266, '5-36.png'),
(267, '5-37.png'),
(268, '5-38.png'),
(269, '5-39.png'),
(270, '5-40.png'),
(271, '5-41.png'),
(272, '5-42.png'),
(273, '5-43.png'),
(274, '5-44.png'),
(275, '5-45.png'),
(276, '5-47.png'),
(277, '5-48.png'),
(278, '5-49.png'),
(279, '5-50.png'),
(280, '5-51.png'),
(281, '5-52.png');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `client` varchar(30) NOT NULL,
  `head_img` int(11) NOT NULL,
  `for_home` enum('n','y') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `client`, `head_img`, `for_home`) VALUES
(1, 'Flow Studio', 210, 'y'),
(2, 'Collection of Logos', 195, 'y'),
(3, 'Baraa Zoroub', 145, 'y'),
(4, 'Sammeer Kraem', 111, 'y'),
(5, 'PICTI', 234, 'n');

-- --------------------------------------------------------

--
-- Table structure for table `projects_en`
--

CREATE TABLE `projects_en` (
  `projId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `name2` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_en`
--

INSERT INTO `projects_en` (`projId`, `name`, `name2`, `type`, `details`, `title`) VALUES
(1, 'Flow Studio', 'Brand Identity', 'BRANDING & GUIDELINE', 'Flow Studio is a full solution provider from software development to a smartphone application to content management, translation, and other related services.', 'Brand, Identity, Guideline & UX/UI Design'),
(5, 'PICTI', 'Branding Redesign', 'BRANDING & GUIDELINE', 'The Palestine Information and Communications Technology Incubator (PICTI), is an independent Palestinian organization that has been created through the initiative and support of the Palestinian Information Technology Community. PICTI and its partner organizations, including PITA and Paltrade, have as their mission the revitalization and the sustainable growth of the Information Communication Technology (ICT) sector in Palestine.\r\n\r\nThe strategic core components of PICTI is an Incubator facility that offers professional business services to Palestinian entrepreneurs who have mature concepts for unique and innovative ICT products assessed to have strong market potential.', 'Brand, Identity, Guideline & UX/UI Design'),
(2, 'Brandfolio', 'Approved', ' BRANDING & LETTERING', 'A collection of logos that I\'ve designed over the last year. Each one of these started off with a sketchbook and I made its way to my computer. A great hand full of the work below was hand-lettered and custom-crafted to properly fit the aesthetic needs of the client.', 'Marks and Logo Design'),
(3, 'Personal', ' Re-Branding', 'BRANDING', 'The purpose of this project is re-design the logo and brand to be simple,\r\nAppropriateness and distinctive.\r\n\r\nThe main challenge faced was how to create a creative idea for the brand to be appropriate and the clients remember it when they see it for the first time.\r\n\r\nThe deliverables of this project are: the logo, new branding, and presentation explain the steps to design a logo from A to Z.', 'Branding, Guideline'),
(4, 'Prography', 'Brand Identity', 'BRANDING', 'Palestinian Prography team offers you amazing& helpful services and solutions on information technology Professionalism in multiple fields. \r\n\r\nWe are a master of Mobile Application Development& UI/ UX design. In addition, to our core specialization in the areas of design, programming, web, and mobile development that always distinguished us, we offer a wide range of services, such as; Scenery Design, Visual Identities, Branding, Prototyping, Digital Marketing, Motion Graphic, Translation and all kinds of Content Writing.\r\n\r\nWe appreciate your time, so we are keen to deliver projects on time; also, we forward to offer our services with a suitable budget and competitive.', 'Branding, Guideline & Logo');

-- --------------------------------------------------------

--
-- Table structure for table `proj_img`
--

CREATE TABLE `proj_img` (
  `id` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `imgId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proj_img`
--

INSERT INTO `proj_img` (`id`, `prodId`, `imgId`) VALUES
(116, 4, 115),
(117, 4, 116),
(118, 4, 117),
(216, 3, 179),
(119, 4, 118),
(127, 4, 129),
(125, 4, 127),
(120, 4, 119),
(124, 4, 126),
(128, 4, 130),
(130, 4, 132),
(222, 3, 185),
(202, 3, 165),
(126, 4, 128),
(121, 4, 120),
(204, 3, 167),
(208, 3, 171),
(210, 3, 173),
(139, 4, 141),
(206, 3, 169),
(123, 4, 125),
(115, 4, 114),
(114, 4, 113),
(113, 4, 112),
(122, 4, 124),
(214, 3, 177),
(212, 3, 175),
(218, 3, 181),
(220, 3, 183),
(200, 3, 163),
(142, 4, 144),
(141, 4, 143),
(140, 4, 142),
(138, 4, 140),
(133, 4, 135),
(132, 4, 134),
(137, 4, 139),
(136, 4, 138),
(135, 4, 137),
(131, 4, 133),
(134, 4, 136),
(129, 4, 131),
(198, 3, 161),
(196, 3, 159),
(194, 3, 157),
(192, 3, 155),
(190, 3, 153),
(188, 3, 151),
(186, 3, 149),
(184, 3, 147),
(221, 3, 184),
(219, 3, 182),
(217, 3, 180),
(215, 3, 178),
(213, 3, 176),
(211, 3, 174),
(209, 3, 172),
(207, 3, 170),
(205, 3, 168),
(203, 3, 166),
(201, 3, 164),
(199, 3, 162),
(197, 3, 160),
(195, 3, 158),
(193, 3, 156),
(191, 3, 154),
(189, 3, 152),
(187, 3, 150),
(185, 3, 148),
(183, 3, 146),
(223, 3, 186),
(224, 3, 187),
(225, 3, 188),
(226, 3, 189),
(227, 3, 190),
(228, 3, 191),
(229, 3, 192),
(230, 3, 193),
(231, 3, 194),
(232, 2, 196),
(233, 2, 197),
(234, 2, 198),
(235, 2, 199),
(236, 2, 200),
(237, 2, 201),
(238, 2, 202),
(239, 2, 203),
(240, 2, 204),
(241, 2, 205),
(242, 2, 206),
(243, 2, 207),
(244, 2, 208),
(245, 2, 209),
(246, 1, 211),
(247, 1, 212),
(248, 1, 213),
(249, 1, 214),
(250, 1, 215),
(251, 1, 216),
(252, 1, 217),
(253, 1, 218),
(254, 1, 219),
(255, 1, 220),
(256, 1, 221),
(257, 1, 222),
(258, 1, 223),
(259, 1, 224),
(260, 1, 225),
(261, 1, 226),
(262, 1, 227),
(263, 1, 228),
(264, 1, 229),
(265, 1, 230),
(266, 1, 231),
(267, 1, 232),
(268, 1, 233),
(269, 5, 235),
(270, 5, 236),
(271, 5, 237),
(272, 5, 238),
(273, 5, 239),
(274, 5, 240),
(275, 5, 241),
(276, 5, 242),
(277, 5, 243),
(278, 5, 244),
(279, 5, 245),
(280, 5, 246),
(281, 5, 247),
(282, 5, 248),
(283, 5, 249),
(284, 5, 250),
(285, 5, 251),
(286, 5, 252),
(287, 5, 253),
(288, 5, 254),
(289, 5, 255),
(290, 5, 256),
(291, 5, 257),
(292, 5, 258),
(293, 5, 259),
(294, 5, 260),
(295, 5, 261),
(296, 5, 262),
(297, 5, 263),
(298, 5, 264),
(299, 5, 265),
(300, 5, 266),
(301, 5, 267),
(302, 5, 268),
(303, 5, 269),
(304, 5, 270),
(305, 5, 271),
(306, 5, 272),
(307, 5, 273),
(308, 5, 274),
(309, 5, 275),
(310, 5, 276),
(311, 5, 277),
(312, 5, 278),
(313, 5, 279),
(314, 5, 280),
(315, 5, 281);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` varchar(20) NOT NULL,
  `link` varchar(250) NOT NULL DEFAULT 'https://'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `link`) VALUES
('facebook', 'https://www.facebook.com/baraazorob/'),
('twitter', 'https://twitter.com/baraazoroub'),
('instagram', 'https://www.instagram.com/baraazoroub/'),
('linkedin', 'https://www.linkedin.com/in/barazoroub/'),
('behance', 'https://www.behance.net/baraazoroub'),
('dribbble', 'https://dribbble.com/BaraaZoroub'),
('whatsapp', 'https://api.whatsapp.com/send?phone=+970568775318'),
('mail', 'barazoroub@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_imgs`
--
ALTER TABLE `about_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imgId` (`imgId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `imgId` (`imgId`);

--
-- Indexes for table `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `img` (`img`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `head_img` (`head_img`);

--
-- Indexes for table `projects_en`
--
ALTER TABLE `projects_en`
  ADD PRIMARY KEY (`projId`);

--
-- Indexes for table `proj_img`
--
ALTER TABLE `proj_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodId` (`prodId`),
  ADD KEY `imgId` (`imgId`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_imgs`
--
ALTER TABLE `about_imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proj_img`
--
ALTER TABLE `proj_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
